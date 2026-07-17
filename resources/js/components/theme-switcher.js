const STORAGE_KEY = 'theme';

function applyTheme(theme) {
  document.documentElement.classList.toggle('theme-dark', theme === 'dark');
}

function initTheme() {
  // Sombre par défaut (identité de marque), sauf choix explicite du visiteur
  const saved = localStorage.getItem(STORAGE_KEY);
  applyTheme(saved || 'dark');
}

function toggleTheme() {
  const isDark = document.documentElement.classList.contains('theme-dark');
  const next = isDark ? 'light' : 'dark';
  localStorage.setItem(STORAGE_KEY, next);
  applyTheme(next);
}

document.addEventListener('DOMContentLoaded', () => {
  initTheme();
  document.querySelectorAll('.theme-switcher').forEach((btn) => {
    btn.addEventListener('click', toggleTheme);
  });
});