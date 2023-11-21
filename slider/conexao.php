<?php
$hostname = "localhost";
$usuario = "root";
$senha = "6CrwQCPb1Ur5aN";
$banco = "rendaextra";

// Conexão com o banco de dados
$conn = new mysqli($hostname, $usuario, $senha, $banco);

// Verifique a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
?>
