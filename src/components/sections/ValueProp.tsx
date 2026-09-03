"use client";

import { values } from "@/data/values";
import { Section, SectionHeading } from "@/components/ui/Section";
import { Reveal } from "@/components/ui/Reveal";
import { useLanguage } from "@/components/providers/LanguageProvider";

export function ValueProp() {
  const { locale, content } = useLanguage();
  const t = content.home.valueProp;

  return (
    <Section className="bg-ink-50 dark:bg-ink-800/20">
      <SectionHeading eyebrow={t.eyebrow} title={t.title} description={t.description} />
      <div className="mt-12 grid grid-cols-1 gap-x-8 gap-y-10 sm:grid-cols-2">
        {values[locale].map((value, i) => (
          <Reveal key={value.title} delay={i * 0.1} className="flex gap-4">
            <div className="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white text-primary shadow-card dark:bg-ink-800">
              <value.icon className="h-5 w-5" />
            </div>
            <div>
              <h3 className="font-display text-lg font-semibold text-ink-900 dark:text-white">
                {value.title}
              </h3>
              <p className="mt-2 text-sm leading-relaxed text-ink-400 dark:text-ink-100/70">
                {value.description}
              </p>
            </div>
          </Reveal>
        ))}
      </div>
    </Section>
  );
}
