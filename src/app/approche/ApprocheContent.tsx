"use client";

import Image from "next/image";
import Link from "next/link";
import { ArrowLeft } from "lucide-react";
import { Container } from "@/components/ui/Container";
import { Reveal } from "@/components/ui/Reveal";
import { Stepper } from "@/components/ui/Stepper";
import { Section, SectionHeading } from "@/components/ui/Section";
import { CtaBand } from "@/components/sections/CtaBand";
import { useLanguage } from "@/components/providers/LanguageProvider";

export function ApprocheContent() {
  const { content } = useLanguage();
  const t = content.approche;

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
          </Reveal>
          <Reveal delay={0.15} className="relative aspect-[4/3] w-full overflow-hidden rounded-3xl shadow-soft">
            <Image
              src="https://images.unsplash.com/photo-1581091877018-dac6a371d50f?auto=format&fit=crop&w=1200&q=80"
              alt={t.hero.imageAlt}
              fill
              className="object-cover"
              sizes="(min-width: 1024px) 45vw, 90vw"
            />
          </Reveal>
        </Container>
      </section>

      <Section>
        <div className="mx-auto max-w-3xl">
          <Stepper />
        </div>
      </Section>

      <Section className="bg-ink-50 dark:bg-ink-800/20">
        <SectionHeading
          eyebrow={t.engagement.eyebrow}
          title={t.engagement.title}
          description={t.engagement.description}
          align="center"
        />
      </Section>

      <CtaBand />
    </>
  );
}
