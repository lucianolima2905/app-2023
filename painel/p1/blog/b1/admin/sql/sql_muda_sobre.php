<?php
session_start();

//Verifica se O post foi enviado e se o Admin está logado
if((isset($_POST['sobre'])) && (isset($_SESSION['logado']))){

  //Inclui a conexão com o servidor
  include_once('../../app/conexao/conexao.php');

//Recebendo o dado do Formulário
$sobre    = $_POST['sobre'];


//Formando a query
$sql = "UPDATE configura SET sobre_site='$sobre'";
if(mysqli_query($conn, $sql)){
    echo "<meta http-equiv='refresh' content='0; url=../index.php?link=6&sucess'>";
}else{
  echo "<meta http-equiv='refresh' content='0; url=../index.php?link=6&erro'>";
}


}else{
  //Caso o post não foi enviado ou o Admin não esteja logado envia para a página de posts
  echo "<meta http-equiv='refresh' content='0; url=../index.php?link=3&select_up'>";
}


?>
