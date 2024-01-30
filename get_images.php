<?php
$directory = 'carrossel'; // Substitua pelo nome do seu diretório

$images = [];

if (is_dir($directory)) {
    if ($handle = opendir($directory)) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $images[] = $entry;
            }
        }
        closedir($handle);
    }
}

echo json_encode($images);
?>
