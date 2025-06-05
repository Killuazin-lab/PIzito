<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['cadastro'])) {
  $dados = $_SESSION['cadastro'];
  $descricao = $dados['apelido'];
  $email = $dados['email'];
  $senha = $dados['senha'];

  $idade = $_POST['idade']; // não usado no envio para a API, mas pode ser salvo depois
  $peso_kg = $_POST['peso'];
  $altura_cm = $_POST['altura'];
  $data_nascimento = $_POST['data_nascimento'];

  // Criação de cliente via API Java compatível com estrutura do banco
  $cliente = [
    'descricao' => $descricao,
    'email' => $email,
    'senha' => $senha,
    'peso_kg' => floatval($peso_kg),
    'altura_cm' => floatval($altura_cm),
    'data_nascimento' => $data_nascimento,
    'status_id' => 1
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
    $_SESSION['nome'] = $descricao;
    header("Location: dashboard.php");
    exit();
  } else {
    echo "<strong>Erro ao salvar no banco via API.</strong><br>";
    echo "Código HTTP: $httpCode<br>";
    echo "Resposta da API: <pre>$response</pre>";
  }
} else {
  echo "Erro ao finalizar cadastro. Volte para o início.";
}
?>