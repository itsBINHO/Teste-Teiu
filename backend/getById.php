<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Max-Age: 86400");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

include("conexao.php");

$data = json_decode(file_get_contents("php://input"), true);
$id = isset($data['id']) ? intval($data['id']) : null;

if (!$id) {
    http_response_code(400);
    echo json_encode(["erro" => "ID do produto não fornecido."]);
    exit();
}

$stmt = $conn->prepare("SELECT * FROM produtos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($produto = $result->fetch_assoc()) {
    header('Content-Type: application/json');
    echo json_encode($produto);
} else {
    http_response_code(404);
    echo json_encode(["erro" => "Produto não encontrado."]);
}

$stmt->close();
$conn->close();
?>
