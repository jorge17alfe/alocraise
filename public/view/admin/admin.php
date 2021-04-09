<div class="container">
  <h3 id="admin"> Administración </h3>
  <div class="row ">

    <div class="col-md-5">
      <div class="card">
        <div class="card-body">
          <!-- FORM TO ADD TASKS -->


          <form class=" row" id="task-form">

            <div class="form-group  col-12 ">
              <label for="" class=" col-form-label-sm mb-0"> ID de cliente : </label>
              <input type="text" id="id" name="id" class="form-control form-control form-control-sm" disabled>
            </div>
            <div class="form-group  col-12 ">
              <label for="" class=" col-form-label-sm mb-0"> Nick : </label>
              <input type="text" id="id_usuario" name="id_usuario" class="form-control form-control form-control-sm" disabled>
            </div>
            <div class="form-group  col-12 ">
              <label for="" class=" col-form-label-sm mb-0"> Plan : </label>
              <input type="text" id="plan" name="plan" class="form-control form-control form-control-sm" disabled>
            </div>
            <div class="btn-20 mt-4 col-12 mb-2">
              <select class="custom-select custom-select-sm" id="selected_plan" name="selected_plan">
                <option value="sinplan:0">Sin plan</option>
                <option value="Planmensual:2">Plan mensual</option>
                <option value="Plananual:20">Plan anual</option>
              </select>
            </div>
            <div class="form-group  col-12  ">
              <label for="" class=" col-form-label-sm mb-0"> Nombre: </label>
              <input type="text" id="nombre" name="nombre" class="form-control form-control-sm">
            </div>
            <div class="form-group   col-12">
              <label for="" class=" col-form-label-sm mb-0"> Apellido : </label>
              <input type="text" id="apellidos" name="apellidos" class="form-control form-control form-control-sm">
            </div>
            <div class="form-group   col-12 ">
              <label for="" class=" col-form-label-sm mb-0"> Fecha de nacimiento: </label>
              <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control form-control form-control-sm">
            </div>
            <div class="form-group   col-12">
              <label for="" class=" col-form-label-sm mb-0"> Documento de identidad: </label>
              <input type="text" id="dni_nif" name="dni_nif" class="form-control form-control form-control-sm">
            </div>
            <div class="form-group  col-12">
              <label for="" class=" col-form-label-sm mb-0"> E-mail: </label>
              <input type="text" id="email" name="email" class="form-control form-control form-control-sm">
            </div>
            <div class="form-group  col-6">
              <label for="" class=" col-form-label-sm mb-0"> Direción : </label>
              <input type="text" id="direccion" name="direccion" class="form-control form-control form-control-sm">
            </div>
            <div class="form-group  col-3">
              <label for="" class=" col-form-label-sm mb-0"> Nº : </label>
              <input type="text" id="numero_direccion" name="numero_direccion" class="form-control form-control form-control-sm">
            </div>
            <div class="form-group  col-3">
              <label for="" class=" col-form-label-sm mb-0"> Planta : </label>
              <input type="text" id="planta" name="planta" placeholder="" class="form-control form-control form-control-sm">
            </div>
            <div class="form-group  col-6">
              <label for="" class=" col-form-label-sm mb-0"> Codigo postal : </label>
              <input type="text" id="codigo_postal" name="codigo_postal" class="form-control form-control form-control-sm">
            </div>
            <div class="form-group  col-6">
              <label for="" class=" col-form-label-sm mb-0"> Ciudad: </label>
              <input type="text" id="ciudad" name="ciudad" class="form-control form-control form-control-sm">
            </div>
            <div class="form-group  col-6">
              <label for="" class=" col-form-label-sm mb-0"> Estado ó provincia : </label>
              <input type="text" id="estado_provincia" name="estado_provincia" class="form-control form-control form-control-sm">
            </div>
            <div class="form-group  col-6">
              <label for="" class=" col-form-label-sm mb-0"> País : </label>
              <input type="text" id="pais" name="pais" class="form-control form-control form-control-sm">
            </div>
            <div class="form-group  col-6">
              <label for="" class=" col-form-label-sm mb-0"> Teléfono : </label>
              <input type="text" id="telefono" name="telefono" class="form-control form-control form-control-sm">
            </div>
            <button type="submit" class="btn btn-primary btn-block text-center"> Guardar cambios </button>

          </form>

          <div class="row">
            <button type="submit" name="ver-mas" id="ver-mas" class="btn btn-success btn-block text-center mt-2">Ver más</button>
            <button type="submit" id_usuario="" name="borrar_usuario" id="borrar_usuario" class="btn btn-danger btn-block text-center mt-2 borrar_usuario btn btn-danger">Eliminar usuario</button>
          </div>
        </div>

      </div>

      <div id="respuesta"></div>
      <form action="<?= SERVERURL ?>Pdf/Getcliente" method="post" class=" p-4">
        <input type="hidden" id="cliente" name="cliente">
        <input href="" type="submit" class="btn btn-outline-primary w-100  " value="Factura">
      </form>
      <form action="<?= SERVERURL ?>Pdf/Facturar" method="post" class=" p-4">
        <input href="" type="submit" class="btn btn-outline-primary w-100  " value="Facturar todos">
      </form>
    </div>



    <!-- TABLE  -->
    <div class="col-md-7">
      <form class="form-inline  form-group my-3 col-12 d-flex justify-content-center">
        <div class="form-group">
          <label for="search" class=" pr-2"><strong>Buscar: </strong> </label>
          <select class="form-control" id="buscarcomo">
            <option value="id_usuario">Usuario</option>
            <option value="email">E-mail</option>
            <option value="apellidos">Apellido</option>
          </select>
        </div>

        <input name="search[search]" id="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <!-- <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button> -->
      </form>
      <div class="card my-4" id="result-search">
        <div class="card-body">
          <!-- SEARCH -->
          <div id="container"></div>
        </div>
      </div>

      <table class=" table table-bordered table-sm table-responsive">
      <div class="respuesta"></div>
        <thead>
          <tr>
            <td>Id usuario</td>
            <td>Usuario</td>
            <td>Email</td>
            <td>Fecha reg</td>
          </tr>
        </thead>
        <tbody id="tarea"></tbody>
      </table>
    </div>
  </div>

</div>

<div class="">

  <form action="<?= SERVERURL ?>Admin/getDataAll" method="POST">
    <button type="submit " name="enviar_consult" value="" class="btn btn-outline-info">enviar consulta datos</button>
  </form>
  <form action="<?= SERVERURL ?>Admin/GetRow" method="POST">
    <input type="text " name="id_usuario">
    <button type="submit " name="enviar_consult" value="" class="btn btn-outline-info">enviar consulta row</button>
  </form>
  <form action="<?= SERVERURL ?>Admin/Search" method="POST" name="form">
    <div class="form-inline">
      <!-- <label for="search[search]" class=" pr-2"><strong>Buscar: </strong> </label>  -->
      <input type="text " name="search">
    </div>
    <select class="form-control" name="select">
      <option value="usuario">Usuario</option>
      <option value="email">Email</option>
    </select>
    <button type="submit " name="enviar_consult" value="" class="btn btn-outline-info">enviar search</button>
  </form>
  <form action="<?= SERVERURL ?>Admin/Delete" method="POST">
    <input type="text " name="id_usuario">
    <button type="submit " name="enviar_consult" value="" class="btn btn-outline-info">borrar</button>
  </form>
</div>

</div>
<?php
require  assetsphp("js/admin") ;
?>


