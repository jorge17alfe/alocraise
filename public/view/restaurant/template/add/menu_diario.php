<?php if ($parameter->menu->sw_menu == 1 && !empty($parameter->menu->img_menu[0])) { ?>
    <img class="img_menu w-100 " src="<?= SERVERURL ?>public/users/<?= $parameter->menu->id_usuario; ?>/img/img_menu/<?= $parameter->menu->img_menu[0]; ?>">
<?php } ?>
<?php if ($parameter->menu->sw_menu == null) { ?>
    <div class="py-5">
        <?php if (!empty($parameter->data->logo[0])) { ?>
            <img height="100px " class="logo_menu rounded mb-4" src="<?= SERVERURL ?>public/users/<?= $parameter->data->id_usuario; ?>/img/logo/<?= $parameter->data->logo[0]; ?>">
        <?php } ?>
        <p class="mb-2"><strong>Menú para hoy:</strong></p>
        <p class="mb-2"><strong> <?php [$day, $dayweek, $month, $year] = fecha_spanish();
                                    echo  ucwords($dayweek) . ', ' . $day . ' de ' . $month . ' del ' . $year; ?></strong></p>
        <?php if (!empty($parameter->menu->primero) || !empty($parameter->menu->segundo)) { ?>
            <h5 class="">
                A escoger entre nuestros <?= count($parameter->menu->primero) ?> primeros:
            </h5>
            <?php
            for ($i = 0; $i < count($parameter->menu->primero); $i++) {
                echo "<p class='py-0 my-0'><small>" . ($i + 1) . "º </small>" . $parameter->menu->primero[$i] . "</p>";
            }
            ?>
            <br>

            <h5 class="">
                y escoger entre nuestros <?= count($parameter->menu->segundo) ?> segundos:
            </h5>
            <?php
            for ($i = 0; $i < count($parameter->menu->segundo); $i++) {
                echo "<p class='py-0 my-0'><small>" . ($i + 1) . "º </small>" . $parameter->menu->segundo[$i] . "</p>";
            }
            ?>
        <?php } ?>

        <p>
            <strong> <?php echo $parameter->menu->incluye . '<br />'; ?></strong>
        </p>
        <p class="">
            <?php

            echo number_format($parameter->menu->precio, 2) . $parameter->data->moneda . ' IVA Incluido';
            ?>
        </p>
    </div>
<?php } ?>