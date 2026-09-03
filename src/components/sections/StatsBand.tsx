"use client";

import { stats } from "@/data/stats";
import { Section } from "@/components/ui/Section";
import { Reveal } from "@/components/ui/Reveal";
import { useLanguage } from "@/components/providers/LanguageProvider";

export function StatsBand() {
  const { locale } = useLanguage();

  return (
    <Section className="py-14 sm:py-16">
      <div className="grid grid-cols-2 gap-8 border-y border-ink-900/8 py-10 dark:border-white/10 sm:grid-cols-4">
        {stats[locale].map((stat, i) => (
          <Reveal key={stat.label} delay={i * 0.08} className="text-center">
            <p className="font-display text-3xl font-bold text-primary sm:text-4xl">
              {stat.value}
            </p>
            <p className="mt-1.5 text-sm text-ink-400 dark:text-ink-100/70">
              {stat.label}
            </p>
          </Reveal>
        ))}
      </div>
    </Section>
  );
}
