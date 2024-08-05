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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Obtener los datos del formulario
    $fecha = $_POST['fecha'];
    $nombre_unidad = $_POST['nombre_unidad'];
    $numero_orden = $_POST['numero_orden'];
    $parrilla = $_POST['parrilla'];
    $cofre = $_POST['cofre'];
    $toldo = $_POST['toldo'];
    $cajuela = $_POST['cajuela'];
    $lado_izquierdo = $_POST['lado_izquierdo'];
    $rines = $_POST['rines'];
    $lado_derecho = $_POST['lado_derecho'];
    $protectores = $_POST['protectores'];
    $vidrios = $_POST['vidrios'];
    $asientos = $_POST['asientos'];
    $tapetes = $_POST['tapetes'];
    $puertas_interior = $_POST['puertas_interior'];
    $tablero = $_POST['tablero'];
    $marcos = $_POST['marcos'];
    $motor = $_POST['motor'];

    // Preparar la consulta SQL para la inserción
    $sql_insert = "INSERT INTO lavado (
        fecha, nombre_unidad, numero_orden, parrilla, cofre, toldo, cajuela, lado_izquierdo, rines, lado_derecho, protectores, vidrios,
        asientos, tapetes, puertas_interior, tablero, marcos, motor
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bind_param("ssisisssssssssssss", $fecha, $nombre_unidad, $numero_orden, $parrilla, $cofre, $toldo, $cajuela, $lado_izquierdo, $rines, $lado_derecho, $protectores, $vidrios, $asientos, $tapetes, $puertas_interior, $tablero, $marcos, $motor);

    // Ejecutar la consulta preparada
    if ($stmt->execute()) {
        echo "<p>Registro insertado correctamente.</p>";
    } else {
        echo "Error al insertar el registro: " . $stmt->error;
    }

    // Cerrar la declaración preparada y la conexión
    $stmt->close();
}

// Procesamiento de la eliminación cuando se envía por POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $delete_id = $_POST['delete_id'];

    // Utilizar una declaración preparada para la eliminación
    $sql_delete = "DELETE FROM lavado WHERE id = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("i", $delete_id);

    if ($stmt_delete->execute()) {
        echo "<p>Registro eliminado correctamente.</p>";
    } else {
        echo "Error al eliminar el registro: " . $stmt_delete->error;
    }

    // Cerrar la declaración preparada de eliminación
    $stmt_delete->close();
}

// Función para contar valores OK y NG por unidad y número de orden
function countOKNG($conn, $field_name, $nombre_unidad, $numero_orden) {
    $sql_count_ok = "SELECT COUNT(*) AS count_ok FROM lavado WHERE $field_name = 'ok' AND nombre_unidad = ? AND numero_orden = ?";
    $sql_count_ng = "SELECT COUNT(*) AS count_ng FROM lavado WHERE $field_name = 'ng' AND nombre_unidad = ? AND numero_orden = ?";
    
    $stmt_ok = $conn->prepare($sql_count_ok);
    $stmt_ok->bind_param("si", $nombre_unidad, $numero_orden);
    $stmt_ok->execute();
    $result_ok = $stmt_ok->get_result();
    $row_ok = $result_ok->fetch_assoc();
    $count_ok = $row_ok['count_ok'];
    
    $stmt_ng = $conn->prepare($sql_count_ng);
    $stmt_ng->bind_param("si", $nombre_unidad, $numero_orden);
    $stmt_ng->execute();
    $result_ng = $stmt_ng->get_result();
    $row_ng = $result_ng->fetch_assoc();
    $count_ng = $row_ng['count_ng'];

    return array($count_ok, $count_ng);
}

// Array de campos y sus descripciones
$fields = [
    'parrilla' => 'Parrilla:',
    'cofre' => 'Cofre:',
    'toldo' => 'Toldo:',
    'cajuela' => 'Cajuela/Puerta:',
    'lado_izquierdo' => 'Lado izquierdo:',
    'rines' => 'Rines/Llantas:',
    'lado_derecho' => 'Lado Derecho:',
    'protectores' => 'Protectores:',
    'vidrios' => 'Vidrios:',
    'asientos' => 'Asientos:',
    'tapetes' => 'Tapetes:',
    'puertas_interior' => 'Puertas interior:',
    'tablero' => 'Tablero:',
    'marcos' => 'Marcos:',
    'motor' => 'Motor:'
];

// Consulta SQL para obtener los datos registrados
$sql_select = "SELECT id, nombre_unidad, numero_orden FROM lavado";
$result_unidades = $conn->query($sql_select);

$unidades = [];
$efectividades = [];
$ng_campos = [];
$efectividad_total = 0;
$contador_unidades = 0;

if ($result_unidades->num_rows > 0) {
    while ($unidad_row = $result_unidades->fetch_assoc()) {
        $id = $unidad_row['id'];
        $nombre_unidad = $unidad_row['nombre_unidad'];
        $numero_orden = $unidad_row['numero_orden'];

        $total_ok = 0;
        $total_ng = 0;
        $ng_campos_unidad = [];

        foreach ($fields as $field => $description) {
            list($ok_count, $ng_count) = countOKNG($conn, $field, $nombre_unidad, $numero_orden);
            $total_ok += $ok_count;
            $total_ng += $ng_count;
            if ($ng_count > 0) {
                $ng_campos_unidad[] = $description;
            }
        }

        // Calcular la efectividad
        $total_count = $total_ok + $total_ng;
        $efectividad = $total_count > 0 ? ($total_ok / $total_count) * 100 : 0;

        $unidades[] = ['id' => $id, 'label' => "$nombre_unidad (Orden: $numero_orden)"];
        $efectividades[] = round($efectividad, 2);
        $ng_campos[] = implode(', ', $ng_campos_unidad);

        $efectividad_total += $efectividad;
        $contador_unidades++;
    }
} else {
    echo "<p>No hay datos registrados.</p>";
}

// Calcular el promedio de efectividad
$efectividad_promedio = $contador_unidades > 0 ? ($efectividad_total / $contador_unidades) : 0;

// Cerrar la conexión
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Efectividad de Unidades</title>
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
        <h2>Efectividad de Unidades</h2>
        <div class="chart-container">
            <canvas id="efectividadChart"></canvas>
        </div>
        <script>
            var ctx = document.getElementById('efectividadChart').getContext('2d');
            var efectividadChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_column($unidades, 'label')); ?>,
                    datasets: [{
                        label: 'Efectividad (%)',
                        data: <?php echo json_encode($efectividades); ?>,
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

        <div class="table-container">
            <h2>Tabla de Efectividad y Campos NG</h2>
            <table>
                <tr>
                    <th>Nombre de Unidad y Número de Orden</th>
                    <th>Efectividad (%)</th>
                    <th>Campos con NG</th>
                    <th>Acciones</th>
                </tr>
                <?php
                foreach ($unidades as $index => $unidad) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($unidad['label']) . "</td>";
                    echo "<td>" . htmlspecialchars($efectividades[$index]) . "</td>";
                    echo "<td>" . htmlspecialchars($ng_campos[$index]) . "</td>";
                    echo "<td>
                            <form method='post' action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "' class='delete-form' onsubmit='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\");'>
                                <input type='hidden' name='delete_id' value='" . htmlspecialchars($unidad['id']) . "'>
                                <button type='submit' name='delete'>Eliminar</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
                ?>
                <tr>
                    <td colspan="3" style="text-align: right;"><strong>Promedio de Efectividad</strong></td>
                    <td><strong><?php echo round($efectividad_promedio, 2); ?>%</strong></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
