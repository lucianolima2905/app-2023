<?php
//CONEXÃO COM O DATA BASE
require_once '../../app/conexao/conexao.php';

session_start();

//O campo usuáo e senha preenchido entra no if para validar
	if((isset($_POST['user'])) && (isset($_POST['senha']))){
		$usuario = mysqli_real_escape_string($conn, $_POST['user']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$senha   = mysqli_real_escape_string($conn, $_POST['senha']);
    $senha   = substr(md5(sha1(md5(base64_encode($_POST['senha'])))), 0, 20);

		//Buscar na tabela usuario o usuáo que corresponde com os dados digitado no formulário
		$result_usuario    = "SELECT * FROM user WHERE user = '$usuario' && senha = '$senha' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado         = mysqli_fetch_assoc($resultado_usuario);

		//Encontrado um usuario na tabela user com os mesmos dados digitado no formulário
		if(isset($resultado)){
			$_SESSION['img']                         = $resultado['img'];
			$_SESSION['nome']                        = $resultado['nome'];
			$_SESSION['userId']                      = $resultado['id'];
			$_SESSION['senha']                       = $resultado['senha'];
			$_SESSION['user']                        = $resultado['user'];
      $_SESSION['logado']                      = $resultado['senha'];
				header("Location: ../index.php");
			}
		//Não foi encontrado um usuario na tabela user com os mesmos dados digitado no formulário
		//redireciona o usuario para a páginna de login
		else{
			//Várivel global recebendo a mensagem de erro
			$_SESSION['loginErro'] = "Usuário ou senha Inválido";
			header("Location: ../login.php");
		}
	//O campo usuáo e senha não preenchido entra no else e redireciona o usuáo para a página de login
	}else{
		$_SESSION['loginErro'] = "Usuário ou senha inválido";
		header("Location: ../login.php");
	}


?>
