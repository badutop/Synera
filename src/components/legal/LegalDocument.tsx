"use client";

import { Container } from "@/components/ui/Container";
import { Reveal } from "@/components/ui/Reveal";
import { slugify } from "@/lib/utils";

export interface LegalSection {
  heading: string;
  paragraphs?: string[];
  items?: string[];
  paragraphsAfter?: string[];
}

interface LegalDocumentProps {
  eyebrow: string;
  title: string;
  updatedLabel: string;
  updatedAt: string;
  tocLabel: string;
  sections: LegalSection[];
}

export function LegalDocument({
  eyebrow,
  title,
  updatedLabel,
  updatedAt,
  tocLabel,
  sections,
}: LegalDocumentProps) {
  return (
    <>
      <section className="border-b border-ink-900/8 bg-ink-50 py-14 dark:border-white/10 dark:bg-ink-800/20 sm:py-20">
        <Container>
          <Reveal className="max-w-2xl">
            <p className="mb-3 text-sm font-semibold uppercase tracking-widest text-primary">
              {eyebrow}
            </p>
            <h1 className="font-display text-3xl font-bold text-ink-900 text-balance dark:text-white sm:text-4xl">
              {title}
            </h1>
            <p className="mt-4 text-sm text-ink-400 dark:text-ink-100/60">
              {updatedLabel} {updatedAt}
            </p>
          </Reveal>
        </Container>
      </section>

      <section className="py-14 sm:py-20">
        <Container>
          <div className="grid grid-cols-1 gap-12 lg:grid-cols-[240px_1fr]">
            <nav
              aria-label={tocLabel}
              className="hidden lg:block"
            >
              <div className="sticky top-28">
                <p className="mb-4 text-xs font-semibold uppercase tracking-widest text-ink-400 dark:text-ink-100/50">
                  {tocLabel}
                </p>
                <ul className="space-y-2.5 border-l border-ink-900/8 dark:border-white/10">
                  {sections.map((section) => (
                    <li key={section.heading}>
                      <a
                        href={`#${slugify(section.heading)}`}
                        className="block -ml-px border-l-2 border-transparent pl-4 text-sm text-ink-400 transition-colors hover:border-primary hover:text-primary dark:text-ink-100/60 dark:hover:text-primary-300"
                      >
                        {section.heading}
                      </a>
                    </li>
                  ))}
                </ul>
              </div>
            </nav>

            <div className="max-w-3xl space-y-12">
              {sections.map((section, i) => (
                <Reveal key={section.heading} delay={Math.min(i * 0.04, 0.3)}>
                  <div id={slugify(section.heading)} className="scroll-mt-28">
                    <h2 className="font-display text-xl font-semibold text-ink-900 dark:text-white">
                      {section.heading}
                    </h2>
                    <div className="mt-4 space-y-4 text-sm leading-relaxed text-ink-400 dark:text-ink-100/70">
                      {section.paragraphs?.map((p, j) => (
                        <p key={j}>{p}</p>
                      ))}
                      {section.items && (
                        <ul className="list-disc space-y-2 pl-5 marker:text-primary">
                          {section.items.map((item, j) => (
                            <li key={j}>{item}</li>
                          ))}
                        </ul>
                      )}
                      {section.paragraphsAfter?.map((p, j) => (
                        <p key={j}>{p}</p>
                      ))}
                    </div>
                  </div>
                </Reveal>
              ))}
            </div>
          </div>
        </Container>
      </section>
    </>
  );
}
