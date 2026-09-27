<!DOCTYPE html>

<html lang="es">

<head>

```
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Comentarios | Pure Skin</title>

<style>

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f8f6f0;
    }

    .contenedor {
        width: 90%;
        max-width: 800px;
        margin: 50px auto;
        background-color: white;
        padding: 35px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #5f7358;
        margin-bottom: 30px;
    }

    .comentarios {
        color: #555;
        line-height: 1.8;
        padding: 20px;
        background-color: #f8f6f0;
        border-radius: 10px;
    }

    .boton {
        display: block;
        width: 200px;
        margin: 30px auto 0;
        padding: 12px;
        text-align: center;
        background-color: #7f9475;
        color: white;
        text-decoration: none;
        border-radius: 8px;
    }

    .boton:hover {
        background-color: #5f7358;
    }

</style>
```

</head>

<body>

```
<div class="contenedor">

    <h1>Comentarios recibidos</h1>

    <div class="comentarios">

        <?php

        $a = fopen("ejemplo3.txt", "r");

        while (!feof($a)) {

            $leer = fgets($a);

            $ver = nl2br($leer);

            echo $ver;

        }

        fclose($a);

        ?>

    </div>

    <a class="boton" href="formulario_comentarios.php">
        Volver al formulario
    </a>

</div>
```

</body>

</html>
