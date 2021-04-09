<a type="button" id="resta" class="resta" data-toggle="modal" data-target="#myModal"><small></small></a>
<!-- Modal content ressetablecer contraseña-->
<div class="modal fade " id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="m-auto text-center mx-5 registro p-5" style="padding-top:100px;" id="send_nameenterprice">
                <div class="my-5 ">
                    <h3>Enhorabuena <?= $parameter->data->id_usuario ?></h3>
                    <p class="font-weight-bold">Estás registrado en nuestro sistema.</p>
                    <p>Para empezar necesitamos que nos facilítes el nombre de tu negocio. <br>
                    </p>
                </div>
                <div class="mt-4 m-auto asd input-group-sm">
                    <input name="datos_textos[id_usuario]" id="id_usuario" type="hidden" class=" input-sm form-control m-auto" value="<?= $parameter->data->id_usuario ?>">
                    <input name="datos_textos[nombre_empresa]" id="nombre_empresa" class="input-sm form-control m-auto" required type="text" value="" placeholder="Ingresa el nombre de tu empresa, local ó negocio" />
                    <small id="loginHelpBlock" class="form-text text-muted avise">
                        Acepta mayúsculas, minúsculas, números. <br> Evitar carácteres especiales tales como \/|%€$''""ºª()?¿[]{} etc.....
                    </small>
                </div>

                <div class="btn-20 mt-4">
                    <input type="submit" class="btn " name="registrar_usuario" value="Enviar...">
                </div>
                <!-- <div class="respuesta  mt-3"></div> -->
            </form>
            <div class="">
                <button type="button" class="btn btn-default" id="close_modal" data-dismiss="modal"></button>
            </div>
        </div>

    </div>
</div>


<script>
    $(document).ready(function() {
        $("#send_nameenterprice").submit((e) => {
            e.preventDefault();
            if (confirm('Es muy importante que el nombre de tu empresa este bien. ¿Quieres registrar con este nombre?') == true) {
                $.post({
                        url: "<?= SERVERURL ?>restaurant/updateText",
                        data: $("#send_nameenterprice").serialize()
                    })
                    .done(function(response) {
                        // $('.respuesta').html(response)
                        // $("#link_enterprice").show('swing');
                        $("#close_modal").click();
                        $("#send_nameenterprice").trigger("reset");
                        setTimeout(getRow, 600);
                        setTimeout(getIframe, 600);
                        return false;
                    });
            }
        });



    })


</script>