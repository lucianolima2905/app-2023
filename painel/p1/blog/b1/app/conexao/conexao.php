<?php
//CONEXÃO COM O BANCO DE DADOS

include_once('had_conn.php');

$conn = mysqli_connect($host, $user, $senha, $bd);
//Acentuação Correta para caracteres especiais
mysqli_set_charset($conn, 'utf8');

?>
