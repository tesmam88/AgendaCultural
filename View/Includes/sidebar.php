<?php
$sidebarPerfil = $sidebarPerfil ?? 'admin';
$sidebarAtivo  = $sidebarAtivo  ?? '';

$base = defined('BASE_URL') ? BASE_URL : '/AgendaCultural/View';

$menus = [
    'admin' => [
        'titulo' => 'Painel administrativo',
        'itens'  => [
            ['chave' => 'visao-geral', 'label' => 'Visão geral', 'icone' => 'visao-geral.png', 'url' => '/admin/dashboard.php'],
            ['chave' => 'eventos',     'label' => 'Eventos',     'icone' => 'eventos.png',     'url' => '/admin/eventos.php'],
            ['chave' => 'curadores',   'label' => 'Curadores',   'icone' => 'curadores.png',   'url' => '/admin/curadores.php'],
            ['chave' => 'categorias',  'label' => 'Categorias',  'icone' => 'categorias.png',  'url' => '/admin/categorias.php'],
            ['chave' => 'usuarios',    'label' => 'Usuários',    'icone' => 'usuarios.png',    'url' => '/admin/usuarios.php'],
        ],
    ],
    'organizador' => [
        'titulo' => 'Painel do organizador',
        'itens'  => [
            ['chave' => 'meus-eventos',     'label' => 'Meus eventos',     'icone' => 'meus-eventos.png',     'url' => '/organizador/eventos.php'],
            ['chave' => 'cadastrar-evento', 'label' => 'Cadastrar evento', 'icone' => 'cadastrar-evento.png', 'url' => '/organizador/cadastrar.php'],
            ['chave' => 'meu-perfil',       'label' => 'Meu perfil',       'icone' => 'meu-perfil.png',       'url' => '/organizador/perfil.php'],
        ],
    ],
    'curador' => [
        'titulo' => 'Painel do curador',
        'itens'  => [
            ['chave' => 'pendentes',  'label' => 'Eventos pendentes',  'icone' => 'eventos-pendentes.png',  'url' => '/curador/pendentes.php'],
            ['chave' => 'analisados', 'label' => 'Eventos analisados', 'icone' => 'eventos-analisados.png', 'url' => '/curador/analisados.php'],
            ['chave' => 'meu-perfil', 'label' => 'Meu perfil',         'icone' => 'meu-perfil.png',         'url' => '/curador/perfil.php'],
        ],
    ],
];

$menu = $menus[$sidebarPerfil] ?? $menus['admin'];
?>

<aside class="sidebar" id="sidebar">
    <div class="sidebar__brand">
        <img src="<?= $base ?>/assets/img/logo.png" alt="Agenda Cultural" class="sidebar__logo">
        <div class="sidebar__brand-text">
            <strong>Agenda Cultural</strong>
            <span><?= htmlspecialchars($menu['titulo']) ?></span>
        </div>
    </div>

    <nav class="sidebar__nav">
        <?php foreach ($menu['itens'] as $item): ?>
            <a href="<?= $base . $item['url'] ?>"
               class="sidebar__item <?= $item['chave'] === $sidebarAtivo ? 'is-active' : '' ?>"
               style="--icon: url('<?= $base ?>/assets/img/icons/<?= $item['icone'] ?>')">
                <span class="sidebar__icon"></span>
                <span class="sidebar__label"><?= htmlspecialchars($item['label']) ?></span>
            </a>
        <?php endforeach; ?>
    </nav>

    <div class="sidebar__footer">
        <a href="<?= $base ?>/auth/logout.php"
           class="sidebar__item"
           style="--icon: url('<?= $base ?>/assets/img/icons/sair.png')">
            <span class="sidebar__icon"></span>
            <span class="sidebar__label">Sair</span>
        </a>
    </div>
</aside>

<script src="<?= $base ?>/assets/js/sidebar.js" defer></script>