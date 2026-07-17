<x-layouts.public :title="$page->meta_title_fr ?? $page->title_fr" :description="$page->meta_description_fr">

    <section class="hero">
        <div>
            <div class="hero-eyebrow">Mondeville · Normandie — Web, automatisation &amp; informatique</div>
            <h1>Des sites qui vous <em>appartiennent</em>.<br>Des automatisations qui <em>travaillent</em> pour vous.</h1>
            <p class="sub">Développement web sur-mesure et outils d'automatisation — chatbots, formulaires intelligents, connexions entre vos outils — jusqu'au dépannage et à l'installation de votre matériel. Conçus, livrés, et possédés par vous. Aucun abonnement forcé.</p>
            <div class="cta-row">
                <a href="{{ route('page.show', 'contact') }}" class="btn btn-primary">Discuter de mon projet</a>
                <a href="{{ route('page.show', 'realisations') }}" class="btn btn-secondary">Voir les réalisations</a>
            </div>
            <div class="stats">
                <div class="stat"><b>100%</b><span>Propriété du site</span></div>
                <div class="stat"><b>0€</b><span>Abonnement mensuel forcé</span></div>
                <div class="stat"><b>Sur-mesure</b><span>Laravel &amp; automatisation</span></div>
            </div>
        </div>

        <div class="schema">
            <div class="schema-label">Exemple de flux automatisé</div>
            <div class="node">
                <div class="node-dot copper"></div>
                <div class="node-text"><b>Formulaire du site</b><span>Un visiteur laisse sa demande</span></div>
            </div>
            <div class="connector a"><div class="pulse"></div></div>
            <div class="node">
                <div class="node-dot blue"></div>
                <div class="node-text"><b>Chatbot / automatisation</b><span>Qualifie et répond instantanément</span></div>
            </div>
            <div class="connector b"><div class="pulse"></div></div>
            <div class="node">
                <div class="node-dot copper"></div>
                <div class="node-text"><b>Notification &amp; suivi</b><span>Vous recevez le lead, prêt à traiter</span></div>
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
            <span class="tag">02 — Automatisation</span>
            <b>Chatbots &amp; automatisations</b>
            <span>Des outils qui travaillent pendant que vous gérez votre activité.</span>
        </div>
        <div class="pillar">
            <span class="tag">03 — Interventions IT</span>
            <b>Dépannage &amp; installation</b>
            <span>Mise en place, baies informatiques, raccordement, nettoyage, sensibilisation IA.</span>
        </div>
        <div class="pillar open">
            <span class="tag">04 — Sur mesure</span>
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
                <p>Formulaires intelligents, premières automatisations, structure pensée pour grandir avec vous.</p>
                <a href="{{ route('page.show', 'services') }}">En savoir plus →</a>
            </div>
            <div class="service-card">
                <span class="tag">Sur-mesure</span>
                <h3>Application &amp; automatisation avancée</h3>
                <p>Web, Android, chatbots, automatisations connectées, et accompagnement IT si besoin.</p>
                <a href="{{ route('page.show', 'services') }}">En savoir plus →</a>
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
            <p>Web, automatisation ou dépannage — parlons-en simplement, sans jargon ni engagement.</p>
            <a href="{{ route('page.show', 'contact') }}" class="btn btn-primary">Discuter du projet</a>
        </div>
    </section>

</x-layouts.public>