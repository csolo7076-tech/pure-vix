<?php

include("../PAGINA/conexion.php");


if (!isset($_GET['CodigoProductos'])) {
    die("No se recibió el código del producto");
}


$CodigoProductos = $_GET['CodigoProductos'];


// Buscar producto

$sql = "SELECT * FROM productos WHERE CodigoProductos=?";

$stmt = $conexion->prepare($sql);

$stmt->bind_param("i", $CodigoProductos);

$stmt->execute();

$resultado = $stmt->get_result();


if ($resultado->num_rows > 0) {

    $fila = $resultado->fetch_assoc();

    $CodigoProductos = $fila['CodigoProductos'];
    $Nombre = $fila['Nombre'];
    $Descripcion = $fila['Descripcion'];
    $Precio = $fila['Precio'];
    $Stock = $fila['Stock'];

} else {

    die("Producto no encontrado");

}

?>


<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<title>Editar Producto</title>


<style>

body{

    font-family:Arial,sans-serif;
    background:#eef5ee;
    padding:40px;

}


form{

    width:400px;
    max-width:100%;
    margin:auto;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,.1);

}


h2{

    text-align:center;
    color:#5f7d67;

}


label{

    display:block;
    margin-top:15px;
    color:#5f7d67;
    font-weight:bold;

}


input{

    width:100%;
    padding:10px;
    margin-top:5px;
    border:1px solid #ccc;
    border-radius:8px;
    box-sizing:border-box;

}


input[type="submit"]{

    margin-top:20px;
    background:#5f7d67;
    color:white;
    border:none;
    cursor:pointer;

}


input[type="submit"]:hover{

    background:#4f6a57;

}

label.error{
    color: red;
    font-size: 13px;
    font-weight: normal;
    margin-top: 5px;
    display: block;
}

</style>


</head>


<body>


<form action="ProductosUpdate.php" method="POST" id="formularioProducto" novalidate>


<h2>Editar Producto</h2>


<label>Nombre</label>

<input type="text" 
name="Nombre" 
value="<?= htmlspecialchars($Nombre) ?>">


<label>Descripción</label>

<input type="text" 
name="Descripcion" 
value="<?= htmlspecialchars($Descripcion) ?>">


<label>Precio</label>

<input type="number" 
name="Precio" 
value="<?= htmlspecialchars($Precio) ?>" 
min="0"
step="0.01">


<label>Stock</label>

<input type="number" 
name="Stock" 
value="<?= htmlspecialchars($Stock) ?>" 
min="0">



<input type="hidden" 
name="CodigoProductos" 
value="<?= htmlspecialchars($CodigoProductos) ?>">



<input type="submit" value="Guardar cambios">


</form>

<script>
    $(function(){
        $("#formularioProducto").validate({
            rules:{
                Nombre:{
                    required:true,
                    minlength:2
                },
                Descripcion:{
                    required:true,
                    minlength:10
                },
                Precio:{
                    required:true,
                    number:true,
                    min:0.01,
                    pattern:/^\d+(\.\d{1,2})?$/
                },
                Stock:{
                    required:true,
                    number:true,
                    min:0
                }
            },
            messages:{
                Nombre:{
                    required:"Por favor, ingrese el nombre del producto",
                    minlength:"El nombre debe tener al menos 2 caracteres"
                },
                Descripcion:{
                    required:"Por favor, ingrese la descripción del producto",
                    minlength:"La descripción debe tener al menos 10 caracteres"
                },
                Precio:{
                    required:"Por favor, ingrese el precio del producto",
                    number:"Por favor, ingrese un número válido",
                    min:"El precio debe ser mayor a 0",
                    pattern:"El precio debe tener máximo 2 decimales"
                },
                Stock:{
                    required:"Por favor, ingrese el stock del producto",
                    number:"Por favor, ingrese un número válido",
                    min:"El stock no puede ser negativo"
                }
            }
        });
    });
</script>


</body>

</html>