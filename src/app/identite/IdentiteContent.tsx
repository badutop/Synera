"use client";

import Image from "next/image";
import Link from "next/link";
import { ArrowLeft, MapPin, Target, Telescope } from "lucide-react";
import { Section, SectionHeading } from "@/components/ui/Section";
import { Container } from "@/components/ui/Container";
import { Reveal } from "@/components/ui/Reveal";
import { ValuesGrid } from "@/components/sections/ValuesGrid";
import { TeamGrid } from "@/components/sections/TeamGrid";
import { CtaBand } from "@/components/sections/CtaBand";
import { useLanguage } from "@/components/providers/LanguageProvider";

export function IdentiteContent() {
  const { content } = useLanguage();
  const t = content.identite;


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
              {t.hero.paragraph}
            </p>
          </Reveal>
          <Reveal delay={0.15} className="relative aspect-[4/3] w-full overflow-hidden rounded-3xl shadow-soft">
            <Image
              src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1200&q=80"
              alt={t.hero.imageAlt}
              fill
              className="object-cover"
              sizes="(min-width: 1024px) 45vw, 90vw"
            />
          </Reveal>
        </Container>
      </section>

      <Section>
        <div className="grid grid-cols-1 gap-6 sm:grid-cols-2">
          <Reveal>
            <div className="h-full rounded-2xl border border-ink-900/8 p-8 dark:border-white/10">
              <Target className="h-8 w-8 text-primary" />
              <h2 className="mt-5 font-display text-2xl font-bold text-ink-900 dark:text-white">
                {t.mission.title}
              </h2>
              <p className="mt-4 leading-relaxed text-ink-400 dark:text-ink-100/70">
                {t.mission.text}
              </p>
            </div>
          </Reveal>
          <Reveal delay={0.1}>
            <div className="h-full rounded-2xl border border-ink-900/8 p-8 dark:border-white/10">
              <Telescope className="h-8 w-8 text-primary" />
              <h2 className="mt-5 font-display text-2xl font-bold text-ink-900 dark:text-white">
                {t.vision.title}
              </h2>
              <p className="mt-4 leading-relaxed text-ink-400 dark:text-ink-100/70">
                {t.vision.text}
              </p>
            </div>
          </Reveal>
        </div>
      </Section>

      <Section className="bg-ink-50 dark:bg-ink-800/20">
        <SectionHeading
          eyebrow={t.valuesSection.eyebrow}
          title={t.valuesSection.title}
          description={t.valuesSection.description}
        />
        <div className="mt-12">
          <ValuesGrid />
        </div>
      </Section>

      <Section>
        <SectionHeading
          eyebrow={t.geo.eyebrow}
          title={t.geo.title}
          description={t.geo.description}
        />
        <div className="mt-12 max-w-md">
          <Reveal>
            <div className="flex items-start gap-4 rounded-2xl border border-ink-900/8 p-6 dark:border-white/10">
              <MapPin className="mt-1 h-6 w-6 shrink-0 text-primary" />
              <div>
                <h3 className="font-display text-lg font-semibold text-ink-900 dark:text-white">
                  {content.contact.hq.address}
                </h3>
                <p className="text-sm text-ink-400 dark:text-ink-100/70">
                  {content.contact.hq.role}
                </p>
              </div>
            </div>
          </Reveal>
        </div>
      </Section>

      <Section className="bg-ink-50 dark:bg-ink-800/20">
        <SectionHeading
          eyebrow={t.team.eyebrow}
          title={t.team.title}
          description={t.team.description}
        />
        <div className="mt-12">
          <TeamGrid />
        </div>
      </Section>

      <CtaBand />
    </>
  );
}
