<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Consultar Pedido</title>

<style>

    body{
        background: #FAFBF7;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 30px;
        color: #555;
    }

    #tituloPedido{
        text-align: center;
        color: #385739;
        font-size: 32px;
        margin: 30px 0 25px 0;
        font-weight: bold;
    }

    #formularioPedido{
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        background: white;
        padding: 35px;
        border-radius: 18px;
        box-shadow: 0 5px 20px rgba(56, 87, 57, 0.15);
    }

    #formularioPedido label{
        display: block;
        color: #385739;
        margin-bottom: 10px;
        font-weight: bold;
        font-size: 16px;
    }

    #numeroPedido{
        width: 100%;
        padding: 13px 15px;
        margin-bottom: 20px;
        border: 1px solid #D8E4D0;
        border-radius: 10px;
        outline: none;
        font-size: 16px;
        color: #555;
        background: #FAFBF7;
        transition: 0.3s;
    }

    #numeroPedido:focus{
        border-color: #9CAF88;
        box-shadow: 0 0 5px rgba(156, 175, 136, 0.4);
        background: white;
    }

    #consultar{
        width: 100%;
        background: #9CAF88;
        color: white;
        border: none;
        padding: 13px 17px;
        border-radius: 10px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    #consultar:hover{
        background: #6b8f5d;
        transform: translateY(-2px);
    }

    #volverInicio{
        width: 100%;
        background: #5D735A;
        color: white;
        border: none;
        padding: 13px 17px;
        border-radius: 10px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        margin-top: 12px;
        transition: 0.3s;
    }

    #volverInicio:hover{
        background: #385739;
        transform: translateY(-2px);
    }

    #resultado{
        margin-top: 25px;
    }

    #resultado hr{
        border: none;
        border-top: 1px solid #D8E4D0;
        margin: 20px 0;
    }

    #resultado h3{
        color: #385739;
        margin-top: 0;
        margin-bottom: 10px;
        font-size: 20px;
    }

    #resultado p{
        background: #F8F7F4;
        padding: 11px 15px;
        border-radius: 8px;
        margin: 7px 0;
        color: #555;
    }

    #resultado p:nth-of-type(3){
        background: #DCEFE0;
    }

    #resultado p:nth-of-type(3) b{
        color: #42714c;
    }

    @media (max-width: 600px){

        body{
            padding: 15px;
        }

        #formularioPedido{
            padding: 25px;
        }

        #tituloPedido{
            font-size: 27px;
        }

    }

</style>

</head>


<body>


<h2 id="tituloPedido">
    Consultar Pedido
</h2>


<div id="formularioPedido">


    <label>
        Número de pedido:
    </label>


    <input 
        type="number"
        id="numeroPedido"
        placeholder="Ejemplo: 44"
    >


    <button id="consultar">
        Consultar Estado
    </button>


    <button id="volverInicio">
        Volver al inicio
    </button>


    <div id="resultado">

    </div>


</div>


<script src="js/consultar.js"></script>


<script>

    document.getElementById("volverInicio").addEventListener("click", function(){

        window.location.href = "PAGINA/maq_inicionuevo.php";

    });

</script>


</body>

</html>