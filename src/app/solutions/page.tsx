import type { Metadata } from "next";
import { SolutionsContent } from "./SolutionsContent";

export const metadata: Metadata = {
  title: "Nos Solutions",
  description:
    "Intermédiation d'affaires, études & conseil, accompagnement de projets, développement des compétences & RH : découvrez les 4 pôles d'expertise de SYNERA Group.",
};

export default function SolutionsPage() {
  return <SolutionsContent />;
}
