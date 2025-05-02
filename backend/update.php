<?php

  include("conexao.php");

  header("Access-Control-Allow-Origin: *");

  $nome = $_POST['nome'] ?? '';
  $preco = $_POST['preco'] ?? 0;
  $descricao = $_POST['descricao'] ?? '';
  $categoria = $_POST['categoria'] ??'';
  $fornecedor = $_POST['fornecedor'] ?? '';

  $stmt = $conn->prepare("UPDATE produtos SET nome = ?, preco = ?, descricao = ?, categoria = ?, fornecedor = ?");
  $stmt->bind_param("sdsss", $nome, $preco, $descricao, $categoria, $fornecedor);

  if ($stmt->execute()) {
      echo "Produto atualizado.";
  } else {
      echo "Erro: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();

?>