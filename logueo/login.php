<?php

session_start();

if(isset($_SESSION['ciusuario'])){

    $rolSesion = isset($_SESSION['rol']) ? $_SESSION['rol'] : 'cliente';

    if($rolSesion=="Administrador"){

        header("Location: ../PAGINA/administradornuevo.php");

    }elseif($rolSesion=="Vendedor"){

        header("Location: ../nuevovendedor.php");

    }elseif($rolSesion=="cliente"){

        header("Location: ../PAGINA/maq_inicionuevo.php");{


    }
}
    exit();

}

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<title>Ingresar</title>


<style>

body{

    background:#eaf7ef;
    font-family:Arial, sans-serif;
    margin:0;

}


form{

    width:300px;
    margin:120px auto;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0px 5px 15px #b7d9c3;

}


h2{

    text-align:center;
    color:#2f6b4f;

}


label{

    color:#2f6b4f;
    font-weight:bold;

}


input[type="text"],
input[type="number"]{

    width:100%;
    padding:10px;
    margin:10px 0 15px 0;
    border:1px solid #9fd6b5;
    border-radius:8px;
    box-sizing:border-box;

}


input[type="submit"]{

    width:100%;
    padding:10px;
    background:#4caf7a;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;

}


input[type="submit"]:hover{

    background:#3b8f60;

}


p{

    color:#3b8f60;

}


a{

    color:#2f6b4f;

}

</style>


</head>


<body>


<form action="../PAGINA/uno.php" method="POST" id="contacto-form">


<h2>Iniciar sesión</h2>


<label for="Nombre">Nombre</label>

<input 
type="text" 
id="Nombre" 
name="Nombre" 
required>


<label for="CI">CI</label>

<input 
type="number" 
id="CI" 
name="CI" 
required>


<input type="submit" value="Ingresar">
<?php
echo "<a href='../PAGINA/maq_inicionuevo.php'>Volver</a>";
?>


</form>



<script>

$(function(){

    $("#contacto-form").validate({

        rules:{

            Nombre:{

                required:true,
                minlength:4

            },


            CI:{

                required:true,
                digits:true

            }

        },


        messages:{

            Nombre:{

                required:"El nombre es obligatorio",
                minlength:"Debe tener al menos 4 caracteres"

            },


            CI:{

                required:"El CI es obligatorio",
                digits:"Solo se permiten números"

            }

        }

    });


});

</script>


</body>

</html>