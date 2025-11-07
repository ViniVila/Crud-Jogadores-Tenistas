<?php

// Definir o endereço do servidor onde o Myslq esta rodando

$servername = "localhost";
// Nome do usuariodo banco de dados Mysql

$username = "root";
// Senha do usuario do banco de dadis Mysql


$password = "Senai@118";
//Nome do banco dedados que sera usado na conexão

$dbname = "Teste_conexao";

$conn =new mysqli ($servername, $username, $password, $dbname);

if ($conn->connect_error){
    echo "erro de conexão:" . $conn->connect_error;
} else{
    echo "Conexão bem-sucedida! <br>";
}











?>