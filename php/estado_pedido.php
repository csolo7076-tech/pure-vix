<?php

session_start();

header("Content-Type: application/json");

require("conexion.php");

if(!isset($_SESSION["pedido"])){

    echo json_encode([
        "ok" => false,
        "mensaje" => "No existe pedido activo"
    ]);

    exit;

}

$idPedido = $_SESSION["pedido"];

$stmt = $conn->prepare("
SELECT
    idPedidos AS id,
    Nombre,
    Telefono AS telefono,
    Direccion AS direccion,
    MetodoPago AS metodoPago,
    Estado
FROM pedidos
WHERE idPedidos = ?
");

$stmt->bind_param("i", $idPedido);
$stmt->execute();

$resultado = $stmt->get_result();

if($resultado->num_rows > 0){

    $pedido = $resultado->fetch_assoc();

    echo json_encode([
        "ok" => true,
        "pedido" => $pedido
    ]);

}else{

    echo json_encode([
        "ok" => false,
        "mensaje" => "Pedido no encontrado"
    ]);

}

$stmt->close();
$conn->close();

?>
