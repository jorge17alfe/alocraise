<div class="carousel-item p-sm-5 p-4 fondo_text ">
    <div class="row">
        <?php if (!empty($parameter->data->logo[0])) { ?>
            <img height="100px " class="logo_menu rounded my-4 d-block mx-auto" src="<?= SERVERURL ?>public/users/<?= $parameter->data->id_usuario; ?>/img/logo/<?= $parameter->data->logo[0]; ?>">
        <?php } ?>
        <div class="text-center py-4 col-12">
            <h4 class="text-uppercase ">alergenos información</h4>
        </div>
        <div class=" row col-12  justify-content-around pr-0 mr-0">
            <?php
            for ($o = 0; $o < 14; $o++) {
            ?>
                <div class="row col-lg-3 col-md-3 col-sm-4 col-6">
                    <img src="<?= assets("img/alergenos/ico/") . $alergenos[$o] . '.png'  ?>" alt="" class="col-12" style='width:38px;'>
                    <p class="text-center text-uppercase pt-0 p col-12" style="bottom:12px; line-height: 70%;"><small><small><?= $alergenostitle[$o] ?></small></small></p>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>