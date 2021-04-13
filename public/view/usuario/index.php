<div class="bg-transparent position-fixed w-100 h-100 fondoportada"></div>
<div class="bg-transparent position-fixed w-100 h-100 fondoportadaone"></div>
<!-- advertising -->

<!-- titles -->
<div class=" py-5 container-fluid bg-light header" style="color: var(--color_primary);">
    <h1 class="col-12 text-center pl-0 index left "><?= get_string('description') ?></h1>
    <h2 class="text-center col-12 mb-4 pl-0 right logo  "><?= config('title') ?></h2>
    <div class="response-ejemplo"></div>
</div>
<!-- index 1 -->
<div class="container-fluid p-xl-5 p-lg-4 p-md-4 p-3 cuadrado">
    <div class=" justify-content-around align-items-center col-12 py-4  row my-0 scrollshow">
        <div class=" col-xl-6 col-lg-4 col-md-4 d-lg-block d-sm-none d-none py-5 fondoimage  "></div>
        <div class=" col-xl-5 col-lg-7 col-md-8 col-sm-10 col-12 divex   p-xl-5 p-lg-4 p-md-4 pr-2 ml-5 ">
            <h3 class="text-center"><?= get_string('index1') ?></h3><br>
            <p class=" text-justify">&nbsp&nbsp&nbsp <?= get_string('index1.1') ?><br><br>
                &nbsp&nbsp&nbsp<?= get_string('index1.2') ?> <br><br>
                &nbsp&nbsp&nbsp<?= get_string('index1.3') ?>
            </p>
        </div>
    </div>
</div>
<!-- index 2 -->
<div class=" container-fluid my-5 pt-5 ">
    <!-- content  -->
    <div class="justify-content-around row ">
        <div class="col-xl-3 col-lg-5 col-md-5 col-sm-8 col-11  mb-5 p-4 divex  cuadrado scrollshow ">
            <h3 class=" pr-2"><?= get_string('index2.10') ?></h3><br>
            <p class="text-justify">&nbsp&nbsp&nbsp<?= get_string('index2.11') ?><br><br>
                &nbsp&nbsp&nbsp<?= get_string('index2.12') ?>
            </p>
        </div>
        <div class="col-xl-3 col-lg-5 col-md-5 col-sm-8 col-11  mb-5 p-4 divex  cuadrado scrollshow ">
            <h3 class=" pr-2"><?= get_string('index2') ?></h3><br>
            <p class="text-justify">&nbsp&nbsp&nbsp<?= get_string('index2.1') ?><br><br>
                &nbsp&nbsp&nbsp<?= get_string('index2.2') ?>
            </p>
            <div class="text-center mt-5 btn-registrate">
                <a href="<?= SERVERURL ?>registro" type="button" class="btn btn-sm btn-outline-primary px-5"><?= get_string('btn-register') ?></a>
            </div>
        </div>
        <!-- form information  -->
        <section class="col-xl-3 col-lg-5 col-md-5 col-sm-8 col-11 mb-5 p-4   cuadrado scrollshow  " id="main_aside">
            <h3 class=""><?= get_string('index10') ?></h3>
            <p><?= get_string('index10.1') ?></p>
            <div class="respuestainformation  w-100 rounded text-center" style="background-color: var(--color_second);"></div>
            <form class="d-flex flex-column  btn-20 input-group-sm" id="information">
                <input class="form-control mb-2 input-sm" id="email1" name="msg[email]" type="email" placeholder="Ingrese su e-mail..." required />
                <input class="form-control mb-2 input-sm" id="name1" name="msg[name]" type="text" placeholder="Ingrese su nombre..." />
                <input class="form-control mb-2 input-sm" id="asunto" name="msg[affair]" type="text" placeholder="Asunto..." required>
                <textarea class="form-control  mb-4 input-sm" name="msg[content]" id="" rows="3" placeholder="Sugerencias, información o lo que tu quieras..." required></textarea>
                <button class="btn btn-sm btn-outline-primary mx-auto  px-5" type="submit" name="enviar_email"><?= get_string('btn-send') ?></button>
            </form>
        </section>
    </div>
</div>
<!-- index 3 -->
<div class="container-fluid mb-5 mr-0 px-0 py-5 cuadrado">
    <div class="row col-12 justify-content-around mr-0 px-lg-5 pl-5 mb-5 scrollshow ">
        <div class="col-12 col-lg-7  presentacion divex    mr-0 p-4">
            <h3 class=""><?= get_string('index3') ?></h3><br>
            <p class="text-justify">&nbsp&nbsp&nbsp<?= get_string('index3.1') ?><br><br>
                &nbsp&nbsp&nbsp<?= get_string('index3.2') ?><br><br>
                &nbsp&nbsp&nbsp<?= get_string('index3.3') ?>
            </p>
            <p class="text-center"><strong><?= get_string('index3.4') ?></strong>
                <img src="<?= assets("img/ilustracionresponsive.svg") ?>" alt="" class="pl-4" style="width:130px;">
            </p>
        </div>
    </div>
    <div class="row mx-0 px-0 justify-content-around">
        <div class="col-xl-2 col-lg-3 col-md-5 col-sm-6 col-7 mx-4 my-3 p-4 divex  cuadrado scrollshow">
            <img src="<?= assets("img/pcaloc.jpg") ?>" alt="" class="w-100">
        </div>
        <div class="col-xl-2 col-lg-3 col-md-5 col-sm-6 col-7 mx-4 my-3 p-4 divex   cuadrado scrollshow">
            <img src="<?= assets("img/tabletaloc.jpg") ?>" alt="" class="w-100">
        </div>
        <div class="col-xl-2 col-lg-3 col-md-5 col-sm-6 col-7 mx-4 my-3 p-4 divex   cuadrado scrollshow">
            <img src="<?= assets("img/mobilealoc.jpg") ?>" alt="" class="w-100">
        </div>

    </div>

</div>
<!-- index 4 -->
<div class="container-fluid mb-5 mr-0 px-0 py-5 ">
    <div class="row col-12 justify-content-around mr-0 px-lg-5 pl-5 mb-5 scrollshow ">
        <!-- contenido -->
        <div class="col-12 col-lg-7  presentacion divex    mr-0 p-4 cuadrado">
            <h3 class=""><?= get_string('index4') ?></h3><br>
            <p class="text-justify">&nbsp&nbsp&nbsp<?= get_string('index4.1') ?> </p>
            <p class="text-center">&nbsp&nbsp&nbsp<?= get_string('index4.2') ?><img src="<?= assets("img/rest2.svg") ?>" alt="" class="pl-4" style="width:130px;">
            </p>
        </div>

    </div>
    <div class="row mx-0 px-0 justify-content-around  design_example">
        <?php 
        $design = ["aaron", "liam", "magui", "magdy"];
        foreach ($design as $v) { ?>
            <div class=" col-xl-2 col-lg-3 col-md-5 col-sm-6 col-7 mx-4 my-3 p-1 divex  cuadrado scrollshow">
                <a href="<?= SERVERURL ?>design/example/<?= $v ?>" class=" "><img src="<?= assets("img/" . $v . ".png") ?>" alt="" class="w-100 h-100"></a>
            </div>
        <?php } ?>
    </div>

</div>
<!-- index 5 -->
<div class="container-fluid mb-5 mr-0 px-0 py-5 cuadrado">
    <!-- contenido III -->
    <div class="row col-12 justify-content-around mr-0 px-lg-5 pl-5 mb-5  scrollshow ">
        <div class="col-12 col-lg-7  presentacion_2   divex   mr-0 p-4 bg-light">
            <h3 class=""><?= get_string('index5') ?></h3><br><br>
            <p class="text-justify">&nbsp&nbsp&nbsp<?= get_string('index5.1') ?><br><br>
                &nbsp&nbsp&nbsp<?= get_string('index5.2') ?></p>
            <p class="text-center"> &nbsp&nbsp&nbsp <strong><?= get_string('index5.3') ?></strong>
                <img src="<?= assets("img/ilustracionqr.svg") ?>" alt="" class="" style="width:130px;">
            </p>
        </div>
    </div>
    <div class="row mx-0 px-0 justify-content-around">
        <div class="col-xl-2 col-lg-3 col-md-5 col-sm-6 col-7 mx-4 my-3 p-4 divex  cuadrado scrollshow">
            <img src="<?= assets("img/qr1.png") ?>" alt="" class="w-100">
        </div>
        <div class="col-xl-2 col-lg-3 col-md-5 col-sm-6 col-7 mx-4 my-3 p-4 divex   cuadrado scrollshow">
            <img src="<?= assets("img/qr2.png") ?>" alt="" class="w-100">
        </div>
        <div class="col-xl-2 col-lg-3 col-md-5 col-sm-6 col-7 mx-4 my-3 p-4 divex   cuadrado scrollshow">
            <img src="<?= assets("img/qr3.png") ?>" alt="" class="w-100">
        </div>
    </div>
</div>
<div class="container-fluid  py-5 cuadrado main_comments">
    <div class="container m-auto justify-content-around row">
        <!-- form comment -->
        <div id="main_comment" class=" col-12  divex justify-content-around row py-4 scrollshow" style=" border-radius:10px;">
            <div class="comment  col-xl-8 col-lg-7 col-sm-9 col-11">
                <?php if (isset($_SESSION["usuario"])) { ?>
                    <h3 class="pb-3 text-center"><?= get_string('index11.1') ?> <?= $_SESSION["usuario"]; ?></h3>
                    <div class="respuestacomments  w-100 rounded text-center" style="background-color: var(--color_second);"></div>
                    <form class="d-flex flex-column form-group btn-20 input-group-sm" id="comments">
                        <input class="form-control mb-2 input-sm" id="nameh" name="commt[user]" type="hidden" value='<?= $_SESSION["usuario"]; ?>' />
                        <textarea class="form-control  mb-2 input-sm" name="commt[content]" id="" rows="3" placeholder="Tu comentario..." required></textarea>
                        <button class="btn btn-sm btn-outline-primary mx-auto px-5 mt-3" type="submit" name="enviar_email"><?= get_string('btn-public') ?></button>
                    </form>
                <?php   } else { ?>
                    <h3 class="pb-3 text-center"><?= get_string('index11.2') ?></h3>
                <?php   } ?>
            </div>
        </div>
        <!-- comments users -->
        <div class=' col-12 divex row  justify-content-between comments scrollshow'>
        </div>
        <div class='col-12 row justify-content-center pt-3'>
            <a id='addcomment' class='' type='button'><small><?= get_string('btn-see-more') ?></small></a>
            <div class="respuestalastcoment  w-100 rounded text-center" style="background-color: var(--color_second);"></div>
        </div>

    </div>
</div>
<style>
    .fondoportada {
        background: url(<?= assets("img/picture1.jpg") ?>);
        background-position: center;
        background-size: cover;
        z-index: -10;
    }

    .fondoportadaone {
        background: url(<?= assets("img/atardecer.jpg") ?>);
        background-position: center;
        background-size: cover;
        z-index: -10;
    }

    .fondoimage {
        background: url(<?= assets("img/rest1.svg") ?>);
        background-position: center;
        background-size: cover;
        height: 600px;
    }

    .header,
    .main_comments {
        margin-top: 15% !important;
        margin-bottom: 15% !important;
    }



    @media (max-width:993px) {

        .header,
        .main_comments {
            margin-bottom: 30% !important;
            margin-top: 30% !important;
        }

    }

    @media (max-width: 576px) {

        .header,
        .main_comments {
            margin-bottom: 40% !important;
            margin-top: 40% !important;
        }

    }
</style>
<?php require assetsphp("js/general"); ?>
<?php require assetsphp("js/mainindex"); ?>