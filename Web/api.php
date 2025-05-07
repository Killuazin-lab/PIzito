<?php
// Dados da atividade
$data = [
    "usuarioId" => 1,
    "atividade" => "Stand Grupo 4",
    "respostas" => ["A", "C", "B"]
];

// Configuração da requisição cURL
$ch = curl_init("http://localhost:8080/api/atividades/concluir");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Interpretação do resultado
if ($httpCode === 200) {
    echo "Atividade concluída com sucesso!";
} else {
    echo "Erro ao validar atividade. Tente novamente.";
}
?>
