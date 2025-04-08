<?php
$server = "";
$database = "";
$username = "";
$password = "";

#HOST www.thyagoquintas.com.br
#USER engenharia_34
#DATABASE engenharia_34
#SENHA ararinhaazul

try {
    $conn = new PDO("sqlsrv:server=$server;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>