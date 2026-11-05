<?php
$base = $base ?? (defined('BASE_URL') ? BASE_URL : rtrim(str_replace('\\', '/', dirname(dirname($_SERVER['SCRIPT_NAME']))), '/'));
$sidebarPerfil = 'admin';
$sidebarAtivo  = 'visao-geral';

$resumo = [
    ['rotulo' => 'Eventos totais',       'valor' => 9, 'detalhe' => 'cadastrados na plataforma'],
    ['rotulo' => 'Eventos aprovados',    'valor' => 4, 'detalhe' => 'aguardando conferência'],
    ['rotulo' => 'Curadores cadastrados', 'valor' => 2, 'detalhe' => 'equipe de curadoria'],
    ['rotulo' => 'Categorias',           'valor' => 6, 'detalhe' => 'categorias de eventos'],
];

$eventosRecentes = [
    ['Show Guilherme & Santiago',      'Produções Sul',   '06/10/2026', 'Aprovado'],
    ['Festival de Gastronomia',        'Sabores MS',      '07/10/2026', 'Aprovado'],
    ['Exposição Arte Contemporânea',   'Galeria Arte MS', '08/10/2026', 'Aprovado'],
    ['Feira do Bosque',                'Feiras C.G.',     '09/10/2026', 'Aprovado'],
];

$classeStatus = ['Aprovado' => 'approved', 'Pendente' => 'pending', 'Reprovado' => 'rejected'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visão geral | Agenda Cultural</title>
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
                <h1 class="admin-title">Visão geral</h1>
            </div>
            <span class="admin-badge">Administrador</span>
        </header>

        <section class="admin-card">
            <div class="admin-card__header">
                <div>
                    <h2 class="admin-card__title">Olá, Administrador!</h2>
                    <p class="admin-card__subtitle">Acompanhe o que está acontecendo na plataforma.</p>
                </div>
                <a href="<?= $base ?>/admin/dashboard.php" class="admin-btn admin-btn--outline">Painel de controle</a>
            </div>

            <div class="admin-stats">
                <?php foreach ($resumo as $item): ?>
                    <div class="admin-stat">
                        <span class="admin-stat__label"><?= htmlspecialchars($item['rotulo']) ?></span>
                        <div class="admin-stat__value"><?= $item['valor'] ?></div>
                        <span class="admin-stat__detail"><?= htmlspecialchars($item['detalhe']) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="admin-card">
            <div class="admin-card__header">
                <div>
                    <h2 class="admin-card__title">Eventos recentes</h2>
                    <p class="admin-card__subtitle">Os últimos eventos cadastrados.</p>
                </div>
                <a href="<?= $base ?>/admin/eventos.php" class="admin-link">Ver todas +</a>
            </div>

            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr><th>Evento</th><th>Organizador</th><th>Data</th><th>Status</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($eventosRecentes as [$nome, $org, $data, $status]): ?>
                            <tr>
                                <td><?= htmlspecialchars($nome) ?></td>
                                <td><?= htmlspecialchars($org) ?></td>
                                <td><?= $data ?></td>
                                <td><span class="status-badge status-badge--<?= $classeStatus[$status] ?>"><?= $status ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <div class="admin-actions">
            <a href="<?= $base ?>/admin/curadores.php" class="admin-btn admin-btn--outline">+ Cadastrar curador</a>
            <a href="<?= $base ?>/admin/categorias.php" class="admin-btn admin-btn--outline">+ Gerenciar categorias</a>
            <a href="<?= $base ?>/admin/eventos.php" class="admin-btn admin-btn--outline">Ver todos os eventos +</a>
        </div>
    </main>
</body>
</html>