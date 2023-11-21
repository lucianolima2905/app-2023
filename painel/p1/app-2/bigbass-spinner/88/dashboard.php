<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION["usuario_id"])) {
    header("Location: 88/renda");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Página de Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Bem-vindo, <?php echo $_SESSION["usuario_nome"]; ?>!</h2>
        <!-- Conteúdo da página de dashboard -->
    </div>
</body>
</html>
