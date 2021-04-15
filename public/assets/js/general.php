<script>
    // DELETE ROW
    function deleterow(data, section, group) {
        var user = $("#id_usuario").val();
        // console.log(data + section + group)
        $.post({
                url: "<?= SERVERURL ?>restaurant/deleteRow",
                data: {
                    ["id_usuario"]: user,
                    [section]: {
                        [data]: ''
                    },
                    "group": group
                }

            })
            .done(function(response) {
                console.log(response)
                $("#main" + section + data).fadeOut(600, function() {
                    setTimeout(getRow, 1);
                    setTimeout(getIframe, 1);
                });

            })
    }
    // delete data all
    function deleteAll(data, form) {
        console.log('esta')
        if (confirm('Estas seguro? Se borrarán todos los datos.') == true) {
            var user = $("#id_usuario").val();
            $.post({
                    url: "<?= SERVERURL ?>restaurant/deleteAll",
                    data: {
                        "id_usuario": user,
                        "group": data
                    }
                })
                .done(function(response) {
                    console.log(response)
                    showresponse("respuesta", response)
                    $(form).trigger("reset");
                    setTimeout(getRow, 300)
                    setTimeout(getIframe, 300);
                    hideresponse("respuesta")
                })
        }
    }
    // SHOW HIDE RESPONSE FORM
    function showresponse(data, response) {
        $("." + data + "").show('swing').html(response, "swing")
    }

    function hideresponse(data) {
        setTimeout(function() {
            $("." + data + "").hide('swing').html('')
        }, 3000);

        return;
    }
    // ANIMATE HIDE-SHOW SLICE ELEMENT
    $(".right").css({
        left: 3000
    });
    $(".left").css({
        right: 3000
    });
    $(window).on("load", () => {

        $(".right").animate({
                left: 0,
            },
            1000,
            function() {
                $(this).animate({
                        left: 100
                    }, 400,
                    function() {
                        $(this).animate({
                                left: 0
                            }, 200,
                            function() {
                                $(this).animate({
                                        left: 50
                                    }, 100,
                                    function() {
                                        $(this).animate({
                                            left: 0
                                        }, 50, function() {
                                            $(this).animate({
                                                    left: 50
                                                }, 25,
                                                function() {
                                                    $(this).animate({
                                                        left: 0
                                                    }, 10)
                                                })
                                        })
                                    })
                            })
                    })

            }
        );

        $(".left").animate({
                right: 0
            },
            1000,
            function() {
                $(this).animate({
                        right: 100
                    }, 400,
                    function() {
                        $(this).animate({
                                right: 0
                            }, 200,
                            function() {
                                $(this).animate({
                                        right: 50
                                    }, 100,
                                    function() {
                                        $(this).animate({
                                            right: 0
                                        }, 50, function() {
                                            $(this).animate({
                                                    right: 50
                                                }, 25,
                                                function() {
                                                    $(this).animate({
                                                        right: 0
                                                    }, 10)
                                                })
                                        })
                                    })
                            })
                    })
            }
        );
    });
    // CSS logo main
    $(".logo").on("click", function() {
        window.location = '<?= SERVERURL ?>';
    })
</script>