"use client";

import { LegalDocument } from "@/components/legal/LegalDocument";
import { useLanguage } from "@/components/providers/LanguageProvider";

export function MentionsLegalesContent() {
  const { content } = useLanguage();
  const t = content.legal;

  return (
    <LegalDocument
      eyebrow={t.hero.eyebrow}
      title={t.hero.title}
      updatedLabel={t.updatedLabel}
      updatedAt={t.updatedAt}
      tocLabel={t.tocLabel}
      sections={t.sections}
    />
  );
}
