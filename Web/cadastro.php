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
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro - Etapa 1</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="assets/js/validacao.js" defer></script>
</head>
<body>
  <img src="assets/img/maromba.png" alt="Logo Maromba" class="logo-top-right">
  <h1>Cadastro - Etapa 1</h1>
  <form method="post" action="cadastro2.php" onsubmit="return validarSenha()">
    <input type="text" name="nome" placeholder="Nome completo" required>
    <input type="text" name="apelido" placeholder="Como deseja ser chamado" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <input type="password" name="confirmar_senha" placeholder="Confirmar senha" required>
    <button type="submit">Próxima etapa</button>
  </form>
</body>
</html>
