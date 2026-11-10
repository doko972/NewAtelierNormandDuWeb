<x-layouts.public :title="$page->meta_title_fr ?? $page->title_fr" :description="$page->meta_description_fr">

    <section class="hero">
        <div>
            <div class="hero-eyebrow">Condé-en-Normandie · Calvados — Web, informatique &amp; IA</div>
            <h1>Des sites qui vous <em>appartiennent</em>.<br>Une informatique qui vous <em>simplifie</em> la vie.</h1>
            <p class="sub">Technicien informatique de proximité et développeur web à Condé-en-Normandie et alentours : installation, câblage, dépannage, sites sur-mesure et accompagnement à l'intelligence artificielle. Des solutions livrées et possédées par vous. Aucun abonnement forcé.</p>
            <div class="cta-row">
                <a href="{{ route('page.show', 'contact') }}" class="btn btn-primary">Discuter de mon projet</a>
                <a href="{{ route('page.show', 'services') }}" class="btn btn-secondary">Voir les services</a>
            </div>
            <div class="stats">
                <div class="stat"><b>100%</b><span>Propriété du site</span></div>
                <div class="stat"><b>0€</b><span>Abonnement mensuel forcé</span></div>
                <div class="stat"><b>Sur-mesure</b><span>Web, apps &amp; hardware</span></div>
            </div>
        </div>

        <div class="schema">
            <div class="schema-label">Exemple de mise en place</div>
            <div class="node">
                <div class="node-dot copper"></div>
                <div class="node-text"><b>Installation de la baie</b><span>Matériel monté, rangé, organisé</span></div>
            </div>
            <div class="connector a"><div class="pulse"></div></div>
            <div class="node">
                <div class="node-dot blue"></div>
                <div class="node-text"><b>Câblage &amp; réseau</b><span>Raccordement propre, repéré, testé</span></div>
            </div>
            <div class="connector b"><div class="pulse"></div></div>
            <div class="node">
                <div class="node-dot copper"></div>
                <div class="node-text"><b>Mise en service</b><span>Tout fonctionne, vous êtes autonome</span></div>
            </div>
        </div>
    </section>

    <div class="pillars">
        <div class="pillar">
            <span class="tag">01 — Sites &amp; apps</span>
            <b>Web &amp; applications Android</b>
            <span>Laravel et Android sur-mesure, code propre — pas un thème recyclé.</span>
        </div>
        <div class="pillar">
            <span class="tag">02 — Infrastructure</span>
            <b>Baies, câblage &amp; réseau</b>
            <span>Installation propre et organisée de votre matériel informatique.</span>
        </div>
        <div class="pillar">
            <span class="tag">03 — Dépannage</span>
            <b>Dépannage en tout genre</b>
            <span>Panne, lenteur, mise à niveau : on remet votre matériel d'aplomb.</span>
        </div>
        <div class="pillar">
            <span class="tag">04 — IA</span>
            <b>Intelligence artificielle</b>
            <span>Comprendre, utiliser et intégrer l'IA, en gardant la main sur vos données.</span>
        </div>
        <div class="pillar open">
            <span class="tag">05 — Sur mesure</span>
            <b>Une idée ? Parlons-en.</b>
            <span>Votre besoin ne rentre dans aucune case ? On en discute ensemble.</span>
        </div>
    </div>

    <section class="container">
        <div class="eyebrow">Pourquoi ça change tout</div>
        <h2>Vous n'êtes pas locataire de votre site.</h2>
        <div class="compare">
            <div class="compare-col no">
                <h3>Agence classique</h3>
                <ul>
                    <li><span class="mark">×</span>Abonnement mensuel à vie</li>
                    <li><span class="mark">×</span>Site verrouillé chez l'agence</li>
                    <li><span class="mark">×</span>Tarifs peu clairs, devis flous</li>
                    <li><span class="mark">×</span>Interlocuteur qui change</li>
                </ul>
            </div>
            <div class="compare-col yes">
                <h3>Atelier Normand du Web</h3>
                <ul>
                    <li><span class="mark">✓</span>Vous êtes propriétaire du site</li>
                    <li><span class="mark">✓</span>Code et hébergement à votre nom</li>
                    <li><span class="mark">✓</span>Tarif clair, expliqué avant devis</li>
                    <li><span class="mark">✓</span>Un seul interlocuteur, de bout en bout</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="eyebrow">Ce que je peux construire pour vous</div>
        <h2>Trois façons de travailler ensemble</h2>
        <div class="service-grid">
            <div class="service-card">
                <span class="tag">Essentiel</span>
                <h3>Site vitrine</h3>
                <p>Clair, rapide, optimisé pour le référencement. Idéal pour démarrer ou repartir sur des bases saines.</p>
                <a href="{{ route('page.show', 'services') }}">En savoir plus →</a>
            </div>
            <div class="service-card">
                <span class="tag">Professionnel</span>
                <h3>Site sur-mesure évolutif</h3>
                <p>Formulaires soignés, structure claire et évolutive, pensée pour grandir avec vous.</p>
                <a href="{{ route('page.show', 'services') }}">En savoir plus →</a>
            </div>
            <div class="service-card">
                <span class="tag">Sur-mesure</span>
                <h3>Application &amp; infrastructure</h3>
                <p>Web, Android et applications métier, avec mise en place et dépannage de votre matériel si besoin.</p>
                <a href="{{ route('page.show', 'services') }}">En savoir plus →</a>
            </div>
        </div>
    </section>

    <section class="container" id="ia">
        <div class="eyebrow">Intelligence artificielle</div>
        <h2>L'IA, utile et sans poudre aux yeux</h2>
        <div class="service-grid">
            <div class="service-card">
                <span class="tag">Comprendre</span>
                <h3>Initiation &amp; prise en main</h3>
                <p>ChatGPT, Copilot, Mistral… Apprendre à bien s'en servir au quotidien, connaître leurs limites et éviter les pièges. Particuliers et professionnels.</p>
                <a href="{{ route('page.show', 'services') }}#ia">En savoir plus →</a>
            </div>
            <div class="service-card">
                <span class="tag">Intégrer</span>
                <h3>Assistant &amp; automatisations</h3>
                <p>Un assistant qui répond à vos clients sur votre site — comme celui en bas à droite de cette page — et des tâches répétitives automatisées.</p>
                <a href="{{ route('page.show', 'services') }}#ia">En savoir plus →</a>
            </div>
            <div class="service-card">
                <span class="tag">Garder la main</span>
                <h3>IA locale &amp; confidentielle</h3>
                <p>Une IA installée sur votre propre matériel : vos documents restent chez vous, sans abonnement ni envoi de données à l'extérieur.</p>
                <a href="{{ route('page.show', 'services') }}#ia">En savoir plus →</a>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="eyebrow">La méthode</div>
        <h2>Un déroulé simple, sans jargon</h2>
        <div class="process-row">
            <div class="process-step">
                <span class="num">01</span>
                <h3>Échange &amp; besoins</h3>
                <p>On clarifie ce dont vous avez vraiment besoin, sans détour technique.</p>
            </div>
            <div class="process-step">
                <span class="num">02</span>
                <h3>Proposition claire</h3>
                <p>Un devis détaillé, sans ligne cachée, avant tout engagement.</p>
            </div>
            <div class="process-step">
                <span class="num">03</span>
                <h3>Développement</h3>
                <p>Points d'étape réguliers, vous voyez le site avancer concrètement.</p>
            </div>
            <div class="process-step">
                <span class="num">04</span>
                <h3>Livraison &amp; autonomie</h3>
                <p>Le site est à vous, avec les explications pour le faire vivre.</p>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="cta-final">
            <h2>Une idée, un besoin, une urgence informatique ?</h2>
            <p>Web, matériel, dépannage ou IA — parlons-en simplement, sans jargon ni engagement.</p>
            <a href="{{ route('page.show', 'contact') }}" class="btn btn-primary">Discuter du projet</a>
        </div>
    </section>

</x-layouts.public>