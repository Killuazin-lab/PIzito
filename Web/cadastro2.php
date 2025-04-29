<?php
session_start();
include('includes/conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $apelido = $_POST['apelido'];
  $email = $_POST['email'];
  $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

  // Guardar os dados da etapa 1 em sessão temporária
  $_SESSION['cadastro'] = [
    'nome' => $nome,
    'apelido' => $apelido,
    'email' => $email,
    'senha' => $senha
  ];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro - Etapa 2</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <img src="assets/img/maromba.png" alt="Logo Maromba" class="logo-top-right">
  <h1>Cadastro - Etapa 2</h1>
  <form method="post" action="finalizar_cadastro.php">
    <input type="number" name="idade" placeholder="Idade" required>
    <input type="number" name="peso" step="0.1" placeholder="Peso (kg)" required>
    <input type="number" name="altura" step="0.01" placeholder="Altura (m)" required>
    <input type="date" name="data_nascimento" required>
    <button type="submit">Finalizar Cadastro</button>
  </form>
</body>
</html>
