<div
    id="modal-excluir-categoria"
    class="modal modal--excluir-categoria"
    role="dialog"
    aria-modal="true"
    aria-labelledby="titulo-excluir-categoria"
    aria-hidden="true"
>
    <div class="modal__box modal-categorias__box">

        <button
            type="button"
            class="modal__close"
            data-cancelar-exclusao
            aria-label="Fechar confirmação"
        >&times;</button>

        <span class="modal-categorias__eyebrow">
            AGENDA CULTURAL
        </span>

        <h2
            id="titulo-excluir-categoria"
            class="modal__title"
        >
             Excluir categoria deseja excluir?
        </h2>

        <p class="modal-categorias__description">
            Tem certeza que quer excluir a categoria
            "<strong id="nome-categoria-excluir"></strong>"?
            Esta ação não poderá ser desfeita e pode
            afetar eventos vinculados.
        </p>

        <form
            id="form-excluir-categoria"
            action="#"
            method="post"
        >
            <input
                type="hidden"
                name="categoria"
                id="categoria-excluir-input"
            >

            <div class="modal__actions">

                <button
                    type="button"
                    class="modal-categorias__btn-cancel"
                    data-cancelar-exclusao
                >
                    Cancelar
                </button>

                <button
                    type="submit"
                    class="modal-categorias__btn-delete"
                >
                    Excluir
                </button>

            </div>
        </form>

    </div>
</div>