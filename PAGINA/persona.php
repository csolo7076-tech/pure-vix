<?php

include("conexion.php");


if(!isset($_GET['ciusuario'])){

    die("No se recibió el CI del usuario");

}


$ciusuario=$_GET['ciusuario'];



$sql="SELECT * FROM usuario WHERE ciusuario='$ciusuario'";


$resultado=$conexion->query($sql);



if($resultado->num_rows>0){


$fila=$resultado->fetch_assoc();



?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Información Usuario</title>

<style>

body{

font-family:Arial;
background:#eef5ee;
padding:30px;

}


div{

background:white;
width:400px;
margin:auto;
padding:25px;
border-radius:15px;
box-shadow:0 5px 15px #ccc;

}


h2{

color:#5f7d67;
text-align:center;

}

</style>


</head>


<body>


<div>

<h2>Información del Usuario</h2>


<p>
<b>CI:</b>
<?php echo $fila['ciusuario']; ?>
</p>


<p>
<b>Nombre:</b>
<?php echo $fila['Nombre']; ?>
</p>


<p>
<b>Dirección:</b>
<?php echo $fila['Direccion']; ?>
</p>


<p>
<b>Celular:</b>
<?php echo $fila['Celular']; ?>
</p>


<p>
<b>Rol:</b>
<?php echo $fila['Rol']; ?>
</p>


<p>
<b>Estado:</b>
<?php echo $fila['Estado']; ?>
</p>


<p>
<b>Correo:</b>
<?php echo $fila['Correo']; ?>
</p>


</div>


</body>

</html>


<?php


}

else{


die("Usuario no encontrado");


}


?>