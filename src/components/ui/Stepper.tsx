"use client";

import { approachSteps } from "@/data/approach";
import { Reveal } from "@/components/ui/Reveal";
import { useLanguage } from "@/components/providers/LanguageProvider";

export function Stepper() {
  const { locale } = useLanguage();

  return (
    <div className="relative">
      <div
        aria-hidden="true"
        className="absolute left-6 top-2 hidden h-[calc(100%-2rem)] w-px bg-ink-900/10 dark:bg-white/10 sm:block"
      />
      <ol className="space-y-10">
        {approachSteps[locale].map((step, i) => (
          <Reveal key={step.title} delay={i * 0.08}>
            <li className="relative flex flex-col gap-5 sm:flex-row sm:items-start">
              <span className="relative z-10 flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-primary text-white shadow-soft">
                <step.icon className="h-5 w-5" />
              </span>
              <div className="rounded-2xl border border-ink-900/8 bg-white p-6 shadow-card dark:border-white/10 dark:bg-white/[0.03] sm:flex-1">
                <div className="flex items-baseline gap-3">
                  <span className="font-display text-sm font-bold text-primary">
                    {step.number}
                  </span>
                  <h3 className="font-display text-xl font-semibold text-ink-900 dark:text-white">
                    {step.title}
                  </h3>
                </div>
                <p className="mt-3 leading-relaxed text-ink-400 dark:text-ink-100/70">
                  {step.description}
                </p>
              </div>
            </li>
          </Reveal>
        ))}
      </ol>
    </div>
  );
}
