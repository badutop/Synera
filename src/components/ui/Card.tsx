import type { ReactNode } from "react";
import { cn } from "@/lib/utils";

export function Card({
  children,
  className,
}: {
  children: ReactNode;
  className?: string;
}) {
  return (
    <div
      className={cn(
        "rounded-2xl border border-ink-900/8 bg-white p-7 shadow-card transition-all duration-300 hover:-translate-y-1 hover:shadow-soft dark:border-white/10 dark:bg-white/[0.03]",
        className
      )}
    >
      {children}
    </div>
  );
}
