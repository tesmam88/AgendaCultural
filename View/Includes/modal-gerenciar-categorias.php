<div
    id="modal-gerenciar-categorias"
    class="modal modal--gerenciar-categorias"
    role="dialog"
    aria-modal="true"
    aria-labelledby="titulo-gerenciar-categorias"
    aria-hidden="true"
>
    <div class="modal__box modal-categorias__box">

        <button
            type="button"
            class="modal__close"
            data-fechar-gerenciar
            aria-label="Fechar modal"
        >&times;</button>

        <span class="modal-categorias__eyebrow">
            AGENDA CULTURAL
        </span>

        <h2
            id="titulo-gerenciar-categorias"
            class="modal__title"
        >
            Gerenciar categorias
        </h2>

        <p class="modal-categorias__description">
            Adicione uma nova categoria ou remova uma existente.
        </p>

        <form
            id="form-adicionar-categoria"
            action="#"
            method="post"
        >
            <label
                class="modal__label"
                for="nova-categoria"
            >
                Adicionar nova categoria
            </label>

            <input
                type="text"
                id="nova-categoria"
                name="nome"
                class="modal-categorias__input"
                placeholder="Digite o nome da nova categoria"
                maxlength="100"
                required
            >

            <div class="modal-categorias__add-actions">
                <button
                    type="submit"
                    class="modal-categorias__btn-add"
                >
                    Adicionar
                </button>
            </div>
        </form>

        <div class="modal-categorias__dropdown-wrapper">

            <span
                id="label-remover-categoria"
                class="modal__label"
            >
                Remover categoria existente
            </span>

            <button
                type="button"
                id="dropdown-categorias-trigger"
                class="modal-categorias__trigger"
                aria-labelledby="label-remover-categoria dropdown-categorias-texto"
                aria-controls="dropdown-categorias-lista"
                aria-expanded="false"
            >
                <span id="dropdown-categorias-texto">
                    Selecione uma categoria para remover
                </span>

                <span aria-hidden="true">⌄</span>
            </button>

            <div
                id="dropdown-categorias-lista"
                class="modal-categorias__dropdown"
                hidden
            >
                <p class="modal-categorias__placeholder">
                    Selecione uma categoria para remover
                </p>

                <?php foreach ($categorias as $categoria): ?>
                    <div class="modal-categorias__option">

                        <span>
                            <?= htmlspecialchars(
                                $categoria,
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>
                        </span>

                        <button
                            type="button"
                            class="modal-categorias__trash"
                            data-excluir-categoria="<?= htmlspecialchars(
                                $categoria,
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>"
                            aria-label="Excluir categoria <?= htmlspecialchars(
                                $categoria,
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.7"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                            >
                                <path d="M3 6h18"/>
                                <path d="M8 6V4h8v2"/>
                                <path d="M19 6l-1 14H6L5 6"/>
                                <path d="M10 10v7"/>
                                <path d="M14 10v7"/>
                            </svg>
                        </button>

                    </div>
                <?php endforeach; ?>

            </div>
        </div>

    </div>
</div>