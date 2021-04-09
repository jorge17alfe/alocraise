<script>
  var win = null;

  function printIt(printThis, size,colortext) {
    $.get({
      url: "<?= SERVERURL ?>restaurant/getData",
      success: function(response) {
        const datas = JSON.parse(response);
        // console.log(datas);
        var infopanel = "";
        // EDIT to print data
        var thisdata = $("#create")
          .find(".tab-pane.active :input")
          .filter(function(index, element) {
            return $(element).val() != "";
          })
          .serializeArray();
        var formData = JSON.stringify(thisdata);
        var dede = $.parseJSON(formData);

        $(".infopanel").html("");

        $.each(dede, function(i, item) {
          var dato = item.name + ": " + item.value;
          infopanel += "<br>" + dato;
        });
        var alocraise = $("#copyright").attr("copyright");
        var nombre_empresa = datas.data.nombre_empresa;
        var nombre_web = datas.data.nombre_web;
        var telefono = datas.data.telefono;

        // EDIT to print data END
        // console.log(infopanel);
        // console.log(telefono);
        border= ''
        if (size == 4) {
          var a = 6;
          var r = 6;
          var h = 3;
          var logosize = 50;
          var border = "border"
        } else if(size == 8) {
          var a = 4;
          var r = 6;
          var h = 2;
          var logosize = 70;
          var border = "border"
        }else{
          var a = 1
          var r = 12;
          var h = 1;
          var logosize = 90;
        }
        var img = $(printThis).find("img").attr("src");
       
        if(datas.data.logo[0]== undefined){          
          var logourl = "<?=SERVERURL?>public/assets/img/logo.svg";
        }else{
          var logourl = "<?=SERVERURL?>public/users/"+datas.data.id_usuario+"/img/logo/"+datas.data.logo[0]+"";
          
        }

        var content = "<html><head><title></title> <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'></head><body  class=' text-center row'>"
        for (var i = 0; i < a; i++) {
          content += "<div class='col-"+r+" "+border+" p-4 ' style='color:"+colortext+"'>";
          content += "<h"+h+" class='px-5 py-3 '>" + nombre_empresa + "</h"+h+">";
          content += "<img src=" + img + "/>";
          content += "<h3>VISÍTANOS</h3>";
          content += "<div class='col-12 d-inline-flex justify-content-around px-5'><img src='"+logourl+"' class='rounded-circle float-left' style='width:"+logosize+"px;'/>";
          content += "<h6 style=''> Llámanos <br>" + telefono + "</h6></div>";
          content += "<br><p class='text-right pr-5'style='color:#2733a5' ><small>Copyright &copy;Aloc_Raise</small></p>";
          content += "</div></body></html>";
        }

        win = window.open();
        self.focus();
        win.document.open();
        win.document.write(content);
        win.document.close();

        win.onload = function() {
          win.print();
          win.close();
        };
      }
    })
  }

  $("#submitcreate").on("click", function() {
    var $myForm = $("#create");
    if (!$myForm[0].checkValidity()) {
      // If the form is invalid, submit it. The form won't actually submit;
      // this will just cause the browser to display the native HTML5 error messages.
      $myForm.find(":submit").click();
    }

    $(".colorpickerback").colorpicker("enable");

    $(".preloader").fadeIn(100, function() {
      var sendata = $("#create :input")
        .filter(function(index, element) {
          return $(element).val() != "";
        })
        .serialize();
      var direc = "<?= SERVERURL ?>lib/generadorqr";
      $.ajax({
          type: "POST",
          url: "" + direc + "/include/process.php",
          cache: false,
          data: sendata,
        })
        .fail(function(error) {
          $("#alert_placeholder").html(
            '<div class="alert alert-warning alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><span class="error-response">' +
            error.statusText +
            "</span></div>"
          );
        })
        .done(function(msg) {
          $("#alert_placeholder").html(msg);
          if ($("#trans-bg").prop("checked")) {
            $(".colorpickerback").colorpicker("disable");
          }

          var result = JSON.parse(msg);
          if (result.hasOwnProperty("errore")) {
            $("#alert_placeholder").html(
              '<div class="alert alert-warning alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><span class="error-response">' +
              result.errore +
              "</span></div>"
            );
            $(".resultholder img").attr("src", "" + result.placeholder + "");
            $(".preloader").fadeOut("slow");
          } else {
            d = new Date();
            $(".resultholder img")
              .one("load", function() {
                $(this).attr(
                  "src",
                  "" + result.placeholder + "?t=" + d.getTime()
                );

                $("#alert_placeholder").html("");
                var linksholder =
                  '<a class="btn btn-default" href="' +
                  direc +
                  "/include/get.php?path=" +
                  result.png +
                  '"><i class="fa fa-download"></i> PNG</a>';
                linksholder =
                  linksholder +
                  '<a class="btn btn-default" href="' +
                  direc +
                  "/include/get.php?path=" +
                  result.svg +
                  '"><i class="fa fa-download"></i> SVG</a>';
                linksholder =
                  linksholder +
                  '<button class="btn btn-default print"><i class="fa fa-print"></i></button>';

                $(".linksholder").html(linksholder);

                $(".print").click(function() {
                  printIt(".resultholder", result.size,result.colortext);
                });

                $(".preloader").fadeOut("slow");
              })
              .each(function() {
                if (this.complete) {
                  // $(this).load(); // For jQuery < 3.0
                  $(this).trigger("load"); // For jQuery >= 3.0
                }
              });
          }
        });
    });
  });

  $(document).ready(function() {
    // COLOR PICKER
    var backcol = $(".colorpickerback").val();
    var frontcol = $(".colorpickerfront").val();
    $(".getcol").css("background", backcol);
    $(".getcol").css("color", frontcol);

    $("#file").change(function() {
      $("#sottometti").submit();
    });

    $(".alert").alert();

    $(".colorpickerback")
      .colorpicker()
      .on("change", function(ev) {
        var color = ev.color.toString("hex");
        $(".getcol").css("background", color);
      });
    $(".colorpickerfront")
      .colorpicker()
      .on("change", function(ev) {
        var color = ev.color.toString("hex");
        $(".getcol").css("color", color);
      });

    $(".tooltipper").tooltip();
  });

  // Translarent background
  $(document).on("change", "#trans-bg", function() {
    if ($(this).prop("checked")) {
      $(".colorpickerback").colorpicker("setValue", "#ffffff");
      $(".colorpickerback").colorpicker("disable");
    } else {
      $(".colorpickerback").colorpicker("enable");
    }
  });

  $('a[data-toggle="tab"]').on("shown.bs.tab", function(e) {
    var dest = $(e.target).attr("href");
    $("#getsec").val(dest);

    if (dest == "#location") {
      initialize();
    }
  });

  // validate form
  (function() {
    "use strict";
    window.addEventListener(
      "load",
      function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName("needs-validation");
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener(
            "submit",
            function(event) {
              event.preventDefault();
              event.stopPropagation();
              form.classList.add("was-validated");
            },
            false
          );
        });
      },
      false
    );
  })();

</script>