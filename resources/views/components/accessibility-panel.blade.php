<button class="a11y-toggle" aria-label="Ouvrir les options d'accessibilité" aria-controls="a11y-panel" aria-expanded="false">
    ♿
</button>

<div id="a11y-panel" class="a11y-panel" role="dialog" aria-modal="true" aria-label="Options d'accessibilité" hidden>
    <h3 style="margin-bottom:12px;">Accessibilité</h3>

    <div class="field">
        <label>Taille du texte</label>
        <div style="display:flex; gap:8px;">
            <button type="button" class="btn btn-secondary" data-a11y="decrease" aria-label="Réduire la taille du texte">A-</button>
            <button type="button" class="btn btn-secondary" data-a11y="increase" aria-label="Augmenter la taille du texte">A+</button>
        </div>
    </div>

    <div class="field">
        <label style="display:flex; align-items:center; gap:8px; font-weight:400;">
            <input type="checkbox" data-a11y="contrast">
            Contraste élevé
        </label>
    </div>

    <div class="field">
        <label style="display:flex; align-items:center; gap:8px; font-weight:400;">
            <input type="checkbox" data-a11y="underline">
            Souligner les liens
        </label>
    </div>

    <button type="button" class="btn btn-secondary" data-a11y="reset" style="width:100%;">Réinitialiser</button>
</div>