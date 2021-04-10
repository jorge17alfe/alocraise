
function aceptarCookies(data) {
    if (data === "accept") {
        Cookies.set( '__accept-cookies', 'yes_accept',{ expires: 1 });
        Cookies.set( 'Aceptas_las_cookies', 'si_acepto',{ expires: 1 });
        $("#main-cookies").fadeOut("slow",()=>{
            $("#main-cookies").remove()
        });
    } else {
        $("#response-cookies").html("<p>Si no acepta las cookies no navegará de la forma mas óptima en nuestra web</p>")
        setTimeout(()=>{
            // $("#response-cookies").fadeOut("slow");
            $("#main-cookies").fadeOut("slow",()=>{
                $("#main-cookies").remove()
            });
        },2000)
    }
}