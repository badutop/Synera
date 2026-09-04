import type { Metadata } from "next";
import { PolitiqueConfidentialiteContent } from "./PolitiqueConfidentialiteContent";

export const metadata: Metadata = {
  title: "Politique de confidentialité",
  description:
    "Comment SYNERA Group collecte, utilise et protège vos données personnelles sur ce site.",
};

export default function PolitiqueConfidentialitePage() {
  return <PolitiqueConfidentialiteContent />;
}
