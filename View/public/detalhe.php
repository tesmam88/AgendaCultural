
<?php

$titulo = "Detalhes do evento | Agenda Cultural";

// Inclui o cabeçalho existente
require_once __DIR__ . '/../Includes/header.php';

// =====================================================
// EVENTOS DE EXEMPLO
// =====================================================

$eventos = [
    1 => [
        "categoria" => "Shows",
        "titulo" => "Show Guilherme & Santiago",
        "descricao" => "Uma noite de música sertaneja com grandes sucessos e energia para cantar junto. Evento de demonstração para a Agenda Cultural.",
        "data" => "06/11/2026",
        "horario" => "20h",
        "local" => "Morena FM",
        "endereco" => "Av. Mato Grosso, Campo Grande - MS",
        "preco" => "A partir de R$ 80,00",
        "ingresso" => "Consulte as informações de ingresso com o organizador."
    ],

    2 => [
        "categoria" => "Gastronomia",
        "titulo" => "Festival de Gastronomia",
        "descricao" => "Uma experiência gastronômica com diferentes sabores, pratos regionais e opções para toda a família.",
        "data" => "07/11/2026",
        "horario" => "11h às 22h",
        "local" => "Parque das Nações Indígenas",
        "endereco" => "Av. Afonso Pena, Campo Grande - MS",
        "preco" => "Entrada gratuita",
        "ingresso" => "Evento aberto ao público."
    ],

    3 => [
        "categoria" => "Exposições",
        "titulo" => "Exposição Arte Contemporânea",
        "descricao" => "Uma exposição dedicada à arte contemporânea, reunindo obras e diferentes expressões artísticas.",
        "data" => "08/11/2026",
        "horario" => "9h às 18h",
        "local" => "MAC - Museu de Arte Contemporânea",
        "endereco" => "Parque das Nações Indígenas, Campo Grande - MS",
        "preco" => "Entrada gratuita",
        "ingresso" => "Visitação aberta ao público."
    ],

    4 => [
        "categoria" => "Feiras",
        "titulo" => "Feira do Bosque",
        "descricao" => "Uma feira cultural com artesanato, gastronomia, música e produtos de produtores locais.",
        "data" => "08/11/2026",
        "horario" => "16h às 21h",
        "local" => "Praça do Rádio",
        "endereco" => "Centro, Campo Grande - MS",
        "preco" => "Entrada gratuita",
        "ingresso" => "Evento aberto ao público."
    ]
];

// =====================================================
// IDENTIFICANDO O EVENTO
// =====================================================

$idEvento = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$idEvento || !isset($eventos[$idEvento])) {
    $evento = null;
} else {
    $evento = $eventos[$idEvento];
}

?>
<link rel="stylesheet" href="../assets/css/main.css">
<main class="detalhe-page">

    <?php if ($evento): ?>

        <!-- =============================================
             BANNER DO EVENTO
        ============================================== -->

        <section class="detalhe-banner">

            <div class="detalhe-banner-content">

                <span class="detalhe-banner-categoria">
                    <?= htmlspecialchars($evento['categoria']) ?>
                </span>

                <h1>
                    <?= htmlspecialchars($evento['titulo']) ?>
                </h1>

            </div>

        </section>


        <!-- =============================================
             CONTEÚDO PRINCIPAL
        ============================================== -->

        <section class="detalhe-container">

            <a href="eventos.php" class="detalhe-voltar">
                ← Voltar para a agenda
            </a>


            <div class="detalhe-layout">

                <!-- COLUNA PRINCIPAL -->

                <div class="detalhe-conteudo">

                    <article class="detalhe-card">

                        <span class="detalhe-categoria">
                            <?= htmlspecialchars($evento['categoria']) ?>
                        </span>

                        <h2>Sobre o evento</h2>

                        <p class="detalhe-descricao">
                            <?= htmlspecialchars($evento['descricao']) ?>
                        </p>


                        <!-- GALERIA DE IMAGENS -->

                        <div class="detalhe-galeria">

                            <h2>Galeria de imagens</h2>

                            <div class="galeria-grid">

                                <div class="galeria-item"></div>

                                <div class="galeria-item"></div>

                                <div class="galeria-item"></div>

                            </div>

                        </div>

                    </article>

                </div>


                <!-- COLUNA LATERAL -->

                <aside class="detalhe-sidebar">


                    <!-- INFORMAÇÕES DE INGRESSO -->

                    <article class="detalhe-card ingresso-card">

                        <span class="detalhe-label">
                            INGRESSOS
                        </span>

                        <h2>
                            <?= htmlspecialchars($evento['preco']) ?>
                        </h2>

                        <p>
                            <?= htmlspecialchars($evento['ingresso']) ?>
                        </p>

                        <a href="#" class="btn-ingresso">
                            Informações de ingresso
                        </a>

                    </article>


                    <!-- DATA E LOCAL -->

                    <article class="detalhe-card local-card">

                        <h2>Quando e onde</h2>

                        <div class="detalhe-informacao">

                            <span class="detalhe-icone">◷</span>

                            <div>
                                <p>
                                    <?= htmlspecialchars($evento['data']) ?>
                                </p>

                                <small>
                                    <?= htmlspecialchars($evento['horario']) ?>
                                </small>
                            </div>

                        </div>


                        <div class="detalhe-informacao">

                            <span class="detalhe-icone">⌖</span>

                            <div>
                                <p>
                                    <?= htmlspecialchars($evento['local']) ?>
                                </p>

                                <small>
                                    <?= htmlspecialchars($evento['endereco']) ?>
                                </small>
                            </div>

                        </div>


                        <!-- LOCALIZAÇÃO -->

                        <div class="detalhe-mapa">

                            <span>⌖</span>

                            <p>Localização do evento</p>

                        </div>

                        <small class="mapa-legenda">
                            Mapa ilustrativo — integração com mapa não implementada.
                        </small>

                    </article>

                </aside>

            </div>

        </section>

    <?php else: ?>

        <!-- EVENTO NÃO ENCONTRADO -->

        <section class="detalhe-nao-encontrado">

            <h1>Evento não encontrado</h1>

            <p>
                O evento solicitado não está disponível na agenda.
            </p>

            <a href="eventos.php">
                Voltar para os eventos
            </a>

        </section>

    <?php endif; ?>

</main>

<?php
// Inclui o rodapé existente
require_once __DIR__ . '/../Includes/footer.php';
?>
