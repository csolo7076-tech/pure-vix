<?php

session_start();


if($_SESSION['ciusuario']==null){

    header("location:../logueo/login.php");
    exit();

}


include("conexion.php");





if(isset($_POST['registrarVenta'])){


    $idPedido = $_POST['idPedido'];


    

    $sqlPedido = "SELECT * FROM Pedidos 
                  WHERE idPedidos='$idPedido'";

    $resultadoPedido = $conexion->query($sqlPedido);


    if($resultadoPedido->num_rows > 0){


        $pedido = $resultadoPedido->fetch_assoc();

        $cliente = $pedido['Nombre'];



        $sqlCarrito = "SELECT * FROM Carrito 
                       WHERE Pedidos_idPedidos='$idPedido'";

        $resultadoCarrito = $conexion->query($sqlCarrito);


        if($resultadoCarrito->num_rows > 0){


            while($carrito = $resultadoCarrito->fetch_assoc()){


                $codigoProducto = $carrito['Productos_CodigoProductos'];

                $cantidad = $carrito['Cantidad'];

                $costoTotal = $carrito['CostoTotal'];


                

                $sqlProducto = "SELECT * FROM Productos 
                                WHERE CodigoProductos='$codigoProducto'";

                $resultadoProducto = $conexion->query($sqlProducto);


                if($resultadoProducto->num_rows > 0){


                    $producto = $resultadoProducto->fetch_assoc();

                    $nombreProducto = $producto['Nombre'];

                    $stockActual = $producto['Stock'];


                  

                    if($cantidad <= $stockActual){


                        

                        $sqlVenta = "INSERT INTO ventas
                        (Fecha, Producto, Stock, Cliente, Total, Pedidos_idPedidos)
                        VALUES
                        (CURDATE(), '$nombreProducto', '$cantidad', '$cliente', '$costoTotal', '$idPedido')";


                        if($conexion->query($sqlVenta)){


                           

                            $nuevoStock = $stockActual - $cantidad;


                            $sqlStock = "UPDATE Productos
                                         SET Stock='$nuevoStock'
                                         WHERE CodigoProductos='$codigoProducto'";


                            $conexion->query($sqlStock);


                        }else{

                            echo "Error al registrar la venta: ".$conexion->error;

                        }


                    }else{

                        echo "Error: No hay suficiente stock de ".$nombreProducto;

                    }


                }


            }


            /* CAMBIAR ESTADO DEL PEDIDO */

            $sqlEstado = "UPDATE Pedidos
                          SET Estado='Vendido'
                          WHERE idPedidos='$idPedido'";

            $conexion->query($sqlEstado);


            echo "<script>
                    alert('Venta registrada correctamente');
                  </script>";


        }else{

            echo "Error: El pedido no tiene productos en el carrito.";

        }


    }else{

        echo "Error: No se encontró el pedido.";

    }

}

?>


<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Registrar Venta</title>


<style>

body{

    font-family:Arial;

    background:#eef5ee;

    margin:20px;

}


h2{

    color:#5f7d67;

}


form{

    background:white;

    padding:20px;

    margin-bottom:30px;

    border-radius:10px;

}


label{

    margin-right:10px;

}


select{

    padding:8px;

    margin-bottom:10px;

}


input[type="radio"]{

    margin-left:10px;

}


button{

    margin-top:20px;

    padding:10px 15px;

    background:#5f7d67;

    color:white;

    border:none;

    border-radius:8px;

    cursor:pointer;

}


button:hover{

    background:#4d6855;

}


a{

    display:inline-block;

    margin-top:20px;

    padding:10px 15px;

    background:#5f7d67;

    color:white;

    text-decoration:none;

    border-radius:8px;

}

</style>


</head>


<body>


<h2>Registrar Venta</h2>


<form action="ventas.php" method="POST" id="id_pedido">


<label>Pedido:</label>


<select name="idPedido" required>


<option value="">Seleccione un pedido</option>


<?php


$sqlPedidos = "SELECT * FROM pedidos 
               WHERE Estado='Aceptado'";


$resultadoPedidos = $conexion->query($sqlPedidos);


while($pedido = $resultadoPedidos->fetch_assoc()){


?>


<option value="<?php echo $pedido['idPedidos']; ?>">

Pedido <?php echo $pedido['idPedidos']; ?> -

<?php echo $pedido['Nombre']; ?>

</option>


<?php


}


?>


</select>


<br><br>


<label>Metodo de pago:</label>


<input type="radio" name="metodoPago" value="Efectivo" required>

<label>Efectivo</label>


<input type="radio" name="metodoPago" value="QR" required>

<label>QR</label>


<br>


<button type="submit" name="registrarVenta">

Registrar venta

</button>


</form>


<br>


<?php


if($_SESSION['rol']=="Administrador"){


?>


<a href="administradornuevo.php">

Volver

</a>


<?php


}else{


?>


<a href="../nuevovendedor.php">

Volver

</a>


<?php


}


?>


</body>

</html>