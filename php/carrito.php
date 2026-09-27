<?php

session_start();

require("conexion.php");

header("Content-Type: application/json");


//=====================================
// VERIFICAR PEDIDO ACTIVO
//=====================================

if (!isset($_SESSION["pedido"])) {

    echo json_encode([
        "ok" => false,
        "mensaje" => "No existe pedido activo"
    ]);

    exit;
}


$idPedido = $_SESSION["pedido"];

$accion = $_POST["accion"] ?? "";


//=====================================
// ACCIONES
//=====================================

switch ($accion) {


    //=================================
    // AGREGAR PRODUCTO
    //=================================

    case "agregar":

        $codigo = $_POST["codigo"] ?? "";


        if ($codigo == "") {

            echo json_encode([
                "ok" => false,
                "mensaje" => "No se recibió el producto"
            ]);

            exit;
        }


        // Buscar producto

        $sqlProducto = "
            SELECT *
            FROM productos
            WHERE CodigoProductos='$codigo'
        ";

        $resultadoProducto = $conn->query($sqlProducto);


        if (!$resultadoProducto || $resultadoProducto->num_rows == 0) {

            echo json_encode([
                "ok" => false,
                "mensaje" => "Producto no encontrado"
            ]);

            exit;
        }


        $producto = $resultadoProducto->fetch_assoc();


        //=================================
        // VERIFICAR SI YA EXISTE
        //=================================

        $sqlExiste = "
            SELECT *
            FROM carrito
            WHERE Pedidos_idPedidos='$idPedido'
            AND Productos_CodigoProductos='$codigo'
        ";

        $resultadoExiste = $conn->query($sqlExiste);


        if ($resultadoExiste->num_rows > 0) {


            $fila = $resultadoExiste->fetch_assoc();

            $cantidad = $fila["Cantidad"] + 1;

            $subtotal = $cantidad * $producto["Precio"];


            // Actualizar

            $sql = "
                UPDATE carrito
                SET Cantidad='$cantidad',
                    CostoTotal='$subtotal'

                WHERE Pedidos_idPedidos='$idPedido'
                AND Productos_CodigoProductos='$codigo'
            ";


        } else {


            // Producto nuevo

            $cantidad = 1;

            $subtotal = $producto["Precio"];


            $sql = "
                INSERT INTO carrito
                (
                    Pedidos_idPedidos,
                    Productos_CodigoProductos,
                    Cantidad,
                    CostoTotal
                )

                VALUES
                (
                    '$idPedido',
                    '$codigo',
                    '$cantidad',
                    '$subtotal'
                )
            ";
        }


        if ($conn->query($sql)) {

            echo json_encode([
                "ok" => true,
                "mensaje" => "Producto agregado correctamente"
            ]);

        } else {

            echo json_encode([
                "ok" => false,
                "mensaje" => $conn->error
            ]);
        }


    break;


    //=================================
    // MOSTRAR CARRITO
    //=================================

    case "mostrar":


        $sql = "
            SELECT

                c.Productos_CodigoProductos,

                c.Cantidad,

                c.CostoTotal,

                p.Nombre,

                p.Precio,

                p.imagen

            FROM carrito c

            INNER JOIN productos p

            ON c.Productos_CodigoProductos = p.CodigoProductos

            WHERE c.Pedidos_idPedidos='$idPedido'
        ";


        $resultado = $conn->query($sql);


        if (!$resultado) {

            echo json_encode([
                "ok" => false,
                "mensaje" => $conn->error
            ]);

            exit;
        }


        $carrito = [];


        while ($fila = $resultado->fetch_assoc()) {

            $carrito[] = $fila;
        }


        echo json_encode($carrito);


    break;


    //=================================
    // VACIAR CARRITO
    //=================================

    case "vaciar":


        $sql = "
            DELETE FROM carrito
            WHERE Pedidos_idPedidos='$idPedido'
        ";


        if ($conn->query($sql)) {

            echo json_encode([
                "ok" => true,
                "mensaje" => "Carrito vaciado correctamente"
            ]);

        } else {

            echo json_encode([
                "ok" => false,
                "mensaje" => $conn->error
            ]);
        }


    break;


    //=================================
    // ACCIÓN NO VÁLIDA
    //=================================

    default:

        echo json_encode([
            "ok" => false,
            "mensaje" => "Acción no válida"
        ]);

    break;
}

?>
