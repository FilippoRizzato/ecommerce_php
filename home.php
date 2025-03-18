<?php
require 'db.php';

// Recupera i prodotti dal database
$sql = "SELECT * FROM products";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VynilOP</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .footer {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px; /* Adjust gap between images as needed */
            justify-items: center;
            align-items: center;
        }
        .footer img {
            width: 200px; /* Adjust the width as needed */
            height: auto;
        }
        .footer .product {
            text-align: center;
        }
        .discount-voucher {
            text-align: center;
            background-color: #f7f7f7;
            padding: 20px;
            margin-top: 20px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>

<header>
    <div class="header-content">
        <nav class="nav">
            <a href="login.php">ACCEDI</a>
            <a href="#">ESCI</a>
            <a href="register.php">REGISTRATI</a>
        </nav>
        <div class="logo text-center">
            <img src="Screenshot%202025-02-04%20083718.png" alt="Logo">
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Cerca...">
            <button type="button">🔍</button>
        </div>
    </div>
</header>

<div class="content" style="padding-top: 100px;">
    <div class="carousel">
        <img src="https://www.disclan.com/164321-large_default/house-of-balloons-10th-anniversary-weeknd-the-lp.jpg" alt="Copertina Album Make It Fit" class="active">
        <img src="https://www.disclan.com/157466-large_default/igor-tyler-the-creator-lp.jpg" alt="Album 1">
        <img src="https://www.disclan.com/158975-large_default/dawn-fm-weeknd-the-cd.jpg" alt="Album 2">
        <img src="https://www.disclan.com/162611-large_default/lamb-as-effigy-.jpg" alt="Album 3">
    </div>
    <p class="description">Un piccolo assaggio dei nostri prodotti</p>

    <div class="footer">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <a href="prodotto.php?id=<?php echo $product['id']; ?>">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                    <h3><?php echo $product['name']; ?></h3>
                    <p>€<?php echo number_format($product['price'], 2); ?></p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="discount-voucher">
        <h2>Buono Sconto</h2>
        <p>Inserisci il codice <strong>SAVE10</strong> al momento del pagamento per ottenere uno sconto del 10% sul tuo ordine!</p>
    </div>
</div>

<footer>
    <p>&copy; 2025 Disclan. Tutti i diritti riservati.</p>
</footer>

<script>
    const images = document.querySelectorAll('.carousel img');
    let currentIndex = 0;

    function showNextImage() {
        images[currentIndex].classList.remove('active');
        currentIndex = (currentIndex + 1) % images.length;
        images[currentIndex].classList.add('active');
    }

    setInterval(showNextImage, 3000);
</script>

</body>
</html>
