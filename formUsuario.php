<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

    <title>Registrar Usuarios</title>
    <style>
        *{
            box-sizing: border-box;
        }
        body{
            background: #eef5ee;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 30px;
            color: #3f4f43;
        }
        h2 {
            text-align: center;
            color: #5f7d67;
            font-size: 30px;
            font-weight: bold;
            margin: 30px 0 25px 0;
        }
        form{
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0px 5px 18px rgba(0,0,0,0.10);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #4d6353;
        }
        input[type="number"],
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px 13px;
            border: 1px solid #d7dfd7;
            border-radius: 10px;
            outline: none;
            font-size: 16px;
            margin-bottom: 20px;
            margin-top: 5px;
            font-family: Arial, sans-serif;
            transition: 0.3s;
            background: white;
        }
        input[type="number"]:focus,
        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #5f7d67;
            background-color: white;
            box-shadow: 0 0 5px rgba(95,125,103,0.10);
        }
        input[type="submit"] {
            width: 100%;
            background-color: #5f7d67;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #4d6353;
        }
        label.error {
            color: red;
            font-size: 14px;
            font-weight: normal;
            margin-top: -15px;
            margin-bottom: 10px;
            display: block;
        }
        input.error {
            border: 1px solid red;
            background-color: #fde5e5;
        }
    </style>
</head>

<body>

    <h2>Registrar Usuarios</h2>

    <form action="registroUsuario.php" method="POST" id="usuario-form" novalidate>

        <label for="ci">Cédula:</label>
        <input type="number" id="ci" name="ci" required>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required>

        <label for="celular">Celular:</label>
        <input type="text" id="celular" name="celular" required>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>
        
        <input type="submit" value="Registrar">

    </form>

   <script>
$(function(){
    $("#usuario-form").validate({
        rules: {
            ci: {
                required: true,
                digits: true,
                minlength: 6,
                maxlength: 10
            },
            nombre: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            direccion: {
                required: true,
                minlength: 5,
                maxlength: 100
            },
            celular: {
                required: true,
                digits: true,
                minlength: 7,
                maxlength: 8
            },
            correo: {
                required: true,
                email: true
            },
            contrasena: {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            confirmar_contrasena: {
                required: true,
                equalTo: "#contrasena"
            }
        },
        messages: {
            ci: {
                required: "Por favor, ingrese el CI",
                digits: "El CI solo debe contener números",
                minlength: "El CI debe tener al menos 6 dígitos",
                maxlength: "El CI no debe superar los 10 dígitos"
            },
            nombre: {
                required: "Por favor, ingrese el nombre",
                minlength: "El nombre debe tener al menos 3 caracteres",
                maxlength: "El nombre no debe superar los 50 caracteres"
            },
            direccion: {
                required: "Por favor, ingrese la dirección",
                minlength: "La dirección debe tener al menos 5 caracteres",
                maxlength: "La dirección no debe superar los 100 caracteres"
            },
            celular: {
                required: "Por favor, ingrese el celular",
                digits: "Solo se permiten números",
                minlength: "El celular debe tener al menos 7 dígitos",
                maxlength: "El celular no debe superar los 8 dígitos"
            },
            correo: {
                required: "Por favor, ingrese su correo electrónico",
                email: "Ingrese un correo electrónico válido"
            },
            contrasena: {
                required: "Por favor, ingrese la contraseña",
                minlength: "La contraseña debe tener al menos 6 caracteres",
                maxlength: "La contraseña no debe superar los 20 caracteres"
            },
            confirmar_contrasena: {
                required: "Por favor, confirme la contraseña",
                equalTo: "Las contraseñas no coinciden"
            }
        }
    });
});
</script>
</body>
</html>