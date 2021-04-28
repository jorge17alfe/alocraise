<div class="container  my-5 pl-5">

    <div class=" text-center row mb-5">
        <div class=" row  col-sm-12 col-12 mb-5 ml-md-1 ml-0">
            <input name='' type='hidden' id='id_usuario' value='<?= $parameter->data->id_usuario; ?>'>
            <h2 class="text-center  col-sm-12 col-12 mb-5">TÚ MENÚ</h2>
            <div class="row text-justify border-top border-left col-md-6 col-sm-12 col-12 ">
                <div class="p-4">
                    <p class="mb-0">&nbsp&nbsp&nbsp Muy bien vamos a por el segundo paso: <br><br>
                        Aquí empiezas con logo de tu empresa, continúa con la selección de imágenes que serán la presentacion referente a tu negocio "las portadas" de como quieres que te vean. Así que no tienes nada que perder, recuerda EAB edíta, actualiza y borra. <br><br>
                        A continuación tienes dos opciones de editar tu carta.
                    </p>
                    <ul class="pl-3">
                        <p>
                            <spam class="font-weight-bold">1º</spam> Editar las imágenes de tu carta. <br>
                            <spam class="font-weight-bold">2º</spam> Editar los textos de tu carta.
                        </p>
                    </ul>
                </div>
            </div>
            <div class="row text-justify border-bottom border-right col-md-6 col-sm-12 col-12 ml-md-4 pl-3">
                <div class="p-4">
                    <p class="font-weight-bold mb-0">Imágenes de tu carta: </p>
                    <p class="">&nbsp&nbsp&nbspTienes diseñada tu carta, escanéalas, hazle un selfie con tu móvil ó tu camara fotográfica digital y subelas a nuestro servidor.</p>
                    <p class="font-weight-bold mb-0">Textos de tu carta:</p>
                    <p class="">&nbsp&nbsp&nbspY si por el contrario quieres editar tu carta, tenemos preparado nuestro editor de menús, tanto para comida, como bebida.</p>
                    <p class="">&nbsp&nbsp&nbspYa es cuestión de ponerte manos a la obra <strong><a href="#inicio_menu" class="text-uppercase"> __vamos allí</a></strong> </p>

                </div>

            </div>
        </div>
        <!-- choose plantilla -->
        <div class="col-12 pl-0 ">
            <?php
            include "add/ira.php";
            ?>
            <?php
            include  "add/lines_aloc.php";
            ?>
        </div>
        <!-- menu -->
        <div id="inicio_menu" class="text-center col-12 mb-4">
            <h3 class="col-12  text-center px-0 ml-0 my-4 pt-5">Edíta, Actualiza y borra.</h3>
            <p> &nbsp&nbsp&nbspEn este apartado te recomiendo que mires el tutorial. <a href=""><i class="fas fa-video fa-lg"></i></a></p>
        </div>
        <?php
        include_once "carta/portadaimg.php"
        ?>
        <!-- sw change menu -->
        <?php
        include_once "carta/swmenutext.php"
        ?>
    

        <!-- menu images -->
        <div class=" col-12 pl-0 mainMenu_images" id="mainMenu_images">
            <?php
            include_once "carta/menuimg.php";
            ?>
        </div>
        <!-- menu texts -->
        <div class="col-12 pl-0 mainMenu_texts border-top" id="mainMenu_texts">
            <?php
            include_once "carta/menutext.php"
            ?>
        </div>
        <!-- Btn back-->
        <div class="col-12 row">
            <div class="col-12 row pl-5">
                <div class="col-md-5 col-7 p-0 m-auto">
                    <a class=" btn btn-sm btn-outline-success w-100 m-0 " type="button" href="<?= SERVERURL ?>Restaurant/inicio">Regresar..</a>
                </div>
            </div>
        </div>
    </div>
    <!-- lines -->
    <?php
    include    "add/lines_aloc.php";
    ?>
    <!-- pop up name empresa -->
    <div class="row">
        <?php
        include_once "add/name-enterprice.php";
        ?>
    </div>
</div>


<?php require assetsphp("js/general") ?>