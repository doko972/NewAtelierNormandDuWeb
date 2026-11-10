{{-- Panneau d'accessibilité : préférences d'affichage enregistrées dans le navigateur du visiteur --}}
<button type="button" class="a11y-toggle" aria-controls="a11y-panel" aria-expanded="false"
    aria-label="Ouvrir les options d'accessibilité" title="Accessibilité">
    <svg viewBox="0 0 24 24" width="26" height="26" aria-hidden="true" focusable="false">
        <circle cx="12" cy="4" r="2" fill="currentColor" />
        <path fill="currentColor"
            d="M20.5 7.5c-2.4.6-5.3.9-8.5.9s-6.1-.3-8.5-.9l-.5 2c1.9.5 4 .8 6 .9v3.1L7.3 21l1.9.7 2.8-6.7 2.8 6.7 1.9-.7L14 13.5v-3.1c2-.1 4.1-.4 6-.9l-.5-2z" />
    </svg>
</button>

<div class="a11y-backdrop" data-a11y-close hidden></div>

<div id="a11y-panel" class="a11y-panel" role="dialog" aria-modal="true" aria-labelledby="a11y-title" hidden>
    <div class="a11y-handle" aria-hidden="true"></div>

    <header class="a11y-header">
        <div>
            <h2 id="a11y-title" class="a11y-title">Accessibilité</h2>
            <p class="a11y-subtitle">Adaptez l'affichage à vos besoins. Vos choix sont mémorisés sur cet appareil.</p>
        </div>
        <button type="button" class="a11y-close" data-a11y-close aria-label="Fermer les options d'accessibilité">
            <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false">
                <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" d="M6 6l12 12M18 6L6 18" />
            </svg>
        </button>
    </header>

    <div class="a11y-body">
        {{-- Texte --}}
        <section class="a11y-group" aria-labelledby="a11y-group-text">
            <h3 id="a11y-group-text" class="a11y-group-title">Texte</h3>

            <div class="a11y-row">
                <span class="a11y-row-label" id="a11y-fontsize-label">Taille du texte</span>
                <div class="a11y-stepper" role="group" aria-labelledby="a11y-fontsize-label">
                    <button type="button" data-a11y-action="font-decrease" aria-label="Réduire la taille du texte">A−</button>
                    <output data-a11y-output="font" aria-live="polite">100 %</output>
                    <button type="button" data-a11y-action="font-increase" aria-label="Agrandir la taille du texte">A+</button>
                </div>
            </div>

            <label class="a11y-switch">
                <span class="a11y-switch-text">
                    <b>Espacement du texte</b>
                    <small>Plus d'espace entre lignes, mots et lettres</small>
                </span>
                <input type="checkbox" role="switch" data-a11y-pref="spacing">
                <span class="a11y-switch-track" aria-hidden="true"></span>
            </label>

            <label class="a11y-switch">
                <span class="a11y-switch-text">
                    <b>Police lisible</b>
                    <small>Police simple, adaptée notamment à la dyslexie</small>
                </span>
                <input type="checkbox" role="switch" data-a11y-pref="readableFont">
                <span class="a11y-switch-track" aria-hidden="true"></span>
            </label>

            <label class="a11y-switch">
                <span class="a11y-switch-text">
                    <b>Aligner à gauche</b>
                    <small>Supprime le texte justifié ou centré</small>
                </span>
                <input type="checkbox" role="switch" data-a11y-pref="alignLeft">
                <span class="a11y-switch-track" aria-hidden="true"></span>
            </label>
        </section>

        {{-- Couleurs --}}
        <section class="a11y-group" aria-labelledby="a11y-group-color">
            <h3 id="a11y-group-color" class="a11y-group-title">Couleurs</h3>

            <label class="a11y-switch">
                <span class="a11y-switch-text">
                    <b>Contraste élevé</b>
                    <small>Fond noir, texte blanc, couleurs renforcées</small>
                </span>
                <input type="checkbox" role="switch" data-a11y-pref="highContrast">
                <span class="a11y-switch-track" aria-hidden="true"></span>
            </label>

            <label class="a11y-switch">
                <span class="a11y-switch-text">
                    <b>Niveaux de gris</b>
                    <small>Affiche le site sans couleurs</small>
                </span>
                <input type="checkbox" role="switch" data-a11y-pref="grayscale">
                <span class="a11y-switch-track" aria-hidden="true"></span>
            </label>
        </section>

        {{-- Navigation --}}
        <section class="a11y-group" aria-labelledby="a11y-group-nav">
            <h3 id="a11y-group-nav" class="a11y-group-title">Navigation</h3>

            <label class="a11y-switch">
                <span class="a11y-switch-text">
                    <b>Souligner les liens</b>
                    <small>Repérer facilement les liens cliquables</small>
                </span>
                <input type="checkbox" role="switch" data-a11y-pref="underlineLinks">
                <span class="a11y-switch-track" aria-hidden="true"></span>
            </label>

            <label class="a11y-switch">
                <span class="a11y-switch-text">
                    <b>Focus renforcé</b>
                    <small>Contour très visible lors de la navigation au clavier</small>
                </span>
                <input type="checkbox" role="switch" data-a11y-pref="strongFocus">
                <span class="a11y-switch-track" aria-hidden="true"></span>
            </label>

            <label class="a11y-switch">
                <span class="a11y-switch-text">
                    <b>Arrêter les animations</b>
                    <small>Supprime les mouvements et transitions</small>
                </span>
                <input type="checkbox" role="switch" data-a11y-pref="noMotion">
                <span class="a11y-switch-track" aria-hidden="true"></span>
            </label>

            {{-- Options liées à la souris : masquées sur écran tactile --}}
            <label class="a11y-switch a11y-pointer-only">
                <span class="a11y-switch-text">
                    <b>Grand curseur</b>
                    <small>Pointeur de souris agrandi</small>
                </span>
                <input type="checkbox" role="switch" data-a11y-pref="bigCursor">
                <span class="a11y-switch-track" aria-hidden="true"></span>
            </label>

            <label class="a11y-switch a11y-pointer-only">
                <span class="a11y-switch-text">
                    <b>Guide de lecture</b>
                    <small>Une bande suit la souris pour suivre la ligne lue</small>
                </span>
                <input type="checkbox" role="switch" data-a11y-pref="readingGuide">
                <span class="a11y-switch-track" aria-hidden="true"></span>
            </label>
        </section>
    </div>

    <footer class="a11y-footer">
        <button type="button" class="btn btn-secondary a11y-reset" data-a11y-action="reset">
            Réinitialiser
        </button>
        <button type="button" class="btn btn-primary" data-a11y-close>Terminé</button>
    </footer>
</div>

<div class="a11y-reading-guide" aria-hidden="true" hidden></div>
