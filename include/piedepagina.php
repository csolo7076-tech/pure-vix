<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">

<style>

html, body {
    height: 100%;
}

body {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    margin: 0;
}

main, .page-content {
    flex: 1;
}

footer {
    background-color: #5D735A;
    color: #FFFFFF;
    margin-top: auto;
    padding: 60px 50px 25px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 40px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    width: 100%;
    box-sizing: border-box;
}

/* COLUMNAS */

.footer-col {
    flex: 1;
    min-width: 230px;
    max-width: 350px;
}

/* TITULOS */

footer h4 {
    font-family: 'Playfair Display', serif;
    font-size: 23px;
    letter-spacing: 1px;
    margin-bottom: 18px;
    color: #FFFFFF;
    font-weight: 600;
}

/* TEXTO */

footer p {
    line-height: 1.8;
    font-size: 15px;
    color: #EAF0E7;
    margin: 0;
}

/* LINEA DECORATIVA */

.footer-col h4::after {
    content: "";
    display: block;
    width: 40px;
    height: 2px;
    background-color: #D8C7A3;
    margin-top: 10px;
}

/* REDES SOCIALES */

.social-links {
    display: flex;
    gap: 14px;
    margin-top: 20px;
}

/* BOTONES DE REDES */

.social-links a {
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;

    background-color: #F7EFE5;
    color: #5D735A;

    border-radius: 50%;
    text-decoration: none;

    font-size: 18px;
    font-weight: bold;

    transition: 0.3s;
}

/* EFECTO AL PASAR EL MOUSE */

.social-links a:hover {
    background-color: #D8C7A3;
    color: #3F513D;
    transform: translateY(-4px);
}

/* BOTON COMENTARIOS */

.comentarios-btn {
    display: inline-block;
    margin-top: 18px;
    padding: 12px 22px;

    background-color: #F7EFE5;
    color: #5D735A;

    text-decoration: none;
    border-radius: 25px;

    font-size: 14px;
    font-weight: 600;

    transition: 0.3s;
}

/* EFECTO DEL BOTON */

.comentarios-btn:hover {
    background-color: #D8C7A3;
    color: #3F513D;
    transform: translateY(-3px);
}

/* PARTE INFERIOR */

.footer-bottom {
    width: 100%;
    text-align: center;

    border-top: 1px solid rgba(255,255,255,0.25);

    padding-top: 20px;
    margin-top: 20px;
}

.footer-bottom p {
    font-size: 13px;
    color: #DDE6D9;
}


/* ADAPTACIÓN PARA CELULAR */

@media (max-width: 768px) {

    footer {
        padding: 45px 25px 20px;
        text-align: center;
    }

    .footer-col {
        max-width: 100%;
        width: 100%;
    }

    .footer-col h4::after {
        margin-left: auto;
        margin-right: auto;
    }

    .social-links {
        justify-content: center;
    }

}

</style>

<footer>

```
<!-- PURE SKIN -->

<div class="footer-col">

    <h4>PURE SKIN</h4>

    <p>
        Cosmética natural elaborada con ingredientes saludables 
        para cuidar y nutrir tu piel cada día de forma consciente.
    </p>

</div>


<!-- TIENDA -->

<div class="footer-col">

    <h4>Nuestra Tienda</h4>

    <p>
        Av. Uyuni - Cochabamba, Bolivia
        <br><br>
        Horario:
        <br>
        Lun - Sáb: 9:00 - 18:00
    </p>

</div>


<!-- CONTACTO -->

<div class="footer-col">

    <h4>Contáctanos</h4>

    <p>
        Síguenos en nuestras redes sociales 
        y comunícate directamente con nosotros.
    </p>

    <div class="social-links">

        <a href="https://wa.me/591XXXXXXXX"
           target="_blank"
           title="WhatsApp">
            W
        </a>

        <a href="https://instagram.com/pureskin"
           target="_blank"
           title="Instagram">
            I
        </a>

        <a href="https://facebook.com/pureskin"
           target="_blank"
           title="Facebook">
            F
        </a>

    </div>

</div>


<!-- COMENTARIOS -->

<div class="footer-col">

    <h4>Comentarios</h4>

    <p>
        Queremos conocer tu opinión.
        Déjanos un comentario sobre tu experiencia con Pure Skin.
    </p>

    <a href="../comentarios/formulario_comentarios.php" class="comentarios-btn">
        Ir a comentarios
    </a>

</div>


<!-- PARTE FINAL -->

<div class="footer-bottom">

    <p>
        &copy; 2026 PURE SKIN. Todos los derechos reservados.
        &nbsp; | &nbsp;
        Política de Privacidad
    </p>

</div>
```

</footer>
