<?php

header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Max-Age: 86400");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

include("conexao.php");

// 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $contentType = $_SERVER["CONTENT_TYPE"] ?? '';

    if (strpos($contentType, "application/json") !== false) {
        
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        $nome = $data['nome'] ?? null;
        $preco = $data['preco'] ?? null;
        $descricao = $data['descricao'] ?? null;
        $categoria = $data['categoria'] ?? null;
        $fornecedor = $data['fornecedor'] ?? null;
        $frete = $data['frete'] ?? null;
    } else {
        
        $nome = $_POST['nome'] ?? null;
        $preco = $_POST['preco'] ?? null;
        $descricao = $_POST['descricao'] ?? null;
        $categoria = $_POST['categoria'] ?? null;
        $fornecedor = $_POST['fornecedor'] ?? null;
        $frete = $_POST['frete'] ?? null;
    }

    if ($nome && $preco && $descricao && $categoria && $fornecedor && $frete) {
        $sql = "INSERT INTO produtos (nome, preco, descricao, categoria, fornecedor, frete) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdsssd", $nome, $preco, $descricao, $categoria, $fornecedor, $frete);

        if ($stmt->execute()) {
            echo json_encode(["mensagem" => "Produto cadastrado com sucesso!"]);
        } else {
            http_response_code(500);
            echo json_encode(["erro" => "Erro ao cadastrar: " . $stmt->error]);
        }

        $stmt->close();
    } else {
        http_response_code(400);
        echo json_encode(["erro" => "Todos os campos são obrigatórios."]);
    }
}

$conn->close();
?>
<?php   