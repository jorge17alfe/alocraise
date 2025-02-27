<?php

header('Access-Control-Allow-Origin:*');
$zone=date_default_timezone_set('UTC');
$lang=
// 'pt'
// 'it'
// 'en'
substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2)
;

include 'app/config/database.php';
include 'app/config/config.php';
include 'app/helpers/functions.php';

if(file_exists('app/lang/'.$lang.'.php')){    
    include 'app/lang/'.$lang.'.php';
}else{
    include 'app/lang/es.php';
}

include 'app/routes/route.php';