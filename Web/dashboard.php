<?php include('includes/auth.php'); ?>
<h2>Olá, <?php echo $_SESSION['nome']; ?>!</h2>
<p>Seus pontos: 
<?php 
  include('includes/conexao.php');
  $stmt = $conn->prepare("SELECT pontos FROM usuario WHERE id = ?");
  $stmt->execute([$_SESSION['usuario_id']]);
  echo $stmt->fetchColumn();
?>
</p>
<a href="logout.php">Sair</a>