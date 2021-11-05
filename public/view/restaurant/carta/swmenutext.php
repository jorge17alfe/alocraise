<form id="swMenuText" class="btn-20 col-12 py-5 row border-top">
    <h3 class="col-12">Tu carta</h3>
    <input name="sw_menu_text[id_usuario]" type="hidden" class="id_usuario" value="<?= $parameter->data->id_usuario; ?>">
    <p class="col-lg-8 col-9" id="titulo"> <strong> </strong></p>
    <div class="switch  mt-1 col-lg-4 col-3  text-left">
        <input class="" type="checkbox" data-toggle="toggle" name="sw_menu_text[sw_elements][sw_menu_text]" id="sw_menu_textBtn" data-size="small" data-style="ios" data-onstyle="info" value="1">
    </div>
    <script>
        $(document).ready(function() {
            showMenu();
            $("#sw_menu_textBtn").on("change", function() {
                $.ajax({
                        type: 'POST',
                        url: "<?= SERVERURL ?>restaurant/updateText",
                        data: $("#swMenuText").serialize()
                    })
                    .done(function(response) {
                        console.log(response);
                        // setTimeout(showMenu, 80)
                        showMenu();
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
                    // console.log(task.data.sw_elements) 
                    if (task.data.sw_elements['sw_menu_text'] == 1) {
                        $("#sw_menu_textBtn").attr('checked', 'checked');
                        $("#mainMenu_texts").hide(800);
                        $("#mainMenu_images").show(800);
                        $("#titulo").html("Incluye imágenes de tu carta <strong>" + task.data.nombre_empresa + "</strong> ó");
                    } else {
                        // $("#sw_menu_textBtn").removeAttr('checked');
                        $("#mainMenu_texts").show(800);
                        $("#mainMenu_images").hide(800);
                        $("#titulo").html("Crea tu propia carta <strong>" + task.data.nombre_empresa + "</strong> ó");
                    }

                })
        }
    </script>
</form>