<?php

$archivo = 'mensajes.txt';
$publicado = false;


// Guardar mensaje si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $autor = trim($_POST['autor']);

    $contenido = trim($_POST['contenido']);

    $fecha = date("Y-m-d H:i:s");

    // Guardar: fecha | nombre: comentario
    $entrada = "$fecha | $autor: $contenido" . PHP_EOL;

    $f = fopen($archivo, 'a');

    fwrite($f, $entrada);

    fclose($f);

    $publicado = true;
 
}

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <title>Tablón de Publicaciones</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 40px 20px;
            background-color: #F7F4EF;
            color: #4A3B32;
        }

        .contenedor {
            max-width: 800px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #5D735A;
            font-size: 35px;
            margin-bottom: 10px;
        }

        .descripcion {
            text-align: center;
            color: #777;
            margin-bottom: 30px;
        }

        form {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        input,
        textarea {
            width: 100%;
            padding: 14px;
            border: 1px solid #D8D1C8;
            border-radius: 8px;
            font-size: 15px;
            font-family: Arial, sans-serif;
            outline: none;
            transition: 0.3s;
        }

        input:focus,
        textarea:focus {
            border-color: #5D735A;
            box-shadow: 0 0 5px rgba(93, 115, 90, 0.3);
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #5D735A;
            color: white;
            border: none;
            padding: 13px 30px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #465943;
            transform: translateY(-2px);
        }

        hr {
            border: none;
            border-top: 1px solid #D8D1C8;
            margin: 40px 0 30px;
        }

        h2 {
            color: #5D735A;
            font-size: 26px;
            margin-bottom: 20px;
        }

        /* ESTILOS DE LAS PUBLICACIONES */

        .post {
            background-color: white;
            margin-bottom: 15px;
            padding: 20px;
            border-left: 5px solid #5D735A;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
        }

        .fecha {
            font-size: 13px;
            color: #888;
            margin-bottom: 12px;
            padding-bottom: 8px;
            border-bottom: 1px solid #E5E5E5;
        }

        .autor {
            font-size: 18px;
            font-weight: bold;
            color: #5D735A;
            margin-bottom: 10px;
        }

        .contenido {
            font-size: 16px;
            color: #4A3B32;
            line-height: 1.6;
            word-wrap: break-word;
        }

        .sin-publicaciones {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            color: #777;
        }

    </style>

</head>

<body>

    <div class="contenedor">

        <h1>Tablón de Publicaciones</h1>

        <p class="descripcion">
            Comparte tus ideas y publica tus mensajes.
        </p>

        <form method="POST" id="formulario-comentarios">

            <input 
                type="text" 
                name="autor" 
                placeholder="Tu nombre" 
                required
            >

            <br><br>

            <textarea 
                name="contenido" 
                rows="4" 
                placeholder="Escribe algo..." 
                required
            ></textarea>

            <br><br>

            <button type="submit">Publicar</button>

        </form>

        <hr>

        <h2>Publicaciones</h2>

        <?php

        if (file_exists($archivo)) {

            $lineas = file(
                $archivo,
                FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
            );

            // Mostrar las publicaciones más recientes arriba
            $lineas = array_reverse($lineas);

            foreach ($lineas as $linea) {

                // Separar la fecha
                $partes = explode(" | ", $linea);

                $fecha = $partes[0];

                // Separar el nombre y el comentario
                $datos = explode(": ", $partes[1], 2);

                $autor = $datos[0];

                $contenido = $datos[1];

                echo '<div class="post">

                        <div class="fecha">
                            ' . htmlspecialchars($fecha) . '
                        </div>

                        <div class="autor">
                            ' . htmlspecialchars($autor) . '
                        </div>

                        <div class="contenido">
                            ' . htmlspecialchars($contenido) . '
                        </div>

                    </div>';

            }

        } else {

            echo '<p class="sin-publicaciones">
                    No hay publicaciones aún.
                  </p>';

        }

        ?>
        

    </div>
    <?php if ($publicado): ?>

<script>
Swal.fire({
    icon: "success",
    title: "¡Publicación realizada!",
    text: "Tu mensaje se publicó correctamente.",
    confirmButtonColor: "#5D735A"
});
</script>

<?php endif; ?>

</body>
<script>
$(function(){
    $("#formulario-comentarios").validate({
        rules: {
            autor: {
                required: true,
                minlength: 3
            },
            contenido: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            autor: {
                required: "Por favor, ingresa tu nombre",
                minlength: "El nombre debe tener al menos 3 caracteres"
            },
            contenido: {
                required: "Por favor, escribe un mensaje",
                minlength: "El mensaje debe tener al menos 5 caracteres"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});
</script>
</body>
</html>

</html>