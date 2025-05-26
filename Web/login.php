<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $dados = [
        "email" => $email,
        "senha" => $senha
    ];

    $ch = curl_init("http://localhost:8080/api/clientes/login");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dados));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    $resposta = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 200) {
        $usuario = json_decode($resposta, true);
        $_SESSION["usuario_id"] = $usuario["id"];
        $_SESSION["nome"] = $usuario["nome"];
        header("Location: dashboard.php");
        exit();
    } else {
        $erro = "❌ Email ou senha inválidos!";
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
  <?php if (!empty($erro)) echo "<p style='color: red;'>$erro</p>"; ?>
  <form method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Entrar</button>
    <a href="cadastro.php">Cadastrar</a>
  </form>
</body>
</html>
