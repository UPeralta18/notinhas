<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe o conteúdo enviado via AJAX
    $content = $_POST['content'];
    $fileName = $_POST['filename'];
    
    // Abre o arquivo para escrita
    $file = fopen($fileName, 'w');

    if ($file) {
        // Escreve o conteúdo no arquivo
        fwrite($file, $content);
        // Fecha o arquivo
        fclose($file);
        echo 'Conteúdo salvo com sucesso.';
    } else {
        echo 'Não foi possível abrir o arquivo para escrita.';
    }
} else {
    echo 'Método de requisição não suportado.';
}