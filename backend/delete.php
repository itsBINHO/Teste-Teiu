<?php

  include("conexao.php");

  header("Access-Control-Allow-Origin: *");
  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM produtos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    
    if ($result->num_rows > 0) {
      $produto = $result->fetch_assoc();
    } else {
      echo "Produto não encontrado.";
      exit();
    }
    
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sql_delete = "DELETE FROM produtos WHERE id = ?";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bind_param("i", $id);
        
        if ($stmt_delete->execute()) {
            echo "Produto excluído com sucesso!";
        } else {
            echo "Erro ao excluir o produto: " . $stmt_delete->error;
        }

        $stmt_delete->close();
        $conn->close();
        exit();
    }
} else {
    echo "ID do produto não especificado.";
    exit();
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Produtos</title>
</head>
<body>
    <h1>Excluir Produto</h1>

    <?php if (isset($produto)):?>
    <p>Você tem certeza de que deseja excluir o produto?</p>
    
    <div>
        <h3>Detalhes do Produto</h3>
        <p><strong>Nome:</strong> <?php echo $produto['nome']; ?></p>
        <p><strong>Preço:</strong> R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
        <p><strong>Descrição:</strong> <?php echo $produto['descricao']; ?></p>
        <p><strong>Categoria:</strong> <?php echo $produto['categoria']; ?></p>
        <p><strong>Fornecedor:</strong> <?php echo $produto['fornecedor']; ?></p>
    </div>
    
    
    <form method="POST">
        <input type="submit" value="Sim, excluir produto" />
        <a href="create.php">Cancelar</a>
    </form>
    <?php endif; ?>
</body>
</html>