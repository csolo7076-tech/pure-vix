<?php
session_start();

if (!isset($_SESSION['ciusuario'])) {
    header("Location: ../logueo/login.php");
    exit();
}

include("../PAGINA/conexion.php");

$ciusuario = $_POST['ciusuario'];
$Nombre = $_POST['Nombre'];
$Direccion = $_POST['Direccion'];
$Celular = $_POST['Celular'];

$esAdministrador = false;

if ($_SESSION['rol'] == "Administrador") {
    $esAdministrador = true;
}

// Si no es administrador, solo puede editar su propio usuario
if (!$esAdministrador && $_SESSION['ciusuario'] != $ciusuario) {
    die("No tiene permiso para realizar esta acción.");
}

// El administrador puede cambiar rol y estado
if ($esAdministrador) {
    $Rol = $_POST['Rol'];
    $Estado = $_POST['Estado'];
} else {
    // Mantener el rol y estado actuales
    $sql = "SELECT * FROM usuario WHERE ciusuario='$ciusuario'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $Rol = $fila['Rol'];
        $Estado = $fila['Estado'];
    } else {
        die("Usuario no encontrado.");
    }
}

$sql = "UPDATE usuario
SET Nombre='$Nombre',
Direccion='$Direccion',
Celular='$Celular',
Rol='$Rol',
Estado='$Estado'
WHERE ciusuario='$ciusuario'";

if ($conexion->query($sql) == TRUE) {

    // Si editó su propio perfil, actualizar la sesión
    if ($_SESSION['ciusuario'] == $ciusuario) {
        $_SESSION['usuario'] = $Nombre;
        $_SESSION['dire'] = $Direccion;
        $_SESSION['rol'] = $Rol;
    }

    if ($esAdministrador) {
        header("Location: ../PAGINA/administradornuevo.php");
    } else {
        header("Location: ../logueo/logueo.php");
    }

    exit();

} else {
    echo $conexion->error;
}
?>