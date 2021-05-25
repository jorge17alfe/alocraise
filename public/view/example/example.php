<div id="root" class="text-center "></div>

<script>
    const head = () => {
        var row = "<div class='d-flex justify-content-between p-5 bg-primary'><div class=''><h2 id='head'>Portafolio </h2>"
        row += "<h3 id='sub-head'>Jorge Luis Ordóñez Morales </h3></div>"
        row += "<img style='width:85px; height:85px;' src=<?= assets("img/jorge1.png"); ?>>"
        row += "</div>"
        return (row)
    }
    let fecha = new Date();
    let year = fecha.getFullYear();
    const footer = () => {
        var row = "<div class='p-5 bg-primary d-flex flex-column'><h3 id='footer' >FOOTER</h3>"
        row += "<span class='mt-5'>&copy; Aloc_Raise " + year + "</span>"
        row += "</div>"
        return (row)
    }

    var rest = head();
    rest += "<div id='root2' class='col-12 text-center text-success py-5 '><h1>example<h1></div>";
    rest += footer();

    $("#root").append(rest);

    var link_page = '';
    for (var i = 0; i < 4; i++) {
        var page = "example" + i;
        link_page += "<a id='" + page + "' class='example'>" + page + " | </a>"
    }
    $("#sub-head").after(link_page)
    $("#footer").after(link_page)

    let jl = {}


    const example0 = (data = '') => {
        return ("<h1>example 0" + data + "</h1>")
    }
    jl["example0"] = example0()

    const example1 = (data = '') => {
        return ("<h1>example 1" + data + "</h1>")
    }
    jl["example1"] = example1()

    const example2 = (data = '') => {
        return ("<h1>example 2" + data + "</h1>")
    }
    jl["example2"] = example2()

    const example3 = (data = '') => {
        return ("<h1>example 3" + data + "</h1>")
    }
    jl["example3"] = example3()




    let link = $(".example");
    link.each((e) => {
        $(link[e]).on("click", () => {
            var jl2 = $(link[e]).attr("id")
            $("#root2").html(jl[jl2])
        })
    })


    // console.log(jl)
</script>
<style>
    .example:hover {
        cursor: pointer;
    }
</style>