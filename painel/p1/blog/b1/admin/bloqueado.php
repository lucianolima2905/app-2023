<?php session_start();?>
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
				<div class="panel-heading">IP BLOQUEADO</div>
         &nbsp; &nbsp;<span class="text-danger"><?php echo $_SERVER['REMOTE_ADDR'];?></span>
				<div class="panel-body">
            <div class="alert alert-danger">
              SEU IP FOI BLOQUEADO POR VÁRIAS TENTATIVAS DE ACESSAR UMA ÁREA RESTRITA DO WEBSITE,
              CASO VOCÊ ACREDITE QUE ESTÁ VENDO ESTÁ MENSAGEM POR ENGANO ENTRE EM CONTATO COM O ADMINISTRADOR DO SITE!
            </div>
        </div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->


<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
