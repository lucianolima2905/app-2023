<?php
//Inicio da Sessão
session_start();

//CONEXÃO COM O DATA BASE
require_once '../app/conexao/conexao.php';

//IP DO USUÁRIO
$ip    = $_SERVER['REMOTE_ADDR'];

//CONSULTA SE O IP ESTÁ BLOQUEADO
$consult_ip = "SELECT * FROM ips WHERE ip='$ip'";
$query_ip   = mysqli_query($conn, $consult_ip);
$retorno_ip = mysqli_fetch_assoc($query_ip);
if($retorno_ip >0){
  if($retorno_ip['situ'] == "1"){
      header('Location: bloqueado.php');
  }
}


//Verificando se o Usuário realmente está logado no sistema
if(empty($_SESSION['logado'])){

  //CONSULTA SE O IP DO ADMINISTRADOR DO SITE
  $consult_ip_adm = "SELECT * FROM user WHERE ip='$ip'";
  $query_ip_adm   = mysqli_query($conn, $consult_ip_adm);
  $retorno_ip_adm = mysqli_fetch_assoc($query_ip_adm);


   //VERIFICA SE É O ADMINISTRADOR DO SITE QUE ESTÁ TENTANDO ACESSAR
   if($retorno_ip_adm <1){
  $_SESSION['restrito'] = "Está área é Restrita, seu IP foi Resgistrado Por segurança, caso tente acessar está área 3 vezes sem estar logado seu IP Será Bloqueado!";
  $_SESSION['blok'] = "";
     }
  header('Location: login.php');
  }

  if(isset($_SESSION['blok'])){
  //IP DO USUÁRIO
  $ip    = $_SERVER['REMOTE_ADDR'];

  //CONSULTA O IP
  $consult = "SELECT * FROM ips WHERE ip='$ip'";
  $query_c = mysqli_query($conn, $consult);
  $retorno = mysqli_fetch_assoc($query_c);

  //SE O IP JÁ ESTIVER REGISTRADO VERIFICA QUANTAS TENTATIVAS DE ACESSO ELE POSSUI
  if(($retorno >0) && ($retorno['ip'] == $ip)){
    if(($retorno['num'] >3) || ($retorno['num'] == 3)){
     //SE FOR IGUL A 3 OU MAIS ELE BLOQUEIA O IP
     $situ = "1";
     $sql   = "UPDATE ips SET situ='$situ'";
     $query = mysqli_query($conn,$sql);
     header('Location: bloqueado.php');

   }else{
    //SE NÃO FOR ELE SOMA MAIS 1 NO IP DO USUÁRIO
    $num   = $retorno['num'] + 1;
    $sql   = "UPDATE ips SET num='$num'";
    $query = mysqli_query($conn,$sql);

    }
  }else{
  //SE NÃO ESTIVER REGISTRADO REGISTRA
  $num = "1";
  $sql   = "INSERT INTO ips (ip, num) VALUES ('$ip', '$num')";
  $query = mysqli_query($conn,$sql);
 }

}

?>
