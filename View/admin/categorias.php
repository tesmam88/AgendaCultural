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
                <a href="#" class="btn-primary admin-btn">+ Nova categoria</a>
            </div>

            <div class="admin-categories">
                <?php foreach ($categorias as $categoria): ?>
                    <div class="admin-categories__item">
                        <span><?= htmlspecialchars($categoria) ?></span>
                        <a href="#" class="admin-link">Editar</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</body>
</html>