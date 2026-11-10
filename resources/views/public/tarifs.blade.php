<x-layouts.public :title="$page->meta_title_fr ?? $page->title_fr" :description="$page->meta_description_fr ?? 'Tarifs clairs pour le dépannage informatique, la création de sites web et l\'accompagnement IA à Condé-en-Normandie.'">

    @php
        // Tarifs « à partir de » — à ajuster ici directement
        $groups = [
            [
                'id' => 'informatique',
                'tag' => 'Informatique de proximité',
                'title' => 'Dépannage & installation',
                'rows' => [
                    ['Dépannage à domicile — particulier', 'Diagnostic, réparation, lenteur, virus, sauvegarde', '50 € / h'],
                    ['Intervention — professionnel', 'Poste de travail, réseau, imprimante, messagerie', '60 € / h'],
                    ['Installation d\'un équipement', 'Ordinateur, box internet, imprimante, configuration', 'dès 60 €'],
                    ['Pose d\'une prise réseau', 'Câblage, raccordement, test — hors matériel', 'dès 80 €'],
                    ['Baie & réseau complet', 'Montage de baie, câblage, repérage, mise en service', 'sur devis'],
                ],
            ],
            [
                'id' => 'web',
                'tag' => 'Web & développement',
                'title' => 'Sites & applications',
                'rows' => [
                    ['Site vitrine', 'Quelques pages, responsive, référencement de base, formulaire de contact', 'dès 900 €'],
                    ['Site sur-mesure évolutif', 'Espace d\'administration, fonctionnalités spécifiques', 'dès 2 500 €'],
                    ['Application Android ou métier', 'Développement sur-mesure selon cahier des charges', 'sur devis'],
                    ['Modification ou maintenance', 'Uniquement si vous le souhaitez — aucun abonnement imposé', '50 € / h'],
                ],
            ],
            [
                'id' => 'ia',
                'tag' => 'Intelligence artificielle',
                'title' => 'Accompagnement IA',
                'rows' => [
                    ['Initiation à domicile', 'Prise en main de ChatGPT, Copilot, Mistral — bonnes pratiques', '50 € / h'],
                    ['Atelier en entreprise', 'Demi-journée pour votre équipe, adaptée à votre métier', 'dès 300 €'],
                    ['Assistant IA sur votre site', 'Chatbot qui répond à vos clients — coûts d\'usage à votre nom', 'dès 600 €'],
                    ['Automatisation d\'une tâche', 'Tri d\'e-mails, devis, extraction de documents…', 'dès 300 €'],
                    ['IA locale & confidentielle', 'Installation sur votre matériel — vos données restent chez vous', 'dès 350 €'],
                ],
            ],
        ];
    @endphp

    <section class="container section">
        <div class="section-header">
            <div class="eyebrow">Des prix annoncés avant de commencer</div>
            <h1>{{ app()->getLocale() === 'en' ? $page->title_en : $page->title_fr }}</h1>
            <p class="pricing-intro">
                Des tarifs simples, sans ligne cachée. Chaque projet fait l'objet d'un devis gratuit
                et détaillé, validé par vous avant toute intervention.
            </p>
        </div>

        <ul class="pricing-highlights">
            <li><b>Pas de TVA</b><span>Le prix affiché est le prix payé</span></li>
            <li><b>Devis gratuit</b><span>Sans engagement</span></li>
            <li><b>Déplacement offert</b><span>Jusqu'à 15 km autour de Condé-en-Normandie</span></li>
        </ul>

        @foreach ($groups as $group)
            <div class="pricing-group" id="{{ $group['id'] }}">
                <div class="pricing-group-head">
                    <span class="tag">{{ $group['tag'] }}</span>
                    <h2>{{ $group['title'] }}</h2>
                </div>

                <dl class="pricing-list">
                    @foreach ($group['rows'] as [$label, $detail, $price])
                        <div class="pricing-row">
                            <dt>
                                <b>{{ $label }}</b>
                                <span>{{ $detail }}</span>
                            </dt>
                            <dd>{{ $price }}</dd>
                        </div>
                    @endforeach
                </dl>
            </div>
        @endforeach

        <div class="pricing-notes">
            <p>Au-delà de 15 km : 0,50 € / km (aller-retour). La première heure est due, puis le temps est facturé par tranche de 30 minutes. Le matériel éventuel est facturé à part, au prix d'achat, après votre accord.</p>
            <p>Micro-entreprise — TVA non applicable, art. 293 B du CGI.</p>
        </div>
    </section>

    <section class="container">
        <div class="cta-final">
            <h2>Un besoin précis ?</h2>
            <p>Décrivez-le en quelques lignes : vous recevez un devis clair, gratuit et sans engagement.</p>
            <a href="{{ route('page.show', 'contact') }}" class="btn btn-primary">Demander un devis</a>
        </div>
    </section>

</x-layouts.public>
