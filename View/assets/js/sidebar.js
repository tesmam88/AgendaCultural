document.addEventListener('DOMContentLoaded', () => {
  const sidebar = document.getElementById('sidebar');
  if (!sidebar) return;

  // Define a ordem da animação em cascata
  const elementos = sidebar.querySelectorAll(
    '.sidebar__brand, .sidebar__nav .sidebar__item, .sidebar__footer'
  );
  elementos.forEach((el, i) => el.style.setProperty('--i', i));

  // Dispara a animação no próximo frame
  requestAnimationFrame(() => sidebar.classList.add('is-ready'));
});