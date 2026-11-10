<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            ['slug' => 'accueil', 'title_fr' => 'Accueil', 'title_en' => 'Home', 'order' => 0],
            ['slug' => 'entreprise/qui-sommes-nous', 'title_fr' => 'Qui sommes-nous', 'title_en' => 'About us', 'order' => 1],
            [
                'slug' => 'entreprise/methode',
                'title_fr' => 'Notre méthode',
                'title_en' => 'Our method',
                'order' => 2,
                'body_fr' => "
<h2>Un déroulé simple, sans jargon</h2>
<p>01. Échange &amp; besoins — on clarifie ce dont vous avez vraiment besoin, sans détour technique.</p>
<p>02. Proposition claire — un devis détaillé, sans ligne cachée, avant tout engagement.</p>
<p>03. Développement — points d'étape réguliers, vous voyez le site avancer concrètement.</p>
<p>04. Livraison &amp; autonomie — le site est à vous, avec les explications pour le faire vivre.</p>
"
            ],
            ['slug' => 'services', 'title_fr' => 'Services', 'title_en' => 'Services', 'order' => 3],
            ['slug' => 'services/informatique', 'title_fr' => 'Informatique', 'title_en' => 'IT services', 'order' => 5],
            [
                'slug' => 'tarifs',
                'title_fr' => 'Tarifs',
                'title_en' => 'Pricing',
                'order' => 4,
                'meta_title_fr' => 'Tarifs — Atelier Normand du Web, Condé-en-Normandie',
                'meta_description_fr' => 'Tarifs clairs pour le dépannage informatique, la création de sites web et l\'accompagnement IA à Condé-en-Normandie. Devis gratuit, TVA non applicable.',
            ],
            ['slug' => 'contact', 'title_fr' => 'Contact', 'title_en' => 'Contact', 'order' => 7],
            [
                'slug' => 'mentions-legales',
                'title_fr' => 'Mentions légales',
                'title_en' => 'Legal notice',
                'order' => 8,
                'body_fr' => "
<h2>Éditeur du site</h2>
<p>Le site Atelier Normand du Web est édité par :<br>
David GROUGI, micro-entrepreneur<br>
SIRET : 939 474 755 00013<br>
Adresse : route de Vassy, 14110 Condé-en-Normandie, France<br>
Email : contact@ateliernormandduweb.fr<br>
Directeur de la publication : David GROUGI</p>

<h2>Hébergement</h2>
<p>Le site est hébergé par :<br>
HOSTINGER INTERNATIONAL LTD<br>
61 Lordou Vironos Street, 6023 Larnaca, Chypre<br>
Site web : www.hostinger.fr</p>

<h2>Le Prestataire</h2>
<p>David GROUGI, micro-entrepreneur<br>
SIRET : 939 474 755 00013<br>
route de Vassy, 14110 Condé-en-Normandie, France<br>
Email : contact@ateliernormandduweb.fr<br>
Ci-après dénommé \"l'Atelier Normand du Web\" ou \"le Prestataire\".</p>
"
            ],
            ['slug' => 'politique-de-confidentialite', 'title_fr' => 'Politique de confidentialité', 'title_en' => 'Privacy policy', 'order' => 9],
        ];

        foreach ($pages as $page) {
            Page::updateOrCreate(['slug' => $page['slug']], $page + ['is_published' => true]);
        }

        // Page portfolio retirée du site
        Page::where('slug', 'realisations')->delete();
    }
}
