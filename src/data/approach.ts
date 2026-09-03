import type { LucideIcon } from "lucide-react";
import { Ear, Search, Compass, Cog, LineChart } from "lucide-react";
import type { Locale } from "@/components/providers/LanguageProvider";

export interface ApproachStep {
  icon: LucideIcon;
  number: string;
  title: string;
  description: string;
}

const approachStepsFr: ApproachStep[] = [
  {
    icon: Ear,
    number: "01",
    title: "Écoute",
    description:
      "Tout commence par une compréhension fine de votre contexte, de vos ambitions et de vos contraintes. Nous prenons le temps de cadrer vos objectifs avant de proposer quoi que ce soit.",
  },
  {
    icon: Search,
    number: "02",
    title: "Étude",
    description:
      "Nos équipes analysent le marché, le contexte réglementaire et les acteurs pertinents pour objectiver les opportunités et les risques réels de votre projet.",
  },
  {
    icon: Compass,
    number: "03",
    title: "Stratégie",
    description:
      "Nous formulons des recommandations claires et priorisées, avec des scénarios chiffrés qui vous permettent de décider en toute connaissance de cause.",
  },
  {
    icon: Cog,
    number: "04",
    title: "Mise en œuvre",
    description:
      "Nous pilotons l'exécution aux côtés de vos équipes : mise en relation, structuration des partenariats, coordination des parties prenantes.",
  },
  {
    icon: LineChart,
    number: "05",
    title: "Suivi & Évaluation",
    description:
      "Nous mesurons les résultats obtenus, documentons les enseignements et ajustons l'accompagnement pour les phases suivantes de votre développement.",
  },
];

const approachStepsEn: ApproachStep[] = [
  {
    icon: Ear,
    number: "01",
    title: "Listen",
    description:
      "It all starts with a fine-grained understanding of your context, your ambitions and your constraints. We take the time to scope your objectives before proposing anything.",
  },
  {
    icon: Search,
    number: "02",
    title: "Study",
    description:
      "Our teams analyze the market, the regulatory context and the relevant players to objectively assess the real opportunities and risks of your project.",
  },
  {
    icon: Compass,
    number: "03",
    title: "Strategy",
    description:
      "We formulate clear, prioritized recommendations, with costed scenarios that let you decide with full visibility.",
  },
  {
    icon: Cog,
    number: "04",
    title: "Implementation",
    description:
      "We steer execution alongside your teams: introductions, partnership structuring, stakeholder coordination.",
  },
  {
    icon: LineChart,
    number: "05",
    title: "Follow-up & Evaluation",
    description:
      "We measure the results achieved, document lessons learned, and adjust support for the next phases of your growth.",
  },
];

export const approachSteps: Record<Locale, ApproachStep[]> = {
  fr: approachStepsFr,
  en: approachStepsEn,
};
