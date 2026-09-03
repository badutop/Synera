import type { Metadata } from "next";
import { SecteursContent } from "./SecteursContent";

export const metadata: Metadata = {
  title: "Secteurs & Références",
  description:
    "Finance, IT, Énergie Solaire, Entrepreneuriat, Formation, Mines & Géologie : découvrez les secteurs d'intervention de SYNERA Group et nos références.",
};

export default function SecteursPage() {
  return <SecteursContent />;
}
