<?php
$sliderPath = 'slider/';  // Substitua pelo caminho real do seu diretório de imagens

// Verificar se o diretório existe
if (is_dir($sliderPath)) {
    // Obter a lista de arquivos na pasta
    $files = scandir($sliderPath);

    // Filtrar para garantir que apenas arquivos de imagem são incluídos (pode ser ajustado conforme necessário)
    $imageFiles = array_filter($files, function ($file) {
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        return in_array(strtolower($extension), $imageExtensions);
    });

    // Retornar a lista de imagens em formato JSON
    echo json_encode($imageFiles);
} else {
    // Se o diretório não existir, retornar um array vazio
    echo json_encode([]);
}
?>
