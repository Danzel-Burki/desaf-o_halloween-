<?php
session_start();
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['login-username'];
    $password = $_POST['login-password'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = :username AND password = :password");
    $stmt->execute(['username' => $username, 'password' => $password]);

    if ($stmt->rowCount() > 0) {
        $_SESSION["username"] = $username;
        header("Location: index.php?welcome");
        exit;
    } else {
        header("Location: index.php?error=invalid");
        exit;
    }
}
?>
