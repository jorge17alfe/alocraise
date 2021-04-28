<div class="text-center pt-5">
        <h1 class="text-danger "> Diseño de Magdy </h1>
        <h2>ejercicio de reloj</h2>
  
        <p class="text-info">Este es mi primer ejercicio de programacion</p>
    </div>
    <div class="reloj text-center display-3 text-success">
        
    </div>
    
    
    <!-- <button class="boton">
        boton
    </button> -->


<script>
    

function reloj(){

    var reloj=new Date();

    var hora=reloj.getHours();
    var minutos=reloj.getMinutes();
    var segundos=reloj.getSeconds();   
    
    
    
    $(".reloj").html(hora+" : "+minutos+" : "+segundos)
}

setInterval("reloj()",1000)
</script>
