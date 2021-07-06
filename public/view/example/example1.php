<div id="root"></div>
<script>
var jl = "Soy una maquina"
$("#root").append(`<div id="primer"></div>`)
$("#primer").append("<h3> "+jl+" 1"+"</h3>")
$("#primer").prepend("<h3 class='border-top'> "+jl+" 2"+"</h3>")
$("#primer").append("<h3 class='border-bottom'> "+jl+" 3"+"</h3>")
$("#primer").before("<h3 class='bg-primary'> "+jl+" 4"+"</h3>")
$("#primer").after("<h3 class='bg-danger'> "+jl+" 5"+"</h3>")
$("#primer").attr({class: "bg-success py-5  m-5 text-center", mar :"mer",mir:"mir"})
// $("#primer").text("<h3 class='bg-info'> "+jl+" 6"+"</h3>")

</script>