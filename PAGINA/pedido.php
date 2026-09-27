<?php

if($_POST){

    $direccion="localhost";
    $usuario="root"; 
    $contraseña="";  
    $nombreBase="pureskin";

    $conexion= new mysqli($direccion, $usuario, $contraseña, $nombreBase);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }


   
    $nombre=$_POST['Nombre'];
    $fecha=$_POST['Fecha'];
    $vendedor=$_POST['NombreVendedor'];

    $estado="Pendiente";


    $sql = "INSERT INTO Pedidos
    (Nombre, Fecha, Estado, NombreVendedor)
    VALUES
    ('$nombre','$fecha','$estado','$vendedor')";


   if($conexion->query($sql)==TRUE){

    header("Location: maq_productos.php?idPedido=".$id);
    exit();

}else{

        echo "Error: ".$conexion->error;

    }


    $conexion->close();

}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Realizar Pedido</title>

    <style>

body{
    font-family: Arial, Helvetica, sans-serif;
    background: #eef5ee;
    margin: 0;
    padding: 40px;
}

h2{
    text-align: center;
    color: #5f7d67;
    margin-bottom: 25px;
}


form{
    width: 500px;
    margin: auto;
    background: #ffffff;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,.1);
}


label{
    display: block;
    margin-bottom: 6px;
    color: #4f6a57;
    font-weight: bold;
}


input{
    width: 100%;
    padding: 12px;
    margin-bottom: 18px;
    border: 1px solid #cfd8cf;
    border-radius: 10px;
    box-sizing: border-box;
    background: #f8faf8;
    font-size: 15px;
}


input:focus{
    outline: none;
    border-color: #7fa87c;
}


button{
    width: 100%;
    padding: 12px;
    background: #5f7d67;
    color: white;
    border: none;
    border-radius: 10px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
}


button:hover{
    background: #4d6654;
}


    </style>

</head>


<body>


<h2>Formulario de Pedido</h2>


<form action="pedido.php" method="POST" id="id_pedido>


    <label>ID del Pedido</label>
    <input type="number" name="idPedidos" required>


    <label>Nombre del Cliente</label>
    <input type="text" name="Nombre" required>


    <label>Fecha</label>
    <input type="date" name="Fecha" required>


    <label>Nombre del Vendedor</label>
    <input type="text" name="NombreVendedor" required>


    <button type="submit">Enviar Pedido</button>


</form>
<script>
    $(function(){
        $(#id_pedido).validate({
            rules:{
                Nombre{
                    required:true;
                    minlength:2;
                }

                Fecha{
                    required: true;

                }
                NombreVendedor{
                    required: true;
                    minlength: 2;
                }
            }
            messages:{
                Nombre{
                    required:"Por favor, debe escribir su nombre";
                    minlength:"Por favor, el nombre de ser real";
                }
            }
        })
    }
)
</script>


</body>
</html>