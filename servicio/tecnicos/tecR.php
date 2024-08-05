<?php
// Configuración de la conexión a la base de datos
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
        $fecha = $_POST['fecha'] ?? '';
        $fecha_rev_adpc = $_POST['fecha_rev_adpc'] ?? '';
        $tecnico = $_POST['tecnico'] ?? '';
        $numero_orden = $_POST['numero_orden'] ?? '';
        $hoes = $_POST['hoes'] ?? '';
        $him_llena_correctamente = $_POST['him_llena_correctamente'] ?? '';
        $wpd = $_POST['wpd'] ?? '';
        $equipo_seguridad = $_POST['equipo_seguridad'] ?? '';
        $protecciones_unidades = $_POST['protecciones_unidades'] ?? '';
        $separacion_residuos = $_POST['separacion_residuos'] ?? '';
        $s5 = $_POST['s5'] ?? '';
        $orden_herramienta = $_POST['orden_herramienta'] ?? '';
        $bernier = $_POST['bernier'] ?? '';
        $herramienta_piso = $_POST['herramienta_piso'] ?? '';
        $h_diagnostico = $_POST['h_diagnostico'] ?? '';
        $ticket_bateria = $_POST['ticket_bateria'] ?? '';

        

        // Preparar la consulta SQL para la inserción
        $sql_insert = "INSERT INTO tecnicos (fecha, fecha_rev_adpc, tecnico, numero_orden, hoes, him_llena_correctamente, wpd, equipo_seguridad, protecciones_unidades, separacion_residuos, s5, orden_herramienta, bernier, herramienta_piso, h_diagnostico, ticket_bateria) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql_insert);

        if ($stmt === false) {
            die("Error al preparar la consulta: " . $conn->error);
        }

        $stmt->bind_param("ssssssssssssssss", $fecha, $fecha_rev_adpc, $tecnico, $numero_orden, $hoes, $him_llena_correctamente, $wpd, $equipo_seguridad, $protecciones_unidades, $separacion_residuos, $s5, $orden_herramienta, $bernier, $herramienta_piso, $h_diagnostico, $ticket_bateria);

        if ($stmt->execute()) {
            echo "<p>Registro insertado correctamente.</p>";
        } else {
            echo "Error al insertar el registro: " . $stmt->error;
        }

        $stmt->close();
    } elseif (isset($_POST['delete'])) {
        $tecnico = $_POST['tecnico'] ?? '';

        // Utilizar una declaración preparada para la eliminación
        $sql_delete = "DELETE FROM tecnicos WHERE tecnico = ?";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bind_param("s", $tecnico);

        if ($stmt_delete->execute()) {
            echo "<p>Registros eliminados correctamente para el técnico: " . htmlspecialchars($tecnico) . ".</p>";
        } else {
            echo "Error al eliminar los registros: " . $stmt_delete->error;
        }

        $stmt_delete->close();
    }
}

// Función para contar valores OK y NG por técnico
function countOKNG($conn, $field_name, $tecnico) {
    $sql_count_ok = "SELECT COUNT(*) AS count_ok FROM tecnicos WHERE $field_name = 'ok' AND tecnico = ?";
    $sql_count_ng = "SELECT COUNT(*) AS count_ng FROM tecnicos WHERE $field_name = 'ng' AND tecnico = ?";

    $stmt_ok = $conn->prepare($sql_count_ok);
    $stmt_ok->bind_param("s", $tecnico);
    $stmt_ok->execute();
    $result_ok = $stmt_ok->get_result();
    $row_ok = $result_ok->fetch_assoc();
    $count_ok = $row_ok['count_ok'];

    $stmt_ng = $conn->prepare($sql_count_ng);
    $stmt_ng->bind_param("s", $tecnico);
    $stmt_ng->execute();
    $result_ng = $stmt_ng->get_result();
    $row_ng = $result_ng->fetch_assoc();
    $count_ng = $row_ng['count_ng'];

    return array($count_ok, $count_ng);
}

// Array de campos y sus descripciones
$fields = [
    'hoes' => "HOE's",
    'him_llena_correctamente' => 'HIM Llenar Correctamente',
    'wpd' => 'WPD',
    'equipo_seguridad' => 'Equipo de Seguridad',
    'protecciones_unidades' => 'Protecciones en Unidades',
    'separacion_residuos' => 'Separación de Residuos',
    's5' => "5's",
    'orden_herramienta' => 'Orden de Herramienta',
    'bernier' => 'Bernier',
    'herramienta_piso' => 'Herramienta en Piso',
    'h_diagnostico' => 'H. Diagnóstico',
    'ticket_bateria' => 'Ticket de Batería'
];

// Consulta SQL para obtener los datos registrados
$sql_select = "SELECT DISTINCT tecnico FROM tecnicos";
$result_tecnicos = $conn->query($sql_select);

$tecnicos = [];
$efectividades = [];
$ng_campos = [];
$efectividad_total = 0;
$contador_tecnicos = 0;

if ($result_tecnicos->num_rows > 0) {
    while ($tecnico_row = $result_tecnicos->fetch_assoc()) {
        $tecnico_nombre = $tecnico_row['tecnico'];

        $total_ok = 0;
        $total_ng = 0;
        $ng_campos_tecnico = [];

        foreach ($fields as $field => $description) {
            list($ok_count, $ng_count) = countOKNG($conn, $field, $tecnico_nombre);
            $total_ok += $ok_count;
            $total_ng += $ng_count;
            if ($ng_count > 0) {
                $ng_campos_tecnico[] = $description;
            }
        }

        // Calcular la efectividad
        $total_count = $total_ok + $total_ng;
        $efectividad = $total_count > 0 ? ($total_ok / $total_count) * 100 : 0;

        $tecnicos[] = $tecnico_nombre;
        $efectividades[] = round($efectividad, 2);
        $ng_campos[] = implode(', ', $ng_campos_tecnico);

        $efectividad_total += $efectividad;
        $contador_tecnicos++;
    }
} else {
    echo "<p>No hay datos registrados.</p>";
}

// Calcular el promedio de efectividad
$efectividad_promedio = $contador_tecnicos > 0 ? ($efectividad_total / $contador_tecnicos) : 0;

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Efectividad de Técnicos</title>
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
        <h2>Efectividad de Técnicos</h2>

        <!-- Mostrar gráfico de efectividad -->
        <div class="chart-container">
            <canvas id="myChart"></canvas>
        </div>

        <!-- Mostrar tabla de resultados -->
        <table>
            <thead>
                <tr>
                    <th>Técnico</th>
                    <th>Efectividad (%)</th>
                    <th>Campos NG</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($tecnicos); $i++): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($tecnicos[$i]); ?></td>
                        <td><?php echo htmlspecialchars($efectividades[$i]); ?></td>
                        <td><?php echo htmlspecialchars($ng_campos[$i]); ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Promedio de Efectividad</th>
                    <th colspan="2"><?php echo round($efectividad_promedio, 2); ?>%</th>
                </tr>
            </tfoot>
        </table>

        <!-- Formulario de eliminación de datos por técnico -->
        

    <script>
        // Datos para el gráfico
        const labels = <?php echo json_encode($tecnicos); ?>;
        const efectividades = <?php echo json_encode($efectividades); ?>;

        const data = {
            labels: labels,
            datasets: [{
                label: 'Efectividad (%)',
                data: efectividades,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Renderizar el gráfico
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>
</html>
