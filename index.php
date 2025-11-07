<?php
include 'conexao.php';

//Define uma consulta SQL que seleciona 
//colunas  id, nome e idade da tabela pessoa
$sql = "SELECT id, nome, idade FROM pessoas";

// Executa a consulta SQL usando Objeto
// de conexão $conn e armazena o resultado em $result
$result = $conn->query($sql);

$row = $result ->fetch_assoc();

echo $row ["id"] . "<br>" . $row ["nome"] . "<br>" .$row ["idade"];




?>