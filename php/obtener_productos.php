<?php

header("Content-Type: application/json");

include("conexion.php");

$sql = "SELECT * FROM productos";

$resultado = $conn->query($sql);

if($resultado === false){

    echo json_encode([
        "error" => true,
        "mensaje" => "Error en la consulta: " . $conn->error
    ]);

    exit;

}

$productos = [];

while($fila = $resultado->fetch_assoc()){
    $productos[] = $fila;
}

echo json_encode($productos);

?>