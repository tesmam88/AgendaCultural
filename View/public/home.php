
<?php
$titulo = "Agenda Cultural | Campo Grande - MS";

require_once __DIR__ . '/../Includes/header.php';

// Eventos fictícios para apresentação do projeto
$eventos = [
    [
        "categoria" => "Shows",
        "titulo" => "Show Guilherme & Santiago",
        "data" => "25 OUT 2026",
        "horario" => "20h00",
        "local" => "Morena Park"
    ],
    [
        "categoria" => "Gastronomia",
        "titulo" => "Festival de Gastronomia",
        "data" => "26 OUT 2026",
        "horario" => "12h às 22h",
        "local" => "Parque das Nações Indígenas"
    ],
    [
        "categoria" => "Exposições",
        "titulo" => "Exposição Arte Contemporânea",
        "data" => "27 OUT 2026",
        "horario" => "9h às 18h",
        "local" => "MAC - Museu de Arte Contemporânea"
    ],
    [
        "categoria" => "Feiras",
        "titulo" => "Feira do Bosque",
        "data" => "28 OUT 2026",
        "horario" => "16h às 22h",
        "local" => "Praça do Rádio"
    ]
];

$categorias = [
    ["icone" => "♫", "nome" => "Shows"],
    ["icone" => "✿", "nome" => "Festivais"],
    ["icone" => "▦", "nome" => "Feiras"],
    ["icone" => "♨", "nome" => "Gastronomia"],
    ["icone" => "▧", "nome" => "Exposições"],
    ["icone" => "✿", "nome" => "Culturais"]
];
?>

<link rel="stylesheet" href="../assets/css/main.css">

<main class="home">

    <!-- =====================================================
         BANNER PRINCIPAL
    ====================================================== -->
    <section class="home-banner">

        <div class="home-banner-content">

            <span class="home-label">
                CULTURA, ENCONTROS E EXPERIÊNCIAS
            </span>

            <h1>
                Viva a cultura de
                <br>
                Campo Grande.
            </h1>

            <p>
                Shows, festivais, exposições, gastronomia e muito mais.
                <br>
                Descubra o que acontece na nossa cidade.
            </p>

            <form class="home-search" action="eventos.php" method="GET">

                <input
                    type="search"
                    name="busca"
                    placeholder="Buscar evento, artista ou local"
                >

                <input
                    type="date"
                    name="data"
                    aria-label="Data do evento"
                >

                <select name="categoria">
                    <option value="">Todas as categorias</option>
                    <option value="shows">Shows</option>
                    <option value="festivais">Festivais</option>
                    <option value="feiras">Feiras</option>
                    <option value="gastronomia">Gastronomia</option>
                    <option value="exposicoes">Exposições</option>
                </select>

                <button type="submit">
                    Buscar
                </button>

            </form>

        </div>

    </section>


    <!-- =====================================================
         EVENTOS EM DESTAQUE
    ====================================================== -->
    <section class="home-section">

        <div class="section-heading">

            <div>
                <span class="home-label">ESCOLHAS PARA VOCÊ</span>
                <h2>Eventos em destaque</h2>
            </div>

            <a href="eventos.php" class="section-link">
                Ver todos →
            </a>

        </div>

        <div class="events-grid">

            <?php foreach ($eventos as $evento): ?>

                <article class="event-card">

                    <div class="event-image">
                        <span class="event-category">
                            <?= htmlspecialchars($evento["categoria"]) ?>
                        </span>
                    </div>

                    <div class="event-info">

                        <h3>
                            <?= htmlspecialchars($evento["titulo"]) ?>
                        </h3>

                        <p>
                            <span>◷</span>
                            <?= htmlspecialchars($evento["data"]) ?>
                            ·
                            <?= htmlspecialchars($evento["horario"]) ?>
                        </p>

                        <p>
                            <span>⌖</span>
                            <?= htmlspecialchars($evento["local"]) ?>
                        </p>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>

    </section>


    <!-- =====================================================
         CATEGORIAS
    ====================================================== -->
    <section class="home-section">

        <div class="section-heading">

            <div>
                <span class="home-label">DESCUBRA SEUS INTERESSES</span>
                <h2>Explore por categoria</h2>
            </div>

        </div>

        <div class="categories-grid">

            <?php foreach ($categorias as $categoria): ?>

                <a
                    href="eventos.php?categoria=<?= urlencode($categoria["nome"]) ?>"
                    class="category-card"
                >

                    <span class="category-icon">
                        <?= $categoria["icone"] ?>
                    </span>

                    <span>
                        <?= htmlspecialchars($categoria["nome"]) ?>
                    </span>

                </a>

            <?php endforeach; ?>

        </div>

    </section>


    <!-- =====================================================
         PROGRAMAÇÃO DA SEMANA
    ====================================================== -->
    <section class="home-section">

        <div class="section-heading">

            <div>
                <span class="home-label">NÃO PERCA NADA</span>
                <h2>Programação da semana</h2>
            </div>

            <a href="eventos.php" class="section-link">
                Ver agenda →
            </a>

        </div>

        <div class="events-grid">

            <?php foreach ($eventos as $evento): ?>

                <article class="event-card">

                    <div class="event-image">
                        <span class="event-category">
                            <?= htmlspecialchars($evento["categoria"]) ?>
                        </span>
                    </div>

                    <div class="event-info">

                        <h3>
                            <?= htmlspecialchars($evento["titulo"]) ?>
                        </h3>

                        <p>
                            <span>◷</span>
                            <?= htmlspecialchars($evento["data"]) ?>
                            ·
                            <?= htmlspecialchars($evento["horario"]) ?>
                        </p>

                        <p>
                            <span>⌖</span>
                            <?= htmlspecialchars($evento["local"]) ?>
                        </p>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>

    </section>


    <!-- =====================================================
         CHAMADA PARA CADASTRO DE EVENTOS
    ====================================================== -->
    <section class="home-register">

        <div class="register-content">

            <span class="home-label">
                FAÇA PARTE DESSA AGENDA
            </span>

            <h2>
                Organiza um evento em Campo Grande?
            </h2>

            <p>
                Cadastre seu evento gratuitamente e compartilhe
                com a cidade.
            </p>

        </div>

        <a href="../organizador/cadastro-evento.php" class="register-button">
            Cadastrar evento
        </a>

    </section>

</main>

<?php
require_once __DIR__ . '/../Includes/footer.php';
?>
