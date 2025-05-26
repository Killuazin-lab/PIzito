<?php
$server = "www.thyagoquintas.com.br";
$dbname = "engenharia_34";
$username = "engenharia_34";
$password = "ararinhaazul";

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conectado com sucesso!";
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
