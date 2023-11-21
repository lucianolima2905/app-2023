<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Insira os dados na tabela de usuários (certifique-se de usar funções de hash para senhas)
    $sql = "INSERT INTO usuarios (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
    } else {
        echo "Erro no registro: " . $conn->error;
    }
}

$conn->close();
?>
