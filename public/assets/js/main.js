
function aceptarCookies(data) {
    if (data === "accept") {
        Cookies.set( '__accept-cookies', 'yes_accept',{ expires: 365 });
       
        $("#main-cookies").fadeOut("slow",()=>{
            $("#main-cookies").remove()
        });
       
    } else {
        $("#response-cookies").html("<p>Si no acepta las cookies no navegará de la forma mas óptima en nuestra web</p>")
        setTimeout(()=>{
            $("#main-cookies").fadeOut("slow",()=>{
                $("#main-cookies").remove()
            });
        },4000)
    }

}
// $(".response-ejemplo").html("__accept-cookies");
// setTimeout(()=>{
//     var cookie =Cookies.remove('__accept-cookies');

// },5000)
// $(".response-ejemplo").html("He aceptado la cookie: " +cookie);
