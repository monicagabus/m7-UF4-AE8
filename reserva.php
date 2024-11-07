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
        $email = $_POST['email'];
        $nombre_reserva = $_POST['nombre_reserva'];
        
        $email_regex = "/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/";
    
        if ($fecha_reserva < $fecha_actual) {
            echo "<script>alert('La fecha de reserva no puede ser una fecha pasada.');</script>";
        } elseif (!preg_match("/^[1-9]$|^[1-4][0-9]$|^50$/", $numero_personas)) {
            echo "<script>alert('Número de personas no válido. Debe ser un número entre 1 y 50.');</script>";
        } elseif (!preg_match($email_regex, $email)) {
            echo "<script>alert('Correo electrónico no válido.');</script>";
        } elseif (empty($nombre_reserva)) {
            echo "<script>alert('El nombre para la reserva no puede estar vacío.');</script>";  
        } else {
            echo "<form id='formReserva' action='procesar_reserva.php' method='POST'>";
            echo "<input type='hidden' name='nombre_restaurante' value='" . htmlspecialchars($nombre_restaurante) . "'>";
            echo "<input type='hidden' name='fecha' value='" . htmlspecialchars($fecha_reserva) . "'>";
            echo "<input type='hidden' name='numero_personas' value='" . htmlspecialchars($numero_personas) . "'>";
            echo "<input type='hidden' name='email' value='" . htmlspecialchars($email) . "'>";
            echo "<input type='hidden' name='nombre_reserva' value='" . htmlspecialchars($nombre_reserva) . "'>";
            echo "</form>";
            echo "<script>document.getElementById('formReserva').submit();</script>";
        }
        
    ?>

    <form id="formReserva" method="POST" action="procesar_reserva.php">
        <input type="hidden" name="nombre_restaurante" value="<?php echo htmlspecialchars($restaurante); ?>">

        <label for="restaurante_seleccionado">Nombre del Restaurante:</label>
        <input type="text" id="restaurante_seleccionado" value="<?php echo htmlspecialchars($restaurante); ?>" disabled required><br><br>
        
        <label for="fecha">Fecha de la Reserva:</label>
        <input type="date" id="fecha" name="fecha" required><br><br>
        
        <label for="numero_personas">Número de Personas:</label>
        <input type="number" id="numero_personas" name="numero_personas" min="1" max="50" required><br><br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="nombre_reserva">Nombre de la Reserva:</label>
        <input type="text" id="nombre_reserva" name="nombre_reserva" required><br><br>
        
        <input type="submit" value="Hacer Reserva">
    </form>
   
</body>
</html>