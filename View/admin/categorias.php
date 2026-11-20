<?php
$base = $base ?? (defined('BASE_URL') ? BASE_URL : rtrim(str_replace('\\', '/', dirname(dirname($_SERVER['SCRIPT_NAME']))), '/'));
$sidebarPerfil = 'admin';
$sidebarAtivo  = 'categorias';

$categorias = ['Shows', 'Festivais', 'Feiras', 'Gastronomia', 'Exposições', 'Culturais'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias | Agenda Cultural</title>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/aside.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/main.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/modal.css">
</head>
<body>
    <?php include __DIR__ . '/../Includes/sidebar.php'; ?>

    <main class="has-sidebar admin-main">
        <header class="admin-topbar">
            <div>
                <span class="admin-eyebrow">Área administrativa</span>
                <h1 class="admin-title">Categorias</h1>
            </div>
            <span class="admin-badge">Administrador</span>
        </header>

        <section class="admin-card">
            <div class="admin-card__header">
                <div>
                    <h2 class="admin-card__title">Categorias de eventos</h2>
                    <p class="admin-card__subtitle">Organize os eventos em categorias claras.</p>
                </div>

                <!-- Abre o modal de gerenciamento -->
                <button
                    type="button"
                    class="btn-primary admin-btn"
                    data-gerenciar-categorias
                >
                    Gerenciar categorias
                </button>
            </div>

            <div class="admin-categories">
                <?php foreach ($categorias as $categoria): ?>
                    <div class="admin-categories__item">
                        <span><?= htmlspecialchars($categoria,ENT_QUOTES,'UTF-8') ?></span>
                        
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
    <!-- Modal: Gerenciar categorias -->
    <?php
    include __DIR__ .
        '/../Includes/modal-gerenciar-categorias.php';
    include __DIR__ . 
        '/../Includes/modal-excluir-categoria.php';
?>    
    ?>

    <!-- Scripts específicos dos modais -->
    <script
        src="<?= $base ?>/assets/js/modal-gerenciar-categorias.js"
        defer>
    </script>

    <script
        src="<?= $base ?>/assets/js/modal-excluir-categoria.js"
        defer>
    </script>
</body>
</html>