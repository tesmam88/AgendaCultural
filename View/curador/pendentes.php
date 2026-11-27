<?php
$base = defined('BASE_URL') ? BASE_URL : rtrim(str_replace('\\', '/', dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
$sidebarPerfil = 'curador';
$sidebarAtivo  = 'pendentes';

$pendentes = [
    ['id' => 1, 'titulo' => 'Show Ana Castela',        'data' => '05/11/2026', 'local' => 'Estádio Morenão',            'categoria' => 'Shows',       'organizador' => 'Produções Sul'],
    ['id' => 2, 'titulo' => 'Festival de Inverno',     'data' => '10/11/2026', 'local' => 'Parque das Nações Indígenas', 'categoria' => 'Festivais',   'organizador' => 'Cultura MS'],
    ['id' => 3, 'titulo' => 'Feira de Artesanato',     'data' => '12/11/2026', 'local' => 'Praça do Rádio',             'categoria' => 'Feiras',      'organizador' => 'Arte & Mãos'],
    ['id' => 4, 'titulo' => 'Festival Gastronômico',   'data' => '14/11/2026', 'local' => 'Centro de Convenções',       'categoria' => 'Gastronomia', 'organizador' => 'Sabores MS'],
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos pendentes | Agenda Cultural</title>
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
                <span class="admin-eyebrow">Área do curador</span>
                <h1 class="admin-title">Eventos pendentes</h1>
            </div>
            <span class="admin-badge">Curador</span>
        </header>

        <section class="admin-card">
            <div class="admin-card__header">
                <div>
                    <h2 class="admin-card__title">Olá, Curador!</h2>
                    <p class="admin-card__subtitle">Analise as informações antes de publicar um evento.</p>
                </div>
                <span class="status-badge status-badge--pending" id="contador-pendentes"><?= count($pendentes) ?> aguardando</span>
            </div>

            <div class="evento-lista" id="lista-pendentes">
                <?php foreach ($pendentes as $e): ?>
                    <article class="evento-item" data-evento="<?= $e['id'] ?>">
                        <div class="evento-item__thumb"></div>
                        <div class="evento-item__info">
                            <span class="evento-item__titulo"><?= htmlspecialchars($e['titulo']) ?></span>
                            <span class="evento-item__meta"><?= $e['data'] ?> · <?= htmlspecialchars($e['local']) ?></span>
                            <span class="evento-item__meta"><?= htmlspecialchars($e['categoria']) ?> · Organizador: <?= htmlspecialchars($e['organizador']) ?></span>
                            <span class="status-badge status-badge--pending">Pendente</span>
                        </div>
                        <div class="evento-item__acoes">
                            <button type="button" class="btn-primary admin-btn" data-aprovar="<?= $e['id'] ?>">Aprovar</button>
                            <button type="button" class="admin-btn admin-btn--outline" data-reprovar="<?= $e['id'] ?>">Reprovar</button>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../Includes/modal-reprovar.php'; ?>

    <script>
        // Demonstração: remove o evento da lista ao aprovar/reprovar.
        // Quando ligar ao Controller, trocar por envio ao servidor.
        const lista = document.getElementById('lista-pendentes');
        const contador = document.getElementById('contador-pendentes');

        function removerEvento(id) {
            const item = lista.querySelector('[data-evento="' + id + '"]');
            if (!item) return;
            item.classList.add('is-saindo');
            setTimeout(function () {
                item.remove();
                contador.textContent = lista.children.length + ' aguardando';
            }, 300);
        }

        lista.addEventListener('click', function (e) {
            const botao = e.target.closest('[data-aprovar]');
            if (botao) removerEvento(botao.dataset.aprovar);
        });

        document.addEventListener('evento:reprovado', function (e) {
            removerEvento(e.detail.id);
        });
    </script>
</body>
</html>