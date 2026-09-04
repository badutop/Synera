import type { Metadata } from "next";
import { MentionsLegalesContent } from "./MentionsLegalesContent";

export const metadata: Metadata = {
  title: "Mentions légales",
  description: "Mentions légales du site SYNERA Group.",
};

export default function MentionsLegalesPage() {
  return <MentionsLegalesContent />;
}
