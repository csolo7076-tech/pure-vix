<?php

$direccion="localhost";
$usuario="root"; 
$contraseña="";  
$nombreBase= "pureskin";

$conexion= new mysqli ($direccion, $usuario, $contraseña, $nombreBase,);
if($conexion->connect_error){
    echo "hubo un error al conectar la base de datos";
}
$Nombre=isset($_POST['Nombre']) ? $_POST['Nombre'] : '';
$Correo=isset($_POST['Correo']) ? $_POST['Correo'] : '';
$sql="SELECT * FROM usuario WHERE Nombre='$Nombre' AND Correo='$Correo'";
$resultado=$conexion->query($sql);
if($resultado->num_rows>0){ 
    while($fila=$resultado->fetch_assoc()){
    session_start();
    $_SESSION['ciusuario']=$fila['ciusuario'];
    $_SESSION['Nombre']=$fila['Nombre'];
    $_SESSION['Correo']=$fila['Correo'];
    header("Location: inicio.php");
    }
}
    else{
        echo "nombre o correo incorrectos";
    }





?>