<?php
// include 'routes/route.php';


function get_string($string)
{
    $result = 'don´t exist';
    global $_translations;
    if (isset($_translations[$string])) {
        $string2 = $_translations[$string];
        if (strlen($string2) > 0) {
            $result = $_translations[$string];
        }
    } else {
        $result = '>' . $string . '<';
    }
    return $result;
}
function config($string)
{
    global $_config;
    if (isset($_config[$string])) {
        $result = $_config[$string];
    } else {
        $result = '>' . $string . '<';
    }
    return $result;
}

function view($page = null, $head = null, $footer = null, $parameter = null)
{
    Route::view($page, $head, $footer, $parameter);
}

function viewadd($page = null, $parameter = null)
{
    return  Route::viewadd($page, $parameter);
}
function assets($route)
{
    return SERVERURL . 'public/assets/' . $route;
}
function assetsphp($route)
{
    return ("public/assets/{$route}.php");
}

function model($model = null)
{
    require "app/model/{$model}.model.php";
}

function controller($controller = null)
{
    require "app/controller/{$controller}.controller.php";
}

function helpers($helpers = null)
{
    return "app/helpers/{$helpers}.php";
}

function msgAlert($msg = null, $redirect = null)
{
    echo  "<script>alert('" . $msg . "'); window.location='" . SERVERURL . $redirect . "'</script>";
}

function redirect($page = null)
{
    echo "<script>window.location='" . SERVERURL . $page . "'</script>";
}

function page_404()
{
    redirect('page-404');
}


function notAllowed($redirect = null)
{
    echo msgAlert('Estás intentando una acción no permitida', $redirect);
}

function gretting()
{
    $hour =  date('H');
    if ($hour > 5 && $hour <= 13) {
        echo 'Buenos días !';
    } elseif ($hour > 13 && $hour <= 18) {
        echo 'Buenas tardes !';
    } else {
        echo 'Buenas noches !';
    }
}
function fecha_spanish()
{
    $days = [1 => 'lunes', 2 => 'martes', 3 => 'miércoles', 4 => 'jueves', 5 => 'viernes', 6 => 'sábado', 7 => 'domingo'];
    $months = [1 => 'enero', 2 => 'febrero', 3 => 'marzo', 4 => 'abril', 5 => 'mayo', 6 => 'junio', 7 => 'julio', 8 => 'agosto', 9 => 'septiembre', 10 => 'octubre', 11 => 'noviembre', 12 => 'diciembre'];
    $day = date('j');
    $dayweek = date('N');
    $month = date('n');
    $year = date('Y');
    return  [$day, $days[$dayweek], $months[$month], $year];
}

function descomposeArray($data)
{
    foreach ($data as $n => $v)
        if (is_array($data[$n]))
            // {
            foreach ($data[$n] as $n1 => $v1)
                return [$n, $n1, $v1];

    // } 
    // else {
    //     return [$n, $v, null];
    // }
}

function decode_entity($data)
{

    foreach ($data as $k => $v) {
        if (is_array($data->$k)) {
            foreach ($data->$k as $k1 => $v1) {
                if (is_array($data->$k[$k1])) {
                    foreach ($data->$k[$k1] as $k2 => $v2) {
                        if (is_array($data->$k[$k1][$k2])) {
                            foreach ($data->$k[$k1][$k2] as $k3 => $v3) {
                                $data->$k[$k1][$k2][$k3] = stripslashes(html_entity_decode($data->$k[$k1][$k2][$k3]));
                            }
                        } else {
                            $data->$k[$k1][$k2] = stripslashes(html_entity_decode($data->$k[$k1][$k2]));
                        }
                    }
                } else {
                    $data->$k[$k1] = stripslashes(html_entity_decode($data->$k[$k1]));
                }
            }
        } else {
            $data->$k = stripslashes(html_entity_decode($data->$k));
        }
    }
    return $data;
}

function validateImages($data)
{
    $MAX_FILESIZE = 4096000;
    $max_mb = round(($MAX_FILESIZE / 1024000), 2);
    $allowedExts = array("gif", "GIF", "jpeg", "JPEG", "jpg", "JPG", "png", "PNG", "svg", "SVG");
    $temp = explode(".", $data->image_name);

    $extension = end($temp);
    $data->image_name = md5($temp[0]) . '.' . $extension;
    if ((($data->image_type == "image/gif")
            || ($data->image_type == "image/jpeg")
            || ($data->image_type == "image/svg")
            || ($data->image_type == "image/jpg")
            || ($data->image_type == "image/pjpeg")
            || ($data->image_type == "image/x-png")
            || ($data->image_type == "image/png"))
        && in_array($extension, $allowedExts)
    ) {
        $roundsize = round(($data->image_size / 1024000), 2);
        if ($data->image_size >= $MAX_FILESIZE) {
            $msg = "El archivo es muy grande  $roundsize  Mb (max:  $max_mb  Mb )";
        } else {
            return true;
        }
    } else {
        $msg = "Archivo no es una imagen";
    }
    if (isset($msg)) {
        return $msg;
    }
}
