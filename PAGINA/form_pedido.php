<?php

session_start();


if(!isset($_SESSION['ciusuario'])){

    header("location:../logueo/login.php");
    exit();

}else{


    if($_SESSION['rol']=="Vendedor"){

        $vendedor=$_SESSION['usuario'];

    }else{
        exit();

    }

}


?>


<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<title>Nuevo Pedido</title>


<style>


body{

    font-family:Arial, Helvetica, sans-serif;
    background:#eef5ee;
    margin:0;

}


h2{

    text-align:center;
    color:#5f7d67;
    margin-top:50px;
    margin-bottom:20px;

}



form{

    width:400px;
    margin:auto;
    background:white;
    padding:30px;
    border-radius:20px;
    box-shadow:0 5px 15px rgba(0,0,0,.1);

}



label{

    color:#4f6a57;
    font-weight:bold;

}



input[type="text"],
input[type="date"]{

    width:100%;
    padding:12px;
    margin-top:8px;
    margin-bottom:18px;
    border:1px solid #cfd8cf;
    border-radius:10px;
    box-sizing:border-box;
    background:#f8faf8;
    font-size:15px;

}



input[readonly]{

    background:#edf3ed;

}



input[type="submit"]{

    width:100%;
    padding:12px;
    background:#5f7d67;
    color:white;
    border:none;
    border-radius:10px;
    font-size:16px;
    cursor:pointer;

}



input[type="submit"]:hover{

    background:#4f6a57;

}


</style>


</head>


<body>


<h2>Generar Pedido</h2>



<form action="nuevo_pedido.php" method="post" id="pedido-form">


<label>
Nombre del cliente:
</label>

<input 
type="text" 
name="nombre" 
maxlength="100"
required>


<label>
Fecha:
</label>


<input 
type="date" 
name="fecha" 
value="<?php echo date('Y-m-d'); ?>" 
readonly>



<input 
type="hidden" 
name="estado" 
value="Pendiente">



<label>
Nombre Vendedor:
</label>


<input 
type="text" 
name="nombreVendedor" 
value="<?php echo $vendedor; ?>" 
readonly>



<input 
type="submit" 
value="Nuevo Pedido">



</form>

<script>
    $(function(){
        $('#pedido-form').validate({
            rules: {
                nombre: {
                    required: true,
                    minlength: 4
                },
                fecha: {
                    required: true
                },
                nombreVendedor: {
                    required: true
                }
            },
            messages: {
                nombre: {
                    required: "Por favor, ingresa el nombre del cliente",
                    minlength: "El nombre debe tener al menos 4 caracteres"
                },
                fecha: {
                    required: "Por favor, selecciona una fecha"
                },
                nombreVendedor: {
                    required: "El nombre del vendedor es obligatorio"
                }
            }
        });
    });
</script>

</body>


</html>