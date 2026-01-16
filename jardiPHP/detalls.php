<?php
session_start();

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

// Buscar el planta a la llista
$planta_trobada = null;
foreach ($_SESSION['plantes'] as $planta) {
    if ($planta['id'] == $id) {
        $planta_trobada = $planta;
        break;
    }
}

if (!$planta_trobada) {
    echo "Planta no trobada.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Detalls de la planta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #4CAF50;
            margin-top: 50px;
            font-size: 2.5em;
        }
        h1 b {
            color: #FF5733;
        }
        .details-container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        p {
            font-size: 1.2em;
            line-height: 1.6;
        }
        .details-container p strong {
            color: #4CAF50;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 30px;
            font-size: 1.2em;
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            color: #FF5733;
        }
    </style>
</head>
<body>
    <div class="details-container">
    <h1>Detalls de la planta: <b><?= htmlspecialchars($planta_trobada['nom']) ?></b></h1>

    <p><strong>Família:</strong> <?= htmlspecialchars($planta_trobada['familia']) ?> </p>
    <p><strong>Tipus:</strong> <?= htmlspecialchars($planta_trobada['tipus']) ?></p>
    <p><strong>Descripció:</strong> <?= htmlspecialchars($planta_trobada['descripcio']) ?></p>
</div>
    <a href="index.php">Tornar al meu jardí</a>
</body>
</html>
