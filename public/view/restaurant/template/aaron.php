<?php require helpers('phases'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- etiquetas metas -->
    <?= viewadd("includes/add/headermetas") ?>
    <!--estilos personalizados css-->
    <link rel="stylesheet" href="<?= SERVERURL ?>public/assets/app/css/styleaaron.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!--font osward -->
    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@500&family=MuseoModerno:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&family=Homemade+Apple&display=swap" rel="stylesheet">
    <!--FONT AWESONE-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>

<body>
    <div class="btn-10 col-2 d-lg-none d-block">
        <button class="burguer navbar-toggler btn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class=" fas fa-bars fa-lg"></i>
        </button>
    </div>
    <div class="container-fluid main-header  fixed-top px-md-5 px-2">
        <div class="  bg-transparent">
            <nav class="navbar navbar-expand-lg  nav-main justify-content-between ">


                <div class="col-2">
                    <?php if (!empty($parameter->data->logo[0])) { ?>
                        <a href="#" class=""> <img id="nav-brand" src="<?= SERVERURL ?>public/users/<?= $parameter->data->id_usuario; ?>/img/logo/<?= $parameter->data->logo[0]; ?>" alt="icon" class=" pt-2 rounded-circle"></a>
                    <?php } ?>
                </div>

                <div class="collapse navbar-collapse col-6 pr-0 mr-0" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-menu align-items-end col-12 pr-0 mr-0" id="">
                        <?php
                        if ($_GET['url'] == 'design/example/aaron') {
                            viewadd("includes/add/menutemplate",);
                        } ?>
                        <li class="nav-item  dropdown mr-lg-4 mr-0 pr-0">
                            <a class="nav-link dropdown-toggle pr-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ir a... </a>
                            <div class="dropdown-menu  px-2" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#menu_carta">Nuestra Carta</a>
                                <a class="dropdown-item" href="#information">Sugerencias</a>
                                <a class="dropdown-item" href="#contact">Contacto</a>
                            </div>
                        </li>

                        <li class="nav-item "><a class="nav-link mr-lg-4 mr-0 pr-0" href="<?= SERVERURL ?>">Home</i></a></li>
                        <?php if (isset($_SESSION["usuario"])) { ?>
                            <li class="nav-item "><a class="nav-link mr-lg-4 mr-0 pr-0" href="<?= SERVERURL ?>restaurant/inicio">Usuario</a></li>
                        <?php  } ?>
                        <?php if (!isset($_SESSION["usuario"])) { ?>
                            <li class="nav-item "> <a class="nav-link pr-0" id="restaurante" href="<?= SERVERURL ?>iniciar-sesion"><i class="fas fa-sign-in-alt fa-lg"></i></a> </li>
                        <?php } else { ?>
                            <li class="nav-item "> <a class="nav-link pr-0" id="restaurante" href="<?= SERVERURL ?>login/signOut"><i class="fas fa-sign-out-alt fa-lg"></i></a>
                            <?php } ?>

                    </ul>
                </div>

            </nav>
        </div>
    </div>

    <div class="vacio">
        <!-- espacio vacio de 70px para la cabecera -->
    </div>

    <div class="text-center container my-5 py-0">
        <h1 class="my-5 titulo "><?= $parameter->data->nombre_empresa ?></h1>
        <!--empieza slider-->

        <div id="carouselExampleSlidesOnly " class=" slide m-auto pt-4" data-ride="carousel">
            <?php
            if (!empty($parameter->data->portada)) {
            ?>
                <div class="carousel-inner  mb-3  ">
                    <div class="carousel-item  active ">
                        <img class="d-block w-100 img-thumbnail  " src="<?= SERVERURL ?>public/users/<?= $parameter->data->id_usuario; ?>/img/portada/<?= $parameter->data->portada[0]; ?>" alt="First slide">
                    </div>
                    <?php

                    for ($i = 1; $i < count($parameter->data->portada); $i++) {
                    ?>
                        <div class="carousel-item  ">
                            <img class="d-block w-100 img-thumbnail  " src="<?= SERVERURL ?>public/users/<?= $parameter->data->id_usuario; ?>/img/portada/<?= $parameter->data->portada[$i]; ?>" alt="First slide">
                        </div>
                    <?php

                    }
                    ?>

                </div>
            <?php
            }

            ?>
        </div>
        <!-- fin slider -->
    </div>
    <!-- Carta de presentacion -->
    <div class="nuestra_historia container-fluid mb-5" id="main_nuestra_historia">
        <div class="container mx-auto py-5 px-3 row justify-content-center" id="nuestra_historia">
            <h2 class="text-center px-lg-5 px-0 col-12 py-3"><?= $parameter->data->titulo_sobre_nosotros; ?></h2>
            <?php
            if (!empty($parameter->data->sobre_nosotros)) {
                for ($i = 0; $i < count($parameter->data->sobre_nosotros); $i++) {
            ?>
                    <p class="text-justify col-lg-6 col-12 px-lg-5 px-0">&nbsp&nbsp<?= $parameter->data->sobre_nosotros[$i] ?> </p>

            <?php
                }
            }
            ?>
        </div>
    </div>

    <!-- lines -->
    <div class="container m-auto row justify-content-center ">
        <div class=" my-3 col-6 linea"></div>
    </div>
    <div class="container m-auto row justify-content-center ">
        <div class="my-3 col-4 linea"></div>
    </div>
    <div class="container m-auto row justify-content-center ">
        <div class="my-3 col-2 linea"></div>
    </div>
    <div class="container m-auto row justify-content-center ">
        <div class="my-3 col-4 linea"></div>
    </div>
    <div class="container m-auto row justify-content-center " id="menu_carta">
        <div class=" my-3 col-6 linea"></div>
    </div>
    <!--empieza slider-->
    <div class="container-fluid menu_carta mt-5 ">
        <div class="main_images container py-5 mx-auto px-0">
            <div class="text-center">
                <h3 class="pb-2 nuestra_carta">Nuestra carta</h3>
            </div>
            <div id="accordion" class="">
                <!-- carta -->
                <?php?>
                <div class="  mt-4  mb-5 row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-9 col-sm-11 col-11">
                        <?php $aleatorio = rand(0, count($phases) - 1); ?>
                        <p class=" text-justify mb-0 ">&nbsp&nbsp&nbsp<?= $phases[$aleatorio]['phase'] ?></p>
                        <p class="text-right"><cite class=""><small><?= $phases[$aleatorio]['author'] ?> (<?= $phases[$aleatorio]['profession'] ?>)</cite></small> </p>
                    </div>
                    <button class="btn  btn-sm w-100 col-xl-7 col-lg-8 col-md-9 col-sm-11 col-11" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Para comer</button>
                    <div id="collapseOne" class="collapse comida col-xl-7 col-lg-8 col-md-9 col-sm-11 col-11 mx-0 px-0" id="comida" aria-labelledby="headingOne" data-parent="#accordion">
                        <div id="carousels" class="carousel slide" data-ride="carousel" data-interval="0">
                            <div class="carousel-inner ">
                                <?php

                                require_once "add/foodtext.php"
                                ?>
                            </div>
                            <a class="carousel-control-prev" href="#carousels" role="button" data-slide="prev">
                                <i class="fas fa-chevron-left fa-3x"></i>
                            </a>
                            <a class="carousel-control-next" href="#carousels" role="button" data-slide="next">
                                <i class="fas fa-chevron-right fa-3x"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- bebida -->
                <div class=" mb-5 row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-9 col-sm-11 col-11">
                        <?php $aleatorio = rand(0, count($phases) - 1); ?>
                        <p class=" text-justify mb-0 ">&nbsp&nbsp&nbsp<?= $phases[$aleatorio]['phase'] ?></p>
                        <p class="text-right"><cite class=""><small><?= $phases[$aleatorio]['author'] ?> (<?= $phases[$aleatorio]['profession'] ?>)</cite></small> </p>
                    </div>
                    <button class="btn btn-sm w-100 col-xl-7 col-lg-8 col-md-9 col-sm-11 col-11" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Para beber</button>
                    <div id="collapseTwo" class="collapse bebida col-xl-7 col-lg-8 col-md-9 col-sm-11 col-11 mx-0 px-0" id="bebida" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div id="carousels1" class="carousel slide " data-ride="carousel" data-interval="0">
                            <div class="carousel-inner  ">
                                <?php
                                require_once "add/drinktext.php"
                                ?>
                                <a class="carousel-control-prev" href="#carousels1" role="button" data-slide="prev">
                                    <i class="fas fa-chevron-left fa-3x"></i>
                                </a>
                                <a class="carousel-control-next" href="#carousels1" role="button" data-slide="next">
                                    <i class="fas fa-chevron-right fa-3x"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class=" text-center row justify-content-center mb-5 " id="main_menu">
                    <div class="col-xl-7 col-lg-8 col-md-9 col-sm-11 col-11">
                        <?php $aleatorio = rand(0, count($phases) - 1); ?>
                        <p class=" text-justify mb-0 ">&nbsp&nbsp&nbsp<?= $phases[$aleatorio]['phase'] ?></p>
                        <p class="text-right"><cite class=""><small><?= $phases[$aleatorio]['author'] ?> (<?= $phases[$aleatorio]['profession'] ?>)</cite></small> </p>
                    </div>
                    <button class="btn  btn-sm w-100 col-xl-7 col-lg-8 col-md-9 col-sm-11 col-11" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Menú del día</button>
                    <div id="collapseThree" class="collapse  col-xl-7 col-lg-8 col-md-9 col-sm-11 col-11 mx-0 px-0" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="w-100 ">

                            <div class="m-auto menu_dia  font-size" id="menu">
                                <?php require_once 'add/menu_diario.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container text-right  my-1 mb-lg-0 col-xl-7 col-lg-8 col-md-9 col-sm-11 col-11 pr-0 ">
                    <?php if ($parameter->data->swwifi == 1) { ?>
                        <p class="mb-0 "><strong> WIFI <i class="fas fa-wifi fa-2x"></i></strong></p>
                        <p class="mb-0"><strong>Nombre red : </strong><?= $parameter->data->wifi_name ?></p>
                        <p><strong>Clave : </strong><?= $parameter->data->wifi_pass ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- credit card -->
    <div class="container-fluid row mr-0 pr-0 ">
        <div class="container m-auto row  my-5 py-5 pr-0 mr-0">
            <section class="ccards col-md-6 col-12 pl-0 my-3" id="ccards">
                <?php if ($parameter->data->swaceptartarjetas == 1) { ?>
                    <h6>Aceptamos Tarjetas de Crédito</h6>
                    <div class="main_card mt-3">
                        <img src="<?= assets("app/img/amex.gif") ?>" alt="tarjeta-de-credito-imagen-animada-0011" />
                        <img src="<?= assets("app/img/mastercard.gif") ?>" alt="tarjeta-de-credito-imagen-animada-0010" />
                        <img src="<?= assets("app/img/visa.gif") ?>" alt="tarjeta-de-credito-imagen-animada-0009" />
                    </div>
                <?php } ?>
            </section>

            <div class="main-social-network col-md-6 col-12 pr-0 my-3 ">
                <h6 class="text-right">Siguenos...</h6>
                <div class="social-network d-flex justify-content-end">
                    <?php if ($parameter->data->swtwitter == 1) { ?> <li class="nav-item "><a class="nav-link ml-3" target="_blank" href="<?= $parameter->data->social_twitter; ?>"><i class="fab fa-twitter"></i></a></li> <?php } ?>
                    <?php if ($parameter->data->swinstagram == 1) { ?> <li class="nav-item "><a class="nav-link ml-3" target="_blank" href="<?= $parameter->data->social_instagram; ?>"><i class="fab fa-instagram"></i></a></li> <?php } ?>
                    <?php if ($parameter->data->swfacebook == 1) { ?> <li class="nav-item "><a class="nav-link ml-3" target="_blank" href="<?= $parameter->data->social_facebook; ?>"><i class="fab fa-facebook"></i></a></li> <?php } ?>
                    <?php if ($parameter->data->swlinkedin == 1) { ?> <li class="nav-item "><a class="nav-link ml-3" target="_blank" href="<?= $parameter->data->social_linkedin; ?>"><i class="fab fa-linkedin"></i></a></li> <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <!-- lines -->
    <div class="container m-auto row justify-content-center ">
        <div class=" my-3 col-6 linea"></div>
    </div>
    <div class="container m-auto row justify-content-center ">
        <div class="my-3 col-4 linea"></div>
    </div>
    <div class="container m-auto row justify-content-center ">
        <div class="my-3 col-2 linea"></div>
    </div>
    <div class="container m-auto row justify-content-center ">
        <div class="my-3 col-4 linea"></div>
    </div>
    <div class="container m-auto row justify-content-center ">
        <div class=" my-3 col-6 linea" id="information"></div>
    </div>
    <!-- INFORMACIÓN Y EMAIL -->
    <?php if (!empty($parameter->data->email)) { ?>
        <div class="signup-section my-5 container-fluid position-sticky ">
            <section class="container py-5">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto text-center text-dark">
                        <i class="far fa-paper-plane fa-2x mb-2 "></i>
                        <h3 class="mb-5 ">Información y sugerencias</h3>
                        <form class="d-flex flex-column form-group" action="<?= SERVERURL ?>email/enviarMailApp" method="post">
                            <input class="form-control mb-2" id="nombre_empresa" name="nombre_empresa" type="hidden" value="<?= $parameter->data->nombre_empresa ?>" required />
                            <input class="form-control mb-2" id="email_usuario_registrado" name="email_usuario_registrado" type="hidden" value="<?= $parameter->data->email ?>" required />
                            <input class="form-control mb-2" id="nombre_web" name="nombre_web" type="hidden" value="<?= $parameter->data->nombre_web ?>" required />
                            <input class="form-control mb-2" id="email_cliente" name="email" type="email" placeholder="Ingrese su e-mail..." required />
                            <input class="form-control mb-2" id="asunto" name="asunto" type="text" placeholder="Asunto..." required>
                            <textarea class="form-control  mb-2" name="contenido" id="" rows="3" placeholder="Sugerencias, información o lo que tu quieras..." required></textarea>
                            <button class="btn btn-outline-light mx-auto mb-2 enviar_email" type="submit" name="enviar_email">ENVIAR</button>
                        </form>


                    </div>
                </div>
            </section>
        </div>
    <?php } ?>
    <!-- lines -->
    <div class="container m-auto row justify-content-center ">
        <div class=" my-3 col-6 linea"></div>
    </div>
    <div class="container m-auto row justify-content-center ">
        <div class="my-3 col-4 linea"></div>
    </div>
    <div class="container m-auto row justify-content-center ">
        <div class="my-3 col-2 linea"></div>
    </div>
    <div class="container m-auto row justify-content-center ">
        <div class="my-3 col-4 linea"></div>
    </div>
    <div class="container m-auto row justify-content-center ">
        <div class=" my-3 col-6 linea" id="information"></div>
    </div>
    <!-- fin slider -->
    <div class="main-contact-schedule container-fluid  mt-5">
        <div class="contact-schedule  py-5 container mx-auto d-flex flex-wrap justify-content-between flex-md-row flex-column">
            <dl class="contacto ">
                <dt class="mb-3">Contacto</dt>
                <dd><a href="mailto:<?= $parameter->data->email; ?>" target="_blank"><?= $parameter->data->email; ?></a></dd>
                <?php if (!empty($parameter->data->telefono[0])) { ?>
                    <dd class=""><a href="https://api.whatsapp.com/send?phone=<?= $parameter->data->telefono[0]; ?>&text=Hola!%20Que%20tal!" target="_blank">Un whatsapp <i class="fab fa-whatsapp"> ?</i> </a></dd>
                    <dd> <a href="tel:<?= $parameter->data->telefono[0]; ?>" target="_blank"><?= $parameter->data->telefono[0]; ?></a></dd>
                <?php } ?>
            </dl>
            <dl class="horario text-center">
                <dt class=" mb-3">Horarios</dt>
                <?php
                if (!empty($parameter->data->horario)) {
                    for ($i = 0; $i < count($parameter->data->horario); $i++) {            ?>
                        <dd><?= $parameter->data->horario[$i]; ?></dd>

                <?php
                    }
                }
                ?>
            </dl>
            <dl class="map text-right ">
                <dt class="mb-3"> Visitanos</dt>
                <dd><a href="<?= $parameter->data->ubicacion_google; ?>"><i class="fas fa-street-view "></i></a></dd>
                <dd> <?= $parameter->data->direccion ?></dd>
                <dd> <?= $parameter->data->codigo_postal . ' ' . $parameter->data->ciudad . ' ' . $parameter->data->estado ?></dd>
                <dd> <?= $parameter->data->pais ?></dd>
            </dl>
        </div>
    </div>
    <footer class=" copy footer container-fluid py-4">
        <a href="<?= SERVERURL ?>politica-privacidad"> Política de privacidad </a>-
        <a href="<?= SERVERURL ?>politica-cookies"> Política de cookies </a>-
        <a href="<?= SERVERURL ?>aviso-legal"> Aviso legal </a>-
        <a href="<?= SERVERURL ?>">&copy; Aloc_Raise <?php echo date('Y') ?> Copyright</a>
    </footer>

</body>

</html>