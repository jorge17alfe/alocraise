
<!-- logo -->
<div id="main_logo" class="row mb-2 pr-0  col-md-12 col-12 border-top ">
    <form id='send_imagelogo' class='send_image row  col-12 mt-4 justify-content-around'>
        <input name='image[id_usuario]' type='hidden' class='id_usuario' value='<?= $parameter->data->id_usuario; ?>'>
        <label for='' class='label col-form-label-sm text-right col-md-3 col-5 mr-2'> Editar logo <input name='image[logo][]' id='logo' type='file' class='logoapp mt-1 input-sm form-control'></label>
        <input onclick="enviarForm('logo')" class=' btn btn-sm btn-outline-primary col-lg-2 col-md-3 col-5  mb-2 mr-2' type="button" value="Guardar">
    </form>
    <div class=" col-12 d-flex justify-content-center pb-2">
        <div class="respuestalogo  bg-info mt-2 col-md-5 col-10" style="border-radius:5px"></div>
    </div>
</div>
<!-- Portada -->
<div id="main_portada" class="row mb-4 pr-0 col-md-12 col-12 border-top pt-2">
    <button id="addportada" onclick="addrow('portada')" class="btn btn-outline-success btn-sm col-md-3 col-sm-4 col-5 my-3">+ portada</button>
    <a href='javascript:void[0]' onclick="hideShowSection('portada')" id="addcarta" class=" btn-sm col-md-3 col-sm-4 col-5 my-3">ver portada</a>
    <form id='send_imageportada' class='hide-showportada send_image row  col-12  mb-2 justify-content-between close-all-section ' enctype='multipart/form-data' method="POST">
        <input name='image[id_usuario]' type='hidden' class='id_usuario' id="idportada" value='<?= $parameter->data->id_usuario; ?>'>
        <input onclick="enviarForm('portada')" class='addportada btn btn-sm btn-outline-primary col-12  my-2' type="button" value="Guardar">
    </form>
    <div class=" col-12 d-flex justify-content-center pb-2">
        <div class="respuestaportada   bg-info mt-2 col-md-5 col-10" style="border-radius:5px"></div>
    </div>
</div>