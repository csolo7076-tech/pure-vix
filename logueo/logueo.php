<?php

session_start();


if(!isset($_SESSION['ciusuario'])){

    header("location:login.php");
    exit();

}


$servidor = "localhost";
$usuario = "root";  
$contraseña = "";
$baseDatos = "pureskin";


$conexion = new mysqli(
    $servidor,
    $usuario,
    $contraseña,
    $baseDatos
);


if($conexion->connect_error){

    echo "Error al conectar";

}


$ciusuario = $_SESSION['ciusuario'];


$sql = "SELECT * FROM usuario WHERE ciusuario='$ciusuario'";


$resultado = $conexion->query($sql);



if($resultado->num_rows > 0){


    $fila = $resultado->fetch_assoc();


?>


<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Perfil</title>


<style>

body{

    background:#eaf7ef;
    font-family:Arial;

}


div{

    width:350px;
    margin:80px auto;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 5px 15px #b7d9c3;

}


h2{

    color:#2f6b4f;
    text-align:center;

}


p{

    color:#3b8f60;

}


a{

    color:#2f6b4f;

}


</style>


</head>


<body>


<div>


<h2>Información del usuario</h2>


<p>
<strong>C.I:</strong>
<?php echo $fila['ciusuario']; ?>
</p>


<p>
<strong>Nombre:</strong>
<?php echo $fila['Nombre']; ?>
</p>


<p>
<strong>Dirección:</strong>
<?php echo $fila['Direccion']; ?>
</p>


<p>
<strong>Celular:</strong>
<?php echo $fila['Celular']; ?>
</p>


<p>
<strong>Rol:</strong>
<?php echo $fila['Rol']; ?>
</p>


<p>
<strong>Estado:</strong>
<?php echo $fila['Estado']; ?>
</p>





<a href="UsuarioUpdateform.php?ciusuario=<?php echo $fila['ciusuario']; ?>">
Editar perfil
</a>


<br><br>


<a href="logoul.php">
Cerrar sesión
</a>


</div>


</body>

</html>


<?php


}else{


    header("location:login.php");


}


?>         

