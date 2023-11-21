<?php
$hostname = "sql201.infinityfree.com";
$username = "if0_35221686";
$password = "ZPTG6Z1bV3";
$database = "if0_35221686_renda";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
?>
