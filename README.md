# SYNERA Group — Site web

Site vitrine de SYNERA Group, réalisé avec **Next.js 15 (App Router) + TypeScript + Tailwind CSS**.

## Lancer le projet en local

```bash
npm install
npm run dev
```

Le site est disponible sur [http://localhost:3000](http://localhost:3000).

```bash
npm run build   # build de production
npm run start   # sert le build de production
npm run lint    # vérification ESLint
```

## Structure du projet

```
content/                 Contenu i18n (chrome UI : nav, footer, libellés communs)
  fr.json                 Français (par défaut)
  en.json                 Anglais (structure prête, voir "i18n" ci-dessous)
src/
  app/                    Pages (App Router) : une route par dossier
  components/
    layout/               Header, Footer, menu mobile, bascules thème/langue
    ui/                   Primitives réutilisables (Button, Card, Section, Stepper…)
    sections/             Blocs de page composés (Hero, PolesOverview, CtaBand…)
    forms/                ContactForm (react-hook-form + zod)
    providers/            ThemeProvider (next-themes), LanguageProvider
  data/                   Contenu long-format des pages (FR), typé TypeScript
    solutions.ts           Les 4 pôles (description, méthodologie, bénéfices)
    values.ts, team.ts, sectors.ts, approach.ts, stats.ts, blog.ts
  lib/                    Fonctions utilitaires (cn, formatDate)
public/
  logo/                   Fichiers logo sources fournis (JPEG) + favicon généré
```

## Où modifier les couleurs

Toute la palette est centralisée dans **`tailwind.config.ts`**, sous `theme.extend.colors` :

- `primary` — violet de marque (`#7030A0`, extrait du logo), avec ses nuances 50 → 900
- `accent` — or mat (`#C9A227`), pour les touches premium ponctuelles
- `ink` — anthracite violacé, utilisé pour les textes et le mode sombre

Modifie les valeurs hexadécimales dans ce fichier : elles se propagent automatiquement à tout le site (classes `bg-primary`, `text-ink-400`, etc.).

## Où remplacer le logo et les images

- **Logo** : le site n'affiche pas les fichiers JPEG fournis directement (ils ont un fond blanc plein, ce qui pose problème en mode sombre). Le header/footer utilisent un composant `src/components/ui/Logo.tsx` qui recrée le wordmark "SYNERA | Group" en texte/SVG stylé, basé sur la disposition horizontale du logo. **Dès que tu as un fichier vectoriel (SVG) ou PNG transparent officiel**, remplace le contenu de ce composant par un `<Image src="/logo/synera.svg" ... />` — les fichiers sources sont conservés dans `public/logo/` pour référence.
- **Favicon** : généré dynamiquement dans `src/app/icon.tsx` (un "S" violet sur fond plein). Remplace ce fichier par une icône statique (`public/favicon.ico`) si tu préfères utiliser le vrai logo une fois vectorisé.
- **Photos** : toutes les images utilisent des placeholders Unsplash réalistes via `next/image` (domaine autorisé dans `next.config.mjs`). Remplace les URLs `https://images.unsplash.com/...` par tes propres visuels (idéalement dans `public/images/` puis import local) au fur et à mesure que tu les obtiens.
- **Logos partenaires** : la section "Ils nous font confiance" sur la page d'accueil (`src/components/sections/PartnersMarquee.tsx`) affiche des cases vides numérotées en attendant de vrais logos clients.

## Brancher le formulaire de contact à un vrai service d'envoi

Le formulaire (`src/components/forms/ContactForm.tsx`) est pleinement fonctionnel côté validation (react-hook-form + zod) et poste vers la route API `src/app/api/contact/route.ts`.

Par défaut (sans configuration), cette route **valide et journalise** la soumission en développement, puis répond succès — rien n'est envoyé par email.

Pour activer l'envoi réel via **Resend** (recommandé, pas de dépendance supplémentaire nécessaire — la route utilise l'API REST directement) :

1. Crée un compte sur [resend.com](https://resend.com) et récupère une clé API.
2. Ajoute dans `.env.local` :
   ```
   RESEND_API_KEY=re_xxxxxxxx
   CONTACT_RECIPIENT_EMAIL=contact@synera-group.com
   ```
3. Vérifie ton domaine d'envoi dans Resend (nécessaire pour utiliser une adresse `@synera-group.com` comme expéditeur).

**Alternatives** :
- **Formspree** : remplace l'appel `fetch("/api/contact")` dans `ContactForm.tsx` par un `fetch` direct vers ton endpoint Formspree — plus simple, pas de route API nécessaire.
- **SMTP (Nodemailer)** : installe `nodemailer` et remplace le bloc `RESEND_API_KEY` de `route.ts` par un `transporter.sendMail(...)`.

## i18n (FR / EN)

Le sélecteur de langue (header + menu mobile) traduit **l'intégralité du site** : navigation, footer, formulaire, et tout le contenu long des pages (pôles, articles de blog, équipe, secteurs, etc.). Le choix de langue est mémorisé (`localStorage`) et réappliqué à chaque visite.

Architecture du contenu bilingue :
- `content/fr.json` / `content/en.json` — textes d'interface communs à toutes les pages (nav, footer, libellés de formulaire, en-têtes de section).
- `src/data/*.ts` — contenu long propre à chaque page (pôles, valeurs, équipe, secteurs, étapes de méthodologie, articles de blog), structuré en `Record<"fr" | "en", T[]>`. Pour modifier un texte, édite le tableau `xxxFr` ou `xxxEn` correspondant dans le fichier concerné.

**Limitation connue** : le switch est purement côté client (pas de routes `/en/...` dédiées). Cela veut dire que les balises SEO (`<title>`, meta description, Open Graph) restent toujours en français, même quand un visiteur choisit l'anglais — seul le contenu visible à l'écran change. Pour un référencement international optimal, il faudrait migrer vers des routes localisées (`/en/solutions`, etc.), ce qui n'a pas été retenu pour cette version afin de garder le site simple à maintenir.

## Déploiement

Le projet est prêt pour un déploiement **Vercel** (zéro configuration) ou un **export statique** (`output: "export"` dans `next.config.mjs` — attention, la route API `/api/contact` ne fonctionnera alors plus et devra être remplacée par un service tiers comme Formspree).

---

## Points restants à finaliser ensemble

Avant mise en ligne, voici ce qu'il reste à me fournir ou confirmer :

1. **Logo vectoriel** (SVG de préférence, sinon PNG haute résolution avec fond transparent) — pour remplacer le wordmark recréé en CSS/SVG.
2. **Adresses exactes** des implantations (actuellement "Paris, France" et "Abidjan, Côte d'Ivoire" en placeholders — à confirmer ou remplacer).
3. **Coordonnées réelles** : téléphone, email définitif si différent de `contact@synera-group.com`.
4. **Chiffres clés réels** (années d'expérience, nombre de projets accompagnés, secteurs, marchés) — actuellement des valeurs illustratives dans `src/data/stats.ts`.
5. **Équipe dirigeante** : noms, postes définitifs et photos (actuellement des placeholders "Prénom Nom" avec initiales).
6. **Logos partenaires/clients** pour la section "Ils nous font confiance".
7. **Témoignages clients** pour la page Secteurs & Références.
8. **Comptes réseaux sociaux** à lier (LinkedIn actuellement en lien `#`).
9. **Photos professionnelles réelles** pour remplacer les visuels Unsplash.
10. **Relecture de la traduction anglaise** par un locuteur natif si le site doit servir un public anglophone officiellement (traduction complète livrée, mais non relue par un professionnel).
