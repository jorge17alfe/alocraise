<?php
// define('SERVERURL', 'https://localhost/alocraise2.0/');
// define  ('SERVERURL','https://micartaonline.es/');
define('HEAD', 'includes/head');
define('HEADHEAD', 'includes/add/head');
define('FOOTER', 'includes/footer');
define('CLAVE_PIN', 'POLK987RETYU7TRYUO18761KFRTH');
define('CLAVE_PIN_APP', 'POLKRETY7117UTRY651UOK3FRTH6');
define('TABLE_PERSONAL', 'datos_personales');
define('TABLE_MENU', 'menu_dia');
define('TABLE_PASS', 'usuarios_pass');
define('TABLE_DATAAPP', 'datos_usuarios');
define('TABLE_MESSAGES', 'messages');
// CONFIG WEB
$_config = array(
    'title' => 'Mi Carta Online',
    'addtitle' => ' - Restaurante online',
    'subtitle' => 'Web y carta digital',
    'web_description' => 'Carta digital y web online para tu restaurante ,cafetería, bar etc. Sencillo y la manejes tu mismo, código qr para tus mesas',
    'web_keyboards' => 'web restaurante, carta digital, carta online, restaurante, cafeteria, bar, codigo qr',
    'codification' => 'utf-8',
    'autor-name' => 'Jorge',
    'autor-surname' => 'Ordóñez',
    'nif' => '543*****A',
    'email-info' => 'alocraise@gmail.com',
    'id_consult' => 'id_usuario',
    'admin' => 'jorge',
    'co-admin' => 'Jorge Ordóñez',
    'co-admin1' => 'Damarys Cordova'
);

// COLUMNS FR EDIT
$_columns_tables = array(
    'datos_textos' => array(
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
    'menu_text' => array(
        'carta_text',
        'bebida_text'
    ),
    'menu' => array(
        'primero',
        'segundo',
        'incluye',
        'precio'
    ),
    'imagenes' => array(
        'logo',
        'portada',
        'carta',
        'bebida'
    ),
    'personal_data' => array(
        'id',
        'id_usuario',
        'plan',
        'precio_plan',
        'nombre',
        'apellidos',
        'fecha_nacimiento',
        'dni_nif',
        'email',
        'direccion',
        'numero_direccion',
        'planta',
        'codigo_postal',
        'ciudad',
        'estado_provincia',
        'pais',
        'telefono',
        'fecha_registro',
        'ultima_conexion'
        
    )
);
