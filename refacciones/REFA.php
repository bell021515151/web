<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Refacciones</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "id22345702_hola";
$password = "Bellwhite_0";
$dbname = "id22345702_hola";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Calcular efectividad promedio de "OK"
function calculateAverageEffectiveness($conn) {
    $query = "SELECT COUNT(*) as total, SUM(CASE WHEN cinco_s = 'OK' THEN 1 ELSE 0 END) as ok_count FROM refacciones";
    $result = $conn->query($query);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['total'] > 0) {
            return ($row['ok_count'] / $row['total']) * 100;
        }
    }
    return 0;
}

// Obtener registros con al menos un campo "NG"
function getNGRecords($conn) {
    $query = "SELECT * FROM refacciones WHERE 
              cinco_s = 'NG' OR 
              refacciones_pasillos = 'NG' OR 
              accesorio_lugar_posicion = 'NG' OR 
              focos_funcionales = 'NG' OR 
              orden_ventanilla = 'NG' OR 
              exceso_polvo_anaqueles = 'NG' OR 
              precio_accesorio = 'NG' OR 
              accesorio_exhibicion = 'NG' OR 
              piso_epoxico = 'NG' OR 
              inventario_actualizado = 'NG' OR 
              partes_desensambladas = 'NG' OR 
              racks_ordenados = 'NG' OR 
              partes_fuera_estante = 'NG' OR 
              refacciones_inestables = 'NG' OR 
              racks_etiquetados = 'NG' OR 
              mostrador_limpio = 'NG' OR 
              objetos_mostrador = 'NG' OR 
              muros_paredes_mostrador = 'NG' OR 
              techo_mostrador = 'NG' OR 
              piso_mostrador = 'NG' OR 
              vidrios_ventanas = 'NG' OR 
              basura_piso = 'NG' OR 
              lamparas_fundidas = 'NG' OR 
              lamparas_danadas = 'NG' OR 
              ventanilla_ordenada = 'NG' OR 
              extintores_inspeccionados = 'NG'";
    return $conn->query($query);
}

$average_effectiveness = calculateAverageEffectiveness($conn);
$ng_records = getNGRecords($conn);
?>

<h2>Efectividad Promedio de "OK": <?php echo round($average_effectiveness, 2); ?>%</h2>
<canvas id="effectivenessChart" width="400" height="200"></canvas>

<script>
    const effectiveness = <?php echo json_encode($average_effectiveness); ?>;

    const ctx = document.getElementById('effectivenessChart').getContext('2d');
    const effectivenessChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Efectividad'],
            datasets: [{
                label: 'Porcentaje de OK',
                data: [effectiveness],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
</script>

<h2>Registros con 'NG'</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Número de Orden</th>
            <th>Cinco S</th>
            <th>Refacciones Pasillos</th>
            <th>Accesorio Lugar/Posición</th>
            <th>Focos Funcionales</th>
            <th>Orden Ventanilla</th>
            <th>Exceso de Polvo en Anaqueles</th>
            <th>Precio Accesorio</th>
            <th>Accesorio en Exhibición</th>
            <th>Piso Epóxico</th>
            <th>Inventario Actualizado</th>
            <th>Partes Desensambladas</th>
            <th>Racks Ordenados</th>
            <th>Partes Fuera de Estante</th>
            <th>Refacciones Inestables</th>
            <th>Racks Etiquetados</th>
            <th>Mostrador Limpio</th>
            <th>Objetos en Mostrador</th>
            <th>Muros/Paredes Mostrador</th>
            <th>Techo Mostrador</th>
            <th>Piso Mostrador</th>
            <th>Vidrios/Ventanas</th>
            <th>Basura en el Piso</th>
            <th>Lámparas Fundidas</th>
            <th>Lámparas Dañadas</th>
            <th>Ventanilla Ordenada</th>
            <th>Extintores Inspeccionados</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($ng_records->num_rows > 0): ?>
            <?php while($row = $ng_records->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['num_orden']; ?></td>
                    <td><?php echo $row['cinco_s']; ?></td>
                    <td><?php echo $row['refacciones_pasillos']; ?></td>
                    <td><?php echo $row['accesorio_lugar_posicion']; ?></td>
                    <td><?php echo $row['focos_funcionales']; ?></td>
                    <td><?php echo $row['orden_ventanilla']; ?></td>
                    <td><?php echo $row['exceso_polvo_anaqueles']; ?></td>
                    <td><?php echo $row['precio_accesorio']; ?></td>
                    <td><?php echo $row['accesorio_exhibicion']; ?></td>
                    <td><?php echo $row['piso_epoxico']; ?></td>
                    <td><?php echo $row['inventario_actualizado']; ?></td>
                    <td><?php echo $row['partes_desensambladas']; ?></td>
                    <td><?php echo $row['racks_ordenados']; ?></td>
                    <td><?php echo $row['partes_fuera_estante']; ?></td>
                    <td><?php echo $row['refacciones_inestables']; ?></td>
                    <td><?php echo $row['racks_etiquetados']; ?></td>
                    <td><?php echo $row['mostrador_limpio']; ?></td>
                    <td><?php echo $row['objetos_mostrador']; ?></td>
                    <td><?php echo $row['muros_paredes_mostrador']; ?></td>
                    <td><?php echo $row['techo_mostrador']; ?></td>
                    <td><?php echo $row['piso_mostrador']; ?></td>
                    <td><?php echo $row['vidrios_ventanas']; ?></td>
                    <td><?php echo $row['basura_piso']; ?></td>
                    <td><?php echo $row['lamparas_fundidas']; ?></td>
                    <td><?php echo $row['lamparas_danadas']; ?></td>
                    <td><?php echo $row['ventanilla_ordenada']; ?></td>
                    <td><?php echo $row['extintores_inspeccionados']; ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="28">No se encontraron registros con 'NG'</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php $conn->close(); ?>

</body>
</html>
