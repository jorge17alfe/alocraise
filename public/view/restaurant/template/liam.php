<?php require helpers('phases'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- etiquetas metas -->
    <?= viewadd("includes/add/headermetas") ?>
    <!-- etiquetas css -->
    <link href="<?= assets("app/css/styleliam.css") ?>" rel="stylesheet" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
</head>

<body id="body">
    <div class="btn-10 col-2 d-lg-none d-block">
        <button class="burguer navbar-toggler btn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class=" fas fa-bars fa-lg"></i>
        </button>
    </div>
    <!-- etiquetas css -->
    <?php require assetsphp("app/css/styleliam") ?>
    <!-- Navigation-->
    <header class="container-fluid sticky-top  bg-light " style="z-index:100; ">
        <nav class="navbar  m-auto navbar-expand-lg pr-0 justify-content-between">
            <div class="col-2 ml-0 pl-0 ">
                <?php if (!empty($parameter->data->logo[0])) { ?>
                    <a class="navbar-brand" href="#"><img class="logo rounded" src="<?= SERVERURL ?>public/users/<?= $parameter->data->id_usuario; ?>/img/logo/<?= $parameter->data->logo[0]; ?>" alt="logo" style=""></a>
                <?php } ?>
            </div>
            <div class="collapse navbar-collapse col-6 " id="navbarSupportedContent">
                <ul class="navbar-nav col-12 justify-content-end align-items-end pr-0 mr-0 text-dark">
                    <?php
                    if ($_GET['url'] == 'design/example/liam') {
                        $data = ["bg-primary", "text-light"];
                        viewadd("includes/add/menutemplate", $data);
                    } ?>
                    <li class="nav-item  dropdown pr-0">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ir a... </a>
                        <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-light" href="#menu-carta">Nuestra Carta</a>
                            <a class="dropdown-item text-light" href="#information">Sugerencias</a>
                            <a class="dropdown-item text-light" href="#contact">Contacto</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link mr-2" href="<?= SERVERURL ?>">Home</a></li>
                    <?php if (isset($_SESSION["usuario"])) {  ?>
                        <li class="nav-item"><a class="nav-link  mr-2" href="<?= SERVERURL ?>restaurant/inicio">Usuario</a></li>
                    <?php  }  ?>
                    <?php if (!isset($_SESSION["usuario"])) { ?>
                        <li class="nav-item  pb-0"> <a class="nav-link" id="restaurante" href="<?= SERVERURL ?>iniciar-sesion"><i class="fas fa-sign-in-alt fa-lg"></i></a> </li>
                    <?php } else { ?>
                        <li class="nav-item pb-0"> <a class="nav-link" id="restaurante" href="<?= SERVERURL ?>login/signOut"><i class="fas fa-sign-out-alt fa-lg"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Masthead-->
    <header class="masthead text-light">
        <div class="container text-center py-5">
            <h1 class=" text-uppercase py-5"><?= $parameter->data->nombre_empresa ?></h1>
        </div>

    </header>
    <!-- iconos estaticos  -->
    <!-- <div class="iconos-static fixed-bottom row container m-auto" style="flex-direction: row !important;"> -->
    <div class="icons fixed-bottom col-1 row justify-content-start  pb-3 ml-2">
        <a class="" style="color: <?= $parameter->data->color_web1 ?>;" href="#information"><i class="fas fa-envelope fa-2x"></i></a>
    </div>
    <div class="icons fixed-bottom col-1 ml-auto row justify-content-end pb-3 mr-2">
        <a class="" style="color: <?= $parameter->data->color_web2 ?>;" href="#nuestra_carta"> <i class=" fas fa-utensils fa-2x"></i> </a>
    </div>
    </div>
    <!-- About-->
    <section class="about-section text-center text-black-50" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto pb-5">
                    <h2 class="mb-4"><?= $parameter->data->titulo_sobre_nosotros; ?></h2>
                    <?php
                    if (!empty($parameter->data->sobre_nosotros)) {
                        for ($i = 0; $i < count($parameter->data->sobre_nosotros); $i++) {
                    ?>
                            <p class="text-justify ">&nbsp&nbsp<?= $parameter->data->sobre_nosotros[$i] ?> </p>

                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Menu-->
    <section class="projects-section bg-light pb-5" id="menu-carta">
        <h2 class="text-center pb-4 text-black-50" id="nuestra_carta"> Nuestra carta</h2>
        <hr class="w-50 pb-4" style="border-color: #64a19d; border-width: 0.25rem;">
        <div class="container pb-5">
            <div class="row justify-content-center no-gutters mb-5 mb-lg-0 " id="comida">
                <div class="col-lg-6 para-comer">
                    <?php if (!empty($parameter->data->portada[1])) { ?> <img style="width:100%; height: 100%;" class="my-auto" src="<?= SERVERURL ?>public/users/<?= $parameter->data->id_usuario; ?>/img/portada/<?= $parameter->data->portada[1]; ?>"><?php } ?>
                </div>
                <div class="col-lg-6">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left text-white">
                                <div>
                                    <?php $aleatorio = rand(0, count($phases) - 1); ?>
                                    <p class=" text-justify mb-0">&nbsp&nbsp&nbsp<?= $phases[$aleatorio]['phase'] ?></p>
                                    <p class="text-right"><small><cite class=""><?= $phases[$aleatorio]['author'] ?> (<?= $phases[$aleatorio]['profession'] ?>)</cite></small> </p>
                                </div>
                                <h4 class="">Para comer</h4>
                                <div class=" ">
                                    <a class="btn btn-sm w-100 text-light " data-toggle="modal" data-target="#myModal1">Ver aquí</a>
                                </div>
                                <!-- modal comida -->
                                <div class="modal fade " id="myModal1" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content text-center  ">
                                            <!-- slider comida -->
                                            <div class="carta m modal-body p-0">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <!-- <h4 class=" text-info">Para comer</h4> -->
                                                <div id="carousels" class="carousel slide " data-ride="carousel" data-interval="0">
                                                    <div class="carousel-inner ">
                                                        <?php require("add/foodtext.php") ?>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carousels" role="button" data-slide="prev">
                                                        <i class="fas fa-caret-left fa-4x"></i>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carousels" role="button" data-slide="next">
                                                        <i class="fas fa-caret-right fa-4x"></i>
                                                    </a>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <hr class="d-none d-lg-block mb-0 ml-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project Two Row-->
            <div class="row justify-content-center no-gutters mb-5 mb-lg-0 " id="bebida">
                <div class="col-lg-6">
                    <?php if (!empty($parameter->data->portada[2])) { ?> <img style="width:100%; height: 100%;" src="<?= SERVERURL ?>public/users/<?= $parameter->data->id_usuario; ?>/img/portada/<?= $parameter->data->portada[2]; ?>"><?php } ?>
                </div>
                <div class="col-lg-6 order-lg-first">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-right text-white">
                                <?php $aleatorio = rand(0, count($phases) - 1); ?>
                                <p class=" text-justify mb-0">&nbsp&nbsp&nbsp<?= $phases[$aleatorio]['phase'] ?></p>
                                <p class="text-right"><cite class=""><small><?= $phases[$aleatorio]['author'] ?> (<?= $phases[$aleatorio]['profession'] ?>)</cite></small> </p>
                                <h4 class="">Para beber</h4>
                                <div class=" ">
                                    <a class="btn btn-sm w-100   text-light" data-toggle="modal" data-target="#myModal2">Ver aquí</a>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content text-center">
                                            <!-- slider bebida -->
                                            <div class="bebida m modal-body p-0">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <!-- <h4 class="text-info ">Para beber</h4> -->
                                                <div id="carousels1" class="carousel slide " data-ride="carousel" data-interval="0">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-inner ">
                                                            <?php
                                                            require_once "add/drinktext.php"
                                                            ?>
                                                        </div>
                                                    </div>

                                                    <a class="carousel-control-prev" href="#carousels1" role="button" data-slide="prev">
                                                        <i class="fas fa-caret-left fa-4x"></i>

                                                    </a>
                                                    <a class="carousel-control-next" href="#carousels1" role="button" data-slide="next">
                                                        <i class="fas fa-caret-right fa-4x"></i>
                                                    </a>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="d-none d-lg-block mb-0 mr-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center no-gutters mb-3 " id="menu_dia">
                <div class="col-lg-6">
                    <?php if (!empty($parameter->data->portada[3])) { ?><img style="width:100%; height: 100%;" src="<?= SERVERURL ?>public/users/<?= $parameter->data->id_usuario; ?>/img/portada/<?= $parameter->data->portada[3]; ?>"><?php } ?>
                </div>
                <div class="col-lg-6">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left text-white">
                                <?php $aleatorio = rand(0, count($phases) - 1); ?>
                                <p class=" text-justify mb-0">&nbsp&nbsp&nbsp<?= $phases[$aleatorio]['phase'] ?></p>
                                <p class="text-right"><cite class=""><small><?= $phases[$aleatorio]['author'] ?> (<?= $phases[$aleatorio]['profession'] ?>)</cite> </small></p>
                                <h4 class="">Nuestro menú del día</h4>
                                <div class=" ">
                                    <a class="btn btn-sm w-100   text-light" data-toggle="modal" data-target="#myModal3">Ver aquí</a>
                                </div>
                                <div class="modal fade " id="myModal3" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content text-center  ">
                                            <!-- slider comida -->
                                            <div class="carta m- modal-body p-0">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <!-- <h4 class=" text-info">Menu del día</h4> -->
                                                <div class="m-auto menu_dia text-light font-size" id="menu">
                                                    <?php require_once "add/menu_diario.php"; ?>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <hr class="d-none d-lg-block mb-0 ml-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container text-center  my-5 mb-lg-0 text-black-50">
                <?php
                if (isset($parameter->data->sw_elements["swwifi"])) { ?>
                    <p class="mb-0 "><strong> WIFI <i class="fas fa-wifi fa-2x"></i></strong></p>
                    <p class="mb-0"><strong>Nombre red : </strong><?= $parameter->data->wifi["wifi_name"] ?></p>
                    <p><strong>Clave : </strong><?= $parameter->data->wifi["wifi_pass"] ?></p>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Signup-->
    <?php if (!empty($parameter->data->email)) { ?>
        <section class="signup-section mb-5" id="information">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                        <i class="far fa-paper-plane fa-2x mb-2  text-light"></i>
                        <h3 class="mb-5 text-light">Información y sugerencias</h3>
                        <form class="d-flex flex-column form-group" action="<?= SERVERURL ?>email/emailInformacionApp" method="post">
                            <input class="form-control mb-2" id="nombre_empresa" name="nombre_empresa" type="hidden" value="<?= $parameter->data->nombre_empresa ?>" required />
                            <input class="form-control mb-2" id="email_usuario_registrado" name="email_usuario_registrado" type="hidden" value="<?= $parameter->data->email ?>" required />
                            <input class="form-control mb-2" id="nombre_web" name="nombre_web" type="hidden" value="<?= $parameter->data->nombre_web ?>" required />
                            <input class="form-control mb-2" id="email_cliente" name="email" type="email" placeholder="Ingrese su e-mail..." required />
                            <input class="form-control mb-2" id="asunto" name="asunto" type="text" placeholder="Asunto..." required>
                            <textarea class="form-control  mb-2" name="contenido" id="" rows="3" placeholder="Sugerencias, información o lo que tu quieras..." required></textarea>
                            <button class="btn btn-primary mx-auto mb-2 p-3" type="submit" name="enviar_email">ENVIAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <!-- Contact-->
    <section class="contact-section bg-black">
        <div class="container">
            <div class="row py-5 " id="">
                <?php if (isset($parameter->data->sw_elements["swaceptartarjetas"])) { ?>
                    <div class="d-flex row justify-content-start  col-md-6 col-sm-12 col-12 pl-5">
                        <p class="text-white col-12">Aceptamos</p>
                        <div class="col-12 pl-0">
                            <img width="60px" src="<?= SERVERURL ?>public/assets/app/img/amex.gif" alt="tarjeta-de-credito-imagen-animada-0011" />
                            <img width="60px" src="<?= SERVERURL ?>public/assets/app/img/mastercard.gif" alt="tarjeta-de-credito-imagen-animada-0010" />
                            <img width="60px" src="<?= SERVERURL ?>public/assets/app/img/visa.gif" alt="tarjeta-de-credito-imagen-animada-0009" />
                        </div>
                    </div>
                <?php }
                ?>
                    <div class="d-flex row col-md-6 col-sm-12 col-12 pr-0" id="social-network">
                        <p class="text-white text-right col-12">Siguenos..</p>
                        <div class="col-12  social d-flex  justify-content-end text-white pr-0">
                            <?php 
                            foreach($parameter->data->choose_social_network as $v){
                                if (isset($parameter->data->sw_elements["sw".$v])) { ?> 
                                    <a class="justify-content-center align-content-center row mx-2" href="https://<?= $parameter->data->social_network[$v]; ?>" target="_blank"><i class='fab fa-<?= $v?> fa-2x'></i></a> 
                             <?php } 
                             } ?>
                        </div>
                    </div>
                
            </div>
            <div class="row" id="contact">
                <div class="col-md-4 col-12 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Visitanos</h4>
                            <hr class="my-4" />
                            <div class="small text-black-50"><a href="<?= $parameter->data->ubicacion_google; ?>" target="_blank"><i class="fas fa-street-view fa-3x"></i></a></div>
                            <div class="small text-black-50"><?= $parameter->data->direccion . ' <br>' . $parameter->data->codigo_postal . ' ' . $parameter->data->ciudad . ' ' . $parameter->data->estado . '<br>' . $parameter->data->pais; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Contacto</h4>
                            <hr class="my-4" />
                            <div class="small text-black-50"><a href="mailto:<?= $parameter->data->email; ?>" target="_blank"><?= $parameter->data->email; ?></a></div>
                            <?php if (!empty($parameter->data->telefono[0])) { ?>
                                <div class="small text-black-50"><a href="tel:<?= $parameter->data->telefono[0]; ?>" target="_blank"><?= $parameter->data->telefono[0]; ?></a></div>
                                <div class="small text-black-50"><a href="https://api.whatsapp.com/send?phone=<?= $parameter->data->telefono[0]; ?>&text=Hola!%20Que%20tal!" target="_blank">Un whatsapp <i class="fab fa-whatsapp"> </i> </a></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="far fa-clock text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Horario</h4>
                            <hr class="my-4" />
                            <?php
                            if (!empty($parameter->data->horario)) {
                                for ($i = 0; $i < count($parameter->data->horario); $i++) {            ?>
                                    <div class="small text-black-50"><?= $parameter->data->horario[$i]; ?></div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="footer bg-black small text-center font-size row col-12 ">
            <span class="col-12 col-sm-12 "><small>
                    <a href="<?= SERVERURL ?>quienes-somos"><?= get_string('aboutus') ?></a> -
                    <a href="<?= SERVERURL ?>politica-privacidad"><?= get_string('privacy-politic') ?></a> -
                    <a href="<?= SERVERURL ?>politica-cookies"><?= get_string('cookies-politic') ?></a> -
                    <a href="<?= SERVERURL ?>aviso-legal"><?= get_string('legal-notice') ?></a> -
                    <a href="<?= SERVERURL ?>"> &copy; <?= config('title') . ' ' . date('Y') ?></a></small>
            </span>
        </footer>
    </section>
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Core theme JS-->
</body>
<style>
    .modal {
        background-color: var(--color_fondo);
    }
</style>



</html>