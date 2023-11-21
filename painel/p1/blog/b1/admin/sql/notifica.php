<?php

//Inclui a conexão com o servidor
include_once('../../app/conexao/conexao.php');

$sql     = "SELECT * FROM notifica";
$execute = mysqli_query($conn, $sql);
$cont    = mysqli_num_rows($execute);
if($cont >0){
  echo $cont;
}

?>
