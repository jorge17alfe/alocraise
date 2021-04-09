<style>
    .logo {
        height: 48px;
    }

    .masthead,
    .signup-section {
        width: 100%;
        background: linear-gradient(to left, <?= $parameter->data->color_web1; ?>, <?= $parameter->data->color_web2; ?>) <?php if (!empty($parameter->data->portada[0])) { ?>, url("<?= SERVERURL ?>public/users/<?= $parameter->data->id_usuario; ?>/img/portada/<?= $parameter->data->portada[0]; ?>")<?php } ?>;
        background: -webkit-linear-gradient(to left, <?= $parameter->data->color_web1; ?>, <?= $parameter->data->color_web2; ?>)<?php if (!empty($parameter->data->portada[0])) { ?>, url("<?= SERVERURL ?>public/users/<?= $parameter->data->id_usuario; ?>/img/portada/<?= $parameter->data->portada[0]; ?>")<?php } ?>;
        background-size: cover;
        background-position: center;
        padding: 15%;
    }

    .menu_dia,
    .fondo_text {
        background-image: url("<?= SERVERURL ?>public/assets/app/img/pizarra.jpg");
        background-size: cover;
        background-position: center;
        width: 100%;
    }

    .icons {
        font-size: 1.5rem;
    }

    .carousel .carousel-control-next {
        color: <?= $parameter->data->color_web1 ?>;
    }

    .carousel .carousel-control-prev {
        color: <?= $parameter->data->color_web2 ?>;
    }

    .burguer {
        background: linear-gradient(to left, <?= $parameter->data->color_web1; ?>, <?= $parameter->data->color_web2; ?>);
        background: -webkit-linear-gradient(to left, <?= $parameter->data->color_web1; ?>, <?= $parameter->data->color_web2; ?>);
        z-index: 1000;
        height: 1.8rem;
        width: 3.5rem;
        position: fixed;
        bottom: 1.2rem;
        left: 45%;
        right: 45%;

    }

    @media (max-width: 992px) {
        .icons {
            font-size: 1.2rem;
        }
    }

    @media (max-width: 550px) {
        .icons {
            font-size: 1rem;
        }
    }
</style>