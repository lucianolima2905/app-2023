<?php
session_start();

//Verifica se O post foi enviado e se o Admin está logado
if((isset($_POST['nome'])) && (isset($_SESSION['logado']))){

  //Inclui a conexão com o servidor
  include_once('../../app/conexao/conexao.php');

//Recebendo o dado do Formulário
$nome     = $_POST['nome'];
$email    = $_POST['email'];
$user     = $_POST['user'];
$senha    = $_POST['senha'];

if(empty($senha)){

  //Formando a query
  $sql = "UPDATE user SET nome='$nome', email='$email', user='$user'";
  if(mysqli_query($conn, $sql)){
      echo "<meta http-equiv='refresh' content='0; url=../index.php?link=6&sucess'>";
  }else{
    echo "<meta http-equiv='refresh' content='0; url=../index.php?link=6&erro'>";
  }

}else{

  $senha_c   = substr(md5(sha1(md5(base64_encode($_POST['senha'])))), 0, 20);

  //Formando a query
  $sql = "UPDATE user SET nome='$nome', email='$email', user='$user', senha='$senha_c'";
  if(mysqli_query($conn, $sql)){
      echo "<meta http-equiv='refresh' content='0; url=../index.php?link=6&sucess'>";
  }else{
      echo "<meta http-equiv='refresh' content='0; url=../index.php?link=6&erro'>";
  }
}

}else{
  //Caso o post não foi enviado ou o Admin não esteja logado envia para a página de posts
  echo "<meta http-equiv='refresh' content='0; url=../index.php?link=3&select_up'>";
}


?>
