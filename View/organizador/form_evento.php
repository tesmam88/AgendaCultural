<?php
$base = defined('BASE_URL') ? BASE_URL : rtrim(str_replace('\\', '/', dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
$sidebarPerfil = 'organizador';
$sidebarAtivo  = 'cadastrar-evento';

$categorias = ['Shows', 'Festivais', 'Feiras', 'Gastronomia', 'Exposições', 'Culturais'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar evento | Agenda Cultural</title>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/aside.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/main.css">
</head>
<body>
    <?php include __DIR__ . '/../Includes/sidebar.php'; ?>

    <main class="has-sidebar admin-main">
        <header class="admin-topbar">
            <div>
                <span class="admin-eyebrow">Área do organizador</span>
                <h1 class="admin-title">Cadastrar evento</h1>
            </div>
            <span class="admin-badge">Organizador</span>
        </header>

        <section class="admin-card">
            <div class="admin-card__header">
                <div>
                    <h2 class="admin-card__title">Cadastrar novo evento</h2>
                    <p class="admin-card__subtitle">Preencha as informações para enviar à curadoria.</p>
                </div>
                <span class="status-badge status-badge--pending">Status inicial: Pendente</span>
            </div>

            <form method="post" action="#">
                <div class="form-grid">
                    <div class="form-campo">
                        <label for="nome">Nome do evento *</label>
                        <input type="text" id="nome" name="nome" placeholder="Ex.: Festival de Música" required>
                    </div>
                    <div class="form-campo">
                        <label for="categoria">Categoria *</label>
                        <select id="categoria" name="categoria" required>
                            <option value="">Selecione</option>
                            <?php foreach ($categorias as $categoria): ?>
                                <option value="<?= htmlspecialchars($categoria) ?>"><?= htmlspecialchars($categoria) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-campo">
                        <label for="data_inicio">Data de início *</label>
                        <input type="date" id="data_inicio" name="data_inicio" required>
                    </div>
                    <div class="form-campo">
                        <label for="hora_inicio">Horário de início *</label>
                        <input type="time" id="hora_inicio" name="hora_inicio" required>
                    </div>

                    <div class="form-campo">
                        <label for="data_fim">Data de término *</label>
                        <input type="date" id="data_fim" name="data_fim" required>
                    </div>
                    <div class="form-campo">
                        <label for="hora_fim">Horário de término *</label>
                        <input type="time" id="hora_fim" name="hora_fim" required>
                    </div>

                    <div class="form-campo form-campo--full">
                        <label for="local">Local do evento *</label>
                        <input type="text" id="local" name="local" placeholder="Nome do espaço" required>
                    </div>

                    <div class="form-campo form-campo--full">
                        <label for="endereco">Endereço completo *</label>
                        <input type="text" id="endereco" name="endereco" placeholder="Rua, número, bairro, Campo Grande – MS" required>
                    </div>

                    <div class="form-campo">
                        <label for="ingresso">Ingresso *</label>
                        <select id="ingresso" name="ingresso" required>
                            <option value="">Selecione</option>
                            <option value="gratuito">Gratuito</option>
                            <option value="pago">Pago</option>
                        </select>
                    </div>
                    <div class="form-campo">
                        <label for="valor">Valor do ingresso (R$)</label>
                        <input type="number" id="valor" name="valor" placeholder="0,00" min="0" step="0.01">
                    </div>

                    <div class="form-campo form-campo--full">
                        <label for="imagem">Imagem do evento *</label>
                        <input type="url" id="imagem" name="imagem" placeholder="Cole uma URL de imagem para demonstração" required>
                    </div>

                    <div class="form-campo form-campo--full">
                        <label for="descricao">Descrição *</label>
                        <textarea id="descricao" name="descricao" placeholder="Conte um pouco sobre o evento" required></textarea>
                    </div>
                </div>

                <div class="form-rodape">
                    <small>* Campos obrigatórios</small>
                    <button type="submit" class="btn-primary admin-btn">Enviar para curadoria →</button>
                </div>
            </form>
        </section>
    </main>

    <script>
        // O valor do ingresso só é preenchido quando o ingresso é pago
        const ingresso = document.getElementById('ingresso');
        const valor = document.getElementById('valor');

        function atualizarValor() {
            const pago = ingresso.value === 'pago';
            valor.disabled = !pago;
            if (!pago) valor.value = '';
        }

        ingresso.addEventListener('change', atualizarValor);
        atualizarValor();
    </script>
</body>
</html>