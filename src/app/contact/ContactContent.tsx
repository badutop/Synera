"use client";

import Image from "next/image";
import { Clock, Linkedin, Mail, MapPin, Phone } from "lucide-react";
import { Container } from "@/components/ui/Container";
import { Reveal } from "@/components/ui/Reveal";
import { ContactForm } from "@/components/forms/ContactForm";
import { useLanguage } from "@/components/providers/LanguageProvider";

export function ContactContent({ defaultSubject }: { defaultSubject?: string }) {
  const { content } = useLanguage();
  const t = content.contact;

  return (
    <>
      <section className="bg-ink-50 py-20 dark:bg-ink-800/20 sm:py-28">
        <Container className="grid grid-cols-1 items-center gap-12 lg:grid-cols-2">
          <Reveal>
            <p className="mb-3 text-sm font-semibold uppercase tracking-widest text-primary">
              {t.hero.eyebrow}
            </p>
            <h1 className="font-display text-4xl font-bold text-ink-900 text-balance dark:text-white sm:text-5xl">
              {t.hero.title}
            </h1>
            <p className="mt-6 text-lg leading-relaxed text-ink-400 dark:text-ink-100/70">
              {t.hero.description}
            </p>
          </Reveal>
          <Reveal delay={0.15} className="relative aspect-[4/3] w-full overflow-hidden rounded-3xl shadow-soft">
            <Image
              src="https://images.unsplash.com/photo-1766066014237-00645c74e9c6?auto=format&fit=crop&w=1200&q=80"
              alt={t.hero.imageAlt}
              fill
              className="object-cover"
              sizes="(min-width: 1024px) 45vw, 90vw"
            />
          </Reveal>
        </Container>
      </section>

      <section className="py-20 sm:py-28">
        <Container>
          <div className="grid grid-cols-1 gap-16 lg:grid-cols-[1fr_1.2fr]">
            <Reveal>
              <ul className="mt-2 space-y-5">
              <li className="flex items-start gap-3">
                <MapPin className="mt-0.5 h-5 w-5 shrink-0 text-primary" />
                <div className="text-sm">
                  <p className="font-medium text-ink-900 dark:text-white">{t.hq.city}</p>
                  <p className="text-ink-400 dark:text-ink-100/60">
                    {t.hq.role} — {t.addressPending}
                  </p>
                </div>
              </li>
              <li className="flex items-start gap-3">
                <MapPin className="mt-0.5 h-5 w-5 shrink-0 text-primary" />
                <div className="text-sm">
                  <p className="font-medium text-ink-900 dark:text-white">{t.branch.city}</p>
                  <p className="text-ink-400 dark:text-ink-100/60">
                    {t.branch.role} — {t.addressPending}
                  </p>
                </div>
              </li>
              <li className="flex items-start gap-3">
                <Mail className="mt-0.5 h-5 w-5 shrink-0 text-primary" />
                <a
                  href="mailto:contact@synera-group.com"
                  className="text-sm font-medium text-ink-900 hover:text-primary dark:text-white"
                >
                  contact@synera-group.com
                </a>
              </li>
              <li className="flex items-start gap-3">
                <Phone className="mt-0.5 h-5 w-5 shrink-0 text-primary" />
                <a
                  href="tel:+33100000000"
                  className="text-sm font-medium text-ink-900 hover:text-primary dark:text-white"
                >
                  +33 1 00 00 00 00 <span className="text-ink-400">{t.phonePending}</span>
                </a>
              </li>
              <li className="flex items-start gap-3">
                <Clock className="mt-0.5 h-5 w-5 shrink-0 text-primary" />
                <p className="text-sm text-ink-900 dark:text-white">{t.hoursLabel}</p>
              </li>
              <li className="flex items-start gap-3">
                <Linkedin className="mt-0.5 h-5 w-5 shrink-0 text-primary" />
                <a href="#" className="text-sm font-medium text-ink-900 hover:text-primary dark:text-white">
                  {t.linkedinLabel} <span className="text-ink-400">{t.linkedinPending}</span>
                </a>
              </li>
            </ul>

            <div className="mt-10 aspect-video w-full overflow-hidden rounded-2xl border border-ink-900/8 dark:border-white/10">
              <iframe
                title={t.mapTitle}
                src="https://www.openstreetmap.org/export/embed.html?bbox=2.2241%2C48.8156%2C2.4699%2C48.9022&layer=mapnik&marker=48.8566%2C2.3522"
                className="h-full w-full grayscale"
                loading="lazy"
              />
            </div>
          </Reveal>

          <Reveal delay={0.1}>
            <div className="rounded-2xl border border-ink-900/8 bg-white p-6 shadow-card dark:border-white/10 dark:bg-white/[0.03] sm:p-8">
              <ContactForm defaultSubject={defaultSubject} />
            </div>
          </Reveal>
        </div>
      </Container>
      </section>
    </>
  );
}
