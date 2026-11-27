document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById(
        'modal-gerenciar-categorias'
    );

    if (!modal) return;

    const form = document.getElementById(
        'form-adicionar-categoria'
    );

    const input = document.getElementById('nova-categoria');

    const trigger = document.getElementById(
        'dropdown-categorias-trigger'
    );

    const dropdown = document.getElementById(
        'dropdown-categorias-lista'
    );

    let ultimoFoco = null;

    const fecharDropdown = () => {
        dropdown.hidden = true;
        trigger.setAttribute('aria-expanded', 'false');
    };

    const abrir = () => {
        ultimoFoco = document.activeElement;

        fecharDropdown();

        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');

        input.focus();
    };

    const fechar = () => {
        fecharDropdown();

        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');

        if (ultimoFoco && ultimoFoco.isConnected) {
            ultimoFoco.focus();
        }
    };

    const alternarDropdown = () => {
        const aberto = !dropdown.hidden;

        dropdown.hidden = aberto;

        trigger.setAttribute(
            'aria-expanded',
            String(!aberto)
        );
    };

    document.addEventListener('click', (e) => {
        // Botão da página principal
        const botaoAbrir = e.target.closest(
            '[data-gerenciar-categorias]'
        );

        if (botaoAbrir) {
            e.preventDefault();
            abrir();
            return;
        }

        if (!modal.classList.contains('is-open')) {
            return;
        }

        // Enquanto a confirmação estiver aberta,
        // ela controla os cliques de fechamento.
        const modalExcluir = document.getElementById(
            'modal-excluir-categoria'
        );

        if (modalExcluir?.classList.contains('is-open')) {
            return;
        }

        // Fechar pelo X ou pelo fundo
        if (
            e.target.closest('[data-fechar-gerenciar]') ||
            e.target === modal
        ) {
            fechar();
            return;
        }

        // Abrir/fechar dropdown
        if (e.target.closest('#dropdown-categorias-trigger')) {
            alternarDropdown();
            return;
        }

        // Clique na lixeira
        const lixeira = e.target.closest(
            '[data-excluir-categoria]'
        );

        if (lixeira) {
            const nome = lixeira.dataset.excluirCategoria;

            fecharDropdown();

            document.dispatchEvent(
                new CustomEvent('categoria:excluir', {
                    detail: { nome }
                })
            );

            return;
        }

        // Clique fora do dropdown
        if (!e.target.closest(
            '.modal-categorias__dropdown-wrapper'
        )) {
            fecharDropdown();
        }
    });

    document.addEventListener('keydown', (e) => {
        if (!modal.classList.contains('is-open')) {
            return;
        }

        const modalExcluir = document.getElementById(
            'modal-excluir-categoria'
        );

        if (modalExcluir?.classList.contains('is-open')) {
            return;
        }

        if (e.key === 'Escape') {
            if (!dropdown.hidden) {
                fecharDropdown();
                trigger.focus();
            } else {
                fechar();
            }
        }
    });

    // A persistência será implementada no Controller.
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        const nome = input.value.trim();

        if (!nome) return;

        document.dispatchEvent(
            new CustomEvent('categoria:adicionar', {
                detail: { nome }
            })
        );
    });
});