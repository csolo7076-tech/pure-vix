<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pure Skin</title>

    <style>

body{
    background-color: #FAFBF7;
    margin: 0;
}





#tres{
    background-color: white;
    padding: 40px;
}

.cajasgeneral{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
}

.producto{
    background: white;
    width: 220px;
    padding: 45px;
    border-radius: 15px;
    box-shadow: 0 2px 8px black;
}

.producto img{
    width:100%;
    border-radius:8px;
}

h2{
    font-size:300%;
    text-align:center;
    margin-bottom:5%;
}

h3{
    color:#5D735A;
}

p{
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}

.boton{
    background:#8BA888;
    color:white;
    padding:10px 18px;
    border-radius:5px;
    text-decoration:none;
    display:inline-block;
}

footer h4{
    font-size:22px;
    margin-bottom:20px;
    color:white;
}

footer p{
    line-height:2;
}

    </style>

</head>

<body>



<?php include "../include/menu.php"; ?>

<section id="tres">

    <h2>NUESTROS PRODUCTOS ESTRELLA</h2>

    <div class="cajasgeneral">

        <div class="producto">
            <img src="../img/Arroz.webp" alt="Mascarilla de arroz">
            <h3>Mascarilla de arroz</h3>
            <p>Ayuda a suavizar e iluminar la piel.</p>
            <a href="maq_productos.php" class="boton">Ver productos</a>
        </div>

        <div class="producto">
            <img src="../img/miel.jpg" alt="Mascarilla de miel">
            <h3>Mascarilla de miel</h3>
            <p>Contribuye a mantener la hidratación.</p>
            <a href="maq_productos.php" class="boton">Ver productos</a>
        </div>

        <div class="producto">
            <img src="../img/avena.jpg" alt="Mascarilla de avena">
            <h3>Mascarilla de avena</h3>
            <p>Ofrece una limpieza suave y natural.</p>
            <a href="maq_productos.php" class="boton">Ver productos</a>
        </div>

    </div>

</section>
<?php
    include("../include/piedepagina.php");
    include("../include/media.php");
    ?>
</body>
</html>