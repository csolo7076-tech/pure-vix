<?php

$direccion="localhost";
$usuario="root"; 
$contraseña="";  
$nombreBase= "pureskin";

$conexion= new mysqli ($direccion, $usuario, $contraseña, $nombreBase);

if($conexion->connect_error){
    die("hubo un error al conectar la base de datos: " . $conexion->connect_error);
}

?>

