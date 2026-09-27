<?php
include("../PAGINA/conexion.php");


if($conexion->connect_error){

    echo "Hubo un error al conectar la base de datos";

}


session_start();

if(!isset($_SESSION['ciusuario'])){

    header("Location: ../logueo/login.php");
    exit();

}



$ciusuario=$_SESSION['ciusuario'];



$sql="SELECT * FROM usuario WHERE ciusuario='$ciusuario'";


$resultado=$conexion->query($sql);



if($resultado->num_rows>0){


    while($fila=$resultado->fetch_assoc()){


        echo "C.I: ".$fila['ciusuario']."<br>";

        echo "Nombre: ".$fila['Nombre']."<br>";

        echo "Dirección: ".$fila['Direccion']."<br>";

        echo "Celular: ".$fila['Celular']."<br>";

        echo "Rol: ".$fila['Rol']."<br>";

        echo "Estado: ".$fila['Estado']."<br>";

        echo "Correo: ".$fila['Correo']."<br>";

    }


}else{


    echo "Usuario no encontrado";


}



echo "<a href='../logueo/logoul.php'>
<button>Cerrar sesión</button>
</a>";


?>