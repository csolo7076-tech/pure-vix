<?php

session_start();

if(!isset($_SESSION['ciusuario']) || $_SESSION['rol'] != "Vendedor"){

    header("location: ../logueo/login.php");
    exit();

}


$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$nombreBase = "PureSkin";


$conexion = new mysqli($servidor,$usuario,$contrasena,$nombreBase);


if($conexion->connect_error){

    die("Error al conectar a la base de datos: ".$conexion->connect_error);

}



if($_SERVER["REQUEST_METHOD"] == "POST"){


$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];

$estado = "Pendiente";

$nombreVendedor = $_SESSION['usuario'];



$sql = "INSERT INTO pedidos 
(nombre, fecha, estado, nombreVendedor)

VALUES

('$nombre','$fecha','$estado','$nombreVendedor')";



if($conexion->query($sql)){


$idPedido = $conexion->insert_id;


header("Location: ../carrito/miCarrito.php?idPedido=".$idPedido);
exit();


}else{


echo "Error al crear el pedido: ".$conexion->error;


}



}else{


header("Location: form_pedido.php");


}



$conexion->close();


?>