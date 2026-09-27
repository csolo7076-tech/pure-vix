<?php

require ("php/conexion.php");

$ci = $_POST['ci'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$celular = $_POST['celular'];
$contrasena = $_POST['contrasena'];

$rol = "Cliente";
$estado = "Activo";

$sql = "INSERT INTO usuario 
        (ciusuario, Nombre, Direccion, Celular, contrasena, Rol, Estado) 
        VALUES 
        ('$ci', '$nombre', '$direccion', '$celular', '$contrasena', '$rol', '$estado')";

if($conn->query($sql)){
    echo "Usuario registrado correctamente";
}else{
    echo "Error al registrarse: ".$conn->error;
}

?>