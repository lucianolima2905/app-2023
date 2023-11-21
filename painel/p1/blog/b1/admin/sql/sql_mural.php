<?php
session_start();

//Verifica se O post foi enviado e se o Admin está logado
if((isset($_POST['mural'])) && (isset($_SESSION['logado']))){

  //Inclui a conexão com o servidor
  include_once('../../app/conexao/conexao.php');

  //Recebendo o dado do Formulário
  $mural  = $_POST['mural'];

  //Formando a Query
  $sql  = "UPDATE sidebar SET mural='$mural'";

  if(mysqli_query($conn, $sql)){
     //Caso consiga mudar o mural redireciona com a variavel sucess
     echo "<meta http-equiv='refresh' content='0; url=../index.php?link=2&sucess'>";
    }else{
    //Se não foi possivel mudar, redireciona para a página de posts com a variavel erro
    echo "<meta http-equiv='refresh' content='0; url=../index.php?link=2&erro'>";
  }

}else{

  echo "<meta http-equiv='refresh' content='0; url=../index.php?link=2&select'>";
}


?>
