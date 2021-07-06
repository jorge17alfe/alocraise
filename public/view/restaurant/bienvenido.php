<div class="container row mx-auto pl-5 my-5">
    <section class="col-sm-12 main_presentacion row   ">
        <!-- entrance title -->
        <div class="header text-center col-md-12 col-12 pr-0 row">
            <h3 class=" col-md-12 mb-2  pr-0 font-weight-bold"><?= gretting() ?></h3> <br>
            <h4 class="  col-md-12 col-12 ">
                <<< <?= $parameter->data->id_usuario ?>>>>
            </h4>
            <p class="col-md-12 text-center pb-4 pr-0 font-weight-bold"><?= get_string('welcome1').' '.config('title') ?></p>
        </div>
        <!-- day phase -->
        <div class="row col-12 justify-content-md-end pr-0">
            <div class="col-md-6 col-12 text-right pr-0">
                <?php require helpers('phases'); ?>
                <?php $aleatorio = rand(0, count($phases) - 1); ?>
                <p class="  mb-0">"<?= $phases[$aleatorio]['phase'] ?>"</p>
                <p class=""><cite class=""><small><?= $phases[$aleatorio]['author'] ?> (<?= $phases[$aleatorio]['profession'] ?>)</cite> </small></p>
            </div>
        </div>
        <!-- first paragraph-->
        <div class="col-12 col-md-6 pt-4 pb-3 border-top border-left">
            <h3 class="">&nbsp&nbsp&nbsp<?= get_string('welcome2.1') ?></h3><br>
            <p class="text-justify">&nbsp&nbsp&nbsp<?= get_string('welcome2.2') ?><br><br>
                &nbsp&nbsp&nbsp<?= get_string('welcome2.3') ?><br><br>
                &nbsp&nbsp&nbsp<?= get_string('welcome2.4') ?><br><br>
            </p>
        </div>
        <!-- second paragraph-->
        <div class="col-12 col-md-6 pt-4 pb-3  border-bottom border-right">
            <h3 class=""><?= get_string('welcome3.1') ?></h3>
            <p class="text-justify mb-0"><br>
                &nbsp&nbsp&nbsp<?= get_string('welcome3.2') ?><br> <br>
                <strong><?= get_string('welcome3.3') ?></strong> <br>
            </p>
            <p class="mb-0">&nbsp&nbsp&nbsp<strong>1º</strong> <?= get_string('welcome3.4') ?> <a href="<?= SERVERURL ?>restaurant/editText">__<i class="fas fa-edit fa-lg "></i></a></p>
            <p class="mb-0">&nbsp&nbsp&nbsp<strong>2º</strong> <?= get_string('welcome3.5') ?> <a href="<?= SERVERURL ?>restaurant/editImage">__<i class="fas fa-icons fa-lg"></i></a></p>
            <p class=""> &nbsp&nbsp&nbsp<strong>3º</strong> <?= get_string('welcome3.6') ?><a class="" type="button" href="<?= SERVERURL ?>restaurant/editmenudaily">__<i class="fas fa-edit fa-lg "></i><?= get_string('welcome3.7') ?></a></p>
        </div>
        <!-- template choose -->
        <div class="col-12 pt-4 ">
            <h3 class="text-center py-3">4.- <?= get_string('welcome4.1') ?></h3>
            <?php
            include "add/choosetemplate.php";
            ?>

            <?php
            include  "add/lines_aloc.php";
            ?>
        </div>
    </section>

    <section class=" col-md-12 col-12 row main-temas pb-4 mt-3 pt-4 border-top">
        <?php
        include    "lib/generadorqr/index.php";
        ?>
    </section>

    <div class="row">
        <?php
        include    "add/name-enterprice.php";
        ?>
    </div>
</div>
<script>
    getRow();

    function getRow() {
        $.get({
                url: "<?= SERVERURL ?>restaurant/getData"
            })
            .done((response) => {
                const task = JSON.parse(response);
                var section = task.data;
                if (section.nombre_empresa == '') {} else {
                    var index = "<strong><?= get_string('qr1.10'); ?></strong>"
                    index += " <p id='copiar'> <a href='<?= SERVERURL ?>" + task.data.nombre_web + "'> <?= SERVERURL ?>" + task.data.nombre_web + " </a>"
                    index += " <button class='btn' data-clipboard-target='#copiar'><i class='far fa-copy fa-lg'></i></button></p>"
                    $("#link_enterprice").html(index);
                }
            })
    }
</script>
<style>
    .main_presentacion div h4 {
        font-family: var(--letra_londrina);
        color: var(--color_primary);
        font-weight: 700;
        font-size: 3rem;
    }

    .btn-20 a,
    .btn-20 button,
    .btn-20 .btn {
        border-radius: 4px;
    }

    @media (max-width: 580px) {

        .main_presentacion div h4 {
            font-size: 2.5rem;
        }
    }

    @media (max-width: 380px) {
        .main_presentacion div h4 {
            font-size: 2.2rem;
        }
    }

    @media (max-width: 340px) {}
</style>