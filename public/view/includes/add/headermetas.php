<meta charset="<?= config('codification') ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?= config('web_description') ?>" />
<meta name="keywords" content="<?= config('web_keyboards') ?>" />
<meta name="author" content="<?= config('autor-name') . ' ' . config('autor-surname') ?>" />
<meta name="copyright" content="<?= config('title') ?>" />
<meta name="robots" content="index, follow" />
<?php if(empty($_GET["url"])){$tit ="Restaurante online"; }else{$tit=ucfirst($_GET["url"]);}?>
<title><?=  $tit  . " · " . config('title') ?></title>
<link rel="alternate" hreflang="es" href="https://micartaonline.es" />
<link rel="shortcut icon" href="<?= assets('img/osoliam.png') ?>" type="image/x-icon">
