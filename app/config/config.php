<?php 
define  ('SERVERURL','https://localhost/alocraise2.0/');
// define  ('SERVERURL','https://alocraise.com/');
define  ('HEAD','includes/head');
define  ('HEADHEAD','includes/add/head');
define  ('FOOTER','includes/footer');
define  ('TABLE_PERSONAL','datos_personales');
define  ('TABLE_MENU','menu_dia');
define  ('TABLE_PASS','usuarios_pass');
define  ('TABLE_DATAAPP','datos_usuarios');
define  ('TABLE_MESSAGES','messages');
define  ('claves','987718761');


$_config=array(
    'title' => 'Aloc_Raise',
    'addtitle' => ' - Web restaurante online',
    'codification' => 'utf-8',
    'autor-name' => 'Jorge',
    'autor-surname' => 'Ordóñez',
    'nif' => '543*****A',
    'email-info' => 'info@alocraise.com',
    'id_consult' => 'id_usuario',
    'admin' => 'jorge'
);

$_columns_tables=array(
    'datos_textos'=>array(
        // 'color_web1',
        // 'color_web2',
        // 'color_font',
        'social_twitter',
        'social_instagram',
        'social_facebook',
        'social_linkedin',
        'titulo_sobre_nosotros',
        'sobre_nosotros',
        'email',
        'telefono',
        'horario',
        'ubicacion_google',
        'direccion',
        'codigo_postal',
        'ciudad',
        'estado',
        'pais'
    ),
    'menu_text' =>array(
        'carta_text',
        'bebida_text'
    ),
    'menu' =>array(
        'primero',
        'segundo',
        'incluye',
        'precio',
        'moneda'
    ),
    'imagenes'=> array(
        'logo',
        'portada',
        'carta',
        'bebida'
    )
);

 