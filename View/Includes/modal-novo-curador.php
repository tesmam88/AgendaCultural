<?php
$base = $base ?? rtrim(str_replace('\\', '/', dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
?>
<div class="modal" id="modal-novo-curador" aria-hidden="true">
    <div class="modal__box" role="dialog" aria-modal="true" aria-labelledby="modal-novo-curador-titulo">
        <button type="button" class="modal__close" data-modal-fechar aria-label="Fechar">&times;</button>

        <span class="admin-eyebrow">Agenda Cultural</span>
        <h2 class="modal__title" id="modal-novo-curador-titulo">Novo curador</h2>
        <p class="admin-card__subtitle">Preencha as informações para cadastrar um novo curador.</p>

        <form id="form-novo-curador">
            <label class="modal__label" for="novo-curador-nome">Nome</label>
            <input class="modal__input" type="text" id="novo-curador-nome" name="nome"
                   placeholder="Digite o nome completo" required>

            <label class="modal__label" for="novo-curador-cpf">CPF</label>
            <input class="modal__input" type="text" id="novo-curador-cpf" name="cpf"
                   placeholder="000.000.000-00" inputmode="numeric" maxlength="14"
                   pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Formato: 000.000.000-00" required>

            <label class="modal__label" for="novo-curador-email">E-mail</label>
            <input class="modal__input" type="email" id="novo-curador-email" name="email"
                   placeholder="exemplo@agenda.com" required>

            <label class="modal__label" for="novo-curador-telefone">Celular ou número de contato</label>
            <input class="modal__input" type="tel" id="novo-curador-telefone" name="telefone"
                   placeholder="(00) 00000-0000" inputmode="numeric" maxlength="15" required>

            <div class="modal__actions">
                <button type="button" class="admin-btn admin-btn--outline" data-modal-fechar>Cancelar</button>
                <button type="submit" class="btn-primary admin-btn">Cadastrar</button>
            </div>
        </form>
    </div>
</div>

<script src="<?= $base ?>/assets/js/modal-novo-curador.js" defer></script>