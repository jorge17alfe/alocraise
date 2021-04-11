<?php
$design = ["aaron", "liam", "magui", "magdy"];
?>
<li class="nav-item  dropdown ">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?= get_string('design') . ' ' . config('title') ?>
    </a>
    <div class="dropdown-menu <?= $parameter[0] ?> " aria-labelledby="navbarDropdown" style="background-color:<?= $parameter[0] ?>;">
        <?php foreach ($design as $k => $v) {
            if (!isset($_GET["url"]) || $_GET["url"] != "design/example/" . $v) {
        ?>
                <a class="dropdown-item <?= $parameter[1] ?>" href="<?= SERVERURL ?>design/example/<?= $v ?>"><?= get_string('design') ?> <?= ucwords($v) ?></a>
        <?php
            }
        }

        ?>

    </div>
</li>
