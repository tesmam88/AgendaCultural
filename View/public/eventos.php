
<?php

$titulo = "Eventos | Agenda Cultural - Campo Grande";

require_once __DIR__ . '/../Includes/header.php';

// =====================================================
// EVENTOS DE EXEMPLO
// =====================================================

$eventos = [
    [
        "id" => 1,
        "titulo" => "Show Guilherme & Santiago",
        "categoria" => "Shows",
        "data" => "2026-11-06",
        "horario" => "20h",
        "local" => "Morena FM"
    ],
    [
        "id" => 2,
        "titulo" => "Festival de Gastronomia",
        "categoria" => "Gastronomia",
        "data" => "2026-11-07",
        "horario" => "11h às 22h",
        "local" => "Parque das Nações Indígenas"
    ],
    [
        "id" => 3,
        "titulo" => "Exposição Arte Contemporânea",
        "categoria" => "Exposições",
        "data" => "2026-11-08",
        "horario" => "9h às 18h",
        "local" => "MAC - Museu de Arte Contemporânea"
    ],
    [
        "id" => 4,
        "titulo" => "Feira do Bosque",
        "categoria" => "Feiras",
        "data" => "2026-11-08",
        "horario" => "16h às 21h",
        "local" => "Praça do Rádio"
    ]
];

// =====================================================
// RECEBENDO OS FILTROS
// =====================================================

$busca = trim($_GET['busca'] ?? '');
$dataFiltro = $_GET['data'] ?? '';
$categoriaFiltro = $_GET['categoria'] ?? '';

// =====================================================
// FILTRANDO OS EVENTOS
// =====================================================

$eventosFiltrados = array_filter($eventos, function ($evento) use (
    $busca,
    $dataFiltro,
    $categoriaFiltro
) {

    // Pesquisa pelo nome do evento
    $correspondeBusca = $busca === '' ||
        stripos($evento['titulo'], $busca) !== false;

    // Pesquisa pela data
    $correspondeData = $dataFiltro === '' ||
        $evento['data'] === $dataFiltro;

    // Pesquisa pela categoria
    $correspondeCategoria = $categoriaFiltro === '' ||
        $evento['categoria'] === $categoriaFiltro;

    return $correspondeBusca &&
           $correspondeData &&
           $correspondeCategoria;
});

?>

<link rel="stylesheet" href="../assets/css/main.css">

<main class="eventos-page">

    <!-- =================================================
         BANNER DA PÁGINA
    ================================================== -->

    <section class="eventos-banner">

        <span>DESCUBRA A CIDADE</span>

        <h1>Agenda de eventos</h1>

        <p>
            Encontre experiências para aproveitar Campo Grande.
        </p>

    </section>


    <!-- =================================================
         LISTAGEM E FILTROS
    ================================================== -->

    <section class="eventos-container">

        <!-- Formulário de pesquisa -->

        <form class="eventos-filtros" method="GET" action="eventos.php">

            <div class="filtro-campo">

                <label for="busca">Buscar evento</label>

                <input
                    type="search"
                    id="busca"
                    name="busca"
                    placeholder="Nome do evento"
                    value="<?= htmlspecialchars($busca) ?>"
                >

            </div>


            <div class="filtro-campo">

                <label for="data">Data</label>

                <input
                    type="date"
                    id="data"
                    name="data"
                    value="<?= htmlspecialchars($dataFiltro) ?>"
                >

            </div>


            <div class="filtro-campo">

                <label for="categoria">Categoria</label>

                <select id="categoria" name="categoria">

                    <option value="">Todas as categorias</option>

                    <option value="Shows"
                        <?= $categoriaFiltro === 'Shows' ? 'selected' : '' ?>>
                        Shows
                    </option>

                    <option value="Gastronomia"
                        <?= $categoriaFiltro === 'Gastronomia' ? 'selected' : '' ?>>
                        Gastronomia
                    </option>

                    <option value="Exposições"
                        <?= $categoriaFiltro === 'Exposições' ? 'selected' : '' ?>>
                        Exposições
                    </option>

                    <option value="Feiras"
                        <?= $categoriaFiltro === 'Feiras' ? 'selected' : '' ?>>
                        Feiras
                    </option>

                </select>

            </div>


            <button type="submit" class="btn-filtrar">
                Filtrar eventos
            </button>

            <a href="eventos.php" class="btn-limpar">
                Limpar
            </a>

        </form>


        <!-- Quantidade de eventos -->

        <div class="eventos-resultado">

            <p>
                <?= count($eventosFiltrados) ?>
                <?= count($eventosFiltrados) === 1
                    ? 'evento encontrado'
                    : 'eventos encontrados' ?>
            </p>

        </div>


        <!-- =================================================
             CARDS DOS EVENTOS
        ================================================== -->

        <div class="eventos-grid">

            <?php if (!empty($eventosFiltrados)): ?>

                <?php foreach ($eventosFiltrados as $evento): ?>

                    <article class="evento-card">

                        <a
                            href="detalhe.php?id=<?= $evento['id'] ?>"
                            class="evento-link"
                        >

                            <div class="evento-imagem">

                                <span class="evento-categoria">
                                    <?= htmlspecialchars($evento['categoria']) ?>
                                </span>

                            </div>

                            <div class="evento-informacoes">

                                <h2>
                                    <?= htmlspecialchars($evento['titulo']) ?>
                                </h2>

                                <p>
                                    <span>◷</span>

                                    <?= date('d/m/Y', strtotime($evento['data'])) ?>

                                    ·

                                    <?= htmlspecialchars($evento['horario']) ?>
                                </p>

                                <p>
                                    <span>⌖</span>

                                    <?= htmlspecialchars($evento['local']) ?>
                                </p>

                            </div>

                        </a>

                    </article>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="eventos-vazio">

                    <span>⌕</span>

                    <h2>Nenhum evento encontrado</h2>

                    <p>
                        Não encontramos eventos com os filtros selecionados.
                        Tente realizar uma nova pesquisa.
                    </p>

                    <a href="eventos.php">
                        Limpar filtros
                    </a>

                </div>

            <?php endif; ?>

        </div>

    </section>

</main>

<?php
require_once __DIR__ . '/../Includes/footer.php';
?>
