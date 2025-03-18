<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        session_start();
        $_SESSION['user'] = $email;
        header("Location: menu.html");
    } else {
        echo "Credenziali non valide.";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<form action="" method="post">
    <label>Email:</label>
    <input type="text" name="email" required>
    <label>Password:</label>
    <input type="password" name="password" required>
    <button type="submit">Login</button>
</form>
</body>
</html>
