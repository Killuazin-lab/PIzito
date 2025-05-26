<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['cadastro'])) {
  $dados = $_SESSION['cadastro'];
  $nome = $dados['nome'];
  $email = $dados['email'];
  $senha = $dados['senha'];

  $idade = $_POST['idade'];
  $peso = $_POST['peso'];
  $altura = $_POST['altura'];
  $data_nascimento = $_POST['data_nascimento'];

  // Criação de cliente via API Java
  $cliente = [
    'nome' => $nome,
    'email' => $email,
    'senha' => $senha,
    'idade' => $idade,
    'peso' => $peso,
    'altura' => $altura,
    'dataNascimento' => $data_nascimento,
    'pontos' => 10
  ];

  $ch = curl_init("http://localhost:8080/api/clientes");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($cliente));
  curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
  $response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

unset($_SESSION['cadastro']);

if ($httpCode === 200 || $httpCode === 201) {
    $_SESSION['nome'] = $dados['apelido'];
    header("Location: dashboard.php");
    exit();
} else {
    echo "<strong>Erro ao salvar no banco via API.</strong><br>";
    echo "Código HTTP: " . $httpCode . "<br>";
    echo "Resposta da API: <pre>$response</pre>";
}}