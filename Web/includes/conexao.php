<?php
$server = "mysql:host=www.thyagoquintas.com.br;dbname=engenhria_34;charset=utf8";
$username = "engenhria_34";
$password = "ararinhaazul";

try {
    $conn = new PDO($server, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>