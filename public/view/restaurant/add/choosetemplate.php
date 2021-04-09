<form id="main_plantilla" class="main_plantilla row mb-3 text-center ">
    <input type="hidden" name="plantilla[id_usuario]" value="<?= $parameter->data->id_usuario; ?>">
    <h3 class="text-center col-12 pb-3"><?= get_string('template0') ?> </h3>
    <div class="form-check pl-5 col-md-3 col-6 pb-2">
        <input class="plantilla form-check-input " type="radio" name="plantilla[plantilla]" id="plantillaaaron" value='aaron'>
        <label class="form-check-label" for="plantilla"><?= get_string('design') ?> Áaron</label>
    </div>
    <div class="form-check pl-5 col-md-3 col-6 pb-2">
        <input class="plantilla form-check-input" type="radio" name="plantilla[plantilla]" id="plantillaliam" value='liam'>
        <label class="form-check-label" for="plantilla"><?= get_string('design') ?> Liam</label>
    </div>
    <div class="form-check pl-5 col-md-3 col-6 pb-2">
        <input class="plantilla form-check-input" type="radio" name="plantilla[plantilla]" id="plantillamagui" value='magui'>
        <label class="form-check-label " for="plantilla"><?= get_string('design') ?> Magui</label>
    </div>
    <div class="form-check pl-5 col-md-3 col-6 pb-2">
        <input class="plantilla form-check-input" type="radio" name="plantilla[plantilla]" id="plantillamagdy" value='magdy'>
        <label class="form-check-label " for="plantilla"><?= get_string('design') ?> Magdy</label>
    </div>
</form>
<!-- <div class="respuesta"></div> -->
<div id="main_iframe" class=" ">
    <iframe id="iframe" class="iframe w-100 rounded" src="" frameborder="0"> </iframe>
    <p class="text-center pt-2"><strong> <?= get_string('template1') ?> </strong> <a class="  w-100" href="<?= SERVERURL . $parameter->data->nombre_web ?>"> <i class="fas fa-eye fa-2x"></i></a> </p>
</div>

<!-- script -->
<script>
    $(document).ready(function() {
        getIframe();
        $("#main_plantilla").change((e) => {
            e.preventDefault();
            $.post({
                    url: "<?= SERVERURL ?>restaurant/updateText",
                    data: $("#main_plantilla").serialize()
                })
                .done(function(response) {
                    // $('.respuesta').html(response)
                    $("#main_plantilla").trigger("reset");
                    setTimeout(getIframe, 200);
                    return false;
                });
        });
    })


    function getIframe() {
        $.get({
                url: "<?= SERVERURL ?>restaurant/getData"
            })
            .done(function(response) {
                const datos = JSON.parse(response);


                var plantilla = datos.data.plantilla;
                $(".plantilla").removeAttr("checked");
                $("#plantilla" + plantilla + "").attr("checked", "checked");
                var namesection = ["logo", "portada", "carta", "bebida", "sobre_nosotros"]
                var section = datos.data;
                if (section.nombre_empresa == '') {
                    $("#myModal").modal("show");
                }
                if (section.nombre_empresa == '') {
                    // $("#information_iframe").show(500);
                    $("#main_iframe").hide(500);
                } else {
                    // $("#information_iframe").hide(500);
                    $("#main_iframe").show(500);
                    $("#iframe").attr("src", "<?= SERVERURL ?>" + datos.data.nombre_web + "");
                }
            })
    }
</script>