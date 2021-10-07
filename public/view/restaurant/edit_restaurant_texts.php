<div class="container text-justify row  my-5 mx-auto pl-5">
    <div class="col-12 row ml-2">
        <h2 class=" text-center col-12 mb-5">TÚ INFORMACIÓN</h2>
        <div class="row mr-2 col-sm-6 col-12 border-top border-left">
            <p class="p-4">&nbsp&nbsp&nbspMuy bien vamos a por el primer paso: <br><br>
                &nbsp&nbsp&nbspAquí tienes que ingresar todos los datos de texto referente a tu negocio, tienes los nombres de cada campo, muy fácil y sencillo. <strong>Muy importante Nombre de tu negocio y datos de contacto.</strong> Así que no tienes nada que perder, recuerda EAB edíta, actualiza y borra.
            </p>
        </div>
        <div class="row mr-2 col-sm-6 col-12 border-bottom border-right">
            <p class="p-4">&nbsp&nbsp&nbspCuando rellenes todos los campos, le das al botón de guardar y lo tendrás disponible ya...
            </p>
        </div>
    </div>
    <div class="col-12 pt-5 ">
        <?php
        include "add/ira.php";
        ?>
        <?php
        include  "add/lines_aloc.php";
        ?>

    </div>
    <div class=" mt-3 text-center row">


        <form class="form-horizontal  col-sm-12 col-12 pr-5" id="send_text" name="send_text">

            <div class="row mb-3 mt-3">
                <input name="datos_textos[id_usuario]" id="id_usuario" type="hidden" class="form-control col-6" value="">
            </div>
            <h3 class="col-12 my-4 text-center pl-0 ml-0 pr-0">Edíta, Actualiza y borra.</h3>
            <div class=" d-flex flex-lg-row flex-xl-row flex-md-column  flex-sm-column flex-column justify-content-between ">
                <!-- color web1  -->
                <div class="row mb-1 input-group-sm  border-top pt-1 align-content-center ">
                    <label class="text-right col-form-label-sm  col-sm-4 col-5">Color 1 :</label>
                    <div class="  row input-group-sm col-sm-8 col-7 ">
                        <p id="pcolorweb1" class="input-group-text col-xl-3 col-lg-3 col-md-3  col-sm-3 col-3  m-auto"><i class="fa fa-qrcode fa-lg "></i></p>
                        <input name="datos_textos[color_web1]" id="color_web1" type="text" class="form-control  colorpickerback col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9  " data-format="rgb" value="" placeholder="Haz click aquí. ">
                    </div>
                </div>

                <!-- color web2  -->
                <div class="row mb-1 input-group-sm  border-top pt-1 align-content-center  ">
                    <label class="text-right col-form-label-sm  col-sm-4 col-5">Color 2 :</label>
                    <div class="  row input-group-sm col-sm-8 col-7 ">
                        <p id="pcolorweb2" class="input-group-text col-xl-3 col-lg-3 col-md-3  col-sm-3 col-3  m-auto"><i class="fa fa-qrcode fa-lg "></i></p>
                        <input name="datos_textos[color_web2]" id="color_web2" type="text" class="form-control  colorpickerback col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9  " data-format="rgb" value="" placeholder="Haz click aquí. ">
                    </div>
                </div>
                <!-- color font  -->
                <div class="row input-group-sm  border-top pt-1 align-content-center ">
                    <label class="text-right col-form-label-sm  col-sm-4 col-5">Color textos :</label>
                    <div class="  row input-group-sm col-sm-8 col-7 ">
                        <p id="pcolorfont" class="input-group-text col-xl-3 col-lg-3 col-md-3  col-sm-3 col-3  m-auto"><i class="fa fa-qrcode fa-lg "></i></p>
                        <input name="datos_textos[color_font]" id="color_font" type="text" class="form-control  colorpickerfront col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9  " data-format="rgb" value="" placeholder="Haz click aquí. ">
                    </div>
                </div>
            </div>
            <!-- Textos empresa -->
            <div class="row mb-1 input-group-sm border-top pt-1">
                <label for="" class="text-right col-form-label-sm col-sm-4 col-5">Nombre Empresa : </label>
                <input name="" id="nombre_empresa" class="input-sm form-control col-sm-8 col-7" type="text" value="" disabled />
            </div>
            <div class="row mb-1 input-group-sm border-top pt-1">
                <label for="" class="text-right col-form-label-sm col-sm-4 col-5"> Link Instagram : </label>
                <input name="datos_textos[social_instagram]" id="social_instagram" type="text" class="input-sm form-control col-sm-8 col-7" value="" />
                <div class="custom-control custom-switch  pl-0  align-self-center">
                    <input type="checkbox" class="custom-control-input" id="palomaswinstagram" name="datos_textos[swinstagram]" value="1">
                    <label class="custom-control-label" for="palomaswinstagram"></label>
                </div>
            </div>
            <div class="row mb-1 input-group-sm border-top pt-1">
                <label for="" class="text-right col-form-label-sm col-sm-4 col-5"> Link Twitter : </label>
                <input name="datos_textos[social_twitter]" id="social_twitter" type="text" class="input-sm form-control col-sm-8 col-7" value="" />
                <div class="custom-control custom-switch  pl-0  align-self-center">
                    <input type="checkbox" class="custom-control-input" id="palomaswtwitter" name="datos_textos[swtwitter]" value="1">
                    <label class="custom-control-label" for="palomaswtwitter"></label>
                </div>
            </div>
            <div class="row mb-1 input-group-sm border-top pt-1">
                <label for="" class="text-right col-form-label-sm col-sm-4 col-5"> Link Facebook : </label>
                <input name="datos_textos[social_facebook]" id="social_facebook" type="text" class="input-sm form-control col-sm-8 col-7" value="" />
                <div class="custom-control custom-switch  pl-0  align-self-center">
                    <input type="checkbox" class="custom-control-input" id="palomaswfacebook" name="datos_textos[swfacebook]" value="1">
                    <label class="custom-control-label" for="palomaswfacebook"></label>
                </div>
            </div>
            <div class="row mb-1 input-group-sm border-top pt-1">
                <label for="" class="text-right col-form-label-sm col-sm-4 col-5"> Link Linkedin : </label>
                <input name="datos_textos[social_linkedin]" id="social_linkedin" type="text" class="input-sm form-control col-sm-8 col-7" value="" />
                <div class="custom-control custom-switch  pl-0  align-self-center">
                    <input type="checkbox" class="custom-control-input" id="palomaswlinkedin" name="datos_textos[swlinkedin]" value="1">
                    <label class="custom-control-label" for="palomaswlinkedin"></label>
                </div>
            </div>

            <!-- sobre nosotros -->

            <div class="row mb-1 input-group-sm border-top pt-1">
                <label for="" class="text-right col-form-label-sm col-sm-4 col-5">Un titulo para tu empresa : </label>
                <input name="datos_textos[titulo_sobre_nosotros]" id="titulo_sobre_nosotros" type="text" class="input-sm form-control col-sm-8 col-7" value="" />
            </div>

            <div class="row mb-1 input-group-sm border-top pt-1  " id="main_sobre_nosotros">
                <div class=" col-12 d-flex justify-content-center pb-2">
                    <div class="respuesta  bg-info mt-2 col-md-5 col-8" style="border-radius:5px"></div>
                </div>

                <label for="" class="text-right col-form-label-sm col-sm-4 col-5">Sobre mi empresa : </label>
                <a href="javascript:void(0)" id="addparrafo" class=' btn btn-sm  btn-outline-success col-lg-2 col-sm-3 col-3 mr-3' style="height: 32px;">Añadir</a>
                <button type='submit' class='actualiza_textos btn btn-sm btn-outline-info col-lg-2 col-sm-3 col-3 ' id='' name='actualiza_textos' style="height: 32px;">Guardar</button>
            </div>
            <!-- moneda local -->
            <div class="row mb-1 input-group-sm border-top pt-1">
                <label for="" class="text-right col-form-label-sm col-sm-4 col-5"> Moneda Local : </label>
                <select name="datos_textos[moneda]" id="moneda" class="input-group-text col-md-1 col-2">
                    <option id="moneda1" value="1">€</option>
                    <option id="moneda2" value="2">$</option>
                    <option id="moneda3" value="3">£</option>
                </select>
            </div>
            <!-- datos de contacto -->
            <div class="row mb-1 input-group-sm border-top pt-1">
                <label for="" class="text-right col-form-label-sm col-sm-4 col-5">Email : </label>
                <input name="datos_textos[email]" id="email" type="text" class="input-sm form-control col-sm-8 col-7" value="" />
            </div>
            <div class="row mb-1 input-group-sm border-top pt-1">
                <label for="" class="text-right col-form-label-sm col-sm-4 col-5">Teléfono de contacto : </label>
                <input name="datos_textos[telefono][]" id="telefono" type="text" class="input-sm form-control col-sm-8 col-7" value="" />
            </div>
            <!-- horario -->
            <div class="row mb-1 input-group-sm border-top pt-1  " id="main_horario">
                <div class=" col-12 d-flex justify-content-center pb-2">
                    <div class="respuesta  bg-info mt-2 col-md-5 col-8" style="border-radius:5px"></div>
                </div>
                <label for="" class="text-right col-form-label-sm col-sm-4 col-5">Horario : </label>
                <a href="javascript:void(0)" id="addhorario" class=' btn btn-sm  btn-outline-success col-lg-2 col-sm-3 col-3 mr-3' style="height: 32px;">Añadir</a>
                <button type='submit' class='actualiza_textos btn btn-sm btn-outline-info col-lg-2 col-sm-3 col-3 ' id='' style="height: 32px;">Guardar</button>
            </div>
            <!-- datos de ubicación  -->
            <div class="row mb-1 input-group-sm border-top pt-1">
                <label for="" class="text-right col-form-label-sm col-sm-4 col-5">Wifi red : </label>
                <input name="datos_textos[wifi_name]" id="wifi_name" type="text" class="input-sm form-control col-sm-8 col-7" value="" />
            </div>
            <div class="row mb-1 input-group-sm border-top pt-1">
                <label for="" class="text-right col-form-label-sm col-sm-4 col-5">Wifi clave : </label>
                <input name="datos_textos[wifi_pass]" id="wifi_pass" type="text" class="input-sm form-control col-sm-8 col-7" value="" />
                <div class="custom-control custom-switch  pl-0  align-self-center">
                    <input type="checkbox" class="custom-control-input" id="palomaswwifi" name="datos_textos[swwifi]" value="1">
                    <label class="custom-control-label" for="palomaswwifi"></label>
                </div>
            </div>
            <div class="row mb-1 input-group-sm border-top pt-1">
                <label for="" class="text-right col-form-label-sm col-sm-4 col-5">Link ubicación google : </label>
                <input name="datos_textos[ubicacion_google]" id="ubicacion_google" type="text" class="input-sm form-control col-sm-8 col-7" value="" />
            </div>
            <div class="row mb-1 input-group-sm border-top pt-1">
                <label for="" class="text-right col-form-label-sm col-sm-4 col-5">Dirección : </label>
                <input name="datos_textos[direccion]" id="direccion" type="text" class="input-sm form-control col-sm-8 col-7" value="" />
            </div>
            <div class="row mb-1 input-group-sm border-top pt-1">
                <label for="" class="text-right col-form-label-sm col-sm-4 col-5">Codigo postal : </label>
                <input name="datos_textos[codigo_postal]" id="codigo_postal" type="text" class="input-sm form-control col-sm-8 col-7" value="" />
            </div>
            <div class="row mb-1 input-group-sm border-top pt-1">
                <label for="" class="text-right col-form-label-sm col-sm-4 col-5">Ciudad : </label>
                <input name="datos_textos[ciudad]" id="ciudad" type="text" class="input-sm form-control col-sm-8 col-7" value="" />
            </div>
            <div class="row mb-1 input-group-sm border-top pt-1">
                <label for="" class="text-right col-form-label-sm col-sm-4 col-5">Estado ó provincia : </label>
                <input name="datos_textos[estado]" id="estado" type="text" class="input-sm form-control col-sm-8 col-7" value="" />
            </div>
            <div class="row mb-1 input-group-sm border-top pt-1">
                <label for="" class="text-right col-form-label-sm col-sm-4 col-5">País : </label>
                <input name="datos_textos[pais]" id="pais" type="text" class="input-sm form-control col-sm-8 col-7" value="" />
            </div>
            <!-- tarjetas aceptar -->
            <div class="row mb-3 input-group-sm border-top border-bottom pt-1">
                <label for="" class="text-right col-form-label-sm col-sm-4 col-5">Aceptas tarjetas de crédito :</label>
                <div class="custom-control custom-switch d-flex-inline input-sm col-sm-3 col-6 align-self-center">
                    <input type="checkbox" class="custom-control-input " id="palomaswaceptartarjetas" name="datos_textos[swaceptartarjetas]" value="1" />
                    <label class="custom-control-label" for="palomaswaceptartarjetas"></label>
                </div>
            </div>
            <div class=" col-12 d-flex justify-content-center pb-2">
                <div class="respuesta  bg-info mt-2 col-md-5 col-10 " style="border-radius:5px"></div>
            </div>
            <div class="  col-sm-12 col-12 my-3 pr-0 pl-2 ">
                <input type="submit" class="btn-sm btn-outline-info btn w-100" id="actualiza_textos" name="actualiza_textos" value="Guardar">
            </div>

        </form>
        <div class="col-sm-6 col-6 pl-4 ">
            <button class="btn btn-sm btn-outline-danger w-100" name="borrar_textos" onclick="deleteAll('datos_textos','#send_text')">Borrar</button>
        </div>
        <div class="  col-sm-6 col-6  pr-5">
            <a class=" btn btn-sm btn-outline-success w-100" type="button" href="<?= SERVERURL ?>restaurant/inicio">Regresar..</a>
        </div>
        <div class="pt-5 col-12">
            <?php
            include    "add/lines_aloc.php";
            ?>
        </div>
    </div>
</div>
<div class="row">
    <?php
    include    "add/name-enterprice.php";
    ?>
</div>
<style>
    label {
        font-weight: 700;
    }

    input,
    input[type='checkbox'] {
        align-self: center;
    }
</style>
<!-- estilos qr -->
<link href="<?= SERVERURL ?>lib/generadorqr/js/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<!-- scrpit qr -->
<script src="<?= SERVERURL ?>lib/generadorqr/js/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?= SERVERURL ?>lib/generadorqr/js/all.js?v=3"></script>
<?php require assetsphp("js/general") ?>
<!-- script envio de form -->
<script>
    $(document).ready(function() {
        getRow();
        $("#send_text").submit((e) => {
            e.preventDefault();
            $.ajax({
                    type: 'POST',
                    url: "<?= SERVERURL ?>restaurant/updateText",
                    data: $("#send_text").serialize(),
                })
                .done(function(response) {
                    console.log(response);
                    showresponse("respuesta", response);
                    setTimeout(getRow, 200);
                    setTimeout(getIframe, 200);
                    return false;
                })
        });
    })

    function getRow() {
        $.ajax({
                url: "<?= SERVERURL ?>restaurant/getData",
                type: "GET",
            })
            .done(function(response) {
                // const task = JSON.parse(response);
                console.log(response);
                var result = Object.keys(task.data);
                // load datos enterprice
                // load local currency
                var moneda = '';
                if (task.data.moneda == 1) {
                    moneda = '€';
                } else if (task.data.moneda == 2) {
                    moneda = '$';
                } else if (task.data.moneda == 3) {
                    moneda = '£';
                }
                $("#moneda" + task.data.moneda).html(moneda);
                // load choose colors
                $('#color_web1').colorpicker().on('change', function(ev) {
                    var color = ev.color.toString('hex');
                    $('#pcolorweb1').css('background', color);
                });
                $('#color_web2').colorpicker().on('change', function(ev) {
                    var color = ev.color.toString('hex');
                    $('#pcolorweb2').css('background', color);
                });
                $('#color_font').colorpicker().on('change', function(ev) {
                    var color = ev.color.toString('hex');
                    $('#pcolorfont').css('background', color);
                });
                $("#pcolorweb1").css("background-color", task.data.color_web1);
                $("#pcolorweb2").css("background-color", task.data.color_web2);
                $("#pcolorfont").css("background-color", task.data.color_font);
                if (task.data.color_font == '') {
                    task.data.color_font = 'rgb(255,255,255)';
                }
                if (task.data.color_web1 == '') {
                    task.data.color_web1 = 'rgb(96, 113, 190, 0.5)';
                }
                if (task.data.color_web2 == '') {
                    task.data.color_web2 = 'rgb(39, 51, 165, 0.835)';
                }
                for (var i = 0; i < result.length; i++) {
                    $("#" + result[i]).val(task.data[result[i]]);
                }
                // delete element add
                for (var i = 0; i < 3; i++) {
                    $(".deleteall").remove();
                }
                // load about us
                var section = ["sobre_nosotros", "horario"];
                for (var i = 0; i < task.data[section[0]].length; i++) {
                    var row = "<div id='main" + [section[0]] + i + "' class='deleteall row col-lg-6 col-md-6 col-12 my-2 justify-content-center input-group-sm'>"
                    row += "<textarea name='datos_textos[sobre_nosotros][" + i + "]' id='sobre_nosotros" + i + "' type='text' class='sobre_nosotros mt-1 input-sm form-control  col-md-10 col-10 ' rows='2' >" + task.data.sobre_nosotros[i] + " </textarea>"
                    row += "<a href='javascript:void[0]' onclick='deleterow(" + i + ",\"" + [section[0]] + "\",\"datos_textos\")' id='deleterow" + i + "' class='deleterow mt-1 text-danger p-0 ml-0' style='height:25px; width:25px !important;'><i class='fas fa-trash'></i></a>";
                    row += "</div>"
                    $("#main_sobre_nosotros").append(row);
                }
                // load schedule
                for (var i = 0; i < task.data[section[1]].length; i++) {
                    var row = "<div id='main" + [section[1]] + i + "' class='deleteall row col-lg-6 col-md-6 col-12 my-2 justify-content-center input-group-sm'>"
                    row += "<input name='datos_textos[horario][" + i + "]' id='horario" + i + "' type='text' class='input-sm form-control col-10' value='' />"
                    row += "<a href='javascript:void[0]' onclick='deleterow(" + i + ",\"" + [section[1]] + "\", \"datos_textos\")' class='deleterow mt-1 text-danger p-0 ml-0' style='height:25px; width:25px !important;'><i class='fas fa-trash'></i></a>";
                    row += "</div>"
                    $("#main_horario").append(row);
                    $("#horario" + i).val(task.data.horario[i]);
                }
                // load switc social networks
                var sw = ["swinstagram", "swtwitter", "swfacebook", "swlinkedin", "swaceptartarjetas", "swwifi"];
                for (var i = 0; i < sw.length; i++) {
                    if (task.data[sw[i]] == 1) {
                        $("#paloma" + [sw[i]] + "").attr("checked", "checked");
                    } else {
                        $("#paloma" + [sw[i]] + "").removeAttr("checked");
                    }
                }
            })
    }
    // add about us
    $("#addparrafo").click(function() {
        $("#main_sobre_nosotros").append(" <div class='deleteall row col-lg-6 col-md-6 col-12 my-2 justify-content-center input-group-sm '><textarea name='datos_textos[sobre_nosotros][]'  class='sobre_nosotros input-sm form-control col-11 mt-1' cols='30' rows='2' ></textarea></div>");
    })
    // add horario
    $("#addhorario").click(function() {
        $("#main_horario").append(" <div class='deleteall row col-lg-6 col-md-6 col-12 my-2 justify-content-center input-group-sm '><input name='datos_textos[horario][]'  class='horario input-sm form-control col-11 mt-1'></div>");
    })
    // load swich social networks
    $(".custom-control-input").change(function() {
        $("#send_text").submit();
    })
</script>