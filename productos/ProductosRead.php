<?php

include("../PAGINA/conexion.php");

session_start();

if (!isset($_SESSION['ciusuario'])) {
    header("Location: login.php");
    exit();
}


$sql = "SELECT * FROM productos";

$resultado = $conexion->query($sql);


if($resultado->num_rows > 0){ 

    while($fila = $resultado->fetch_assoc()){

        echo "Código: ".$fila['CodigoProductos']."<br>";
        echo "Nombre: ".$fila['Nombre']."<br>";
        echo "Descripción: ".$fila['Descripcion']."<br>";
        echo "Precio: ".$fila['Precio']."<br>";
        echo "Stock: ".$fila['Stock']."<br><br>";

        $CodigoProductos = $fila['CodigoProductos'];


        echo "
        <a href='ProductoRead.php?CodigoProductos=$CodigoProductos'>
            <button>Mostrar</button>
        </a><br>";


        echo "
        <a href='ProductosUpdateform.php?CodigoProductos=$CodigoProductos'>
            <button>Editar</button>
        </a><br>";


        echo "
        <a href='ProductosDelete.php?CodigoProductos=$CodigoProductos'
        onclick=\"return confirm('¿Desea eliminar este producto?')\">
            <button>Eliminar</button>
        </a><br><br>";

    }

}else{

    echo "No hay productos registrados";

}

?>