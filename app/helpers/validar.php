<?php

class Validar
{


    public function __CONSTRUCT()
    {
        //  $this->Filtrar_datos();

    }

    public function Filtrar_datos($value)
    {
        if (is_array($value)) {
            for ($i = 0; $i  < count($value); $i++) {
                $str = trim($value[$i]);
                $str = htmlentities($str);
                $str = addslashes($str);
                $value[$i] = $str;
            }
            return $value;
        }
        $str = trim($value);
        $str = htmlentities($str);
        $value = addslashes($str);
        return $value;
    }

    public function cleanProfanity($string)
    {
        function prep_regexp_array(&$item)
        {
            $item = "#$item#i";
        }
        function stars($matches)
        {
            return substr($matches[0], 0, 1) . str_repeat("*", strlen($matches[0]) - 1);
        }
        $swears = array("tonto", "idiota", 'puta', 'zorra', 'culion','follame'); //palabras a bloquear
        array_walk($swears, "prep_regexp_array");
        $string = preg_replace_callback($swears, "stars", $string);
        return $string;
    }

    public function Validar_textos($textos) //pendiente
    {
        return preg_match("#^[\da-zA-Z_@.][\dA-Z_@.]{0,255}\$#", $textos);
    }

    public function Validar_usuario($nombre) //pendiente
    {
        return preg_match("#^[\da-zA-Z_@]{5,40}\$#", $nombre);
    }

    public function Validar_password($password)
    {
        return preg_match("#^[\da-zA-Z_@$%&+]{5,20}\$#", $password);
    }

    public function Validar_email($email)
    {
        $reg = "#^(((([a-z\d][\.\-\+_]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-_]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i";
        return preg_match($reg, $email);
    }

    public function Eliminar_acentos($cadena)
    {

        //Reemplazamos la A y a
        $cadena = str_replace(
            array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
            array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
            $cadena
        );

        //Reemplazamos la E y e
        $cadena = str_replace(
            array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
            array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
            $cadena
        );

        //Reemplazamos la I y i
        $cadena = str_replace(
            array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
            array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
            $cadena
        );

        //Reemplazamos la O y o
        $cadena = str_replace(
            array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
            array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
            $cadena
        );

        //Reemplazamos la U y u
        $cadena = str_replace(
            array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
            array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
            $cadena
        );

        //Reemplazamos la N, n, C y c
        $cadena = str_replace(
            array('Ñ', 'ñ', 'Ç', 'ç'),
            array('N', 'n', 'C', 'c'),
            $cadena
        );

        $cadena = str_replace(
            array('"', "'", '`', '´'),
            array('', "", '', ''),
            $cadena
        );

        return $cadena;
    }


    // public function Validar_ip($ip)
    // {
    //     $val_0_to_255 = "(25[012345]|2[01234]\d|[01]?\d\d?)";
    //     $reg = "#^($val_0_to_255\.$val_0_to_255\.$val_0_to_255\.$val_0_to_255)$#";
    //     return preg_match($reg, $ip, $matches);
    // }

    // public function Limpiar_tags($source, $tags = null)
    // {
    //     function clean($matched)
    //     {
    //         $attribs =
    //             "javascript:|onclick|ondblclick|onmousedown|onmouseup|onmouseover|" .
    //             "onmousemove|onmouseout|onkeypress|onkeydown|onkeyup|" .
    //             "onload|class|id|src|style";
    //         $quot = "\"|\'|\`";
    //         $stripAttrib = "' ($attribs)\s*=\s*($quot)(.*?)(\\2)'i";
    //         $clean = stripslashes($matched[0]);
    //         $clean = preg_replace($stripAttrib, '', $clean);
    //         return $clean;
    //     }
    //     $allowedTags = '<a><br><b><i><br><li><ol><p><strong><u><ul>';
    //     $clean = strip_tags($source, $allowedTags);
    //     $clean = preg_replace_callback('#<(.*?)>#', "clean", $source);
    //     return $source;
    // }
}
