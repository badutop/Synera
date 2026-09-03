"use client";

import Link from "next/link";
import Image from "next/image";
import { ArrowLeft, ArrowRight, Check } from "lucide-react";
import { poles } from "@/data/solutions";
import { sectors } from "@/data/sectors";
import { Section, SectionHeading } from "@/components/ui/Section";
import { Container } from "@/components/ui/Container";
import { Reveal } from "@/components/ui/Reveal";
import { Button } from "@/components/ui/Button";
import { CtaBand } from "@/components/sections/CtaBand";
import { cn } from "@/lib/utils";
import { useLanguage } from "@/components/providers/LanguageProvider";

export function SolutionsContent() {
  const { locale, content } = useLanguage();
  const t = content.solutions;
  const localizedPoles = poles[locale];
  const localizedSectors = sectors[locale];

  return (
    <>
      <section className="bg-ink-50 py-14 dark:bg-ink-800/20 sm:py-20">
        <Container className="grid grid-cols-1 items-center gap-12 lg:grid-cols-2">
          <Reveal>
            <Link
              href="/"
              className="mb-4 inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:underline"
            >
              <ArrowLeft className="h-3.5 w-3.5" />
              {content.common.backToHome}
            </Link>
            <p className="mb-3 text-sm font-semibold uppercase tracking-widest text-primary">
              {t.hero.eyebrow}
            </p>
            <h1 className="font-display text-4xl font-bold text-ink-900 text-balance dark:text-white sm:text-5xl">
              {t.hero.title}
            </h1>
            <p className="mt-6 text-lg leading-relaxed text-ink-400 dark:text-ink-100/70">
              {t.hero.description}
            </p>

            <div className="mt-8 flex flex-wrap gap-3">
              {localizedPoles.map((pole) => (
                <a
                  key={pole.slug}
                  href={`#${pole.slug}`}
                  className="rounded-full border border-ink-900/10 bg-white px-4 py-2 text-sm font-medium text-ink-700 transition-colors hover:border-primary hover:text-primary dark:border-white/10 dark:bg-transparent dark:text-ink-100/80"
                >
                  {pole.shortTitle}
                </a>
              ))}
            </div>
          </Reveal>
          <Reveal delay={0.15} className="relative aspect-[4/3] w-full overflow-hidden rounded-3xl shadow-soft">
            <Image
              src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=1200&q=80"
              alt={t.hero.imageAlt}
              fill
              className="object-cover"
              sizes="(min-width: 1024px) 45vw, 90vw"
            />
          </Reveal>
        </Container>
      </section>

      {localizedPoles.map((pole, index) => (
        <section
          key={pole.slug}
          id={pole.slug}
          className={cn(
            "scroll-mt-24 py-14 sm:py-20",
            index % 2 === 1 && "bg-ink-50 dark:bg-ink-800/20"
          )}
        >
          <Container>
            <div className="grid grid-cols-1 gap-14 lg:grid-cols-[0.9fr_1.1fr]">
              <Reveal>
                <div className="flex h-12 w-12 items-center justify-center rounded-xl bg-primary-50 text-primary dark:bg-primary-500/10">
                  <pole.icon className="h-6 w-6" />
                </div>
                <h2 className="mt-5 font-display text-3xl font-bold text-ink-900 dark:text-white">
                  {pole.title}
                </h2>
                <p className="mt-4 leading-relaxed text-ink-400 dark:text-ink-100/70">
                  {pole.description}
                </p>

                <ul className="mt-8 space-y-3">
                  {pole.benefits.map((benefit) => (
                    <li key={benefit} className="flex items-start gap-2.5 text-sm">
                      <Check className="mt-0.5 h-4 w-4 shrink-0 text-primary" />
                      <span className="text-ink-700 dark:text-ink-100/80">
                        {benefit}
                      </span>
                    </li>
                  ))}
                </ul>

                <Button
                  href={`/contact?sujet=${encodeURIComponent(pole.ctaSubject)}`}
                  className="mt-8"
                >
                  {t.ctaLabel}
                  <ArrowRight className="h-4 w-4" />
                </Button>
              </Reveal>

              <Reveal delay={0.1}>
                <h3 className="font-display text-lg font-semibold text-ink-900 dark:text-white">
                  {t.methodologyLabel}
                </h3>
                <ol className="mt-6 space-y-6">
                  {pole.steps.map((step, i) => (
                    <li key={step.title} className="flex gap-4">
                      <span className="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-primary font-display text-sm font-bold text-white">
                        {i + 1}
                      </span>
                      <div>
                        <h4 className="font-semibold text-ink-900 dark:text-white">
                          {step.title}
                        </h4>
                        <p className="mt-1 text-sm leading-relaxed text-ink-400 dark:text-ink-100/70">
                          {step.description}
                        </p>
                      </div>
                    </li>
                  ))}
                </ol>
              </Reveal>
            </div>
          </Container>
        </section>
      ))}

      <Section>
        <SectionHeading
          eyebrow={t.sectorsSection.eyebrow}
          title={t.sectorsSection.title}
          align="center"
        />
        <div className="mt-10 flex flex-wrap justify-center gap-3">
          {localizedSectors.map((sector) => (
            <span
              key={sector.title}
              className="inline-flex items-center gap-2 rounded-full border border-ink-900/10 px-4 py-2 text-sm font-medium text-ink-700 dark:border-white/10 dark:text-ink-100/80"
            >
              <sector.icon className="h-4 w-4 text-primary" />
              {sector.title}
            </span>
          ))}
        </div>
        <p className="mt-6 text-center">
          <Link href="/secteurs" className="text-sm font-semibold text-primary hover:underline">
            {t.sectorsSection.linkLabel}
          </Link>
        </p>
      </Section>

      <CtaBand />
    </>
  );
}
