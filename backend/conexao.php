<?php

    $hostname = "localhost";
    $username = "root";
    $password = "Limitbreaker2020!";
    $database = "dbproducts";

    // Cria a conexão com o banco de dados e a verifica
    $conn = new mysqli($hostname, $username, $password, $database);

    if ($conn->connect_error) {
        die("A Conexão falhou: " . $conn->connect_error);
    } 
?>