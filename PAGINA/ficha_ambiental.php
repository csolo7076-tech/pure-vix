<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ficha Ambiental</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7f2;
            color: #333;
        }

      

        .uno {
            min-height: 75vh;

            background:
                linear-gradient(
                    rgba(35, 70, 45, 0.75),
                    rgba(35, 70, 45, 0.75)
                );

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            text-align: center;

            padding: 40px 20px;
        }

        .uno h1 {
            font-size: 65px;
            margin: 0;

            color: white;

            font-family: Georgia, 'Times New Roman', serif;

            letter-spacing: 3px;
        }

        .uno p {
            max-width: 750px;

            color: #e8f1e8;

            font-size: 21px;

            line-height: 1.6;

            margin-top: 25px;
        }

        .uno a {
            display: inline-block;

            margin-top: 30px;

            padding: 15px 40px;

            background: #8aaa72;

            color: white;

            text-decoration: none;

            border-radius: 50px;

            font-weight: bold;

            transition: 0.3s;
        }

        .uno a:hover {
            background: #668c53;

            transform: translateY(-3px);
        }


        

        .dos {
            background: #f4f7f2;

            text-align: center;

            padding: 70px 8% 40px;
        }

        .dos h2 {
            font-size: 42px;

            color: #355e3b;

            font-family: Georgia, 'Times New Roman', serif;

            margin-bottom: 20px;
        }

        .dos p {
            max-width: 750px;

            margin: auto;

            color: #666;

            font-size: 19px;

            line-height: 1.7;
        }


       

        .contenido {
            display: flex;

            justify-content: center;

            padding: 30px 8% 80px;
        }

        .ficha {
            background: white;

            width: 100%;

            max-width: 850px;

            padding: 50px;

            border-radius: 20px;

            box-shadow:
                0 5px 20px rgba(0, 0, 0, 0.12);

            text-align: center;
        }

        .ficha h3 {
            color: #355e3b;

            font-size: 30px;

            margin-top: 0;

            margin-bottom: 20px;
        }

        .ficha p {
            color: #666;

            font-size: 18px;

            line-height: 1.8;
        }



        .boton-ficha {
            display: inline-block;

            margin-top: 25px;

            padding: 15px 38px;

            background: #355e3b;

            color: white;

            text-decoration: none;

            border-radius: 50px;

            font-weight: bold;

            transition: 0.3s;
        }

        .boton-ficha:hover {
            background: #24452b;

            transform: translateY(-3px);
        }


        

        @media (max-width: 700px) {

            .uno {
                min-height: 70vh;
            }

            .uno h1 {
                font-size: 45px;
            }

            .uno p {
                font-size: 18px;
            }

            .dos h2 {
                font-size: 32px;
            }

            .dos p {
                font-size: 17px;
            }

            .ficha {
                padding: 30px 20px;
            }

            .ficha h3 {
                font-size: 25px;
            }

            .ficha p {
                font-size: 17px;
            }

        }

    </style>

</head>


<body>


    

    <?php include "../include/menu.php"; ?>


    

    <section class="uno">

        <h1>FICHA AMBIENTAL</h1>

        <p>
            Conoce la información ambiental de nuestro proyecto,
            sus características, los posibles impactos y las medidas
            propuestas para contribuir al cuidado y protección
            del medio ambiente.
        </p>

        <a href="#contenido">
            Conoce más
        </a>

    </section>




    <section class="dos" id="contenido">

        <h2>NUESTRA FICHA AMBIENTAL</h2>

        <p>
            La ficha ambiental contiene información relacionada con
            nuestro proyecto y su interacción con el entorno. En ella
            se presentan aspectos ambientales, posibles impactos y
            acciones orientadas a una gestión responsable y sostenible.
        </p>

    </section>


    


    <section class="contenido">

        <div class="ficha">

            <h3>
                Conoce más sobre nuestra ficha ambiental
            </h3>

            <p>
                Te invitamos a revisar nuestra ficha ambiental para
                conocer con mayor detalle las características del
                proyecto, los aspectos relacionados con el medio
                ambiente y las medidas consideradas para reducir
                posibles impactos.
            </p>


          

            <a
                href="../ficha_ambiental.pdf"
                target="_blank"
                class="boton-ficha">

                🌱 Abrir ficha ambiental

            </a>

        </div>

    </section>


  

    <?php include "../include/piedepagina.php"; ?>


</body>

</html>
