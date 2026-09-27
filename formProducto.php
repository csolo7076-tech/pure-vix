<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <title>Document</title>
    <style>
        *{
            box-sizing: border-box;
        }
        body{
            background: #eef5ee;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 30px;
            color: #333;
        }
        body: before{
            content: "Registrar de Producto";
            display: block;
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
            box-shadow: 0px 5px 18px rgba(0,0,0,0.7);
        }
        form input[type="number"],
        form input[type="text"],
        form input[type="file"],
        form select{
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
        form input[type="number"]:focus,
        form input[type="text"]:focus,
        form input[type="file"]:focus,
        form select:focus{
            border-color: #5f7d67;
            box-shadow: 0 0 5px rgba(95,125,103,0.10);
        }
        form label{
            display: block;
            color: #555;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 5px;
        }
        form{
            font-size: 16px;
        }
        input[type="submit"]{
            width: 100%;
            background: #5f7d67;
            color: white;
            border: none;
            padding: 12px 17px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 5px;
        }
        input[type="submit"]:hover{
            background: #4d6855;
            transform: translateY(-2px);
        }
        label.error{
            color: #a44e4e;
            font-size: 14px;
            font-weight: normal;
            margin-top: -15px;
            margin-bottom: 10px;
        }
        input.error,
        select.error{
            border-color: #d45d5d;
        }
        @media (max-width: 600px){
            body{
                padding: 15px;
            }
            body:before{
                font-size: 24px;
                margin: 20px 0 20px 0;
            }
            form{
                padding: 25px;
            }
        }
    </style>
</head>
<body>
    <form action="registroProducto.php" method="POST" id="producto-form">

    Código:
    <input type="number" name="codigo"><br>

    Nombre:
    <input type="text" name="nombre"><br>

    Descripción:
    <input type="text" name="descripcion"><br>

    Precio:
    <input type="number" step="0.01" name="precio"><br>
    Stock:
    <input type="number" step="0.01" name="stock"><br>
 <label>Imagen</label>
    <input type="file" name="imagen" accept="image/*">

    <br><br>

    <label>Estado</label>
    <select name="estado">
        <option value="Activo">Activo</option>
        <option value="Desactivo">Desactivo</option>
    </select>

    <br><br>
    <input type="submit" value="Registrar">

</form>
<script>
$(function(){
    $("#producto-form").validate({
        rules: {
            codigo: {
                required: true,
                number: true
            },
            nombre: {
                required: true
            },
            descripcion: {
                required: true
            },
            precio: {
                required: true,
                number: true
            },
            stock: {
                required: true,
                number: true
            }
        },
        messages: {
            codigo: {
                required: "Por favor, ingrese el código del producto",
                number: "Por favor, ingrese un número válido"
            },
            nombre: {
                required: "Por favor, ingrese el nombre del producto"
            },
            descripcion: {
                required: "Por favor, ingrese la descripción del producto"
            },
            precio: {
                required: "Por favor, ingrese el precio del producto",
                number: "Por favor, ingrese un número válido"
            },
            stock: {
                required: "Por favor, ingrese el stock del producto",
                number: "Por favor, ingrese un número válido"
            }
        }
    });
});
</script>
</body>
</html>