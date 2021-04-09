<script>
    getComment()
    $(document).ready(function() {
        $("#comments").submit((e) => {
            e.preventDefault();
            $.post({
                    url: "<?= SERVERURL ?>information/receivemessage",
                    data: $("#comments").serialize()
                })
                .done(function(response) {
                    // console.log(response);
                    $("#comments").trigger("reset");
                    showresponse("respuestacomments", response)
                    hideresponse("respuestacomments")
                    getComment(2)
                    return false;
                });
        });
        $("#information").submit((e) => {
            e.preventDefault();
            $.post({
                    url: "<?= SERVERURL ?>information/receivemessage",
                    data: $("#information").serialize()
                })
                .done(function(response) {
                    // console.log(response);
                    $("#information").trigger("reset");
                    showresponse("respuestainformation", response)
                    hideresponse("respuestainformation")
                    return false;
                });
        });
    })

    function getComment(data = 2) {
        $.post({
                url: "<?= SERVERURL ?>information/getDataAll",
                data: {
                    "number": data
                }
            })
            .done(function(response) {
                const comments = JSON.parse(response);
                // console.log(comments.length);
                // console.log(comments);
                if (comments !== false) {
                    if (data == 2) {
                        $(".delete_comment").remove();
                    }
                    var inicio = [comments.length - 2]
                    for (var i = inicio; i < comments.length; i++) {
                        // console.log(comments[i]);
                        var row = "<div class='col-lg-5 col-12 delete_comment presentacion_2  p-4 my-3 ' style='' id='show" + i + "'> "
                        row += "<p class = 'text-right' > <strong> Publicado: </strong><cite>" + comments[i]["registration_date"] + "</cite><br><strong> dice: </strong>" + comments[i]["user"] + "</p>"
                        row += "<p> " + comments[i]["content"] +" </p> "
                        row += "<p class = 'text-right' ></p></div>"
                        // row += "<p class = 'text-right' > <a href = '<?= SERVERURL ?>index#main_comment' > Responder... </a></p></div>"
                        $(".comments").append(row);
                    }
                    $("#addcomment").attr("onclick", "getComment(" + [comments.length + 2] + ")");
                } else {
                    showresponse("respuestalastcoment", "no hay mas comentarios")
                    hideresponse("respuestalastcoment")
                }
            })
    }

    // show divs
    let element = document.querySelectorAll(".scrollshow");
    // var element1 = $(".scrollshow");
    // console.log(element[0]);
    // console.log(element1[0]);
    let showscrollporcent = (80 * $(window).height() / 100);
    window.addEventListener("scroll", showelements);
    window.addEventListener("scroll", hideelements);

    function showelements() {
        let scrolltop1 = document.documentElement.scrollTop;
        for (var i = 0; i < element.length; i++) {
            var alturaelement = element[i].offsetTop;
            if (alturaelement - showscrollporcent < scrolltop1) {
                // element[i].style.opacity = 1,
                element[i].style.transform = "scale(1)",
                element[i].style.transition = "transform .5s"
              
            }
        }
    }
    function hideelements() {
        let scrolltop1 = document.documentElement.scrollTop;
        for (var i = 0; i < element.length; i++) {
            var alturaelement = element[i].offsetTop;
            if (alturaelement - showscrollporcent > scrolltop1) {
                // element[i].style.opacity = 1,
                element[i].style.transform = "scale(0)",
                element[i].style.transition = "transform .5s"
              
            }
        }
    }
    // show bacground fixed
    $(window).scroll(function() {
        let porcent = (38 * $(document).height() / 100);
        if ($(document).scrollTop() < porcent) {
            $(".fondoportada").fadeIn("slow");
            $(".fondoportadaone").fadeOut("slow");
        } else {
            $(".fondoportada").fadeOut("slow");
            $(".fondoportadaone").fadeIn("slow");

        }
    })

  
</script>