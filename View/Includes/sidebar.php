<?php
$sidebarPerfil = $sidebarPerfil ?? 'admin';
$sidebarAtivo  = $sidebarAtivo  ?? '';

$base = $base ?? (defined('BASE_URL') ? BASE_URL : rtrim(str_replace('\\', '/', dirname(dirname($_SERVER['SCRIPT_NAME']))), '/'));

$menus = [
    'admin' => [
        'titulo' => 'Painel administrativo',
        'itens'  => [
            ['chave' => 'visao-geral', 'label' => 'Visão geral', 'icone' => 'visao-geral.svg', 'url' => '/admin/dashboard.php'],
            ['chave' => 'eventos',     'label' => 'Eventos',     'icone' => 'eventos.svg',     'url' => '/admin/eventos.php'],
            ['chave' => 'curadores',   'label' => 'Curadores',   'icone' => 'curadores.svg',   'url' => '/admin/curadores.php'],
            ['chave' => 'categorias',  'label' => 'Categorias',  'icone' => 'categorias.svg',  'url' => '/admin/categorias.php'],
            ['chave' => 'usuarios',    'label' => 'Usuários',    'icone' => 'usuarios.svg',    'url' => '/admin/usuarios.php'],
        ],
    ],
    'organizador' => [
        'titulo' => 'Painel do organizador',
        'itens'  => [
            ['chave' => 'meus-eventos',     'label' => 'Meus eventos',     'icone' => 'meus-eventos.svg',     'url' => '/organizador/dashboard.php'],
            ['chave' => 'cadastrar-evento', 'label' => 'Cadastrar evento', 'icone' => 'cadastrar-evento.svg', 'url' => '/organizador/form_evento.php'],
            ['chave' => 'meu-perfil',       'label' => 'Meu perfil',       'icone' => 'meu-perfil.svg',       'url' => '/organizador/perfil.php'],
        ],
    ],
    'curador' => [
        'titulo' => 'Painel do curador',
        'itens'  => [
            ['chave' => 'pendentes',  'label' => 'Eventos pendentes',  'icone' => 'eventos-pendentes.svg',  'url' => '/curador/pendentes.php'],
            ['chave' => 'analisados', 'label' => 'Eventos analisados', 'icone' => 'eventos-analisados.svg', 'url' => '/curador/analisados.php'],
            ['chave' => 'meu-perfil', 'label' => 'Meu perfil',         'icone' => 'meu-perfil.svg',         'url' => '/curador/perfil.php'],
        ],
    ],
];

$menu = $menus[$sidebarPerfil] ?? $menus['admin'];
?>

<aside class="sidebar" id="sidebar">
    <div class="sidebar__brand">
        <img src="<?= $base ?>/assets/img/icons/logo_alone.png" alt="Agenda Cultural" class="sidebar__logo">
        <div class="sidebar__brand-text">
            <strong>Agenda Cultural</strong>
            <span><?= htmlspecialchars($menu['titulo']) ?></span>
        </div>
    </div>

    <nav class="sidebar__nav">
        <?php foreach ($menu['itens'] as $item): ?>
            <a href="<?= $base . $item['url'] ?>"
               class="sidebar__item <?= $item['chave'] === $sidebarAtivo ? 'is-active' : '' ?>">
                <img class="sidebar__icon" src="<?= $base ?>/assets/img/icons/<?= $item['icone'] ?>" alt="">
                <span class="sidebar__label"><?= htmlspecialchars($item['label']) ?></span>
            </a>
        <?php endforeach; ?>
    </nav>

    <div class="sidebar__footer">
        <a href="<?= $base ?>/auth/logout.php" class="sidebar__item">
            <img class="sidebar__icon" src="<?= $base ?>/assets/img/icons/sair.svg" alt="">
            <span class="sidebar__label">Sair</span>
        </a>
    </div>
</aside>

<script src="<?= $base ?>/assets/js/sidebar.js" defer></script>