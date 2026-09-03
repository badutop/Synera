"use client";

import { useLanguage } from "@/components/providers/LanguageProvider";
import { cn } from "@/lib/utils";

export function LanguageToggle({ className }: { className?: string }) {
  const { locale, setLocale } = useLanguage();

  return (
    <div
      className={cn(
        "flex items-center rounded-full border border-ink-900/10 p-0.5 text-xs font-semibold dark:border-white/15",
        className
      )}
      role="group"
      aria-label="Choix de la langue"
    >
      {(["fr", "en"] as const).map((l) => (
        <button
          key={l}
          type="button"
          onClick={() => setLocale(l)}
          aria-pressed={locale === l}
          className={cn(
            "rounded-full px-2.5 py-1 uppercase transition-colors",
            locale === l
              ? "bg-primary text-white"
              : "text-ink-400 hover:text-ink-900 dark:text-ink-100/60 dark:hover:text-white"
          )}
        >
          {l}
        </button>
      ))}
    </div>
  );
}
