import type { Metadata } from "next";
import { ApprocheContent } from "./ApprocheContent";

export const metadata: Metadata = {
  title: "Notre Approche",
  description:
    "Écoute, étude, stratégie, mise en œuvre, suivi & évaluation : découvrez la méthodologie de SYNERA Group pour piloter vos projets jusqu'au résultat.",
};

export default function ApprochePage() {
  return <ApprocheContent />;
}
