<?php
session_start();

//Verifica se O post foi enviado e se o Admin está logado
if((isset($_POST['titulo'])) && (isset($_SESSION['logado']))){

  //Inclui a conexão com o servidor
  include_once('../../app/conexao/conexao.php');

//Recebendo o dado do Formulário
$titulo    = $_POST['titulo'];
$descricao = $_POST['descricao'];
$tags      = $_POST['tags'];
$dominio   = $_POST['dominio'];
$face      = $_POST['face'];
$twitter   = $_POST['twitter'];
$yt        = $_POST['yt'];


//Formando a query
$sql = "UPDATE configura SET titulo_site='$titulo', descricao_site='$descricao', tags_site='$tags', face_site='$face', twitter_site='$twitter', yt_site='$yt', dominio='$dominio'";
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
