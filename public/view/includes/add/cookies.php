<?php if (empty($_COOKIE['__accept-cookies'])) { ?>
    <div id="main-cookies" class="container-fluid fixed-bottom bg-light  p-5 " style="box-shadow: inset;">
        <div>
            <p class="text-justify">Utilizamos cookies propias y de terceros para mejorar nuestros servicios mediante el análisis de sus hábitos de navegación. Puede aceptar o rechazar todas las cookies no necesarias. Más información en nuestra <a href="politica-cookies">política de cookies</a> </p>
            <div id="response-cookies" class="text-danger"></div>
            <div class="d-flex justify-content-center">
                <button onclick="aceptarCookies('accept')" class="btn btn-sm btn-outline-info mr-3 ">Aceptar</button>
                <button onclick="aceptarCookies('notaccept')" class="btn btn-sm btn-outline-danger ">Rechazar</button>
            </div>
        </div>
    </div>
<?php } ?>
<script>
    function aceptarCookies(data) {
        if (data == "accept") {
             <?php 
             //   setcookie('__accept-cookies', 'yes_accept',time()+10) 
                ?>
            $("#main-cookies").fadeOut("slow")
            
        } else {
            $("#response-cookies").html("Si no acepta las cookies no navegará de la forma mas óptima en nuestra web")
        }
    }
</script>