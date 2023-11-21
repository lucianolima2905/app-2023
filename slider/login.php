<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="process_login.php" method="post">
            <label for="username">Nome de usuário:</label>
            <input type="text" name="username" required><br>

            <label for="password">Senha:</label>
            <input type="password" name="password" required><br>

            <input type="submit" value="Entrar">
        </form>
        <p>Não tem uma conta? <a href="register.php">Registre-se aqui</a></p>
    </div>
</body>
</html>
