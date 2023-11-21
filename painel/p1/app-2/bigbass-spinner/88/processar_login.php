<?php
include("conexao.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $query = "SELECT id, nome, senha FROM perfil_usuario WHERE email = '$email'";
    $resultado = mysqli_query($conexao, $query);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
        if (password_verify($senha, $row["senha"])) {
            $_SESSION["usuario_id"] = $row["id"];
            $_SESSION["usuario_nome"] = $row["nome"];
            header("Location: renda/");
            exit();
        } else {
            echo "Credenciais inválidas. Tente novamente.";
        }
    } else {
        echo "Credenciais inválidas. Tente novamente.";
    }
}

mysqli_close($conexao);
?>
