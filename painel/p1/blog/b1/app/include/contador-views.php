<?php

if(isset($result)){
//Se existir a postagem solicitada ele Executa as Seguintes Funções


//Id do Post
$id = $result['id'];


//Cria o Arquivo de Views com o nome o id do Post para registrar os ips, se ele não existir
$arquivo = 'app/include/txt/views/'.$id.'-post.txt';
if (file_exists($arquivo)){}else{
	$file   = file_put_contents($arquivo,'0');
}

//Verefica se o Ip do usuario ja visitou esta Postagem
$arquivo = 'app/include/txt/views/'.$id.'-post.txt';
$buscapor = $ip;
$conteudo = file_get_contents($arquivo);
$parte = explode("\n", $conteudo);
$base = preg_quote($buscapor, '/');
$base = "/^.*$base.*\$/m";
if(preg_match_all($base, $parte[0], $achado)){
	//Se o usuario ja visitou esta postagem não faz nada
	}else{
		//Se não ele acresenta mais uma views para este Post e registra o IP do usuario

		//Atualiza a pagina para contar as views
		echo "<meta http-equiv=refresh content=0;URL= /> ";

	   $sql = "UPDATE posts SET views = views + 1 WHERE id='$id'";
	   $execute = mysqli_query($conn, $sql);

     $arquivo = "app/include/txt/views/".$id."-post.txt";
	   $text = ",'".$ip."'";
	   $file = fopen($arquivo, 'a');
	   fwrite($file, $text);
	   fclose($file);

   }
}
?>
