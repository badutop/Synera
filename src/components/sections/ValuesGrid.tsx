"use client";

import { values } from "@/data/values";
import { Reveal } from "@/components/ui/Reveal";
import { Card } from "@/components/ui/Card";
import { useLanguage } from "@/components/providers/LanguageProvider";

export function ValuesGrid() {
  const { locale } = useLanguage();

  return (
    <div className="grid grid-cols-1 gap-6 sm:grid-cols-2">
      {values[locale].map((value, i) => (
        <Reveal key={value.title} delay={i * 0.08}>
          <Card className="h-full">
            <div className="flex h-11 w-11 items-center justify-center rounded-xl bg-primary-50 text-primary dark:bg-primary-500/10">
              <value.icon className="h-5 w-5" />
            </div>
            <h3 className="mt-5 font-display text-lg font-semibold text-ink-900 dark:text-white">
              {value.title}
            </h3>
            <p className="mt-2.5 text-sm leading-relaxed text-ink-400 dark:text-ink-100/70">
              {value.description}
            </p>
          </Card>
        </Reveal>
      ))}
    </div>
  );
}
