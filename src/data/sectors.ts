import type { LucideIcon } from "lucide-react";
import { LineChart, Cpu, Megaphone, Rocket, GraduationCap } from "lucide-react";
import type { Locale } from "@/components/providers/LanguageProvider";

export interface Sector {
  icon: LucideIcon;
  title: string;
  description: string;
}

const sectorsFr: Sector[] = [
  {
    icon: LineChart,
    title: "Finance",
    description:
      "Structuration d'opérations, mise en relation avec des institutions financières et accompagnement des levées de fonds.",
  },
  {
    icon: Cpu,
    title: "IT & Technologies",
    description:
      "Études de marché et intermédiation pour les acteurs technologiques en phase d'expansion internationale.",
  },
  {
    icon: Megaphone,
    title: "Marketing & Communication",
    description:
      "Diagnostics de positionnement et mise en relation avec des partenaires de communication locaux.",
  },
  {
    icon: Rocket,
    title: "Entrepreneuriat",
    description:
      "Accompagnement des porteurs de projets dans leur structuration, leur financement et leur mise en réseau.",
  },
  {
    icon: GraduationCap,
    title: "Formation",
    description:
      "Programmes de développement des compétences et accompagnement de la mobilité professionnelle.",
  },
];

const sectorsEn: Sector[] = [
  {
    icon: LineChart,
    title: "Finance",
    description:
      "Structuring operations, introductions to financial institutions, and support for fundraising.",
  },
  {
    icon: Cpu,
    title: "IT & Technology",
    description:
      "Market studies and intermediation for technology players expanding internationally.",
  },
  {
    icon: Megaphone,
    title: "Marketing & Communication",
    description:
      "Positioning diagnostics and introductions to local communication partners.",
  },
  {
    icon: Rocket,
    title: "Entrepreneurship",
    description:
      "Supporting project leaders in structuring, financing and building their network.",
  },
  {
    icon: GraduationCap,
    title: "Training",
    description:
      "Skills development programs and support for professional mobility.",
  },
];

export const sectors: Record<Locale, Sector[]> = { fr: sectorsFr, en: sectorsEn };

export interface CaseStudy {
  sector: string;
  title: string;
  result: string;
}

// Références illustratives — à remplacer par des cas clients réels une fois disponibles.
const caseStudiesFr: CaseStudy[] = [
  {
    sector: "Finance",
    title: "Structuration d'un partenariat financier transfrontalier",
    result: "Mise en relation avec 3 institutions partenaires en moins de 90 jours.",
  },
  {
    sector: "Entrepreneuriat",
    title: "Étude de faisabilité pour une expansion commerciale",
    result: "Diagnostic livré en 6 semaines, décision d'investissement sécurisée.",
  },
  {
    sector: "Formation",
    title: "Programme de mobilité pour une équipe technique",
    result: "12 collaborateurs accompagnés dans leur transition internationale.",
  },
];

// Illustrative references — to be replaced with real client cases once available.
const caseStudiesEn: CaseStudy[] = [
  {
    sector: "Finance",
    title: "Structuring a cross-border financial partnership",
    result: "Introductions to 3 partner institutions in under 90 days.",
  },
  {
    sector: "Entrepreneurship",
    title: "Feasibility study for a commercial expansion",
    result: "Diagnosis delivered in 6 weeks, investment decision de-risked.",
  },
  {
    sector: "Training",
    title: "Mobility program for a technical team",
    result: "12 employees supported through their international transition.",
  },
];

export const caseStudies: Record<Locale, CaseStudy[]> = {
  fr: caseStudiesFr,
  en: caseStudiesEn,
};
