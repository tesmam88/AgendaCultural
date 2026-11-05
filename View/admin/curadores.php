<?php
$base = $base ?? (defined('BASE_URL') ? BASE_URL : rtrim(str_replace('\\', '/', dirname(dirname($_SERVER['SCRIPT_NAME']))), '/'));
$sidebarPerfil = 'admin';
$sidebarAtivo  = 'curadores';

$curadores = [
    ['Mariana Oliveira', 'mariana@agenda.com', 'Ativo'],
    ['Rafael Souza',     'rafael@exemplo.com', 'Ativo'],
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curadores | Agenda Cultural</title>
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
                <h1 class="admin-title">Curadores</h1>
            </div>
            <span class="admin-badge">Administrador</span>
        </header>

        <section class="admin-card">
            <div class="admin-card__header">
                <div>
                    <h2 class="admin-card__title">Curadores</h2>
                    <p class="admin-card__subtitle">Gerencie cadastros e permissões dos curadores.</p>
                </div>
                <a href="#" class="btn-primary admin-btn">+ Novo curador</a>
            </div>

            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr><th>Nome</th><th>E-mail</th><th>Status</th><th>Ação</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($curadores as [$nome, $email, $status]): ?>
                            <tr>
                                <td><?= htmlspecialchars($nome) ?></td>
                                <td><?= htmlspecialchars($email) ?></td>
                                <td><span class="status-badge status-badge--approved"><?= $status ?></span></td>
                                <td><a href="#" class="admin-link">Editar</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>