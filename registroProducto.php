<?php

$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bd = "pureskin";

$conn = new mysqli($servidor, $usuario, $contrasena, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$CodigoProductos = $_POST["CodigoProductos"];
$Nombre = $_POST["Nombre"];
$Descripcion = $_POST["Descripcion"];
$Precio = $_POST["Precio"];
$Stock = $_POST["Stock"];
$imagen = $_POST["imagen"];


$sql = "INSERT INTO producto
(codigo,nombre,descripcion,precio,stock,imagen)
VALUES
<<<<<<< HEAD
('$codigo','$Nombre','$Descripcion','$Precio','$Stock','$imagen',)";
=======
('$CodigoProductos','$Nombre','$Descripcion','$Precio','$Stock','$imagen')";
>>>>>>> 00d72c76c897646441071b940a6cf751e9d1f6ff

if($conn->query($sql)){
    echo "Producto registrado correctamente";
}else{
    echo "Error: ".$conn->error;
}



?>