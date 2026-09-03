import type { Locale } from "@/components/providers/LanguageProvider";

export interface TeamMember {
  name: string;
  role: string;
  bio: string;
  initials: string;
}

// Portraits et noms placeholders — à remplacer par les membres réels de l'équipe dirigeante.
const teamFr: TeamMember[] = [
  {
    name: "Prénom Nom",
    role: "Fondateur & Directeur Général",
    bio: "Pilote la vision du groupe et les relations institutionnelles de haut niveau.",
    initials: "PN",
  },
  {
    name: "Prénom Nom",
    role: "Directrice des Opérations",
    bio: "Supervise l'exécution des projets et la qualité de l'accompagnement client.",
    initials: "PN",
  },
  {
    name: "Prénom Nom",
    role: "Directeur Études & Conseil",
    bio: "Conduit les études de marché et les diagnostics stratégiques du groupe.",
    initials: "PN",
  },
  {
    name: "Prénom Nom",
    role: "Responsable Intermédiation d'Affaires",
    bio: "Anime le réseau de contacts institutionnels et privés de SYNERA Group.",
    initials: "PN",
  },
];

// Placeholder portraits and names — to be replaced with the real leadership team.
const teamEn: TeamMember[] = [
  {
    name: "First Last",
    role: "Founder & CEO",
    bio: "Drives the group's vision and senior institutional relationships.",
    initials: "FL",
  },
  {
    name: "First Last",
    role: "Chief Operating Officer",
    bio: "Oversees project execution and the quality of client support.",
    initials: "FL",
  },
  {
    name: "First Last",
    role: "Director of Studies & Advisory",
    bio: "Leads the group's market studies and strategic diagnostics.",
    initials: "FL",
  },
  {
    name: "First Last",
    role: "Head of Business Intermediation",
    bio: "Runs SYNERA Group's network of institutional and private contacts.",
    initials: "FL",
  },
];

export const team: Record<Locale, TeamMember[]> = { fr: teamFr, en: teamEn };
