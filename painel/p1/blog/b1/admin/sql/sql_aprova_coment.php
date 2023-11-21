<?php
session_start();

//Verifica se O post foi enviado e se o Admin está logado
if(isset($_SESSION['logado'])){

  //Inclui a conexão com o servidor
  include_once('../../app/conexao/conexao.php');

      //Recebendo o dado do Formulário
      $id  = $_GET['id'];

    //Aprova o comentário referente
    $ap_coment = "UPDATE comentarios SET situ='1'";

    if(mysqli_query($conn, $ap_coment)){
       //Caso consiga aprovar o comentários redireciona com a variavel sucess_ap
      echo "<meta http-equiv='refresh' content='0; url=../index.php?link=5&sucess_ap'>";
    }else{
      //Caso não aprove o comentário redireciona com a variavel erro_ap
       echo "<meta http-equiv='refresh' content='0; url=../index.php?link=5&erro_ap'>";
    }

}else{
  //Caso o Admin não esteja logado envia para a página de posts
  echo "<meta http-equiv='refresh' content='0; url=../index.php?link=3'>";
}
?>
