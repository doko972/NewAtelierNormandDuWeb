document.addEventListener('DOMContentLoaded', () => {
  const burger = document.querySelector('.navbar-burger');
  const links = document.querySelector('.navbar-links');
  const nav = document.querySelector('.navbar');
  if (!burger || !links || !nav) return;

  burger.addEventListener('click', () => {
    const isOpen = links.classList.toggle('navbar-links--open');
    burger.setAttribute('aria-expanded', isOpen);
  });

  document.addEventListener('click', (e) => {
    if (!nav.contains(e.target)) {
      links.classList.remove('navbar-links--open');
      burger.setAttribute('aria-expanded', 'false');
    }
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      links.classList.remove('navbar-links--open');
      burger.setAttribute('aria-expanded', 'false');
    }
  });
});