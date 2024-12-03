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