
<?php

$titulo = "Sobre | Agenda Cultural - Campo Grande";

require_once __DIR__ . '/../Includes/header.php';

?>
<link rel="stylesheet" href="../assets/css/main.css">
<main class="sobre-page">

    <!-- =================================================
         BANNER PRINCIPAL
    ================================================== -->

    <section class="sobre-banner">

        <span class="sobre-label">
            NOSSA CIDADE, NOSSA CULTURA
        </span>

        <h1>Sobre a Agenda Cultural</h1>

        <p>
            Um ponto de encontro para descobrir o que movimenta Campo Grande.
        </p>

    </section>


    <!-- =================================================
         APRESENTAÇÃO DO PROJETO
    ================================================== -->

    <section class="sobre-container">

        <div class="sobre-conteudo">

            <span class="sobre-label">
                CONECTANDO PESSOAS E EXPERIÊNCIAS
            </span>

            <h2>
                A cultura da cidade em um só lugar.
            </h2>

            <p>
                A Agenda Cultural de Campo Grande reúne eventos culturais,
                artísticos, gastronômicos e turísticos para facilitar a
                descoberta de novas experiências na cidade.
            </p>

            <p>
                Os eventos enviados por organizadores passam por uma
                curadoria antes de aparecerem na agenda pública. Assim,
                visitantes encontram informações organizadas sobre data,
                horário, local e ingressos.
            </p>

            <a href="eventos.php" class="sobre-button">
                Explorar eventos
            </a>

        </div>


        <!-- =================================================
             CARD INSTITUCIONAL
        ================================================== -->

        <aside class="sobre-destaque">

            <div class="sobre-destaque-item">

                <h3>Uma cidade</h3>

                <p>
                    Muitas histórias para viver.
                </p>

            </div>

            <div class="sobre-divisor"></div>

            <div class="sobre-destaque-item">

                <h3>Um só lugar</h3>

                <p>
                    Para descobrir sua próxima experiência.
                </p>

            </div>

        </aside>

    </section>

</main>

<?php

require_once __DIR__ . '/../Includes/footer.php';

?>
