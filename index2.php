<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Jogadores</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "Senai@118";
$dbname = "formulario";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS Jogadores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jogador VARCHAR(255),
    ano_mundial INT
)";
$conn->query($sql);

// *** EXCLUIR REGISTRO ***
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $conn->query("DELETE FROM Jogadores WHERE id = $id");
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

$edit_id = "";
$edit_jogador = "";
$edit_ano = "";

if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $resEdit = $conn->query("SELECT * FROM Jogadores WHERE id = $edit_id");
    $linhaEdit = $resEdit->fetch_assoc();
    $edit_jogador = $linhaEdit['jogador'];
    $edit_ano = $linhaEdit['ano_mundial'];
}

// *** INSERIR OU ATUALIZAR ***
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jogador = $_POST["modelo"];
    $ano_mundial = $_POST["ano"];
    $idForm = $_POST["idHidden"];

    if ($jogador == "" || $ano_mundial == "" || $ano_mundial <= 0) {
        echo "Preencha os campos corretamente.<br><br>";
    } else {
        if ($idForm == "") {
            $sqlInsert = "INSERT INTO Jogadores (jogador, ano_mundial) VALUES ('$jogador', $ano_mundial)";
            $conn->query($sqlInsert);
        } else {
            $sqlUpdate = "UPDATE Jogadores SET jogador='$jogador', ano_mundial=$ano_mundial WHERE id=$idForm";
            $conn->query($sqlUpdate);
        }

        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
}

// FORMULÁRIO
echo '
<form method="POST">
    <input type="hidden" name="idHidden" value="'.$edit_id.'">
    Jogador: <input type="text" name="modelo" value="'.$edit_jogador.'"><br>
    Ano que venceu o mundial: <input type="number" name="ano" value="'.$edit_ano.'"><br><br>
    <input type="submit" value="'.($edit_id ? 'Salvar Edição' : 'Cadastrar').'">
</form><br>
';

echo "<h3>Jogadores cadastrados 🏓</h3>";

$sqlAll = "SELECT * FROM Jogadores";
$result = $conn->query($sqlAll);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr><th>ID</th><th>Jogador</th><th>Ano Mundial</th><th>Ação</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["jogador"]."</td>
                <td>".$row["ano_mundial"]."</td>
                <td>
                    <a href='?edit_id=".$row["id"]."'>Editar</a> | 
                    <a href='?delete_id=".$row["id"]."' onclick=\"return confirm('Deseja realmente excluir?');\">Excluir</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum jogador cadastrado.<br>";
}

$sqlCount = "SELECT COUNT(*) AS total FROM Jogadores";
$resCount = $conn->query($sqlCount);
$linhaCount = $resCount->fetch_assoc();
echo "<br>Total de jogadores: " . $linhaCount['total'] . "<br>";

$conn->close();
?>

</body>
</html>
