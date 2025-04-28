<?php include('includes/conexao.php'); session_start(); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $sql = "SELECT * FROM usuario WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        header("Location: dashboard.php");
    } else {
        echo "Login inv\u00e1lido!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login - Marombas Guarani</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <h1>MAROMBAS GUARANI</h1>
  <img src="assets/img/maromba.png" alt="Logo Maromba" class="logo">
  <form method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Entrar</button>
    <a href="cadastro.php">Cadastrar</a>
  </form>
</body>
</html>