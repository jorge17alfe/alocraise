<div id="main_img_menu" class="row mb-4 pr-0 col-md-12 col-12 border-top ">
    <form id='send_imageimg_menu' class='send_image row col-12 my-5 justify-content-center'>
        <input name='img_menu[id_usuario]' type='hidden' class='id_usuario' value='<?= $parameter->data->id_usuario; ?>'>
        <label for='' class='label col-form-label-sm text-right col-md-2 col-5 mr-2'> Editar imagen <input name='img_menu[img_menu][]' id="file2" id='img_menu' type='file' class='img_menu mt-1 input-sm form-control'></label>
        <input onclick="enviarFormImg('img_menu')"  class=' btn btn-sm btn-outline-primary col-lg-2 col-md-3 col-5 p-0 mr-2' type="button" style="height:25px;" value="Actualizar">
    </form>
    <div class="respuestaimg_menu respuesta"></div>

</div>
<script>
    let image=$("#file2")
    image.on("change",(e)=>{
        let reader = new FileReader();
        reader.readAsDataURL(e.target.files[0]);
        reader.onload=()=>{
           let parentx =image[0].parentElement
            parentx[0].after("<img src='"+reader.result+"' class='rounded'>")
        }
    })
   
    function enviarFormImg(data) {
        var form = new FormData($("#send_image" + data + "")[0]);
        $.ajax({
                type: 'POST',
                url: "<?= SERVERURL ?>restaurant/updateImages",
                data: form,
                cache: false,
                contentType: false,
                processData: false
            })
            // console.log(data)
            .done(function(response) {
                // $(".respuesta").html('');
                $(".respuesta" + data + "").html(response)
                $("#send_image" + data + "").trigger("reset");
                setTimeout(getRow, 100);
                return false;
            });


    }
</script>
<style>
    .img_menu {
        opacity: 0;
        overflow: hidden;
        width: 100%;
        height: 100%;
        position: absolute;
    }

    .label {
        display: block;
        position: relative;
        width: 160px;
        height: 40px;
        border-radius: 15px;
        background: linear-gradient(40deg, var(--color_primary), var(--color_third));
        box-shadow: 0 4px 7px rgba(0, 0, 0, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        transition: transform .2s ease-out;
    }

    .label:hover,
    img:hover {
        transform: scale(1.02);
        top: -5px
    }
</style>