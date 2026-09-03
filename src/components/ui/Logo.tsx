import { cn } from "@/lib/utils";

interface LogoProps {
  className?: string;
  size?: "sm" | "md" | "lg";
}

/**
 * Wordmark recréé à partir du logo source (SYNERA | Group, lettrage pochoir violet)
 * en disposition horizontale. Fonctionne en SVG/texte pur, donc lisible sur fond clair
 * ET sombre sans le carré blanc du fichier JPEG d'origine.
 * À remplacer par le fichier vectoriel officiel dès qu'il sera disponible
 * (voir public/logo/ et le README).
 */
const sizes = {
  sm: { mark: "text-lg", sub: "text-lg", bar: "h-4" },
  md: { mark: "text-xl", sub: "text-xl", bar: "h-5" },
  lg: { mark: "text-3xl", sub: "text-3xl", bar: "h-7" },
};

export function Logo({ className, size = "md" }: LogoProps) {
  const s = sizes[size];
  return (
    <span
      className={cn(
        "inline-flex items-center gap-2.5 font-display font-bold leading-none",
        className
      )}
      aria-label="SYNERA Group"
    >
      <span className={cn("uppercase tracking-wide text-primary", s.mark)}>
        Synera
      </span>
      <span className={cn("w-px bg-primary/60", s.bar)} aria-hidden="true" />
      <span className={cn("font-medium text-ink-700 dark:text-ink-50", s.sub)}>
        Group
      </span>
    </span>
  );
}
