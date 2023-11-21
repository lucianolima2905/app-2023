<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Registro</h2>
        <form action="process_register.php" method="post">
            <label for="username">Nome de usuário:</label>
            <input type="text" name="username" required><br>

            <label for="password">Senha:</label>
            <input type="password" name="password" required><br>

            <input type="submit" value="Registrar">
        </form>
        <p>Já tem uma conta? <a href="index.php">Faça login aqui</a></p>
    </div>
</body>
</html>
