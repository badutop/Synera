import type { Metadata } from "next";
import { ActualitesContent } from "./ActualitesContent";

export const metadata: Metadata = {
  title: "Actualités",
  description:
    "Analyses de marché, méthodologie et actualités du groupe : retrouvez les derniers articles de SYNERA Group.",
};

export default function ActualitesPage() {
  return <ActualitesContent />;
}
