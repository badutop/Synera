import type { Metadata } from "next";
import { ContactContent } from "./ContactContent";

export const metadata: Metadata = {
  title: "Contact",
  description:
    "Discutons de votre projet : contactez SYNERA Group pour un premier échange sans engagement.",
};

interface PageProps {
  searchParams: Promise<{ sujet?: string }>;
}

export default async function ContactPage({ searchParams }: PageProps) {
  const { sujet } = await searchParams;
  return <ContactContent defaultSubject={sujet} />;
}
