<?php
$titulo = $titulo ?? 'Agenda Cultural de Campo Grande';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8') ?></title>

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
</head>

<body>

    <header class="header">
        <div class="header-container">

            <a href="../public/home.php" class="header-logo">
                <span class="logo-icon" aria-hidden="true">✳</span>
                <span class="logo-text">
                    <strong>Agenda Cultural</strong>
                    <small>CAMPO GRANDE - MS</small>
                </span>
            </a>

            <nav class="header-menu" aria-label="Navegação principal">
                <a href="../public/home.php">Início</a>
                <a href="../public/eventos.php">Eventos</a>
                <a href="../public/categorias.php">Categorias</a>
                <a href="../public/sobre.php">Sobre</a>
            </nav>

            <div class="header-actions">
                <a href="../public/eventos.php" class="header-search" aria-label="Pesquisar eventos" title="Pesquisar eventos">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="10.8" cy="10.8" r="6.5"></circle>
                        <path d="m16 16 4 4"></path>
                    </svg>
                </a>

                <a href="../auth/login.php" class="header-login">Entrar</a>
            </div>

        </div>
    </header>