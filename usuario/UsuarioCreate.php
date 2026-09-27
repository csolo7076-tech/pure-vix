<?php
session_start();
include("../PAGINA/conexion.php");

if (!isset($_SESSION['ciusuario'])) {
    header("Location: ../logueo/login.php");
    exit();
}

if ($_SESSION['rol'] != "Administrador") {
    echo "No tiene permiso para registrar usuarios.";
    exit();
}

$Nombre = $_POST['Nombre'];
$ciusuario = $_POST['ciusuario'];
$Direccion = $_POST['Direccion'];
$Celular = $_POST['Celular'];
$Rol = $_POST['Rol'];
$Estado = $_POST['Estado'];

if ($Nombre == "" || $ciusuario == "" || $Direccion == "" || $Celular == "" || $Rol == "" || $Estado == "") {
    echo "Todos los campos son obligatorios.";
    exit();
}

$sqlBuscar = "SELECT * FROM usuario WHERE ciusuario='$ciusuario'";
$resultado = $conexion->query($sqlBuscar);

if ($resultado->num_rows > 0) {
    echo "Ya existe un usuario con ese C.I.";
    exit();
}

$sql = "INSERT INTO usuario (ciusuario, Nombre, Direccion, Celular, Rol, Estado)
VALUES ('$ciusuario','$Nombre','$Direccion','$Celular','$Rol','$Estado')";

if ($conexion->query($sql) == TRUE) {
    header("Location: ../PAGINA/administradornuevo.php");
    exit();
} else {
    echo $conexion->error;
}
?>