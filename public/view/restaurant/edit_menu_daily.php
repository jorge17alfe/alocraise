<div class="container menu my-5 pl-5">

    <section class="menu_del_dia row text-center ml-3 ">
        <div class="saludo col-sm-12 col-12 pl-0 pr-5row">
            <h2 class=" col-sm-12 col-12 mb-5">Menu del día</h2>
            <div class="col-12 pl-0  mb-5 ">
                <?php
                include "add/ira.php";
                ?>
                <?php
                include  "add/lines_aloc.php";
                ?>
            </div>

            <form id="swMenu" class="btn-20 col-12 my-5 row ">
                <input name="sw_menu[id_usuario]" type="hidden" class="id_usuario" value="">
                <p class="col-lg-8 col-9" id="titulo"> <strong> </strong></p>
                <div class="switch  mt-1 col-lg-4 col-3  text-left">
                    <input class="" type="checkbox" data-toggle="toggle" name="sw_menu[sw_elements][sw_menu]" id="sw_menuBtn" data-size="small" data-style="ios" data-onstyle="info" value="1" checked>
                </div>
                <script>
                    $(document).ready(function() {
                        showMenu();
                        $("#sw_menuBtn").on("change", function() {
                            $.ajax({
                                    type: 'POST',
                                    url: "<?= SERVERURL ?>restaurant/updateText",
                                    data: $("#swMenu").serialize()
                                })
                                .done(function(response) {
                                    console.log(response)
                                    setTimeout(showMenu, 80)
                                })
                        });
                    })

                    function showMenu() {
                        $.ajax({
                                url: "<?= SERVERURL ?>restaurant/getData",
                                type: "GET"
                            })
                            .done(function(response) {
                                const task = JSON.parse(response);
                                console.log(task.data.sw_elements)
                                if (task.data.sw_elements['sw_menu'] == 1) {
                                    $("#sw_menuBtn").attr("checked", "checked");
                                    $("#mainMenu").hide(800);
                                    $("#main_img_menu").show(800);
                                    $("#titulo").html("Pública tus textos <strong>" + task.data.nombre_empresa + "</strong>");
                                } else {
                                    // $("#sw_menuBtn").removeAttr("checked");
                                    $("#mainMenu").show(800);
                                    $("#main_img_menu").hide(800);
                                    $("#titulo").html("Pública tu menú imagen <strong>" + task.data.nombre_empresa + "</strong>");
                                }

                            })
                    }
                </script>
            </form>
        </div>
        <?= viewadd("restaurant/add/img_menu") ?>
        <div id="mainMenu">
            <form id="menu" name="menu" class="row  col-sm-12 col-12 px-0">
                <input name="menu[id_usuario]" id="id_usuario" class="id_usuario form-control w-25 " type="hidden" value="">
                <div id="main_primero" class="input-group-sm   main_primero border-top  col-sm-12 col-12 mb-3 pr-0 my-4 row justify-content-between">
                    <div class="row col-12 py-4">
                        <label for="primer_plato" class="form-label-sm col-xl-3 col-lg-4 col-md-6 col-sm-6 col-6 mb-1 text-right mb-3">Primeros platos</label>
                        <input id="addprimero" onclick="addplato('primero')" class="btn btn-outline-info btn-sm col-lg-3 col-md-6 col-sm-6 col-6 mb-3 " type="button" value="Añadir primero">
                    </div>
                </div>
                <div id="main_segundo" class="input-group-sm  main_segundo border-top col-sm-12 col-12 mb-3 pr-0 row justify-content-between">
                    <div class="row col-12 py-4">
                        <label for="Segundo_plato" class="col-form-label-sm col-xl-3 col-lg-4 col-md-6 col-sm-6 col-6 mb-1 text-right mb-3">Segundos platos:</label>
                        <input id="addsegundo" onclick="addplato('segundo')" class="btn btn-outline-info btn-sm col-lg-3 col-md-6 col-sm-6 col-6 mb-3 " type="button" value="Añadir segundo">
                    </div>
                </div>
                <div id="main_postre" class="input-group-sm  main_postre border-top col-sm-12 col-12 mb-3 pr-0 row justify-content-between">
                    <div class="row col-12 py-4">
                        <label for="addpostre" class="col-form-label-sm col-xl-3 col-lg-4 col-md-6 col-sm-6 col-6 mb-1 text-right mb-3">Postre:</label>
                        <input id="addpostre" onclick="addplato('postre')" class="btn btn-outline-info btn-sm col-lg-3 col-md-6 col-sm-6 col-6 mb-3 " type="button" value="Añadir postre">
                    </div>
                </div>
                <div class="input-group-sm  col-sm-12 col-12 mb-4 row form-group text-right precio pr-0 border-top ">
                    <div class="form-group input-group-sm col-12 py-4 row px-0">
                        <label for="" class="pt-2 col-md-3 col-12 incluye_label col-form-label-sm ">Incluido en menú: </label>
                        <input name="menu[incluye]" id="incluye" class="incluye form-control col-md-3 col-12 " type="text" value="" placeholder="Incluye bebida y ...">
                        <div class="input-group-sm col-md-5 col-12 row justify-content-around  px-0 mt-md-0 mt-sm-3">
                            <label for="" class="pt-2 col-4 text-right col-form-label-sm ">Precio: </label>
                            <div class="input-group-sm row col-8 px-0">
                                <input name="menu[precio]" id="precio" class="incluye form-control col-9 text-right" type="text" value="">
                                <div id="moneda" class="col-2 font-weight-bold px-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-12 pl-0">
                    <span class="respuesta  px-5 badge badge-info col-md-5 col-7"></span>
                </div>
                <div class="col-12 pl-0 justify-content-arround ">
                    <input class="btn btn-sm btn-outline-primary  col-md-5 col-7 m-3" type="submit" value="Publicar Menú">
                    <button class="btn btn-sm btn-outline-danger w-100 col-md-5 col-7 " name="borrar_menu" onclick="deleteAll('menu','#menu')">Borrar Menú</button>
                </div>
            </form>

        </div>
        <div class="row col-12 justify-content-center my-2">
            <a class=" btn btn-sm btn-outline-success w-100 col-md-5 col-7 mr-3" type="button" href="<?= SERVERURL ?>restaurant/inicio">Regresar..</a>
        </div>
        <div class="pt-5 col-12">
            <?php
            include    "add/lines_aloc.php";
            ?>
        </div>
    </section>
    <?php
    // viewadd("restaurant/add/name-enterprice", $parameter);
    include "add/name-enterprice.php"
    ?>
</div>
<style>
    .actualizar_img,
    .borrar_img {
        height: 30px;
    }

    .precio select {
        height: 32px;
    }

    img {
        height: 80px;
    }

    label {
        font-weight: 700;
    }

    @media (max-width: 768px) {
        .precio .incluye {
            margin-bottom: .2rem;
        }

        .precio .incluye_label {
            text-align: center;
        }
    }

    @media (max-width: 480px) {
        label {
            font-size: .8rem;
        }
    }
</style>



<script>
    $(document).ready(function() {
        getRow();
        $("#menu").submit((e) => {
            e.preventDefault();
            // console.log($("#menu").serialize())
            $.post({
                    url: "<?= SERVERURL ?>restaurant/updateText",
                    data: $("#menu").serialize()
                })
                .done(function(response) {
                    $("#menu").trigger("reset");
                    setTimeout(getRow, 100);
                    showresponse("respuesta", response)
                    console.log(response)
                    return false;
                });
        });
    })

    function getRow() {
        var user = $("#id_usuario").val();
        $.ajax({
                url: "<?= SERVERURL ?>restaurant/getData",
                type: "GET"
            })
            .done(function(response) {
                const task = JSON.parse(response);
                // console.log(task.data)
                $(".deleterow").remove();
                var moneda = '';
                if (task.data.moneda == 1) {
                    moneda = '€';
                } else if (task.data.moneda == 2) {
                    moneda = '$';
                } else if (task.data.moneda == 3) {
                    moneda = '£';
                }
                $(".id_usuario").val(task.menu.id_usuario);
                $("#incluye").val(task.menu.incluye);
                $("#precio").val(task.menu.precio);
                $("#moneda").html(moneda);




                if (task.menu.img_menu[0] !== undefined) {
                    var ruta = "<?= SERVERURL ?>public/users/" + task.menu.id_usuario + "/img/img_menu/" + task.menu.img_menu[0] + "";
                    var img_menu = "<div id='mainimg_menu0'> <img src='" + ruta + "' alt='' style='width:80px' class='rounded-circle deleterow text-center'>"
                    img_menu += "<a href='javascript:void[0]' onclick='deleterow(0,\"img_menu\",\"menu\")' id='mainimg_menu' class='rounded-circle deleterow mt-1 text-danger mr-lg-4 mr-sm-2 mx-2 p-0 ' style='height:28px; width:23px !important;'><i class='fas fa-trash'></i></a></div>"
                }
                $('#send_imageimg_menu').append(img_menu)

                var menu = [
                    "primero",
                    "segundo",
                    "postre"
                ]
                
                menu.map(ele => {
                    $(".second_" + ele).remove();
                    // console.log(ele)
                })

                menu.map(ele => {
                    for (var i = 0; i < task.menu[ele].length; i++) {
                        var row = "<div id='main" + ele + i + "' class='second_" + ele + " row justify-content-around input-group-sm px-0 col-12'>"
                        row += "<input name='menu[" + ele + "][" + i + "][0]' id='" + ele + "" + i + "' type='text' class='" + ele + " form-control   col-8  mb-1 ml-0'  placeholder='" + ele + " plato' value='" + task.menu[ele][i][0] + "'>"
                        row += "<div class='col-md-2 col-4 '><a href='javascript:void(0)' onclick='deleterow(" + i + ",\"" + ele + "\",\"menu\")' id='delete" + ele + i + "' class='delete" + ele + " text-danger btn-sm col-6' style='height:30px; width:25px !important;'><i class='fas fa-trash'></i></a>"
                        row += "<a href='javascript:void(0)'  alergens='" + ele + i + "' class='btn_vermas_alergen btn_vermas_alergen" + ele + i + "  btn-sm col-6' style='height:30px; width:25px !important; color:var(--color_primary)'>ver +</a>"
                        row += "</div>"
                        row += "<div class='close_alergenos show_alergenos" + ele + i + "'><div class='d-flex flex-wrap  col-12'>"
                        for (var o = 3; o < 17; o++) {
                            row += printAlergensMenu(task.menu, ele, i, o, );
                        }
                        row += "</div></div>"
                        row += "</div>"
                        $("#main_" + ele).append(row);
                        // console.log( task.menu[ele][i])
                    }
                    $(".close_alergenos").hide("swing")
                })





            })
    }
    $(document).on("click", (e) => {
        var a = $(e.target).attr("alergens")
        if (a) {
            $(".close_alergenos").hide("swing");
        }
        if ($(".btn_vermas_alergen" + a).text() === "ver -") {
            $(".btn_vermas_alergen" + a).text("ver +");
            $(".show_alergenos" + a).hide("swing");
        } else {
            $(".btn_vermas_alergen").text("ver +");
            $(".btn_vermas_alergen" + a).text("ver -");
            $(".show_alergenos" + a).show("swing");

        }

        // $(".btn_close_section").hide('swing');
    })

    var alergenos = {
        3: {
            alergens: "not-available",
            title: "no disponible"
        },
        4: {
            alergens: "altramuces",
            title: "altramuces"
        },
        5: {
            alergens: "apio",
            title: "apio"
        },
        6: {
            alergens: "azufresulfitos",
            title: "azufre y sulfitos"
        },
        7: {
            alergens: "cacahuetes",
            title: "cacahuetes"
        },
        8: {
            alergens: "crustaceos",
            title: "crustáceos"
        },
        9: {
            alergens: "frutoscascara",
            title: "frutos de cáscara"
        },
        10: {
            alergens: "gluten",
            title: "gluten"
        },
        11: {
            alergens: "huevos",
            title: "huevos"
        },
        12: {
            alergens: "lacteos",
            title: "lácteos"
        },
        13: {
            alergens: "moluscos",
            title: "moluscos"
        },
        14: {
            alergens: "mostaza",
            title: "mostaza"
        },
        15: {
            alergens: "pescado",
            title: "pescado"
        },
        16: {
            alergens: "sesamo",
            title: "sésamo"
        },
        17: {
            alergens: "soya",
            title: "soja"
        },
    }

    let num2 = 1000;

    function addplato(data) {
        console.log(num2)
        row = "<div class='row col-12  justify-content-around deleterow'>"
        row += "<input name='menu[" + data + "][" + num2 + "][]'  type='text' class='deleterow form-control w-25 col-md-6  col-8 mr-1 mb-1 '  placeholder='Añadir " + data + "' >"
        // row += "<div class='col-md-2 col-4 '><a href='javascript:void(0)' onclick='deleterow(" + i + ",\"" + ele + "\",\"menu\")' id='delete" + ele + i + "' class='delete" + ele + " text-danger btn-sm col-6' style='height:30px; width:25px !important;'><i class='fas fa-trash'></i></a>"
        row += "<a href='javascript:void(0)'  alergens='" + data + num2 + "' class='btn_vermas_alergen btn_vermas_alergen" + data + num2 + "  btn-sm col-1' style='height:30px; width:25px !important; color:var(--color_primary)'>ver +</a>"
        // row += "</div>"
        row += "<div class='close_alergenos show_alergenos" + data + num2 + "'><div class='d-flex flex-wrap  col-12'>"
        for (var i = 3; i < 17; i++) {
            row += addShowAlergensMenu(data, num2, i);
        }
        row += "</div>"
        row += "</div>"
        row += "</div>"
        $("#main_" + data).append(row);
        num2++
    }

    function printAlergensMenu(data, section, i, o) {
        var index = '';
        // console.log(data[section][i][o])
        index += "<div  class=' input-sm row  py-3 input-group-sm col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 justify-content-center '>"
        index += "<div  class=' col-12 pb-0 mb-2'>"
        index += "<p class='text-uppercase text-center pb-0 mb-0' style='font-size:10px; line-height: 70%;'><small>" + alergenos[o].title + "</small></p>"
        index += "</div>"
        index += "<div  "
        data[section][i].map((e, f) => {
            data[section][i][f] = (data[section][i][f]).toLowerCase()
        })
        if ((data[section][i]).includes(alergenos[o].alergens)) {
            index += "style='background-color:var(--color_second); border-radius:10%; "
        }

        index += " width:100%;' class='col-6' >"
        index += "<img class='mx-auto d-block' src='<?= assets("img/alergenos/ico/") ?>" + alergenos[o].alergens + ".png' name='alergenoimg" + o + "' style='width:45px; height:45px;'>"
        index += "<input "
        if ((data[section][i]).includes(alergenos[o].alergens)) {
            index += "checked "
        }
        index += " onclick='choosealergens(\"alergenos" + section + i + o + "\")'  id='alergenos" + section + i + o + "'   type='checkbox' name='menu[" + section + "][" + i + "][" + o + "]' class='inputalergens position-absolute' style='width:33%; height:50%; top:33%; left:35%; opacity:0;' value='" + alergenos[o].alergens + "'>"
        index += "</div>"
        index += "</div>"
        return index;
        // console.log(data[section][i][o])
    }

    function addShowAlergensMenu(data, num, i) {

        var index = "<div  class=' input-sm row  py-3 input-group-sm col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 justify-content-center align-content-center'>"
        index += "<div  class=' col-12 pb-0 mb-0'>"
        index += "<p class='text-uppercase text-center pb-0 mb-0' style='font-size:10px; line-height: 70%;'><small>" + alergenos[i].title + "</small></p>"
        index += "</div>"
        index += "<div  class='' style='height:45px;'>"
        index += "<img class='mx-auto d-block' src='<?= assets("img/alergenos/ico/") ?>" + alergenos[i].alergens + ".png' name='alergenoimg" + i + "' style='width:45px; height:45px;'>"
        index += "<input  type='checkbox' onclick='choosealergens(\"inputalergensmenu" + data + num + i + "\")' id='inputalergensmenu" + data + num + i + "' name='menu[" + data + "][" + num + "][" + i + "]' class='position-relative mb-0' style='width:13px; top:-20px; right:-15px;' value='" + alergenos[i].alergens + "'>"
        index += "</div>"
        index += "</div>"
        return index;
    }
</script>
<?php require assetsphp("js/general") ?>
<script>
    // setTimeout(()=>{

    // $('.show_hide_element').toggle()
    // console.log($('.show_hide_element'))
    // let jl = document.getElementsByClassName('show_hide_element')
    // jl.style.display= 'none';
    // },2000);
</script>