<?php

session_start();
include("../PAGINA/conexion.php");

// Verificar que haya iniciado sesión
if (!isset($_SESSION['ciusuario'])) {
    header("Location: ../logueo/login.php");
    exit();
}

// Verificar que se haya recibido el C.I.
if (!isset($_GET['ciusuario']) || $_GET['ciusuario'] == "") {
    echo "No se recibió el C.I. del usuario.";
    exit();
}

$ciusuario = $_GET['ciusuario'];

// Si es administrador puede editar cualquier usuario.
// Si no es administrador, solamente puede editar su propio usuario.
if ($_SESSION['rol'] != "Administrador" && $ciusuario != $_SESSION['ciusuario']) {
    echo "No tienes permiso para editar este usuario.";
    exit();
}

// Consulta con sentencia preparada (evita inyección SQL)
$stmt = $conexion->prepare("SELECT * FROM usuario WHERE ciusuario = ?");
$stmt->bind_param("s", $ciusuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows == 0) {
    echo "El usuario no existe.";
    exit();
}

$usuario = $resultado->fetch_assoc();

$Nombre = $usuario['Nombre'];
$Direccion = $usuario['Direccion'];
$Celular = $usuario['Celular'];
$Rol = $usuario['Rol'];
$Estado = $usuario['Estado'];

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

    <title>Editar Usuario - Pure Skin</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f3ee;
            color: #3f4038;
        }

        .contenedor {
            width: 90%;
            max-width: 650px;
            margin: 50px auto;
        }

        .tarjeta {
            background-color: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .titulo {
            text-align: center;
            margin-bottom: 30px;
        }

        .titulo h1 {
            margin: 0;
            color: #5D735A;
            font-size: 30px;
        }

        .titulo p {
            margin-top: 8px;
            color: #777;
        }

        .grupo {
            margin-bottom: 20px;
        }

        .grupo label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #4A4A42;
        }

        .grupo input,
        .grupo select {
            width: 100%;
            padding: 12px;
            border: 1px solid #d6d6d6;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            background-color: white;
        }

        .grupo input:focus,
        .grupo select:focus {
            border-color: #5D735A;
        }

        .dato-ci {
            background-color: #eeeeeb;
            color: #666;
        }

        .botones {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .boton {
            flex: 1;
            padding: 13px;
            border: none;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            font-size: 15px;
            cursor: pointer;
        }

        .guardar {
            background-color: #5D735A;
            color: white;
        }

        .guardar:hover {
            background-color: #4d624b;
        }

        .cancelar {
            background-color: #e5e5e0;
            color: #444;
        }

        .cancelar:hover {
            background-color: #d8d8d2;
        }

        label.error {
            color: #a44e4e;
            font-size: 13px;
            font-weight: normal;
            display: block;
            margin-top: -14px;
            margin-bottom: 14px;
        }

        input.error {
            border-color: #d45d5d !important;
        }

    </style>

</head>

<body>

<div class="contenedor">

    <div class="tarjeta">

        <div class="titulo">
            <h1>Editar usuario</h1>
            <p>Modifica la información del usuario</p>
        </div>

        <form action="UsuarioUpdate.php" method="POST" id="usuario-form" novalidate>

            <!-- C.I. -->
            <div class="grupo">

                <label>C.I. del usuario</label>

                <input
                    type="text"
                    name="ciusuario"
                    value="<?php echo htmlspecialchars($ciusuario); ?>"
                    class="dato-ci"
                    readonly
                >

            </div>


            <!-- Nombre -->
            <div class="grupo">

                <label>Nombre completo</label>

                <input
                    type="text"
                    name="Nombre"
                    value="<?php echo htmlspecialchars($Nombre); ?>"
                >

            </div>


            <!-- Dirección -->
            <div class="grupo">

                <label>Dirección</label>

                <input
                    type="text"
                    name="Direccion"
                    value="<?php echo htmlspecialchars($Direccion); ?>"
                >

            </div>


            <!-- Celular -->
            <div class="grupo">

                <label>Celular</label>

                <input
                    type="text"
                    name="Celular"
                    value="<?php echo htmlspecialchars($Celular); ?>"
                >

            </div>


            <?php if ($_SESSION['rol'] == "Administrador") { ?>

                <!-- Rol -->
                <div class="grupo">

                    <label>Rol</label>

                    <select name="Rol">

                        <option value="Cliente"
                            <?php if ($Rol == "Cliente") echo "selected"; ?>>
                            Cliente
                        </option>

                        <option value="Vendedor"
                            <?php if ($Rol == "Vendedor") echo "selected"; ?>>
                            Vendedor
                        </option>

                        <option value="Administrador"
                            <?php if ($Rol == "Administrador") echo "selected"; ?>>
                            Administrador
                        </option>

                    </select>

                </div>


                <!-- Estado -->
                <div class="grupo">

                    <label>Estado</label>

                    <select name="Estado">

                        <option value="Activo"
                            <?php if ($Estado == "Activo") echo "selected"; ?>>
                            Activo
                        </option>

                        <option value="Inactivo"
                            <?php if ($Estado == "Inactivo") echo "selected"; ?>>
                            Inactivo
                        </option>

                    </select>

                </div>

            <?php } else { ?>

                <!-- Mantener rol y estado si no es administrador -->

                <input type="hidden" name="Rol" value="<?php echo htmlspecialchars($Rol); ?>">

                <input type="hidden" name="Estado" value="<?php echo htmlspecialchars($Estado); ?>">

            <?php } ?>


            <!-- Botones -->
            <div class="botones">

                
                    href="../PAGINA/administradornuevo.php#usuarios"
                    class="boton cancelar"
                >
                    Cancelar
                </a>

                <button
                    type="submit"
                    class="boton guardar"
                >
                    Guardar cambios
                </button>

            </div>

        </form>

    </div>

</div>

<script>

    $(function(){

        $("#usuario-form").validate({

            rules: {
                Nombre: {
                    required: true,
                    minlength: 3
                },
                Direccion: {
                    required: true
                },
                Celular: {
                    required: true,
                    digits: true,
                    minlength: 8,
                    maxlength: 8
                }
            },

            messages: {
                Nombre: {
                    required: "El nombre es obligatorio",
                    minlength: "El nombre debe tener al menos 3 caracteres"
                },
                Direccion: {
                    required: "La dirección es obligatoria"
                },
                Celular: {
                    required: "El celular es obligatorio",
                    digits: "El celular debe contener solo números",
                    minlength: "El celular debe tener 8 dígitos",
                    maxlength: "El celular debe tener 8 dígitos"
                }
            }

        });

    });

</script>
</body>

</html>