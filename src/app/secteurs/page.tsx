import type { Metadata } from "next";
import { SecteursContent } from "./SecteursContent";

export const metadata: Metadata = {
  title: "Secteurs & Références",
  description:
    "Finance, IT, Marketing & Communication, Entrepreneuriat, Formation : découvrez les secteurs d'intervention de SYNERA Group et nos références.",
};

export default function SecteursPage() {
  return <SecteursContent />;
}
