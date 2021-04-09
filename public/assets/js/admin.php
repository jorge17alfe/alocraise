<script>
  $(document).ready(function() {


    getDataAll()

    function getDataAll() {
      $.ajax({
          url: "<?= SERVERURL ?>admin/getDataAll",
          type: "GET"
        })
        .done((response) => {
            let datos = JSON.parse(response);
            //  $('#respuesta').html(datos);
            // console.log(datos);
            let template = "";
            datos.forEach((dato) => {
              template += `
                  <tr datoId="${dato.id_usuario}">
                  <td>${dato.id}</td>
                  <td><a href="#" class="dato-item"> ${dato.usuarios} </a></td>
                  <td>${dato.email}</td>                 
                  <td>${dato.fecha_registro}</td>
                  <td>
                  <button name="borrar_usuario" class="dato-delete btn btn-danger">
                  Delete 
                  </button>
                  </td>
                  </tr>
                `;
            });
            $("#tarea").html(template);
          }
        )};
    $(document).on("click", ".dato-delete", (e) => {
      if (confirm("Are you sure you want to delete it?")) {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id_usuario = $(element).attr("datoId");
        $.post("<?= SERVERURL ?>admin/deleteUser", {
            id_usuario
          },
          (response) => {
            $(".respuesta").html(response);
            // console.log(response);
            getDataAll();
          });
      }
    });
  })
</script>