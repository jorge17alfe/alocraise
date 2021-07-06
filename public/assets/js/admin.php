<?php $parameter['personal_data'] = json_encode($parameter['personal_data']);  ?>
<script>
  $(document).ready(function() {
    getDataAll()
    $(".disabled").attr("disabled", "disabled")
    $("#main_form_data_user").hide()

    $(".close_window").on("click", () => {
      $("#main_form_data_user").hide(500)
    })
    // let groupOption = ["id_usuario", "email", "apellidos"];
    // let option = [];
    // groupOption.forEach((e)=>{
    //    option +=`<option value="${e}">${e}</option>` 
    // })
    // $("#item_search").html(option)

    let pagination = 1;

    function getDataAll(row_inicio = 1) {
      $.post({
          url: "<?= SERVERURL ?>admin/getDataAll",
          data: {
            row_inicio: row_inicio
          }
        })
        .done((response) => {
          // console.log(response)
          let datos = JSON.parse(response);
          // console.log(datos)
          let template = "";
          $("#main_list_users").html(headerListUsers('list_user'))
          datos[0].forEach((dato) => {
            template += listUsers(dato.id, dato.id_usuario, dato.email, dato.fecha_registro)
          });

          $("#list_user").html(template);
          $("#pagination1").html(paginationUser(datos[4]));
          pagination = datos[3];
          $("#total_user_registered").html("Total usuarios registrados : <spam class='text-primary'>"+datos[1]+"</spam>");
          $("#total-pages-pagination").val(pagination);
          // console.log(pagination)
        })
    };

    function headerListUsers(id_table) {
      return `
            <thead class="thead-dark">
              <tr class="">
                <td class="font-weight-bold col-3">Id</td> 
                <td class="font-weight-bold col-3">Usuario</td>
                <td class="font-weight-bold col-3">Email</td>
                <td class="font-weight-bold col-3">Fecha reg</td>
              </tr>
            </thead>
            <tbody id="${id_table}"></tbody>
          `
    }

    function paginationUser(total_rows) {
      var result = '';
      result += `<nav aria-label="..." class=''>
                  <ul class="pagination pagination-sm justify-content-center" >
                    <li class="page-item ">
                    <a class="page-link prev-next" href="javascript:void[0]" tabindex="-1"  style='color:var(--color_primary)'>Previous</a>
                    </li>
                  `;
      result += `<select id="total-pages-pagination" class="page-link" id="" name=""   style='color:var(--color_primary)' >`
      for (var i = 0; i < total_rows; i++) {
        result += `<option value="${i+1}">${i+1}</option>`;
      }
      result += `</select><li class="page-item">
                      <a class="page-link prev-next"tabindex="1" href="javascript:void[0]"  style='color:var(--color_primary)'>Next</a>
                      </li>
                </ul>
                </nav>`;

      return result;
    }

    $(document).on("change", "#total-pages-pagination", () => {
      let paginationElement = $(this)[0].activeElement;
      pagination = parseFloat($(paginationElement).val());
      getDataAll(pagination)
    })

    $(document).on("click", ".prev-next", () => {
      let paginationElement = $(this)[0].activeElement;
      paginationElement = $(paginationElement).attr("tabindex")
      pagination = parseFloat(pagination) + parseFloat(paginationElement)
      getDataAll(parseFloat(pagination))
    })

    function listUsers(id, id_usuario, email, fecha_registro) {
      var borrar = '';
      if (email != "<strong>No hay mas usuarios</strong>") {
        borrar = `   <a href='javascript:void[0]' name="borrar_usuario" class="delete_user text-danger" datoId = "${id_usuario}"><i class='fas fa-trash'></i></a>`;
      }
      return `
              <tr class=''>
              <td class='px-3 font-weight-bold'>${id}</td>
              <td class=""><a href="javascript:void[0]" class="user_id"> ${id_usuario} </a></td>
              <td >${email}</td>                 
              <td><small>${fecha_registro}</small></td>
              <td>${borrar}</td>
              </tr>
            `
    }

    $(document).on("click", ".delete_user", (e) => {
      e.preventDefault();
      if (confirm("Are you sure you want to delete it?")) {
        const element = $(this)[0].activeElement;
        const id_usuario = $(element).attr("datoId");
        // console.log(id_usuario)
        $.post("<?= SERVERURL ?>admin/deleteUser", {
            id_usuario
          },
          (response) => {
            showresponse("response_update_user", response);
            // console.log(response);
            $("#main_form_data_user").hide(1000)
            getDataAll();
          });
      }
    });
    const precio_plan = [0, 2.00, 20.00]

    $(document).on("click", ".user_id", () => {
      const user_id = $(this)[0].activeElement;
      user = $(user_id).text();
      $.post({
          url: "<?= SERVERURL ?>admin/getRow",
          data: {
            id_usuario: user
          }
        })
        .done((response) => {
          // console.log(response)
          $("#main_form_data_user").show("swing")
          datas = JSON.parse(response);
          name_input_id = JSON.parse('<?php print_r($parameter['personal_data']) ?>');
          $('input:radio').removeAttr('checked');
          $(name_input_id).each((e, el) => {
            $("#" + el).removeAttr("disabled")
            $("#" + el).val(datas[el])
          })
          $(".disabled").removeAttr("disabled")

          $(precio_plan).each((e, v) => {
            if (datas["precio_plan"] == precio_plan[e]) {
              $("#precio_plan_" + v).attr("checked", "checked")
            }
          })

          $("#plan").val(datas["precio_plan"] + "€");
          $("#id1").val(datas["id"]);
          $("#ultima_conexion1").val(datas["ultima_conexion"]);
          $("#fecha_registro1").val(datas["fecha_registro"]);
          $("#id_usuario1").val(datas["id_usuario"]);
          $("#delete_user").attr("datoId", datas["id_usuario"]);

          getDataAll(pagination);
        })
    })

    $("#form_data_user").submit((e) => {
      e.preventDefault();
      // const form_send = $("#form_data_user").serialize();
      var form_send = new FormData($("#form_data_user")[0]);
      $.post({
          url: "<?= SERVERURL ?>admin/updateRow",
          data: form_send,
          cache: false,
          contentType: false,
          processData: false
        })
        .done((response) => {
          showresponse("response_update_user", response);
          // console.log(response)
          $("#form_data_user").trigger("reset");
          $('input:radio').removeAttr('checked');
          $(".disabled").attr("disabled", "disabled");
          $("#main_form_data_user").hide("swing");
          getDataAll(pagination)
        })
    })

    $(document).on("keyup", "#search", () => {
      search = $("#form_search").serialize();
      $.post({
          url: "<?= SERVERURL ?>admin/search",
          data: search
        })
        .done((response) => {
          // console.log(response)
          datas = JSON.parse(response);
          // console.log(datas.length)
          var template = ''
          if (datas.length > 0) {
            $("#result_search").html(headerListUsers('list_search'))
            datas.forEach((dato) => {
              template += listUsers(dato.id, dato.id_usuario, dato.email, dato.fecha_registro)
            })
          } else {
            $("#result_search").html("<tr><td class='py-3 font-weight-bold text-danger'>Usuario no existe</td></tr>");
          }
          $("#list_search").html(template)
        })

    })

  })
</script>
<?php require assetsphp("js/general") ?>