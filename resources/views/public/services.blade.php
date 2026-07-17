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
                <p>Formulaires intelligents, premières automatisations, structure pensée pour grandir avec vous.</p>
                <a href="{{ route('page.show', 'contact') }}">Demander un devis →</a>
            </div>
            <div class="service-card">
                <span class="tag">Sur-mesure</span>
                <h3>Application &amp; automatisation avancée</h3>
                <p>Web, Android, chatbots, automatisations connectées, et accompagnement IT si besoin.</p>
                <a href="{{ route('page.show', 'contact') }}">Demander un devis →</a>
            </div>
        </div>
    </section>

    <section class="container section">
        <div class="section-header">
            <div class="eyebrow">Détail</div>
            <h2>Automatisation &amp; informatique</h2>
        </div>

        <div class="compare">
            <div class="compare-col yes">
                <h3>Automatisation</h3>
                <ul>
                    <li><span class="mark">✓</span>Chatbots pour qualifier vos demandes</li>
                    <li><span class="mark">✓</span>Formulaires intelligents connectés</li>
                    <li><span class="mark">✓</span>Connexions entre vos outils existants</li>
                </ul>
            </div>
            <div class="compare-col yes">
                <h3>Informatique</h3>
                <ul>
                    <li><span class="mark">✓</span>Dépannage &amp; installation</li>
                    <li><span class="mark">✓</span>Mise en place de baies informatiques</li>
                    <li><span class="mark">✓</span>Sensibilisation à l'IA pour vos équipes</li>
                </ul>
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