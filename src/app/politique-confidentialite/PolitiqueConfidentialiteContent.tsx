"use client";

import { LegalDocument } from "@/components/legal/LegalDocument";
import { useLanguage } from "@/components/providers/LanguageProvider";

export function PolitiqueConfidentialiteContent() {
  const { content } = useLanguage();
  const t = content.privacy;

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
