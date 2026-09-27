<?php
// Estilos responsivos para dispositivos móviles.
?>
<style>
@media screen and (max-width: 768px) {
    *, *::before, *::after {
        box-sizing: border-box;
    }

    html, body {
        width: 100%;
        max-width: 100%;
        overflow-x: hidden;
    }

    img, video, iframe {
        max-width: 100%;
        height: auto;
    }

    .container, .contenedor, main, section {
        width: 100%;
        max-width: 100%;
        padding-left: 15px;
        padding-right: 15px;
    }

    .row, nav, .navbar, .menu {
        display: flex;
        flex-wrap: wrap;
    }

    [class*="col-"], .col {
        width: 100%;
        max-width: 100%;
        flex: 0 0 100%;
    }

    table {
        display: block;
        width: 100%;
        overflow-x: auto;
    }

    input, select, textarea, button {
        max-width: 100%;
        font-size: 16px;
    }

    body {
        padding: 12px;
    }

    header {
        padding: 15px;
        flex-wrap: wrap;
        gap: 12px;
    }

    .logo {
        font-size: 18px;
    }

    .busqueda {
        order: 3;
        width: 100%;
    }

    .busqueda input {
        width: 100%;
        box-sizing: border-box;
    }

    main {
        padding-top: 20px;
        padding-bottom: 20px;
    }

    #productos {
        grid-template-columns: 1fr;
        gap: 18px;
    }

    img {
        min-height: 0;
    }

    #sidebar {
        width: 100%;
        right: -100%;
    }

    #sidebar.open,
    #sidebar.active,
    #sidebar.activo {
        right: 0;
    }

    .modalContenido {
        width: calc(100% - 30px);
        max-height: 90vh;
        overflow-y: auto;
        padding: 20px;
    }

    .botonesModal {
        flex-direction: column;
        gap: 10px;
    }

    #confirmarPedido,
    #cancelarCompra,
    #vaciarCarrito,
    #comprar {
        width: 100%;
        margin: 0;
    }

    .report-group {
        grid-template-columns: 1fr;
        gap: 16px;
        margin-bottom: 24px;
        justify-items: center;
    }

    .chart-wrap {
        width: 100%;
        max-width: none;
        height: 220px;
        margin-left: auto;
        margin-right: auto;
        justify-self: center;
    }

    table {
        white-space: nowrap;
        margin-left: auto;
        margin-right: auto;
    }

    th, td {
        padding: 6px;
    }

    h2 {
        font-size: 1.15rem;
    }
}
</style>