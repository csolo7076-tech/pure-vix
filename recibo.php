<?php

session_start();

require("php/conexion.php");





if(!isset($_SESSION["pedido"])){

    echo "No existe pedido activo";

    exit;

}


$id=$_SESSION["pedido"];



$sql="
SELECT *
FROM pedido
WHERE id='$id'
";


$resultado=$conn->query($sql);


$pedido=$resultado->fetch_assoc();

?>


<!DOCTYPE html>
<html>

<head>

<title>Recibo</title>


<link rel="stylesheet" href="css/ticket.css">


</head>


<body>


<div class="ticket">


<h1>MI TIENDA</h1>


<h2>
Recibo de Pedido
</h2>


<p>
<span>Número</span>
<span><?php echo $pedido["idPedidos"]; ?></span>
</p>


<p>
<span>Cliente</span>
<span><?php echo $pedido["Nombre"]; ?></span>
</p>


<p>
<span>Teléfono</span>
<span><?php echo $pedido["Telefono"]; ?></span>
</p>


<p>
<span>Dirección</span>
<span><?php echo $pedido["Direccion"]; ?></span>
</p>


<p>
<span>Método de pago</span>
<span><?php echo $pedido["MetodoPago"]; ?></span>
</p>


<hr>


<h3>
Productos
</h3>


<?php


$sqlProductos="

SELECT 
p.nombre,
c.cantidad,
c.costototal

FROM carrito c

INNER JOIN producto p

<<<<<<< HEAD
ON c.Producto_codigo=p.codigo
=======
ON c.Productos_CodigoProductos=p.CodigoProductos
>>>>>>> 00d72c76c897646441071b940a6cf751e9d1f6ff

WHERE c.Pedido_id='$id'

";


$resultadoProductos=$conn->query($sqlProductos);


$total=0;


while($producto=$resultadoProductos->fetch_assoc()){


$total += $producto["CostoTotal"];


echo "

<div class=\"producto\">
<div class=\"nombreProducto\">".$producto["Nombre"]."</div>
<div class=\"detalleProducto\">
Cantidad: ".$producto["Cantidad"]." &middot; Subtotal: Bs ".$producto["CostoTotal"]."
</div>
</div>

";


}


?>


<div class="total">
Total: Bs <?php echo $total; ?>
</div>
<center><img src="https://api.qrserver.com/v1/create-qr-code/?data=http://localhost/pureeskin/recibo.php;size=100x100"/></center>

<div class="estado">
Estado: <?php echo $pedido["Estado"]; ?> — esperando aprobación del vendedor
</div>



<div class="botonesRecibo">
<button onclick="window.print()">
🖨 Imprimir
</button>
<button id="volverProductos">
Volver a Productos
</button>
</div>


</div>


<script>

document
.getElementById("volverProductos")
.addEventListener("click",()=>{

    fetch("php/nueva_compra.php")

    .then(res=>res.json())

    .then(data=>{

        if(data.ok){

            window.location.href="index1.php";

        }

    });

});

</script>


</body>

</html>