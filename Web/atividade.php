<?php
include('includes/auth.php');
include('includes/conexao.php');

$usuario_id = $_SESSION['usuario_id'];
$atividade_id = $_GET['id'] ?? 1; // Exemplo: ?id=4

// Simula uma atividade (depois podemos buscar do banco)
$atividade = [
  'id' => $atividade_id,
  'titulo' => "Stand Grupo 4",
  'descricao' => "Responda as perguntas para validar sua visita ao stand do Grupo 4.",
  'perguntas' => [
    ["Qual é o tema do projeto do grupo 4?", "inteligencia artificial"],
    ["Qual material eles utilizaram?", "arduino"],
    ["Quantas pessoas tem no grupo?", "4"]
  ]
];

$concluida = false;
$resultado = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $respostas = $_POST['respostas'];
  $corretas = 0;

  foreach ($atividade['perguntas'] as $index => $pergunta) {
    $esperada = strtolower(trim($pergunta[1]));
    $resposta = strtolower(trim($respostas[$index]));
    if ($esperada === $resposta) {
      $corretas++;
    }
  }

  if ($corretas === count($atividade['perguntas'])) {
    // Marcar como concluída e adicionar pontos
    $check = $conn->prepare("SELECT * FROM atividade_usuario WHERE usuario_id = ? AND atividade_id = ?");
    $check->execute([$usuario_id, $atividade_id]);
    if ($check->rowCount() === 0) {
      $insert = $conn->prepare("INSERT INTO atividade_usuario (usuario_id, atividade_id, concluida) VALUES (?, ?, 1)");
      $insert->execute([$usuario_id, $atividade_id]);

      $update = $conn->prepare("UPDATE usuario SET pontos = pontos + 10 WHERE id = ?");
      $update->execute([$usuario_id]);
    }
    $concluida = true;
    $resultado = "✅ Atividade concluída com sucesso! Você ganhou 10 pontos.";
  } else {
    $resultado = "❌ Algumas respostas estão incorretas. Tente novamente.";
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title><?php echo $atividade['titulo']; ?></title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <img src="assets/img/maromba.png" alt="Logo Maromba" class="logo-top-right">
  <div class="dashboard">
    <h2><?php echo $atividade['titulo']; ?></h2>
    <p><?php echo $atividade['descricao']; ?></p>

    <?php if (!empty($resultado)): ?>
      <p><strong><?php echo $resultado; ?></strong></p>
    <?php endif; ?>

    <?php if (!$concluida): ?>
    <form method="post">
      <?php foreach ($atividade['perguntas'] as $index => $pergunta): ?>
        <label><?php echo ($index + 1) . ". " . $pergunta[0]; ?></label><br>
        <input type="text" name="respostas[]" required><br><br>
      <?php endforeach; ?>
      <button type="submit">Enviar respostas</button>
    </form>
    <?php else: ?>
      <a href="dashboard.php">Voltar ao painel</a>
    <?php endif; ?>
  </div>
</body>
</html>