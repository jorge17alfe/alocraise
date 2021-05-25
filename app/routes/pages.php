 <?php


class Pages
{
    public static $pages = [];

    public  function __construct($page = null)
    {
       
        self::loadPage($page);
    }

    public static function registerPage($url = null, $route = null, $head = null, $footer = null, $parameter = null)
    {
        self::$pages[$url]                      =       array($route, $head, $footer, $parameter);
    }

    public static function loadPage($page = null)
    {

        self::insertEnterpriceUser($page);
        self::insertPage();
        [$pages, $page] = self::callPage($page);
        self::verifySession($page);
        self::runPage($pages, $page);
    }

    public static function insertPage($parameter = null)
    {
        // session_start();
        // self::registerPage('index', 'usuario/index', HEAD, FOOTER);
        // self::registerPage('page-404', 'includes/404', HEAD, FOOTER);
        // self::registerPage('quienes-somos', 'usuario/whoweare', HEAD, FOOTER);
        // self::registerPage('aviso-legal', 'legal/aviso_legal', HEAD, FOOTER);
        // self::registerPage('politica-cookies', 'legal/politica_cookies', HEAD, FOOTER);
        // self::registerPage('politica-privacidad', 'legal/politica_privacidad', HEAD, FOOTER);
        // self::registerPage('registro', 'login/register', HEADHEAD, '');
        // self::registerPage('iniciar-sesion', 'login/login', HEADHEAD, '');
        // self::registerPage('cookies', 'includes/add/cookies', HEAD, FOOTER);
        // self::registerPage('calculator', 'example/calculator', HEADHEAD, '');
        // self::registerPage('reloj', 'example/reloj', HEADHEAD, '');
    }

    public static function  comments()
    {
        controller("information");
        $obj = new InformationController;
        return  $obj->GetDataAll();

    }
    public static function  callPage($page = null)
    {
        $pages = self::$pages;
        if (empty($page[0])) {
            $page = 'index';
        } elseif (!isset($page[2]) && isset($pages[$page[0]])) {
            $page =  strtolower($page[0]);
        } elseif (!isset($page[3])) {
            if (!isset($page[1])) {
                page_404();
            } elseif (isset($pages[$page[0] . '/' . $page[1]])) {
                $page =  strtolower($page[0]) . '/' . strtolower($page[1]);
            } else {
                page_404();
            }
        } else {
            page_404();
        }
        return [$pages, $page];
    }

    public static function  verifySession($page = null)
    {
        if (isset($_SESSION['usuario'])) {
            switch ($page) {
                case "iniciar-sesion";
                    redirect("restaurant/inicio");
                    die();
                case "registro";
                    redirect("restaurant/inicio");
                    die();
            }
        }
        return;
    }
    public static function  runPage($pages = null, $page = null)
    {
        if (isset($pages[$page][3])) {
            view($pages[$page][0], $pages[$page][1], $pages[$page][2], $pages[$page][3]);
        } else {
            view($pages[$page][0], $pages[$page][1], $pages[$page][2]);
        }
    }

    public static function  insertEnterpriceUser($page = null)
    {

        [$page, $link, $parameter] = self::getAppUser($page[0]);
        self::registerPage($page, $link, null, null, $parameter);
        return;
    }

    public static function  getAppUser($nombre_web = null)
    {
        model('consultsbd');
        $alm = new ConsultsBD;
        $result = $alm->getRow(TABLE_DATAAPP, 'nombre_web', array('nombre_web', $nombre_web));
        if (isset($result->nombre_web)) {
            $alm->data = $alm->getRow(TABLE_DATAAPP, '*', array('nombre_web', $nombre_web));
            $alm->menu = $alm->getRow(TABLE_MENU, '*', array('id_usuario', $alm->data->id_usuario));
            
            $menumenu=["primero","segundo","img_menu"];
            foreach($menumenu as $k => $v){
                $alm->menu->$v = unserialize($alm->menu->$v);
            }
            $menudata=["sobre_nosotros","horario","telefono","logo","portada","carta","bebida","carta_text","bebida_text"];
            foreach($menudata as $k => $v){
                $alm->data->$v = unserialize($alm->data->$v);
            }
            // $alm->data =  decode_entity($alm->data);
            // $alm->menu =  decode_entity($alm->menu);

            $link = "restaurant/template/" . $alm->data->plantilla;
            $page = $alm->data->nombre_web;
            return [$page, $link, $alm];
            die();
        }
        return;
    }
}
