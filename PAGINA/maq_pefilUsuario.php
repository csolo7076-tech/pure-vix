<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <style>

        body{
            font-family: Arial;
            background-color: #eef5ee;
            margin: 0;
        }

        header{
            background-color: #a8c3a0;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .contenedor{
            width: 400px;
            background-color: white;
            margin: 40px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        h2{
            text-align: center;
            color: #7da37a;
            margin-bottom: 25px;
        }

        label{
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        input{
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }

        .boton{
            width: 100%;
            background-color: #8fb38a;
            color: white;
            border: none;
            padding: 12px;
            margin-top: 25px;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
        }

        .btn:hover{
            background-color: #7da37a;
        }

    </style>

</head>
<body>

    <header>
        <h1>Pure Skin</h1>
        <p>Editar Perfil del Vendedor</p>
    </header>

    <div class="contenedor">

        <h2>Actualizar Información</h2>

        <form>

            <label>Editar Nombre</label>
            <input type="text" placeholder="Ingresa tu nombre">

            <label>ID de Vendedor</label>
            <input type="text" placeholder="ID del vendedor">

            <label>Nombre Completo</label>
            <input type="text" placeholder="Nombre completo">

            <label>Correo Electrónico</label>
            <input type="email" placeholder="correo@gmail.com">

            <label>Número de Teléfono</label>
            <input type="tel" placeholder="70000000">

            <label>Ciudad</label>
            <input type="text" placeholder="Ciudad">

            <label>Contraseña</label>
            <input type="password" placeholder="********">

            <button class="boton">Actualizar</button>

        </form>

    </div>

</body>
</html>