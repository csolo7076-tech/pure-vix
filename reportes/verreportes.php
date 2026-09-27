<?php
session_start();

require_once("../php/conexion.php");

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != "Administrador") {
    header("Location: ../logueo/login.php");
    exit();
}

$fechas = [];
$ventas = [];
$semanas = [];
$ventasSemana = [];
$meses = [];
$ventasMes = [];
$anios = [];
$ventasAnio = [];

$sql = "SELECT Fecha, Estado, COUNT(*) AS cantidad
FROM Pedidos WHERE Estado = 'Aceptado'
GROUP BY Fecha, Estado
ORDER BY Fecha ASC;";

$resultado = $conn->query($sql);

if (!$resultado) {
    die("Error en la consulta: " . $conn->error);
}

while ($fila = $resultado->fetch_assoc()) {
    $fechas[] = $fila["Fecha"];
    $ventas[] = $fila["cantidad"];
}

$sql ="SELECT WEEK(Fecha) AS semana, COUNT(*) AS cantidad
FROM Pedidos WHERE Estado = 'Aceptado'
GROUP BY WEEK(Fecha)
ORDER BY semana ASC;";
$resultado = $conn->query($sql);

if (!$resultado) {
    die("Error en la consulta: " . $conn->error);
}

while ($fila = $resultado->fetch_assoc()) {
    $semanas[] = $fila["semana"];
    $ventasSemana[] = $fila["cantidad"];
}

$sql ="SELECT MONTH(Fecha) AS mes, COUNT(*) AS cantidad
FROM Pedidos WHERE Estado = 'Aceptado'
GROUP BY MONTH(Fecha)
ORDER BY mes ASC;";
$resultado = $conn->query($sql);
if (!$resultado) {
    die("Error en la consulta: " . $conn->error);
}

while ($fila = $resultado->fetch_assoc()) {
    $meses[] = $fila["mes"];
    $ventasMes[] = $fila["cantidad"];
    
}

$sql ="SELECT YEAR(Fecha) AS anio, COUNT(*) AS cantidad
FROM Pedidos WHERE Estado = 'Aceptado'
GROUP BY YEAR(Fecha)
ORDER BY anio ASC;";
$resultado = $conn->query($sql);

if (!$resultado) {
    die("Error en la consulta: " . $conn->error);
}

while ($fila = $resultado->fetch_assoc()) {
    $anios[] = $fila["anio"];
    $ventasAnio[] = $fila["cantidad"];
}

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ventas</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        
        body {
            margin: 0;
            padding: 24px;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            color: #1d1d1d;
        }

        .report-group {
            display: grid;
            grid-template-columns: minmax(320px, 1fr) minmax(320px, 1fr);
            gap: 24px;
            align-items: start;
            margin-bottom: 32px;
        }

        .chart-wrap {
            width: 100%;
            max-width: 420px;
            height: 250px;
            margin: 0 auto;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 12px;
            box-sizing: border-box;
        }

        table {
            border: 1px solid #251717;
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            background: #fff;
        }

        th, td {
            border: 1px solid #251717;
            padding: 8px;
        }

        h2 {
            margin: 0 0 12px;
            font-size: 1.4rem;
        }
    </style>
</head>

<body>

    <section class="report-group">
        <div>
            <h2>Lista de Ventas</h2>
            <div class="chart-wrap">
                <canvas id="graficoVentasDias"></canvas>
            </div>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($fechas)): ?>
                        <?php for ($i = 0; $i < count($fechas); $i++): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($fechas[$i]); ?></td>
                                <td><?php echo htmlspecialchars($ventas[$i]); ?></td>
                            </tr>
                        <?php endfor; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2">No hay datos</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section class="report-group">
        <div>
            <h2>Lista de Semana</h2>
            <div class="chart-wrap">
                <canvas id="graficoVentasSemana"></canvas>
            </div>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Semana</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($semanas)): ?>
                        <?php for ($i = 0; $i < count($semanas); $i++): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($semanas[$i]); ?></td>
                                <td><?php echo htmlspecialchars($ventasSemana[$i]); ?></td>
                            </tr>
                        <?php endfor; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2">No hay datos</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section class="report-group">
        <div>
            <h2>Lista de Mes</h2>
            <div class="chart-wrap">
                <canvas id="graficoVentasMes"></canvas>
            </div>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Mes</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($meses)): ?>
                        <?php for ($i = 0; $i < count($meses); $i++): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($meses[$i]); ?></td>
                                <td><?php echo htmlspecialchars($ventasMes[$i]); ?></td>
                            </tr>
                        <?php endfor; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2">No hay datos</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section class="report-group">
        <div>
            <h2>Lista de Año</h2>
            <div class="chart-wrap">
                <canvas id="graficoVentasAnio"></canvas>
            </div>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Año</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($anios)): ?>
                        <?php for ($i = 0; $i < count($anios); $i++): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($anios[$i]); ?></td>
                                <td><?php echo htmlspecialchars($ventasAnio[$i]); ?></td>
                            </tr>
                        <?php endfor; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2">No hay datos</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <script>
        
        const fechas = <?php echo json_encode($fechas); ?>;

        const ventas = <?php echo json_encode($ventas); ?>;
        
        const semanas = <?php echo json_encode($semanas); ?>;
        const ventasSemana = <?php echo json_encode($ventasSemana); ?>;

        const meses = <?php echo json_encode($meses); ?>;
        const ventasMes = <?php echo json_encode($ventasMes); ?>;

        const anios = <?php echo json_encode($anios); ?>;
        const ventasAnio = <?php echo json_encode($ventasAnio); ?>;
        
        const ctx1 = document.getElementById('graficoVentasDias');
        new Chart(ctx1 , {
            type: 'pie',
            data: {
                labels: fechas,
                datasets: [{
                    label: 'Totales de ventas',
                    data: ventas,
                }]
            }

        });
        const ctx2 = document.getElementById('graficoVentasSemana');

            new Chart(ctx2, {
            type: 'bar',
            data: {
            labels: semanas,
            datasets: [{
                label: 'Ventas por semana',
                data: ventasSemana,
                }]
             }
        });
        const ctx3 = document.getElementById('graficoVentasMes');

            new Chart(ctx3, {
            type: 'line',
            data: {
            labels: meses,
            datasets: [{
                label: 'Ventas por mes',
                data: ventasMes,
                }]
             }
        });
        
        const ctx4 = document.getElementById('graficoVentasAnio');
s
            new Chart(ctx4, {
            type: 'pie',
            data: {
            labels: anios,
            datasets: [{
                label: 'Ventas por año',
                data: ventasAnio,
                }]
             }
        });
        
        
    </script>
    <?php
    include("../include/piedepagina.php");
    include("../include/media.php");
    ?>
</body>


</html>
