<?php

include("../PAGINA/conexion.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location:ProductosCreateform.php");
    exit();
}

$Codigo = $_POST['CodigoProductos'];
$Nombre = trim($_POST['Nombre']);
$Descripcion = trim($_POST['Descripcion']);
$Precio = $_POST['Precio'];
$Stock = $_POST['Stock'];


// Validaciones
if ($Codigo == "" || $Nombre == "" || $Descripcion == "" || $Precio == "" || $Stock == "") {
    die("Todos los campos son obligatorios");
}

if (!is_numeric($Precio) || $Precio < 0) {
    die("El precio no es válido");
}

if (!is_numeric($Stock) || $Stock < 0) {
    die("El stock no es válido");
}


// Insertar producto
$sql = "INSERT INTO productos 
(`CodigoProductos`,`Nombre`,`Descripcion`,`Precio`,`Stock`)
VALUES (?,?,?,?,?)";


$stmt = $conexion->prepare($sql);

$stmt->bind_param(
    "issdi",
    $Codigo,
    $Nombre,
    $Descripcion,
    $Precio,
    $Stock
);


if ($stmt->execute()) {

    header("location:ProductosRead.php?CodigoProductos=".$Codigo);
    exit();

} else {

    echo "Error al registrar producto: ".$conexion->error;

}

?>