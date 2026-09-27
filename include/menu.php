<?php
$sesionActiva = isset($_SESSION['ciusuario']);
$rolSesion = isset($_SESSION['rol']) ? $_SESSION['rol'] : '';
?>

<style>

nav li{
    font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    font-size:20px;
    margin:0 20px;
}

h1{
    color:white;
    display:flex;
    justify-content:center;
    font-family:Georgia, 'Times New Roman', Times, serif;
    font-size:100px;
}

header{
    background-image:url('../img/crema.avif');
    background-repeat:no-repeat;
    background-size:cover;
    display:flex;
    justify-content:center;
    align-items:center;
    height:200px;
}

nav{
    background-color:#D8E4D0;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:20px;
}

nav ul{
    display:flex;
    list-style:none;
    padding:0;
    margin:0;
    flex-wrap:wrap;
}

.botoniniciosesion{
    background:#8BA888;
    color:white;
    padding:8px 15px;
    border-radius:5px;
    text-decoration:none;
}

.redireccion{
    color:black;
    text-decoration:none;
}

</style>

<header>
    <h1>Pure Skin</h1>
</header>

<nav>

    <ul>

        <li>
            <a class="redireccion" href="maq_inicionuevo.php">Inicio</a>
        </li>

        <li>
            <a class="redireccion" href="maq_productos.php">Productos</a>
        </li>

        <li>
            <a class="redireccion" href="mision_vision_objetivos.php">Objetivos</a>
        </li>
        
        <li>
            <a class="redireccion" href="ficha_ambiental.php">Ficha Ambiental</a> 
        </li>

        <?php
        if($sesionActiva && $rolSesion=="Administrador"){
        ?>
            <li>
                <a class="redireccion" href="administradornuevo.php">Administrador</a>
            </li>
        <?php
        }
        ?>
        <?php
        if($sesionActiva && $rolSesion=="Administrador"){
        ?>
            <li>
                <a class="redireccion" href="../reportes/verreportes.php">Reportes</a>
            </li>
        <?php
        }
        ?>
        <?php
        if($sesionActiva && $rolSesion=="Vendedor"){
        ?>
            <li>
                <a class="redireccion" href="../nuevovendedor.php">Vendedor</a>
            </li>
        <?php
        }
        ?>

        <?php
        if($sesionActiva && $rolSesion=="cliente"){
        ?>
            <li>
                <a class="redireccion" href="maq_miscompras.php">Mis compras</a>
            </li>
        <?php
        }
        ?>

        <?php
        if($sesionActiva){
        ?>
            <li>
                <a class="botoniniciosesion" href="../logueo/logoul.php">Cerrar Sesión</a>
            </li>
        <?php
        }else{
        ?>
            <li>
                <a class="botoniniciosesion" href="../logueo/login.php">Iniciar Sesión</a>
            </li>
        <?php
        }
        ?>

    </ul>

</nav>