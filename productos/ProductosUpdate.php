<?php

include("../PAGINA/conexion.php");


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location:ProductosRead.php");
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
    die("Precio inválido");
}


if (!is_numeric($Stock) || $Stock < 0) {
    die("Stock inválido");
}



// Actualizar producto

$sql = "UPDATE productos SET 
Nombre=?,
Descripcion=?,
Precio=?,
Stock=?
WHERE CodigoProductos=?";


$stmt = $conexion->prepare($sql);


$stmt->bind_param(
    "ssdii",
    $Nombre,
    $Descripcion,
    $Precio,
    $Stock,
    $Codigo
);


if ($stmt->execute()) {

    header("location:ProductosRead.php?CodigoProductos=".$Codigo);
    exit();

} else {

    echo "Error al actualizar: ".$conexion->error;

}

?>