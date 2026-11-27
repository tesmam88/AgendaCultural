document.addEventListener('DOMContentLoaded', () => {
  const modal  = document.getElementById('modal-reprovar');
  if (!modal) return;

  const form   = document.getElementById('form-reprovar');
  const campoId = document.getElementById('reprovar-evento-id');
  const motivo = document.getElementById('reprovar-motivo');

  const abrir = (id) => {
    campoId.value = id;
    motivo.value = '';
    modal.classList.add('is-open');
    modal.setAttribute('aria-hidden', 'false');
    motivo.focus();
  };

  const fechar = () => {
    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
  };

  document.addEventListener('click', (e) => {
    const botao = e.target.closest('[data-reprovar]');
    if (botao) abrir(botao.dataset.reprovar);

    if (e.target.closest('[data-modal-fechar]') || e.target === modal) fechar();
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') fechar();
  });

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    // Avisa a página que o evento foi reprovado (a página decide o que fazer)
    document.dispatchEvent(new CustomEvent('evento:reprovado', {
      detail: { id: campoId.value, motivo: motivo.value }
    }));
    fechar();
  });
});