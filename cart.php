<?php
session_start();
require 'db.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Aggiungi prodotto al carrello
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $_SESSION['cart'][] = $product_id;
}

// Rimuovi prodotto dal carrello
if (isset($_POST['remove_from_cart'])) {
    $product_id = $_POST['product_id'];
    if (($key = array_search($product_id, $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
    }
}

// Visualizza carrello
$cart_items = $_SESSION['cart'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Carrello</title>
</head>
<body>
<h1>Carrello</h1>
<ul>
    <?php foreach ($cart_items as $item): ?>
        <li>Prodotto ID: <?php echo $item; ?></li>
    <?php endforeach; ?>
</ul>
<form action="" method="post">
    <input type="text" name="product_id" placeholder="ID Prodotto da rimuovere">
    <button type="submit" name="remove_from_cart">Rimuovi</button>
</form>
</body>
</html>
