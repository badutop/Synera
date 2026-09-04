"use client";

import Link from "next/link";
import Image from "next/image";
import { ArrowRight } from "lucide-react";
import { poles } from "@/data/solutions";
import { Section, SectionHeading } from "@/components/ui/Section";
import { Reveal } from "@/components/ui/Reveal";
import { useLanguage } from "@/components/providers/LanguageProvider";

const poleImages: Record<string, string> = {
  intermediation:
    "https://images.unsplash.com/photo-1759310610552-914069ec2e0b?auto=format&fit=crop&w=800&q=80",
  "etudes-conseil":
    "https://images.unsplash.com/photo-1573496528298-f0e9d3c7ce55?auto=format&fit=crop&w=800&q=80",
  "accompagnement-projets":
    "https://images.unsplash.com/photo-1604783125462-37d81c7385e6?auto=format&fit=crop&w=800&q=80",
  "competences-rh":
    "https://images.unsplash.com/photo-1653565685060-e15e492a7fda?auto=format&fit=crop&w=800&q=80",
};

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
              className="group relative flex aspect-square w-full flex-col justify-end overflow-hidden rounded-2xl shadow-card transition-shadow duration-300 hover:shadow-soft"
            >
              <Image
                src={poleImages[pole.slug]}
                alt={pole.shortTitle}
                fill
                className="object-cover transition-transform duration-500 group-hover:scale-105"
                sizes="(min-width: 640px) 22vw, 45vw"
              />
              <div
                className="absolute inset-0 bg-gradient-to-t from-ink-900/90 via-ink-900/25 to-transparent"
                aria-hidden="true"
              />
              <div className="relative flex flex-col gap-1.5 p-3">
                <div className="flex h-7 w-7 items-center justify-center rounded-lg bg-white/15 text-white backdrop-blur-sm">
                  <pole.icon className="h-3.5 w-3.5" />
                </div>
                <span className="font-display text-xs font-semibold leading-snug text-white sm:text-sm">
                  {pole.shortTitle}
                </span>
              </div>
            </Link>
          </Reveal>
        ))}
      </div>
    </Section>
  );
}
