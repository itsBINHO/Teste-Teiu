<?php

include("conexao.php");

// CORS headers
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Max-Age: 86400");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Lê o corpo JSON da requisição
$data = json_decode(file_get_contents('php://input'), true);

// Verifica se todos os campos foram enviados
if (
    isset($data['id']) && isset($data['nome']) && isset($data['preco']) &&
    isset($data['descricao']) && isset($data['categoria']) && isset($data['fornecedor'])
) {
    $id = $data['id'];
    $nome = $data['nome'];
    $preco = $data['preco'];
    $descricao = $data['descricao'];
    $categoria = $data['categoria'];
    $fornecedor = $data['fornecedor'];
    $frete = $data['frete'];

    $stmt = $conn->prepare("UPDATE produtos SET nome = ?, preco = ?, descricao = ?, categoria = ?, fornecedor = ?, frete = ? WHERE id = ?");
    $stmt->bind_param("sdsssid", $nome, $preco, $descricao, $categoria, $fornecedor, $frete, $id);

    if ($stmt->execute()) {
        echo json_encode(["mensagem" => "Produto atualizado com sucesso!"]);
    } else {
        echo json_encode(["mensagem" => "Erro ao atualizar: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["mensagem" => "Dados incompletos para atualização."]);
}

$conn->close();
?>
