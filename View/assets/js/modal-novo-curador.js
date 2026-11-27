document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('modal-novo-curador');
  if (!modal) return;

  const form = document.getElementById('form-novo-curador');
  const { nome, cpf, email, telefone } = form.elements;

  const mascaras = {
    cpf: (v) => v.replace(/\D/g, '').slice(0, 11)
      .replace(/(\d{3})(\d)/, '$1.$2')
      .replace(/(\d{3})(\d)/, '$1.$2')
      .replace(/(\d{3})(\d{1,2})$/, '$1-$2'),
    telefone: (v) => v.replace(/\D/g, '').slice(0, 11)
      .replace(/^(\d{2})(\d)/, '($1) $2')
      .replace(/(\d{4,5})(\d{4})$/, '$1-$2'),
  };

  form.addEventListener('input', (e) => {
    const mascara = mascaras[e.target.name];
    if (mascara) e.target.value = mascara(e.target.value);
  });

  const alternar = (aberto) => {
    modal.classList.toggle('is-open', aberto);
    modal.setAttribute('aria-hidden', String(!aberto));
  };

  document.addEventListener('click', (e) => {
    if (e.target.closest('[data-novo-curador]')) {
      e.preventDefault();
      form.reset();
      alternar(true);
      nome.focus();
      return;
    }

    if (modal.classList.contains('is-open') &&
        (e.target === modal || e.target.closest('[data-modal-fechar]') && modal.contains(e.target))) {
      alternar(false);
    }
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('is-open')) alternar(false);
  });

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    document.dispatchEvent(new CustomEvent('curador:criado', {
      detail: {
        nome:     nome.value.trim(),
        cpf:      cpf.value,
        email:    email.value.trim(),
        telefone: telefone.value,
      },
    }));
    alternar(false);
  });
});