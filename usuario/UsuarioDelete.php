<?php

session_start();
include("../PAGINA/conexion.php");

// Verificar que haya iniciado sesión
if (!isset($_SESSION['ciusuario'])) {
    header("Location: ../logueo/login.php");
    exit();
}

// Verificar que sea administrador
if ($_SESSION['rol'] != "Administrador") {
    echo "No tiene permiso para eliminar usuarios.";
    exit();
}

// Verificar que se haya recibido el C.I.
if (!isset($_GET['ciusuario']) || $_GET['ciusuario'] == "") {
    echo "No se recibió el C.I. del usuario.";
    exit();
}

$ciusuario = $_GET['ciusuario'];

// Verificar que el usuario exista
$sqlBuscar = "SELECT * FROM usuario WHERE ciusuario='$ciusuario'";
$resultado = $conexion->query($sqlBuscar);

if ($resultado->num_rows == 0) {
    echo "El usuario no existe.";
    exit();
}

// Evitar que el administrador se elimine a sí mismo
if ($ciusuario == $_SESSION['ciusuario']) {
    echo "No puedes eliminar tu propio usuario.";
    exit();
}

// Eliminar usuario
$sql = "DELETE FROM usuario WHERE ciusuario='$ciusuario'";

if ($conexion->query($sql) == TRUE) {

    header("Location: ../PAGINA/administradornuevo.php#usuarios");
    exit();

} else {

    echo "Error al eliminar el usuario: " . $conexion->error;

}

?>