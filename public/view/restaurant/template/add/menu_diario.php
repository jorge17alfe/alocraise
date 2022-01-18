<?php
if (!isset($parameter->data->sw_elements['sw_menu'])) { ?>
    <div class="py-5">
        <?php if (!empty($parameter->data->logo[0])) { ?>
            <img height="100px " class="logo_menu rounded mb-4" src="<?= SERVERURL ?>public/users/<?= $parameter->data->id_usuario; ?>/img/logo/<?= $parameter->data->logo[0]; ?>">
        <?php } ?>
        <p class="mb-2"><strong>Menú para hoy:</strong></p>
        <p class="mb-2"><strong> <?php [$day, $dayweek, $month, $year] = fecha_spanish();
                                    echo  ucwords($dayweek) . ', ' . $day . ' de ' . $month . ' del ' . $year; ?></strong></p> <br>
        <?php if (!empty($parameter->menu->primero) || !empty($parameter->menu->segundo) || !empty($parameter->menu->postre)) { ?>

            <?php
            $menu_sections = [];
            $menu_sect = [];
            foreach ($parameter->menu as $k => $v) {
                array_push($menu_sections, $k);
            }

            for ($i = 2; $i < 5; $i++) {
                array_push($menu_sect, $menu_sections[$i]);
            }

            foreach ($menu_sect as $k => $value) {
                $d = (count($parameter->menu->$value) <= 1) ? 'nuestro ' . $value  : 'nuestros ' . count($parameter->menu->$value) . ' ' . $value . 's';
            ?>
             

                <h5 >
                    <u>A escoger entre <?= $d ?></u>
                </h5>
                <?php
                for ($i = 0; $i < count($parameter->menu->$value); $i++) {
                    echo "<p class='py-0 my-0 '><small>" . ($i + 1) . "º </small>" . $parameter->menu->$value[$i][0] . "</p>";
                ?>
                    <div class="col-12 mb-0 pb-0">
                        <?php
                        for ($o = 1; $o < count($parameter->menu->$value[$i]); $o++) {
                            if (in_array(strtolower($parameter->menu->$value[$i][$o]), $alergenos)) {
                        ?>
                                <img src="<?= assets("img/alergenos/ico/") . strtolower($parameter->menu->$value[$i][$o]) . '.png'  ?>" alt="" style='width:23px;'>
                        <?php
                            }
                        }
                        ?>
                    </div>

                <?php } ?>
                <br>
            <?php } ?>
        <?php } ?>

        <br>
        <p>
           <u> <strong> <?php echo $parameter->menu->incluye . '<br />'; ?></strong></u>
        </p>
        <p class="">
            <?php

            echo number_format($parameter->menu->precio, 2) . $parameter->data->moneda . ' IVA Incluido';
            ?>
        </p>
    </div>
<?php } else { ?>
    <img class="img_menu w-100 " src="<?= SERVERURL ?>public/users/<?= $parameter->menu->id_usuario; ?>/img/img_menu/<?= $parameter->menu->img_menu[0]; ?>">
<?php } ?>