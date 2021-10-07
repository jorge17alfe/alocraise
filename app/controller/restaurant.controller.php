<?php
require helpers('validar');
model('restaurant');
class RestaurantController
{
    private     $column =    'id_usuario';
    public function __construct()
    {
        $this->valide = new Validar;
        $this->model = new Restaurant;
    }

    public function inicio($data = null)
    {
        session_start();
        if (isset($_SESSION["usuario"])) {
            $alm = $this->getParameter($_SESSION["usuario"]);
            view('restaurant/bienvenido', HEAD, FOOTER, $alm);
            die();
        }
        redirect("iniciar-sesion");
    }
    public function example($data = null)
    {
        session_start();
        if (isset($_SESSION["usuario"])) {
            // $var =  "<div style='margin-bottom:1rem; margin:2rem 1rem; font-size:85px; background-color:blue; height:10rem; width:10rem;'> </div>";
            // $var .= "<div style='margin-bottom:1rem; margin:2rem 1rem; font-size:85px; background-color:red; height:10rem; width:10rem;'> </div>";
            // $var .= "<div style='margin-bottom:1rem; margin:2rem 1rem; font-size:85px; background-color:purple; height:10rem; width:10rem;'> </div>";
            $var = "It´s page show route " . SERVERURL . "restaurant/example";
            echo $var;

            // $alm = $this->getParameter($_SESSION["usuario"]);
            // view('example/example', HEAD, FOOTER, $alm);
            die();
        }
        redirect("iniciar-sesion");
    }

    public function editImage($data = null)
    {
        session_start();
        if (isset($_SESSION["usuario"])) {
            $alm = $this->getParameter($_SESSION["usuario"]);
            view('restaurant/edit_restaurant_images', HEAD, FOOTER, $alm);
            die();
        }
        redirect("iniciar-sesion");
    }

    public function editText($data = null)
    {
        session_start();
        if (isset($_SESSION["usuario"])) {
            $alm = $this->getParameter($_SESSION["usuario"]);
            view('restaurant/edit_restaurant_texts', HEAD, FOOTER, $alm);
            die();
        }
        redirect("iniciar-sesion");
    }
    public function editMenuDaily($data = null)
    {
        session_start();
        if (isset($_SESSION["usuario"])) {
            $alm = $this->getParameter($_SESSION["usuario"]);
            view('restaurant/edit_menu_daily', HEAD, FOOTER, $alm);
            die();
        }
        redirect("iniciar-sesion");
    }

    public function getParameter($user = "jorge")
    {


        if (isset($user)) {
            $alm = new ConsultsBD;
            $alm->menu = $this->model->getRow(TABLE_MENU, '*', array($this->column, $user));
            $alm->data = $this->model->getRow(TABLE_DATAAPP, '*', array($this->column, $user));
            $alm->data->sobre_nosotros=unserialize($alm->data->sobre_nosotros);
            // echo $json = json_encode($alm);
            return $alm;
        }
        redirect("iniciar-sesion");
    }

    public function getData($user2 = null)
    {
        session_start();
        if (isset($_SESSION["usuario"])) {
            if (!empty($user2)) {
                $user = $user2;
            } else {
                $user = $_SESSION["usuario"];
            }
            $alm = new ConsultsBD;
            $alm->menu = $this->model->getRow(TABLE_MENU, '*', array($this->column, $user));
            $alm->data = $this->model->getRow(TABLE_DATAAPP, '*', array($this->column, $user));
            $menumenu = ["primero", "segundo", "img_menu"];
            foreach ($menumenu as $k => $v) {
                $alm->menu->$v = unserialize($alm->menu->$v);
            }
            $menudata = ["sobre_nosotros", "horario", "telefono", "logo", "portada", "carta", "bebida", "carta_text", "bebida_text"];
            foreach ($menudata as $k => $v) {
                $alm->data->$v = unserialize($alm->data->$v);
            }
            $alm->data =  decode_entity($alm->data);
            $alm->menu =  decode_entity($alm->menu);
            if (!empty($user2)) {
                return $alm;
            } else {
                echo  $json = json_encode($alm);
            }
            die();
        }
        page_404();
    }
    public function getData2($user2 = 'jorge')
    {
   
            $alm = new ConsultsBD;
            $alm->menu = $this->model->getRow(TABLE_MENU, '*', array($this->column, $user2));
            $alm->data = $this->model->getRow(TABLE_DATAAPP, '*', array($this->column, $user2));
            $menumenu = ["primero", "segundo", "img_menu"];
            foreach ($menumenu as $k => $v) {
                $alm->menu->$v = unserialize($alm->menu->$v);
            }
            $menudata = ["sobre_nosotros", "horario", "telefono", "logo", "portada", "carta", "bebida", "carta_text", "bebida_text"];
            foreach ($menudata as $k => $v) {
                $alm->data->$v = unserialize($alm->data->$v);
            }
            $alm->data =  decode_entity($alm->data);
            $alm->menu =  decode_entity($alm->menu);
            // if (!empty($user2)) {
                // return $alm;
            // } else {
                echo  $json = json_encode($alm);
            // }
            die();
       
    }

    public function updateTextMenu()
    {

        // print_r($_POST);
        // die();
        if (!empty($_POST)) {
            [$group, $e, $user] = descomposeArray($_POST);
            $result = array_keys($_POST[$group]);
            if (isset($_POST[$group])) {
                $alm = new Validar();

                for ($o = 1; $o < count($result); $o++) {
                    for ($i = 0; $i < count($_POST[$group][$result[$o]]); $i++) {
                        $_POST[$group][$result[$o]][$i] = array_values($_POST[$group][$result[$o]][$i]);
                        for ($a = 1; $a < count($_POST[$group][$result[$o]][$i]); $a++) {
                            $_POST[$group][$result[$o]][$i][$a] = array_values($_POST[$group][$result[$o]][$i][$a]);
                        }
                        for ($u = 0; $u < count($_POST[$group][$result[$o]][$i]); $u++) {
                            $_POST[$group][$result[$o]][$i][$u] = $alm->Filtrar_datos($_POST[$group][$result[$o]][$i][$u]);
                        }
                    }
                }
                // print_r($result);
                foreach ($_POST[$group] as $k => $v) {
                    $alm->$group[$k] = serialize($v);
                }
                unset($alm->$group[$this->column]);
                // print_r($alm->$group);
                // exit();
                $table = $this->getTable($group);
                foreach ($alm->$group as $name => $value) {
                    $ok =  $this->model->updateRow($table, $name, $value, array($this->column, $_POST[$group]['id_usuario']));
                }
                if ($ok == true) {
                    echo  'Datos actualizados';
                    return $ok;
                    die();
                }
            }
        }
        page_404();
    }

    public function upDownItem()
    {
        if (!empty($_POST)) {
            $alm = new Validar();
            $section = $_POST['section'];
            $group = $_POST['group'];
            $suma = $_POST['suma'];
            $result = $this->getData($_POST['user']);
            if (!empty($_POST['item'])) {
                $item = $_POST['item'];
                $elementtochange = $item + $suma;
                if ($elementtochange < 1) {
                    $elementtochange = 1;
                } elseif ($elementtochange > count($result->data->$section[$group]) - 1) {
                    $elementtochange = count($result->data->$section[$group]) - 1;
                }
                $element = $result->data->$section[$group][$elementtochange];
                $element1 = $result->data->$section[$group][$item];
                $result->data->$section[$group][$item] = $element;
                $result->data->$section[$group][$elementtochange] = $element1;
            } else {
                $elementtochange = $group + $suma;
                if ($elementtochange < 0) {
                    $elementtochange = 0;
                } elseif ($elementtochange > count($result->data->$section) - 1) {
                    $elementtochange = count($result->data->$section) - 1;
                }
                $element = $result->data->$section[$elementtochange];
                $element1 = $result->data->$section[$group];
                $result->data->$section[$group] = $element;
                $result->data->$section[$elementtochange] = $element1;
            }
            $result->data->$section = serialize($result->data->$section);
            $this->model->updateRow('datos_usuarios', $section, $result->data->$section, array($this->column, $_POST['user']));
            die();
        }
        page_404();
    }


    public function updateText()
    {
        // print_r($_POST);
        // exit();
        if (isset($_POST['datos_textos']) || isset($_POST['menu']) || isset($_POST['sw_menu']) || isset($_POST['plantilla']) || isset($_POST['sw_menu_text'])) {
            $alm = new Validar();
            [$group, $e, $user] = descomposeArray($_POST);


            if (isset($_POST['sw_menu'])) {
                if (!isset($_POST['sw_menu']["sw_menu"])) {
                    $_POST['sw_menu']["sw_menu"] = '';
                }
            }
            if (isset($_POST['sw_menu_text'])) {
                if (!isset($_POST['sw_menu_text']["sw_menu_text"])) {
                    $_POST['sw_menu_text']["sw_menu_text"] = '';
                }
            }
            // print_r($_POST);
            // exit();
            if (!empty($_POST['datos_textos']['nombre_empresa'])) {
                $webname = $alm->Eliminar_acentos($_POST[$group]['nombre_empresa']);
                $_POST[$group]['nombre_web'] = strtolower(str_replace(' ', '-', $webname)) . '-' . md5($_POST[$group]['id_usuario']);
            }

            $sw = array('swtwitter' => 0, 'swinstagram' => 0, 'swfacebook' => 0, 'swlinkedin' => 0, 'swaceptartarjetas' => 0, 'swwifi' => 0);
            foreach ($_POST[$group] as $k => $v) {
                $alm->$group[$k] = $v;
                if (is_array($alm->$group[$k])) {
                    if (in_array($k, array('sobre_nosotros', 'horario', 'primero', 'segundo'))) {
                        // print_r($alm->$group[$k]);
                        $alm->$group[$k] = array_values($alm->$group[$k]);
                        // print_r($alm->$group[$k]);
                        for ($i = 0; $i  < count($alm->$group[$k]); $i++) {
                            if (is_array($alm->$group[$k][$i])) {
                                for ($a = 0; $a  < count($alm->$group[$k][$i]); $a++) {
                                    $alm->$group[$k][$i][$a] = $alm->Filtrar_datos($alm->$group[$k][$i][$a]);
                                    $alm->$group[$k][$i][$a] = ucfirst($alm->$group[$k][$i][$a]);
                                    // print_r($alm->$group[$k][$i][$a]);
                                }
                            } else {

                                $alm->$group[$k][$i] = ucfirst($alm->$group[$k][$i]);
                            }
                        }
                        // $alm->$group[$k] = serialize($alm->$group[$k]);
                    }
                    $alm->$group[$k] = serialize($alm->$group[$k]);
                } else {
                    $alm->$group[$k] = $alm->Filtrar_datos($alm->$group[$k]);
                }
                if (in_array($k, array('nombre_empresa', 'titulo_sobre_nosotros', 'direccion', 'ciudad', 'estado', 'pais'))) {
                    $alm->$group[$k] = ucfirst($alm->$group[$k]);
                }

                if ($group === 'datos_textos') {
                    if (array_key_exists($k, $sw)) {
                        unset($sw[$k]);
                    }
                }
            }
            if ($sw != null && $group === 'datos_textos') {
                foreach ($sw as $k => $v) {
                    $alm->$group[$k] = $v;
                }
            }
            // print_r($alm->$group);
            $table = $this->getTable($group);
            foreach ($alm->$group as $name => $value) {
                $ok =  $this->model->updateRow($table, $name, $value, array($this->column, $alm->$group['id_usuario']));
            }
            if ($ok == true) {
                echo  'Datos actualizados';
                return $ok;
                die();
            }
        }
        page_404();
    }

    public function updateImages()
    {
        // print_r($_FILES);
        // exit();
        if (!empty($_FILES)) {
            foreach ($_POST as $group => $nothing)
                $user = $_POST[$group]['id_usuario'];
            foreach ($_FILES[$group]['name'] as $k => $v);
            $alm = new   Validar;
            for ($i = 0; $i < count($_FILES[$group]['name'][$k]); $i++) {
                if (!empty($_FILES[$group]['name'][$k][$i])) {
                    $alm->image_name = $_FILES[$group]['name'][$k][$i];
                    $alm->image_type = $_FILES[$group]['type'][$k][$i];
                    $alm->image_size = $_FILES[$group]['size'][$k][$i];
                    $alm->image_error = $_FILES[$group]['error'][$k][$i];

                    $resultvalidar = validateImages($alm);
                    if (isset($alm->image_name) && $resultvalidar == 1) {
                        $ruta = dirname(dirname(__dir__))  . '/public/users/' . $user . '/img/' . $k . '/';
                        $result = $this->getParameter($user);
                        if ($group == 'image') {
                            $imagebd = (unserialize($result->data->$k));
                        } elseif ($group == 'img_menu') {
                            $imagebd = (unserialize($result->menu->$k));
                        }
                        $contar = 0;
                        if ($imagebd != null) {
                            foreach ($imagebd as $value) {
                                if ($value === $alm->image_name) {
                                    $contar++;
                                }
                            }
                        }
                        $file_tmp = $_FILES[$group]["tmp_name"][$k][$i];
                        $this->deleteImage($ruta, $imagebd[$i] ?? 'noexist', $file_tmp, $alm->image_name, $contar);
                        $imagebd[$i] = $alm->image_name;
                        $imagebd = array_values($imagebd);
                        $resultfinal = serialize($imagebd);
                        $table = $this->getTable($group);
                        $re = $this->model->updateRow($table, $k, $resultfinal, array($this->column, $user));
                    } else {
                        $error[] =  ucfirst($k) . ' ' . ($i + 1) . ' : ' . $resultvalidar;
                    }
                }
            }
            if (isset($error)) {
                for ($i = 0; $i < count($error); $i++) {
                    echo ($i + 1) . "º " . $error[$i] . "<br>";
                }
            }
            die();
        }
        page_404();
    }

    public function deleteImage($ruta, $imagebd = null, $file_tmp, $imagenew, $count = null)
    {
        if (file_exists($ruta . $imagebd) && $count <= 1) {
            unlink($ruta . $imagebd);
            move_uploaded_file($file_tmp, $ruta . $imagenew);
        } else {
            move_uploaded_file($file_tmp, $ruta . $imagenew);
        }
        return;
    }

    public function deleteRow()
    {
        // print_r($_POST);
        // exit();
        if (isset($_POST["group"])) {
            $alm = new Validar;
            [$array, $name, $value] = descomposeArray($_POST);
            $table = $this->getTable($_POST['group']);
            $data = $this->model->getRow($table, '*', array($this->column, $_POST[$this->column]));
            $data->$array = unserialize($data->$array);
            if ($_POST["group"] === 'image' || $_POST["group"] === 'menu') {
                $contar = 0;
                foreach ($data->$array as $v) {
                    if ($v === $data->$array[$name]) {
                        $contar++;
                    }
                }
                $ruta = dirname(dirname(__dir__))  . '/public/users/' . $_POST['id_usuario'] . '/img/' . $array . '/';
                if ($contar <= 1) {
                    unlink($ruta . $data->$array[$name]);
                }
            }
            if (isset($_POST['item'])) {
                unset($data->$array[$name][$_POST['item']]);
                $data->$array[$name] = array_values($data->$array[$name]);
            } else {
                unset($data->$array[$name]);
                $data->$array = array_values($data->$array);
            }
            $data->$array = serialize($data->$array);
            foreach ($data as $name => $value)
                $this->model->updateRow($table, $name, $value, array($this->column, $_POST[$this->column]));
            die();
        }
        page_404();
    }

    public function deleteAll()
    {
        if (isset($_POST["group"])) {
            global $_columns_tables;
            if (array_key_exists($_POST["group"], $_columns_tables)) {
                $table = $this->getTable($_POST['group']);
                $array = $_columns_tables[$_POST["group"]];
                for ($i = 0; $i < count($array); $i++) {
                    $this->model->updateRow($table, $array[$i], '', array($this->column, $_POST[$this->column]));
                }
                echo 'Datos Borrados';
                die();
            }
        }
        page_404();
    }

    public function getTable($group = null)
    {
        if ($group == 'menu' || $group == 'sw_menu' || $group == 'img_menu') {
            $table = TABLE_MENU;
            return $table;
            die;
        } elseif ($group == 'datos_textos' || $group == 'menu_text' || $group == 'image' || $group == 'plantilla' || $group == 'sw_menu_text') {
            $table = TABLE_DATAAPP;
            return $table;
            die;
        }
        page_404();
    }
}
