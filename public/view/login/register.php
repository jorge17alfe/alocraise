<div class="contenido container" id="main_registro">
<?php require assetsphp("js/general"); ?>
    <form class="m-auto text-center p-md-5 px-0 registro " id="registro">
        <div class=" my-5">
            <h2 class="logo right" style="color:var(--color_primary)" href=""><?= config('title') ?></h2>
            <script>
                $(".logo").on("click", function() {
                    window.location = '<?= SERVERURL ?>';
                })
            </script>
        </div>
        <h3>Regístrate...</h3>
        <small id="respuesta" class="form-text text-muted text-danger"> </small>
        <div class="mt-4 input-group-sm ">
            <label for="inputlogin">Usuario</label>
            <input type="text" id="inputlogin" name="usuario" class=" form-control m-auto" minlength='5' maxlength="50" required>
            <small id="loginHelpBlock" class="form-text text-muted">
                Acepta de 5 a 40 carácteres mayúsculas, minúsculas, <br>números, barra baja y arroba(_@)
            </small>
        </div>
        <div class="mt-4 input-group-sm ">
            <label for="inputPassword5">Contraseña</label>
            <input type="password" id="inputPassword5" name="password" class="input-sm form-control m-auto" minlength='5' maxlength="25" required>
            <small id="passwordHelpBlock" class="form-text text-muted">
                Acepta de 5 a 20 carácteres mayúsculas, minúsculas, <br>números, y éstos carácteres especiales(_@$%&+)
            </small>
        </div>
        <div class="mt-4 input-group-sm ">
            <label for="inputrepeatpassword">Repite contraseña</label>
            <input type="password" id="inputrepeatpassword" name="confirm_password" class="input-sm form-control m-auto" minlength='5' maxlength="25" required>
            <small id="repeatpasswordHelpBlock" class="form-text text-muted">

            </small>
        </div>
        <div class="mt-4 input-group-sm ">
            <label for="inputemail">E-mail</label>
            <input type="email" id="inputemail" name="email" class="input-sm form-control m-auto" required>
            <small id="emailHelpBlock" class="form-text text-muted">

            </small>
        </div>
        <div class="mt-4 input-group-sm ">
            <label for="inputrepeatemail">Comfirma E-mail</label>
            <input type="email" id="inputrepeatemail" name="confirm_email" class="input-sm form-control m-auto" required>
            <small id="respuespta" class="form-text text-muted text-danger">

        </div>
        <div class="btn-20 mt-4">
            <input type="submit" class="btn btn-sm " name="registrar_usuario" value="Registrate...">
            <p class=" text-center mb-5">¿Ya tienes cuenta? <a href="<?= SERVERURL ?>iniciar-sesion">Inicia sesión...</a></p>
        </div>

    </form>


</div>


<style>
    .registro {
        padding-top: 2%;
        padding-bottom: 1%;
    }

    .registro div input,
    .registro div button
     {
        width: 25%;
    }

    @media (max-width: 767px) {
        .registro {
            font-size: .9rem;
        }

        .registro div input,
        .registro div button {
            width: 40%;
        }

    }

    @media (max-width: 380px) {
        .registro {
            font-size: .8rem;
        }
        .registro div input,
        .registro div button {
            width: 60%;
        }
    }

    @media (max-width: 340px) {}
</style>
<script>
    $(document).ready(function() {
        let edit = false;
        $("#registro").submit((e) => {
            e.preventDefault();
            $.ajax({
                    type: 'POST',
                    url: "<?= SERVERURL ?>login/register",
                    data: $("#registro").serialize()
                })
                .done(function(res) {
                    $('#respuesta').append('<p id="reg">' + res + '</p>')
                })
            $("#registro").trigger("reset");
            $("#reg").remove();
            return false;
        });
    });
</script>