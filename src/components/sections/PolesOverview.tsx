"use client";

import Link from "next/link";
import { ArrowRight } from "lucide-react";
import { poles } from "@/data/solutions";
import { Section, SectionHeading } from "@/components/ui/Section";
import { Reveal } from "@/components/ui/Reveal";
import { useLanguage } from "@/components/providers/LanguageProvider";

export function PolesOverview() {
  const { locale, content } = useLanguage();
  const t = content.home.poles;

  return (
    <Section>
      <div className="flex flex-col items-start justify-between gap-6 sm:flex-row sm:items-end">
        <SectionHeading eyebrow={t.eyebrow} title={t.title} description={t.description} />
        <Link
          href="/solutions"
          className="inline-flex shrink-0 items-center gap-1.5 text-sm font-semibold text-primary hover:underline"
        >
          {t.viewAll}
          <ArrowRight className="h-3.5 w-3.5" />
        </Link>
      </div>

      <div className="mt-8 grid grid-cols-2 gap-4 sm:grid-cols-4">
        {poles[locale].map((pole, i) => (
          <Reveal key={pole.slug} delay={i * 0.06}>
            <Link
              href={`/solutions#${pole.slug}`}
              className="group flex h-full flex-col items-center gap-3 rounded-2xl border border-ink-900/8 bg-white p-5 text-center shadow-card transition-all duration-300 hover:-translate-y-1 hover:border-primary/30 hover:shadow-soft dark:border-white/10 dark:bg-white/[0.03]"
            >
              <div className="flex h-11 w-11 items-center justify-center rounded-xl bg-primary-50 text-primary transition-colors group-hover:bg-primary group-hover:text-white dark:bg-primary-500/10">
                <pole.icon className="h-5 w-5" />
              </div>
              <span className="text-sm font-semibold text-ink-900 dark:text-white">
                {pole.shortTitle}
              </span>
            </Link>
          </Reveal>
        ))}
      </div>
    </Section>
  );
}
