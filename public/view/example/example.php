   <div class="container py-5 pr-0">
       <!-- form secciones -->
       <div class="col-12 row  pr-0">
           <div class="row col-12 justify-content-sm-around justify-content-center  input-group-sm btn-20 pr-0">
               <a href='javascript:void[0]' onclick="hideShowSection('carta_text')" id="seecarta_text" class=' form-control btn   col-md-4 col-sm-5 col-9 mb-2'>VER COMIDA <i class="fas fa-utensils"></i></a>
               <a href='javascript:void[0]' onclick="hideShowSection('bebida_text')" id="seebebida_text" class=' form-control btn   col-md-4 col-sm-5 col-9'>VER BEBIDA <i class="fas fa-glass-cheers"></i></a>
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
           <div class="row col-12 justify-content-sm-around justify-content-center  input-group-sm pr-0">
               <a class="btn btn-sm btn-outline-primary  col-md-4 col-sm-5 col-9 mt-2 pr-0" id="enviar_menu_text" type="button">Guardar</a>
               <a class="btn btn-sm btn-outline-danger  col-md-4 col-sm-5 col-9 mt-2 pr-0" name="borrar_" onclick="deleteAll('menu_text')">Borrar Menú</a>
           </div>
       </form>

   </div>
   <script>
       getRow()

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
           section += "<label class='input-group-sm col-12'>+ Sección<input name='datos_textos[" + data + "][][0]' class=' form-control col-12 ' type='text'></label>"
           section += "</div>"
           $('#addsection' + data).append(section);
       }

       function addindexText(section, data) {
           var index = "<div  class=' input-sm row  py-1 col-12 input-group-sm justify-content-between'>"
           index += "<input name='datos_textos[" + section + "][" + data + "][" + num + "][]' class=' form-control col-3  ' type='text' placeholder='Nombre de producto'>"
           index += "<input name='datos_textos[" + section + "][" + data + "][" + num + "][]' class=' form-control col-6  ' type='text' placeholder='Descripción'>"
           index += "<input name='datos_textos[" + section + "][" + data + "][" + num + "][]' class=' form-control col-2  ' type='text' placeholder='Precio'>"
           //    index += "<a class='text-danger ' ><small><i class='fas fa-trash'></i></small></a>"
           index += "</div>"
           $('#main' + section + data).append(index);
           num++;
       }


       function getRow() {
           $.ajax({
               url: "<?= SERVERURL ?>restaurant/getData",
               type: "GET",
               success: function(response) {
                   //    console.log(response);
                   const task = JSON.parse(response);
                   $(".borrarsection").remove();
                   const section2 = ["carta_text", "bebida_text"]
                   for (var s = 0; s < section2.length; s++) {
                       //    console.log(task.data[section2[s]]);
                       var result = task.data[section2[s]];
                       for (var a = 0; a < result.length; a++) {
                           var section = "<div id='main" + [section2[s]] + a + "' class='borrarsection input-sm row border-top py-3 col-12 row justify-content-between pl-3 pr-0'>"
                           section += "<input class='col-md-3 col-12 text-center  text-primary font-weight-bold' type='text' name='datos_textos[" + section2[s] + "][" + a + "][0]' value='" + task.data[section2[s]][a][0] + "'>"
                           section += "<a href='javascript:void[0]' onclick='hideShow(\"" + section2[s] + "\"," + a + ")' class='btnhide-show" + section2[s] + a + " btn text-info '>ver +</a>"
                           section += "<a href='javascript:void[0]' onclick='addindexText(\"" + section2[s] + "\"," + a + ")'  style='color:var(--color_primary);' class='btn  '><small>+ producto</small></a>"
                           section += "<div class=' col-lg-1 col-md-2 col-sm-3 col-4 row justify-content-between'>"
                           section += "<a href='javascript:void[0]' onclick='upDownItem(\"" + section2[s] + "\"," + a + ",-1)' style='color:var(--color_primary);' class=' text-left'><i class='fas fa-arrow-up'></i></a>"
                           section += "<a href='javascript:void[0]' onclick='upDownItem(\"" + section2[s] + "\"," + a + ",1)' style='color:var(--color_primary);' class=' text-left'><i class='fas fa-arrow-down'></i></a>"
                           section += "<a href='javascript:void[0]' onclick='deleterow(" + a + ",\"" + section2[s] + "\",\"datos_textos\")' class='text-danger text-left'><i class='fas fa-trash'></i></a>"
                           section += "</div>"
                           if (task.data[section2[s]][a].length > 1) {
                               section += "<div class=' hide-show" + section2[s] + a + " row justify-content-between col-12 text-left close-all-item  px-0'>"
                               section += "<label class='col-3 text-center font-weight-bold'>Name</label>"
                               section += "<label class='col-5 text-center font-weight-bold'>Descripcion</label>"
                               section += "<label class='col-3 text-center font-weight-bold'>Price</label>"
                            //    section += "<label class='col-1'> </label>"
                               section += "</div>"
                               for (var i = 1; i < task.data[section2[s]][a].length; i++) {
                                   section += "<div class=' hide-show" + section2[s] + a + " input-sm row  py-1 col-12 input-group-sm justify-content-between close-all-item px-0'> "
                                   section += "<small class='font-weight-bold'>" + i + ")</small><input name='datos_textos[" + section2[s] + "][" + a + "][" + i + "][]' class=' form-control col-3' value='" + task.data[section2[s]][a][i][0] + "' type='text'>"
                                   section += "<input name='datos_textos[" + section2[s] + "][" + a + "][" + i + "][]' class=' form-control col-5' value='" + task.data[section2[s]][a][i][1] + "' type='text'>"
                                   section += "<input name='datos_textos[" + section2[s] + "][" + a + "][" + i + "][]' class=' form-control col-2' value='" + task.data[section2[s]][a][i][2] + "' type='text'>"
                                   section += "<a href='javascript:void[0]' onclick='deleteRowItem(" + i + "," + a + ",\"" + section2[s] + "\",\"datos_textos\")' class='text-danger ' ><small><i class='fas fa-trash'></i></small></a>"
                                   section += "</div>"
                               }
                               section += "</div>"
                           }

                           $('#addsection' + section2[s]).append(section);
                           $(".hide-show" + section2[s] + a).hide('swing')

                       }
                       //    $(".close-all-section").hide('swing')
                       //    $(".hide-showcarta_text").show('swing')
                       //       $(".hide-showbebida_text").hide('swing')
                       $(".btn_carta_text").hide('swing')
                       $(".btn_bebida_text").hide('swing')
                   }

               }

           })
       }

       function upDownItem(section, group, suma) {
           var user = $("#id_usuario").val();
           $.post({
                   url: "<?= SERVERURL ?>restaurant/upDownItem",
                   data: {
                       "user": user,
                       "section": section,
                       "group": group,
                       "suma": suma,
                   }
               })
               .done(function(response) {
                   
                   getRow();
                   hideShowSection(section);
                   return false;
               })

       }


       function hideShow(a, b) {
           $(".close-all-item").hide('swing')
           $(".hide-show" + a + b).show('swing')
       }

       function hideShowSection(a) {
           $(".close-all-section").hide('swing')
           $(".hide-show" + a).show('swing')
           $("#add_" + a).show('swing')
       }

       function deleteRowItem(item, data, section, group) {
           var user = $("#id_usuario").val();
           console.log(item + data + section + group)
           $.post({
                   url: "<?= SERVERURL ?>restaurant/deleteRow",
                   data: {
                       ["id_usuario"]: user,
                       [section]: {
                           [data]: ''
                       },
                       "item": item,
                       "group": group
                   }

               })
               .done(function(response) {
                   console.log(response)
                   $("#main" + section + data).fadeOut(600, function() {
                       setTimeout(getRow, 1);
                      
                   });

               })
       }
   </script>
   <?php require assetsphp("js/general") ?>