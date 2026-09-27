<?php
include("conexion.php");


if(!isset($_POST['codigo'])){

    header("Location: maq_catalogo.php");
    exit();

}


$codigo = $_POST['codigo'];


// Guardamos el producto que el usuario quería agregar

$_SESSION['producto_pendiente'] = $codigo;


// Si todavía no inició sesión

if(!isset($_SESSION['ciusuario'])){

    $_SESSION['destino'] = "agregar_catalogo.php";

    header("Location: ../index1.php");
    exit();

}


// Si ya inició sesión, verificamos que sea Cliente




// Datos del cliente

$nombreCliente = $_SESSION['usuario'];


// Crear un nuevo pedido

$sqlPedido = "INSERT INTO Pedidos
(Nombre, Fecha, Estado, NombreVendedor)

VALUES

('$nombreCliente', CURDATE(), 'Pendiente', 'Compra en línea')";


if($conexion->query($sqlPedido)){

    $idPedido = $conexion->insert_id;


    // Buscar los datos del producto

    $sqlProducto = "SELECT * FROM Productos
                    WHERE CodigoProductos='$codigo'";


    $resultado = $conexion->query($sqlProducto);


    if($resultado->num_rows > 0){

        $producto = $resultado->fetch_assoc();


        $precio = $producto['Precio'];

        $cantidad = 1;

        $total = $precio * $cantidad;


        // Agregar producto al carrito

        $sqlCarrito = "INSERT INTO Carrito
        (Productos_CodigoProductos, Pedidos_idPedidos, Cantidad, CostoTotal)

        VALUES

        ('$codigo', '$idPedido', '$cantidad', '$total')";


        if($conexion->query($sqlCarrito)){

            unset($_SESSION['producto_pendiente']);


            header("Location: ../index1.php?idPedido=".$idPedido);

            exit();

        }else{

            echo "Error al agregar el producto al carrito: ".$conexion->error;

        }

    }else{

        echo "El producto no existe.";

    }

}else{

    echo "Error al crear el pedido: ".$conexion->error;

}

?>