# Cosmartis — Thème WordPress sur-mesure

Thème WordPress codé à la main (pas de page builder) pour le site Cosmartis
(automatisation commerciale, marketing, administrative et opérationnelle pour
indépendants et TPE/PME — France, Belgique francophone, Suisse romande,
Luxembourg).

Le cahier des charges complet et le suivi de collaboration avec la session
Claude Cowork vivent dans **`cosmartis-sync.md`** (Google Drive) — à lire
avant toute évolution de ce thème.

## Installation

1. Copier ce dossier dans `wp-content/themes/cosmartis`.
2. Activer le thème dans wp-admin.
3. Créer les pages suivantes avec **exactement ces slugs** pour que les
   gabarits s'appliquent automatiquement (hiérarchie de gabarits WordPress,
   fichiers `page-{slug}.php`) :
   - `services` → `page-services.php`
   - `contact` → `page-contact.php` (questionnaire de qualification + widget Calendly inline)
   - `faq` → `page-faq.php`
   - `a-propos`, `mentions-legales`, `politique-de-confidentialite`, `cas-usage` → contenu libre, gabarit générique `page.php`
4. Définir la page d'accueil statique sur "Page d'accueil" dans
   Réglages > Lecture (utilise `front-page.php`).
5. Dans **Personnaliser > Cosmartis — Intégrations & offre** :
   - renseigner l'URL du webhook n8n qui reçoit les soumissions du
     questionnaire de qualification (vide par défaut tant que le workflow
     n8n n'est pas fourni — voir blocages dans `cosmartis-sync.md`) ;
   - ajuster le prix d'entrée indicatif affiché dans le hero.
6. Ajouter les études de cas réelles au fur et à mesure dans
   **Études de cas** (menu wp-admin) ; tant qu'aucune n'est publiée, le site
   affiche 3 exemples génériques explicitement signalés comme illustratifs.

## Choix techniques

- **Performance** : pas de page builder, CSS/JS minimal et propre au thème,
  Google Fonts (Inter) chargée en `display=swap`, scripts non critiques
  (Calendly) en footer, suppression des balises `wp_head` inutiles
  (emoji, oEmbed discovery, RSD/WLW) pour préserver les Core Web Vitals.
- **Sécurité / sauvegardes** : aucune donnée sensible stockée côté thème ;
  la config sécurité/sauvegardes automatisées dépend de l'hébergement
  choisi (accès pas encore transmis — voir `cosmartis-sync.md`).
- **Minimum de plugins** : le thème n'a aucune dépendance à un plugin
  (pas d'ACF — les champs des études de cas utilisent l'API native des
  meta boxes WordPress ; pas de plugin de formulaire — le questionnaire de
  qualification est du HTML/JS natif qui appelle une route REST du thème).
- **Génération de leads** : `POST /wp-json/cosmartis/v1/qualification`
  reçoit les réponses du questionnaire, calcule un score côté client
  (envoyé au serveur), puis relaie vers le webhook n8n configuré. Si le
  webhook n'est pas configuré ou échoue, le prospect est conservé dans un
  post type privé (**Prospects (non relayés)**) et un e-mail de secours est
  envoyé à l'admin — aucune soumission n'est perdue.
- **Calendly** : un seul lien officiel,
  `https://calendly.com/cosmartisnewplan/30min`, centralisé dans la
  constante `COSMARTIS_CALENDLY_URL` (`functions.php`). Toujours affiché
  comme widget (popup dans le header/CTA, widget inline sur la page
  Contact/Réservation), jamais comme simple lien de sortie. Le webhook
  Calendly → n8n → Notion (création/mise à jour automatique de la fiche
  prospect + confirmation/rappel) se configure côté n8n, pas dans ce thème.
- **Études de cas** : custom post type `cosmartis_case_study` avec les
  champs Client / Problème / Solution / Résultat, et une case
  "cas générique / illustratif" qui déclenche l'avertissement visuel tant
  que ce ne sont pas de vrais clients.

## Arborescence

```
functions.php
style.css
header.php / footer.php
front-page.php          Accueil (page de conversion principale)
page.php                Gabarit générique (à propos, mentions légales, etc.)
page-services.php        /services/
page-contact.php         /contact/  (questionnaire + Calendly inline)
page-faq.php             /faq/
index.php / single.php   Blog
archive-cosmartis_case_study.php
single-cosmartis_case_study.php
inc/
  setup.php              Theme support, menus, nettoyage <head>
  enqueue.php            CSS/JS, Calendly, localisation JS
  case-studies-cpt.php   CPT études de cas + meta boxes natives
  n8n-integration.php    Route REST qualification → webhook n8n
  customizer.php         Réglages (URL webhook, prix indicatif)
template-parts/
  calendly-cta.php        Bouton CTA Calendly réutilisable (popup)
  faq-list.php             Liste FAQ (schema.org FAQPage)
  case-studies-grid.php    Grille d'études de cas (+ fallback générique)
assets/
  css/ (réservé, tout le CSS de base est dans style.css)
  js/main.js               Menu mobile + init popup Calendly
  js/qualification-form.js Questionnaire multi-étapes + scoring + REST + prefill Calendly
```
