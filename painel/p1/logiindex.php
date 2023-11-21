<?php
require_once("config.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["senha"])) {
            if ($row["bloqueado"] == 0) {
                // Usuário não está bloqueado, direcione para a página "Painel"
                $_SESSION['user_id'] = $row["id"];
                header("Location: painel");
            } else {
                // Usuário está bloqueado, direcione para a página "Área Restrita"
                header("Location: area_restrita.php");
            }
        } else {
            // Senha incorreta
            header("Location: login.php?error=senha-incorreta");
        }
    } else {
        // Usuário não encontrado
        header("Location: login.php?error=usuario-nao-encontrado");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form method="post">
    <img src="http://apprenda.000.pe/painel/wp-content/uploads/2023/08/Grupo-2-2.png" alt="Seu Logotipo" class="logo">
    Email: <input type="email" name="email" required><br>
    Senha: <input type="password" name="password" required><br>
    <input type="submit" value="Entrar">
</form>

    <script src="script.js"></script>
</body>
</html>
