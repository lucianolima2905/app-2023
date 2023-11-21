<?php
session_start();

//Verifica se o Admin está logado
if(isset($_SESSION['logado'])){

  //Inclui a conexão com o servidor
  include_once('../../app/conexao/conexao.php');

      //Recebendo o dado da GET
      $id  = $_GET['id'];

    //Apaga o contato referente
    $del_coment = "DELETE FROM contato WHERE id=$id";

    if(mysqli_query($conn, $del_coment)){
       //Caso consiga apagar o contato redireciona com a variavel sucess
      echo "<meta http-equiv='refresh' content='0; url=../index.php?link=9&sucess_del'>";
    }else{
      //Caso não apague o contato redireciona com a variavel erro_del
       echo "<meta http-equiv='refresh' content='0; url=../index.php?link=9&erro_del'>";
    }

}else{
  //Caso o Admin não esteja logado envia para a página de posts
  echo "<meta http-equiv='refresh' content='0; url=../index.php?link=3'>";
}
?>
