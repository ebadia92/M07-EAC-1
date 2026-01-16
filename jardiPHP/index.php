<?php
session_start();

// Inicialitzar la llista de plantes si no existeix
if (!isset($_SESSION['plantes'])) {
    $_SESSION['plantes'] = [];

    // Introduir plantes al jardí
    $_SESSION['plantes'][] = ["id"=> 1, "nom" => "Buguenvíl·lea", "familia" => "Nictaginàcies", "tipus" => "Exterior", "descripcio" => "Buguenvíl·lea de color blau"];
    $_SESSION['plantes'][] = ["id"=> 2, "nom" => "Calathea", "familia" => "Marantaceae", "tipus" => "Interior", "descripcio" => "Calathea gran de Mèxic"];
    $_SESSION['plantes'][] = ["id"=> 3, "nom" => "Ponsètia", "familia" => "Euphorbiaceae", "tipus" => "Interior", "descripcio" => "Flor de Nadal de l'any 2024"];
}

// Obtenir el tipus seleccionat per filtrar
$tipus_seleccionat = isset($_GET['tipus']) ? $_GET['tipus'] : 'tots';
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Jardí del Joel</title>
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
            font-size: 2em;
        }
        h1 b {
            color: #FF5733;
        }
        form {
            text-align: center;
            margin: 20px 0;
        }
        label {
            font-size: 1.2em;
        }
        select, input[type="submit"] {
            font-size: 1em;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        table th, table td {
            padding: 12px;
            text-align: left;
        }
        table th {
            background-color: #4CAF50;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table tr:hover {
            background-color: #ddd;
        }
        a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            color: #FF5733;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 1em;
        }
    </style>
</head>
<body>
    <h1>Jardí del <b>Joel</b></h1>

    <form method="get" action="index.php">
        <label for="tipus">Filtrar per tipus:</label>
        <select name="tipus" id="tipus">
            <option value="tots" <?= $tipus_seleccionat == 'tots' ? 'selected' : '' ?>>Tots</option>
            <option value="Interior" <?= $tipus_seleccionat == 'Interior' ? 'selected' : '' ?>>Interior</option>
            <option value="Exterior" <?= $tipus_seleccionat == 'Exterior' ? 'selected' : '' ?>>Exterior</option>
        </select>
        <input type="submit" value="Filtrar">
    </form>

    <table>
        <tr>
            <th>Nom</th>
            <th>Família</th>
            <th>Tipus</th>
            <th>Descripció</th>
        </tr>
        <?php foreach ($_SESSION['plantes'] as $planta): ?>
            <?php if ($tipus_seleccionat == 'tots' || $planta['tipus'] == $tipus_seleccionat): ?>
                <tr>
                    <td><a href="detalls.php?id=<?= urlencode($planta['id']) ?>"><?= htmlspecialchars($planta['nom']) ?></a></td>
                    <td><?= htmlspecialchars($planta['familia']) ?></td>
                    <td><?= htmlspecialchars($planta['tipus']) ?></td>
                    <td><?= htmlspecialchars($planta['descripcio']) ?></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>

    <div class="footer">
        <a href="afegir.php">Afegir una nova planta</a>
    </div>
</body>
</html>
