"use client";

import Image from "next/image";
import { Quote } from "lucide-react";
import { sectors, caseStudies } from "@/data/sectors";
import { Container } from "@/components/ui/Container";
import { Section, SectionHeading } from "@/components/ui/Section";
import { Reveal } from "@/components/ui/Reveal";
import { Card } from "@/components/ui/Card";
import { Badge } from "@/components/ui/Badge";
import { CtaBand } from "@/components/sections/CtaBand";
import { useLanguage } from "@/components/providers/LanguageProvider";

export function SecteursContent() {
  const { locale, content } = useLanguage();
  const t = content.secteurs;

  return (
    <>
      <section className="bg-ink-50 py-20 dark:bg-ink-800/20 sm:py-28">
        <Container className="grid grid-cols-1 items-center gap-12 lg:grid-cols-2">
          <Reveal>
            <p className="mb-3 text-sm font-semibold uppercase tracking-widest text-primary">
              {t.hero.eyebrow}
            </p>
            <h1 className="font-display text-4xl font-bold text-ink-900 text-balance dark:text-white sm:text-5xl">
              {t.hero.title}
            </h1>
            <p className="mt-6 text-lg leading-relaxed text-ink-400 dark:text-ink-100/70">
              {t.hero.description}
            </p>
          </Reveal>
          <Reveal delay={0.15} className="relative aspect-[4/3] w-full overflow-hidden rounded-3xl shadow-soft">
            <Image
              src="https://images.unsplash.com/photo-1624555130581-1d9cca783bc0?auto=format&fit=crop&w=1200&q=80"
              alt={t.hero.imageAlt}
              fill
              className="object-cover"
              sizes="(min-width: 1024px) 45vw, 90vw"
            />
          </Reveal>
        </Container>
      </section>

      <Section>
        <div className="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
          {sectors[locale].map((sector, i) => (
            <Reveal key={sector.title} delay={i * 0.08}>
              <Card className="h-full">
                <div className="flex h-11 w-11 items-center justify-center rounded-xl bg-primary-50 text-primary dark:bg-primary-500/10">
                  <sector.icon className="h-5 w-5" />
                </div>
                <h3 className="mt-5 font-display text-lg font-semibold text-ink-900 dark:text-white">
                  {sector.title}
                </h3>
                <p className="mt-2.5 text-sm leading-relaxed text-ink-400 dark:text-ink-100/70">
                  {sector.description}
                </p>
              </Card>
            </Reveal>
          ))}
        </div>
      </Section>

      <Section className="bg-ink-50 dark:bg-ink-800/20">
        <SectionHeading
          eyebrow={t.references.eyebrow}
          title={t.references.title}
          description={t.references.description}
        />
        <div className="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-3">
          {caseStudies[locale].map((study, i) => (
            <Reveal key={study.title} delay={i * 0.08}>
              <div className="h-full rounded-2xl border border-ink-900/8 bg-white p-6 dark:border-white/10 dark:bg-white/[0.03]">
                <Badge>{study.sector}</Badge>
                <h3 className="mt-4 font-display text-base font-semibold text-ink-900 dark:text-white">
                  {study.title}
                </h3>
                <p className="mt-2.5 text-sm leading-relaxed text-ink-400 dark:text-ink-100/70">
                  {study.result}
                </p>
              </div>
            </Reveal>
          ))}
        </div>
      </Section>

      <Section>
        <SectionHeading
          eyebrow={t.testimonials.eyebrow}
          title={t.testimonials.title}
          align="center"
        />
        <div className="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2">
          {[1, 2].map((n) => (
            <Reveal key={n} delay={n * 0.1}>
              <div className="flex h-full flex-col justify-between rounded-2xl border border-dashed border-ink-900/15 p-8 text-center dark:border-white/15">
                <Quote className="mx-auto h-8 w-8 text-primary/40" />
                <p className="mt-4 italic text-ink-400 dark:text-ink-100/60">
                  {t.testimonials.placeholder}
                </p>
              </div>
            </Reveal>
          ))}
        </div>
      </Section>

      <CtaBand />
    </>
  );
}
