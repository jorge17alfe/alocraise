<div id="root" class="text-center "></div>

<script>
    const head = () => {
        var row = "<div class='d-flex justify-content-between p-5 bg-light'><div class=''><h2 id='head'>Portafolio </h2>"
        row += "<h3 id='sub-head'>Jorge Luis Ordóñez Morales </h3></div>"
        row += "<img style='width:85px; height:85px;' src=<?= assets("img/jorge1.png"); ?>>"
        row += "</div>"
        return (row)
    }
    let fecha = new Date();
    let year = fecha.getFullYear();
    const footer = () => {
        var row = "<div class='p-5 bg-light d-flex flex-column'><h3 id='footer' >FOOTER</h3><div id='sub-footer' class='col-12 '></div>"
        row += "<span class='mt-5'>&copy; Aloc_Raise " + year + "</span>"
        row += "</div>"
        return (row)
    }

    var rest = head();
    rest += "<div id='root2' class='col-12 text-center text-success py-5 '><h1>example<h1></div>";
    rest += footer();

    $("#root").append(rest);

    var link_page = '';
    var link_page_list = ["jorge", "damy", "magdy", "marg", "page404"];
    link_page_list.forEach((e) => {
        link_page += "<a id='" + e + "' class='example'>" + e + " | </a>"

    })
    // $(link_page_list).each((e, el) => {
    //     link_page += "<a id='" + el + "' class='example'>" + el + " | </a>"

    // })
    $("#sub-head").after(link_page)
    $("#sub-footer").append(link_page)

    let jl = {}


    const example0 = (data = '') => {

        return ("<h1>Example 0 jorge" + data + "</h1>")
    }
    jl["jorge"] = example0()

    const example1 = (data = '') => {
        return ("<h1>Example 1 damy" + data + "</h1>")
    }
    jl["damy"] = example1()

    const example2 = (data = '') => {
        return ("<h1>Example 2 magdy" + data + "</h1>")
    }
    jl["magdy"] = example2()

    const example3 = (data = '') => {
        return ("<h1>Example 3 marg" + data + "</h1>")
    }
    jl["marg"] = example3()




    const page404 = (data = '') => {
        // history.pushState(null, "", "page-404")
        return (
            `<div className='container contenido '>
            <section className='container text-center pag_error pl-2'>
                <img src='<?= SERVERURL ?>public/assets/img/osoliam.png' alt='logo' />
                <h3>Hay un error, esa página aún no existe.</h3>
                <p>Inténtalo de nuevo...</p>
                <p>Que tengas la mejor de las suertes..!!</p>
                <a className='' type='button' onClick='returnPage()'>
                Regresar..
                </a>
            </section>
        </div>`
        )
    }
    jl["page404"] = page404()

    let url3 = [];

    const url2 = (url) => {
        var ele = url3.pop();
        url3 = [];
        url3.push(ele);
        url3.push(url);
        // console.log(url3);
        // console.log(window.location["href"])
        // $("#root2").append(window.location["href"])
        return history.pushState(null, "", url)
    }
    
    function returnPage() {
        window.history.go(-1);
        var url4= url3[url3.length-2]
        // console.log(url4);
        $("#root2").html(jl[url4])
    }

    let link = $(".example");
    link.each((e) => {
        $(link[e]).on("click", () => {
            var jl2 = $(link[e]).attr("id")

            if (jl[jl2]) {
                $("#root2").html(jl[jl2])
                url2(jl2)
            } else {
                $("#root2").html(jl["page404"])

            }
        })
    })

</script>
<style>
    .example:hover {
        cursor: pointer;
    }
</style>