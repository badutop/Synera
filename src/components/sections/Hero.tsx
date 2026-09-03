"use client";

import Image from "next/image";
import { motion } from "framer-motion";
import { ArrowRight, Globe2 } from "lucide-react";
import { Button } from "@/components/ui/Button";
import { Container } from "@/components/ui/Container";
import { Badge } from "@/components/ui/Badge";
import { useLanguage } from "@/components/providers/LanguageProvider";

export function Hero() {
  const { content } = useLanguage();
  const t = content.home.hero;

  return (
    <section className="relative overflow-hidden bg-ink-50 dark:bg-ink-900">
      <div
        aria-hidden="true"
        className="pointer-events-none absolute -right-40 -top-40 h-[560px] w-[560px] rounded-full bg-gradient-brand opacity-20 blur-3xl"
      />
      <Container className="relative grid grid-cols-1 items-center gap-14 py-14 sm:py-20 lg:grid-cols-2 lg:py-24">
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.7, ease: [0.22, 1, 0.36, 1] }}
        >
          <Badge className="mb-6">
            <Globe2 className="mr-1.5 h-3.5 w-3.5" />
            {t.badge}
          </Badge>
          <h1 className="font-display text-4xl font-bold leading-[1.1] text-ink-900 text-balance dark:text-white sm:text-5xl lg:text-6xl">
            {t.titleLine} <span className="text-primary">{t.titleHighlight}</span>.
          </h1>
          <p className="mt-6 max-w-xl text-lg leading-relaxed text-ink-400 dark:text-ink-100/70">
            {t.description}
          </p>
          <div className="mt-9 flex flex-col gap-3 sm:flex-row">
            <Button href="/contact" size="lg">
              {t.ctaPrimary}
              <ArrowRight className="h-4 w-4" />
            </Button>
            <Button href="/solutions" variant="outline" size="lg">
              {t.ctaSecondary}
            </Button>
          </div>
        </motion.div>

        <motion.div
          initial={{ opacity: 0, scale: 0.96 }}
          animate={{ opacity: 1, scale: 1 }}
          transition={{ duration: 0.8, delay: 0.15, ease: [0.22, 1, 0.36, 1] }}
          className="relative"
        >
          <div className="relative aspect-[4/3] w-full overflow-hidden rounded-3xl shadow-soft">
            <Image
              src="/images/accueil.jpeg"
              alt={t.imageAlt}
              fill
              priority
              quality={100}
              className="object-cover"
              sizes="(min-width: 1024px) 40vw, 90vw"
            />
          </div>
          <div className="absolute -bottom-6 -left-6 hidden rounded-2xl bg-white p-5 shadow-soft dark:bg-ink-800 sm:block">
            <p className="font-display text-2xl font-bold text-primary">
              {t.statCardValue}
            </p>
            <p className="max-w-[160px] text-xs text-ink-400 dark:text-ink-100/70">
              {t.statCardLabel}
            </p>
          </div>
        </motion.div>
      </Container>
    </section>
  );
}
