"use client";

import { Section } from "@/components/ui/Section";
import { useLanguage } from "@/components/providers/LanguageProvider";

// Zone réservée aux logos partenaires/clients réels. Remplacer les blocs ci-dessous
// par des <Image /> une fois les logos fournis.
const placeholders = Array.from({ length: 6 }, (_, i) => i + 1);

export function PartnersMarquee() {
  const { content } = useLanguage();

  return (
    <Section className="py-14 sm:py-16">
      <p className="text-center text-sm font-semibold uppercase tracking-widest text-ink-400 dark:text-ink-100/50">
        {content.home.partners.title}
      </p>
      <div className="mt-8 grid grid-cols-3 gap-6 sm:grid-cols-6">
        {placeholders.map((n) => (
          <div
            key={n}
            className="flex h-14 items-center justify-center rounded-lg border border-dashed border-ink-900/10 text-xs font-medium text-ink-400/60 dark:border-white/10 dark:text-ink-100/30"
          >
            Logo {n}
          </div>
        ))}
      </div>
    </Section>
  );
}
