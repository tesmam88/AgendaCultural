<?php
$base = $base ?? (defined('BASE_URL') ? BASE_URL : rtrim(str_replace('\\', '/', dirname(dirname($_SERVER['SCRIPT_NAME']))), '/'));
$sidebarPerfil = 'admin';
$sidebarAtivo  = 'usuarios';

$usuarios = [
    ['Mariana Oliveira', 'Curador',     'Ativo'],
    ['Produções Sul',    'Organizador', 'Ativo'],
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários | Agenda Cultural</title>
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
                <h1 class="admin-title">Usuários</h1>
            </div>
            <span class="admin-badge">Administrador</span>
        </header>

        <section class="admin-card">
            <div class="admin-card__header">
                <div>
                    <h2 class="admin-card__title">Usuários cadastrados</h2>
                    <p class="admin-card__subtitle">Área de demonstração para gerenciamento de contas.</p>
                </div>
            </div>

            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr><th>Usuário</th><th>Perfil</th><th>Status</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as [$nome, $perfil, $status]): ?>
                            <tr>
                                <td><?= htmlspecialchars($nome) ?></td>
                                <td><?= $perfil ?></td>
                                <td><span class="status-badge status-badge--approved"><?= $status ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>