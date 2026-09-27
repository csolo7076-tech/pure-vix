<?php

session_start();


if(!isset($_SESSION['ciusuario'])){

    header("location:../logueo/login.php");
    exit();

}


$direccion="localhost";
$usuario="root";
$contraseña="";
$nombreBase="pureskin";


$conexion=new mysqli($direccion,$usuario,$contraseña,$nombreBase);


if($conexion->connect_error){

    die("Error de conexión: ".$conexion->connect_error);

}



if(isset($_GET['id']) && isset($_GET['estado'])){


$id=$_GET['id'];
$estado=$_GET['estado'];



$sqlActualizar="UPDATE Pedidos 
SET Estado='$estado'
WHERE idPedidos='$id'";


if($conexion->query($sqlActualizar)){

if($estado=="Aceptado"){
$sqlPedido = "SELECT Nombre, Fecha FROM Pedidos WHERE idPedidos='$id'";
$resultadoPedido = $conexion->query($sqlPedido);
$filaPedido = $resultadoPedido->fetch_assoc();

$cliente = $filaPedido['Nombre'];
$fechaPedido = $filaPedido['Fecha'];

$sqlCarrito="
SELECT
Carrito.Cantidad,
Carrito.CostoTotal,
Productos.Nombre,
Productos.CodigoProductos
FROM Carrito
INNER JOIN Productos
ON Carrito.Productos_CodigoProductos=Productos.CodigoProductos
WHERE Pedidos_idPedidos='$id'";

$resultadoCarrito=$conexion->query($sqlCarrito);

 while($producto=$resultadoCarrito->fetch_assoc()){

  $sqlStock="UPDATE Productos
            SET Stock=Stock-".$producto['Cantidad']."
            WHERE CodigoProductos=".$producto['CodigoProductos'];

            $conexion->query($sqlStock);

              $sqlCliente="SELECT Nombre FROM Pedidos WHERE idPedidos='$id'";
            $resultadoCliente=$conexion->query($sqlCliente);
            $filaCliente=$resultadoCliente->fetch_assoc();

            $cliente=$filaCliente['Nombre'];

            $sqlVenta="INSERT INTO ventas
            (Fecha,Producto,Stock,Cliente,Total,Pedidos_idPedidos)
            VALUES
            (
            '".$filaPedido['Fecha']."',
            '".$producto['Nombre']."',
            '".$producto['Cantidad']."',
            '$cliente',
            '".$producto['CostoTotal']."',
            '$id'
            )";

            $conexion->query($sqlVenta);

        }

    }


header("Location: pedidos.php");
exit();


}else{


echo "Error al actualizar pedido";


}


}




$sql="SELECT * FROM Pedidos";


$resultado=$conexion->query($sql);



?>


<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Gestión de Pedidos</title>


<style>


body{

font-family:Arial;
background:#eef5ee;
margin:20px;

}



h2{

color:#5f7d67;

}



table{

width:100%;
border-collapse:collapse;
background:white;

}



th{

background:#5f7d67;
color:white;
padding:12px;

}



td{

padding:10px;
text-align:center;
border-bottom:1px solid #ddd;

}



.aceptar{

background:green;
color:white;
padding:7px 12px;
text-decoration:none;
border-radius:5px;

}



.rechazar{

background:red;
color:white;
padding:7px 12px;
text-decoration:none;
border-radius:5px;

}



</style>


</head>


<body>


<h2>Lista de Pedidos</h2>


<table>


<tr>

<th>ID</th>
<th>Nombre</th>
<th>Fecha</th>
<th>Estado</th>
<th>Vendedor</th>
<th>Acciones</th>

</tr>



<?php


if($resultado->num_rows>0){


while($fila=$resultado->fetch_assoc()){


?>


<tr>


<td>

<?php echo $fila['idPedidos']; ?>

</td>


<td>

<?php echo $fila['Nombre']; ?>

</td>


<td>

<?php echo $fila['Fecha']; ?>

</td>


<td>

<?php echo $fila['Estado']; ?>

</td>


<td>

<?php echo $fila['NombreVendedor']; ?>

</td>


<td>


<?php if($fila['Estado']=="Pendiente"){ ?>

    <a class="aceptar"
       href="pedidos.php?id=<?php echo $fila['idPedidos']; ?>&estado=Aceptado">
        Aceptar
    </a>

    <a class="rechazar"
       href="pedidos.php?id=<?php echo $fila['idPedidos']; ?>&estado=Rechazado">
        Rechazar
    </a>

<?php }else{ ?>

    Pedido procesado

<?php } ?>

</td>



</tr>


<?php


}


}else{


echo "<tr><td colspan='6'>No hay pedidos registrados</td></tr>";


}


?>


</table>


</body>


</html>