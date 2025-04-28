<?php include('includes/conexao.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuario (nome, email, senha, pontos) VALUES (?, ?, ?, 0)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nome, $email, $senha]);
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro - Marombas Guarani</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <h1>MAROMBAS GUARANI</h1>
  <img src="assets/img/maromba.png" alt="Logo Maromba" class="logo">
  <form method="post">
    <input type="text" name="nome" placeholder="Nome" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Cadastrar</button>
  </form>
</body>
</html>
