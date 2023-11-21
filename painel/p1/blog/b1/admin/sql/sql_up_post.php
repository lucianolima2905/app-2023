<?php
session_start();

//Verifica se O post foi enviado e se o Admin está logado
if((isset($_POST['id'])) && (isset($_SESSION['logado']))){

  //Inclui a conexão com o servidor
  include_once('../../app/conexao/conexao.php');

  //Recebendo o dado do Formulário
  $id         = $_POST['id'];
  $data       = $_POST['data'];
  $hora       = $_POST['hora'];
  $titulo     = $_POST['titulo'];
  $descricao  = $_POST['desc'];
  $conteudo   = $_POST['content'];
  $img        = $_FILES['img']['name'];
  $autor      = $_POST['autor'];

//Pegando os dados do post caso a imagem sja alterada
$sql   = "SELECT * FROM posts WHERE id='$id'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);

//Mesmo nome da imagem
$img_mesma = $result['img'];

//Numero de views do post
$views = $result['views'];

      //VERIFICA SE A IMAGEM FOI ALTERADA
      if(empty($img)){
      //Caso a imagem não foi alterada faz UpDate dos dados do formulário menos a imagem
      $sql_up = "UPDATE posts SET titulo='$titulo',descricao='$descricao',conteudo='$conteudo',autor='$autor',hora='$hora',data='$data',views='$views' WHERE id='$id'";
        if(mysqli_query($conn, $sql_up)){
           //Caso consiga alterar redireciona com  avariavel sucess
           echo "<meta http-equiv='refresh' content='0; url=../?link=8&id=".$id."&sucess'>";

          }else{
            //Se não redireciona com a variavel erro
          echo "<meta http-equiv='refresh' content='0; url=../?link=8&id=".$id."&erro'>";
          }

        }else{
        //Caso a imagem foi alterada exclui a imagem anterior do diretorio
         unlink('../../app/img-post/' . $img_mesma);

             //Movendo a nova imagem para o diretorio
             $dir = '../../app/img-post/';
             $nome_img = md5(date('H:i:s'));

             if(move_uploaded_file($_FILES['img']['tmp_name'], $dir. $nome_img)){

               }else{
               //Caso não consiga mover a imagem para o diretorio cria uma sessão de erro para informar o adm
               $_SESSION['img_erro'] = "";
         }

         $sql_up = "UPDATE posts SET titulo='$titulo',descricao='$descricao',conteudo='$conteudo',img='$nome_img',autor='$autor',hora='$hora',data='$data',views='$views' WHERE id='$id'";
         if(mysqli_query($conn, $sql_up)){
             //Caso consiga alerar redireciona com  avariavel sucess
            echo "<meta http-equiv='refresh' content='0; url=../index.php?link=8&id=".$id."&sucess'>";
           }else{
             //Se não redireciona com a variavel erro
            echo "<meta http-equiv='refresh' content='0; url=../index.php?link=8&id=".$id."&erro'>";
           }

       }

}else{
  //Caso o post não foi enviado ou o Admin não esteja logado envia para a página de posts
  echo "<meta http-equiv='refresh' content='0; url=../index.php?link=3&select_up'>";
}


?>
