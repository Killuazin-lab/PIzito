<?php
function validarAtividade($respostas) {
    $data = [
        "usuarioId" => 1,  // Substituir com ID real do usuário logado
        "atividade" => "Stand Grupo 4",
        "respostas" => $respostas
    ];

    $ch = curl_init("http://localhost:8080/api/atividades/concluir");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return [$httpCode, $response];
}

// Se o formulário foi enviado
$mensagem = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $respostas = [
        $_POST['q1'] ?? '',
        $_POST['q2'] ?? '',
        $_POST['q3'] ?? ''
    ];

    list($codigo, $resposta) = validarAtividade($respostas);

    if ($codigo === 200) {
        $mensagem = "<p style='color: green;'>✅ Atividade concluída com sucesso! +10 pontos 🎉</p>";
    } else {
        $mensagem = "<p style='color: red;'>❌ Respostas incorretas. Tente novamente!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Stand Grupo 4</title>
</head>
<body>
    <h1>📍 Stand Grupo 4</h1>
    <p>Responda o questionário para validar sua visita ao stand.</p>

    <?= $mensagem ?>

    <form method="POST">
        <label>1. Qual o tema do projeto?</label><br>
        <input type="radio" name="q1" value="A"> Sustentabilidade<br>
        <input type="radio" name="q1" value="B"> Tecnologia para saúde<br>
        <input type="radio" name="q1" value="C"> Automação residencial<br><br>

        <label>2. Qual linguagem principal foi usada?</label><br>
        <input type="radio" name="q2" value="A"> JavaScript<br>
        <input type="radio" name="q2" value="B"> Python<br>
        <input type="radio" name="q2" value="C"> Java<br><br>

        <label>3. Quantos integrantes há no grupo?</label><br>
        <input type="radio" name="q3" value="A"> 3<br>
        <input type="radio" name="q3" value="B"> 4<br>
        <input type="radio" name="q3" value="C"> 5<br><br>

        <button type="submit">✅ Validar Atividade</button>
    </form>
</body>
</html>
