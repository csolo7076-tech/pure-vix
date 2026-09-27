<?php
session_start();

if (!isset($_SESSION['ciusuario'])) {
    header("Location: ../logueo/login.php");
    exit();
}

if ($_SESSION['rol'] != "Administrador") {
    header("Location: ../logueo/login.php");
    exit();
}

header("Location: ../PAGINA/administradornuevo.php#usuarios");
exit();
?>