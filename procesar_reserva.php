<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Reserva</title>
</head>
<body>
    <h1>Procesar Reserva</h1>

    <?php
    $restaurante = isset($_POST['nombre_restaurante']) ? $_POST['nombre_restaurante'] : '';
    $fecha_reserva = isset($_POST['fecha']) ? $_POST['fecha'] : '';
    $numero_personas = isset($_POST['numero_personas']) ? $_POST['numero_personas'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $nombre_reserva = isset($_POST['nombre_reserva']) ? $_POST['nombre_reserva'] : '';
    $error = '';
    $fecha_actual = date("Y-m-d");

    if ($fecha_reserva < $fecha_actual) {
        $error = "La fecha de reserva no puede ser una fecha pasada.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Correo electrónico no válido.";
    } elseif (!preg_match("/^[1-9]$|^[1-4][0-9]$|^50$/", $numero_personas)) {
        $error = "Número de personas no válido. Debe ser un número entre 1 y 50.";
    } elseif (empty($nombre_reserva)) {
        $error = "El nombre para la reserva no puede estar vacío.";
    }

    if ($error) {
        echo "<p style='color: red;'>Error: $error</p>";
        echo "<p><a href='reserva.php?restaurante=" . urlencode($restaurante) . "'>Volver al formulario</a></p>";
    } else {
        echo "<h2>Reserva Confirmada</h2>";
        echo "<p><strong>Restaurante:</strong> " . htmlspecialchars($restaurante) . "</p>";
        echo "<p><strong>Fecha de la Reserva:</strong> " . htmlspecialchars($fecha_reserva) . "</p>";
        echo "<p><strong>Número de Personas:</strong> " . htmlspecialchars($numero_personas) . "</p>";
        echo "<p><strong>Correo Electrónico:</strong> " . htmlspecialchars($email) . "</p>";
        echo "<p><strong>Nombre de la Reserva:</strong> " . htmlspecialchars($nombre_reserva) . "</p>";
        
        header("Refresh: 3; url=index.php");
        exit;
    }
    ?>
</body>
</html>
