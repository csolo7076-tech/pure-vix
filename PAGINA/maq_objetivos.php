<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title></title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Poppins', sans-serif;
    background:#fdfaf6;
    color:#333;
}



header{
    height:55vh;

    background:
    linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)),
    url("https://i.pinimg.com/1200x/2c/9c/4f/2c9c4f4b986db6bb0db657bfecae6f39.jpg");

    background-size:cover;
    background-position:center;

    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;
}

.todo{
    color:white;
}

.todo h1{
    font-size:120px;
    letter-spacing:8px;
    margin-bottom:15px;
    text-shadow:0 5px 15px rgba(0,0,0,0.3);
}

.todo p{
    font-size:24px;
    font-weight:300;
}

.objetivos{
    padding:100px 8%;
}

.objetivos h2{
    text-align:center;
    font-size:60px;
    color:#c9a27c;
    margin-bottom:70px;
}

.contenedor{
    display:grid;

    grid-template-columns:
    repeat(auto-fit,minmax(300px,1fr));

    gap:40px;
}

.caja{
    background:white;

    padding:40px;

    border-radius:25px;

    box-shadow:
    0 10px 25px rgba(0,0,0,0.08);

    transition:0.4s;

    border-top:8px solid #d8b08c;
}

.caja:hover{
    transform:translateY(-10px);
}

.caja h3{
    color:#b88355;
    font-size:30px;
    margin-bottom:20px;
}

.caja p{
    color:#666;
    line-height:1.9;
    font-size:16px;
}

.misionvision{
    padding:20px 8% 100px;
}

.misionvision h2{
    text-align:center;
    font-size:60px;
    color:#c9a27c;
    margin-bottom:70px;
}





</style>
</head>

<body>
<?php
include("menu.php");
?>
<header>

    <div class="todo">

        <h1>PURE SKIN</h1>

        <p>
            Objetivos de nuestra marca
        </p>

    </div>

</header>

<section class="objetivos">

    <h2>Nuestros Objetivos</h2>

    <div class="contenedor">

        <div class="caja">

            <h3>Objetivo 1</h3>

            <p>
                Desarrollar productos de cuidado facial
                utilizando ingredientes naturales y seguros,
                garantizando beneficios reales y saludables
                para cada tipo de piel.
            </p>

        </div>

        <div class="caja">

            <h3>Objetivo 2</h3>

            <p>
                Promover el cuidado personal y el bienestar
                como parte de una rutina diaria, incentivando
                el amor propio y una piel saludable.
            </p>

        </div>

        <div class="caja">

            <h3>Objetivo 3</h3>

            <p>
                Fomentar prácticas sostenibles en la producción
                y el envasado, reduciendo el impacto ambiental
                y apoyando el consumo responsable.
            </p>

        </div>

    </div>

</section>

<section class="misionvision">

    <h2>Misión y Visión</h2>

    <div class="contenedor">

        <div class="caja">

            <h3>Misión</h3>

            <p>
                Ofrecemos productos faciales naturales y de alta calidad,
                hechos con ingredientes seguros y sostenibles, para nutrir
                y proteger la piel. Queremos brindar bienestar accesible
                y promover el amor propio a través del cuidado personal.
            </p>

        </div>

        <div class="caja">

            <h3>Visión</h3>

            <p>
                Ser una marca destacada por su compromiso con la salud de la piel
                y el medio ambiente, liderando el mercado de cuidado facial natural
                y ampliando nuestra línea de productos a nivel nacional e internacional
                con calidad y responsabilidad social.
            </p>

        </div>

    </div>

</section>

<?php
include("piedepagina.php");
?>
</body>
</html>
