<?php

session_start();

require("conexion.php");

header("Content-Type: application/json; charset=UTF-8");

$entrada = file_get_contents("php://input");

$datos = json_decode($entrada, true);

if (!$datos) {
    echo json_encode([
        "ok" => false,
        "mensaje" => "No se recibieron datos JSON"
    ]);
    exit;
}

$nombre = $datos["nombre"] ?? "";
$telefono = $datos["telefono"] ?? "";
$direccion = $datos["direccion"] ?? "";
$metodo = $datos["metodo"] ?? "";

if (
    empty($nombre) ||
    empty($telefono) ||
    empty($direccion) ||
    empty($metodo)
) {
    echo json_encode([
        "ok" => false,
        "mensaje" => "Todos los campos son obligatorios"
    ]);
    exit;
}

$stmt = $conn->prepare("
    INSERT INTO pedidos
    (
        Nombre,
        Telefono,
        Direccion,
        MetodoPago,
        Fecha,
        Estado,
        NombreVendedor
    )
    VALUES
    (
        ?,
        ?,
        ?,
        ?,
        NOW(),
        'Abierto',
        'Sin asignar'
    )
");

if (!$stmt) {
    echo json_encode([
        "ok" => false,
        "mensaje" => "Error al preparar la consulta",
        "mysql" => $conn->error
    ]);
    exit;
}

$stmt->bind_param(
    "ssss",
    $nombre,
    $telefono,
    $direccion,
    $metodo
);

if ($stmt->execute()) {

    $idPedido = $conn->insert_id;

    $_SESSION["pedido"] = $idPedido;

    echo json_encode([
        "ok" => true,
        "pedido" => $idPedido
    ]);

} else {

    echo json_encode([
        "ok" => false,
        "mensaje" => "Error al crear el pedido",
        "mysql" => $stmt->error
    ]);
}

$stmt->close();
$conn->close();

?>