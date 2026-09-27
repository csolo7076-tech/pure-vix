<?php session_start(); ?>

<style>
    body{
    font-family: Arial, Helvetica, sans-serif;
    background: #eef5ee;
    margin: 30px;
}

h3{
    width: 900px;
    margin: 20px auto;
    background: #5f7d67;
    color: white;
    padding: 15px;
    border-radius: 12px;
    text-align: center;
}

table{
    width: 900px;
    margin: auto;
    border-collapse: collapse;
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,.1);
}

th{
    background: #5f7d67;
    color: white;
    padding: 14px;
    font-size: 15px;
}

td{
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #e5e5e5;
}

tr:nth-child(even){
    background: #f6faf6;
}

tr:hover{
    background: #e8f2e8;
    transition: .3s;
}

input[type="number"]{
    width: 60px;
    padding: 8px;
    border: 1px solid #cfd8cf;
    border-radius: 8px;
    text-align: center;
}

input[type="submit"]{
    background: #73a37b;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    transition: .3s;
}

input[type="submit"]:hover{
    background: #5f8c66;
}

button{
    background: #5f7d67;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 10px;
    cursor: pointer;
    font-size: 15px;
    font-weight: bold;
    margin-top: 25px;
    transition: .3s;
}

button:hover{
    background: #4d6654;
}

a{
    display: flex;
    justify-content: center;
    text-decoration: none;
}
</style>



<?php
include("../PAGINA/conexion.php");

session_start();

if(!isset($_GET['idPedido'])){
    die("No se recibió el pedido.");
}

$id_pedido=$_GET['idPedido'];

if($_SESSION['ciusuario']==null){
    header("location:login.php");
}else{
    if($_SESSION['rol']=="Vendedor"){

}else{
    header("location:../logueo/login.php");
}
}
$id_pedido=$_GET['idPedido'];
$sql="SELECT * FROM productos";

$resultado = $conexion->query($sql);
$sqlTotal="SELECT sum(CostoTotal) FROM carrito where Pedidos_idPedidos='$id_pedido'";
$resultadoTotal=$conexion->query($sqlTotal);
$res = $resultadoTotal->fetch_assoc();
$total=$res['sum(CostoTotal)'];
if($res['sum(CostoTotal)']==null){
    $total=0;
}
//Tabla que muestra todos los productos
echo "<h3>Total: ".$total."</h3>";
echo "<table border='1'>";

echo "<tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th colspan=2> 🛒Agregar al Carrito</th>
      </tr>";

while($fila = $resultado->fetch_assoc()){
    //formulario para agregar cada producto al carrito...
    //Cada fila deñ producto = formulario para agregar ese producto al carro
    echo "<form action='../carrito/agregarCarrito.php' method='post'>";
    echo "<tr>";
        //Datos del producto
        echo "<td>".$fila["CodigoProductos"]."</td>";
        echo "<td>".$fila["Nombre"]."</td>";
        echo "<td>".$fila["Descripcion"]."</td>";
        echo "<td>".$fila["Precio"]."</td>";
        //Datos ocultos y necesarios para crear carrito
        echo "<input type='hidden' value=".$fila["CodigoProductos"]." name='codigo'>";
        echo "<input type='hidden' value=".$id_pedido." name='idpedido'>";
        echo "<input type='hidden' value=".$fila["Precio"]." name='precio'>";
        //Campo para agregar la cantidad
        echo "<td><input type='number' name='cantidad' value=0></td>";
        echo "<td><input type='submit' value='Agregar'></td>";
        echo "</tr>";
        echo "</form>";

}

echo "</table>";

$sqlCarrito="
SELECT
Productos.Nombre,
Carrito.Cantidad,
Carrito.CostoTotal
FROM Carrito
INNER JOIN Productos
ON Carrito.Productos_CodigoProductos=Productos.CodigoProductos
WHERE Pedidos_idPedidos='$id_pedido'";

$resultadoCarrito=$conexion->query($sqlCarrito);

echo "<br><h3>Productos del carrito</h3>";

echo "<table>";

echo "<tr>
<th>Producto</th>
<th>Cantidad</th>
<th>Total</th>
</tr>";

while($fila=$resultadoCarrito->fetch_assoc()){

echo "<tr>";

echo "<td>".$fila['Nombre']."</td>";

echo "<td>".$fila['Cantidad']."</td>";

echo "<td>".$fila['CostoTotal']." Bs</td>";

echo "</tr>";

}

echo "</table>";
echo "<a href='../PAGINA/form_Pedido.php'>
        <button>Generar Nuevo Pedido</button>
        <a href='../PAGINA/pedidos.php'>
        <button>Ver historial de ventas</button>
      </a><br><br>";

?>