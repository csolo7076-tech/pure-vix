
<?php

session_start();

include("../PAGINA/conexion.php");
include("../include/menu.php");


/* ==============================
   SEGURIDAD
   ============================== */

if(!isset($_SESSION['ciusuario'])){

    header("location:../logueo/login.php");
    exit();

}

if($_SESSION['rol']!="Administrador"){

    header("location:../logueo/login.php");
    exit();

}


/* ==============================
   CONTADORES
   ============================== */

// Total de usuarios
$sqlUsuarios = "SELECT COUNT(*) AS total FROM usuario";
$resultadoUsuarios = $conexion->query($sqlUsuarios);
$filaUsuarios = $resultadoUsuarios->fetch_assoc();
$totalUsuarios = $filaUsuarios['total'];


// Total de productos
$sqlProductos = "SELECT COUNT(*) AS total FROM Productos";
$resultadoProductos = $conexion->query($sqlProductos);
$filaProductos = $resultadoProductos->fetch_assoc();
$totalProductos = $filaProductos['total'];


// Total de pedidos
$sqlPedidos = "SELECT COUNT(*) AS total FROM Pedidos";
$resultadoPedidos = $conexion->query($sqlPedidos);
$filaPedidos = $resultadoPedidos->fetch_assoc();
$totalPedidos = $filaPedidos['total'];


// Ganancias
$sqlGanancias = "SELECT COALESCE(SUM(CostoTotal),0) AS total 
                 FROM Carrito c
                 INNER JOIN Pedidos p 
                 ON p.idPedidos = c.Pedidos_idPedidos
                 WHERE p.Estado = 'Aceptado'";

$resultadoGanancias = $conexion->query($sqlGanancias);
$filaGanancias = $resultadoGanancias->fetch_assoc();
$ganancias = $filaGanancias['total'];


/* ==============================
   USUARIOS
   ============================== */

$sql = "SELECT * FROM usuario ORDER BY Nombre";

$resultado = $conexion->query($sql);

?>


<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Administrador - Pure Skin</title>


<style>

/* ==============================
   GENERAL
   ============================== */

*{
    box-sizing:border-box;
}

body{

    background:#eef5ee;

    font-family:Arial, sans-serif;

    margin:0;

    padding:30px;

    color:#333;

}


/* ==============================
   BIENVENIDA
   ============================== */

.bienvenida{

    display:flex;

    justify-content:space-between;

    align-items:center;

    background:white;

    padding:25px 30px;

    border-radius:18px;

    margin-bottom:30px;

    box-shadow:0 5px 18px rgba(0,0,0,.07);

}


.bienvenida h2{

    color:#5f7d67;

    margin:0 0 7px 0;

    font-size:28px;

}


.bienvenida p{

    margin:0;

    color:#777;

}


.cerrarsesion{

    background:#5f7d67;

    color:white;

    border:none;

    padding:11px 20px;

    border-radius:10px;

    cursor:pointer;

    font-weight:bold;

    transition:.3s;

}


.cerrarsesion:hover{

    background:#4d6855;

    transform:translateY(-2px);

}


/* ==============================
   CONTADORES
   ============================== */

.contaduria{

    display:grid;

    grid-template-columns:repeat(4,1fr);

    gap:20px;

    margin-bottom:35px;

}


.cajita{

    background:white;

    padding:25px;

    border-radius:18px;

    box-shadow:0 5px 18px rgba(0,0,0,.07);

    transition:.3s;

    position:relative;

    overflow:hidden;

}


.cajita:hover{

    transform:translateY(-5px);

    box-shadow:0 10px 25px rgba(0,0,0,.10);

}


.cajita::before{

    content:"";

    position:absolute;

    left:0;

    top:0;

    width:5px;

    height:100%;

    background:#5f7d67;

}


.cajita h2{

    color:#5f7d67;

    font-size:32px;

    margin:0 0 8px 0;

}


.cajita p{

    margin:0;

    color:#777;

    font-size:15px;

}


/* ==============================
   SECCIONES
   ============================== */

.gestionusuario,
.gestionproductos,
.ventasypedido,
.reportes{

    background:white;

    padding:30px;

    border-radius:18px;

    margin-bottom:30px;

    box-shadow:0 5px 18px rgba(0,0,0,.07);

}


.gestionusuario h2,
.gestionproductos h2,
.ventasypedido h2,
.reportes h2{

    color:#5f7d67;

    margin-top:0;

    margin-bottom:8px;

}


.gestionusuario > p,
.gestionproductos > p,
.ventasypedido > p,
.reportes > p{

    color:#777;

    margin-top:0;

}


/* ==============================
   CABECERA USUARIOS
   ============================== */

.encabezado-usuarios{

    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:20px;

    margin-top:25px;

    margin-bottom:15px;

}


.encabezado-usuarios h3{

    margin:0;

    color:#555;

}


/* ==============================
   BUSCADOR
   ============================== */

.buscador{

    width:300px;

    padding:11px 15px;

    border:1px solid #d7dfd7;

    border-radius:10px;

    outline:none;

    font-size:14px;

    transition:.3s;

}


.buscador:focus{

    border-color:#5f7d67;

    box-shadow:0 0 0 3px rgba(95,125,103,.10);

}


/* ==============================
   TABLA
   ============================== */

.tabla-contenedor{

    width:100%;

    overflow-x:auto;

}


table{

    width:100%;

    border-collapse:collapse;

    margin-top:10px;

    min-width:850px;

}


th{

    background:#5f7d67;

    color:white;

    padding:14px 12px;

    text-align:center;

    font-size:14px;

}


th:first-child{

    border-radius:10px 0 0 0;

}


th:last-child{

    border-radius:0 10px 0 0;

}


td{

    padding:14px 12px;

    text-align:center;

    border-bottom:1px solid #e5eae5;

    font-size:14px;

}


tbody tr{

    transition:.2s;

}


tbody tr:hover{

    background:#f0f6f1;

}


tbody tr:nth-child(even){

    background:#f8faf8;

}


tbody tr:nth-child(even):hover{

    background:#f0f6f1;

}


/* ==============================
   ROL
   ============================== */

.rol-etiqueta{

    display:inline-block;

    padding:6px 11px;

    border-radius:20px;

    font-size:12px;

    font-weight:bold;

    background:#f4e3bb;

    color:#8a6418;

}


/* ==============================
   ESTADO
   ============================== */

.estado-activo{

    display:inline-block;

    padding:6px 11px;

    border-radius:20px;

    background:#dcefe0;

    color:#42714c;

    font-size:12px;

    font-weight:bold;

}


.estado-inactivo{

    display:inline-block;

    padding:6px 11px;

    border-radius:20px;

    background:#f5dddd;

    color:#a44e4e;

    font-size:12px;

    font-weight:bold;

}


/* ==============================
   BOTONES
   ============================== */

.acciones{

    display:flex;

    justify-content:center;

    gap:6px;

}


button{

    border:none;

    cursor:pointer;

    font-family:Arial, sans-serif;

}


.btn{

    padding:8px 12px;

    border-radius:8px;

    color:white;

    font-size:12px;

    font-weight:bold;

    text-decoration:none;

    display:inline-block;

    transition:.3s;

}


.btn:hover{

    transform:translateY(-2px);

}


.mostrar{

    background:#d9a441;

}


.mostrar:hover{

    background:#bd8d32;

}


.editar{

    background:#73a37b;

}


.editar:hover{

    background:#5d8965;

}


.eliminar{

    background:#d45d5d;

}


.eliminar:hover{

    background:#b94c4c;

}


.registrar{

    background:#5f7d67;

    color:white;

    padding:12px 18px;

    border-radius:10px;

    font-weight:bold;

    margin-top:20px;

    transition:.3s;

}


.registrar:hover{

    background:#4d6855;

    transform:translateY(-2px);

}


/* ==============================
   MENSAJE SIN RESULTADOS
   ============================== */

.sin-resultados{

    text-align:center;

    padding:30px;

    color:#777;

}


/* ==============================
   RESPONSIVE
   ============================== */

@media(max-width:1000px){

    .contaduria{

        grid-template-columns:repeat(2,1fr);

    }

}


@media(max-width:700px){

    body{

        padding:15px;

    }


    .bienvenida{

        flex-direction:column;

        align-items:flex-start;

        gap:20px;

    }


    .contaduria{

        grid-template-columns:1fr;

    }


    .encabezado-usuarios{

        flex-direction:column;

        align-items:stretch;

    }


    .buscador{

        width:100%;

    }


    .gestionusuario,
    .gestionproductos,
    .ventasypedido,
    .reportes{

        padding:20px;

    }

}


</style>


</head>


<body>


<!-- ==============================
     BIENVENIDA
     ============================== -->

<section class="bienvenida">

    <div>

        <h2>
            Bienvenid@ <?php echo $_SESSION['usuario']; ?>
        </h2>

        <p>
            Panel de administración de Pure Skin
        </p>

    </div>


    <a href="../logueo/logoul.php">

        <button class="cerrarsesion">
            Cerrar Sesión
        </button>

    </a>

</section>



<!-- ==============================
     CONTADORES
     ============================== -->

<section class="contaduria">


    <div class="cajita">

        <h2>
            <?php echo $totalPedidos; ?>
        </h2>

        <p>
            Pedidos
        </p>

    </div>


    <div class="cajita">

        <h2>
            <?php echo $totalUsuarios; ?>
        </h2>

        <p>
            Usuarios
        </p>

    </div>


    <div class="cajita">

        <h2>
            <?php echo $totalProductos; ?>
        </h2>

        <p>
            Productos
        </p>

    </div>


    <div class="cajita">

        <h2>
            Bs <?php echo number_format($ganancias, 2); ?>
        </h2>

        <p>
            Ganancias
        </p>

    </div>


</section>



<!-- ==============================
     GESTIÓN DE USUARIOS
     ============================== -->

<section class="gestionusuario">


    <h2>
        Gestión de Usuarios
    </h2>


    <p>
        Crear, editar, eliminar usuarios y asignar roles.
    </p>


    <div class="encabezado-usuarios">

        <h3>
            Usuarios registrados
        </h3>


        <input
            type="text"
            id="buscador"
            class="buscador"
            placeholder="Buscar usuario..."
            onkeyup="buscarUsuario()"
        >

    </div>



    <div class="tabla-contenedor">


        <table id="tablaUsuarios">


            <thead>

                <tr>

                    <th>CI</th>

                    <th>Nombre</th>

                    <th>Dirección</th>

                    <th>Celular</th>

                    <th>Rol</th>

                    <th>Estado</th>

                    <th>Acciones</th>

                </tr>

            </thead>


            <tbody>


            <?php


            if($resultado->num_rows > 0){


                while($fila=$resultado->fetch_assoc()){


                    $ciusuario = $fila['ciusuario'];


                    echo "<tr>";


                    echo "<td>".$fila['ciusuario']."</td>";


                    echo "<td>".$fila['Nombre']."</td>";


                    echo "<td>".$fila['Direccion']."</td>";


                    echo "<td>".$fila['Celular']."</td>";


                    echo "<td>
                            <span class='rol-etiqueta'>
                                ".$fila['Rol']."
                            </span>
                          </td>";


                    if($fila['Estado'] == "Activo"){

                        echo "<td>
                                <span class='estado-activo'>
                                    ● Activo
                                </span>
                              </td>";

                    }else{

                        echo "<td>
                                <span class='estado-inactivo'>
                                    ● ".$fila['Estado']."
                                </span>
                              </td>";

                    }


                    echo "<td>

                            <div class='acciones'>


                                <a
                                    class='btn mostrar'
                                    href='../usuario/UsuarioRead.php?ciusuario=$ciusuario'
                                >
                                    Mostrar
                                </a>


                                <a
                                    class='btn editar'
                                    href='../usuario/UsuarioUpdateform.php?ciusuario=$ciusuario'
                                >
                                    Editar
                                </a>


                                <a
                                    class='btn eliminar'
                                    href='../usuario/UsuarioDelete.php?ciusuario=$ciusuario'
                                    onclick=\"return confirm('¿Seguro que deseas eliminar este usuario?');\"
                                >
                                    Eliminar
                                </a>


                            </div>

                          </td>";


                    echo "</tr>";

                }


            }else{


                echo "<tr>";

                echo "<td colspan='7' class='sin-resultados'>
                        No hay usuarios registrados.
                      </td>";

                echo "</tr>";

            }


            ?>


            </tbody>


        </table>


    </div>



    <a href="../usuario/UsuarioformCreate.php">

        <button class="registrar">
            + Registrar Usuario
        </button>

    </a>


</section>



<!-- ==============================
     GESTIÓN DE PRODUCTOS
     ============================== -->

<section class="gestionproductos">


    <h2>
        Gestión de Productos
    </h2>


    <p>
        Registrar, editar y eliminar productos.
    </p>


    <table>

        <tr>

            <th>Producto</th>

            <th>Stock</th>

            <th>Precio</th>

            <th>Acciones</th>

        </tr>


        <tr>

            <td>
                Mascarilla Aloe Vera
            </td>

            <td>
                35
            </td>

            <td>
                Bs 20
            </td>


            <td>

                <button class="btn editar">
                    Editar
                </button>


                <button class="btn eliminar">
                    Eliminar
                </button>

            </td>

        </tr>


        <tr>

            <td>
                Mascarilla Coco
            </td>

            <td>
                18
            </td>

            <td>
                Bs 25
            </td>


            <td>

                <button class="btn editar">
                    Editar
                </button>


                <button class="btn eliminar">
                    Eliminar
                </button>

            </td>

        </tr>


    </table>


    <button class="registrar">

        + Registrar Producto

    </button>


</section>



<!-- ==============================
     VENTAS Y PEDIDOS
     ============================== -->

<section class="ventasypedido">


    <h2>
        Ventas y Pedidos
    </h2>


    <p>
        Supervisión de ventas realizadas y pedidos.
    </p>


    <table>


        <tr>

            <th>Cliente</th>

            <th>Producto</th>

            <th>Estado</th>

            <th>Total</th>

        </tr>


        <tr>

            <td>
                Ana Rojas
            </td>

            <td>
                Mascarilla Aloe Vera
            </td>

            <td>
                Entregado
            </td>

            <td>
                Bs 20
            </td>

        </tr>


        <tr>

            <td>
                Lucía Gómez
            </td>

            <td>
                Mascarilla Coco
            </td>

            <td>
                Pendiente
            </td>

            <td>
                Bs 25
            </td>

        </tr>


    </table>


</section>



<!-- ==============================
     REPORTES
     ============================== -->

<section class="reportes">


    <h2>
        Reportes
    </h2>


    <p>
        Consulta información importante del sistema.
    </p>


    <table>


        <tr>

            <th>Reporte</th>

            <th>Descripción</th>

        </tr>


        <tr>

            <td>
                Ventas Mensuales
            </td>

            <td>
                Resumen de ventas del mes.
            </td>

        </tr>


        <tr>

            <td>
                Productos Más Vendidos
            </td>

            <td>
                Productos con mayor demanda.
            </td>

        </tr>


        <tr>

            <td>
                Usuarios Registrados
            </td>

            <td>
                Total de administradores y vendedores.
            </td>

        </tr>


    </table>


</section>



<!-- ==============================
     BUSCADOR DE USUARIOS
     ============================== -->

<script>

function buscarUsuario(){

    let input = document.getElementById("buscador");

    let filtro = input.value.toLowerCase();

    let tabla = document.getElementById("tablaUsuarios");

    let filas = tabla.getElementsByTagName("tbody")[0].getElementsByTagName("tr");


    for(let i = 0; i < filas.length; i++){

        let texto = filas[i].textContent.toLowerCase();


        if(texto.includes(filtro)){

            filas[i].style.display = "";

        }else{

            filas[i].style.display = "none";

        }

    }

}

</script>


</body>

</html>
```
