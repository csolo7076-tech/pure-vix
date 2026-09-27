<?php
session_start();

if (!isset($_SESSION['ciusuario']) || $_SESSION['rol'] != "Administrador") {
    header("Location: ../logueo/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

    <title>Registrar Usuario</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background: #eef5ee;
            margin: 0;
            padding: 30px;
        }

        form{
            width: 400px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,.1);
        }

        h2{
            text-align: center;
            color: #5f7d67;
        }

        label{
            display: block;
            margin-top: 12px;
            font-weight: bold;
            color: #5f7d67;
        }
        label.error{
            color: red;
            font-size: 13px;
            font-weight: normal;
            margin-top: 5px;
        }

        input,
        select{
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }

        input[type="submit"]{
            margin-top: 20px;
            background: #5f7d67;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover{
            background: #4f6a57;
        }

        .volver{
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #5f7d67;
        }
    </style>
</head>

<body>

<form action="UsuarioCreate.php" method="POST" id="usuario-form" novalidate>

    <h2>Registrar Usuario</h2>

    <label>Nombre</label>
    <input type="text" name="Nombre">

    <label>Cédula</label>
    <input type="text" name="ciusuario">

    <label>Dirección</label>
    <input type="text" name="Direccion">

    <label>Celular</label>
    <input type="text" name="Celular">

    <label>Rol</label>
    <select name="Rol">
        <option value="Cliente">Cliente</option>
        <option value="Vendedor">Vendedor</option>
        <option value="Administrador">Administrador</option>
    </select>

    <label>Estado</label>
    <select name="Estado">
        <option value="Activo">Activo</option>
        <option value="Inactivo">Inactivo</option>
    </select>

    <input type="submit" value="Registrar">

    <a class="volver" href="../PAGINA/administradornuevo.php">Volver</a>

</form>

<script>
$(function(){

    $("#usuario-form").validate({

        rules:{
            Nombre:{
                required:true,
                minlength:3
            },
            ciusuario:{
                required:true,
                digits:true
            },
            Direccion:{
                required:true
            },
            Celular:{
                required:true,
                digits:true,
                minlength:8,
                maxlength:8
            },
            Rol:{
                required:true
            },
            Estado:{
                required:true
            }
        },

        messages:{
            Nombre:{
                required:"Por favor, ingrese un nombre.",
                minlength:"El nombre debe tener al menos 3 caracteres."
            },
            ciusuario:{
                required:"Por favor, ingrese una cédula.",
                digits:"La cédula debe contener solo números."
            },
            Direccion:{
                required:"Por favor, ingrese una dirección."
            },
            Celular:{
                required:"Por favor, ingrese un número de celular.",
                digits:"El número de celular debe contener solo números.",
                minlength:"El celular debe tener 8 dígitos.",
                maxlength:"El celular debe tener 8 dígitos."
            },
            Rol:{
                required:"Por favor, seleccione un rol."
            },
            Estado:{
                required:"Por favor, seleccione un estado."
            }
        }
    });

});
</script>

</body>
</html>