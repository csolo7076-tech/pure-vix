<?php

include("../PAGINA/conexion.php");

if (!isset($_GET['CodigoProductos'])) {
    die("No se recibió el código del producto");
}

$CodigoProductos = $_GET['CodigoProductos'];


// Validar que sea un número
if (!is_numeric($CodigoProductos)) {
    die("Código de producto inválido");
}


// Eliminar producto
$sql = "DELETE FROM productos WHERE CodigoProductos=?";

$stmt = $conexion->prepare($sql);

$stmt->bind_param("i", $CodigoProductos);


if ($stmt->execute()) {

    header("location:ProductosRead.php?CodigoProductos=".$CodigoProductos);
    exit();

} else {

    echo "Error al eliminar producto: ".$conexion->error;

}

?>