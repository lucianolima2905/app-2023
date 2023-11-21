<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="login-container">
    <div class="login-container">
        <img src="img/logo.png" alt="Logo da Empresa" class="logo">
        <h2>Login</h2>
        <form method="post" action="processar_login.php">
            <label for="email">E-mail:</label>
            <input type="email" name="email" required><br><br>
            
            <label for="senha">Senha:</label>
            <input type="password" name="senha" required><br><br>

            <input type="submit" value="Entrar">
        </form>
        <p>Ainda não tem uma conta? <a href="cadastro.php">Criar Conta</a></p>
    </div>
</body>
</html>
