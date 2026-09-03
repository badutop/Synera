import type { Locale } from "@/components/providers/LanguageProvider";

export interface Stat {
  value: string;
  label: string;
}

// Chiffres illustratifs — à remplacer par les données réelles du groupe avant mise en ligne.
const statsFr: Stat[] = [
  { value: "10+", label: "années d'expertise cumulée" },
  { value: "50+", label: "projets accompagnés" },
  { value: "5", label: "secteurs d'intervention" },
  { value: "3", label: "marchés connectés" },
];

// Illustrative figures — to be replaced with the group's real data before launch.
const statsEn: Stat[] = [
  { value: "10+", label: "years of combined expertise" },
  { value: "50+", label: "projects supported" },
  { value: "5", label: "sectors of activity" },
  { value: "3", label: "markets connected" },
];

export const stats: Record<Locale, Stat[]> = { fr: statsFr, en: statsEn };
