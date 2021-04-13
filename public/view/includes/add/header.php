<body class="">
    <?= viewadd('includes/add/element-static') ?>

    <div class="container-fluid main-header fixed-top main_base pr-0 ">
        <header class=" px-0 w-100 ">

            <nav class="navbar navbar-expand-lg px-0 navegacion ">
                <div class="logo">
                    <a class="navbar-brand " href="<?= SERVERURL ?>"><?= config('title') ?></a>
                </div>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav w-100 d-flex justify-content-end  pr-4 ">

                        <?php
                        if (!isset($_GET["url"])) {
                        ?>
                        <?php
                        } else { ?>
                            <li class="nav-item pl-lg-3">
                                <a class="nav-link" href="<?= SERVERURL ?>">Home</a>
                            </li>
                        <?php
                        }
                        
                        // include "menutemplate.php";
                        viewadd('includes/add/menutemplate',['',''])
                        ?>
                        <!-- <li class="nav-item pl-3">
                            <a class="nav-link " href="<?= SERVERURL ?>available"><?= get_string('available') ?></a>
                        </li> -->
                        <?php if (!isset($_SESSION["usuario"])) { ?>
                        <?php } else { ?>
                            <li class="nav-item pl-lg-3 ">
                                <a class="nav-link " href="<?= SERVERURL ?>restaurant/inicio">
                                    Usuario
                                    <!-- <i class="fas fa-user"></i> -->
                                </a>
                            </li>
                        <?php } ?>
                        <?php if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] === config('admin')) { ?>
                            <li class="nav-item pl-lg-3 ">
                                <a class="nav-link " href="<?= SERVERURL ?>admin/admin">
                                    Admin
                                    <!-- <i class="fas fa-lock"></i> -->
                                </a>
                            </li>
                        <?php  } ?>

                        <li class="nav-item pl-lg-3 ">
                            <?php if (!isset($_SESSION["usuario"])) { ?>
                                <a class="nav-link pr-0" id="restaurante" href="<?= SERVERURL ?>iniciar-sesion"><i class="fas fa-sign-in-alt 2x"></i></a>
                            <?php } else { ?>
                                <a class="nav-link pr-0" id="restaurante" href="<?= SERVERURL ?>login/signout"><i class="fas fa-sign-out-alt 2x"></i></a>
                            <?php } ?>
                        </li>

                    </ul>

                </div>
            </nav>


        </header>
    </div>
    <div class="vacio">
        <!-- espacio vacio de 70px para la cabecera -->
    </div>