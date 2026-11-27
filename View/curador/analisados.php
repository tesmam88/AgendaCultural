<?php
$base = defined('BASE_URL') ? BASE_URL : rtrim(str_replace('\\', '/', dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
$sidebarPerfil = 'curador';
$sidebarAtivo  = 'analisados';

$analisados = [
    ['titulo' => 'Show Guilherme & Santiago',    'data' => '06/11/2026', 'local' => 'Morena Hall',                  'status' => 'Aprovado'],
    ['titulo' => 'Festival de Gastronomia',      'data' => '17/11/2026', 'local' => 'Parque das Nações Indígenas', 'status' => 'Aprovado'],
    ['titulo' => 'Exposição Arte Contemporânea', 'data' => '08/11/2026', 'local' => 'MARCO - Museu de Arte Contemporânea', 'status' => 'Aprovado'],
    ['titulo' => 'Feira do Bosque',              'data' => '09/11/2026', 'local' => 'Praça do Rádio',              'status' => 'Aprovado'],
    ['titulo' => 'Sarau Cultural',               'data' => '12/11/2026', 'local' => 'Casa de Cultura',             'status' => 'Reprovado',
     'motivo' => 'A descrição precisa deixar a classificação indicativa e o horário de encerramento claros.'],
];

$classeStatus = ['Aprovado' => 'approved', 'Reprovado' => 'rejected'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos analisados | Agenda Cultural</title>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/aside.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/main.css">
</head>
<body>
    <?php include __DIR__ . '/../Includes/sidebar.php'; ?>

    <main class="has-sidebar admin-main">
        <header class="admin-topbar">
            <div>
                <span class="admin-eyebrow">Área do curador</span>
                <h1 class="admin-title">Eventos analisados</h1>
            </div>
            <span class="admin-badge">Curador</span>
        </header>

        <section class="admin-card">
            <div class="admin-card__header">
                <div>
                    <h2 class="admin-card__title">Eventos analisados</h2>
                    <p class="admin-card__subtitle">Histórico de decisões da curadoria nesta demonstração.</p>
                </div>
            </div>

            <div class="evento-lista">
                <?php foreach ($analisados as $e): ?>
                    <article class="evento-item">
                        <div class="evento-item__thumb"></div>
                        <div class="evento-item__info">
                            <span class="evento-item__titulo"><?= htmlspecialchars($e['titulo']) ?></span>
                            <span class="evento-item__meta"><?= $e['data'] ?> · <?= htmlspecialchars($e['local']) ?></span>
                            <span class="status-badge status-badge--<?= $classeStatus[$e['status']] ?>"><?= $e['status'] ?></span>
                            <?php if (!empty($e['motivo'])): ?>
                                <span class="evento-item__motivo">Motivo: <?= htmlspecialchars($e['motivo']) ?></span>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</body>
</html>