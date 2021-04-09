<?php
class createfoldersController
{
    public function __CONSTRUCT()
    {
    }

    public static function createFoldersImages($data)
    {
        try {
            $route_user = "public/users/" . $data->usuarios."/img/";
            if (!file_exists($route_user)) {
            	mkdir($route_user, 0777, true);
            	mkdir($route_user . 'logo', 0777, true);
            	mkdir($route_user . 'portada', 0777, true);
            	mkdir($route_user . 'carta', 0777, true);
            	mkdir($route_user . 'bebida', 0777, true);
            	mkdir($route_user . 'img_menu', 0777, true);
            	return true;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
