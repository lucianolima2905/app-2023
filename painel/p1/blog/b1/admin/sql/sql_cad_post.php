<?php
session_start();

 date_default_timezone_set('America/Sao_Paulo');

$data = date('d/m/Y'); //Dia Atual
$hora = date('H:i'); //Hora Atual

//Verifica se O post foi enviado e se o Admin está logado
if((isset($_POST['titulo'])) && (isset($_SESSION['logado']))){

  //Inclui a conexão com o servidor
  include_once('../../app/conexao/conexao.php');

  //Recebendo os dados do Formulário
  $titulo   = $_POST['titulo'];
  $desc     = $_POST['desc'];
  $conteudo = $_POST['content'];
  $autor    = $_POST['autor'];

  //Movendo a imagem para o diretorio de img-post
  $dir      = "../../app/img-post/";
  $nome_img =  md5(date('H:i:s')).".jpg";

  if(move_uploaded_file($_FILES['img']['tmp_name'], $dir . $nome_img)){
       //Se conseguir mover a foto para o diretório continua o script
    }else{
      //Caso não consigua contiunua o script mas sem colocar a img no diretorio e ria uma sessão para informar o adm
      $_SESSION['erro_img'] = "";
    }

    $sql = "INSERT INTO posts (titulo,descricao,conteudo,img,autor,hora,data) VALUES ('$titulo','$desc','$conteudo','$nome_img','$autor','$hora','$data')";
    if(mysqli_query($conn, $sql)){
      //Caso ele cadastre o novo post redireciona com a varial sucess_cad
     echo "<meta http-equiv='refresh' content='0; url=../index.php?link=3&sucess_cad'>";
    }else{
      //Caso ele não consiga redireciona co o variavel erro_cad
      echo "<meta http-equiv='refresh' content='0; url=../index.php?link=3&erro_cad'>";
    }

  }else{
    //Caso o post não foi enviado ou o Admin não esteja logado envia para a página de posts
    echo "<meta http-equiv='refresh' content='0; url=../index.php?link=3&select_cad'>";
}


?>
