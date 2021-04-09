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
        <!-- logo -->
        <div id="main_logo" class="row mb-2 pr-0  col-md-12 col-12 border-top ">
            <form id='send_imagelogo' class='send_image row  col-12 mt-4 justify-content-around'>
                <input name='image[id_usuario]' type='hidden' class='id_usuario' value='<?= $parameter->data->id_usuario; ?>'>
                <label for='' class='label col-form-label-sm text-right col-md-3 col-5 mr-2'> Editar logo <input name='image[logo][]' id='logo' type='file' class='logoapp mt-1 input-sm form-control'></label>
                <input onclick="enviarForm('logo')" class=' btn btn-sm btn-outline-primary col-lg-2 col-md-3 col-5  mb-2 mr-2' type="button" value="Guardar">
            </form>
            <div class=" col-12 d-flex justify-content-center pb-2">
                <div class="respuestalogo  bg-info mt-2 col-md-5 col-10" style="border-radius:5px"></div>
            </div>
        </div>
        <!-- Portada -->
        <div id="main_portada" class="row mb-4 pr-0 col-md-12 col-12 border-top pt-2">
            <button id="addportada" onclick="addrow('portada')" class="btn btn-outline-success btn-sm col-md-3 col-sm-4 col-5 my-3">+ portada</button>
            <a href='javascript:void[0]' onclick="hideShowSection('portada')" id="addcarta" class=" btn-sm col-md-3 col-sm-4 col-5 my-3">ver portada</a>
            <form id='send_imageportada' class='hide-showportada send_image row  col-12  mb-2 justify-content-between close-all-section ' enctype='multipart/form-data' method="POST">
                <input name='image[id_usuario]' type='hidden' class='id_usuario' id="idportada" value='<?= $parameter->data->id_usuario; ?>'>
                <input onclick="enviarForm('portada')" class='addportada btn btn-sm btn-outline-primary col-12  my-2' type="button" value="Guardar">
            </form>
            <div class=" col-12 d-flex justify-content-center pb-2">
                <div class="respuestaportada   bg-info mt-2 col-md-5 col-10" style="border-radius:5px"></div>
            </div>
        </div>
        <!-- sw change menu -->
        <!-- <div class="col-12 pl-0  "> -->
        <?php
        include_once "carta/swmenutext.php"
        ?>
        <!-- </div> -->

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