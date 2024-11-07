<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurantes</title>
</head>
<body>
    <h1>Restaurantes</h1>
    <ul>
        <?php
        $restaurantes = [
            "Restaurante 1",
            "Restaurante 2",
            "Restaurante 3",
            "Restaurante 4",
        ];

        foreach ($restaurantes as $nombre) {
            echo "<li><a href='reserva.php?restaurante=" . urlencode($nombre) . "'>" . htmlspecialchars($nombre) . "</a></li>";
        }
        ?>
    </ul>
</body>
</html>