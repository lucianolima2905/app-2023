<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Cadastro</h2>
        <form method="post" action="processar_cadastro.php">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required><br><br>
            
            <label for="email">E-mail:</label>
            <input type="email" name="email" required><br><br>
            
            <label for="senha">Senha:</label>
            <input type="password" name="senha" required><br><br>

            <input type="submit" value="Cadastrar">
        </form>
        <p>Já tem uma conta? <a href="index.php">Faça login</a></p>
    </div>
</body>
</html>
