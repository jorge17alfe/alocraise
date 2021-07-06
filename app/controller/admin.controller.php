<?php
model("admin");
class AdminController
{
    private $tabla_usuarios_pass = 'usuarios_pass';
    private $tabla_datos_usuarios = 'datos_usuarios';
    private $tabla_menu_dia = 'menu_dia';
    private $tabla_datos_personales = 'datos_personales';
    private $column = 'id_usuario';
    public function __construct()
    {
        $this->model = new Admin;
    }

    public function admin()
    {
        session_start();
        global $_columns_tables;
        if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] === config('admin')) {
            view('admin/admin', HEAD, FOOTER, $_columns_tables);
            die();
        }
        page_404();
    }

    public function getDataAll()
    {
        session_start();
        if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] === config('admin')) {
            $get_total_rows = 10; //total rows returned to view in pagination
            $total_users = count($this->model->getData($this->tabla_datos_personales, '*'));
            $result_cociente =  intdiv($total_users, $get_total_rows);
            $result_residuo =   fmod($total_users, $get_total_rows);
            $pagination = $_POST["row_inicio"];

            if ($_POST["row_inicio"] < 1) {
                $pagination = 1;
            }

            $since =  ($_POST["row_inicio"] - 1) * $get_total_rows;

            if ($since >= $total_users) {
                if (empty($result_residuo)) {
                    $result_residuo = 1;
                }

                $since =  $total_users - $result_residuo;
                $last_user = array("id" => "", "id_usuario" => "", "email" => "<strong>No hay mas usuarios</strong>", "fecha_registro" => "");
                $pagination = ($result_cociente + 1);
            }

            $result = $this->model->getGroupRows($this->tabla_datos_personales, '*', $since, $get_total_rows);
            if (isset($last_user)) {
                array_push($result, $last_user);
            }
            echo $json = json_encode([$result, $total_users, $get_total_rows, intval($pagination), ($result_cociente + 1)]);
            die();
        }
        page_404();
    }

    public function getRow()
    {
        session_start();
        if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] === config('admin') && isset($_POST["id_usuario"])) {
            $result = $this->model->getRow($this->tabla_datos_personales, '*', array("id_usuario", trim($_POST["id_usuario"])));
            global $_columns_tables;
            unset($_columns_tables["personal_data"][0]);
            unset($_columns_tables["personal_data"][1]);
            $_columns_tables["personal_data"] = array_values($_columns_tables["personal_data"]);
            $result = decode_entity($result);
            echo $json = json_encode($result);
            die();
        }
        page_404();
    }

    public function insertInto($user)
    {
    }

    public function search()
    {
        session_start();
        if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] === config('admin') && isset($_POST["search"])) {
            $column = $_POST["item_search"];
            $search = $_POST["search"] ?: "jorge";
            $total_rows_returned = 4; //max rows returned to view in search user
            $group_returned = $this->model->searchData($this->tabla_datos_personales, "*", array($column, $search));
            if (count($group_returned) > $total_rows_returned) {
                for ($i = 0; $i < $total_rows_returned; $i++) {
                    $result[] = $group_returned[$i];
                }
            } else {
                $result = $group_returned;
            }
            echo $json = json_encode($result);
            die();
        }
        page_404();
    }

    public function updateRow($user = null)
    {
        // print_r($_POST);
        session_start();
        if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] === config('admin')  && isset($_POST["id_usuario"])) {
            $id_usuario = $_POST['id_usuario'];
            unset($_POST["id_usuario"]);
            unset($_POST["id"]);
            unset($_POST["fecha_registro"]);
            unset($_POST["ultima_conexion"]);
            require helpers("validar");
            $alm = new Validar;

            foreach ($_POST as $name => $value) {
                $_POST[$name] = $alm->Filtrar_datos($_POST[$name]);
            }
            foreach ($_POST as $name => $value) {
                $this->model->updateRow($this->tabla_datos_personales, $name, $value, array($this->column, $id_usuario));
            }
            $this->model->updateRow($this->tabla_usuarios_pass, "email", $_POST["email"], array($this->column, $id_usuario));
            die("datos actualizados");
        }
        page_404();
    }

    public function deleteUser($user = null)
    {

        session_start();
        if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] === config('admin')  && isset($_POST["id_usuario"])) {

            if ($_POST['id_usuario'] === config('admin')) {
                die("The user cannot be removed is Administrator Acount");
            }

            $this->deleteFoldersUsers($_POST['id_usuario']);
            $where = array('id_usuario', $_POST['id_usuario']);
            $this->model->deleteUser($this->tabla_datos_usuarios, $where);
            $this->model->deleteUser($this->tabla_menu_dia, $where);
            $this->model->deleteUser($this->tabla_datos_personales, $where);
            $this->model->deleteUser($this->tabla_usuarios_pass, $where);

            die("Usuario borrado");
        }
        page_404();
    }

    public function deleteFoldersUsers($user = null)
    {
        if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] === config('admin') && isset($user)) {
            if ($user === config('admin')) {
                die("The user cannot be removed is Administrator Acount");
            }

            $result = $this->model->getRow('datos_usuarios', '*', array("id_usuario", $user));
            $menu_dia = $this->model->getRow('menu_dia', 'img_menu', array("id_usuario", $user));
            $img = ["logo", "portada", "bebida", "carta", "img_menu"];
            $result->img_menu = $menu_dia->img_menu;
            foreach ($result as $k => $v) {
                if (in_array($k, $img)) {
                    $ruta = (dirname(dirname(dirname(__FILE__))) . "/public/users/" . $user . "/img/" . $k . "/");
                    $result->$k = unserialize($result->$k);
                    // print_r($result->$k);
                    foreach ($result->$k as $v1) {
                        if (is_file($ruta . $v1)) {
                            unlink($ruta  . $v1);
                        }
                    }
                }
                rmdir(dirname(dirname(dirname(__FILE__))) . "/public/users/" . $user . "/img/" . $k);
            }
            rmdir(dirname(dirname(dirname(__FILE__))) . "/public/users/" . $user . "/img");
            rmdir(dirname(dirname(dirname(__FILE__))) . "/public/users/" . $user);
            return;
        }
        page_404();
    }
}
