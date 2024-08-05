<?php

$servername = "localhost";
$username = "id22345702_hola";
$password = "Bellwhite_0";
$dbname = "id22345702_hola";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesamiento del formulario cuando se envía por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        // Obtener los datos del formulario
        $nombre_trabajador = $_POST['nombre_trabajador'];
        $fecha = $_POST['fecha'];
        $area_trabajo_limpieza = $_POST['area_trabajo_limpieza'];
        $area_trabajo_orden = $_POST['area_trabajo_orden'];
        $uso_equipo_seguridad = $_POST['uso_equipo_seguridad'];
        $uniforme = $_POST['uniforme'];
        $protectores_unidad = $_POST['protectores_unidad'];
        $uso_correcto_herramienta = $_POST['uso_correcto_herramienta'];
        $bote_basura = $_POST['bote_basura'];
        $alimento_area_trabajo = $_POST['alimento_area_trabajo'];
        $polvo_paredes_polines = $_POST['polvo_paredes_polines'];
        $joyeria = $_POST['joyeria'];
        $almacenamiento_herramienta = $_POST['almacenamiento_herramienta'];
        $extintores = $_POST['extintores'];
        $material_limpieza = $_POST['material_limpieza'];

        // Mostrar datos para depuración
       

        // Preparar la consulta SQL para la inserción
        $sql_insert = "INSERT INTO hyp (nombre_trabajador, fecha, area_trabajo_limpieza, area_trabajo_orden, uso_equipo_seguridad, uniforme, protectores_unidad, uso_correcto_herramienta, bote_basura, alimento_area_trabajo, polvo_paredes_polines, joyeria, almacenamiento_herramienta, extintores, material_limpieza) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql_insert);

        if ($stmt === false) {
            die("Error al preparar la consulta: " . $conn->error);
        }

        $stmt->bind_param("sssssssssssssss", $nombre_trabajador, $fecha, $area_trabajo_limpieza, $area_trabajo_orden, $uso_equipo_seguridad, $uniforme, $protectores_unidad, $uso_correcto_herramienta, $bote_basura, $alimento_area_trabajo, $polvo_paredes_polines, $joyeria, $almacenamiento_herramienta, $extintores, $material_limpieza);

        if ($stmt->execute()) {
            echo "<p>Registro insertado correctamente.</p>";
        } else {
            echo "Error al insertar el registro: " . $stmt->error;
        }

        $stmt->close();
    } elseif (isset($_POST['delete'])) {
        $nombre_trabajador = $_POST['nombre_trabajador'];

        // Utilizar una declaración preparada para la eliminación
        $sql_delete = "DELETE FROM hyp WHERE nombre_trabajador = ?";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bind_param("s", $nombre_trabajador);

        if ($stmt_delete->execute()) {
            echo "<p>Registros eliminados correctamente para el trabajador: " . htmlspecialchars($nombre_trabajador) . ".</p>";
        } else {
            echo "Error al eliminar los registros: " . $stmt_delete->error;
        }

        $stmt_delete->close();
    }
}

// Función para contar valores OK y NG por trabajador
function countOKNG($conn, $field_name, $trabajador) {
    $sql_count_ok = "SELECT COUNT(*) AS count_ok FROM hyp WHERE $field_name = 'ok' AND nombre_trabajador = ?";
    $sql_count_ng = "SELECT COUNT(*) AS count_ng FROM hyp WHERE $field_name = 'ng' AND nombre_trabajador = ?";

    $stmt_ok = $conn->prepare($sql_count_ok);
    $stmt_ok->bind_param("s", $trabajador);
    $stmt_ok->execute();
    $result_ok = $stmt_ok->get_result();
    $row_ok = $result_ok->fetch_assoc();
    $count_ok = $row_ok['count_ok'];

    $stmt_ng = $conn->prepare($sql_count_ng);
    $stmt_ng->bind_param("s", $trabajador);
    $stmt_ng->execute();
    $result_ng = $stmt_ng->get_result();
    $row_ng = $result_ng->fetch_assoc();
    $count_ng = $row_ng['count_ng'];

    return array($count_ok, $count_ng);
}

// Array de campos y sus descripciones
$fields = [
    'area_trabajo_limpieza' => 'Area de trabajo (limpieza)',
    'area_trabajo_orden' => 'Area de trabajo (orden)',
    'uso_equipo_seguridad' => 'Uso de equipo de seguridad',
    'uniforme' => 'Uniforme',
    'protectores_unidad' => 'Protectores de la unidad',
    'uso_correcto_herramienta' => 'Uso correcto de la herramienta',
    'bote_basura' => 'Bote de basura',
    'alimento_area_trabajo' => 'Alimento en área de trabajo',
    'polvo_paredes_polines' => 'Polvo en paredes y polines',
    'joyeria' => 'Joyería',
    'almacenamiento_herramienta' => 'Almacenamiento de la herramienta',
    'extintores' => 'Extintores',
    'material_limpieza' => 'Material de limpieza'
];

// Consulta SQL para obtener los datos registrados
$sql_select = "SELECT DISTINCT nombre_trabajador FROM hyp";
$result_trabajadores = $conn->query($sql_select);

$trabajadores = [];
$efectividades = [];
$ng_campos = [];
$efectividad_total = 0;
$contador_trabajadores = 0;

if ($result_trabajadores->num_rows > 0) {
    while ($trabajador_row = $result_trabajadores->fetch_assoc()) {
        $trabajador_nombre = $trabajador_row['nombre_trabajador'];

        $total_ok = 0;
        $total_ng = 0;
        $ng_campos_trabajador = [];

        foreach ($fields as $field => $description) {
            list($ok_count, $ng_count) = countOKNG($conn, $field, $trabajador_nombre);
            $total_ok += $ok_count;
            $total_ng += $ng_count;
            if ($ng_count > 0) {
                $ng_campos_trabajador[] = $description;
            }
        }

        // Calcular la efectividad
        $total_count = $total_ok + $total_ng;
        $efectividad = $total_count > 0 ? ($total_ok / $total_count) * 100 : 0;

        $trabajadores[] = $trabajador_nombre;
        $efectividades[] = round($efectividad, 2);
        $ng_campos[] = implode(', ', $ng_campos_trabajador);

        $efectividad_total += $efectividad;
        $contador_trabajadores++;
    }
} else {
    echo "<p>No hay datos registrados.</p>";
}

// Calcular el promedio de efectividad
$efectividad_promedio = $contador_trabajadores > 0 ? ($efectividad_total / $contador_trabajadores) : 0;

// Cerrar la conexión
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Efectividad de Trabajadores</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
        }
        .chart-container {
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .delete-form {
            display: inline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Efectividad de Trabajadores</h2>

        <!-- Mostrar gráfico de efectividad -->
        <div class="chart-container">
            <canvas id="myChart"></canvas>
        </div>

        <!-- Mostrar tabla de resultados -->
        <table>
            <thead>
                <tr>
                    <th>Trabajador</th>
                    <th>Efectividad (%)</th>
                    <th>Campos NG</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($trabajadores); $i++): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($trabajadores[$i]); ?></td>
                        <td><?php echo htmlspecialchars($efectividades[$i]); ?>%</td>
                        <td><?php echo htmlspecialchars($ng_campos[$i]); ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>

        <p><strong>Efectividad Promedio: <?php echo round($efectividad_promedio, 2); ?>%</strong></p>

        <!-- Formulario para eliminar registros -->

    </div>

    <!-- Script para el gráfico -->
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($trabajadores); ?>,
                datasets: [{
                    label: 'Efectividad (%)',
                    data: <?php echo json_encode($efectividades); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMax: 100
                    }
                }
            }
        });
    </script>
</body>
</html>
