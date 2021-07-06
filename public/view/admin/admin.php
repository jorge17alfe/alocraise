<div class="bg-light sticky-top d-flex justify-content-center ">
  <!-- FORM TO ADD TASKS -->
  <div id="main_form_data_user" class="row   bg-light col-xl-4 col-lg-6 col-md-8 col-sm-10 col-12 my-5 " style="z-index:950; ">
    <div class=" row shadow  rounded p-3 mx-0 col-12 mediun_form_data_user ">

      <form id="form_data_user" class="row col-12 pr-0 mx-0">

        <div class="form-group  col-6 ">
          <label for="" class=" col-form-label-sm mb-0 font-weight-bold"> ID de cliente : </label>
          <input type="hidden" id="id" name="id" class="form-control form-control-sm">
          <input type="text" id="id1" name="id1" class="form-control form-control-sm" disabled>
        </div>
        <div class="form-group  col-6 ">
          <label for="" class=" col-form-label-sm mb-0 font-weight-bold"> Nick : </label>
          <input type="hidden" id="id_usuario" name="id_usuario" class="form-control form-control-sm">
          <input type="text" id="id_usuario1" name="id_usuario1" class="form-control form-control-sm" disabled>
        </div>
        <div class="form-group  col-6 ">
          <label for="" class=" col-form-label-sm mb-0 font-weight-bold"> Última conexión : </label>
          <input type="text" id="ultima_conexion1" name="ultima_conexion" class="form-control form-control-sm" disabled>
        </div>
        <div class="form-group  col-6 ">
          <label for="" class=" col-form-label-sm mb-0 font-weight-bold"> Fecha de registro : </label>
          <input type="text" id="fecha_registro1" name="fecha_registro" class="form-control form-control-sm" disabled>
        </div>
        <div class="form-group col-md-6 col-12">
          <label for="" class=" col-form-label-sm mb-0 font-weight-bold"> Nombre: </label>
          <input type="text" id="nombre" name="nombre" class="form-control form-control-sm disabled">
        </div>
        <div class="form-group col-md-6 col-12">
          <label for="" class=" col-form-label-sm mb-0 font-weight-bold"> Apellido : </label>
          <input type="text" id="apellidos" name="apellidos" class="form-control form-control-sm disabled">
        </div>
        <div class="form-group col-md-6 col-12">
          <label for="" class=" col-form-label-sm mb-0 font-weight-bold"> Fecha de nacimiento: </label>
          <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control form-control-sm disabled">
        </div>
        <div class="form-group col-md-6 col-12">
          <label for="" class=" col-form-label-sm mb-0 font-weight-bold"> Documento de identidad: </label>
          <input type="text" id="dni_nif" name="dni_nif" class="form-control form-control-sm disabled">
        </div>
        <div class="form-group col-md-6 col-12">
          <label for="" class=" col-form-label-sm mb-0 font-weight-bold"> E-mail: </label>
          <input type="email" id="email" name="email" class="form-control form-control-sm disabled">
        </div>
        <div class="form-group  col-6">
          <label for="" class=" col-form-label-sm mb-0 font-weight-bold"> Direción : </label>
          <input type="text" id="direccion" name="direccion" class="form-control form-control-sm disabled">
        </div>
        <div class="form-group  col-3">
          <label for="" class=" col-form-label-sm mb-0 font-weight-bold"> Nº : </label>
          <input type="text" id="numero_direccion" name="numero_direccion" class="form-control form-control-sm disabled">
        </div>
        <div class="form-group  col-3">
          <label for="" class=" col-form-label-sm mb-0 font-weight-bold"> Planta : </label>
          <input type="text" id="planta" name="planta" placeholder="" class="form-control form-control-sm disabled">
        </div>
        <div class="form-group  col-6">
          <label for="" class=" col-form-label-sm mb-0 font-weight-bold"> Codigo postal : </label>
          <input type="text" id="codigo_postal" name="codigo_postal" class="form-control form-control-sm disabled">
        </div>
        <div class="form-group  col-6">
          <label for="" class=" col-form-label-sm mb-0 font-weight-bold"> Ciudad: </label>
          <input type="text" id="ciudad" name="ciudad" class="form-control form-control-sm disabled">
        </div>
        <div class="form-group  col-6">
          <label for="" class=" col-form-label-sm mb-0 font-weight-bold"> Provincia : </label>
          <input type="text" id="estado_provincia" name="estado_provincia" class="form-control form-control-sm disabled">
        </div>
        <div class="form-group  col-6">
          <label for="" class=" col-form-label-sm mb-0 font-weight-bold"> País : </label>
          <input type="text" id="pais" name="pais" class="form-control form-control-sm disabled">
        </div>
        <div class="form-group  col-6">
          <label for="" class=" col-form-label-sm mb-0 font-weight-bold"> Teléfono : </label>
          <input type="text" id="telefono" name="telefono" class="form-control imput-sm form-control-sm disabled">
        </div>
        <div id="main_plan" class="form-group  col-12">
          <label for="" class=" col-form-label-sm mb-0 font-weight-bold"> Plan : </label><br>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="precio_plan" id="precio_plan_0" value="0">
            <label class="form-check-label col-form-label-sm" for="inlineRadio1">Sin plan</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="precio_plan" id="precio_plan_2" value="2,00">
            <label class="form-check-label col-form-label-sm" for="inlineRadio2">Mensual 2,00€</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="precio_plan" id="precio_plan_20" value="20,00">
            <label class="form-check-label col-form-label-sm" for="inlineRadio3">Anual 20,00€</label>
          </div>
        </div>
        <div class="row col-12 justify-content-center mr-0 pr-0">
          <div class="  my-2 col-md-5 col-9 badge badge-info py-2 mr-0 pr-0 response_update_user" style=" border-radius:5px; margin-right:45px;"></div>
        </div>
        <div class="col-12 d-flex flex-wrap justify-content-around ">
          <button type="submit" class="col-lg-5 col-md-9 col-12 btn btn-outline-primary btn-sm  text-center mt-3 "> Guardar cambios </button>
          <a href="javascript:void[0]" datoId="" name="delete_user" id="delete_user" class="col-lg-5 col-md-9 col-12  delete_user btn-sm btn-block text-center btn btn-outline-danger mt-3">Eliminar <i class='fas fa-trash'></i></a>
        </div>

      </form>

      <div class="row col-12 justify-content-around mx-0">
        <div class="col-lg-5 col-md-9 col-12 px-0 px-0">
          <button type="submit" name="ver-mas" id="ver-mas" class=" btn btn-success btn-sm btn-block text-center mt-2 disabled">Ver más</button>
        </div>
      </div>

    </div>
  </div>
</div>


<div class="container my-5">
  <h3 id="admin" class="text-center mb-5"> Administración </h3>



  <div class="row justify-content-center ">

    <!-- <div id="example" class="bg-success position-sticky" style="width: 200px; height:200px;"></div> -->


    <!-- <div id="respuesta"></div>
      <form action="<?= SERVERURL ?>Pdf/Getcliente" method="post" class=" p-4">
        <input type="hidden" id="cliente" name="cliente">
        <input href="" type="submit" class="btn btn-outline-primary w-100  " value="Factura">
      </form>
      <form action="<?= SERVERURL ?>Pdf/Facturar" method="post" class=" p-4">
        <input href="" type="submit" class="btn btn-outline-primary w-100  " value="Facturar todos">
      </form> -->




    <!-- TABLE  -->
    <div class="col-md-8 col-12">
      <div class="my-4 border rounded p-3">
        <h4>Buscar Usuarios</h4>
        <form id="form_search" class=" d-flex flex-wrap  mb-3 justify-content-center ">
          <div class="col-md-6 col-8 d-inline-flex ">
            <label for="item_search" class=" mr-3"><strong>Buscar: </strong> </label>
            <select class="form-control form-control-sm col-7" id="item_search" name="item_search">
              <option value="id_usuario">Usuario</option>
              <option value="email">E-mail</option>
              <option value="apellidos">Apellido</option>
            </select>

          </div>

          <input name="search" id="search" class="form-control form-control-sm col-md-4  col-8 mt-md-0 mt-2" type="search" placeholder="Search" aria-label="Search">
          <!-- <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button> -->

        </form>
        <div class="text-center border-top pt-2 " id="">
          <table id="result_search" class=" table table-bordered table-sm table-responsive-md text-center">
          </table>
        </div>
      </div>
      <h3 class="text-center">Lista de Usuarios</h3>
      <p id="total_user_registered" class="font-weight-bold text-right"></p>
      <div class="row col-12 justify-content-center mr-0 pr-0">
        <div class="  my-2 col-md-5 col-9 badge badge-info py-2 mr-0 pr-0 response_update_user" style="border-radius:5px; margin-right:45px;"></div>
      </div>
      <table id="main_list_users" class=" table table-bordered table-sm table-responsive-md text-center">

      </table>
      <div id="pagination1"></div>
      <div class="row col-12 justify-content-center mr-0 pr-0">
        <div class="  my-2 col-md-5 col-9 badge badge-info py-2 mr-0 pr-0 response_pagination" style=" border-radius:5px; margin-right:45px;"></div>
      </div>
    </div>
  </div>


</div>

<script>
  $(".mediun_form_data_user").prepend(button_close_window()).append(button_close_window('<small>CANCELAR</small>'));

  function button_close_window(text = "X", color = "danger") {
    return `
      <div class="d-flex col-12 justify-content-center m-0">
        <a id="" class="close_window m-3 rounded px-1 btn-outline-${color}">${text}</a>
      </div>
    `
  }
</script>
<?php
require  assetsphp("js/admin");
?>