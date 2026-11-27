<?php
$base = $base ?? rtrim(str_replace('\\', '/', dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
?>
<div class="modal" id="modal-reprovar" aria-hidden="true">
    <div class="modal__box" role="dialog" aria-modal="true" aria-labelledby="modal-reprovar-titulo">
        <button type="button" class="modal__close" data-modal-fechar aria-label="Fechar">&times;</button>

        <span class="admin-eyebrow">Agenda Cultural</span>
        <h2 class="modal__title" id="modal-reprovar-titulo">Reprovar evento</h2>
        <p class="admin-card__subtitle">Informe o motivo da reprovação.</p>

        <form id="form-reprovar">
            <input type="hidden" name="evento_id" id="reprovar-evento-id">

            <label class="modal__label" for="reprovar-motivo">Motivo da reprovação</label>
            <textarea class="modal__textarea" id="reprovar-motivo" name="motivo"
                      placeholder="Explique o que precisa ser corrigido." required></textarea>

            <div class="modal__actions">
                <button type="button" class="admin-btn admin-btn--outline" data-modal-fechar>Cancelar</button>
                <button type="submit" class="btn-primary admin-btn">Reprovar</button>
            </div>
        </form>
    </div>
</div>

<script src="<?= $base ?>/assets/js/modal.js" defer></script>