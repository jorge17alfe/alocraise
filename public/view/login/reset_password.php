<div class="contenido container pb-2 pt-5" id="main_registro">
    <form action="<?=SERVERURL?>login/updatepassword" method="POST" class="m-auto text-center mx-5 registro">
        <div class="mt-4">
            <input type="hidden" id="token" name="token" class="form-control m-auto" value="<?php 
            if(isset( $_GET['i'])){
            echo $_GET['i'];  }
            ?>" required>
        </div>
        <h3>Reestablece tu contraseña</h3>

        <div class="mt-4">
            <label for="Password">Contraseña</label>
            <input type="password" id="Password" name="password" class="form-control m-auto" minlength='5' maxlength="25" required>
            <small id="passwordHelpBlock" class="form-text text-muted">
                Acepta de 5 a 20 carácteres mayúsculas, minúsculas, números, y éstos carácteres especiales(_@$%&+)
            </small>
        </div>

        <div class="mt-4">
            <label for="repeatpassword">Repite contraseña</label>
            <input type="password" id="repeatpassword" name="confirm_password" class="form-control m-auto" minlength='5' maxlength="25" required>
            <small id="repeatpasswordHelpBlock" class="form-text text-muted"></small>
        </div>


        <div class="btn-20 mt-4">
            <input type="submit" class="btn" name="reset_password" value="Reestablecer contraseña">
        </div>
</div>
</form>


</div>


<style>
    .registro {
        padding-top: 17%;
        padding-bottom: 18%;
    }

    .registro div input,
    .registro div a {
        width: 50%;
    }


    @media (max-width: 580px) {
        .registro {
            font-size: .9rem;
        }

        .registro div input,
        .registro div button {
            width: 70%;

        }

    }


    @media (max-width: 380px) {
        .registro {
            font-size: .8rem;
        }
    }

    @media (max-width: 340px) {}
</style>