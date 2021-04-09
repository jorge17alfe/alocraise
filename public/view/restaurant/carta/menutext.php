<div class="container py-5 pr-0">
    <!-- form secciones -->
    <div class="col-12 row  pr-0">
        <div class="row col-12 justify-content-sm-around justify-content-center  input-group-sm btn-20 pr-0">
            <a href='javascript:void[0]' onclick="hideShowSection('carta_text')" id="seecarta_text" class=' form-control btn   col-md-4 col-sm-5 col-9 mb-2'>EDITAR COMIDA <i class="fas fa-utensils"></i></a>
            <a href='javascript:void[0]' onclick="hideShowSection('bebida_text')" id="seebebida_text" class=' form-control btn   col-md-4 col-sm-5 col-9'>EDITAR BEBIDA <i class="fas fa-glass-cheers"></i></a>
        </div>
        <div class="row  col-12 text-right mt-3 input-group-sm justify-content-center pr-0 font-weight-bold">
            <button id="add_carta_text" onclick="addsectionText('carta_text')" class="form-control btn btn_carta_text close-all-section   col-md-4 col-sm-5 col-10 px-4 font-weight-bold" style="color:var(--color_primary);">+ Sección <i class="fas fa-utensils"></i></button>
            <button id="add_bebida_text" onclick="addsectionText('bebida_text')" class="form-control btn btn_bebida_text close-all-section  col-md-4 col-sm-5 col-10 px-4 font-weight-bold" style="color:var(--color_primary);">+ Sección <i class="fas fa-glass-cheers"></i></button>
        </div>
    </div>
    <form id='menu_text' name='menu' class='row  col-sm-12 col-12  my-2  pr-0 mr-0'>
        <input type="hidden" id="id_usuario" value="<?= $parameter->data->id_usuario ?>">
        <input type="hidden" name="datos_textos[id_usuario]" value="<?= $parameter->data->id_usuario ?>">
        <div id="addsectioncarta_text" class="row col-12 hide-showcarta_text close-all-section justify-content-around mr-0 pr-0">
        </div>
        <div id="addsectionbebida_text" class="row col-12 hide-showbebida_text close-all-section justify-content-around mr-0 pr-0">
        </div>
        <div class="row col-12 justify-content-center mr-0 pr-0">
            <div class="respuestamenuText  my-2 col-md-5 col-9 badge badge-info py-2 mr-0 pr-0" style="border-radius:5px; margin-right:45px;"></div>
        </div>
        <div class="row col-12 justify-content-sm-around justify-content-center  input-group-sm pr-0 show-btn-save">
            <a class="btn btn-sm btn-outline-primary  col-md-4 col-sm-5 col-9 mt-2 pr-0" id="enviar_menu_text" type="button">Guardar</a>
            <a class="btn btn-sm btn-outline-danger  col-md-4 col-sm-5 col-9 mt-2 pr-0" name="borrar_" onclick="deleteAll('menu_text','')">Borrar Menú</a>
        </div>
    </form>

</div>
<script>
    $(document).ready(() => {
        $("#enviar_menu_text").click((e) => {
            e.preventDefault();
            $.ajax({
                    type: 'POST',
                    url: "<?= SERVERURL ?>restaurant/updateTextMenu",
                    data: $("#menu_text").serialize(),
                })
                .done(function(response) {
                    console.log(response);
                    showresponse("respuestamenuText", response)
                    hideresponse("respuestamenuText")
                    getRow();
                    return false;
                })
        });
    })

    let num = 1000;

    function addsectionText(data) {
        var section = "<div  class='input-sm row  py-1 col-md-4 col-6 input-group-sm borrarsection'>"
        section += "<label class='input-group-sm col-12 '>+ Sección <input name='datos_textos[" + data + "][][0]' class=' form-control col-12 text-primary font-weight-bold' type='text'></label>"
        section += "</div>"
        $('#addsection' + data).append(section);
    }

    function addindexText(section, data) {

        var index = "<div  class='close-all-items input-sm row  py-1 col-12 input-group-sm justify-content-between border-top pt-3'>"
        index += "<input name='datos_textos[" + section + "][" + data + "][" + num + "][0]' class=' form-control col-3  ' type='text' placeholder='Nombre de producto' value=''>"
        index += "<input name='datos_textos[" + section + "][" + data + "][" + num + "][1]' class=' form-control col-6  ' type='text' placeholder='Descripción' value=''>"
        index += "<input name='datos_textos[" + section + "][" + data + "][" + num + "][2]' class=' form-control col-2  ' type='text' placeholder='Precio' value=''>"
        index += "<a href='javascript:void[0]' onclick='showalergenos(\"" + section + "\"," + data + "," + num + ")' class='text-info ' ><small>ver +</small></a>"
        index += "<div  class='show_alergenos" + section + data + num + " close_alergenos input-sm row  py-1 ml-3 col-12 input-group-sm justify-content-between' style=' display:none;'>"
        for (var i = 3; i < 17; i++) {
            index += "<div  class=' input-sm row  py-3 input-group-sm col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 justify-content-center align-content-center'>"
            index += "<div  class=' col-12 pb-0 mb-0'>"
            index += "<p class='text-uppercase text-center pb-0 mb-0' style='font-size:10px; line-height: 70%;'><small>" + alergenostitle[i] + "</small></p>"
            index += "</div>"
            index += "<div  class='' style='height:45px;'>"
            index += "<img class='mx-auto d-block' src='<?= assets("img/alergenos/ico/") ?>" + alergenos[i] + ".png' name='alergenoimg" + i + "' style='width:45px; height:45px;'>"
            index += "<input  type='checkbox' name='datos_textos[" + section + "][" + data + "][" + num + "][" + i + "]' class='position-relative mb-0' style='width:13px; top:-20px; right:-15px;' value='" + alergenos[i] + "'>"
            index += "</div>"
            index += "</div>"
        }
        index += "</div>"
        index += "</div>"
        $('#main' + section + data).append(index);
        num++;
    }

    function upDownItem(section, group, item, suma) {
        var user = $("#id_usuario").val();
        // console.log(section)
        $.post({
                url: "<?= SERVERURL ?>restaurant/upDownItem",
                data: {
                    "user": user,
                    "section": section,
                    "group": group,
                    "item": item,
                    "suma": suma,
                }
            })
            .done(function(response) {
                getRow();
                if (item != '') {
                    hideShowSection(section);
                    setTimeout(() => {
                        showItems(section, group);
                    }, 200)
                }
                return false;
            });
    }

    function closeItems(a, b) {
        $(".btn_show_items" + a + b).show("swing");
        $(".btn_close_items" + a + b).hide("swing");
        $(".hide-show" + a + b).hide('swing')
    }

    function hideShowSection(a) {
        $(".close-all-section").hide('swing')
        $(".show-btn-save").show('swing')
        $(".hide-show" + a).show('swing')
        $("#add_" + a).show('swing')
    }

    function showItems(a, b) {
        $(".close-all-items").hide('swing')
        $(".btn_show_items").show("swing");
        $(".btn_close_items").hide("swing");
        $(".btn_show_items" + a + b).hide("swing");
        $(".btn_close_items" + a + b).show("swing");
        $(".hide-show" + a + b).show('swing')
        $(".show-btn-save").show('swing')

    }

    function deleteRowItem(item, datas, section, group) {
        var user = $("#id_usuario").val();
        // console.log(item + DataTransferItem + section + group)
        $.post({
                url: "<?= SERVERURL ?>restaurant/deleteRow",
                data: {
                    ["id_usuario"]: user,
                    [section]: {
                        [datas]: ''
                    },
                    "item": item,
                    "group": group
                }
            })
            .done(function(response) {
                console.log(response)
                $("#main" + section + datas).fadeOut(600, function() {
                    getRow();
                    if (item != '') {
                        hideShowSection(section);
                        setTimeout(() => {
                            showItems(section, datas);
                        }, 200)
                    }
                });
            })
    }
</script>