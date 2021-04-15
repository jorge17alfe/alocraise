<div class="contenido container text-center" id="main_resetpass">
    <div class="mx-auto">
        <h2 class="logo"><?= config('title') ?></h2>
    </div>
    <form action="<?= SERVERURL ?>login/updatepassword" method="POST" class=" resetpass">
        <div class="mt-4">
            <input type="hidden" id="token" name="token" class="form-control m-auto" value="<?php
                                                                                            if (isset($_GET['i'])) {
                                                                                                echo $_GET['i'];
                                                                                            }
                                                                                            ?>" required>
        </div>
        <h3>Reestablece tu contraseña</h3>

        <div class="mt-4 mx-auto">
            <label for="Password">Contraseña</label>
            <input type="password" id="Password" name="password" class="form-control m-auto" minlength='5' maxlength="25" required>
            <small id="passwordHelpBlock" class="form-text text-muted">
                Acepta de 5 a 20 carácteres mayúsculas, minúsculas, números, y éstos carácteres especiales(_@$%&+)
            </small>
        </div>

        <div class="mt-4 mx-auto">
            <label for="repeatpassword">Repite contraseña</label>
            <input type="password" id="repeatpassword" name="confirm_password" class="form-control m-auto" minlength='5' maxlength="25" required>
            <small id="repeatpasswordHelpBlock" class="form-text text-muted"></small>
        </div>


        <div class="btn-20 mt-4 mx-auto">
            <input type="submit" class="btn" name="reset_password" value="Reestablecer contraseña">
        </div>
</div>
</form>
<?php require assetsphp("js/general"); ?>


<style>
    #main_resetpass {
        padding-top: 13%;
        padding-bottom: 12%;
    }

    .resetpass div {
        width: 20%;
    }


    @media (max-width: 767px) {
        .resetpass {
            font-size: .9rem;
        }

        .resetpass div {
            width: 40%;

        }

    }


    @media (max-width: 380px) {
        .resetpass {
            font-size: .8rem;
        }

        .resetpass div {
            width: 60%;
        }
    }

    @media (max-width: 340px) {}
</style>