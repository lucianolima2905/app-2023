<?php
session_start();

//Verifica se o post foi enviado
if(isset($_POST['nome'])){

//Conexão com o servidor
include_once('../conexao/conexao.php');

//Recebendo os dados do formulário
$nome   = $_POST['nome'];
$email  = $_POST['email'];
$msg    = $_POST['msg'];


//Criando a query
$sql = "INSERT INTO contato(nome,email,texto) VALUES ('$nome','$email','$msg')";
  //Verefica se foi possivel enviar a mensagem de contado
  if(mysqli_query($conn, $sql)){

         //Cria a notificação
        $tipo    = "0";
        $sql_n   = "INSERT INTO notifica (nome,email,tipo) VALUES ('$nome','$email','$tipo')";
        $execute = mysqli_query($conn, $sql_n);


    //Se conseguio enviar cai aqui
    $_SESSION['ok'] = 'Mensagem de contato enviada!'; //Mensagem de informação

    //Redirecionamento para a página contato
    header('Location: ../../contato');

  }else{
    //Se não cai aqui
    $_SESSION['erro'] = 'Ocorreu algum erro ao enviar a mensagem!'; //Mensagem de informação

    //Redirecionamento para a página contato
    header('Location: ../../contato');
  }

}

?>
