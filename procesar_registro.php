<?php
session_start();
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = :username");
    $stmt->execute(['username' => $username]);

    if ($stmt->rowCount() > 0) {
        header("Location: index.php?error=usuario_existente");
        exit;
    } else {
        $stmt = $pdo->prepare("INSERT INTO usuarios (username, password) VALUES (:username, :password)");
        $stmt->execute(['username' => $username, 'password' => $password]);

        $_SESSION["username"] = $username;
        header("Location: index.php?welcome");
        exit;
    }
}
?>
