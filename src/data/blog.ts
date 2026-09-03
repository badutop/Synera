import type { Locale } from "@/components/providers/LanguageProvider";

export interface BlogSection {
  heading?: string;
  paragraphs: string[];
}

export interface BlogPost {
  slug: string;
  title: string;
  excerpt: string;
  category: string;
  date: string;
  author: string;
  readingTime: string;
  coverImage: string;
  content: BlogSection[];
}

const categoriesFr = [
  "Marchés & Investissement",
  "Stratégie",
  "RH & Compétences",
  "Actualités Synera",
];

const categoriesEn = [
  "Markets & Investment",
  "Strategy",
  "HR & Skills",
  "Synera News",
];

export const categories: Record<Locale, string[]> = {
  fr: categoriesFr,
  en: categoriesEn,
};

const blogPostsFr: BlogPost[] = [
  {
    slug: "5-questions-avant-implantation-nouveau-marche",
    title: "5 questions à se poser avant de s'implanter sur un nouveau marché",
    excerpt:
      "S'implanter à l'international ne se résume pas à trouver un local et un partenaire. Voici les questions que nous posons systématiquement à nos clients avant toute décision.",
    category: "Stratégie",
    date: "2026-06-12",
    author: "Équipe SYNERA Group",
    readingTime: "6 min",
    coverImage:
      "https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1600&q=80",
    content: [
      {
        paragraphs: [
          "Chaque année, des entreprises ambitieuses engagent des ressources importantes pour s'implanter sur un nouveau marché — et une part significative d'entre elles doit revoir sa stratégie dans les 18 premiers mois. La cause est rarement un mauvais produit. C'est le plus souvent une question mal posée, ou pas posée du tout, en amont.",
        ],
      },
      {
        heading: "1. Le marché a-t-il vraiment besoin de ce que vous proposez ?",
        paragraphs: [
          "Un produit qui fonctionne chez vous ne trouve pas automatiquement son public ailleurs. Les habitudes d'achat, les cycles de décision et les alternatives locales changent la donne. Une étude de marché sérieuse commence toujours par vérifier l'hypothèse la plus simple : y a-t-il une demande réelle, et qui la sert déjà ?",
        ],
      },
      {
        heading: "2. Qui sont les décideurs, et comment les atteindre légitimement ?",
        paragraphs: [
          "Sur de nombreux marchés, la relation compte autant que l'offre. Savoir qui décide — dans le secteur public comme dans le privé — et comment engager la conversation avec crédibilité fait souvent la différence entre un projet qui avance et un projet qui stagne pendant des mois.",
        ],
      },
      {
        heading: "3. Quel cadre réglementaire s'applique réellement à votre activité ?",
        paragraphs: [
          "Les textes généraux ne suffisent pas : il faut comprendre comment la réglementation s'applique concrètement à votre secteur, et anticiper les délais administratifs réels plutôt que les délais théoriques.",
        ],
      },
      {
        heading: "4. Avez-vous le bon partenaire local, ou juste un contact ?",
        paragraphs: [
          "Un partenaire local aligné sur vos intérêts change la trajectoire d'un projet. Un simple contact, sans structuration claire de la relation, peut au contraire ralentir ou fragiliser votre implantation.",
        ],
      },
      {
        heading: "5. Comment mesurerez-vous que ça fonctionne ?",
        paragraphs: [
          "Trop de projets d'implantation démarrent sans indicateurs de succès clairs. Définir en amont ce qui constituera un signal positif — et à quelle échéance — permet d'ajuster la stratégie avant qu'il ne soit trop tard.",
          "C'est précisément le rôle de nos pôles Études & Conseil et Intermédiation d'Affaires : répondre à ces cinq questions avec des données vérifiées, avant que vous n'engagiez vos ressources.",
        ],
      },
    ],
  },
  {
    slug: "etude-de-faisabilite-change-trajectoire-projet",
    title: "Pourquoi une étude de faisabilité change la trajectoire d'un projet",
    excerpt:
      "Une étude de faisabilité coûte du temps et un budget. Elle en fait souvent gagner beaucoup plus. Explications à partir de situations que nous rencontrons régulièrement.",
    category: "Marchés & Investissement",
    date: "2026-05-20",
    author: "Équipe SYNERA Group",
    readingTime: "5 min",
    coverImage:
      "https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1600&q=80",
    content: [
      {
        paragraphs: [
          "« On sait déjà que ça va marcher, on n'a pas besoin d'étude. » C'est l'une des phrases que nous entendons le plus souvent — et l'une des plus coûteuses lorsqu'elle s'avère fausse.",
        ],
      },
      {
        heading: "Ce qu'une étude de faisabilité vérifie réellement",
        paragraphs: [
          "Une étude de faisabilité ne se contente pas de confirmer une intuition. Elle teste méthodiquement les hypothèses économiques, opérationnelles, réglementaires et humaines d'un projet, et identifie les points de blocage avant qu'ils ne deviennent des crises.",
          "Concrètement, cela signifie vérifier la viabilité financière du modèle envisagé, la disponibilité des ressources nécessaires (humaines, techniques, logistiques), la compatibilité réglementaire, et la réalité du calendrier proposé.",
        ],
      },
      {
        heading: "Le vrai coût d'une hypothèse non vérifiée",
        paragraphs: [
          "Le coût d'une étude de faisabilité est visible et immédiat. Le coût d'une hypothèse fausse, lui, apparaît plus tard — sous forme de délais dépassés, de budgets révisés à la hausse, ou de partenariats mal calibrés qu'il faut renégocier en position de faiblesse.",
          "Dans notre expérience, les projets qui passent par une phase de cadrage rigoureuse ajustent leur trajectoire tôt, quand les corrections sont encore peu coûteuses. Ceux qui s'en passent découvrent souvent les mêmes problèmes, mais six à douze mois plus tard, une fois les ressources déjà engagées.",
        ],
      },
      {
        heading: "Une étude n'est pas un frein, c'est un accélérateur",
        paragraphs: [
          "Bien menée, une étude de faisabilité ne ralentit pas un projet : elle le rend plus rapide à exécuter, parce que les décisions ne sont plus prises dans l'incertitude. Les équipes savent où elles vont, les partenaires savent ce qu'on attend d'eux, et les investisseurs disposent d'un dossier solide.",
          "C'est cette logique qui structure notre pôle Études & Conseil : donner à nos clients les moyens de décider vite, mais sur des bases fiables.",
        ],
      },
    ],
  },
  {
    slug: "mobilite-internationale-securiser-transition-talents",
    title: "Mobilité internationale : sécuriser la transition de vos talents",
    excerpt:
      "Envoyer un collaborateur à l'étranger ne s'improvise pas. Entre enjeux administratifs, humains et opérationnels, voici ce qui distingue une mobilité réussie d'une mobilité subie.",
    category: "RH & Compétences",
    date: "2026-04-08",
    author: "Équipe SYNERA Group",
    readingTime: "5 min",
    coverImage:
      "https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1600&q=80",
    content: [
      {
        paragraphs: [
          "La réussite d'un projet international ne dépend pas seulement de la stratégie ou du financement : elle dépend des personnes qui l'exécutent sur le terrain. Or la mobilité internationale reste l'un des angles morts les plus fréquents dans la planification des projets.",
        ],
      },
      {
        heading: "Trois dimensions à traiter en parallèle",
        paragraphs: [
          "Une mobilité réussie repose sur trois piliers traités simultanément : la dimension administrative (visas, permis de travail, fiscalité), la dimension logistique (logement, scolarité, couverture santé), et la dimension humaine (accompagnement du collaborateur et, souvent, de sa famille).",
          "Négliger l'un de ces trois piliers fragilise les deux autres. Un collaborateur techniquement compétent mais mal accompagné sur le plan humain met en moyenne plus de temps à être pleinement opérationnel — et le risque de retour anticipé augmente sensiblement.",
        ],
      },
      {
        heading: "Anticiper plutôt que réagir",
        paragraphs: [
          "Les mobilités qui se passent mal partagent souvent un point commun : elles ont été traitées comme une formalité administrative de dernière minute plutôt que comme un projet à part entière, avec ses propres jalons et son propre suivi.",
          "Notre pôle Développement des Compétences & RH accompagne cette transition de bout en bout — du diagnostic des besoins jusqu'au suivi post-installation — pour que vos talents soient opérationnels rapidement, et sereins durablement.",
        ],
      },
    ],
  },
  {
    slug: "diversite-marches-co-prosperite",
    title: "Ce que la diversité des marchés nous enseigne sur la co-prospérité",
    excerpt:
      "Chez SYNERA Group, nous considérons la diversité des marchés et des expertises comme un levier, pas une complexité à gérer. Voici pourquoi cette conviction structure notre manière de travailler.",
    category: "Actualités Synera",
    date: "2026-03-02",
    author: "Équipe SYNERA Group",
    readingTime: "4 min",
    coverImage:
      "https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=1600&q=80",
    content: [
      {
        paragraphs: [
          "Intermédier entre des marchés différents, c'est composer en permanence avec des cadres réglementaires, des cultures d'affaires et des rythmes de décision qui ne se ressemblent pas. Cette diversité peut être vécue comme un obstacle. Chez SYNERA Group, nous la considérons comme notre matière première.",
        ],
      },
      {
        heading: "La co-prospérité comme boussole",
        paragraphs: [
          "Notre conviction est simple : une mise en relation ne tient dans la durée que si elle profite réellement à toutes les parties. Nous ne cherchons pas à maximiser une transaction ponctuelle, mais à construire des partenariats où chaque acteur trouve un intérêt durable à poursuivre la relation.",
          "Cette approche demande plus de rigueur en amont — mieux comprendre les intérêts de chaque partie, parfois tempérer des attentes irréalistes — mais elle produit des collaborations qui durent, plutôt que des accords qui s'effritent au premier désaccord.",
        ],
      },
      {
        heading: "Des expertises qui se complètent plutôt qu'elles ne se concurrencent",
        paragraphs: [
          "Nos équipes réunissent des profils aux parcours volontairement variés — finance, études sectorielles, ressources humaines, gestion de projet. Cette diversité interne reflète celle de nos clients et de nos marchés, et nous permet d'aborder chaque projet sous plusieurs angles avant de formuler une recommandation.",
          "C'est cette conviction — que la différence est un levier de richesse plutôt qu'une complexité à réduire — qui structure notre manière de travailler, projet après projet.",
        ],
      },
    ],
  },
];

const blogPostsEn: BlogPost[] = [
  {
    slug: "5-questions-avant-implantation-nouveau-marche",
    title: "5 questions to ask before entering a new market",
    excerpt:
      "Entering a new market isn't just about finding an office and a partner. Here are the questions we systematically ask our clients before any decision.",
    category: "Strategy",
    date: "2026-06-12",
    author: "SYNERA Group Team",
    readingTime: "6 min",
    coverImage:
      "https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1600&q=80",
    content: [
      {
        paragraphs: [
          "Every year, ambitious companies commit significant resources to enter a new market — and a meaningful share of them have to revisit their strategy within the first 18 months. The cause is rarely a bad product. More often, it's a question that was poorly framed, or never asked at all, upfront.",
        ],
      },
      {
        heading: "1. Does the market actually need what you're offering?",
        paragraphs: [
          "A product that works at home doesn't automatically find its audience elsewhere. Buying habits, decision cycles and local alternatives change the equation. A serious market study always starts by testing the simplest hypothesis: is there real demand, and who's already serving it?",
        ],
      },
      {
        heading: "2. Who are the decision-makers, and how do you reach them legitimately?",
        paragraphs: [
          "In many markets, the relationship matters as much as the offering. Knowing who decides — in both the public and private sectors — and how to credibly start the conversation often makes the difference between a project that moves forward and one that stalls for months.",
        ],
      },
      {
        heading: "3. What regulatory framework actually applies to your business?",
        paragraphs: [
          "General texts aren't enough: you need to understand how regulation concretely applies to your sector, and anticipate real administrative timelines rather than theoretical ones.",
        ],
      },
      {
        heading: "4. Do you have the right local partner, or just a contact?",
        paragraphs: [
          "A local partner aligned with your interests changes a project's trajectory. A simple contact, without a clearly structured relationship, can instead slow down or weaken your market entry.",
        ],
      },
      {
        heading: "5. How will you measure that it's working?",
        paragraphs: [
          "Too many market-entry projects start without clear success indicators. Defining upfront what will count as a positive signal — and by when — lets you adjust strategy before it's too late.",
          "That's precisely the role of our Studies & Advisory and Business Intermediation practices: answering these five questions with verified data, before you commit your resources.",
        ],
      },
    ],
  },
  {
    slug: "etude-de-faisabilite-change-trajectoire-projet",
    title: "Why a feasibility study changes a project's trajectory",
    excerpt:
      "A feasibility study costs time and budget. It often saves far more of both. Here's why, based on situations we encounter regularly.",
    category: "Markets & Investment",
    date: "2026-05-20",
    author: "SYNERA Group Team",
    readingTime: "5 min",
    coverImage:
      "https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1600&q=80",
    content: [
      {
        paragraphs: [
          "\"We already know it'll work, we don't need a study.\" It's one of the phrases we hear most often — and one of the costliest when it turns out to be wrong.",
        ],
      },
      {
        heading: "What a feasibility study actually verifies",
        paragraphs: [
          "A feasibility study doesn't just confirm a hunch. It methodically tests a project's economic, operational, regulatory and human assumptions, and identifies blocking points before they become crises.",
          "Concretely, that means verifying the financial viability of the planned model, the availability of the necessary resources (human, technical, logistical), regulatory compatibility, and the realism of the proposed timeline.",
        ],
      },
      {
        heading: "The real cost of an unverified assumption",
        paragraphs: [
          "The cost of a feasibility study is visible and immediate. The cost of a wrong assumption shows up later — as blown deadlines, budgets revised upward, or poorly calibrated partnerships that must be renegotiated from a position of weakness.",
          "In our experience, projects that go through a rigorous scoping phase adjust their trajectory early, when corrections are still inexpensive. Those that skip it often discover the same problems, but six to twelve months later, once resources are already committed.",
        ],
      },
      {
        heading: "A study isn't a brake, it's an accelerator",
        paragraphs: [
          "Done well, a feasibility study doesn't slow a project down: it makes execution faster, because decisions are no longer made under uncertainty. Teams know where they're going, partners know what's expected of them, and investors have a solid case to review.",
          "That logic shapes our Studies & Advisory practice: giving our clients the means to decide fast, but on reliable ground.",
        ],
      },
    ],
  },
  {
    slug: "mobilite-internationale-securiser-transition-talents",
    title: "International mobility: securing your talent's transition",
    excerpt:
      "Sending an employee abroad isn't something to improvise. Between administrative, human and operational stakes, here's what separates a successful mobility from a painful one.",
    category: "HR & Skills",
    date: "2026-04-08",
    author: "SYNERA Group Team",
    readingTime: "5 min",
    coverImage:
      "https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1600&q=80",
    content: [
      {
        paragraphs: [
          "The success of an international project doesn't just depend on strategy or funding: it depends on the people executing it on the ground. Yet international mobility remains one of the most frequent blind spots in project planning.",
        ],
      },
      {
        heading: "Three dimensions to handle in parallel",
        paragraphs: [
          "A successful mobility rests on three pillars handled simultaneously: the administrative dimension (visas, work permits, taxation), the logistical dimension (housing, schooling, health coverage), and the human dimension (supporting the employee and, often, their family).",
          "Neglecting any one of these three pillars weakens the other two. An employee who is technically skilled but poorly supported on the human side typically takes longer to become fully operational — and the risk of an early return rises noticeably.",
        ],
      },
      {
        heading: "Plan ahead rather than react",
        paragraphs: [
          "Mobilities that go poorly often share one thing in common: they were treated as a last-minute administrative formality rather than as a project in its own right, with its own milestones and its own follow-up.",
          "Our Skills Development & HR practice supports this transition end to end — from needs diagnosis to post-relocation follow-up — so your talent becomes operational quickly, and stays settled for the long run.",
        ],
      },
    ],
  },
  {
    slug: "diversite-marches-co-prosperite",
    title: "What the diversity of markets teaches us about co-prosperity",
    excerpt:
      "At SYNERA Group, we see the diversity of markets and expertise as a lever, not a complexity to manage. Here's why that conviction shapes how we work.",
    category: "Synera News",
    date: "2026-03-02",
    author: "SYNERA Group Team",
    readingTime: "4 min",
    coverImage:
      "https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=1600&q=80",
    content: [
      {
        paragraphs: [
          "Acting as an intermediary between different markets means constantly navigating regulatory frameworks, business cultures and decision rhythms that don't resemble one another. That diversity can be experienced as an obstacle. At SYNERA Group, we treat it as our raw material.",
        ],
      },
      {
        heading: "Co-prosperity as our compass",
        paragraphs: [
          "Our conviction is simple: a business introduction only holds up over time if it genuinely benefits every party involved. We don't aim to maximize a one-off transaction, but to build partnerships where every player finds a lasting reason to keep the relationship going.",
          "That approach demands more rigor upfront — better understanding each party's interests, sometimes tempering unrealistic expectations — but it produces collaborations that last, rather than agreements that crumble at the first disagreement.",
        ],
      },
      {
        heading: "Expertise that complements rather than competes",
        paragraphs: [
          "Our teams bring together deliberately varied backgrounds — finance, sector studies, human resources, project management. This internal diversity mirrors that of our clients and our markets, and lets us approach every project from multiple angles before formulating a recommendation.",
          "It's this conviction — that difference is a source of richness rather than a complexity to reduce — that shapes how we work, project after project.",
        ],
      },
    ],
  },
];

export const blogPosts: Record<Locale, BlogPost[]> = {
  fr: blogPostsFr,
  en: blogPostsEn,
};

export function getPostBySlug(locale: Locale, slug: string) {
  return blogPosts[locale].find((post) => post.slug === slug);
}
