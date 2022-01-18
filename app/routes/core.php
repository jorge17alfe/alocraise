<?php

class Core
{

    public function __construct()
    {
        // print_r($_SERVER['REQUEST_URI']);
        // exit();
        // $this->Geturl($_SERVER['REQUEST_URI']);
        if(!isset($_GET['url'])){
            $_GET['url']='';
        }
        $this->getUrl($_GET['url']);
    }

    public function getUrl($data)
    {
        $uri = $data;
        $url = explode('/', $uri);
        // unset($url[0]);
        // unset($url[1]);
        $url = array_values($url);

        for ($i = 1; $i < count($url); $i++) {
            if (empty($url[$i])) {
                page_404();
                die();
            }
        }

        $this->controller($url);
    }


    public function controller($url)
    {

        if (file_exists("app/controller/" . $url[0] . ".controller.php")) {
            $controller = strtolower($url[0]);
            require_once "app/controller/" . $controller . ".controller.php";
            $controller = ucwords($controller) . 'Controller';
            $controller = new $controller;
        } else {
            $this->page($url);
            die();
        }

        if (isset($url[1])) {
            $method = strtolower($url[1]);
            if (method_exists($controller, $method)) {
                $method = ucwords($method);
            } else {
                page_404();
                die();
            }
        } else {
            page_404();
            die();
        }

        if (count($url) > 2) {
            for ($i = 2; $i < count($url); $i++) {
                $parameter[] = $url[$i];
            }
            if (isset($parameter)) {
                $controller = $controller;
                $method = $method;
                $controller->$method($parameter);
            }
        } else {

            call_user_func(array($controller, $method));
        }
    }

    public function page($url)
    {
        require_once "app/routes/routes.php";
        // new Routes();
        $controller = 'pages';
        require_once "app/routes/$controller.php";
        $controller = ucwords($controller);
        new  $controller($url);
    }
}
