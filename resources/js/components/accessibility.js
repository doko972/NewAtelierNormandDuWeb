import lottie from 'lottie-web';

const STORAGE_KEY = 'a11y-prefs';
const FONT_STEPS = [0.9, 1, 1.15, 1.3, 1.5];

const DEFAULTS = {
  fontScale: 1,
  spacing: false,
  readableFont: false,
  alignLeft: false,
  highContrast: false,
  grayscale: false,
  underlineLinks: false,
  strongFocus: false,
  noMotion: false,
  bigCursor: false,
  readingGuide: false,
};

// Préférence booléenne → classe CSS posée sur <html>
const CLASS_MAP = {
  spacing: 'a11y-spacing',
  readableFont: 'a11y-readable-font',
  alignLeft: 'a11y-align-left',
  highContrast: 'a11y-high-contrast',
  grayscale: 'a11y-grayscale',
  underlineLinks: 'a11y-underline-links',
  strongFocus: 'a11y-strong-focus',
  noMotion: 'a11y-no-motion',
  bigCursor: 'a11y-big-cursor',
  readingGuide: 'a11y-reading-guide-on',
};

function getPrefs() {
  try {
    return { ...DEFAULTS, ...(JSON.parse(localStorage.getItem(STORAGE_KEY)) || {}) };
  } catch {
    return { ...DEFAULTS };
  }
}

function savePrefs(prefs) {
  try {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(prefs));
  } catch {
    // Stockage indisponible (navigation privée…) : les réglages restent actifs pour la page en cours
  }
}

function applyPrefs(prefs) {
  const root = document.documentElement;
  root.style.fontSize = prefs.fontScale === 1 ? '' : `${prefs.fontScale * 100}%`;
  Object.entries(CLASS_MAP).forEach(([key, cls]) => root.classList.toggle(cls, !!prefs[key]));

  // Animations Lottie (chatbot) : pilotées en JS, la CSS ne suffit pas
  if (prefs.noMotion) lottie.freeze(); else lottie.unfreeze();

  const guide = document.querySelector('.a11y-reading-guide');
  if (guide) guide.hidden = !prefs.readingGuide;

  const hasCustom = Object.keys(DEFAULTS).some((k) => prefs[k] !== DEFAULTS[k]);
  document.querySelector('.a11y-toggle')?.classList.toggle('has-custom', hasCustom);
}

function closestStep(value) {
  return FONT_STEPS.reduce((best, step) => (Math.abs(step - value) < Math.abs(best - value) ? step : best), 1);
}

document.addEventListener('DOMContentLoaded', () => {
  const prefs = getPrefs();
  prefs.fontScale = closestStep(prefs.fontScale);
  applyPrefs(prefs);

  const panel = document.getElementById('a11y-panel');
  const toggle = document.querySelector('.a11y-toggle');
  const backdrop = document.querySelector('.a11y-backdrop');
  if (!panel || !toggle) return;

  const fontOutput = panel.querySelector('[data-a11y-output="font"]');
  const decreaseBtn = panel.querySelector('[data-a11y-action="font-decrease"]');
  const increaseBtn = panel.querySelector('[data-a11y-action="font-increase"]');
  const switches = panel.querySelectorAll('[data-a11y-pref]');

  function syncControls() {
    const index = FONT_STEPS.indexOf(prefs.fontScale);
    fontOutput.textContent = `${Math.round(prefs.fontScale * 100)} %`;
    decreaseBtn.disabled = index <= 0;
    increaseBtn.disabled = index >= FONT_STEPS.length - 1;
    switches.forEach((input) => { input.checked = !!prefs[input.dataset.a11yPref]; });
  }

  function update() {
    savePrefs(prefs);
    applyPrefs(prefs);
    syncControls();
  }

  syncControls();

  // --- Ouverture / fermeture (fenêtre modale accessible) ---
  let lastFocused = null;

  function focusables() {
    return [...panel.querySelectorAll('button:not([disabled]), input, [tabindex]:not([tabindex="-1"])')]
      .filter((el) => el.offsetParent !== null);
  }

  function open() {
    lastFocused = document.activeElement;
    panel.hidden = false;
    if (backdrop) backdrop.hidden = false;
    // Laisse le navigateur peindre l'état initial avant l'animation d'entrée
    requestAnimationFrame(() => {
      panel.classList.add('is-open');
      backdrop?.classList.add('is-open');
    });
    toggle.setAttribute('aria-expanded', 'true');
    document.documentElement.classList.add('a11y-panel-open');
    panel.querySelector('.a11y-close')?.focus();
  }

  function close() {
    panel.classList.remove('is-open');
    backdrop?.classList.remove('is-open');
    toggle.setAttribute('aria-expanded', 'false');
    document.documentElement.classList.remove('a11y-panel-open');

    const finish = () => {
      panel.hidden = true;
      if (backdrop) backdrop.hidden = true;
    };
    const duration = parseFloat(getComputedStyle(panel).transitionDuration) || 0;
    if (duration > 0) setTimeout(finish, duration * 1000); else finish();

    (lastFocused && document.contains(lastFocused) ? lastFocused : toggle).focus();
  }

  toggle.addEventListener('click', () => (panel.hidden ? open() : close()));
  document.querySelectorAll('[data-a11y-close]').forEach((el) => el.addEventListener('click', close));

  panel.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      e.preventDefault();
      close();
      return;
    }
    if (e.key !== 'Tab') return;

    // Piège le focus dans la fenêtre tant qu'elle est ouverte
    const items = focusables();
    if (!items.length) return;
    const first = items[0];
    const last = items[items.length - 1];
    if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
    else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
  });

  // --- Réglages ---
  decreaseBtn.addEventListener('click', () => {
    const i = FONT_STEPS.indexOf(prefs.fontScale);
    if (i > 0) { prefs.fontScale = FONT_STEPS[i - 1]; update(); }
  });

  increaseBtn.addEventListener('click', () => {
    const i = FONT_STEPS.indexOf(prefs.fontScale);
    if (i < FONT_STEPS.length - 1) { prefs.fontScale = FONT_STEPS[i + 1]; update(); }
  });

  switches.forEach((input) => {
    input.addEventListener('change', () => {
      prefs[input.dataset.a11yPref] = input.checked;
      update();
    });
  });

  panel.querySelector('[data-a11y-action="reset"]')?.addEventListener('click', () => {
    Object.assign(prefs, DEFAULTS);
    update();
  });

  // --- Guide de lecture : bande horizontale qui suit la souris ---
  const guide = document.querySelector('.a11y-reading-guide');
  if (guide) {
    let frame = null;
    document.addEventListener('pointermove', (e) => {
      if (!prefs.readingGuide || e.pointerType !== 'mouse' || frame) return;
      frame = requestAnimationFrame(() => {
        guide.style.transform = `translateY(${e.clientY}px)`;
        frame = null;
      });
    }, { passive: true });
  }
});
