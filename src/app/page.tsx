import type { Metadata } from "next";
import { Hero } from "@/components/sections/Hero";
import { StatsBand } from "@/components/sections/StatsBand";
import { PolesOverview } from "@/components/sections/PolesOverview";
import { ValueProp } from "@/components/sections/ValueProp";
import { PartnersMarquee } from "@/components/sections/PartnersMarquee";
import { CtaBand } from "@/components/sections/CtaBand";
import { BlogPreview } from "@/components/sections/BlogPreview";

export const metadata: Metadata = {
  title: "Accueil",
  description:
    "SYNERA Group connecte entreprises, investisseurs et institutions aux bons interlocuteurs, sécurise vos décisions par l'étude et pilote vos projets jusqu'au résultat.",
};

export default function HomePage() {
  return (
    <>
      <Hero />
      <PolesOverview />
      <ValueProp />
      <PartnersMarquee />
      <BlogPreview />
      <CtaBand />
      <StatsBand />
    </>
  );
}
