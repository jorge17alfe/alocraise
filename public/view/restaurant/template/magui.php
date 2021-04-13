<?php require helpers('phases');
?>
<html>

<head>
    <!-- etiquetas metas -->
    <?= viewadd("includes/add/headermetas") ?>
    <!--estilos personalizados Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-theme.min.css"> -->
    <!--estilos personalizados css-->
    <?php require assetsphp("app/css/stylemaga"); ?>
    <!--font osward -->
    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Marck+Script&family=Merienda:wght@700&display=swap" rel="stylesheet">
    <!--FONT AWESONE-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>
<!-- body -->

<body class="">
    <div class=" position-fixed div-fixed "></div>
    <div class="btn-10 col-2 d-md-none d-block">
        <button class="burguer navbar-toggler btn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class=" fas fa-bars fa-lg"></i>
        </button>
    </div>
    <!-- navegación -->
    <header class="container-fluid fixed-top main_header" style="z-index:1000; ">
        <nav class="navbar navbar-expand-md pr-0 justify-content-between">
            <div class="col-2 ml-0 pl-0">
                <?php if (!empty($parameter->data->logo[0])) { ?>
                    <a class="navbar-brand" href="#"><img class="logo rounded" src="<?= SERVERURL ?>public/users/<?= $parameter->data->id_usuario; ?>/img/logo/<?= $parameter->data->logo[0]; ?>" alt="logo" style="  height: 48px;"></a>
                <?php } ?>
            </div>
            <div class="collapse navbar-collapse col-6 " id="navbarSupportedContent">
                <ul class="navbar-nav col-12 justify-content-end align-items-end pr-0 mr-0">
                    <?php
                    if ($_GET['url'] == 'design/example/magui') {
                        $data = [$parameter->data->color_web2, ""];
                        viewadd("includes/add/menutemplate", $data);
                    } ?>
                    <li class="nav-item  dropdown pr-0">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ir a... </a>
                        <div class="dropdown-menu  " aria-labelledby="navbarDropdown" style="background-color:<?= $parameter->data->color_web2 ?>;">
                            <a class="dropdown-item" href="#menu-carta">Nuestra Carta</a>
                            <a class="dropdown-item" href="#information">Sugerencias</a>
                            <a class="dropdown-item" href="#footer">Contacto</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link mr-2" href="<?= SERVERURL ?>">Home</a></li>
                    <?php if (isset($_SESSION["usuario"])) { ?>
                        <li class="nav-item"><a class="nav-link  mr-2" href="<?= SERVERURL ?>restaurant/inicio">Usuario</a></li>
                    <?php } ?>
                    <?php if (!isset($_SESSION["usuario"])) { ?>
                        <li class="nav-item mt-1"> <a class="nav-link " id="restaurante" href="<?= SERVERURL ?>iniciar-sesion"><i class="fas fa-sign-in-alt fa-lg "></i></a> </li>
                    <?php } else { ?>
                        <li class="nav-item mt-1"> <a class="nav-link" id="restaurante" href="<?= SERVERURL ?>login/signOut"><i class="fas fa-sign-out-alt fa-lg"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>

    <script>
        $(document).ready(() => {
            $(".burguer").click(() => {
                if ($(".main_header").css("background-color") == "<?= $parameter->data->color_web1 ?>") {
                    $(".main_header").css("background-color", "")
                } else {
                    $(".main_header").css("background-color", "<?= $parameter->data->color_web1 ?>")
                }
            })
        })
    </script>
    <!-- portada -->
    <div class="container-fluid mb-5 position-relative portada py-5" style="padding-top:80px;">
        <h1 class='text-center col-12 my-5 titulo'><strong><?= $parameter->data->nombre_empresa; ?></strong></h1>
        <div class="row container mx-auto flex-column-reverse flex-lg-row flex-md-column-reverse justify-content-end d-flex align-items-center  py-5 px-0">
            <?php
            if (!empty($parameter->data->sobre_nosotros)) { ?>
                <div class="text-justify  col-lg-5 col-md-12 col-sm-12 col-12 font-size  pr-lg-5 ">
                    <?php for ($i = 0; $i < count($parameter->data->sobre_nosotros); $i++) { ?>
                        <p class=" ">&nbsp&nbsp<?= $parameter->data->sobre_nosotros[$i] ?> </p>
                    <?php } ?>
                </div>
            <?php
            }
            ?>
            <section class=" col-lg-7 col-md-12 col-sm-12 col-12  row mb-md-4 mb-4" id="">
                <div id="carouselExampleSlidesOnly" class=" slide " data-ride="carousel" data-interval="4000">
                    <?php if (!empty($parameter->data->portada)) { ?>
                        <div class="carousel-inner col-12 mb-3 px-0 m-auto">
                            <?php for ($i = 0; $i < count($parameter->data->portada); $i++) {   ?>
                                <div class="carousel-item  <?php if ($i == 0) {
                                                                echo "active";
                                                            } ?> ">
                                    <img class="d-block img-thumbnail " src="<?= SERVERURL ?>public/users/<?= $parameter->data->id_usuario; ?>/img/portada/<?= $parameter->data->portada[$i]; ?>" alt="First slide">
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </section>
        </div>
    </div>
    <!-- lines -->

    <div class="container m-auto row justify-content-left bg-transparent pr-5">
        <hr class="my-3 col-12" style="border-color:<?= $parameter->data->color_web1 ?>;">
        <hr class="my-3 col-10" style="border-color:<?= $parameter->data->color_web2 ?>;">
        <hr class="my-3 col-8" style="border-color:<?= $parameter->data->color_web1 ?>;">
        <hr class="my-3 col-6" style="border-color:<?= $parameter->data->color_web2 ?>;">
        <div class="col-4"></div>
        <hr class="my-3 col-4" style="border-color:<?= $parameter->data->color_web1 ?>;">
        <div class="col-6"></div>
        <hr class="my-3 col-2" style="border-color:<?= $parameter->data->color_web2 ?>;">
    </div>
    <!-- sliders -->
    <div class="container-fluid menu-carta position-sticky " id="menu-carta">
        <div class="  my-5 container py-5 mx-auto px-0">
            <h2 class="mb-5 text-center"><strong>Nuestra Carta</strong></h2>
            <div id="accordion" class="">
                <!-- carta -->
                <div class="  my-5 row justify-content-md-start justify-content-center">
                    <div class="w-100 col-xl-7 col-lg-8 col-md-9 col-sm-11 col-11 font-size px-0">
                        <?php $aleatorio = rand(0, count($phases) - 1); ?>
                        <p class=" text-justify mb-0">&nbsp&nbsp&nbsp <?= $phases[$aleatorio]['phase'] ?> </p>
                        <p class="text-right"><cite><small><?= $phases[$aleatorio]['author'] ?> (<?= $phases[$aleatorio]['profession'] ?>)</cite></small> </p>
                    </div>
                    <button class="btn btn-info btn-sm w-100 col-xl-7 col-lg-8 col-md-9 col-sm-11 col-11" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Para comer</button>
                    <div id="collapseOne" class="collapse comida col-xl-7 col-lg-8 col-md-9 col-sm-11 col-11 mx-0 px-0" id="comida" aria-labelledby="headingOne" data-parent="#accordion">
                        <div id="carousels" class="carousel slide" data-ride="carousel" data-interval="0">
                            <div class="carousel-inner ">
                                <div class="carousel-inner ">
                                    <?php require "add/foodtext.php" ?>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousels" role="button" data-slide="prev">
                                <i class="fas fa-caret-left fa-4x"></i>
                            </a>
                            <a class="carousel-control-next" href="#carousels" role="button" data-slide="next">
                                <i class="fas fa-caret-right fa-4x"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- bebida -->
                <div class=" row justify-content-center mb-5 ">
                    <div class="w-100 col-xl-7 col-lg-8 col-md-9 col-sm-11 col-11 font-size px-0">
                        <?php $aleatorio = rand(0, count($phases) - 1); ?>
                        <p class=" text-justify mb-0">&nbsp&nbsp&nbsp <?= $phases[$aleatorio]['phase'] ?></p>
                        <p class="text-right"><cite><small><?= $phases[$aleatorio]['author'] ?> (<?= $phases[$aleatorio]['profession'] ?>)</cite></small> </p>
                    </div>
                    <button class="btn btn-success btn-sm w-100 col-xl-7 col-lg-8 col-md-9 col-sm-11 col-11" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Para beber</button>
                    <div id="collapseTwo" class="collapse bebida col-xl-7 col-lg-8 col-md-9 col-sm-11 col-11 mx-0 px-0" id="bebida" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div id="carousels1" class="carousel slide " data-ride="carousel" data-interval="0">
                            <div class="carousel-inner ">
                                <div class="carousel-inner ">
                                    <?php require("add/drinktext.php") ?>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousels1" role="button" data-slide="prev">
                                <i class="fas fa-caret-left fa-4x"></i>
                            </a>
                            <a class="carousel-control-next" href="#carousels1" role="button" data-slide="next">
                                <i class="fas fa-caret-right fa-4x"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- menu del dìa -->
                <div class="row justify-content-md-end justify-content-center my-5" id="main_menu">
                    <div class="w-100 col-xl-7 col-lg-8 col-md-9 col-sm-11 col-11 font-size px-0">
                        <?php $aleatorio = rand(0, count($phases) - 1); ?>
                        <p class=" text-justify mb-0">&nbsp&nbsp&nbsp<?= $phases[$aleatorio]['phase'] ?></p>
                        <p class="text-right"><cite class=""><small><?= $phases[$aleatorio]['author'] ?> (<?= $phases[$aleatorio]['profession'] ?>)</cite></small> </p>
                    </div>
                    <button class="btn btn-secondary btn-sm w-100 col-xl-7 col-lg-8 col-md-9 col-sm-11 col-11" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Menú del día</button>
                    <div id="collapseThree" class="collapse col-xl-7 col-lg-8 col-md-9 col-sm-11 col-11 mx-0 px-0" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="w-100 ">
                            <div class="m-auto fondo_text text-light font-size text-center" id="menu">
                                <?php require_once "add/menu_diario.php"; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container  row pl-0 mt-5 mr-0 pr-0 <?php if ($parameter->data->swaceptartarjetas == 1) {
                                                                    echo 'justify-content-between';
                                                                } else {
                                                                    echo 'justify-content-end';
                                                                } ?>">
                    <!-- Aceptamos Tarjetas de Crédito< -->
                    <?php if ($parameter->data->swaceptartarjetas == 1) { ?>
                        <section class=" main_cards  col-md-6 col-12" id="ccards">
                            <p class="font-weight-bold ml-3 col-12">Aceptamos </p>
                            <div class="cards  col-12">
                                <img class="" width="65px" src="<?= assets("app/img/amex.gif") ?>" alt="tarjeta-de-credito-imagen-animada-0011" />
                                <img class="" width="65px" src="<?= assets("app/img/mastercard.gif") ?>" alt="tarjeta-de-credito-imagen-animada-0010" />
                                <img class="" width="65px" src="<?= assets("app/img/visa.gif")  ?>" alt="tarjeta-de-credito-imagen-animada-0009" />
                            </div>
                        </section>
                    <?php } ?>
                    <!-- wifi -->
                    <div class="text-right  mb-5 mb-lg-0  pr-0 col-md-6 col-12" id="mainwifi">
                        <?php if ($parameter->data->swwifi == 1) { ?>
                            <p class="mb-0 "><strong> WIFI <i class="fas fa-wifi fa-2x"></i></strong></p>
                            <p class="mb-0"><strong>Nombre red : </strong><?= $parameter->data->wifi_name ?></p>
                            <p><strong>Clave : </strong><?= $parameter->data->wifi_pass ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (!empty($parameter->data->email)) { ?>
        <!-- lines -->
        <div class="container m-auto row justify-content-center bg-transparent">
            <hr class=" my-3 col-6" style="border-color:<?= $parameter->data->color_web1 ?>; ">
        </div>
        <div class="container m-auto row justify-content-center ">
            <hr class="my-3 col-4" style="border-color:<?= $parameter->data->color_web2 ?>; ">
        </div>
        <div class="container m-auto row justify-content-center ">
            <hr class="my-3 col-2" style="border-color:<?= $parameter->data->color_web1 ?>; ">
        </div>
        <div class="container m-auto row justify-content-center ">
            <hr class="my-3 col-4" style="border-color:<?= $parameter->data->color_web2 ?>; ">
        </div>
        <div class="container m-auto row justify-content-center ">
            <hr class=" my-3 col-6" style="border-color:<?= $parameter->data->color_web1 ?>; ">
        </div>
        <!-- information mail -->
        <div class="signup-section my-5 py-5 container-fluid position-sticky" id="information">
            <section class="container py-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <i class="far fa-paper-plane fa-2x mb-2 "></i>
                    <h3 class="mb-5 ">Información y sugerencias</h3>
                    <form class="d-flex flex-column form-group" action="<?= SERVERURL ?>email/enviarMailApp" method="post">
                        <input class="form-control mb-2" id="nombre_empresa" name="nombre_empresa" type="hidden" value="<?= $parameter->data->nombre_empresa ?>" required />
                        <input class="form-control mb-2" id="email_usuario_registrado" name="email_usuario_registrado" type="hidden" value="<?= $parameter->data->email ?>" required />
                        <input class="form-control mb-2" id="nombre_web" name="nombre_web" type="hidden" value="<?= $parameter->data->nombre_web ?>" required />
                        <input class="form-control mb-2" id="email_cliente" name="email" type="email" placeholder="Ingrese su e-mail..." required />
                        <input class="form-control mb-2" id="asunto" name="asunto" type="text" placeholder="Asunto..." required>
                        <textarea class="form-control  mb-2" name="contenido" id="" rows="3" placeholder="Sugerencias, información o lo que tu quieras..." required></textarea>
                        <button class="btn btn-primary mx-auto mb-2" type="submit" name="enviar_email">ENVIAR</button>
                    </form>
                </div>
            </section>
        </div>
    <?php } ?>
    <!-- lines  -->
    <div class="container m-auto row justify-content-end bg-transparent pl-5">
        <div class="col-7"></div>
        <hr class="my-3 col-2" style="border-color:<?= $parameter->data->color_web1 ?>;">
        <div class="col-5"></div>
        <hr class="my-3 col-4" style="border-color:<?= $parameter->data->color_web2 ?>;">
        <hr class="my-3 col-6" style="border-color:<?= $parameter->data->color_web1 ?>;">
        <hr class="my-3 col-8" style="border-color:<?= $parameter->data->color_web2 ?>;">
        <hr class="my-3 col-10" style="border-color:<?= $parameter->data->color_web1 ?>;">
        <hr class="my-3 col-12" style="border-color:<?= $parameter->data->color_web2 ?>;">
    </div>
    <!-- redes sociales -->
    <div class="container row network-social m-auto d-flex  position-fixed  flex-column btn-20 col-12 ">
        <?php if ($parameter->data->swtwitter == 1) { ?><a href="<?= $parameter->data->social_twitter; ?>" target="_blank" class=" btn mb-1 "><i class="fab fa-twitter "></i></a><?php } ?>
        <?php if ($parameter->data->swinstagram == 1) { ?><a href="<?= $parameter->data->social_instagram; ?>" target="_blank" class=" btn mb-1"><i class="fab fa-instagram"></i> </a><?php } ?>
        <?php if ($parameter->data->swfacebook == 1) { ?><a href="<?= $parameter->data->social_facebook; ?>" target="_blank" class=" btn mb-1"><i class="fab fa-facebook-f "></i></a><?php } ?>
        <?php if ($parameter->data->swlinkedin == 1) { ?><a href="<?= $parameter->data->social_linkedin; ?>" target="_blank" class=" btn mb-1"><i class="fab fa-linkedin "></i> </a><?php } ?>
    </div>
    <!-- footer  -->
    <div class="footer  container-fluid position-sticky mt-5 " id="footer">
        <footer class="row container  mx-auto row pt-3 font-size px-0 pt-5">
            <ul class=" col-md-4 col-sm-4 col-12 px-0">
                <dl class="  ">
                    <dt class="pb-3">Contacto</dt>
                    <dd class="pb-0 mb-2 "><a href="mailto:<?= $parameter->data->email; ?>" target="_blank"><?= $parameter->data->email; ?></a></dd>
                    <?php if (!empty($parameter->data->telefono[0])) { ?>
                        <dd class="pb-0 mb-2 "><a href="https://api.whatsapp.com/send?phone=<?= $parameter->data->telefono[0]; ?>&text=Hola!%20Que%20tal!" target="_blank">Un whatsapp <i class="fab fa-whatsapp"> ?</i> </a></dd>
                        <dd class="pb-0 mb-2 "><a href="tel:<?= $parameter->data->telefono[0]; ?>" target="_blank"><?= $parameter->data->telefono[0]; ?></a></dd>
                    <?php } ?>
                </dl>
            </ul>
            <ul class="col-md-4 col-sm-4 col-12 px-0">
                <dl class=" text-center ">
                    <dt class="pb-3">Horarios</dt>
                    <?php if (!empty($parameter->data->horario)) {
                        for ($i = 0; $i < count($parameter->data->horario); $i++) {
                            echo "<dd>" .$parameter->data->horario[$i] ."</dd>";
                        }
                    } ?>
                </dl>
            </ul>
            <ul class=" col-md-4 col-sm-4 col-12 px-0">
                <dl class=" text-right">
                    <dt class="pb-3 ">Visitanos</dt>
                    <dd class="pb-0 mb-2 "><a href="<?= $parameter->data->ubicacion_google; ?>" target="_blank"><i class="fas fa-street-view fa-3x"> </i></a></dd>
                    <dd> <?= $parameter->data->direccion ?></dd>
                    <dd> <?= $parameter->data->codigo_postal . ' ' . $parameter->data->ciudad . ' ' . $parameter->data->estado ?></dd>
                    <dd> <?= $parameter->data->pais ?></dd>
                </dl>
            </ul>
            <span class="col-12 col-sm-12 my-2 text-center px-0"><small>
                    <a href="<?= SERVERURL ?>política-privacidad">Politica de privacidad</a> -
                    <a href="<?= SERVERURL ?>política-cookies">Politica de cookies</a> -
                    <a href="<?= SERVERURL ?>aviso-legal">Aviso legal</a> -
                    <a href="<?= SERVERURL ?>">&copy; Aloc_Raise <?php echo date('Y') ?></a></small>
            </span>
        </footer>
    </div>
</body>

</html>