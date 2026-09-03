"use client";

import { useEffect, useState } from "react";
import Link from "next/link";
import { usePathname } from "next/navigation";
import { Menu } from "lucide-react";
import { useLanguage } from "@/components/providers/LanguageProvider";
import { Logo } from "@/components/ui/Logo";
import { cn } from "@/lib/utils";
import { ThemeToggle } from "./ThemeToggle";
import { LanguageToggle } from "./LanguageToggle";
import { MobileMenu } from "./MobileMenu";

export function Header() {
  const { content } = useLanguage();
  const pathname = usePathname();
  const [scrolled, setScrolled] = useState(false);
  const [menuOpen, setMenuOpen] = useState(false);

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 12);
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  return (
    <header
      className={cn(
        "sticky top-0 z-40 w-full transition-all duration-300",
        scrolled
          ? "border-b border-ink-900/8 bg-white/85 backdrop-blur-md dark:border-white/10 dark:bg-ink-900/85"
          : "border-b border-transparent bg-white dark:bg-ink-900"
      )}
    >
      <div className="mx-auto flex h-20 w-full max-w-content items-center justify-between px-5 sm:px-8">
        <Link
          href="/"
          className="-ml-1 shrink-0 sm:-ml-2"
          aria-label="SYNERA Group — Accueil"
        >
          <Logo size="lg" />
        </Link>

        <div className="flex items-center gap-6">
          <nav
            className="hidden items-center gap-0.5 xl:flex"
            aria-label="Navigation principale"
          >
            {content.nav.links.map((link) => {
              const active =
                link.href === "/" ? pathname === "/" : pathname.startsWith(link.href);
              return (
                <Link
                  key={link.href}
                  href={link.href}
                  className={cn(
                    "whitespace-nowrap rounded-full px-3 py-2 text-sm font-semibold transition-colors",
                    active
                      ? "bg-primary text-white shadow-soft"
                      : "font-medium text-ink-700 hover:bg-primary-50 hover:text-primary dark:text-ink-100/80 dark:hover:bg-primary-500/10 dark:hover:text-primary-300"
                  )}
                >
                  {link.label}
                </Link>
              );
            })}
          </nav>

          <div className="hidden items-center gap-2 xl:flex">
            <LanguageToggle />
            <ThemeToggle />
          </div>
          <div className="flex items-center gap-1 xl:hidden">
            <ThemeToggle />
            <button
              type="button"
              onClick={() => setMenuOpen(true)}
              aria-label="Ouvrir le menu"
              className="flex h-9 w-9 items-center justify-center rounded-full hover:bg-ink-900/5 dark:hover:bg-white/10"
            >
              <Menu className="h-5 w-5 text-ink-900 dark:text-white" />
            </button>
          </div>
        </div>
      </div>

      <MobileMenu open={menuOpen} onClose={() => setMenuOpen(false)} />
    </header>
  );
}
