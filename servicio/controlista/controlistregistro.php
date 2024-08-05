<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "id22345702_hola";
$password = "Bellwhite_0";
$dbname = "id22345702_hola";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Manejo del formulario para agregar un registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Recoge y limpia los datos del formulario y convierte a minúsculas
    $fecha_rev_adpc = $conn->real_escape_string($_POST["fecha_rev_adpc"]);
    $cinco_s = strtolower($conn->real_escape_string($_POST["cinco_s"]));
    $tablero_control_trabajo = strtolower($conn->real_escape_string($_POST["tablero_control_trabajo"]));
    $asegurar_hora_promesa = strtolower($conn->real_escape_string($_POST["asegurar_hora_promesa"]));
    $notificar_desviacion = strtolower($conn->real_escape_string($_POST["notificar_desviacion"]));
    $productividad_eficiencia = strtolower($conn->real_escape_string($_POST["productividad_eficiencia"]));
    $inventarios_hes_actualizado = strtolower($conn->real_escape_string($_POST["inventarios_hes_actualizado"]));
    $mtto_preventivo = strtolower($conn->real_escape_string($_POST["mtto_preventivo"]));
    $equipos_aire_acondicionado = strtolower($conn->real_escape_string($_POST["equipos_aire_acondicionado"]));
    $signal_tech_ii = strtolower($conn->real_escape_string($_POST["signal_tech_ii"]));
    $consul_actualizado_windows = strtolower($conn->real_escape_string($_POST["consul_actualizado_windows"]));
    $herramientas_frontier = strtolower($conn->real_escape_string($_POST["herramientas_frontier"]));
    $herramientas_epower = strtolower($conn->real_escape_string($_POST["herramientas_epower"]));

    // Inserta el nuevo registro en la base de datos
    $sql = "INSERT INTO controlista (fecha_rev_adpc, cinco_s, tablero_control_trabajo, asegurar_hora_promesa, notificar_desviacion, productividad_eficiencia, inventarios_hes_actualizado, mtto_preventivo, equipos_aire_acondicionado, signal_tech_ii, consul_actualizado_windows, herramientas_frontier, herramientas_epower)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssss", $fecha_rev_adpc, $cinco_s, $tablero_control_trabajo, $asegurar_hora_promesa, $notificar_desviacion, $productividad_eficiencia, $inventarios_hes_actualizado, $mtto_preventivo, $equipos_aire_acondicionado, $signal_tech_ii, $consul_actualizado_windows, $herramientas_frontier, $herramientas_epower);

    if ($stmt->execute()) {
        echo "Registro agregado correctamente.";
    } else {
        echo "Error al agregar el registro: " . $conn->error;
    }

    $stmt->close();
}

// Manejo del formulario para eliminar un registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $delete_id = $_POST["delete_id"];

    // Asegúrate de escapar y validar el ID
    $delete_id = $conn->real_escape_string($delete_id);

    // Elimina el registro con el ID proporcionado
    $sql = "DELETE FROM controlista WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }

    $stmt->close();
}

// Consulta para obtener los registros
$sql = "SELECT * FROM controlista";
$result = $conn->query($sql);

$total_records = $result->num_rows;
$ng_count = 0;

// Calcular el porcentaje de efectividad general
$total_fields = 0; // Total de campos evaluados en todos los registros
$ng_fields_total = 0; // Total de campos con 'NG' en todos los registros

if ($total_records > 0) {
    while ($row = $result->fetch_assoc()) {
        $ng_fields = []; // Array para almacenar campos con 'NG'
        $fields_count = 0; // Total de campos evaluados en el registro actual
        foreach ($row as $key => $value) {
            if ($key != 'id' && $key != 'fecha_rev_adpc') {
                $fields_count++;
                if (strtolower($value) === 'ng') {
                    $ng_fields[] = $key;
                }
            }
        }

        if (!empty($ng_fields)) {
            $ng_count++;
        }

        $total_fields += $fields_count;
        $ng_fields_total += count($ng_fields);
    }

    // Calcular porcentaje de efectividad
    $percentage_ng = $total_fields > 0 ? (100 * $ng_fields_total / $total_fields) : 0;
    $percentage_effectiveness = 100 - $percentage_ng;
} else {
    $percentage_ng = 0;
    $percentage_effectiveness = 100;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro y Consulta</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        form { margin-bottom: 20px; }
        input[type="text"], input[type="date"] { width: 100%; }
        button { cursor: pointer; }
        /* Centrar el canvas y hacerlo muy pequeño */
        .chart-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }
        canvas {
            width: 500px; /* Tamaño mucho más pequeño ajustado aquí */
            height: 500px; /* Tamaño mucho más pequeño ajustado aquí */
        }
    </style>
</head>
<body>



<h2>Registros con 'NG'</h2>
<?php
if ($result->num_rows > 0) {
    echo '<table>';
    echo '<thead>
            <tr>
                
                <th>Fecha Rev ADPC</th>
                <th>Campos con NG</th>
                <th>Porcentaje de Efectividad</th>
                <th>Eliminar</th>
            </tr>
        </thead>';
    echo '<tbody>';

    // Rewinds result pointer
    $result->data_seek(0);

    while ($row = $result->fetch_assoc()) {
        $ng_fields = []; // Array para almacenar campos con 'NG'
        $fields_count = 0; // Total de campos evaluados en el registro actual
        foreach ($row as $key => $value) {
            if ($key != 'id' && $key != 'fecha_rev_adpc') {
                $fields_count++;
                if (strtolower($value) === 'ng') {
                    $ng_fields[] = $key;
                }
            }
        }

        if (!empty($ng_fields)) {
            $ng_count = count($ng_fields);
            $effectiveness_percentage = $fields_count > 0 ? (100 * ($fields_count - $ng_count) / $fields_count) : 0;

            echo '<tr>';
        
            echo '<td>' . htmlspecialchars($row['fecha_rev_adpc']) . '</td>';
            echo '<td>' . implode(', ', $ng_fields) . '</td>';
            echo '<td>' . number_format($effectiveness_percentage, 2) . '%</td>';
            echo '<td>
                  <form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">
                      <input type="hidden" name="delete_id" value="' . htmlspecialchars($row['id']) . '">
                      <button type="submit" name="delete">Eliminar</button>
                  </form>
                  </td>';
            echo '</tr>';
        }
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo 'No hay datos con NG.';
}
?>

<h2>Porcentaje de Efectividad General</h2>
<div class="chart-container">
    <canvas id="effectivenessChart"></canvas>
</div>

<script>
    var ctx = document.getElementById('effectivenessChart').getContext('2d');
    var effectivenessChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['NG', 'OK'],
            datasets: [{
                label: 'Porcentaje de Efectividad',
                data: [<?php echo $percentage_ng; ?>, <?php echo 100 - $percentage_ng; ?>],
                backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(75, 192, 192, 0.2)'],
                borderColor: ['rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // Asegura que la gráfica no se estire
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw.toFixed(2) + '%';
                        }
                    }
                }
            }
        }
    });
</script>

</body>
</html>
