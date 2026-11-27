
<?php

$titulo = "Categorias | Agenda Cultural - Campo Grande";

require_once __DIR__ . '/../Includes/header.php';

// =====================================================
// CATEGORIAS CULTURAIS
// =====================================================

$categorias = [
    [
        "nome" => "Shows",
        "icone" => "♫",
        "descricao" => "Música ao vivo e apresentações",
    ],
    [
        "nome" => "Festivais",
        "icone" => "✺",
        "descricao" => "Grandes encontros e celebrações",
    ],
    [
        "nome" => "Feiras",
        "icone" => "▦",
        "descricao" => "Artesanato, produtores e criatividade",
    ],
    [
        "nome" => "Gastronomia",
        "icone" => "♨",
        "descricao" => "Sabores e experiências culinárias",
    ],
    [
        "nome" => "Exposições",
        "icone" => "▧",
        "descricao" => "Arte, fotografia e patrimônio",
    ],
    [
        "nome" => "Culturais",
        "icone" => "✿",
        "descricao" => "Atividades para toda a comunidade",
    ]
];

?>
<link rel="stylesheet" href="../assets/css/main.css">
<main class="categorias-page">

    <!-- =================================================
         BANNER PRINCIPAL
    ================================================== -->

    <section class="categorias-banner">

        <span class="categorias-label">
            TEM SEMPRE ALGO ACONTECENDO
        </span>

        <h1>Explore as categorias</h1>

        <p>
            Escolha o tipo de experiência que combina com você.
        </p>

    </section>


    <!-- =================================================
         LISTAGEM DE CATEGORIAS
    ================================================== -->

    <section class="categorias-container">

        <div class="categorias-grid">

            <?php foreach ($categorias as $categoria): ?>

                <a
                    href="eventos.php?categoria=<?= urlencode($categoria['nome']) ?>"
                    class="categoria-card"
                >

                    <span class="categoria-icone">
                        <?= $categoria['icone'] ?>
                    </span>

                    <h2>
                        <?= htmlspecialchars($categoria['nome']) ?>
                    </h2>

                    <p>
                        <?= htmlspecialchars($categoria['descricao']) ?>
                    </p>

                </a>

            <?php endforeach; ?>

        </div>

    </section>

</main>

<?php
require_once __DIR__ . '/../Includes/footer.php';
?>
