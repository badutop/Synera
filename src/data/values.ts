import type { LucideIcon } from "lucide-react";
import { ShieldCheck, HeartHandshake, Microscope, Sparkles } from "lucide-react";
import type { Locale } from "@/components/providers/LanguageProvider";

export interface Value {
  icon: LucideIcon;
  title: string;
  description: string;
}

const valuesFr: Value[] = [
  {
    icon: ShieldCheck,
    title: "Intégrité",
    description:
      "Nous disons ce que nous faisons et faisons ce que nous disons. La confiance se construit dans la durée, jamais au détriment de la transparence.",
  },
  {
    icon: HeartHandshake,
    title: "Co-prospérité",
    description:
      "Votre succès est notre succès. Nous ne recommandons que ce qui sert réellement vos intérêts, même quand la solution la plus simple pour nous serait différente.",
  },
  {
    icon: Microscope,
    title: "Rigueur",
    description:
      "Chaque recommandation s'appuie sur des données et des études, jamais sur l'intuition seule. La décision vient après l'analyse, pas avant.",
  },
  {
    icon: Sparkles,
    title: "Les différences comme leviers de richesse",
    description:
      "La diversité des marchés, des expertises et des cultures que nous connectons est notre matière première — pas un obstacle à gérer.",
  },
];

const valuesEn: Value[] = [
  {
    icon: ShieldCheck,
    title: "Integrity",
    description:
      "We say what we do and do what we say. Trust is built over time, never at the expense of transparency.",
  },
  {
    icon: HeartHandshake,
    title: "Co-prosperity",
    description:
      "Your success is our success. We only recommend what genuinely serves your interests, even when the easier path for us would be different.",
  },
  {
    icon: Microscope,
    title: "Rigor",
    description:
      "Every recommendation is grounded in data and studies, never intuition alone. Decisions come after analysis, not before.",
  },
  {
    icon: Sparkles,
    title: "Differences as a source of richness",
    description:
      "The diversity of markets, expertise and cultures we connect is our raw material — not an obstacle to manage.",
  },
];

export const values: Record<Locale, Value[]> = { fr: valuesFr, en: valuesEn };
