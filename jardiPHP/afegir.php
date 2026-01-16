<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturar les dades del formulari
    $nom = $_POST['nom'];
    $familia = $_POST['familia'];
    $tipus = $_POST['tipus'];
    $descripcio = $_POST['descripcio'];

    // Afegir la nova planta a la llista de la sessió
    $id = count($_SESSION['plantes']) + 1;
    $_SESSION['plantes'][] = [
        "id" => $id,
        "nom" => htmlspecialchars($nom),
        "familia" => htmlspecialchars($familia),
        "tipus" => htmlspecialchars($tipus),
        "descripcio" => htmlspecialchars($descripcio)
    ];

    // Redirigir a la pàgina principal
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Afegir planta</title>
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
        .form-container {
            width: 80%;
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            font-size: 1.2em;
            margin-bottom: 10px;
        }
        input, select, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            font-size: 1.1em;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border: none;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a {
            display: block;
            text-align: center;
            font-size: 1.2em;
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
            margin-top: 30px;
        }
        a:hover {
            color: #FF5733;
        }
    </style>
</head>
<body>
    <h1>Afegir planta</h1>
    
    <div class="form-container">
        <form action="afegir.php" method="post">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>

            <label for="familia">Família:</label>
            <input type="text" id="familia" name="familia" required>

            <label for="tipus">Tipus:</label>
            <select id="tipus" name="tipus">
                <option value="Interior">Interior</option>
                <option value="Exterior">Exterior</option>
            </select>

            <label for="descripcio">Descripció:</label>
            <textarea id="descripcio" name="descripcio"></textarea>

            <input type="submit" value="Afegir planta">
        </form>
    </div> 
    <a href="index.php">Tornar al meu jardí</a>
</body>
</html>
