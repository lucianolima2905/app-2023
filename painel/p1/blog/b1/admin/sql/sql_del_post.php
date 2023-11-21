<?php
session_start();

//Verifica se O post foi enviado e se o Admin está logado
if((isset($_POST['id'])) && (isset($_SESSION['logado']))){

  //Inclui a conexão com o servidor
  include_once('../../app/conexao/conexao.php');

  //Recebendo o dado do Formulário
  $id  = $_POST['id'];
  $img = $_POST['img'];

  //Excluindo a imagem do post do diretório
  unlink('../../app/img-post/' . $img);

  //Formando a Query
  $sql = "DELETE FROM posts WHERE id=$id";

  if(mysqli_query($conn, $sql)){
    //Verifica se foi possivel deletar o post, caso consiga, Apaga os comentários referentes ao post
    $del_coment = "DELETE FROM comentarios WHERE id_post=$id";
    if(mysqli_query($conn, $del_coment)){
       //Caso consiga apagar o post e os comentários redireciona com a variavel sucess
      echo "<meta http-equiv='refresh' content='0; url=../index.php?link=3&sucess'>";
    }else{
      //Caso apague o post mas não o comentário redireciona com a variavel erro_coment
       echo "<meta http-equiv='refresh' content='0; url=../index.php?link=3&erro_coment'>";
    }

  }else{
    //Se não foi possivel deletar, redireciona para a página de posts com a variavel del_erro
    echo "<meta http-equiv='refresh' content='0; url=../index.php?link=3&del_erro'>";
  }

}else{
  //Caso o post não foi enviado ou o Admin não esteja logado envia para a página de posts
  echo "<meta http-equiv='refresh' content='0; url=../index.php?link=3&select'>";
}


?>
