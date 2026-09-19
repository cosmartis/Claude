# Cosmartis — Thème WordPress sur-mesure

Thème WordPress pour le site Cosmartis (automatisation commerciale,
marketing, administrative et opérationnelle pour indépendants et TPE/PME —
France, Belgique francophone, Suisse romande, Luxembourg).

Le cahier des charges complet et le suivi de collaboration avec la session
Claude Cowork vivent dans **`cosmartis-sync.md`** (Google Drive) — à lire
avant toute évolution de ce thème.

## Installation

1. Copier ce dossier dans `wp-content/themes/cosmartis`.
2. Activer le thème dans wp-admin.
3. Créer les pages suivantes avec **exactement ces slugs** pour que les
   gabarits s'appliquent automatiquement (hiérarchie de gabarits WordPress,
   fichiers `page-{slug}.php`) :
   - `services` → `page-services.php` (4 familles d'automatisation + tarifs)
   - `contact` → `page-contact.php` (questionnaire de qualification + widget Calendly inline)
   - `faq` → `page-faq.php`
   - `a-propos`, `mentions-legales`, `politique-de-confidentialite`, `cas-usage` → contenu libre, gabarit générique `page.php`
4. Définir la page d'accueil statique sur "Page d'accueil" dans
   Réglages > Lecture (utilise `front-page.php`).
5. Dans **Personnaliser > Cosmartis — Intégrations & offre** :
   - renseigner l'URL du webhook qui reçoit les soumissions du
     questionnaire de qualification (vide par défaut tant qu'aucun workflow
     n'est branché — voir blocages dans `cosmartis-sync.md`) ;
   - ajuster le texte du badge affiché sous le hero (jamais un prix isolé :
     les tarifs détaillés vivent dans la section « Tarifs »).
6. Ajouter les études de cas réelles au fur et à mesure dans
   **Études de cas** (menu wp-admin) ; tant qu'aucune n'est publiée, le site
   affiche 3 exemples génériques explicitement signalés comme illustratifs.

## Modifier le site depuis wp-admin (Gutenberg / Elementor)

Le contenu de l'accueil, de la page Services et de la page FAQ (ainsi que
l'introduction de la page Contact) est **modifiable directement depuis
l'éditeur WordPress**, sans toucher au code :

- Ouvrir la page concernée dans wp-admin et écrire du contenu dans
  l'éditeur (Gutenberg, ou Elementor une fois installé et activé sur cette
  page) : ce contenu **remplace entièrement** la maquette par défaut du
  thème dès qu'il n'est plus vide.
- Tant qu'une page reste vide dans l'éditeur, le thème continue d'afficher
  sa maquette par défaut (celle actuellement en ligne) — rien ne se
  casse tant que personne n'a commencé à éditer.
- Pour repartir d'une base cohérente avec la charte graphique plutôt que
  d'une page blanche, ouvrir l'inserteur de blocs et chercher la catégorie
  **« Cosmartis »** : des compositions prêtes à l'emploi y sont proposées
  (en-tête d'accueil, section tarifs, FAQ, études de cas, appel à l'action
  Calendly — voir `inc/block-patterns.php`).
- Le bouton d'appel à l'action Calendly (popup, jamais un simple lien) est
  disponible pour n'importe quel bloc **Bouton** natif : dans les réglages
  du bloc, choisir le style **« Popup Calendly »**. Le même mécanisme
  fonctionne avec un widget Bouton Elementor pointant vers un lien
  quelconque, à condition de lui appliquer la classe CSS
  `is-style-calendly-popup` (voir `assets/js/main.js`).
- Les tarifs, la FAQ, les études de cas et le CTA Calendly restent une
  **source unique** définie dans `template-parts/` : pour les insérer dans
  un contenu édité, utiliser les shortcodes `[cosmartis_tarifs]`,
  `[cosmartis_faq]`, `[cosmartis_etudes_de_cas]`, `[cosmartis_calendly]`
  (bloc « Shortcode » dans Gutenberg, widget « Shortcode » dans Elementor) —
  les compositions de la catégorie « Cosmartis » les utilisent déjà.
- La page **Contact** est la seule exception partielle : le questionnaire de
  qualification et l'intégration Calendly qui suivent restent **toujours
  actifs** quel que soit le contenu édité (c'est le canal principal de
  génération de leads du site) — seule l'introduction (titre + texte) en
  haut de page est remplacée par le contenu édité.

## Choix techniques

- **Performance** : CSS/JS minimal et propre au thème, Google Fonts (Inter)
  chargée en `display=swap`, scripts non critiques (Calendly) en footer,
  suppression des balises `wp_head` inutiles (emoji, oEmbed discovery,
  RSD/WLW) pour préserver les Core Web Vitals sur l'hébergement mutualisé.
  Le thème continue de fonctionner sans aucun plugin par défaut ; s'il est
  installé, un constructeur de page (Elementor) ou l'éditeur de blocs natif
  (Gutenberg) restent compatibles grâce au rendu `the_content()` déployé sur
  les pages listées ci-dessus (voir « Modifier le site depuis wp-admin »).
- **Sécurité / sauvegardes** : aucune donnée sensible stockée côté thème ;
  la config sécurité/sauvegardes automatisées dépend de l'hébergement
  choisi (voir `cosmartis-sync.md`).
- **Minimum de plugins par défaut** : le thème fonctionne sans aucune
  dépendance à un plugin (pas d'ACF — les champs des études de cas
  utilisent l'API native des meta boxes WordPress ; pas de plugin de
  formulaire — le questionnaire de qualification est du HTML/JS natif qui
  appelle une route REST du thème). Un constructeur de page reste une
  option, pas une obligation.
- **Aucun outil tiers nommé sur le site public** : les pages, textes et
  menus visibles par les visiteurs ne mentionnent jamais les noms des
  outils utilisés en coulisses (automatisation, CRM, emailing...) — seules
  les options de réglage réservées à l'administration (Personnaliser,
  commentaires de code) peuvent les nommer, pour rester utilisables par qui
  configure le site.
- **Génération de leads** : `POST /wp-json/cosmartis/v1/qualification`
  reçoit les réponses du questionnaire, calcule un score côté client
  (envoyé au serveur), puis relaie vers le webhook configuré. Si le webhook
  n'est pas configuré ou échoue, le prospect est conservé dans un post type
  privé (**Prospects (non relayés)**) et un e-mail de secours est envoyé à
  l'admin — aucune soumission n'est perdue.
- **Calendly** : un seul lien officiel,
  `https://calendly.com/cosmartisnewplan/30min`, centralisé dans la
  constante `COSMARTIS_CALENDLY_URL` (`functions.php`). Toujours affiché
  comme widget (popup dans le header/CTA, widget inline sur la page
  Contact/Réservation), jamais comme simple lien de sortie.
- **Tarifs** : grille à 5 niveaux (diagnostic gratuit, Première
  Automatisation, Système Complet, abonnement Suivi & Évolution,
  Sur-Mesure) centralisée dans `template-parts/pricing-grid.php` — montants,
  absence de mention HT/TTC et mention légale 293 B conformes aux décisions
  actées dans `cosmartis-sync.md`. Ne jamais afficher de prix fixe pour
  l'offre Sur-Mesure, ni de volume d'heures pour l'abonnement, ni le TJM
  interne (donnée à usage devis uniquement, jamais publique).
- **Études de cas** : custom post type `cosmartis_case_study` avec les
  champs Client / Problème / Solution / Résultat, et une case
  "cas générique / illustratif" qui déclenche l'avertissement visuel tant
  que ce ne sont pas de vrais clients.

## Arborescence

```
theme.json               Palette, typographie et styles pour Gutenberg
functions.php
style.css
header.php / footer.php
front-page.php          Accueil — the_content() si édité, sinon maquette par défaut
page.php                Gabarit générique (à propos, mentions légales, etc.)
page-services.php        /services/ — the_content() si édité, sinon 4 familles + tarifs
page-contact.php         /contact/ — questionnaire + Calendly inline (toujours actifs)
page-faq.php             /faq/ — the_content() si édité, sinon FAQ par défaut
index.php / single.php   Blog
archive-cosmartis_case_study.php
single-cosmartis_case_study.php
inc/
  setup.php              Theme support, menus, styles éditeur, nettoyage <head>
  enqueue.php            CSS/JS, Calendly, localisation JS
  case-studies-cpt.php   CPT études de cas + meta boxes natives
  n8n-integration.php    Route REST qualification → webhook configurable
  customizer.php         Réglages (URL webhook, texte du badge hero)
  shortcodes.php         [cosmartis_tarifs] [cosmartis_faq] [cosmartis_etudes_de_cas] [cosmartis_calendly]
  block-patterns.php     Compositions Gutenberg prêtes à insérer (catégorie "Cosmartis")
template-parts/
  calendly-cta.php        Bouton CTA Calendly réutilisable (popup)
  pricing-grid.php         Grille tarifaire (5 offres) — source unique des tarifs
  faq-list.php             Liste FAQ (schema.org FAQPage)
  case-studies-grid.php    Grille d'études de cas (+ fallback générique)
assets/
  css/editor-style.css     Aperçu Gutenberg aligné sur la charte graphique
  js/main.js               Menu mobile + init popup Calendly (coeur + boutons édités)
  js/qualification-form.js Questionnaire multi-étapes + scoring + REST + prefill Calendly
```
