<meta charset="<?= config('codification') ?>">
<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Carta digital y web online que te sirve para  tu restaurante ,cafetería, bar etc. Sencillo y la manejes tu mismo, código qr para tus mesas" />
<meta name="keywords" content="web restaurante, carta digital, carta online, restaurante, cafeteria, bar, codigo qr" />
<meta name="author" content="<?= config('autor-name') . ' ' . config('autor-surname') ?>" />
<meta name="copyright" content="<?= config('title') ?>" />
<meta name="robots" content="index, follow" />
<title><?= config('title') .config('addtitle')?></title>
<link rel="shortcut icon" href="<?= assets('img/osoliam.png') ?>" type="image/x-icon">
<?php if(isset($_COOKIE["__accept-cookies"])){?>
<!-- google search console-->
<meta name="google-site-verification" content="g7Ggdii8cOkJSBATlhSMVbVYRcq8wpDM-5ELI9nvZpk" />
<!-- google adsense -->
<script data-ad-client="ca-pub-7997536877733385" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<?php }?>