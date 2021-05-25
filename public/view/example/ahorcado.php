<div id="main_ahorcado" class="container my-3 pt-3 text-center border bg-white">
    <h1 class=" logo">EL Ahorcado </h1>
    <div id="root" class=" row justify-content-around align-items-center">
        <div class=" col-md-7 col-12 d-flex justify-content-between align-items-center">
            <img id="img_ahorcado" src="" alt="">
            <div class="text-right">
                <div class="mb-0" id="result_game"></div>
                <div id="letters_choosse" class=" my-3 border p-2 mr-2"></div>
            </div>
        </div>
        <div class=" col-md-4 col-12 rounded border py-2">
            <p type="text" class="text-center mb-0" id='show_trace'></p>
            <p type="text" class="text-center mb-0" id='show_hidden_word'></p>
        </div>
        <div class="col-12 d-flex  justify-content-center">
            <div id="response" class='text-light bg-danger col-md-3 col-8 rounded my-2'></div>
        </div>
        <div id="alphabet" class="col-xl-5 col-lg-6 col-md-8 col-12 btn-20 d-flex flex-wrap justify-content-between mr-0 pr-2"> </div>
        <div class="col-12 my-4">
            <button id="restart" class="btn btn-outline-primary  btn-sm px-5">Iniciar Juego</button>
        </div>
    </div>
</div>
<!-- <div id='main_word_hidden' class='main_word_hidden position-fixed d-flex  justify-content-center align-items-center' style='top:0; width:100%; height:100%; background-color:rgb(102,102,107,.9);'>
    <div class='p-5 bg-light d-flex flex-column  input-group-sm rounded'>
        <p id="close_ventana" onMouseOver="this.style.cursor='pointer'" style="width: 20px;  top:-35px; right:-35px;" class="position-relative align-self-end border text-center rounded-circle">X</p>
        <p class='font-weight-bold '>Ingresa una palabra para iniciar El Ahorcado</p>
        <input type='text' class='form-control  mb-1' id='word_hidden' name='word_hidden' placeholder='Ingresa tu palabra'>
        <input type='text' class='form-control  mb-1' id='pista' name='pista' placeholder='Ingresa tu pista'>
        <input type='submit' class='btn btn-outline-success  btn-sm mb-1' id='send_word_hidden' value='Guardar'>
    </div>
</div> -->
<div class="">
    <audio class="perder_sound">
        <source src="<?= assets("audio/incorrect.mp3") ?>">
    </audio>
    <audio class="perder_sound">
        <source src="<?= assets("audio/perderstreet.mp3") ?>">
    </audio>
    <audio class="perder_sound">
        <source src="<?= assets("audio/mariook.mp3") ?>">
    </audio>
    <audio class="perder_sound">
        <source src="<?= assets("audio/ganarstreet.mp3") ?>">
    </audio>
</div>
<div class="container-fluid text-center pt-2 border-top" style="color:var(--color_primary);">
    <span><small>&copy; <?= config("title") . ' ' . date("Y") ?></small></span>
</div>
<style>
    body {
        background-color: var(--color_fondo);
    }

    @media (max-width: 480px) {
        .btn_alphabet {
            font-size: .7rem;
        }
    }
</style>
<script>
    $("#send_word_hidden").on("click", () => {
        //     e.preventDefault();
        var pista = '';
        wordFinal = $("#word_hidden").val();
        pista = $("#pista").val();
        //     // $("#show_trace").html("<strong>PISTA : </strong>" + pista)
        $("#main_word_hidden").removeAttr("class", "position-fixed").hide("swing")
        alert(wordFinal + " => " + pista)
        startGame()
    })
    $("#close_ventana").on("click", () => {
        $("#main_word_hidden").removeAttr("class", "position-fixed").hide("swing")

    })
    $(document).ready(() => {
        printAlphabet()
        const btnAlphabet = $(".btn_alphabet");
        const imgAhorcado = $("#img_ahorcado");
        const btnReset = $("#restart");
        let addLetter = '';
        let wordFinal = '';
        let wordFinalArray = [];
        let selectLetter = {};
        let selectLetterResult = [];
        let wordHidden = [];
        let template = [];
        let status = false;
        let lettersError = {};
        let resultLettersError = []
        let lettersCorrect = {};
        var toWin = 0;
        var toLost = 0;
        let spaceOut = 0;

        $("#main_word_hidden").removeAttr("class", "position-fixed").fadeOut("swing")
        btnAlphabet.attr("disabled", "disabled");
        imgAhorcado.attr("src", "<?= SERVERURL ?>public/assets/img/ahorcado/ahorcado0.png");
        imgAhorcado.css({
            "width": "75%"
        })


        btnReset.on("click", () => {
            resultGame()
            btnReset.html("Reiniciar Juego")
            imgAhorcado.attr("src", "<?= SERVERURL ?>public/assets/img/ahorcado/ahorcado0.png");
            resetGame();
            getWord()
            drawLowbar() 
            btnAlphabet.removeAttr("disabled");
            // $("#main_word_hidden").attr("class", "position-fixed d-flex  justify-content-center align-items-center").fadeIn("swing")
            // entranceWindow()

        })

        btnAlphabet.each((letter) => {
            $(btnAlphabet[letter]).on("click", () => {
                addLetter = $(btnAlphabet[letter]).text();
                startGame();
            })
        })

        // $("#send_word_hidden").submit((e) => {
        // //     e.preventDefault();
        //     var pista = '';
        //     wordFinal = $("#word_hidden").val();
        //     pista = $("#pista").val();
        // //     // $("#show_trace").html("<strong>PISTA : </strong>" + pista)
        // //     // $("#main_word_hidden").removeAttr("class", "position-fixed").hide("swing")
        //     alert(wordFinal +" => "+pista)
        // })


        // $("#close_ventana").on("click",()=>{
        //     $("#main_word_hidden").removeAttr("class", "position-fixed").hide("swing")

        // })


        function entranceWindow() {


            var row = "<div id='main_word_hidden' class='main_word_hidden position-fixed d-flex  justify-content-center align-items-center' style='top:0; width:100%; height:100%; background-color:rgb(102,102,107,.9);'>"
            row += "<div class='p-5 bg-light d-flex flex-column  input-group-sm rounded'>"
            row += "<p id='close_ventana' onMouseOver='this.style.cursor=\'pointer\'' style='width: 20px;  top:-35px; right:-35px' class='position-relative align-self-end'>X</p>"
            row += " <p class='font-weight-bold '>Ingresa una palabra para iniciar El Ahorcado</p>"
            row += "<input type='text' class='form-control  mb-1' id='word_hidden' name='word_hidden' placeholder='Ingresa tu palabra'>"
            row += "<input type='text' class='form-control  mb-1' id='pista' name='pista' placeholder='Ingresa tu pista'>"
            row += "<button class='btn btn-outline-success  btn-sm mb-1' id='send_word_hidden'  >Guardar</button>"
            row += "</div>"
            row += "</div>"
            $("#main_ahorcado").after(row);
        }

        function resetGame() {
            wordFinal = '';
            wordFinalArray = [];
            addLetter = '';
            selectLetter = {};
            selectLetterResult = [];
            wordHidden = [];
            template = [];
            status = false;
            lettersError = {};
            lettersCorrect = {};
            spaceOut = 0;
            $("h3").remove()
            $("#letters_choosse").html('')
            $("#response").html('');
        }

        function printAlphabet() {
            var btnAlpha = ''
            alphabet = alphabet();
            $(alphabet).each(e => {
                var space
                if (alphabet[e] == "space") {
                    space = " col-sm-5 col-7"
                } else {
                    space = "col-sm-1 col-1"
                }
                btnAlpha += "<button class='btn_alphabet btn btn-sm btn-outline-info " + space + " ' style='margin:2px' >" + alphabet[e] + "</button>"
            })
            $("#alphabet").append(btnAlpha)
        }

        function alphabet() {
            var alphabetPos = [];
            var alphabet = [];

            // for (var i = 97; i <= 122; i++) {      alphabetPos.push(i)  }     alphabetPos.push(225, 233, 237, 243, 250);
            alphabetPos = "1234567890qwertyuiopasdfghjklñzxcvbnmáé íóú";
            for (var i = 0; i < alphabetPos.length; i++) {
                // alphabet.push(String.fromCharCode(alphabetPos[i]))
                alphabet.push(alphabetPos[i])
                if (alphabetPos[i] == ' ') {
                    alphabet.splice(i, 1, 'space')

                }
            }
            return alphabet;
        }

        function getWord() {
            var pista = '';
            var duo = '';

            duo = confirm("Juegas solo?")

            if (duo === true) {
                // console.log(duo);
                const words = [
                    ["coronavirus", "Este año todo el mundo habla."],
                    ["restaurante", "Se come muy bien."],
                    ["murciélago", "Ratón volador."],
                    ["televisor", "Por lo general está en el salón."],
                    ["cabify", "Empresa de transporte de estos tiempos modernos."],
                    ["smartphone", "Ya sin él no se puede vivir."],
                    ["facebook", "Red social de un pelirrojo pelo ondulado."],
                    ["instagram", "Red social de fotos."],
                    ["goglear", "Ahora se dice \"buscar\" de otra manera."],
                    ["unicornio", "Caballo mitológico con cuerno."],
                    ["dinosaurios", "Primeros animales gigantes en la tierra."],
                    ["zanahorias", "Hortaliza de color naranja."],
                    ["edificio", "Es muy alto y hay muchos en la ciudad."],
                    ["escritorio", "Hacen sobre mi las tareas del cole."],
                    ["ordenador", "Sirve para hacer un montón de tareas informáticas."],
                    ["baloncesto", "Se juega con una pelota botando."],
                    ["autobus", "Es un medio de transporte."],
                ]
                var positionRand = Math.floor(Math.random() * words.length)
                wordFinal = words[positionRand][0];
                pista = words[positionRand][1];
            } else {

                // wordFinal = $("#word_hidden").val();
                // pista = $("#pista").val();
                while (wordFinal == '' || wordFinal == null) {
                    wordFinal = prompt("(Se aceptan letras minúsculas y tildes) Escribe tu palabra ó tu frase:")
                }
                while (pista === '' || pista === null) {
                    pista = prompt("Y una pista: ")
                }
            }
            $("#show_trace").html("<strong>PISTA : </strong>" + pista)

        }

        function drawLowbar() {
            if (status === false) {
                $("#show_hidden_word").html('');
                template = ['']
                // console.log("example 1")
                for (var i = 0; i < wordFinal.length; i++) {
                    // console.log("example 2 "+ i)
                    wordFinalArray[i] = wordFinal[i];
                    if (wordFinalArray[i] == ' ') {
                        wordHidden[i] = ("-");
                        spaceOut++
                    } else {
                        wordHidden[i] = ("_");
                    }
                    template += wordHidden[i] + " ";
                }
                $("#show_hidden_word").html(template)
                status = true
            }
        }

        function startGame() {
            drawLowbar()
            getLetter()
            injectLetter()
            printImg()
            printLetters()
            resultPlay()
        }

        function getLetter() {
            if (selectLetterResult.includes(addLetter)) {
                $("#response").removeClass("bg-success").addClass("bg-danger").html("Letra Repetida");
                setTimeout(() => {
                    $("#response").html("");
                }, 2000)
                $(".perder_sound")[0].play();
            } else {
                selectLetter[addLetter] = addLetter;
                selectLetterResult = Object.values(selectLetter)
            }
        }

        function injectLetter() {
            template = ['']
            count = 0;
            for (var i = 0; i < wordFinalArray.length; i++) {
                if (addLetter === wordFinalArray[i]) {
                    lettersCorrect[addLetter] = addLetter;
                    wordHidden[i] = wordFinalArray[i];
                    template += wordHidden[i] + " "
                } else {
                    template += wordHidden[i] + " ";
                    count++
                }
            }
            if (count === wordFinalArray.length) {
                lettersError[addLetter] = addLetter;
                $(".perder_sound")[0].play();
            } else {
                $(".perder_sound")[2].play();
            }
            $("#show_hidden_word").html("<strong>" + template + "</strong>")
        }

        function printLetters() {
            var result = '';
            var resultLettersCorrect = [];
            var resultLettersError = [];
            resultLettersCorrect = Object.keys(lettersCorrect);
            resultLettersError = Object.keys(lettersError);

            result += "<div class='text-success'><p class='mb-0'><i class='fas fa-check ' > </i> "
            $(resultLettersCorrect).each(element => {
                result += resultLettersCorrect[element] + ", ";
            })
            result += "</p></div>"
            result += "<div class='text-danger'><p class='mb-0'><i class='fas fa-times '> </i> "
            $(resultLettersError).each(element => {
                result += resultLettersError[element] + ", ";
            })
            result += "</p></div>"
            $("#letters_choosse").html(result)
        }

        function printImg() {
            resultLettersError = Object.keys(lettersError);
            imgAhorcado.attr("src", "<?= SERVERURL ?>public/assets/img/ahorcado/ahorcado" + resultLettersError.length + ".png");

        }

        function resultPlay() {
            if (resultLettersError.length === 8) {
                $("#response").fadeIn().removeClass("bg-success").addClass("bg-danger").html("Perdiste...Bot..!<br> La respuesta es: <strong>'" + wordFinal + "'</strong>");
                $("#input_letter").attr("disabled", "disabled");
                btnAlphabet.attr("disabled", "disabled");
                $(".perder_sound")[1].play();
                toLost++;
                resultGame()
            }
            var data2 = 0;
            $(wordHidden).each((k, v) => {
                if (wordHidden[k] === wordFinal[k])[
                    data2++
                ]
            })
            if (data2 === (wordFinal.length - spaceOut)) {
                $("#response").fadeIn().removeClass("bg-danger").addClass("bg-success").html("Ganaste...Bot....!!!<br>FELICIDADES...!!!");
                $("#input_letter").attr("disabled", "disabled");
                btnAlphabet.attr("disabled", "disabled");
                $(".perder_sound")[3].play();
                toWin++;
                resultGame()
            }
            // console.log(resultLettersError)
            // // console.log(resultLettersCorrect)
            // console.log(selectLetterResult)
        }

        function resultGame() {
            var result = '';
            result += "<p  class='mb-0'><span class='text-success font-weight-bold '><i class='fas fa-trophy'></i> = " + toWin + "</span> <br>"
            result += " <span class='text-danger font-weight-bold '><i class='fas fa-window-close'></i> = " + toLost + "</span></p>"
            $("#result_game").html(result)
        }
    })
</script>