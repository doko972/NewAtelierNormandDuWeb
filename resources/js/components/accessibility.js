const STORAGE_KEY = 'a11y-prefs';

function getPrefs() {
  try {
    return JSON.parse(localStorage.getItem(STORAGE_KEY)) || { fontScale: 1, highContrast: false, underlineLinks: false };
  } catch {
    return { fontScale: 1, highContrast: false, underlineLinks: false };
  }
}

function savePrefs(prefs) { localStorage.setItem(STORAGE_KEY, JSON.stringify(prefs)); }

function applyPrefs(prefs) {
  document.documentElement.style.fontSize = `${prefs.fontScale}rem`;
  document.documentElement.classList.toggle('a11y-high-contrast', prefs.highContrast);
  document.documentElement.classList.toggle('a11y-underline-links', prefs.underlineLinks);
}

document.addEventListener('DOMContentLoaded', () => {
  const prefs = getPrefs();
  applyPrefs(prefs);

  const panel = document.querySelector('.a11y-panel');
  const toggle = document.querySelector('.a11y-toggle');
  if (!panel || !toggle) return;

  const contrastBox = panel.querySelector('[data-a11y="contrast"]');
  const underlineBox = panel.querySelector('[data-a11y="underline"]');
  if (contrastBox) contrastBox.checked = prefs.highContrast;
  if (underlineBox) underlineBox.checked = prefs.underlineLinks;

  toggle.addEventListener('click', () => {
    const isHidden = panel.hasAttribute('hidden');
    if (isHidden) { panel.removeAttribute('hidden'); } else { panel.setAttribute('hidden', ''); }
    toggle.setAttribute('aria-expanded', isHidden);
  });

  panel.querySelector('[data-a11y="increase"]')?.addEventListener('click', () => {
    prefs.fontScale = Math.min(prefs.fontScale + 0.1, 1.5);
    savePrefs(prefs); applyPrefs(prefs);
  });
  panel.querySelector('[data-a11y="decrease"]')?.addEventListener('click', () => {
    prefs.fontScale = Math.max(prefs.fontScale - 0.1, 0.85);
    savePrefs(prefs); applyPrefs(prefs);
  });
  contrastBox?.addEventListener('change', () => {
    prefs.highContrast = contrastBox.checked;
    savePrefs(prefs); applyPrefs(prefs);
  });
  underlineBox?.addEventListener('change', () => {
    prefs.underlineLinks = underlineBox.checked;
    savePrefs(prefs); applyPrefs(prefs);
  });
  panel.querySelector('[data-a11y="reset"]')?.addEventListener('click', () => {
    const reset = { fontScale: 1, highContrast: false, underlineLinks: false };
    savePrefs(reset); applyPrefs(reset);
    if (contrastBox) contrastBox.checked = false;
    if (underlineBox) underlineBox.checked = false;
  });
});