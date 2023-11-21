<?php
$host = "localhost";
$usuario = "rendaext_bet";
$senha = "1529051983gg@A";
$banco_de_dados = "rendaext_renda";

$conexao = mysqli_connect($host, $usuario, $senha, $banco_de_dados);

if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}
?>
