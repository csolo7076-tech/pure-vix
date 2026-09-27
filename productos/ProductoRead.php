<?php
include("../PAGINA/conexion.php");

if (!isset($_GET['CodigoProductos'])) {
    die("No se recibió el código del producto");
}

$CodigoProductos = $_GET['CodigoProductos'];

$sql = "SELECT * FROM productos WHERE CodigoProductos='$CodigoProductos'";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {

    $fila = $resultado->fetch_assoc();

    echo "Código: " . $fila['CodigoProductos'] . "<br>";
    echo "Nombre: " . $fila['Nombre'] . "<br>";
    echo "Descripción: " . $fila['Descripcion'] . "<br>";
    echo "Precio: " . $fila['Precio'] . "<br>";
    echo "Stock: " . $fila['Stock'] . "<br>";

    echo "<br>";
    echo "<a href='ProductosUpdateform.php?CodigoProductos=".$fila['CodigoProductos']."'>
            <button>Editar</button>
          </a>";

    echo "
    <a href='../PAGINA/administradornuevo.php'>
        <button>Volver</button>
    </a>";

} else {

    echo "Producto no encontrado";

}

?>