<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Registrar Producto</title>

    <style>

        body{
            font-family: Arial, sans-serif;
            background:#eef5ee;
            padding:40px;
        }

        form{
            width:400px;
            max-width:100%;
            margin:auto;
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,.1);
        }

        h2{
            text-align:center;
            color:#5f7d67;
        }

        label{
            display:block;
            margin-top:15px;
            color:#5f7d67;
            font-weight:bold;
        }

        input{
            width:100%;
            padding:10px;
            margin-top:5px;
            border:1px solid #ccc;
            border-radius:8px;
            box-sizing:border-box;
        }

        input[type="submit"]{
            margin-top:20px;
            background:#5f7d67;
            color:white;
            border:none;
            cursor:pointer;
        }

        input[type="submit"]:hover{
            background:#4f6a57;
        }

    </style>

</head>

<body>

<form action="ProductosCreate.php" method="POST" id="formularioProducto">

<h2>Registrar Producto</h2>

<label for="">Código</label>
<input type="number" name="CodigoProductos" required>


<label for="">Nombre</label>
<input type="text" name="Nombre" maxlength="100" required>


<label for="">Descripción</label>
<input type="text" name="Descripcion" maxlength="250" required>


<label for="">Precio</label>
<input type="number" name="Precio" min="0" step="0.01" required>


<label for="">Stock</label>
<input type="number" name="Stock" min="0" required>


<input type="submit" value="Registrar">

</form>


<script>
Swal.fire({
    icon: "success",
    title: "¡Publicación realizada!",
    text: "Tu mensaje se publicó correctamente.",
    confirmButtonColor: "#5D735A"
});
</script>


<script>
    $(function(){
        $("#formularioProducto").validate({
            rules:{
                CodigoProductos:{
                    required:true;
                    number:true;
                    min:0;
                    
                },
                Nombre:{
                    required:true;
                    minlength:2;
                    maxlength:100;
                },
                Descripcion:{
                    required:true;
                    minlength:10;
                    maxlength:250;
                },
                Precio:{
                    required:true;
                    number:true;
                    min:0;
                    step:0.01;
                },
                Stock:{
                    required:true;
                    number:true;
                    min:0;
                }
            }

            messages:{
                CodigoProductos:{
                    required:"Por favor, ingrese el código del producto.",
                    number:"El código debe ser un número.",
                    min:"El código no puede ser negativo."
                },
                Nombre:{
                    required:"Por favor, ingrese el nombre del producto.",
                    minlength:"El nombre debe tener al menos 2 caracteres.",
                    maxlength:"El nombre no puede exceder los 100 caracteres."
                },
                Descripcion:{
                    required:"Por favor, ingrese la descripción del producto.",
                    minlength:"La descripción debe tener al menos 10 caracteres.",
                    maxlength:"La descripción no puede exceder los 250 caracteres."
                },
                Precio:{
                    required:"Por favor, ingrese el precio del producto.",
                    number:"El precio debe ser un número.",
                    min:"El precio no puede ser negativo.",
                    step:"El precio debe ser un número válido con hasta dos decimales."
                },
                Stock:{
                    required:"Por favor, ingrese el stock del producto.",
                    number:"El stock debe ser un número.",
                    min:"El stock no puede ser negativo."
                }
            },
            submitHandler: function(form) {
            form.submit();
}
        })
    }
)
</script>

</body>

</html>
    
</script>

</body>

</html>