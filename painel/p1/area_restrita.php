<?php
require_once("config.php");

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    $sql = "SELECT bloqueado FROM usuarios WHERE id = $user_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $bloqueado = $row['bloqueado'];
        
        if ($bloqueado == 0) {
            // Usuário não está bloqueado, mostrar conteúdo da área restrita
            echo "Bem-vindo à área restrita!";
            // Inclua aqui o conteúdo da área restrita
        } else {
            // Usuário está bloqueado, informe o usuário
            echo "Sua conta está bloqueada. Entre em contato com o suporte.";
        }
    } else {
        echo "Erro ao verificar o status da conta.";
    }
} else {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Área Restrita</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Área Restrita</h1>
    <!-- Conteúdo da área restrita aqui -->
    <script src="script.js"></script>
</body>
</html>
