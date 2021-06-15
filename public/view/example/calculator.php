<div class="container text-center py-5">
    <h1><i class="fa fa-calculator text-info" aria-hidden="true"></i></h1>
    <div class="d-flex justify-content-center">
        <table class="my-5 " id="calculator">
            <!-- <thead>
            </thead> -->
            <tbody>

                <tr>
                    <th colspan="4" class="p-3"><input type="text" class="text-right px-3  bg-white text-info" id="display" disabled></th>
                </tr>
                <tr>
                    <!-- <td colspan="2" id="resetmemory" class="resetmemory">CE</td> -->

                </tr>
                <tr>
                    <td id="uno" class="numeros" scope="row">1</td>
                    <td id="dos" class="numeros">2</td>
                    <td id="tres" class="numeros">3</td>
                    <td id="suma" class="signooperacion">+</td>
                </tr>
                <tr>
                    <td id="cuatro" class="numeros" scope="row">4</td>
                    <td id="cinco" class="numeros">5</td>
                    <td id="seis" class="numeros">6</td>
                    <td id="menos" class="signooperacion">-</td>
                </tr>
                <tr>
                    <td id="siete" class="numeros" scope="row">7</td>
                    <td id="ocho" class="numeros">8</td>
                    <td id="nueve" class="numeros">9</td>
                    <td id="multi" class="signooperacion">x</td>
                </tr>
                <tr>
                    <!-- <td id="coma" class="numeros" scope="row">,</td> -->
                    <td id="reset" class="reset" scope="row">C</td>
                    <td id="cero" class="numeros">0</td>
                    <!-- <td id="potencia" class="signooperacion">x²</td> -->
                    <td id="igual" class="igual" scope="row">=</td>
                    <td id="div" class="signooperacion">/</td>
                </tr>
            </tbody>
        </table>

    </div>
</div>
<style>
    th {
        font-size: 2rem;
        /* border-radius: 35px; */
        height: 45px;
        border: 2px solid cadetblue;
        background-color: cadetblue;
        color: green;

    }

    td {
        font-size: 1.5rem;
        border-radius: 10px;
        height: 65px;
        width: 65px;
        border: 2px solid cadetblue;

    }

    td:hover {
        transform: scale(1.2);
        transition: transform .5s;
        color: whitesmoke;
        background-color: cadetblue;

    }
</style>

<script>
    const numeros = $(".numeros");
    const signooperacion = $(".signooperacion");
    const reset = $(".reset");
    const igual = $(".igual");
    const resetmemory = $("#resetmemory");
    const result = $("#display");
    var resultActual = '';
    var resultBefore = '';
    var operacion = '';


    numeros.each((numero) => {
        $(numeros[numero]).on("click", () => {
            agreeNum($(numeros[numero]).text());
        })
    })
    signooperacion.each((signo) => {
        $(signooperacion[signo]).on("click", () => {
            chooseOperacion($(signooperacion[signo]).text());
        })
    })

    igual.click(() => {
        calcularOperacion();
        updateDisplay();
    })

    reset.click(() => {
        clear();
        updateDisplay();
    })
 
    function updateDisplay() {
        result.val(resultActual);
    }
    
    function agreeNum(data) {
        resultActual = resultActual.toString() + data.toString();
        updateDisplay();
    }

    function chooseOperacion(data) {
        if (resultActual === '') return;
        if (resultBefore !== '') {
            calcularOperacion();
        }
        operacion = data.toString();
        resultBefore = resultActual;
        resultActual = '';
    }

    function calcularOperacion() {
        var calculo;
        const anterior = parseFloat(resultBefore);
        const actual = parseFloat(resultActual);
        if (isNaN(anterior) || isNaN(actual)) return;
        switch (operacion) {
            case '+':
                calculo = anterior + actual;
                break;
            case '-':
                calculo = anterior - actual;
                break;
            case 'x':
                calculo = anterior * actual;
                break;
            case '/':
                calculo = anterior / actual;
                break;
            case 'x²':
                console.log("x2: "+ actual)
                calculo = actual * actual;
                break;
            default:
                return;
        }
        resultActual = calculo;
        operacion = undefined;
        resultAnterior = '';
    }

    function clear() {
        resultActual = '';
        resultBefore = '';
        result.val(resultActual);
    }

 
</script>