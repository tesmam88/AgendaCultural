<?php
$base = $base ?? rtrim(str_replace('\\', '/', dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
?>
<div class="modal" id="modal-editar-curador" aria-hidden="true">
    <div class="modal__box" role="dialog" aria-modal="true" aria-labelledby="modal-editar-curador-titulo">
        <button type="button" class="modal__close" data-modal-fechar aria-label="Fechar">&times;</button>

        <span class="admin-eyebrow">Agenda Cultural</span>
        <h2 class="modal__title" id="modal-editar-curador-titulo">Editar curador</h2>
        <p class="admin-card__subtitle">Atualize as informações do curador selecionado.</p>

        <form id="form-editar-curador">
            <input type="hidden" name="curador_id" id="editar-curador-id">

            <label class="modal__label" for="editar-curador-nome">Nome</label>
            <input class="modal__input" type="text" id="editar-curador-nome" name="nome" required>

            <label class="modal__label" for="editar-curador-email">E-mail</label>
            <input class="modal__input" type="email" id="editar-curador-email" name="email" required>

            <label class="modal__label" for="editar-curador-status">Status</label>
            <div class="modal__select-wrap" data-status="ativo">
                <span class="modal__status-dot" aria-hidden="true"></span>
                <select class="modal__select" id="editar-curador-status" name="status">
                    <option value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>
                </select>
            </div>

            <div class="modal__actions">
                <button type="button" class="admin-btn admin-btn--outline" data-modal-fechar>Cancelar</button>
                <button type="submit" class="btn-primary admin-btn">Salvar alterações</button>
            </div>
        </form>
    </div>
</div>

<script src="<?= $base ?>/assets/js/modal-editar-curador.js" defer></script>