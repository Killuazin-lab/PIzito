<?php
include('includes/auth.php');
include('includes/conexao.php');

$usuario_id = $_SESSION['usuario_id'];
$stmt = $conn->prepare("SELECT pontos FROM usuario WHERE id = ?");
$stmt->execute([$usuario_id]);
$pontos = $stmt->fetchColumn();

$resgates = floor($pontos / 10);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Recompensas</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <img src="assets/img/maromba.png" alt="Logo Maromba" class="logo-top-right">
  <div class="dashboard">
    <h2>🏆 Painel de Recompensas</h2>

    <p><strong>Seus pontos:</strong> <?php echo $pontos; ?></p>
    <p><strong>Resgates disponíveis:</strong> <?php echo $resgates; ?> 🧃</p>

    <hr>

    <h3>🎁 Recompensas</h3>
    <ul>
      <li>🧃 10 pontos — 1 Suco
        <?php if ($pontos >= 10): ?>
          <button disabled>Resgatar (em breve)</button>
        <?php else: ?>
          <span style="color: #aaa;">Pontos insuficientes</span>
        <?php endif; ?>
      </li>
      <li>🧃🧃🧃 30 pontos — Combo de 3 sucos + selo especial
        <?php if ($pontos >= 30): ?>
          <button disabled>Resgatar (em breve)</button>
        <?php else: ?>
          <span style="color: #aaa;">Pontos insuficientes</span>
        <?php endif; ?>
      </li>
    </ul>
  </div>
</body>
</html>
