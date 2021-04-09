<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;

    }

    ul {
        list-style: none;
    }

    body,
    a {
        color: <?= $parameter->data->color_font ?> !important;
    }

    a:hover {
        color: <?= $parameter->data->color_web1 ?> !important;

    }

    .portada,
    .footer,
    .menu-carta,
    .signup-section {
        background: -webkit-linear-gradient(to left, <?= $parameter->data->color_web1; ?>, <?= $parameter->data->color_web2; ?>);
        background: linear-gradient(to left, <?= $parameter->data->color_web1; ?>, <?= $parameter->data->color_web2; ?>);
    }

    .div-fixed {
        background: -webkit-linear-gradient(to left, rgb(255, 255, 255, 0.1), rgb(255, 255, 255, 0.9)), url("<?= SERVERURL ?>public/users/<?= $parameter->data->id_usuario; ?>/img/portada/<?= $parameter->data->portada[0]; ?>");
        background: linear-gradient(to left, rgb(255, 255, 255, 0.1), rgb(255, 255, 255, 0.9)), url("<?= SERVERURL ?>public/users/<?= $parameter->data->id_usuario; ?>/img/portada/<?= $parameter->data->portada[0]; ?>");
        background-size: cover;
        background-position: center;
        height: 100%;
        width: 100%;
    }


    h1 {
        font-size: 3.3rem;
    }

    .font-size,
    h4 {
        font-size: .9rem;
    }

    .menu_dia {
        background-image: url('<?= assets("app/img/fondo3.jpg") ?>');
        background-size: cover;
        background-position: center;
        width: 100%;
    }

    .btn-20 .btn {
        color: #000;
        border: solid 1px <?= $parameter->data->color_web1 ?>;
    }

    .btn-20 .btn:hover {
        color: <?= $parameter->data->color_web1 ?>;
        background-color: <?= $parameter->data->color_web1 ?>;
    }

    .network-social a i {
        font-size: 1.9rem;
        color: <?= $parameter->data->color_web1 ?>;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .network-social {
        top: 20%;
        z-index: 100;
        width: 35px;
    }

    .network-social a {
        margin-top: 1rem;
        height: 2.8rem;
        width: 2.8rem;
        -webkit-transition: all 0.6s ease-in;
        transition: all 0.6s ease-out;
    }

    .network-social a:hover {
        transform: rotate(360deg);

    }

    hr {
        border-width: 0.35rem;
        border-radius: 5px;
    }

    .carousel .fa-caret-right {
        color: <?= $parameter->data->color_web2 ?>;
    }

    .carousel .fa-caret-left {
        color: <?= $parameter->data->color_web1 ?>;
    }

    .burguer {
        background: linear-gradient(to left, <?= $parameter->data->color_web2; ?>, <?= $parameter->data->color_web1; ?>);
        background: -webkit-linear-gradient(to left, <?= $parameter->data->color_web2; ?>, <?= $parameter->data->color_web1; ?>);
        z-index: 1000;
        height: 1.8rem;
        width: 3.5rem;
        position: fixed;
        bottom: 1.2rem;
        left: 45%;
        right: 45%;

    }

    @media (max-width: 767px) {
        .menu_dia {
            width: 90%;
        }
    
    }

    @media (max-width: 580px) {

        .nav-link i,
        .network-social a i {
            font-size: 1.3rem;
        }

        .network-social a {
            width: 30px;
            height: 30px;

        }

        .titulo {
            font-size: 3rem;
        }

        .font-size,
        h4 {
            font-size: .85rem;
        }

        .logo {
            height: 43px;
        }

        .menu_dia {
            width: 100%;
        }



    }

    @media (max-width: 380px) {
        .nav-link i {
            font-size: 1.1rem;
        }


        .titulo {
            font-size: 2.5rem;
        }

        .font-size,
        h4 {
            font-size: .8rem;
        }

        .logo {
            height: 38px;
        }

    }

    @media (max-width: 340px) {

        h1,
        .titulo {
            font-size: 2rem;
        }

        h2,
        .font-size,
        h4 {
            font-size: .7rem;
        }
    }
</style>