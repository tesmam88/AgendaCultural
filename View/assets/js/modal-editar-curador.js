document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('modal-editar-curador');
  if (!modal) return;

  const form        = document.getElementById('form-editar-curador');
  const campoId     = document.getElementById('editar-curador-id');
  const campoNome   = document.getElementById('editar-curador-nome');
  const campoEmail  = document.getElementById('editar-curador-email');
  const campoStatus = document.getElementById('editar-curador-status');
  const statusWrap  = modal.querySelector('.modal__select-wrap');

  const atualizarBolinha = () => {
    statusWrap.dataset.status = campoStatus.value;
  };

  const abrir = ({ id, nome, email, status }) => {
    campoId.value     = id ?? '';
    campoNome.value   = nome ?? '';
    campoEmail.value  = email ?? '';
    campoStatus.value = status ?? 'ativo';
    atualizarBolinha();

    modal.classList.add('is-open');
    modal.setAttribute('aria-hidden', 'false');
    campoNome.focus();
  };

  const fechar = () => {
    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
  };

  document.addEventListener('click', (e) => {
    const botao = e.target.closest('[data-editar-curador]');
    if (botao) {
      e.preventDefault();
      abrir({
        id:     botao.dataset.editarCurador,
        nome:   botao.dataset.nome,
        email:  botao.dataset.email,
        status: botao.dataset.status,
      });
    }

    if (e.target.closest('[data-modal-fechar]') || e.target === modal) fechar();
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('is-open')) fechar();
  });

  campoStatus.addEventListener('change', atualizarBolinha);

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    document.dispatchEvent(new CustomEvent('curador:editado', {
      detail: {
        id:     campoId.value,
        nome:   campoNome.value.trim(),
        email:  campoEmail.value.trim(),
        status: campoStatus.value,
      },
    }));
    fechar();
  });
});