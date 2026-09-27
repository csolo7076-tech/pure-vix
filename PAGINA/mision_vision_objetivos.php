<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#f8f6f0;
   
}

.uno{
    
    
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;

    height:100vh;

    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;

    position:relative;


}
.uno h1{
font-size:70px;
font-family:'Playfair Display',serif;
color:white;
}

.uno a{
display:inline-block;
margin-top:40px;
padding:15px 40px;
background:#9CAF88;
color:white;
text-decoration:none;
border-radius:50px;
font-weight:600;
transition:.3s;
}

.uno a:hover{
background-image: url(fotoproductos.jpg);

background:#6b8f5d;
transform:translateY(-3px);

}
.dos{
    background:#f8f6f0;
    text-align:center;
    padding:50px 8%;
    
}

.dos h2{
    font-size:45px;
font-family:'Playfair Display',serif;
color:#355E3B;
}

.dos p{
    margin-top:20px;
color:#777;
}
.tres{
    grid-area: tres;
}

.cuatro{
    grid-area: cuatro;
}
.cajasgeneral{
            display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px ;

        }

.objetivo{
    background: white;
    width: 100%;
    max-width: 320px;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 2px 8px black;
    overflow: hidden;
}



.mision{
    background: white;
    width: 100%;
    max-width: 320px;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 2px 8px black;
    overflow: hidden;
}

.vision{
    background: white;
    width: 100%;
    max-width: 320px;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 2px 8px black;
    overflow: hidden;
}  

li{
   font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    font-size: 22px;
}

p{
    font-size: 22px;
}
    </style>
</head>
<body>
    <?php include "../include/menu.php"; ?>

    <section class="uno" >
        <h1>PURE SKIN</h1>

        <a href="#contenido">Conoce más!</a>
    </section>

    

    <section class="dos" id="contenido">
        <h2>MÁS SOBRE NOSOTROS</h2>
        <p>Entra y conoce sobre nuestro emprendimiento</p>
    </section>

    <section class="tres">
        
        <div class="cajasgeneral">
            <div class="objetivo">
        <h3>OBJETIVOS</h3>
        <ul>
            <li>Desarrollar productos de cuidado facial utilizando ingredientes naturales y seguros, garantizando beneficios reales y saludables para cada tipo de piel.</li> <br>
        <li>Promover el cuidado personal y el bienestar como parte de una rutina diaria, incentivando el amor propio y una piel saludable.</li> <br>
        <li>Fomentar prácticas sostenibles en la producción y el envasado, reduciendo el impacto ambiental y apoyando el consumo responsable.</li> <br>
        </ul>
    </div>


    <div class="mision">
        <h3>MISIÓN</h3>
        <p>Ofrecemos productos faciales naturales y de alta calidad, hechos con ingredientes seguros y sostenibles, para nutrir y proteger la piel. Queremos brindar bienestar accesible y promover el amor propio a través del cuidado personal.</p>
    </div>


    <div class="vision">
        <h3>VISIÓN</h3>
        <p>Ser una marca destacada por su compromiso con la salud de la piel y el medio ambiente, liderando el mercado de cuidado facial natural y ampliando nuestra línea de productos a nivel nacional e internacional con calidad y responsabilidad social.</p>
    </div>

</div>

    </section>
    

    <?php include "../include/piedepagina.php"; ?>
</body>
</html>