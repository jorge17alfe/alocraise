<div class="contenido container main_login">
    <form class="m-auto text-center mx-5 login" id="login">
        <div class=" my-5">
            <h2 class="logo right" > <a href=""></a> <?= config('title') ?></h2>
   
        </div>
        <h3>Inicia Sesión</h3>
        <div id="respuesta"></div>
        <div class="mt-5 input-group-sm ">
            <label for="inputlogin">Usuario</label>
            <input type="text" id="inputlogin" name="login" class="form-control  m-auto" aria-describedby="passwordHelpBlock" value="<?php if (isset($_COOKIE['user'])) {
                                                                                                                                            echo $_COOKIE['user'];
                                                                                                                                        } ?>">
            <!-- <small id="loginHelpBlock" class="form-text text-muted">
         Mensaje de     
            </small> -->
        </div>
        <div class="mt-4 input-group-sm ">

            <label for="inputPassword5">Contraseña</label>
            <input type="password" id="inputPassword5" name="password" class="form-control  m-auto" aria-describedby="passwordHelpBlock" value="<?php if (isset($_COOKIE['user'])) {
                                                                                                                                                    echo $_COOKIE['pass'];
                                                                                                                                                } ?>">
            <!-- <small id="passwordHelpBlock" class="form-text text-muted">
                Mensaje 
            </small> -->
        </div>
        <div class="btn-20 mt-4">
            <button type="submit" class="btn btn-sm mb-2" name="inicio_sesion">Iniciar Sesión</button>
            <p class=" text-center ">¿No tienes cuenta? <a href="<?= SERVERURL ?>registro">Registrate...</a></p>
            <p class=" text-center mb-5"><small>¿Olvidaste tu contraseña?</small> <a type="button" id="resta" class="resta" data-toggle="modal" data-target="#myModal"><small>Reestablecer contraseña</small></a></p>
        </div>
    </form>
    <!-- Modal content ressetablecer contraseña-->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= SERVERURL ?>login/validateMailResetPassword" method="POST" class="my-3 text-center  reset_password">
                    <h3>Ingresa tu e-mail</h3>
                    <div class="input-group-sm ">
                        <label for="resetpass">Usuario</label>
                        <input type="email" id="email_reset_pas" name="email_reset_pass" class="form-control w-75 m-auto" aria-describedby="resetHelpBlock" required>
                    </div>
                    <div class="btn-20 mt-4">
                        <input type="submit" class="btn btn-sm" name="enviar_email" data-toggle="modal" data-target="#myModal" value="Reestablecer contraseña">
                    </div>
                </form>
                <div class="">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>


</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    .login {
        padding-top: 13%;
        padding-bottom: 12%;
    }

    .login div input,
    .login div button {
        width: 20%;
    }

    .modal {
        background-color: var(--color_fondo);
    }

    .modal-content {
        margin-top: 25%;
    }

    @media (max-width: 767px) {
        div label {
            font-size: .9rem;
        }

        .login div input,
        .login div button {
            width: 40%;
        }
    }

    @media (max-width: 380px) {

        .login div input,
        .login div button {
            width: 60%;
        }
    }
</style>
<script>
    $(document).ready(function() {
        let edit = false;
        $("#login").submit((e) => {
            e.preventDefault();
            $.ajax({
                    type: 'POST',
                    url: "<?= SERVERURL ?>login/checklogin",
                    data: $("#login").serialize()
                })
                .done(function(res) {
                    // $('#respuesta').append('<div id="resss" class="row col-12 justify-content-center "><p id="reg" style="background:var(--color_third);" class="text-danger p-3 col-md-3 col-8">' + res + '</p></div>')
                    $('#respuesta').append($('<div>',{"id":"resss" ,"class":"row col-12 justify-content-center "})
                                                    .append($("<p>",{"id":"reg","style":"background:var(--color_third);" ,"class":"text-danger rounded p-3 col-md-3 col-8"}).html(res)
                                                     ))
                })
            $("#login").trigger("reset");
            setTimeout(()=>{
                $("#reg").fadeOut("slow",()=>{
                    $("#resss").remove()
                });
            }, 2500)
            return false;
        });
    });
</script>
<?php require assetsphp("js/general"); ?>