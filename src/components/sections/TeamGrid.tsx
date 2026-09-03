"use client";

import { team } from "@/data/team";
import { Reveal } from "@/components/ui/Reveal";
import { useLanguage } from "@/components/providers/LanguageProvider";

export function TeamGrid() {
  const { locale } = useLanguage();

  return (
    <div className="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
      {team[locale].map((member, i) => (
        <Reveal key={member.name + member.role} delay={i * 0.08}>
          <div className="text-center">
            <div className="mx-auto flex h-28 w-28 items-center justify-center rounded-full bg-gradient-brand font-display text-2xl font-bold text-white shadow-card">
              {member.initials}
            </div>
            <h3 className="mt-4 font-display text-base font-semibold text-ink-900 dark:text-white">
              {member.name}
            </h3>
            <p className="text-sm font-medium text-primary">{member.role}</p>
            <p className="mt-2 text-xs leading-relaxed text-ink-400 dark:text-ink-100/60">
              {member.bio}
            </p>
          </div>
        </Reveal>
      ))}
    </div>
  );
}
