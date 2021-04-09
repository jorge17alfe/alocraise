<div id="information_iframe" class="row information_iframe col-12 text-center my-5 pr-0 ">
    <h3 class='col-12 pr-0 mr-0 pb-3'> <?= get_string('template1.1') ?> </h3>
    <p class='col-12 pr-0 mr-0'><?= get_string('template1.2') ?> <a href="<?= SERVERURL ?>restaurant/edittext">__<i class="fas fa-edit fa-lg"></i></a></p>
    <p class='col-12 pr-0 mr-0'><?= get_string('template1.3') ?> <a href="<?= SERVERURL ?>restaurant/editImage">__<i class="fas fa-icons fa-lg"></i></a></p>
    <p class='col-12 pr-0 mr-0'><?= get_string('template1.4') ?> <a href="<?= SERVERURL ?>restaurant/editmenudaily">__<i class="fas fa-edit fa-lg"></i></a></p>
    <?php if ($_GET['url'] != 'restaurant/inicio') { ?>
        <p class='col-12 pr-0 mr-0'><?= get_string('template1.5') ?> <a href="<?= SERVERURL ?>restaurant/inicio">__<i class="fas fa-user fa-lg"></i></a></p>
    <?php } ?>
</div>
