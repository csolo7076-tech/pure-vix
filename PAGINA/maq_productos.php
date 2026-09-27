<?php
include("../PAGINA/conexion.php");
session_start();


$sql = "SELECT * FROM Productos";
$resultado = $conexion->query($sql);

$idPedido = "";

if(isset($_GET['idPedido'])){
    $idPedido = $_GET['idPedido'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Productos - Pure Skin</title>

<style>

body{

    background-color:#F8F7F4;
    margin:0;
    font-family:Arial, sans-serif;

}


#uno{

    padding:20px;
    text-align:center;

}


.titulo{

    text-align:center;
    color:#385739;
    font-size:40px;
    margin:40px;

}



.cajageneral{

    display:flex;
    gap:20px;
    justify-content:center;
    flex-wrap:wrap;
    margin-bottom:5%;
}



.productos{

    background:white;
    width:220px;
    box-shadow:0 2px 8px black;
    border-radius:15px;
    padding:30px;

}



.productos img{

    width:100%;
    height:220px;
    border-radius:8px;

}



.productos h2{

    color:#5D735A;
    font-size:22px;

}



.precio{

    color:#3f6c43;
    font-weight:bold;

}



.sin-stock{

    color:red;

}


#tres{

    background:#7ba975;
    padding:30px;
    width:700px;
    max-width:90%;
    margin:5% auto;
    border-radius:15px;
    text-align:center;

}


#tres h3{

    color:white;
    font-size:35px;

}



.a{

    background:#E7E3DA;
    display:flex;
    justify-content:center;
    align-items:center;
    width:220px;
    height:50px;
    margin:auto;
    border-radius:20px;
    color:#2F3A34;
    text-decoration:none;

}
.b{
    
    display:flex;
    justify-content:center;
    align-items:center;
    width:220px;
    height:50px;
    margin:auto;
    border-radius:20px;
    color:#2F3A34;
    text-decoration:none;
}


</style>

</head>


<body>


<section id="uno">

<?php

include("../include/menu.php");

?>

</section>



<h1 class="titulo">
Nuestros Productos
</h1>



<section class="cajageneral">


<?php

if($resultado->num_rows > 0){

while($fila=$resultado->fetch_assoc()){


?>


<div class="productos">
<img src="../img/<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['Nombre']; ?>">


<h2>
<?php echo $fila['Nombre']; ?>
</h2>


<p>
<?php echo $fila['Descripcion']; ?>
</p>


<p class="precio">

<?php echo $fila['Precio']; ?> Bs

</p>


<p>

Stock:
<?php echo $fila['Stock']; ?>

</p>



</div>



<?php

}

}else{

echo "No hay productos registrados";

}


?>



</section>



<section id="tres">

<h3>
Descubre más
</h3>


<a class="a" href="maq_catalogo.php">
Ver Catálogo Completo
</a>


</section>



<?php

include("../include/piedepagina.php");

?>


</body>
</html>