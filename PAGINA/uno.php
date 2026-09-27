<?php

session_start();


$conexion = mysqli_connect(
    "localhost",
    "root",
    "",
    "pureskin"
);


if(!$conexion){

    die("Error al conectar con la base de datos");

}


if(!isset($_POST['Nombre']) || !isset($_POST['CI'])){

    header("Location: ../logueo/login.php");
    exit();

}


$usuario = $_POST['Nombre'];

$clave = $_POST['CI'];


$sql = "SELECT * FROM usuario
        WHERE Nombre='$usuario'
        AND ciusuario='$clave'";


$resultado = mysqli_query($conexion, $sql);


if(mysqli_num_rows($resultado) > 0){


    $fila = mysqli_fetch_assoc($resultado);


    // Guardar datos del usuario en la sesión

    $_SESSION['ciusuario'] = $fila['ciusuario'];

    $_SESSION['usuario'] = $fila['Nombre'];

    $_SESSION['Nombre'] = $fila['Nombre'];

    $_SESSION['dire'] = $fila['Direccion'];

    $_SESSION['rol'] = $fila['Rol'];


    // SI ES VENDEDOR

    if($fila['Rol'] == "Vendedor"){

        header(
            "Location: ../nuevovendedor.php?ciusuario=".$clave
        );

        exit();

    }


    // SI ES ADMINISTRADOR

    elseif($fila['Rol'] == "Administrador"){

        header(
            "Location: administradornuevo.php?ciusuario=".$clave
        );

        exit();

    }


    // SI ES CLIENTE
    if($fila['Rol'] == "cliente"){

        header(
            "Location: maq_inicionuevo.php?ciusuario=".$clave
        );

        exit();

    }
    else{
        // Verificamos si el usuario venía del catálogo

        if(isset($_SESSION['destino'])){


            $destino = $_SESSION['destino'];


            unset($_SESSION['destino']);


            header("Location: ".$destino);

            exit();

        }


        // Si inició sesión normalmente

        header("Location: maq_catalogo.php");

        exit();

    }


}else{


    echo "Usuario o contraseña incorrectos";

}

?>