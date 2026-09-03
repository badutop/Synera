import type { LucideIcon } from "lucide-react";
import { Handshake, LineChart, Workflow, GraduationCap } from "lucide-react";
import type { Locale } from "@/components/providers/LanguageProvider";

export interface Pole {
  slug: string;
  icon: LucideIcon;
  shortTitle: string;
  title: string;
  summary: string;
  description: string;
  steps: { title: string; description: string }[];
  benefits: string[];
  ctaSubject: string;
}

const polesFr: Pole[] = [
  {
    slug: "intermediation",
    icon: Handshake,
    shortTitle: "Intermédiation d'Affaires",
    title: "Intermédiation d'Affaires",
    summary:
      "Nous connectons investisseurs, entreprises et acteurs locaux pour accélérer votre implantation et votre développement commercial.",
    description:
      "SYNERA Group met à votre service un réseau de contacts qualifiés — autorités publiques, dirigeants du secteur privé, partenaires locaux — pour transformer une intention d'expansion en relations d'affaires concrètes. Nous facilitons l'implantation, structurons les premiers échanges et représentons vos intérêts avec la crédibilité d'un acteur ancré localement.",
    steps: [
      {
        title: "Cartographie des acteurs",
        description:
          "Identification des interlocuteurs clés — publics et privés — pertinents pour votre projet et votre secteur.",
      },
      {
        title: "Prise de contact qualifiée",
        description:
          "Mise en relation directe avec les bons décideurs, dans le respect des usages et des sensibilités locales.",
      },
      {
        title: "Structuration de la relation",
        description:
          "Cadrage des échanges, préparation des rencontres et sécurisation des premiers engagements.",
      },
      {
        title: "Suivi de la relation d'affaires",
        description:
          "Accompagnement dans la durée pour consolider le partenariat et anticiper les points de friction.",
      },
    ],
    benefits: [
      "Accès direct aux bons interlocuteurs, sans intermédiaires superflus",
      "Gain de temps significatif sur les phases de prospection",
      "Réduction du risque relationnel et culturel",
      "Ancrage local crédible dès les premiers échanges",
    ],
    ctaSubject: "Intermédiation d'Affaires",
  },
  {
    slug: "etudes-conseil",
    icon: LineChart,
    shortTitle: "Études & Conseil",
    title: "Études & Conseil",
    summary:
      "Des études rigoureuses pour sécuriser vos décisions d'investissement et de développement avant d'engager vos ressources.",
    description:
      "Avant d'investir un marché, il faut le comprendre. Nos équipes conduisent des études de marché, des études de faisabilité et des diagnostics stratégiques ou sectoriels qui transforment l'incertitude en décisions argumentées. Chaque recommandation s'appuie sur des données vérifiées et une lecture fine du contexte local.",
    steps: [
      {
        title: "Cadrage des objectifs",
        description:
          "Clarification des questions à trancher et des critères de décision avec votre équipe.",
      },
      {
        title: "Collecte & analyse des données",
        description:
          "Recherche terrain, entretiens d'experts, données sectorielles et réglementaires.",
      },
      {
        title: "Recommandations stratégiques",
        description:
          "Synthèse des options possibles, avec risques, opportunités et scénarios chiffrés.",
      },
      {
        title: "Restitution & aide à la décision",
        description:
          "Présentation claire des résultats, disponible pour challenger et affiner avec vos équipes dirigeantes.",
      },
    ],
    benefits: [
      "Décisions fondées sur des données fiables, pas sur des suppositions",
      "Réduction mesurable du risque d'investissement",
      "Vision claire des opportunités et contraintes du marché cible",
      "Un livrable actionnable, pas un rapport qui prend la poussière",
    ],
    ctaSubject: "Études & Conseil",
  },
  {
    slug: "accompagnement-projets",
    icon: Workflow,
    shortTitle: "Accompagnement de Projets",
    title: "Accompagnement de Projets",
    summary:
      "Un pilotage de bout en bout — du cadrage à l'évaluation — pour transformer une stratégie en résultats concrets.",
    description:
      "Une bonne étude ne suffit pas si l'exécution échoue. SYNERA Group pilote vos projets sur toute leur durée : cadrage initial, structuration des partenariats, mise en œuvre opérationnelle et évaluation des résultats. Vous gardez un interlocuteur unique, responsable de la cohérence d'ensemble.",
    steps: [
      {
        title: "Cadrage du projet",
        description:
          "Définition des objectifs, du périmètre, des jalons et des indicateurs de succès.",
      },
      {
        title: "Structuration & partenariats",
        description:
          "Mise en place des accords, répartition des rôles et sécurisation juridique et financière des opérations.",
      },
      {
        title: "Mise en œuvre & pilotage",
        description:
          "Coordination des parties prenantes, suivi d'avancement et arbitrages en temps réel.",
      },
      {
        title: "Évaluation & capitalisation",
        description:
          "Bilan des résultats, enseignements tirés et recommandations pour les prochaines phases.",
      },
    ],
    benefits: [
      "Un interlocuteur unique responsable de bout en bout",
      "Exécution maîtrisée, avec des jalons et un reporting clairs",
      "Partenariats structurés et sécurisés dès le départ",
      "Résultats mesurés, pas seulement livrés",
    ],
    ctaSubject: "Accompagnement de Projets",
  },
  {
    slug: "competences-rh",
    icon: GraduationCap,
    shortTitle: "Développement des Compétences & RH",
    title: "Développement des Compétences & RH",
    summary:
      "Formations, mobilité internationale et accès à des experts sectoriels pour donner à vos équipes les moyens de réussir.",
    description:
      "Un projet international réussit grâce aux compétences des personnes qui le portent. Nous concevons des formations professionnelles et techniques sur mesure, accompagnons vos talents dans leur mobilité ou expatriation, et vous mettons en relation avec des experts sectoriels pointus quand une compétence spécifique vous manque.",
    steps: [
      {
        title: "Diagnostic des besoins",
        description:
          "Identification des compétences à renforcer et des profils concernés par la mobilité.",
      },
      {
        title: "Programme sur mesure",
        description:
          "Conception d'un parcours de formation ou d'un plan de mobilité adapté à vos contraintes.",
      },
      {
        title: "Déploiement",
        description:
          "Mise en œuvre des formations et accompagnement logistique et administratif de la mobilité.",
      },
      {
        title: "Suivi & montée en compétences",
        description:
          "Évaluation des acquis et ajustement du programme dans la durée.",
      },
    ],
    benefits: [
      "Des équipes opérationnelles plus rapidement sur le terrain",
      "Transitions internationales sécurisées, sur le plan humain et administratif",
      "Accès à une expertise sectorielle pointue en cas de besoin ponctuel",
      "Programmes construits sur-mesure, jamais sur étagère",
    ],
    ctaSubject: "Développement des Compétences & RH",
  },
];

const polesEn: Pole[] = [
  {
    slug: "intermediation",
    icon: Handshake,
    shortTitle: "Business Intermediation",
    title: "Business Intermediation",
    summary:
      "We connect investors, companies and local players to accelerate your market entry and commercial growth.",
    description:
      "SYNERA Group puts a network of qualified contacts at your service — public authorities, private-sector leaders, local partners — to turn an expansion intent into concrete business relationships. We facilitate market entry, structure the first exchanges, and represent your interests with the credibility of a locally rooted player.",
    steps: [
      {
        title: "Mapping the players",
        description:
          "Identifying the key public and private contacts relevant to your project and sector.",
      },
      {
        title: "Qualified outreach",
        description:
          "Direct introductions to the right decision-makers, respecting local practices and sensitivities.",
      },
      {
        title: "Structuring the relationship",
        description:
          "Framing the discussions, preparing meetings and securing the first commitments.",
      },
      {
        title: "Following up the relationship",
        description:
          "Ongoing support to consolidate the partnership and anticipate friction points.",
      },
    ],
    benefits: [
      "Direct access to the right contacts, without unnecessary go-betweens",
      "Significant time saved on prospecting phases",
      "Reduced relational and cultural risk",
      "Credible local footing from the very first exchanges",
    ],
    ctaSubject: "Business Intermediation",
  },
  {
    slug: "etudes-conseil",
    icon: LineChart,
    shortTitle: "Studies & Advisory",
    title: "Studies & Advisory",
    summary:
      "Rigorous studies to de-risk your investment and growth decisions before you commit resources.",
    description:
      "Before investing in a market, you need to understand it. Our teams conduct market studies, feasibility studies, and strategic or sector diagnostics that turn uncertainty into well-argued decisions. Every recommendation is backed by verified data and a fine-grained reading of the local context.",
    steps: [
      {
        title: "Scoping the objectives",
        description:
          "Clarifying the questions to answer and the decision criteria with your team.",
      },
      {
        title: "Data collection & analysis",
        description:
          "Field research, expert interviews, sector and regulatory data.",
      },
      {
        title: "Strategic recommendations",
        description:
          "Summary of possible options, with risks, opportunities and costed scenarios.",
      },
      {
        title: "Findings & decision support",
        description:
          "Clear presentation of results, open to challenge and refinement with your leadership team.",
      },
    ],
    benefits: [
      "Decisions grounded in reliable data, not assumptions",
      "Measurable reduction in investment risk",
      "A clear view of the target market's opportunities and constraints",
      "An actionable deliverable, not a report gathering dust",
    ],
    ctaSubject: "Studies & Advisory",
  },
  {
    slug: "accompagnement-projets",
    icon: Workflow,
    shortTitle: "Project Support",
    title: "Project Support",
    summary:
      "End-to-end management — from scoping to evaluation — to turn a strategy into concrete results.",
    description:
      "A good study isn't enough if execution fails. SYNERA Group manages your projects throughout their full lifecycle: initial scoping, partnership structuring, operational implementation and results evaluation. You keep a single point of contact, responsible for overall consistency.",
    steps: [
      {
        title: "Project scoping",
        description:
          "Defining objectives, scope, milestones and success indicators.",
      },
      {
        title: "Structuring & partnerships",
        description:
          "Setting up agreements, allocating roles, and legally and financially securing operations.",
      },
      {
        title: "Implementation & steering",
        description:
          "Coordinating stakeholders, tracking progress and making real-time trade-offs.",
      },
      {
        title: "Evaluation & capitalization",
        description:
          "Assessing results, capturing lessons learned and recommendations for the next phases.",
      },
    ],
    benefits: [
      "A single point of contact, responsible end to end",
      "Controlled execution, with clear milestones and reporting",
      "Partnerships structured and secured from the outset",
      "Results that are measured, not just delivered",
    ],
    ctaSubject: "Project Support",
  },
  {
    slug: "competences-rh",
    icon: GraduationCap,
    shortTitle: "Skills Development & HR",
    title: "Skills Development & HR",
    summary:
      "Training, international mobility and access to sector experts to give your teams the means to succeed.",
    description:
      "An international project succeeds through the skills of the people driving it. We design tailor-made professional and technical training, support your talent through mobility or expatriation, and connect you with sharp sector experts whenever a specific skill is missing.",
    steps: [
      {
        title: "Needs diagnosis",
        description:
          "Identifying the skills to strengthen and the profiles involved in mobility.",
      },
      {
        title: "Tailor-made program",
        description:
          "Designing a training path or mobility plan adapted to your constraints.",
      },
      {
        title: "Deployment",
        description:
          "Rolling out training and providing logistical and administrative support for mobility.",
      },
      {
        title: "Follow-up & upskilling",
        description:
          "Assessing progress and adjusting the program over time.",
      },
    ],
    benefits: [
      "Teams operational in the field faster",
      "International transitions secured, both humanly and administratively",
      "Access to sharp sector expertise for one-off needs",
      "Programs built tailor-made, never off the shelf",
    ],
    ctaSubject: "Skills Development & HR",
  },
];

export const poles: Record<Locale, Pole[]> = { fr: polesFr, en: polesEn };
