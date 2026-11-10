# Atelier Normand du Web

Site vitrine de l'Atelier Normand du Web — technicien informatique de proximité et développeur web à Condé-en-Normandie (14110).

**Stack :** Laravel 11 · PHP 8.2+ · MySQL · Blade + SCSS · Vite · chatbot (FAQ + OpenAI)

**Fonctionnalités :** pages publiques (accueil, services, IA, contact, mentions légales), formulaire de contact avec envoi d'e-mail, chatbot, espace admin (pages, médias, réglages, utilisateurs), FR/EN, thème clair/sombre, sitemap.

---

## 1. Prérequis

| Outil | Version |
|---|---|
| PHP | 8.2 ou plus, avec les extensions `pdo_mysql`, `mbstring`, `openssl`, `fileinfo`, `curl`, `xml` |
| Composer | 2.x |
| Node.js / npm | 20+ (uniquement pour compiler les assets, en local) |
| MySQL / MariaDB | 8.0+ / 10.6+ |

---

## 2. Installation en local (WampServer)

```bash
git clone https://github.com/doko972/NewAtelierNormandDuWeb.git atelier-normand-web
cd atelier-normand-web

composer install
npm install

cp .env.example .env
php artisan key:generate
```

Créer une base MySQL (ex. `atelier_normand`) puis renseigner le `.env` (voir [§ 4](#4-variables-denvironnement)).

```bash
php artisan migrate --seed       # tables + admin + réglages + pages
php artisan storage:link         # rend les médias accessibles publiquement
npm run dev                      # assets en mode développement (rechargement auto)
php artisan serve                # http://127.0.0.1:8000
```

---

## 3. Déploiement en production (Hostinger)

### 3.1 Compiler les assets en local

Le dossier `public/build` n'est pas versionné et Node n'est généralement pas disponible sur un hébergement mutualisé : on compile donc **en local** avant chaque mise en ligne.

```bash
npm run build
```

### 3.2 Récupérer le code sur le serveur

Se connecter en SSH (identifiants dans hPanel → *Avancé* → *Accès SSH*) :

```bash
ssh -p 65002 utilisateur@ip-du-serveur
cd ~/domains/ateliernormandduweb.fr
git clone https://github.com/doko972/NewAtelierNormandDuWeb.git atelier-normand-web
```

Puis envoyer le dossier `public/build` compilé à l'étape 3.1 dans `atelier-normand-web/public/build` (via SFTP / gestionnaire de fichiers, ou `scp -P 65002 -r public/build utilisateur@ip:~/domains/ateliernormandduweb.fr/atelier-normand-web/public/`).

### 3.3 Faire pointer le domaine sur `public/`

Seul le dossier `public/` doit être exposé sur le web (jamais `.env`, `vendor/`, `storage/`…). On remplace `public_html` par un lien symbolique :

```bash
cd ~/domains/ateliernormandduweb.fr
mv public_html public_html_old
ln -s atelier-normand-web/public public_html
```

### 3.4 Installer et configurer

```bash
cd ~/domains/ateliernormandduweb.fr/atelier-normand-web

composer install --no-dev --optimize-autoloader

cp .env.example .env
nano .env                      # renseigner les valeurs de production (§ 4)
php artisan key:generate

php artisan migrate --force
php artisan db:seed --force    # PREMIÈRE installation uniquement (voir § 6)
php artisan storage:link

php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Permissions (si besoin) :

```bash
chmod -R 775 storage bootstrap/cache
```

### 3.5 Base de données

Dans hPanel → *Bases de données MySQL* : créer la base et l'utilisateur, puis reporter les identifiants dans `.env`. Sur Hostinger, `DB_HOST` vaut généralement `localhost`.

### 3.6 HTTPS

Activer le certificat SSL dans hPanel → *Sécurité* → *SSL*, puis forcer HTTPS. `APP_URL` doit commencer par `https://`.

### 3.7 Premier login admin

Se connecter sur `https://ateliernormandduweb.fr/login` avec :

- e-mail : `contact@ateliernormandduweb.fr`
- mot de passe : `changeme`

**Changer immédiatement le mot de passe** (menu Profil).

---

## 4. Variables d'environnement

Valeurs à adapter dans `.env` en production :

```dotenv
APP_NAME="Atelier Normand du Web"
APP_ENV=production
APP_DEBUG=false
APP_TIMEZONE=Europe/Paris
APP_URL=https://ateliernormandduweb.fr

APP_LOCALE=fr
APP_FALLBACK_LOCALE=fr
APP_FAKER_LOCALE=fr_FR

LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=uXXXXXX_atelier
DB_USERNAME=uXXXXXX_atelier
DB_PASSWORD=********

SESSION_DRIVER=database
SESSION_SECURE_COOKIE=true
CACHE_STORE=database
QUEUE_CONNECTION=sync

# E-mails (formulaire de contact) — boîte mail Hostinger
MAIL_MAILER=smtp
MAIL_HOST=smtp.hostinger.com
MAIL_PORT=465
MAIL_ENCRYPTION=ssl
MAIL_USERNAME=contact@ateliernormandduweb.fr
MAIL_PASSWORD=********
MAIL_FROM_ADDRESS="contact@ateliernormandduweb.fr"
MAIL_FROM_NAME="${APP_NAME}"

# Chatbot (réponses hors FAQ)
OPENAI_API_KEY=sk-...
OPENAI_MODEL=gpt-4o-mini
```

Notes :

- **`APP_DEBUG=false` obligatoire** en production (sinon les erreurs affichent des informations sensibles).
- Sans `OPENAI_API_KEY`, le chatbot répond toujours via la FAQ (`config/chatbot.php`) et propose le formulaire de contact pour le reste.
- Après toute modification du `.env` : `php artisan config:cache`.

---

## 5. Mettre à jour le site

En local :

```bash
npm run build
git add . && git commit -m "..." && git push
```

Envoyer ensuite le nouveau `public/build` sur le serveur (comme en 3.2), puis en SSH :

```bash
cd ~/domains/ateliernormandduweb.fr/atelier-normand-web
php artisan down
git pull
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan optimize:clear
php artisan config:cache && php artisan route:cache && php artisan view:cache
php artisan up
```

---

## 6. Seeders : attention

- `UserSeeder` : crée l'admin s'il n'existe pas (ne touche pas à un compte existant).
- `SettingSeeder` et `PageSeeder` : **écrasent** les réglages et textes de pages modifiés depuis l'admin. À lancer uniquement à la première installation, ou volontairement pour réinitialiser :

  ```bash
  php artisan db:seed --class=PageSeeder --force
  ```

Pour modifier un texte en production, passer de préférence par l'espace admin.

---

## 7. Après la mise en ligne

- [ ] Site accessible en `https://`, sans erreur
- [ ] Mot de passe admin changé
- [ ] Formulaire de contact testé (e-mail bien reçu)
- [ ] Chatbot testé
- [ ] Mentions légales et politique de confidentialité vérifiées
- [ ] `https://ateliernormandduweb.fr/sitemap.xml` soumis dans Google Search Console
- [ ] Fiche Google Business Profile créée/mise à jour (route de Vassy, 14110 Condé-en-Normandie)

---

## 8. Dépannage

| Problème | Solution |
|---|---|
| Erreur 500 | Lire `storage/logs/laravel.log` ; vérifier `.env` et les permissions de `storage/` et `bootstrap/cache/` |
| Page sans style | `public/build` absent ou pas à jour → relancer `npm run build` et le renvoyer |
| Images des médias introuvables | `php artisan storage:link` |
| Modification du `.env` ignorée | `php artisan config:clear` puis `php artisan config:cache` |
| E-mails non reçus | Vérifier les variables `MAIL_*` et le mot de passe de la boîte mail |
| Erreur 419 sur un formulaire | Session expirée ou `APP_URL` / HTTPS incohérents |
