<?php session_start(); ?>

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
    background:#f8f4f1;
}

.menu{
    width:230px;
    height:100vh;
    background:#c9a58b;
    position:fixed;
    padding-top:40px;
}

.menu h2{
    text-align:center;
    color:white;
    margin-bottom:40px;
    font-size:30px;
}

.menu ul{
    list-style:none;
}

.menu li{
    padding:18px 30px;
    color:white;
    cursor:pointer;
    transition:0.3s;
}

.menu li:hover{
    background:rgba(255,255,255,0.2);
}

.contenido{
    margin-left:230px;
    padding:40px;
}

.titulo{
    margin-bottom:40px;
}

.titulo h1{
    font-size:55px;
    color:#9d7155;
}

.titulo p{
    color:#7b6a5d;
    margin-top:10px;
}

.caja{
    background:white;

    padding:30px;

    border-radius:25px;

    box-shadow:
    0 10px 25px rgba(0,0,0,0.08);
}

.comprita{
    background:#f8f4f1;

    border-radius:20px;

    padding:15px;

    display:flex;

    align-items:center;

    gap:20px;

    margin-top:20px;
}

.comprita img{
    width:90px;
    height:90px;

    object-fit:cover;

    border-radius:15px;
}

.texto h3{
    color:#9d7155;
    margin-bottom:8px;
}

.texto p{
    color:#777;
    margin-bottom:10px;
}

.texto span{
    background:#c9a58b;
    color:white;

    padding:6px 14px;

    border-radius:20px;

    font-size:14px;
}

@media(max-width:768px){

    .menu{
        width:100%;
        height:auto;
        position:relative;
    }

    .contenido{
        margin-left:0;
    }

    .titulo h1{
        font-size:40px;
    }

    .comprita{
        flex-direction:column;
        text-align:center;
    }

}

</style>
</head>

<body>

<div class="menu">

    <h2>PURE SKIN</h2>

    <ul>
        <li><a href="../PAGINA/maq_nuevoinicio.php">Volver</a></li>
       
        
        
    </ul>

</div>

<div class="contenido">

    <div class="titulo">

        <h1>Mis Compras</h1>

        <p>
            Aquí puedes ver los productos
            que compraste recientemente.
        </p>

    </div>

    <div class="caja">

        <div class="comprita">

            <img src="https://i.pinimg.com/1200x/03/d0/f9/03d0f9a0df8c6f4e53ff26dc574c8b04.jpg">

            <div class="texto">

                <h3>Mascarilla de Arroz</h3>

                <p>Compra realizada el 15/05/2026</p>

                <span>10 Bs</span>

            </div>

        </div>

        <div class="comprita">

            <img src="https://i.pinimg.com/736x/21/d5/e9/21d5e9c54d9f293a16402948038446ea.jpg">

            <div class="texto">

                <h3>Aloe Vera</h3>

                <p>Compra realizada el 12/05/2026</p>

                <span>10 Bs</span>

            </div>

        </div>

        <div class="comprita">

            <img src="https://i.pinimg.com/736x/f3/f0/45/f3f045d02988681194c2fd019247ad2d.jpg">

            <div class="texto">

                <h3>Mascarilla de Miel</h3>

                <p>Compra realizada el 10/05/2026</p>

                <span>10 Bs</span>

            </div>

        </div>

    </div>

</div>



</body>
</html>