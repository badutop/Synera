"use client";

import { ArrowRight } from "lucide-react";
import { Button } from "@/components/ui/Button";
import { Container } from "@/components/ui/Container";
import { useLanguage } from "@/components/providers/LanguageProvider";

export function CtaBand() {
  const { content } = useLanguage();
  const t = content.home.cta;

  return (
    <section className="py-12 sm:py-16">
      <Container>
        <div className="relative overflow-hidden rounded-3xl bg-gradient-brand px-8 py-14 text-center sm:px-16 sm:py-20">
          <div
            aria-hidden="true"
            className="pointer-events-none absolute -left-24 -top-24 h-64 w-64 rounded-full bg-white/10 blur-3xl"
          />
          <h2 className="font-display text-3xl font-bold text-white text-balance sm:text-4xl">
            {t.title}
          </h2>
          <p className="mx-auto mt-4 max-w-xl text-white/80">{t.description}</p>
          <div className="mt-8 flex justify-center">
            <Button
              href="/contact"
              size="lg"
              className="bg-white text-primary hover:bg-white/90"
            >
              {t.button}
              <ArrowRight className="h-4 w-4" />
            </Button>
          </div>
        </div>
      </Container>
    </section>
  );
}
