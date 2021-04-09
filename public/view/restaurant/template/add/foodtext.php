<?php
switch ($parameter->data->moneda) {
    case 1:
        $parameter->data->moneda = '€';
        break;
    case 2:
        $parameter->data->moneda = '$';
        break;
    case 3:
        $parameter->data->moneda = '£';
        break;
}
$alergenos = ["altramuces", "apio", "azufresulfitos", "cacahuetes", "crustaceos", "frutoscascara", "gluten", "huevos", "lacteos", "moluscos", "mostaza", "pescado", "sesamo", "soya"];
$alergenostitle = ["altramuces", "apio", "azufre y sulfitos", "cacahuetes", "crustáceos", "frutos de cáscara", "gluten", "huevos", "lácteos", "moluscos", "mostaza", "pescado", "sésamo", "soja"];
if ($parameter->data->sw_menu_text == '1') {
?>
    <?php
    if (!empty($parameter->data->carta)) {
        for ($i = 0; $i < count($parameter->data->carta); $i++) {
    ?>
            <div class="carousel-item  <?php if ($i == 0) {
                                            echo "active";
                                        } ?>">
                <img class=" w-100" src="<?= SERVERURL ?>public/users/<?= $parameter->data->id_usuario; ?>/img/carta/<?= $parameter->data->carta[$i]; ?>">
            </div>
    <?php
        }
    }
} else { ?>

    <?php
    if (!empty($parameter->data->carta_text)) {
        for ($i = 0; $i < count($parameter->data->carta_text); $i++) { ?>
            <div class="carousel-item  <?php if ($i == 0) {
                                            echo "active";
                                        } ?> col-12 p-sm-5 p-4 fondo_text">
                <?php if (!empty($parameter->data->logo[0])) { ?>
                    <img height="100px " class="logo_menu rounded my-2 d-block mx-auto" src="<?= SERVERURL ?>public/users/<?= $parameter->data->id_usuario; ?>/img/logo/<?= $parameter->data->logo[0]; ?>">
                <?php } ?>
                <div class="text-center py-3 border-bottom">
                    <h4><?php echo $parameter->data->carta_text[$i][0] ?></h4>
                </div>
                <?php
                for ($a = 1; $a < count($parameter->data->carta_text[$i]); $a++) {
                ?>
                    <div class="text-left  row justify-content-between align-content-center <?php if (!empty($parameter->data->carta_text[$i][$a][2])) { echo "border-bottom ";} ?> py-2">
                        <p class="col-sm-9 col-8 mb-0 pb-0"><?php echo $parameter->data->carta_text[$i][$a][0] ?></p>
                        <p class="col-sm-3 col-4 text-right mb-0 pb-0">
                            <?php if (!empty($parameter->data->carta_text[$i][$a][2])) {
                                echo $parameter->data->carta_text[$i][$a][2] . $parameter->data->moneda;
                            } ?>
                        </p>
                        <p class="col-12 mb-0 pb-0"><small> <?php echo $parameter->data->carta_text[$i][$a][1] ?></small></p>
                        <div class="col-12 mb-0 pb-0">
                            <?php
                            for ($o = 3; $o < count($parameter->data->carta_text[$i][$a]); $o++) {
                                if (in_array($parameter->data->carta_text[$i][$a][$o], $alergenos)) {
                            ?>
                                    <img src="<?= assets("img/alergenos/ico/") . $parameter->data->carta_text[$i][$a][$o] . '.png'  ?>" alt="" style='width:23px;'>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>
    <?php
        }
    }
    ?>
    <?php
    require "alergenos.php";
    ?>
<?php
} ?>