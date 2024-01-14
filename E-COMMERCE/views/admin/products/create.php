<?php
session_start();

require_once '../../../models/classes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $marca = $_POST['marca'];
    $nome = $_POST['nome'];
    $prezzo = $_POST['prezzo'];

    try {
        $newProduct = Product::Create(['nome' => $nome, 'prezzo' => $prezzo, 'marca' => $marca]);

        if ($newProduct) {
            echo "Prodotto creato con successo!";
        } else {
            echo "Si è verificato un errore durante la creazione del prodotto.";
        }
    } catch (PDOException $e) {
        echo "Errore nella connessione al database: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea Prodotto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #1a1a1a;
            color: #ffffff;
            text-align: center;
        }

        h2 {
            color: #4CAF50;
        }

        form {
            margin-top: 20px;
            display: inline-block;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #4CAF50;
        }

        input {
            padding: 8px;
            margin-bottom: 10px;
            width: 200px;
            background-color: #333333;
            color: #ffffff;
            border: 1px solid #555555;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            margin-top: 10px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h2>Crea un nuovo prodotto</h2>

<form action="" method="POST">
    <label for="marca">Marca:</label>
    <input type="text" name="marca" required><br>

    <label for="nome">Nome:</label>
    <input type="text" name="nome" required><br>

    <label for="prezzo">Prezzo:</label>
    <input type="number" step="0.01" name="prezzo" required><br>

    <input type="submit" value="Crea Prodotto">
</form>
<a href="../../products/index.php">Vai ai prodotti</a>
</body>
</html>