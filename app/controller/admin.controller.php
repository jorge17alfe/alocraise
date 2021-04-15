<?php
model("admin");
class AdminController
{
    private $tabla_usuarios_pass = 'usuarios_pass';
    private $tabla_datos_usuarios = 'datos_usuarios';
    private $tabla_menu_dia = 'menu_dia';
    private $tabla_datos_personales = 'datos_personales';
    public function __construct()
    {
        $this->model = new Admin;
    }


    public function admin()
    {
        session_start();
        if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] === config('admin')) {

            view('admin/admin', HEAD, FOOTER);
            die();
        }
        page_404();
    }

    public function getDataAll()
    {
        session_start();
        if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] === config('admin')) {
            $result = $this->model->getData('usuarios_pass', '*');
            echo $json = json_encode($result);
            die();
        }
        page_404();
    }

    public function getRow()
    {
    }

    public function insertInto($user)
    {
    }

    public function search($data = null)
    {
    }

    public function updateRow($user)
    {
    }


    public function deleteUser($user = null)
    {

        session_start();
        if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] === config('admin')) {
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
