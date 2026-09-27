function buscarProducto(){

/*envia  le dice javascript,ve al servidor y pide este archivo, el navegador llama a php sin recargar la pagina*/
fetch("productos.php")

/*recibe la respuesta en datos y json lo transforma a un objeto en javascript antes nombre:mouse despues producto.nombre*/
.then(respuesta => respuesta.json())


.then(datos => {

/*crea una variable vacia en html donde guardamos los datos obtenidos en html*/
let html="";

/*recorre el arreglo. producto es simplemente el nombre de una variable que tú eliges.es como la variable donde s guarda informacion del objeto*/
datos.forEach(producto => {


html += `

<h3>${producto.Nombre}</h3>


<p>
Descripción: ${producto.Descripcion}
</p>

<p>
Precio: Bs ${producto.Precio}
</p>

<p>
Stock: ${producto.Stock}
</p>

<hr>

`;


});

/*aqui le estamos diciendo que todo lo anterior lo pongamos en el div que se llama resultado con su id*/
document.getElementById("resultado")
.innerHTML = html;


});


}
