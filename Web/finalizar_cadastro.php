<?php
session_start();
include('includes/conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['cadastro'])) {
  $dados = $_SESSION['cadastro'];
  $nome = $dados['nome'];
  $apelido = $dados['apelido'];
  $email = $dados['email'];
  $senha = $dados['senha'];

  $idade = $_POST['idade'];
  $peso = $_POST['peso'];
  $altura = $_POST['altura'];
  $data_nascimento = $_POST['data_nascimento'];

  // Começa com 10 pontos
  $sql = "INSERT INTO usuario (nome, apelido, email, senha, idade, peso, altura, data_nascimento, pontos)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, 10)";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$nome, $apelido, $email, $senha, $idade, $peso, $altura, $data_nascimento]);

  unset($_SESSION['cadastro']);
  $_SESSION['usuario_id'] = $conn->lastInsertId();
  $_SESSION['nome'] = $apelido;

  header("Location: dashboard.php");
  exit();
} else {
  echo "Erro ao finalizar cadastro. Volte para o início.";
}
?>