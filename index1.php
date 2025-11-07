<?php

$servername = "localhost"; 
$username = "root"; 
$password = "Senai@118";     
$dbname = "teste_conexao"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// verifica se o formulario foi enviado via post 
if($_SERVER ["REQUEST_METHOD"]== "POST"){
//receber os valores enviados do formulario post no campo nome e idade

$nome = $_POST["nome"];
$idade = $_POST["idade"];

//mostrar uma consulta no sql para INSERIR valores no banco
$sql = "INSERT INTO pessoas (nome,idade) VALUES ('$nome', '$idade')"; // letras em maiuscula para pegar/adicionar no banco de dados
// executar a consulta do banco de dados
$conn->query($sql);

echo "Dados inseridos com sucesso!😁 <br>";

}else {
    echo "dados invalidos. Digite os dados corretos!";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>furmulario</title>
</head>
<body>
    <form method="POST">
      nome: <input type="text" name="nome"> <br>
      idade: <input type="number" name="idade"> <br>
      <input type="submit" values="adicionar">

    </form>
</body>
</html>