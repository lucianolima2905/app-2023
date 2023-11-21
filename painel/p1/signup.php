<?php
require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$name', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso. Faça login para acessar o painel.";
    } else {
        echo "Erro: " . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Cadastro</h1>
    <form method="post">
        Nome: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        Senha: <input type="password" name="password" required><br>
        <input type="submit" value="Cadastrar">
    </form>
    <script src="script.js"></script>
</body>
</html>
