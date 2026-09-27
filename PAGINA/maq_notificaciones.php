<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title></title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Poppins', sans-serif;

    height:100vh;

    background:
    linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)),
    url("https://i.pinimg.com/736x/76/46/87/7646872b4a1b0f1d29f09d52c6a56d4d.jpg");

    background-size:cover;
    background-position:center;

    display:flex;
    justify-content:center;
    align-items:center;
}

.caja{

    width:400px;

    background:rgba(255,255,255,0.2);

    backdrop-filter:blur(10px);

    padding:40px;

    border-radius:25px;

    text-align:center;

    color:white;

    box-shadow:
    0 10px 25px rgba(0,0,0,0.2);
}



.caja h1{
    margin-bottom:15px;
    font-size:40px;
}

.caja p{
    font-size:18px;
    line-height:1.7;
    margin-bottom:30px;
}

.volver{
    text-decoration:none;

    background:#d8b8a0;

    color:white;

    padding:12px 30px;

    border-radius:30px;

    transition:0.3s;
}

.volver:hover{
    background:#c59b7f;
}

</style>
</head>

<body>

<div class="caja">

    

    <h1>Notificaciones</h1>

    <p>
        Aún no tienes notificaciones.
    </p>

    <a href="maq_clientes.html">Volver</a>
</div>

</body>
</html>