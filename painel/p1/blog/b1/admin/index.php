
<?php
  ############################################
  # @Autor : Luan Alves
  # 2017
  # Script OpenSource, Livre para comercialização caso adiquirido por meios legais
  # Direitos de Back-End Reservado a Luan Alves
  # Direitos de Front-End(Blog) Reservado a Luan Alves
  # Direitos de Front-End(Área adminstrativa) Reservado a luminoAdmin
  # http://scriptmundo.com
  ############################################


//Segurança contra invasões
require_once 'model/seguranca.php';

//Caso exista a Váriavel Sair Destroy a sessão e redireciona para página login
if(isset($_GET['sair'])){
unset($_SESSION['logado']);
$_SESSION['deslogado'] = "Deslogado Do Sistema!";
header('Location: login.php');
}

//Todos os dados do banco de dados
require_once 'model/dados.php';

//Cabeçalho
require_once 'include/head.php';

//menu
require_once 'include/menu.php';

//Sidebar
require_once 'include/sidebar.php';



//Começo da paginação

//Definição das Páginas
$pag[1] = 'home.php';
$pag[2] = 'widgets.php';
$pag[3] = 'posts.php';
$pag[4] = 'new-post.php';
$pag[5] = 'coments.php';
$pag[6] = 'config.php';
$pag[7] = 'perfil.php';
$pag[8] = 'edita/post.php';
$pag[9] = 'msg.php';


//Inclusão da página conforme a Várialvel GET
if(isset($_GET['link'])){
  $link = $_GET['link'];

    if(is_file('pages/'.$pag[$link])){

  include_once('pages/'.$pag[$link]);
     }else{

       include_once('pages/'.$pag[1]);
    }
}else{
       include_once('pages/'.$pag[1]);
}


//Script e Corpo final da página
require_once 'include/script.php';
?>
