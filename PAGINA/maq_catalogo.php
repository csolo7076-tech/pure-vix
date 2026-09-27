<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        body{
            display: grid;
            grid-template-rows:  auto auto auto auto auto auto auto auto;
            grid-template-columns: 100%;
            grid-template-areas: 
            "cero"
            "uno"
            "dos"
            "tres"
            "cuatro"
            "cinco"
            "seis"
            "siete";
        }

        #cero{
            grid-area:cero;
        }

        #uno{
            grid-area: uno;
           

        }

        #dos{
            grid-area: dos;
            background-color: #5D735A;
            color: #5D735A;
            width: 7px;
            height: 85px;
        }

        #tres{
            grid-area: tres;
           
        }
        #cuatro{
            grid-area: cuatro;
            background-color: #5D735A;
            color: #5D735A;
            width: 7px;
            height: 85px;

        }
        #cinco{
            grid-area: cinco;

        }
        #seis{
            grid-area: seis;
            background-color: #5D735A;
            color: #5D735A;
            width: 7px;
            height: 85px;
        }
        #siete{
            grid-area: siete;
        }


        .productos{
           background: white;
    width: 100%;
    max-width: 320px;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 2px 8px black;
    overflow: hidden;
     
    
            
        }

        .cajageneral{
            display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px ;

        }

        h1{
            color: #385739;
        }

        h2{
            padding-left: 20px;
        }

        .productos img{
        border-radius:8px;
        width:100%;
    height:230px;
     object-fit:cover;
        }

        
    </style>
</head>
<body>

<section class="cero">
<?php
      include('../include/menu.php');
      ?>

</section>
    
    <section id="uno">
        <h1>NUESTRO CATÁLOGO DE PRODUCTOS</h1>
        </section>

    <section id="dos">
        <h2>Blanqueadoras Faciales</h2>

    </section>

    <section id="tres">
<div class="cajageneral">
        <div  class="productos">
            <img src="../img/Arroz.webp" alt="">
            <h3>Mascarilla de Arroz</h3>
            <p>sirve para...</p>
            <p>10bs</p>
              <form action="agregar_catalogo.php" method="POST">

    <input type="hidden" name="codigo" value="1">

    <button type="submit">
        Añadir al carrito
    </button>

</form>


        </div>
        

        
        <div class="productos">
            <img src="../img/avena.jpg" alt="">
            <h3>Mascarilla de Avena</h3>
            <p>sirve para</p>
            <p>10bs</p>
              <form action="agregar_catalogo.php" method="POST">

    <input type="hidden" name="codigo" value="2">

    <button type="submit">
        Añadir al carrito
    </button>

</form>
        </div>
</div>

    </section>

    <section id="cuatro">
        <h2>Hidratantes</h2>

    </section>

    <section id="cinco">
        <div class="cajageneral">
        <div class="productos">
            <img src="../img/aloevera.jpg" alt="">
            <h3>Mascarilla de Aloe Vera</h3>
            <p>sirve para</p>
            <p>10bs</p>
             <form action="agregar_catalogo.php" method="POST">

    <input type="hidden" name="codigo" value="4">

    <button type="submit">
        Añadir al carrito
    </button>

</form>
        
        </div>
        
        <div class="productos">
            <img src="../img/pepino.jpg" alt="">
            <h3>Mascarilla de Pepino</h3>
            <p>sirve para</p>
            <p>10bs</p>
            <form action="agregar_catalogo.php" method="POST">

    <input type="hidden" name="codigo" value="5">

    <button type="submit">
        Añadir al carrito
    </button>

</form>
        
        </div>
        </div>
    </section >

    <section id="seis">
        <h2>Mascarillas Naturales</h2>
    </section>

    
    <section id="siete">
        <div class="cajageneral">
        <div class="productos">
            <img src="../img/miel.jpg" alt="">
            <h3>Mascarilla de Miel</h3>
            <p>sirve para</p>
            <p>10bs</p>
              <form action="agregar_catalogo.php" method="POST">

    <input type="hidden" name="codigo" value="3">

    <button type="submit">
        Añadir al carrito
    </button>

</form>
            </div>
            
       
        <div class="productos">
            <img src="../img/cebolla.jpg" alt="">
            <h3>Mascarilla de Cebolla</h3>
            <p>sirve para</p>
            <p>10bs</p>
              <form action="agregar_catalogo.php" method="POST">

    <input type="hidden" name="codigo" value="6">

    <button type="submit">
        Añadir al carrito
    </button>

</form>
        </div>
        </div>

    </section>

    <?php
      include('../include/piedepagina.php');
      ?>
</body>
</html>