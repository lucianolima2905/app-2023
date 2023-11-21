<?php
if(file_exists('app/instal.php')){
  include_once('app/conexao/conn.php');
}else{

session_id('TOTAL');
session_start();


require_once('app/conexao/conexao.php');

require_once('app/include/sessoes.php');

require_once('app/include/model.php');

$dominio = $site['dominio'];;

$ip = $_SERVER["REMOTE_ADDR"];

function slug( $string ){
  return preg_replace('/[ -]+/' , '-' , $string);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <title><?php
  //VERIFICANDO QUAL SERÁ O TITULO DA PÁGINA
  if(isset($_GET['url'])){
    $url_title = $_GET['url'];
    $url_title = array_filter(explode('/',$url_title));

    //SE A VARIAVEL FOR IGUAL A POST ELE VAI BUSCAR O TITULO DO POST E ACRESCENTAR COMO TITULO DA PÁGINA
    if($url_title[0] == "post"){

      $post_title = end($url_title);
      if(is_numeric($post_title)){

        //FAZ A CONSLUTA DO POST COM O ID VINDO PELA URL
        $sql_title    = "SELECT * FROM posts WHERE id='$post_title'";
        $query_title  = mysqli_query($conn, $sql_title);
        $ver_title    = mysqli_num_rows($query_title);

        if($ver_title > 0){

          $result_title = mysqli_fetch_assoc($query_title);
          echo  $result_title['titulo'];
        }else{
          //SE O POST NÃO EXISTIR O TITULO SERÁ O SEGUINTE
          echo "Postagem não existe";
        }
      }

      //SE A VARIAVEL NÃO FOR POR POST E FOR OUTRAS PÁGINA ELE DA O TITULO DA PÁGINA CONFORME A MESMA
    }elseif($url_title[0] == "contato"){
      echo "Contato";
    }
    elseif($url_title[0] == "home"){
      echo $site['titulo_site'];
    }
    elseif($url_title[0] == "sobre"){
      echo "Sobre";
    }
    else{
      //CASO A PÁGINA NÃO EXISTE DA O TITULO DA PÁGINA 404
      echo "Página não encontrada!";
    }
  }else{
    //CASO NÃO EXISTA VARIAVEL NEHUMA DA O TITULO ORIGINAL DO BLOG
    echo $site['titulo_site'];
  }

  ?></title>
  <!-- Folhas de Estilos CSS3 conforme o tamanho da tela -->
  <link rel="stylesheet" media="screen and (min-width: 0px)" href="http://<?php echo $dominio;?>/app/css/mobile.css" />
  <link rel="stylesheet" media="screen and (min-width: 550px)" href="http://<?php echo $dominio;?>/app/css/medium-desktop.css" />
  <link rel="stylesheet" media="screen and (min-width: 950px)" href="http://<?php echo $dominio;?>/app/css/desktop.css" />
  <meta name="keywords" content="<?php echo $site['tags_site']?>"/>
  <meta name="description" content="<?php echo $site['descricao_site']?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- ICONS -->
  <script src="https://.use.fontawesome.com/dcc0c27760.js"></script>
  <link rel="stylesheet" href="http://<?php echo $dominio;?>/app/css/css/font-awesome.min.css">
  <!-- COMPARTILHAMENTO -->
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59c680bd691ed835"></script>
</head>
<body>
  <?php




  if(isset($_GET['url'])){
    if(empty($_GET['url'])){
    }else{

      $url  = $_GET['url'];

      $url = array_filter(explode('/',$url));

      $file = $url[0].'.php';
      if(is_file('app/'.$file)){


        if($file == "post.php"){

          $post = end($url);
          if(is_numeric($post)){

            //FAZ A CONSLUTA DO POST COM O ID VINDO PELA URL
            $sql    = "SELECT * FROM posts WHERE id='$post'";
            $query  = mysqli_query($conn, $sql);
            $ver    = mysqli_num_rows($query);

            $situ = "1";
            //TRaz os comentários dos Posts Segundo seu id
            $sql_coment_post    = "SELECT * FROM comentarios WHERE id_post='$post' AND situ='$situ' ORDER BY id DESC";
            $query_coment_post  = mysqli_query($conn, $sql_coment_post);
            if($query_coment_post == true){
              $ver_coment_post    = mysqli_num_rows($query_coment_post);
            }



            if($ver > 0){

              $result = mysqli_fetch_assoc($query);
            }
            include_once('app/'.$file);


          }else{
            header('Location: http://'.$dominio.'/');
          }

        }else{
          include_once('app/'.$file);
        }
      }else{
        include_once('app/404.php');
      }
    }
  }else{
    include_once('app/home.php');
  }
  ?>
</body>
</html>
<?php } ?>
