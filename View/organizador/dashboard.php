<?php
$base = defined('BASE_URL') ? BASE_URL : rtrim(str_replace('\\', '/', dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
$sidebarPerfil = 'organizador';
$sidebarAtivo  = 'meus-eventos';

$eventos = [
    ['titulo' => 'Show Guilherme & Santiago', 'data' => '06/11/2026', 'local' => 'Morena Hall',     'status' => 'Aprovado'],
    ['titulo' => 'Show Ana Castela',          'data' => '05/11/2026', 'local' => 'Estádio Morenão', 'status' => 'Pendente'],
    ['titulo' => 'Sarau Cultural',            'data' => '12/11/2026', 'local' => 'Casa de Cultura', 'status' => 'Reprovado',
     'motivo' => 'A descrição precisa informar a classificação indicativa e o horário de encerramento.'],
];

$classeStatus = ['Aprovado' => 'approved', 'Pendente' => 'pending', 'Reprovado' => 'rejected'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus eventos | Agenda Cultural</title>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/aside.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/main.css">
</head>
<body>
    <?php include __DIR__ . '/../Includes/sidebar.php'; ?>

    <main class="has-sidebar admin-main">
        <header class="admin-topbar">
            <div>
                <span class="admin-eyebrow">Área do organizador</span>
                <h1 class="admin-title">Meus eventos</h1>
            </div>
            <span class="admin-badge">Organizador</span>
        </header>

        <section class="admin-card">
            <div class="admin-card__header">
                <div>
                    <h2 class="admin-card__title">Olá, Organizador!</h2>
                    <p class="admin-card__subtitle">Acompanhe os status dos eventos que você enviou.</p>
                </div>
                <a href="<?= $base ?>/organizador/form_evento.php" class="btn-primary admin-btn">+ Cadastrar evento</a>
            </div>

            <div class="evento-lista">
                <?php foreach ($eventos as $e): ?>
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
                        <div class="evento-item__acoes">
                            <?php if ($e['status'] === 'Reprovado'): ?>
                                <a href="<?= $base ?>/organizador/form_evento.php" class="admin-btn admin-btn--outline">Corrigir e reenviar</a>
                            <?php else: ?>
                                <a href="#" class="admin-btn admin-btn--outline">Ver status</a>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="aviso-box">
                <p class="aviso-box__titulo">Como funciona a curadoria?</p>
                <p class="aviso-box__texto">
                    Todo evento enviado fica como Pendente até ser analisado. Se for reprovado, você poderá consultar o motivo, corrigir as informações e reenviar.
                </p>
            </div>
        </section>
    </main>
</body>
</html>