<?php if (!isset($_COOKIE['__accept-cookies'])) { ?>
    <div id="main-cookies" class="fixed-bottom d-flex align-items-end  p-0" style="box-shadow: inset; height:100%; background-color:rgb(180, 190, 237,.5);">
        <div class="container-fluid  bg-light">
        <div class="container px-2 py-5 p-md-5">
            <p class="text-justify">Utilizamos cookies propias y de terceros para mejorar nuestros servicios mediante el análisis de sus hábitos de navegación. Puede aceptar o rechazar todas las cookies no necesarias. Más información en nuestra <a href="politica-cookies">POLÍTICA DE COOKIES</a> </p>
            <div id="response-cookies" class="text-danger  text-center py-3"></div>
            <div class="d-flex justify-content-center">
                <button onclick="aceptarCookies('accept')" class="btn btn-sm btn-outline-info mr-3 ">Aceptar</button>
                <button onclick="aceptarCookies('not-accept')" class="btn btn-sm btn-outline-danger ">Rechazar</button>
            </div>
        </div>
        </div>
    </div>
<?php } ?>
<script>
   
</script>