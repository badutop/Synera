import type { Metadata } from "next";
import { IdentiteContent } from "./IdentiteContent";

export const metadata: Metadata = {
  title: "Notre Identité",
  description:
    "Histoire, mission, vision et valeurs de SYNERA Group — société d'intermédiation, d'études et d'accompagnement de projets.",
};

export default function IdentitePage() {
  return <IdentiteContent />;
}
