<?php
class DesignController
{
    public function datas($user = null)
    {
        if ($user == "jorge") {
            model('consultsbd');
            $alm = new ConsultsBD;
            $alm->menu = $alm->getRow(TABLE_MENU, '*', array('id_usuario', $user));
            $alm->data = $alm->getRow(TABLE_DATAAPP, '*', array('id_usuario', $user));
            $menumenu = ["primero", "segundo", "img_menu"];
            foreach ($menumenu as $k => $v) {
                $alm->menu->$v = unserialize($alm->menu->$v);
            }
            $menudata = ["sobre_nosotros", "horario", "telefono", "logo", "portada", "carta", "bebida", "carta_text", "bebida_text"];
            foreach ($menudata as $k => $v) {
                $alm->data->$v = unserialize($alm->data->$v);
            }
            // $alm->data =  decode_entity($alm->data);
            // $alm->menu =  decode_entity($alm->menu);
            return $alm;
        }
        page_404();
    }

    public function datas2($user = "jorge")
    {
        // if (isset($user)) {
        model('consultsbd');
        $alm = new ConsultsBD;
        $alm->menu = $alm->getRow(TABLE_MENU, '*', array('id_usuario', $user));
        $alm->data = $alm->getRow(TABLE_DATAAPP, '*', array('id_usuario', $user));
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
        $resu = json_encode($alm);
        return print_r($resu);
// }                    
        // page_404();
    }

    public function example($var = null)
    {

        if (isset($var[0])) {
            session_start();
            $result = $this->datas("jorge");
            $ruta = dirname(dirname(dirname(__FILE__))) . "/public/view/restaurant/template/" . $var[0] . ".php";
            if (file_exists($ruta)) {
                viewadd('restaurant/template/' . $var[0], $result);
            }
            die();
        }
        page_404();
    }

    public function example2(){
        view("example/example", HEADHEAD,'');
    }
    public function example3(){
        print_r($_POST);
    }
}
