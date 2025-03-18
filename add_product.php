<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image = $_POST['image']; // URL dell'immagine

    $sql = "INSERT INTO products (name, price, stock, image) VALUES (:name, :price, :stock, :image)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':price', $price);
    $stmt->bindValue(':stock', $stock);
    $stmt->bindValue(':image', $image);
    $stmt->execute();

    header("Location: home.php"); // Reindirizza alla homepage dopo l'inserimento
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aggiungi Prodotto</title>
</head>
<body>
<h1>Aggiungi Prodotto</h1>
<form action="" method="post">
    <label>Nome Prodotto:</label>
    <input type="text" name="name" required>
    <label>Prezzo:</label>
    <input type="text" name="price" required>
    <label>Stock:</label>
    <input type="number" name="stock" required>
    <label>URL Immagine:</label>
    <input type="text" name="image" required>
    <button type="submit">Aggiungi Prodotto</button>
</form>
</body>
</html>
