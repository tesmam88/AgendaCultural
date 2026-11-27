<?php
$base = $base ?? (defined('BASE_URL') ? BASE_URL : rtrim(str_replace('\\', '/', dirname(dirname($_SERVER['SCRIPT_NAME']))), '/'));
$sidebarPerfil = 'admin';
$sidebarAtivo  = 'eventos';

$eventos = [
    ['Show Guilherme & Santiago',    'Produções Sul',   '06/10/2026', 'Aprovado'],
    ['Festival de Gastronomia',      'Sabores MS',      '07/10/2026', 'Aprovado'],
    ['Exposição Arte Contemporânea', 'Galeria Arte MS', '08/10/2026', 'Aprovado'],
    ['Feira do Bosque',              'Feiras C.G.',     '09/10/2026', 'Aprovado'],
    ['Show Ana Castela',             'Produções Sul',   '09/10/2026', 'Pendente'],
    ['Festival de Inverno',          'Cultura MS',      '10/10/2026', 'Pendente'],
    ['Feira de Artesanato',          'Arte & Mãos',     '12/10/2026', 'Pendente'],
    ['Jazz Cultural',                'Produções Sul',   '14/10/2026', 'Reprovado'],
    ['Festival Gastronômico',        'Sabores MS',      '14/10/2026', 'Pendente'],
];

$classeStatus = ['Aprovado' => 'approved', 'Pendente' => 'pending', 'Reprovado' => 'rejected'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos | Agenda Cultural</title>
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
                <h1 class="admin-title">Todos os eventos</h1>
            </div>
            <span class="admin-badge">Administrador</span>
        </header>

        <section class="admin-card">
            <div class="admin-card__header">
                <div>
                    <h2 class="admin-card__title">Todos os eventos</h2>
                    <p class="admin-card__subtitle">Visualize os eventos cadastrados e seus status.</p>
                </div>
                <input type="search" id="busca-evento" class="admin-search" placeholder="Buscar evento">
            </div>

            <div class="admin-table-wrap">
                <table class="admin-table" id="tabela-eventos">
                    <thead>
                        <tr><th>Evento</th><th>Organizador</th><th>Data</th><th>Status</th><th>Ação</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($eventos as [$nome, $org, $data, $status]): ?>
                            <tr>
                                <td><?= htmlspecialchars($nome) ?></td>
                                <td><?= htmlspecialchars($org) ?></td>
                                <td><?= $data ?></td>
                                <td><span class="status-badge status-badge--<?= $classeStatus[$status] ?>"><?= $status ?></span></td>
                                <td><a href="#" class="admin-link">Ver</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <script>
        // Filtro simples da busca (só filtra as linhas já carregadas)
        document.getElementById('busca-evento').addEventListener('input', function () {
            const termo = this.value.toLowerCase();
            document.querySelectorAll('#tabela-eventos tbody tr').forEach(function (linha) {
                linha.style.display = linha.textContent.toLowerCase().includes(termo) ? '' : 'none';
            });
        });
    </script>
</body>
</html>