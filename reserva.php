<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Restaurante</title>
</head>
<body>
    <h1>Reserva Restaurante</h1>
    <?php
    $restaurante = isset($_GET['restaurante']) ? urldecode($_GET['restaurante']) : '';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fecha_reserva = $_POST['fecha'];
        $numero_personas = $_POST['numero_personas'];
        $fecha_actual = date("Y-m-d");
        
        if ($fecha_reserva < $fecha_actual) {
            echo "<script>alert('La fecha de reserva no puede ser una fecha pasada.');</script>";
        } elseif (!preg_match("/^[1-9]$|^[1-4][0-9]$|^50$/", $numero_personas)) {
            echo "<script>alert('Número de personas no válido. Debe ser un número entre 1 y 50.');</script>";
        } else {
            echo "<script>alert('La reserva se ha procesado con éxito.'); window.location.href = 'index.php';</script>";
        }    
    }
    ?>

    <form id="formReserva" method="POST">
        <input type="hidden" name="nombre_restaurante" value="<?php echo htmlspecialchars($restaurante); ?>">

        <label for="restaurante_seleccionado">Nombre del Restaurante:</label>
        <input type="text" id="restaurante_seleccionado" value="<?php echo htmlspecialchars($restaurante); ?>" disabled required><br><br>
        
        <label for="fecha">Fecha de la Reserva:</label>
        <input type="date" id="fecha" name="fecha" required><br><br>
        
        <label for="numero_personas">Número de Personas:</label>
        <input type="number" id="numero_personas" name="numero_personas" min="1" max="50" required><br><br>

        <input type="submit" value="Hacer Reserva">
    </form>
   
</body>
</html>