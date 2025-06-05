<?php
session_start();

$clienteId = $_SESSION['usuario_id'];

// === Buscar dados do cliente
$ch = curl_init("http://localhost:8080/api/clientes/" . $clienteId);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$clienteResponse = curl_exec($ch);
curl_close($ch);
$cliente = json_decode($clienteResponse, true);

if (!is_array($cliente) || !isset($cliente['pesoKg'])) {
  echo "<h3>❌ Erro ao carregar dados do cliente.</h3>";
  echo "<pre>Resposta da API:\n$clienteResponse</pre>";
  exit;
}

$clienteNome = $cliente['descricao'];

// === Buscar tarefas concluídas
$ch2 = curl_init("http://localhost:8080/api/tarefa_cliente/cliente/" . $clienteId);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
$tarefasResponse = curl_exec($ch2);
curl_close($ch2);
$tarefas = json_decode($tarefasResponse, true);

$pontos = 0;
if (is_array($tarefas)) {
  foreach ($tarefas as $tarefa) {
    if (isset($tarefa['exercicio']['valor_pontos'])) {
      $pontos += $tarefa['exercicio']['valor_pontos'];
    }
  }
}

$resgates = floor($pontos / 10);

// === Buscar lista de exercícios
$ch3 = curl_init("http://localhost:8080/api/exercicios");
curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
$exerciciosResponse = curl_exec($ch3);
curl_close($ch3);
$exercicios = json_decode($exerciciosResponse, true);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    .carousel {
      display: flex;
      overflow-x: auto;
      gap: 20px;
      padding: 10px;
      scroll-snap-type: x mandatory;
    }
    .card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
      min-width: 250px;
      flex: 0 0 auto;
      padding: 15px;
      scroll-snap-align: start;
    }
    .card h4 {
      margin: 0 0 10px;
    }
  </style>
</head>
<body>
  <img src="assets/img/maromba.png" alt="Logo Maromba" class="logo-top-right">
  <div class="dashboard">
    <h2>Olá, <?php echo htmlspecialchars($clienteNome); ?>!</h2>
    <p><strong>Pontos acumulados:</strong> <?php echo $pontos; ?></p>
    <p><strong>Resgates de suco disponíveis:</strong> <?php echo $resgates; ?> 🧃</p>

    <hr>

    <h3>🏋️ Exercícios disponíveis</h3>
    <div class="carousel">
      <?php
      if (is_array($exercicios)) {
        foreach ($exercicios as $ex) {
          echo "<div class='card'>";
          echo "<h4>" . htmlspecialchars($ex['descricao']) . "</h4>";
          echo "<p><strong>Grupo muscular:</strong> " . htmlspecialchars($ex['grupo_muscular']) . "</p>";
          echo "<p><strong>Região:</strong> " . htmlspecialchars($ex['regiao_corpo']) . "</p>";
          echo "<p><strong>Pontos:</strong> " . $ex['valor_pontos'] . "</p>";
          echo "</div>";
        }
      } else {
        echo "<p>Erro ao carregar exercícios.</p>";
      }
      ?>
    </div>
  </div>
</body>
</html>
