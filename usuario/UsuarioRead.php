<?php
session_start();

if (!isset($_SESSION['ciusuario'])) {
    header("Location: ../logueo/login.php");
    exit();
}

include("../PAGINA/conexion.php");

if (!isset($_GET['ciusuario'])) {
    die("No se recibió el C.I. del usuario");
}

$ciusuario = $_GET['ciusuario'];

// Solo el administrador puede ver cualquier usuario.
// Los demás solo pueden ver su propio perfil.
if ($_SESSION['rol'] != "Administrador" && $_SESSION['ciusuario'] != $ciusuario) {
    die("No tiene permiso para ver este usuario.");
}

$sql = "SELECT * FROM usuario WHERE ciusuario='$ciusuario'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
} else {
    die("Usuario no encontrado");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Información del Usuario</title>

<style>
body{
    background:#eef5ee;
    font-family:Arial, Helvetica, sans-serif;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
    margin:0;
}

.perfil{
    background:white;
    width:380px;
    border-radius:18px;
    box-shadow:0 10px 25px rgba(0,0,0,.12);
    overflow:hidden;
}

.header{
    background:#5f7d67;
    color:white;
    text-align:center;
    padding:20px;
    font-size:20px;
    font-weight:bold;
}

.contenido{
    padding:25px;
}

.item{
    padding:10px 0;
    border-bottom:1px solid #ddd;
}

.label{
    font-weight:bold;
    color:#5f7d67;
}

a{
    color:#5f7d67;
    text-decoration:none;
}

.botones{
    margin-top:20px;
    text-align:center;
}
</style>

</head>
<body>

<div class="perfil">

    <div class="header">
        Información del Usuario
    </div>

    <div class="contenido">

        <div class="item">
            <span class="label">C.I.:</span>
            <?php echo $fila['ciusuario']; ?>
        </div>

        <div class="item">
            <span class="label">Nombre:</span>
            <?php echo $fila['Nombre']; ?>
        </div>

        <div class="item">
            <span class="label">Dirección:</span>
            <?php echo $fila['Direccion']; ?>
        </div>

        <div class="item">
            <span class="label">Celular:</span>
            <?php echo $fila['Celular']; ?>
        </div>

        <div class="item">
            <span class="label">Rol:</span>
            <?php echo $fila['Rol']; ?>
        </div>

        <div class="item">
            <span class="label">Estado:</span>
            <?php echo $fila['Estado']; ?>
        </div>

        <div class="botones">
            <a href="UsuarioUpdateform.php?ciusuario=<?php echo $fila['ciusuario']; ?>">Editar</a>
            |
            <?php
            if ($_SESSION['rol'] == "Administrador") {
                echo "<a href='../PAGINA/administradornuevo.php'>Volver</a>";
            } else {
                echo "<a href='../logueo/login.php'>Volver</a>";
            }
            ?>
        </div>

    </div>

</div>

</body>
</html>