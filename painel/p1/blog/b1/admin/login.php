<?php
if(file_exists('../app/instal.php')){
  unlink('../app/instal.php');
	unlink('../app/conexao/fim.php');
	unlink('../app/conexao/criar.php');
	unlink('../app/conexao/conn.php');
	unlink('../app/conexao/blog.sql');
}

session_start();


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Área restrita - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Área Restrita</div>
				<div class="panel-body">
					<form action="model/valida.php" method="post" role="form">
						<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="Usuário" name="user" type="text" autofocus="">
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Sua Senha" name="senha" type="password" value="">
								</div>
								<button type"submit" class="btn btn-primary">Entrar</button>
						</fieldset>
					</form>
					<br />
             <?php if(isset($_SESSION['restrito'])){
								 echo "<div class=\"alert alert-danger\">". $_SESSION['restrito'] ."</div>";
								 unset($_SESSION['restrito']);
								 unset($_SESSION['blok']);
							  }
							 if(isset($_SESSION['loginErro'])){
  								 echo "<div class=\"alert alert-danger\">". $_SESSION['loginErro'] ."</div>";
  								 unset($_SESSION['loginErro']);
  							 }
								 if(isset($_SESSION['deslogado'])){
	  								 echo "<div class=\"alert alert-success\">". $_SESSION['deslogado'] ."</div>";
	  								 unset($_SESSION['deslogado']);
	  							 }
                ?>

				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->


<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
