<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Reserva</title>
</head>
<body>
    <?php
    $nombre_restaurante = isset($_POST['nombre_restaurante']) ? $_POST['nombre_restaurante'] : '';
    $fecha_reserva = isset($_POST['fecha']) ? $_POST['fecha'] : '';
    $numero_personas = isset($_POST['numero_personas']) ? $_POST['numero_personas'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $nombre_reserva = isset($_POST['nombre_reserva']) ? $_POST['nombre_reserva'] : '';

    $error = isset($_POST['error']) ? $_POST['error'] : null;

    if ($error) {
        echo "<h1>Error en la Reserva</h1>";
        echo "<p><strong>Error:</strong> $error</p>";
        echo "<a href='reserva.php?restaurante=" . urlencode($nombre_restaurante) . "'>Volver al formulario</a>";
    } else {
        echo "<h1>Confirmación de la Reserva</h1>";
        echo "<p><strong>Restaurante:</strong> " . htmlspecialchars($nombre_restaurante) . "</p>";
        echo "<p><strong>Fecha de Reserva:</strong> " . htmlspecialchars($fecha_reserva) . "</p>";
        echo "<p><strong>Número de Personas:</strong> " . htmlspecialchars($numero_personas) . "</p>";
        echo "<p><strong>Correo Electrónico:</strong> " . htmlspecialchars($email) . "</p>";
        echo "<p><strong>Nombre de la Reserva:</strong> " . htmlspecialchars($nombre_reserva) . "</p>";
        echo "<p>La reserva se ha realizado con éxito.</p>";
    }
    ?>
</body>
</html>
