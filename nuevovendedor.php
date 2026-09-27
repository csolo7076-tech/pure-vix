<?php
session_start();

if (!isset($_SESSION['ciusuario'])) {
    header("Location: ../logueo/login.php");
    exit();
}

if ($_SESSION['rol'] != "Vendedor") {
    header("Location: ../logueo/login.php");
    exit();
}


/* =========================================
   CONEXIÓN A LA BASE DE DATOS
========================================= */

include("PAGINA/conexion.php");


/* =========================================
   VENTAS REALIZADAS HOY
========================================= */

$ventasHoy = 0;

$resultadoVentas = $conexion->query("
    SELECT COUNT(*) AS total
    FROM ventas
    WHERE Fecha = CURDATE()
");

if ($resultadoVentas) {

    $filaVentas = $resultadoVentas->fetch_assoc();

    $ventasHoy = $filaVentas['total'];
}


/* =========================================
   PEDIDOS PENDIENTES
========================================= */

$pedidosPendientes = 0;

$resultadoPedidos = $conexion->query("
    SELECT COUNT(*) AS total
    FROM Pedidos
    WHERE Estado = 'Pendiente'
");

if ($resultadoPedidos) {

    $filaPedidos = $resultadoPedidos->fetch_assoc();

    $pedidosPendientes = $filaPedidos['total'];
}


/* =========================================
   PRODUCTOS CON STOCK
========================================= */

$productosStock = 0;

$resultadoStock = $conexion->query("
    SELECT COUNT(*) AS total
    FROM Productos
    WHERE Stock > 0
");

if ($resultadoStock) {

    $filaStock = $resultadoStock->fetch_assoc();

    $productosStock = $filaStock['total'];
}


/* =========================================
   TOTAL DINERO VENDIDO HOY
========================================= */

$totalVentasHoy = 0;

$resultadoTotal = $conexion->query("
    SELECT COALESCE(SUM(Total), 0) AS total
    FROM ventas
    WHERE Fecha = CURDATE()
");

if ($resultadoTotal) {

    $filaTotal = $resultadoTotal->fetch_assoc();

    $totalVentasHoy = $filaTotal['total'];
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Vendedor | Pure Skin</title>


<!-- FUENTES -->

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">


<style>

/* =========================================
   CONFIGURACIÓN GENERAL
========================================= */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{

    font-family:'Plus Jakarta Sans', sans-serif;

    background:#F7EFE5;

    color:#4A3B32;

}


/* =========================================
   ENCABEZADO
========================================= */

.bienvenido{

    background:#5D735A;

    padding:20px 6%;

    display:flex;

    justify-content:space-between;

    align-items:center;

    color:white;

    box-shadow:0 4px 15px rgba(0,0,0,0.08);

}


/* MARCA */

.marca{

    display:flex;

    align-items:center;

    gap:12px;

}


.logo{

    width:48px;

    height:48px;

    background:#F7EFE5;

    color:#5D735A;

    border-radius:50%;

    display:flex;

    justify-content:center;

    align-items:center;

    font-family:'Playfair Display', serif;

    font-size:21px;

    font-weight:bold;

}


.titulo-header h1{

    font-family:'Playfair Display', serif;

    font-size:25px;

    margin-bottom:3px;

}


.titulo-header p{

    font-size:12px;

    opacity:.85;

}


/* =========================================
   CERRAR SESIÓN
========================================= */

.cerrar{

    background:#F7EFE5;

    color:#5D735A;

    text-decoration:none;

    padding:11px 20px;

    border-radius:25px;

    font-size:14px;

    font-weight:600;

    transition:.3s;

}


.cerrar:hover{

    background:white;

    transform:translateY(-2px);

    box-shadow:0 5px 12px rgba(0,0,0,.15);

}


/* =========================================
   CONTENEDOR
========================================= */

.contenedor{

    width:88%;

    max-width:1200px;

    margin:45px auto;

}


/* =========================================
   BIENVENIDA
========================================= */

.bienvenida{

    margin-bottom:30px;

}


.bienvenida h2{

    font-family:'Playfair Display', serif;

    font-size:38px;

    color:#4A3B32;

    margin-bottom:8px;

}


.bienvenida h2 span{

    color:#5D735A;

}


.bienvenida p{

    color:#77685E;

    font-size:15px;

    line-height:1.6;

}


/* =========================================
   PERFIL DEL VENDEDOR
========================================= */

.perfil{

    background:white;

    padding:28px 32px;

    border-radius:20px;

    display:flex;

    align-items:center;

    gap:25px;

    box-shadow:0 8px 25px rgba(74,59,50,.08);

    margin-bottom:35px;

    border:1px solid #E8D9CC;

}


.icono-perfil{

    width:75px;

    height:75px;

    background:#E6EFE4;

    color:#5D735A;

    border-radius:50%;

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:32px;

}


.info-perfil h3{

    font-family:'Playfair Display', serif;

    font-size:22px;

    margin-bottom:12px;

    color:#4A3B32;

}


.datos{

    display:flex;

    gap:30px;

    flex-wrap:wrap;

}


.dato{

    font-size:14px;

    color:#75675D;

}


.dato strong{

    color:#5D735A;

}


/* =========================================
   TÍTULOS DE SECCIÓN
========================================= */

.titulo-seccion{

    font-family:'Playfair Display', serif;

    font-size:27px;

    margin:35px 0 18px;

    color:#4A3B32;

}


/* =========================================
   TARJETAS DE RESUMEN
========================================= */

.resumen{

    display:grid;

    grid-template-columns:repeat(3,1fr);

    gap:20px;

}


.cajita{

    background:white;

    padding:25px;

    border-radius:18px;

    border:1px solid #E8D9CC;

    box-shadow:0 7px 20px rgba(74,59,50,.07);

    transition:.3s;

}


.cajita:hover{

    transform:translateY(-5px);

    box-shadow:0 12px 25px rgba(74,59,50,.12);

}


/* ICONO */

.icono-caja{

    width:50px;

    height:50px;

    background:#E6EFE4;

    color:#5D735A;

    border-radius:13px;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:22px;

    margin-bottom:15px;

}


.cajita h3{

    font-size:14px;

    color:#75675D;

    font-weight:500;

    margin-bottom:8px;

}


.numero{

    font-family:'Playfair Display', serif;

    font-size:32px;

    color:#4A3B32;

}


/* =========================================
   PEQUEÑO TEXTO DE LAS TARJETAS
========================================= */

.descripcion{

    font-size:12px;

    color:#95867B;

    margin-top:5px;

}


/* =========================================
   TOTAL DE VENTAS
========================================= */

.total-ventas{

    margin-top:20px;

    background:#5D735A;

    color:white;

    padding:22px 25px;

    border-radius:18px;

    display:flex;

    justify-content:space-between;

    align-items:center;

    box-shadow:0 7px 20px rgba(93,115,90,.18);

}


.total-ventas h3{

    font-size:15px;

    font-weight:500;

}


.total{

    font-family:'Playfair Display', serif;

    font-size:27px;

}


/* =========================================
   FUNCIONES
========================================= */

.funciones{

    display:grid;

    grid-template-columns:repeat(2,1fr);

    gap:20px;

    margin-bottom:50px;

}


.funcion{

    background:#5D735A;

    color:white;

    text-decoration:none;

    padding:24px;

    border-radius:18px;

    display:flex;

    align-items:center;

    gap:18px;

    transition:.3s;

    box-shadow:0 7px 18px rgba(93,115,90,.18);

}


.funcion:hover{

    transform:translateY(-5px);

    background:#52684F;

    box-shadow:0 12px 25px rgba(93,115,90,.25);

}


/* ICONO DE FUNCIÓN */

.icono-funcion{

    width:52px;

    height:52px;

    background:rgba(255,255,255,.18);

    border-radius:13px;

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:23px;

}


.texto-funcion h3{

    font-size:17px;

    margin-bottom:5px;

}


.texto-funcion p{

    font-size:12px;

    opacity:.8;

}


/* =========================================
   EFECTO PARA LOS NÚMEROS
========================================= */

.numero{

    transition:.3s;

}


.cajita:hover .numero{

    transform:scale(1.05);

}


/* =========================================
   RESPONSIVE
========================================= */

@media(max-width:800px){

    .bienvenido{

        padding:18px 5%;

    }


    .titulo-header h1{

        font-size:21px;

    }


    .cerrar{

        padding:9px 14px;

        font-size:12px;

    }


    .contenedor{

        width:92%;

    }


    .bienvenida h2{

        font-size:30px;

    }


    .resumen{

        grid-template-columns:1fr;

    }


    .funciones{

        grid-template-columns:1fr;

    }


    .total-ventas{

        flex-direction:column;

        align-items:flex-start;

        gap:8px;

    }

}


/* =========================================
   CELULARES
========================================= */

@media(max-width:500px){

    .bienvenido{

        flex-direction:column;

        gap:15px;

        text-align:center;

    }


    .marca{

        justify-content:center;

    }


    .perfil{

        flex-direction:column;

        text-align:center;

    }


    .datos{

        justify-content:center;

        gap:12px;

    }


    .bienvenida h2{

        font-size:27px;

    }


    .funcion{

        padding:20px;

    }

}

</style>

</head>


<body>


<!-- =========================================
     ENCABEZADO
========================================= -->

<header class="bienvenido">


    <div class="marca">


        <div class="logo">

            PS

        </div>


        <div class="titulo-header">

            <h1>
                Pure Skin
            </h1>

            <p>
                Panel de vendedor
            </p>

        </div>


    </div>


    <a href="logueo/logoul.php" class="cerrar">

        Cerrar sesión

    </a>


</header>



<!-- =========================================
     CONTENIDO
========================================= -->

<main class="contenedor">


    <!-- BIENVENIDA -->

    <section class="bienvenida">


        <h2>

            ¡Hola,
            <span>
                <?php echo $_SESSION['usuario']; ?>
            </span>!

        </h2>


        <p>

            Bienvenido al panel de vendedor de Pure Skin.
            Desde aquí puedes gestionar tus ventas, pedidos y productos.

        </p>


    </section>



    <!-- =====================================
         PERFIL
    ====================================== -->

    <section class="perfil">


        <div class="icono-perfil">

            👤

        </div>


        <div class="info-perfil">


            <h3>

                Información del vendedor

            </h3>


            <div class="datos">


                <div class="dato">

                    <strong>
                        C.I:
                    </strong>

                    <?php echo $_SESSION['ciusuario']; ?>

                </div>


                <div class="dato">

                    <strong>
                        Nombre:
                    </strong>

                    <?php echo $_SESSION['usuario']; ?>

                </div>


                <div class="dato">

                    <strong>
                        Rol:
                    </strong>

                    Vendedor

                </div>


            </div>


        </div>


    </section>



    <!-- =====================================
         RESUMEN
    ====================================== -->

    <h2 class="titulo-seccion">

        Resumen

    </h2>


    <section class="resumen">


        <!-- VENTAS HOY -->

        <div class="cajita">


            <div class="icono-caja">

                💰

            </div>


            <h3>

                Ventas de hoy

            </h3>


            <div class="numero">

                <?php echo $ventasHoy; ?>

            </div>


            <p class="descripcion">

                Ventas registradas durante el día

            </p>


        </div>



        <!-- PEDIDOS PENDIENTES -->

        <div class="cajita">


            <div class="icono-caja">

                📦

            </div>


            <h3>

                Pedidos pendientes

            </h3>


            <div class="numero">

                <?php echo $pedidosPendientes; ?>

            </div>


            <p class="descripcion">

                Pedidos que aún deben gestionarse

            </p>


        </div>



        <!-- PRODUCTOS EN STOCK -->

        <div class="cajita">


            <div class="icono-caja">

                🌿

            </div>


            <h3>

                Productos en stock

            </h3>


            <div class="numero">

                <?php echo $productosStock; ?>

            </div>


            <p class="descripcion">

                Productos disponibles actualmente

            </p>


        </div>


    </section>



    <!-- =====================================
         TOTAL VENDIDO HOY
    ====================================== -->

    <div class="total-ventas">


        <h3>

            Total vendido hoy

        </h3>


        <div class="total">

            Bs. <?php echo number_format($totalVentasHoy, 2); ?>

        </div>


    </div>



    <!-- =====================================
         FUNCIONES
    ====================================== -->

    <h2 class="titulo-seccion">

        ¿Qué deseas hacer?

    </h2>


    <section class="funciones">


        <!-- REGISTRAR VENTA -->

        <a href="PAGINA/pedido.php" class="funcion">


            <div class="icono-funcion">

                🛒

            </div>


            <div class="texto-funcion">


                <h3>

                    Registrar Venta

                </h3>


                <p>

                    Registra una nueva venta

                </p>


            </div>


        </a>



        <!-- CONSULTAR STOCK -->

        <a href="PAGINA/maq_productos.php" class="funcion">


            <div class="icono-funcion">

                🌿

            </div>


            <div class="texto-funcion">


                <h3>

                    Consultar Stock

                </h3>


                <p>

                    Consulta los productos disponibles

                </p>


            </div>


        </a>



        <!-- GESTIONAR PEDIDOS -->

        <a href="PAGINA/pedidos.php" class="funcion">


            <div class="icono-funcion">

                📋

            </div>


            <div class="texto-funcion">


                <h3>

                    Gestionar Pedidos

                </h3>


                <p>

                    Revisa y administra los pedidos

                </p>


            </div>


        </a>



        <!-- HISTORIAL DE VENTAS -->

        <a href="PAGINA/ventas.php" class="funcion">


            <div class="icono-funcion">

                📊

            </div>


            <div class="texto-funcion">


                <h3>

                    Historial de Ventas

                </h3>


                <p>

                    Consulta las ventas realizadas

                </p>


            </div>


        </a>


    </section>


</main>



<?php

include("include/piedepagina.php");

?>


</body>

</html>