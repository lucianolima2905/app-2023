<?php
session_start();
require_once('../conexao/conexao.php');

$dominio = $_SERVER['SERVER_NAME']."/blog";

//Rcebendo os dados do Formul�rio
$post_name = $_GET['post_name'];
$id_post   = $_GET['id_post'];
$nome      = $_POST['nome'];
$email     = $_POST['email'];
$coment    = $_POST['coment'];


//Fun��o Slug para retornar ao post
 function slug( $string ){
   return preg_replace('/[ -]+/' , '-' , $string);
}

$slug = strtolower($post_name);
$slugc = ereg_replace("[^a-zA-Z0-9]", "-", strtr($slug, "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr", "aaaaeeiooouucAAAAEEIOOOUUC_"));

$slug_final = slug($slugc);



//Criando a imagem do usuario do gravatar com seu email

$img = "http://2.gravatar.com/avatar/".md5($email)."?s=100&d=mm&r=g";

$sql = "INSERT INTO comentarios (id_post, img, email, nome, coment) VALUES ('$id_post','$img','$email','$nome','$coment')";
 if(mysqli_query($conn, $sql)){

	 $_SESSION['coment'] = $nome;

       //Cria a notificação
      $tipo    = "1";
      $sql_n   = "INSERT INTO notifica (nome,email,tipo) VALUES ('$nome','$email','$tipo')";
      $execute = mysqli_query($conn, $sql_n);

	echo "<meta http-equiv=refresh content=0;URL=http://$dominio/post/$slug_final/$id_post/#comentarios>";

 }else{
	 echo "<meta http-equiv=refresh content=0;URL=http://$dominio/post/$slug_final/$id_post/&error#comentarios> ";
 }





?>
