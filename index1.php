<?php

session_start();


?>
<!DOCTYPE html>
<html lang="es">

<head>



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <title>Mi Tienda</title>

    <link rel="stylesheet" href="css/estilos.css">



    <style>
img { 
    max-width: 500px; 
    min-height: 300px;
    
}
/* ==============================
   PRODUCTOS DEL CARRITO
============================== */

#contenidoCarrito {
    padding: 20px;
    max-height: calc(100vh - 180px);
    overflow-y: auto;
}

.productoCarrito {
    display: grid;
    grid-template-columns: 70px 1fr;
    gap: 10px;
    padding: 12px 0;
    border-bottom: 1px solid #d3dcd3;
}

.productoCarrito img {
    width: 70px;
    height: 70px ;
    min-height: 70px;
    max-width: 70px;
    object-fit: cover;
    border-radius: 8px;
}

.productoCarrito h3 {
    margin: 0 0 5px 0;
    font-size: 15px;
    color: #5f7d67;
}

.productoCarrito p {
    margin: 4px 0;
    font-size: 13px;
    color: #4f5f52;
}

body {

    margin: 0;
    font-family: Arial, sans-serif;
    background: #f8f6f0;
    color: #4f5f52;

}


/* ============================== 
CABECERA 
============================== */

header {

    background: #dfe8df;
    padding: 18px 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 2px 8px rgba(0,0,0,0.10);

}




.logo {

    font-size: 22px;
    font-weight: bold;
    color: #5f7d67;

}


.logo span {

    margin-left: 5px;

}





.busqueda input {

    width: 300px;
    padding: 11px 15px;
    border: 1px solid #b8c8b9;
    border-radius: 25px;
    outline: none;
    font-size: 14px;

}


.busqueda input:focus {

    border-color: #7d9b82;

}




#carritoIcono {
    font-size: 25px;
    cursor: pointer;
    color: #5f7d67;
    
}





#cantidadCarrito {

    background: #5f7d67;
    color: white;
    font-size: 12px;
    padding: 4px 7px;
    border-radius: 50%;

}


main {

    padding: 30px 50px;

}


.titulo {

    text-align: center;
    color: #5f7d67;
    margin-bottom: 30px;

}


#productos {

    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;

}


#generarPedido {

    display: block;
    margin: 30px auto;
    padding: 12px 25px;
    background: #5f7d67;
    color: white;
    border: none;
    border-radius: 25px;
    font-size: 15px;
    cursor: pointer;

}


#generarPedido:hover {

    background: #4d6855;
    transform: scale(1.03);

}
#consultarPedido {

    display: block;
    margin: 30px auto;
    padding: 12px 25px;
    background: #5f7d67;
    color: white;
    border: none;
    border-radius: 25px;
    font-size: 15px;
    cursor: pointer;

}

#consultarPedido:hover {

    background: #4d6855;
    transform: scale(1.03);

}


#fondo {

    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.4);
    z-index: 5;

}





#sidebar {
    position: fixed;
    top: 0;
    right: -350px;
    width: 350px;
    height: 100%;
    background: #f8f6f0;
    box-shadow: -3px 0 10px rgba(0,0,0,0.2);
    z-index: 10;
    transition: right 0.3s ease;
}


#sidebar.activo {
    right: 0;
}




.sidebarHeader {
    background: #dfe8df;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;

}


.sidebarHeader h2 {
    margin: 0;
    color: #5f7d67;

}


#cerrarCarrito {

    background: none;
    border: none;
    font-size: 20px;
    cursor: pointer;
    color: #5f7d67;

}

.sidebarFooter {

    position: absolute;
    bottom: 0;
    width: 100%;
    padding: 20px;
    box-sizing: border-box;
    background: #e8eee8;

}
#totalCarrito {

    color: #5f7d67;

}



#vaciarCarrito,
#comprar {

    padding: 10px 15px;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    margin-right: 5px;

}


#vaciarCarrito {

    background: #c9d5ca;
    color: #4f5f52;

}


#comprar {

    background: #5f7d67;
    color: white;

}


#vaciarCarrito:hover {

    background: #b7c6b8;

}


#comprar:hover {

    background: #4d6855;

}





.modal {

    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.45);
    z-index: 20;
    justify-content: center;
    align-items: center;

}





.modalContenido {

    width: 400px;
    background: #f8f6f0;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.25);

}


.modalContenido h2 {

    text-align: center;
    color: #5f7d67;
    margin-bottom: 25px;

}





.modalContenido input,
.modalContenido select {

    width: 100%;
    box-sizing: border-box;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #b8c8b9;
    border-radius: 8px;
    background: white;
    outline: none;

}


.modalContenido input:focus,
.modalContenido select:focus {

    border-color: #7d9b82;

}





.botonesModal {

    display: flex;
    justify-content: space-between;
    margin-top: 10px;

}


#confirmarPedido {

    background: #5f7d67;
    color: white;
    border: none;
    padding: 11px 18px;
    border-radius: 20px;
    cursor: pointer;

}


#cancelarCompra {

    background: #d3dcd3;
    color: #4f5f52;
    border: none;
    padding: 11px 18px;
    border-radius: 20px;
    cursor: pointer;

}


#confirmarPedido:hover {

    background: #4d6855;

}


#cancelarCompra:hover {

    background: #bcc8bd;

}
label.error {
    color: red;
    font-size: 12px;
    display: block;
    margin-top: -10px;
    margin-bottom: 10px;
}


    </style>

    <?php include __DIR__ . '/include/media.php'; ?>
</head>

<body>

    <!--================== CABECERA ==================-->

    <header>

        <div class="logo">

            🛍 <span>MI TIENDA</span>

        </div>

        <div class="busqueda">

            <input
                type="text"
                id="buscar"
                placeholder="Buscar producto...">

        </div>

        <div id="carritoIcono">

            🛒 <span id="cantidadCarrito">0</span>

        </div>

    </header>

    <!--================== PRODUCTOS ==================-->

    <main>

        <h2 class="titulo">
            Productos Disponibles
        </h2>

        <section id="productos">

        </section>

    </main>
    
   <button id="generarPedido">
        Generar Pedido
    </button>
     <button id="consultarPedido" type="button">
        Consultar Pedido
    </button>

    <script>
        $("#consultarPedido").click(function() {
            window.location.href = "consultar_pedido.php";
        });
    </script>
<!--================== FONDO OSCURO ==================-->

    <div id="fondo"></div>

    <!--================== SIDEBAR ==================-->

    <aside id="sidebar">

        <div class="sidebarHeader">

            <h2>🛒 Mi Carrito</h2>

            <button id="cerrarCarrito">✖</button>

        </div>

        <div id="contenidoCarrito">

        </div>

        <div class="sidebarFooter">

            <h3 id="totalCarrito">

                Total: Bs 0

            </h3>

            <button id="vaciarCarrito">

                Vaciar carrito

            </button>

            <button id="comprar">

                Comprar

            </button>

        </div>

    </aside>
 



<!--================== MODAL COMPRA ==================-->

<div id="modalCompra" class="modal">

    <div class="modalContenido">

        <h2>🛍 Finalizar Compra</h2>
        <form id="formCompra">

        <input type="text"
               id="nombre"
               name="nombre"
               placeholder="Nombre completo">

        <input type="text"
               id="telefono"
               name="telefono"
               placeholder="Teléfono">

        <input type="text"
               id="direccion"
               name="direccion"
               placeholder="Dirección">

        <select id="metodoPago" name="metodoPago">

            <option value="QR">Pago mediante QR</option>

            <option value="Efectivo">Pago en efectivo</option>

        </select>

        <div class="botonesModal">

            <button id="confirmarPedido">
        Confirmar Compra
        </button>

        

            <button id="cancelarCompra">
                Cancelar
            </button>

        </div>

    </div>

</div>



    
<script>

   $(function(){
    $("#formCompra").validate({
        rules: {
            nombre: { required: true, minlength: 3 },
            telefono: { required: true, digits: true },
            direccion: { required: true, minlength: 3 },
            metodoPago: { required: true }
        },
        messages: {
            nombre: {
                required: "El Nombre es obligatorio",
                minlength: "Debe tener al menos 3 caracteres validos"
            },
            telefono: {
                required: "El telefono es obligatorio",
                digits: "Solo se permiten números"
            },
            direccion: {
                required: "La direccion es obligatoria",
                minlength: "Debe tener al menos 3 caracteres"
            },
            metodoPago: {
                required: "El método de pago es obligatorio"
            }
        },
        submitHandler: function(form) {
           
            console.log("Formulario válido, procesando pedido...");
        }
    });
});
    



    
</script>




<script src="js/productos.js"></script>
<script src="js/pedido.js"></script>
<script src="js/carrito.js"></script>

</body>

</html> 