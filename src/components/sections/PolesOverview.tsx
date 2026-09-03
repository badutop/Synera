"use client";

import Link from "next/link";
import { ArrowRight } from "lucide-react";
import { poles } from "@/data/solutions";
import { Section, SectionHeading } from "@/components/ui/Section";
import { Card } from "@/components/ui/Card";
import { Reveal } from "@/components/ui/Reveal";
import { useLanguage } from "@/components/providers/LanguageProvider";

export function PolesOverview() {
  const { locale, content } = useLanguage();
  const t = content.home.poles;

  return (
    <Section>
      <SectionHeading eyebrow={t.eyebrow} title={t.title} description={t.description} />
      <div className="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        {poles[locale].map((pole, i) => (
          <Reveal key={pole.slug} delay={i * 0.1}>
            <Link href={`/solutions#${pole.slug}`} className="group block h-full">
              <Card className="flex h-full flex-col">
                <div className="flex h-11 w-11 items-center justify-center rounded-xl bg-primary-50 text-primary dark:bg-primary-500/10">
                  <pole.icon className="h-5 w-5" />
                </div>
                <h3 className="mt-5 font-display text-lg font-semibold text-ink-900 dark:text-white">
                  {pole.shortTitle}
                </h3>
                <p className="mt-2.5 flex-1 text-sm leading-relaxed text-ink-400 dark:text-ink-100/70">
                  {pole.summary}
                </p>
                <span className="mt-5 inline-flex items-center gap-1.5 text-sm font-semibold text-primary">
                  {t.linkLabel}
                  <ArrowRight className="h-3.5 w-3.5 transition-transform group-hover:translate-x-1" />
                </span>
              </Card>
            </Link>
          </Reveal>
        ))}
      </div>
    </Section>
  );
}
