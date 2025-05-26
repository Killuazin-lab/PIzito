<?php
include('includes/auth.php');
include('includes/conexao.php');

$usuario_id = $_SESSION['id'];
$stmt = $conn->prepare("SELECT apelido, pontos, idade, peso, altura, data_nascimento FROM usuario WHERE id = ?");
$stmt->execute([$usuario_id]);
$usuario = $stmt->fetch();

$resgates = floor($usuario['pontos'] / 10);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <img src="assets/img/maromba.png" alt="Logo Maromba" class="logo-top-right">
  <div class="dashboard">
    <h2>Olá, <?php echo htmlspecialchars($usuario['apelido']); ?>!</h2>
    <p><strong>Pontos acumulados:</strong> <?php echo $usuario['pontos']; ?></p>
    <p><strong>Resgates de suco disponíveis:</strong> <?php echo $resgates; ?> 🧃</p>

    <hr>

    <h3>📊 Seus dados</h3>
    <p>Idade: <?php echo $usuario['idade']; ?> anos</p>
    <p>Peso: <?php echo $usuario['peso']; ?> kg</p>
    <p>Altura: <?php echo $usuario['altura']; ?> m</p>
    <p>Nascimento: <?php echo date("d/m/Y", strtotime($usuario['data_nascimento'])); ?></p>

    <hr>

    <h3>🎯 Atividades disponíveis</h3>
    <ul>
      <li>Stand de Engenharia Elétrica – <strong>Pendente</strong></li>
      <li>Stand de Mecânica – <strong>Pendente</strong></li>
      <li>Stand de Civil – <strong>Pendente</strong></li>
    </ul>
  </div>
</body>
</html>
