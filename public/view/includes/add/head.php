<!DOCTYPE html>
<html lang="es">
<head>
  <!-- etiquetas metas -->
  <?php viewadd("includes/add/headermetas") ?>




  <!--estilos personalizados Bootstrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-theme.min.css"> -->


  <!--estilos personalizados css-->
  <link rel="stylesheet" href="<?= assets('css/style.css') ?>">

  <!--font osward -->
  <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Londrina+Shadow&display=swap" rel="stylesheet">

  <!--FONT AWESONE-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

  <!-- javascript -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <script src="<?= SERVERURL ?>lib/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <!-- COOKIES0 -->
  <script src="<?= SERVERURL ?>lib/js-cookie-latest/src/js.cookie.js"></script>
  
  <?php
//  if(isset($_COOKIE["__accept-cookies"])){
?>
<!-- google search console-->
<!-- <meta name="google-site-verification" content="g7Ggdii8cOkJSBATlhSMVbVYRcq8wpDM-5ELI9nvZpk" /> -->
<!-- google adsense -->
<!-- <script data-ad-client="ca-pub-7997536877733385" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
<?php
//  }
?>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-BL8QBKCBXR"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-BL8QBKCBXR');
  </script>
</head>
