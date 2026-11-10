<x-layouts.public :title="$page->meta_title_fr ?? $page->title_fr" :description="$page->meta_description_fr">

    <section class="container section">
        <div class="section-header">
            <div class="eyebrow">Ce que je peux construire pour vous</div>
            <h1>{{ app()->getLocale() === 'en' ? $page->title_en : $page->title_fr }}</h1>
        </div>

        <div class="service-grid">
            <div class="service-card">
                <span class="tag">Essentiel</span>
                <h3>Site vitrine</h3>
                <p>Clair, rapide, optimisé pour le référencement. Idéal pour démarrer ou repartir sur des bases saines.</p>
                <a href="{{ route('page.show', 'contact') }}">Demander un devis →</a>
            </div>
            <div class="service-card">
                <span class="tag">Professionnel</span>
                <h3>Site sur-mesure évolutif</h3>
                <p>Formulaires soignés, structure claire et évolutive, pensée pour grandir avec vous.</p>
                <a href="{{ route('page.show', 'contact') }}">Demander un devis →</a>
            </div>
            <div class="service-card">
                <span class="tag">Sur-mesure</span>
                <h3>Application &amp; infrastructure</h3>
                <p>Web, Android et applications métier, avec mise en place et dépannage de votre matériel si besoin.</p>
                <a href="{{ route('page.show', 'contact') }}">Demander un devis →</a>
            </div>
        </div>
    </section>

    <section class="container section">
        <div class="section-header">
            <div class="eyebrow">Détail</div>
            <h2>Infrastructure &amp; dépannage</h2>
        </div>

        <div class="compare">
            <div class="compare-col yes">
                <h3>Infrastructure &amp; réseau</h3>
                <ul>
                    <li><span class="mark">✓</span>Installation &amp; montage de baies informatiques</li>
                    <li><span class="mark">✓</span>Câblage et raccordement réseau propre</li>
                    <li><span class="mark">✓</span>Repérage, tests et mise en service</li>
                </ul>
            </div>
            <div class="compare-col yes">
                <h3>Dépannage &amp; matériel</h3>
                <ul>
                    <li><span class="mark">✓</span>Dépannage en tout genre (panne, lenteur)</li>
                    <li><span class="mark">✓</span>Nettoyage &amp; mise à niveau du matériel</li>
                    <li><span class="mark">✓</span>Conseil et choix de votre équipement</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="container section" id="ia">
        <div class="section-header">
            <div class="eyebrow">Intelligence artificielle</div>
            <h2>L'IA, concrètement</h2>
        </div>

        <div class="service-grid">
            <div class="service-card">
                <span class="tag">Comprendre</span>
                <h3>Initiation &amp; prise en main</h3>
                <p>Séances à domicile ou en entreprise pour apprendre à utiliser ChatGPT, Copilot ou Mistral : rédiger, résumer, traduire, chercher. Bonnes pratiques, limites et précautions avec vos données.</p>
                <a href="{{ route('page.show', 'contact') }}">Demander un devis →</a>
            </div>
            <div class="service-card">
                <span class="tag">Intégrer</span>
                <h3>Assistant &amp; automatisations</h3>
                <p>Un assistant sur votre site qui répond aux questions fréquentes et oriente vers vous. Automatisation de tâches répétitives : tri des emails, préparation de devis, extraction de factures.</p>
                <a href="{{ route('page.show', 'contact') }}">Demander un devis →</a>
            </div>
            <div class="service-card">
                <span class="tag">Garder la main</span>
                <h3>IA locale &amp; confidentielle</h3>
                <p>Installation d'une IA sur votre ordinateur ou serveur : elle fonctionne chez vous, sur vos documents, sans abonnement et sans que vos données sortent de vos murs.</p>
                <a href="{{ route('page.show', 'contact') }}">Demander un devis →</a>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="cta-final">
            <h2>Une idée, un besoin ?</h2>
            <p>Parlons de votre projet, simplement, sans jargon ni engagement.</p>
            <a href="{{ route('page.show', 'contact') }}" class="btn btn-primary">Discuter du projet</a>
        </div>
    </section>

</x-layouts.public>