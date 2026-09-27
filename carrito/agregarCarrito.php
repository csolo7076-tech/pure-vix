<?php
session_start();

if(!isset($_SESSION['ciusuario'])){
    header("location:../logueo/login.php");
    exit();
}

include("../PAGINA/conexion.php");

$codigo=$_POST['codigo'];
$idpedido=$_POST['idpedido'];
$cantidad=$_POST['cantidad'];
$precio=$_POST['precio'];

if($cantidad<=0){
    header("Location:miCarrito.php?idPedido=".$idpedido);
    exit();
}

$total=$precio*$cantidad;

$sql="INSERT INTO carrito
(Productos_CodigoProductos, Pedidos_idPedidos, Cantidad, CostoTotal)
VALUES
('$codigo','$idpedido','$cantidad','$total')
ON DUPLICATE KEY UPDATE
Cantidad=Cantidad+VALUES(Cantidad),
CostoTotal=CostoTotal+VALUES(CostoTotal)";

if($conexion->query($sql)){
    header("Location:miCarrito.php?idPedido=".$idpedido);
    exit();
}else{
    echo "Error: ".$conexion->error;
}
?>