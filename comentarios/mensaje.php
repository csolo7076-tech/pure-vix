<!DOCTYPE html>

<html lang="es">

<head>

```
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Mensaje | Pure Skin</title>

<style>

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f8f6f0;
    }

    .contenedor {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px;
    }

    .mensaje {
        width: 100%;
        max-width: 450px;
        background-color: white;
        padding: 40px;
        text-align: center;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #5f7358;
    }

    p {
        color: #555;
        font-size: 17px;
        margin-bottom: 25px;
    }

    a {
        display: inline-block;
        background-color: #7f9475;
        color: white;
        padding: 12px 25px;
        text-decoration: none;
        border-radius: 8px;
    }

    a:hover {
        background-color: #5f7358;
    }

</style>
```

</head>

<body>

```
<div class="contenedor">

    <div class="mensaje">

        <h1>¡Gracias por tu comentario!</h1>

        <p>Tu comentario fue guardado correctamente.</p>

        <?php

        $asu = $_POST["asunto"];
        $com = $_POST["come"];

        $archivo = fopen("ejemplo3.txt", "a");

        fwrite($archivo, "ASUNTO:" . PHP_EOL);
        fwrite($archivo, $asu . PHP_EOL);

        fwrite($archivo, "COMENTARIO:" . PHP_EOL);
        fwrite($archivo, $com . PHP_EOL);

        fwrite($archivo, PHP_EOL);

        fclose($archivo);

        ?>

        <a href="revisar2.php">Ir a comentarios</a>

    </div>

</div>
```

</body>

</html>
