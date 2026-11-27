document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById(
        'modal-excluir-categoria'
    );

    const modalGerenciar = document.getElementById(
        'modal-gerenciar-categorias'
    );

    if (!modal || !modalGerenciar) return;

    const form = document.getElementById(
        'form-excluir-categoria'
    );

    const campoNome = document.getElementById(
        'nome-categoria-excluir'
    );

    const campoInput = document.getElementById(
        'categoria-excluir-input'
    );

    const botaoCancelar = modal.querySelector(
        '[data-cancelar-exclusao]'
    );

    const botaoExcluir = modal.querySelector(
        '.modal-categorias__btn-delete'
    );

    let focoAnterior = null;

    const abrir = (nome) => {
        focoAnterior = document.activeElement;

        campoNome.textContent = nome;
        campoInput.value = nome;

        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');

        // O modal inferior permanece visível,
        // mas o foco fica na confirmação.
        modalGerenciar.setAttribute('aria-hidden', 'true');

        botaoCancelar.focus();
    };

    const fechar = (voltar = true) => {
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');

        if (voltar) {
            modalGerenciar.setAttribute(
                'aria-hidden',
                'false'
            );

            if (focoAnterior?.isConnected) {
                focoAnterior.focus();
            }
        }
    };

    // Recebe o evento emitido pelo modal gerenciar.
    document.addEventListener('categoria:excluir', (e) => {
        const nome = e.detail?.nome;

        if (!nome) return;

        abrir(nome);
    });

    document.addEventListener('click', (e) => {
        if (!modal.classList.contains('is-open')) {
            return;
        }

        // Cancelar, X ou clique no fundo
        if (
            e.target.closest('[data-cancelar-exclusao]') ||
            e.target === modal
        ) {
            fechar();
        }
    });

    document.addEventListener('keydown', (e) => {
        if (!modal.classList.contains('is-open')) {
            return;
        }

        if (e.key === 'Escape') {
            e.stopImmediatePropagation();
            fechar();
        }
    });

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        const nome = campoInput.value;

        if (!nome) return;

        // Evento preparado para integração futura.
        // Não exclui nada do banco de dados.
        document.dispatchEvent(
            new CustomEvent('categoria:exclusao-confirmada', {
                detail: { nome }
            })
        );

        fechar(false);

        // Fecha também o modal de gerenciamento.
        modalGerenciar.classList.remove('is-open');
        modalGerenciar.setAttribute('aria-hidden', 'true');

        const botaoAbrir = document.querySelector(
            '[data-gerenciar-categorias]'
        );

        botaoAbrir?.focus();
    });
});