<?php
$base = defined('BASE_URL') ? BASE_URL : rtrim(str_replace('\\', '/', dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
$sidebarPerfil = 'curador';
$sidebarAtivo  = 'meu-perfil';

$curador = ['nome' => 'Mariana Oliveira', 'email' => 'mariana@exemplo.com', 'funcao' => 'Curadora cultural'];
$iniciais = strtoupper(mb_substr($curador['nome'], 0, 1) . mb_substr(strrchr($curador['nome'], ' '), 1, 1));
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu perfil | Agenda Cultural</title>
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
                <h1 class="admin-title">Meu perfil</h1>
            </div>
            <span class="admin-badge">Curador</span>
        </header>

        <section class="admin-card perfil-card">
            <div class="perfil-avatar"><?= $iniciais ?></div>
            <h2 class="admin-card__title"><?= htmlspecialchars($curador['nome']) ?></h2>
            <p class="admin-card__subtitle"><?= htmlspecialchars($curador['funcao']) ?></p>

            <form method="post" action="#">
                <div class="form-campo">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($curador['nome']) ?>">
                </div>
                <div class="form-campo">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($curador['email']) ?>">
                </div>
                <button type="submit" class="btn-primary admin-btn" style="margin-top: var(--spacing-5);">Salvar alterações</button>
            </form>
        </section>
    </main>
</body>
</html>