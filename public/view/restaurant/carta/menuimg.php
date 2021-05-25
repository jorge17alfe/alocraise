<!-- Carta -->
<div id="main_carta" class="row mb-4 pr-0 col-md-12 col-12 border-top pt-2 ">
    <button id="addcarta" onclick="addrow('carta')" class="btn btn-outline-success btn-sm col-md-3 col-sm-4 col-5 my-3">+ carta</button>
    <a href='javascript:void[0]' onclick="hideShowSection('carta', 'CARTA')" id="btn_show_carta" class="btn_show_section btn-sm col-md-3 col-sm-4 col-5 my-3">VER CARTA</a>
    <form id='send_imagecarta' class='hide-showcarta send_image row  col-12  mb-2 justify-content-between close-all-section ' enctype='multipart/form-data' method="POST">
        <input name='image[id_usuario]' type='hidden' class='id_usuario' id="idcarta" value='<?= $parameter->data->id_usuario; ?>'>
        <input onclick="enviarForm('carta')" class='addcarta btn btn-sm btn-outline-primary col-12  my-2' type="button" value="Guardar">
    </form>
    <div class=" col-12 d-flex justify-content-center pb-2">
        <div class="respuestacarta   bg-info mt-2 col-md-5 col-10" style="border-radius:5px"></div>
    </div>
</div>
<!-- Bebida -->
<div id="main_bebida" class="row pr-0 col-md-12 col-12 border-top pt-2 ">
    <button id="addbebida" onclick="addrow('bebida')" class="btn btn-outline-success btn-sm col-md-3 col-sm-4 col-5 my-3">+ bebida</button>
    <a href='javascript:void[0]' onclick="hideShowSection('bebida', 'BEBIDA')" id="btn_show_bebida" class="btn_show_section btn-sm col-md-3 col-sm-4 col-5 my-3">VER BEBIDA</a>
    <form id='send_imagebebida' class='hide-showbebida send_image row  col-12  mb-2 justify-content-between close-all-section ' enctype='multipart/form-data' method="POST">
        <input name='image[id_usuario]' type='hidden' class='id_usuario' id="idbebida" value='<?= $parameter->data->id_usuario; ?>'>
        <input onclick="enviarForm('bebida')" class='addbebida btn btn-sm btn-outline-primary col-12  mt-2' type="button" value="Guardar">
    </form>
    <div class=" col-12 d-flex justify-content-center ">
        <div class="respuestabebida   bg-info mt-2 col-md-5 col-10" style="border-radius:5px"></div>
    </div>
</div>
<script>
    getRow();
    var alergenos = {
        // 3: "no-available",
        4: "altramuces",
        5: "apio",
        6: "azufresulfitos",
        7: "cacahuetes",
        8: "crustaceos",
        9: "frutoscascara",
        10: "gluten",
        11: "huevos",
        12: "lacteos",
        13: "moluscos",
        14: "mostaza",
        15: "pescado",
        16: "sesamo",
        17: "soya"
    }

    var alergenostitle = {
        // 3: "no disponible",
        4: "altramuces",
        5: "apio",
        6: "azufre y sulfitos",
        7: "cacahuetes",
        8: "crustáceos",
        9: "frutos de cáscara",
        10: "gluten",
        11: "huevos",
        12: "lácteos",
        13: "moluscos",
        14: "mostaza",
        15: "pescado",
        16: "sésamo",
        17: "soja"
    }

    function enviarForm(data) {
        var form = new FormData($("#send_image" + data + "")[0]);
        // console.log(form);
        $.ajax({
                type: 'POST',
                url: "<?= SERVERURL ?>restaurant/updateImages",
                data: form,
                cache: false,
                contentType: false,
                processData: false
            })
            .done((response) => {
                $(".main" + data).remove();
                $(".deleteadd").remove();
                console.log(response);
                showresponse("respuesta" + data, response)
                setTimeout(getRow, 100);
                setTimeout(getIframe, 200);
                return false;
            });
    }

    function getRow(parameter = null) {
        $.ajax({
                url: "<?= SERVERURL ?>restaurant/getData",
                type: "GET"
            })
            .done((response) => {
                // console.log(response);
                const task = JSON.parse(response);
                // console.log(task);




                //  ---------------------------------------------MENU TEXT---------------------------------------------
                $(".borrarsection").remove();
                const section2 = ["carta_text", "bebida_text"]
                for (var s = 0; s < section2.length; s++) {
                    //    console.log(task.data[section2[s]]);
                    var result = task.data[section2[s]];
                    for (var a = 0; a < result.length; a++) {
                        var index = "<div id='main" + [section2[s]] + a + "' class='borrarsection input-sm row border-top py-3 col-12 row justify-content-between pl-3 pr-0'>"
                        index += "<input class='col-md-3 col-12 text-center  text-primary font-weight-bold' type='text' name='datos_textos[" + section2[s] + "][" + a + "][0]' value='" + task.data[section2[s]][a][0] + "'>"

                        index += "<a href='javascript:void[0]' onclick='showItems(\"" + section2[s] + "\"," + a + ")' class='btn_show_items" + section2[s] + a + " btn_show_items btn text-info col-3'>ver items</a>"
                        index += "<a href='javascript:void[0]' onclick='closeItems(\"" + section2[s] + "\"," + a + ")' class='btn_close_items" + section2[s] + a + " btn_close_items btn text-info col-3'>cerrar items</a>"

                        index += "<a href='javascript:void[0]' onclick='addindexText(\"" + section2[s] + "\"," + a + ")'  style='color:var(--color_primary);' class='btn  col-3'><small>+ producto</small></a>"
                        index += "<div class=' col-lg-2  col-sm-3 col-4 row justify-content-between'>"
                        index += "<a href='javascript:void[0]' onclick='upDownItem(\"" + section2[s] + "\"," + a + ",\"\",-1)' style='color:var(--color_primary);' class=' text-left'><i class='fas fa-arrow-up'></i></a>"
                        index += "<a href='javascript:void[0]' onclick='upDownItem(\"" + section2[s] + "\"," + a + ",\"\",1)' style='color:var(--color_primary);' class=' text-left'><i class='fas fa-arrow-down'></i></a>"
                        index += "<a href='javascript:void[0]' onclick='deleterow(" + a + ",\"" + section2[s] + "\",\"datos_textos\")' class='text-danger text-left'><i class='fas fa-trash'></i></a>"
                        index += "</div>"
                        if (task.data[section2[s]][a].length > 1) {
                            index += "<div class=' hide-show" + section2[s] + a + " row justify-content-between col-12 text-left close-all-items  px-0'>"
                            index += "<label class='col-3 text-center font-weight-bold'>Name</label>"
                            index += "<label class='col-5 text-center font-weight-bold'>Descripcion</label>"
                            index += "<label class='col-3 text-center font-weight-bold'>Price</label>"
                            index += "</div>"
                            for (var i = 1; i < task.data[section2[s]][a].length; i++) {
                                index += "<div class=' hide-show" + section2[s] + a + " input-sm row  py-1 col-12 input-group-sm justify-content-between close-all-items  px-0 mb-2'> "
                                index += "<small class='font-weight-bold'>" + i + ")</small><input id='namedatostextos" + section2[s] + a + i + "0' name='datos_textos[" + section2[s] + "][" + a + "][" + i + "][0]' class=' form-control col-3 col-3'  type='text' >"
                                index += "<input id='descripdatostextos" + section2[s] + a + i + "1' name='datos_textos[" + section2[s] + "][" + a + "][" + i + "][1]' class=' form-control col-5 col-6'  type='text' value=''>"
                                index += "<input id='pricedatostextos" + section2[s] + a + i + "2' name='datos_textos[" + section2[s] + "][" + a + "][" + i + "][2]' class=' form-control col-2 col-2'  type='text' value='' >"
                                
                                index += "<a href='javascript:void[0]' onclick='showalergenos(\"" + section2[s] + "\"," + a + "," + i + ")' id='' class='btn_vermas_alergen" + section2[s] + a + i + " btn_vermas_alergen text-info ' ><small>ver +</small></a>"
                                
                                index += "<div  class='show_alergenos" + section2[s] + a + i + " close_alergenos input-sm row  py-1 ml-3 col-12 input-group-sm justify-content-between' style=' display:none;'>"
                                index += "<div class='col-12 row justify-content-end mr-0 pr-0'>"
                                index += "<div class='col-md-5 col-sm-9 col-12 row justify-content-between mr-0 pr-0 mb-3'>"
                                
                                index += "<div>"
                                index += "<input id='pricedatostextos" + section2[s] + a + i + "2' name='datos_textos[" + section2[s] + "][" + a + "][" + i + "][3]' class=' form-control col-2 col-2'  type='checkbox' value='' >"
                               
                                index += "<a href='javascript:void[0]' onclick='upDownItem(\"" + section2[s] + "\"," + a + "," + i + ",-1)' style='color:var(--color_primary);' class=''><small class=' d-block'><small>SUBIR</small></small> <i class='fas fa-arrow-up'></i></a>"
                                index += "<a href='javascript:void[0]' onclick='upDownItem(\"" + section2[s] + "\"," + a + "," + i + ",1)' style='color:var(--color_primary);' class=''><i class='fas fa-arrow-down'></i><small class=' d-block'><small>BAJAR</small></small> </a>"
                                index += "<a href='javascript:void[0]' onclick='deleteRowItem(" + i + "," + a + ",\"" + section2[s] + "\",\"datos_textos\")' class='text-danger ' ><small class='d-block'>BORRAR</small><small><i class='fas fa-trash'></i></small></a>"

                                index += "</div>"
                                index += "</div>"
                                for (var o = 4; o < 18; o++) {
                                    index += "<div  class=' input-sm row  py-3 input-group-sm col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 justify-content-center align-content-center'>"
                                    index += "<div  class=' col-12 pb-0 mb-2'>"
                                    index += "<p class='text-uppercase text-center pb-0 mb-0' style='font-size:10px; line-height: 70%;'><small>" + alergenostitle[o] + "</small></p>"
                                    index += "</div>"
                                    index += "<div  "
                                    if (task.data[section2[s]][a][i].includes(alergenos[o])) {
                                        index += "style='background-color:var(--color_second); border-radius:10%; "
                                    }
                                    index += " width:40%;' class='' >"
                                    index += "<img class='mx-auto d-block' src='<?= assets("img/alergenos/ico/") ?>" + alergenos[o] + ".png' name='alergenoimg" + o + "' style='width:45px; height:45px;'>"
                                    index += "<input "
                                    if (task.data[section2[s]][a][i].includes(alergenos[o])) {

                                        index += "checked "
                                    }
                                    index += " onclick='choosealergens(\"alergenos" + section2[s] + a + i + o + "\")'  id='alergenos" + section2[s] + a + i + o + "'   type='checkbox' name='datos_textos[" + section2[s] + "][" + a + "][" + i + "][" + o + "]' class='inputalergens position-absolute' style='width:33%; height:50%; top:33%;px; left:35%; opacity:0;' value='" + alergenos[o] + "'>"
                                    index += "</div>"
                                    index += "</div>"
                                }
                                index += "</div>"
                                index += "</div>"
                            }
                            index += "</div>"
                        }
                        $('#addsection' + section2[s]).append(index);
                        $(".hide-show" + section2[s] + a).hide('swing');
                    }
                    $(".btn_" + section2[s]).hide('swing')
                    $(".btn_close_items").hide('swing')
                }
                $(".show-btn-save").hide('swing');

                $(".close-all-section").hide('swing');


                // print in values of items/products
                for (var s = 0; s < section2.length; s++) {
                    for (var a = 0; a < task.data[section2[s]].length; a++) {
                        for (var i = 1; i < task.data[section2[s]][a].length; i++) {
                            $("#namedatostextos" + section2[s] + a + i + "0").val(task.data[section2[s]][a][i][0]);
                            $("#descripdatostextos" + section2[s] + a + i + "1").val(task.data[section2[s]][a][i][1]);
                            $("#pricedatostextos" + section2[s] + a + i + "2").val(task.data[section2[s]][a][i][2]);
                            $("#pricedatostextos" + section2[s] + a + i + "3").val(task.data[section2[s]][a][i][2]);
                        }
                    }
                }

                // ---------------------------------------------MENU IMG---------------------------------------------
                // delete row add
                for (var i = 0; i < 3; i++) {
                    $(".deleteadd").remove();
                    $(".deleterow").remove();
                }
                // add imágen  logo
                if (task.data.logo[0] !== undefined) {
                    var ruta = "<?= SERVERURL ?>public/users/" + task.data.id_usuario + "/img/logo/" + task.data.logo[0] + "";
                    var logo = "<div id='mainlogo0' class='deleterow row col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 pl-0 ml-0 justify-content-center justify-content-lg-start'>"
                    logo += " <img src='" + ruta + "' alt='' style='width:80px'  class='rounded-circle col-4'>"
                    logo += "<a href='javascript:void[0]' onclick='deleterow(0,\"logo\",\"image\")'  class=' rounded-circle  mt-1 btn text-danger mr-lg-4 mr-sm-2 mx-2 p-0 ' style='height:28px; width:23px !important;'><i class='fas fa-trash'></i></a></div>"
                    $('#send_imagelogo').append(logo);
                }
                // add imágenes portada, carta, bebida
                var section = ["portada", "carta", "bebida"]
                for (var a = 0; a < section.length; a++) {
                    for (var i = [task.data[section[a]].length - 1]; i >= 0; --i) {
                        addLineImg(task.data.id_usuario, task.data[section[a]][i], i, [section[a]])
                    }
                }
            })
    }

    function addLineImg(user, image, i, data) {
        var row = "<div id='main" + data + i + "' class='border-top deleterow row col-lg-6 col-md-12 col-sm-12 col-12 my-2 pl-0 pt-4 ml-0 justify-content-center'>"

        row += "<div class='row col-12 justify-content-between'>"

        row += " <img src='<?= SERVERURL ?>public/users/" + user + "/img/" + data + "/" + image + "' alt='' class='rounded-circle col-3 '>";
        row += " <label for='' class='label col-form-label-sm text-right  col-md-5 col-6'> Editar " + data + " <input name='image[" + data + "][" + i + "]' id='" + data + "" + i + "' type='file' class='" + data + "  mt-1 input-sm form-control  input pr-0 ml-0'></label>"
        row += "</div>"


        row += "<div class='row col-12 justify-content-end'>"
        row += "<div class='row col-xl-6 col-lg-5 col-md-6 col-sm-7 col-9 justify-content-between' >"
        row += "<a href='javascript:void[0]' onclick='upDownItem(\"" + data + "\"," + i + ",\"\",-1)' style='color:var(--color_primary);' class=' mt-1  mr-lg-4 mr-sm-2 mx-2 p-0 pl-3'><i class='fas fa-arrow-up'></i></a>"
        row += "<a href='javascript:void[0]' onclick='upDownItem(\"" + data + "\"," + i + ",\"\",1)' style='color:var(--color_primary);' class=' mt-1  mr-lg-4 mr-sm-2 mx-2 p-0'><i class='fas fa-arrow-down'></i></a>"
        row += "<a href='javascript:void[0]' onclick='deleterow(" + i + ",\"" + data + "\",\"image\")' id='deleteport" + i + "' class=' rounded-circle  btn text-danger mt-1 mr-lg-4 mr-sm-2 mx-2 p-0' style='height:28px; width:23px !important;'><i class='fas fa-trash'></i></a>";
        row += "</div>"
        row += "</div>"


        row += " </div>"
        $("#id" + data + "").after(row);
    }

    function addrow(data) {
        $("#add" + data + "", function() {
            var row = " <label for='' class='border-top pt-2 deleterow label col-form-label-sm  col-xl-3 col-lg-5 col-sm-5 col-5  mr-2 '> Añadir " + data + " <input name='image[" + data + "][]'  type='file' class='" + data + " mt-1 input-sm form-control '></label>"
            $(".add" + data + "").before(row);
        })
    }

    function showalergenos(a, e, i) {
        console.log(a, e, i)
        $(".close_alergenos").hide("swing");

        if ($(".btn_vermas_alergen" + a + e + i).text() === "ver -") {
            $(".btn_vermas_alergen" + a + e + i + " small").text("ver +");
            $(".show_alergenos" + a + e + i).hide("swing");

        } else {

            $(".btn_vermas_alergen small").text("ver +");
            $(".btn_vermas_alergen" + a + e + i + " small").text("ver -");
            $(".show_alergenos" + a + e + i).show("swing");

        }

        $(".btn_close_section ").hide('swing');
    }
</script>


<style>
    .portada,
    .logoapp,
    .carta,
    .bebida {
        opacity: 0;
        overflow: hidden;
        width: 100%;
        height: 100%;
        position: absolute;
        right: 0
    }

    label:hover,
    img:hover {
        transform: scale(1.02);
        top: -5px
    }

    .label {
        display: block;
        position: relative;
        width: 160px;
        height: 40px;
        border-radius: 25px;
        background: linear-gradient(40deg, var(--color_primary), var(--color_third));
        box-shadow: 0 4px 7px rgba(0, 0, 0, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: bold;
        transition: transform .2s ease-out;
    }

    img {
        height: 60px;
    }

    input {
        height: 30px;
    }

    label {
        font-weight: 700;
    }

    @media (max-width: 580px) {}

    @media (max-width: 380px) {}

    @media (max-width: 340px) {}
</style>