"use client";

import Link from "next/link";
import { Linkedin, Mail, MapPin, Phone } from "lucide-react";
import { useLanguage } from "@/components/providers/LanguageProvider";
import { Logo } from "@/components/ui/Logo";
import { Container } from "@/components/ui/Container";
import { poles } from "@/data/solutions";

export function Footer() {
  const { content, locale } = useLanguage();
  const year = new Date().getFullYear();

  return (
    <footer className="border-t border-ink-900/8 bg-ink-50 dark:border-white/10 dark:bg-ink-900">
      <Container className="py-16">
        <div className="grid grid-cols-1 gap-12 md:grid-cols-[1.4fr_1fr_1fr_1.2fr]">
          <div>
            <Logo size="md" />
            <p className="mt-4 max-w-xs text-sm leading-relaxed text-ink-400 dark:text-ink-100/70">
              {content.footer.description}
            </p>
            <div className="mt-6 flex items-center gap-3">
              <a
                href="#"
                aria-label="LinkedIn SYNERA Group"
                className="flex h-9 w-9 items-center justify-center rounded-full border border-ink-900/10 text-ink-700 transition-colors hover:border-primary hover:text-primary dark:border-white/15 dark:text-ink-100"
              >
                <Linkedin className="h-4 w-4" />
              </a>
            </div>
          </div>

          <div>
            <h3 className="font-display text-sm font-semibold uppercase tracking-wide text-ink-900 dark:text-white">
              {content.footer.columns.navigation}
            </h3>
            <ul className="mt-4 space-y-2.5">
              {content.nav.links.map((link) => (
                <li key={link.href}>
                  <Link
                    href={link.href}
                    className="text-sm text-ink-400 transition-colors hover:text-primary dark:text-ink-100/70 dark:hover:text-primary-300"
                  >
                    {link.label}
                  </Link>
                </li>
              ))}
            </ul>
          </div>

          <div>
            <h3 className="font-display text-sm font-semibold uppercase tracking-wide text-ink-900 dark:text-white">
              {content.footer.columns.solutions}
            </h3>
            <ul className="mt-4 space-y-2.5">
              {poles[locale].map((pole) => (
                <li key={pole.slug}>
                  <Link
                    href={`/solutions#${pole.slug}`}
                    className="text-sm text-ink-400 transition-colors hover:text-primary dark:text-ink-100/70 dark:hover:text-primary-300"
                  >
                    {pole.shortTitle}
                  </Link>
                </li>
              ))}
            </ul>
          </div>

          <div>
            <h3 className="font-display text-sm font-semibold uppercase tracking-wide text-ink-900 dark:text-white">
              {content.footer.columns.contact}
            </h3>
            <ul className="mt-4 space-y-3 text-sm text-ink-400 dark:text-ink-100/70">
              <li className="flex items-start gap-2.5">
                <MapPin className="mt-0.5 h-4 w-4 shrink-0 text-primary" />
                <span>{content.footer.hqLine}</span>
              </li>
              <li className="flex items-start gap-2.5">
                <Mail className="mt-0.5 h-4 w-4 shrink-0 text-primary" />
                <a href="mailto:contact@synera-group.com" className="hover:text-primary">
                  contact@synera-group.com
                </a>
              </li>
              <li className="flex items-start gap-2.5">
                <Phone className="mt-0.5 h-4 w-4 shrink-0 text-primary" />
                <a href="tel:+221777770000" className="hover:text-primary">
                  {content.footer.phone}
                </a>
              </li>
            </ul>
          </div>
        </div>

        <div className="mt-14 rounded-2xl border border-ink-900/8 bg-white p-6 dark:border-white/10 dark:bg-white/[0.03] sm:p-8">
          <div className="flex flex-col items-start justify-between gap-5 sm:flex-row sm:items-center">
            <div>
              <h3 className="font-display text-lg font-semibold text-ink-900 dark:text-white">
                {content.footer.newsletter.title}
              </h3>
              <p className="mt-1 text-sm text-ink-400 dark:text-ink-100/70">
                {content.footer.newsletter.description}
              </p>
            </div>
            <form
              className="flex w-full max-w-sm gap-2 sm:w-auto"
              onSubmit={(e) => e.preventDefault()}
            >
              <label htmlFor="newsletter-email" className="sr-only">
                {content.footer.newsletter.placeholder}
              </label>
              <input
                id="newsletter-email"
                type="email"
                required
                placeholder={content.footer.newsletter.placeholder}
                className="w-full rounded-full border border-ink-900/15 bg-transparent px-4 py-2.5 text-sm text-ink-900 outline-none transition-colors focus:border-primary dark:border-white/15 dark:text-white"
              />
              <button
                type="submit"
                className="shrink-0 rounded-full bg-primary px-5 py-2.5 text-sm font-semibold text-white transition-colors hover:bg-primary-600"
              >
                {content.footer.newsletter.cta}
              </button>
            </form>
          </div>
        </div>

        <div className="mt-10 flex flex-col items-center justify-between gap-4 border-t border-ink-900/8 pt-8 text-xs text-ink-400 dark:border-white/10 dark:text-ink-100/60 sm:flex-row">
          <p>
            © {year} SYNERA Group. {content.footer.legal}
          </p>
          <div className="flex items-center gap-5">
            {content.footer.legalLinks.map((link) => (
              <a key={link.label} href={link.href} className="hover:text-primary">
                {link.label}
              </a>
            ))}
          </div>
        </div>
      </Container>
    </footer>
  );
}
