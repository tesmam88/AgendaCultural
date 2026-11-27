<?php

// ==========================================
// AUTOLOAD DE CLASSES
// ==========================================

spl_autoload_register(function ($classe) {

    // Define os caminhos das classes
    $pastas = [
        'App\\DAO\\' => BASE_DIR . '/DAO/',
        'App\\Models\\' => BASE_DIR . '/Model/',
        'App\\Controllers\\' => BASE_DIR . '/Controller/',
        'App\\Config\\' => BASE_DIR . '/config/'
    ];

    // Verifica o namespace da classe
    foreach ($pastas as $namespace => $diretorio) {

        if (strpos($classe, $namespace) === 0) {

            // Remove o namespace inicial
            $arquivo = substr($classe, strlen($namespace));

            // Converte as barras do namespace em diretórios
            $arquivo = str_replace('\\', '/', $arquivo);

            // Monta o caminho completo do arquivo
            $caminho = $diretorio . $arquivo . '.php';

            // Carrega o arquivo caso exista
            if (file_exists($caminho)) {
                require_once $caminho;
            }

            return;
        }
    }
});
