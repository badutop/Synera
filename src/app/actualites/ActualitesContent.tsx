"use client";

import Link from "next/link";
import Image from "next/image";
import { ArrowLeft, Calendar, Clock } from "lucide-react";
import { blogPosts, categories } from "@/data/blog";
import { Container } from "@/components/ui/Container";
import { Reveal } from "@/components/ui/Reveal";
import { Badge } from "@/components/ui/Badge";
import { formatDate } from "@/lib/date";
import { useLanguage } from "@/components/providers/LanguageProvider";

export function ActualitesContent() {
  const { locale, content } = useLanguage();
  const t = content.blog;

  return (
    <>
      <section className="bg-ink-50 py-14 dark:bg-ink-800/20 sm:py-20">
        <Container className="grid grid-cols-1 items-center gap-12 lg:grid-cols-2">
          <Reveal>
            <Link
              href="/"
              className="mb-4 inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:underline"
            >
              <ArrowLeft className="h-3.5 w-3.5" />
              {content.common.backToHome}
            </Link>
            <p className="mb-3 text-sm font-semibold uppercase tracking-widest text-primary">
              {t.hero.eyebrow}
            </p>
            <h1 className="font-display text-4xl font-bold text-ink-900 text-balance dark:text-white sm:text-5xl">
              {t.hero.title}
            </h1>
            <div className="mt-8 flex flex-wrap gap-2">
              {categories[locale].map((category) => (
                <span
                  key={category}
                  className="rounded-full border border-ink-900/10 px-3.5 py-1.5 text-xs font-medium text-ink-700 dark:border-white/10 dark:text-ink-100/80"
                >
                  {category}
                </span>
              ))}
            </div>
          </Reveal>
          <Reveal delay={0.15} className="relative aspect-[4/3] w-full overflow-hidden rounded-3xl shadow-soft">
            <Image
              src="https://images.unsplash.com/photo-1573497619951-6c9477fb83b4?auto=format&fit=crop&w=1200&q=80"
              alt={t.hero.imageAlt}
              fill
              className="object-cover"
              sizes="(min-width: 1024px) 45vw, 90vw"
            />
          </Reveal>
        </Container>
      </section>

      <section className="py-20 sm:py-24">
        <Container>
          <div className="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            {blogPosts[locale].map((post, i) => (
              <Reveal key={post.slug} delay={i * 0.08}>
                <Link href={`/actualites/${post.slug}`} className="group block h-full">
                  <article className="flex h-full flex-col overflow-hidden rounded-2xl border border-ink-900/8 bg-white shadow-card transition-all duration-300 hover:-translate-y-1 hover:shadow-soft dark:border-white/10 dark:bg-white/[0.03]">
                    <div className="relative aspect-[16/10] w-full overflow-hidden">
                      <Image
                        src={post.coverImage}
                        alt={post.title}
                        fill
                        className="object-cover transition-transform duration-500 group-hover:scale-105"
                        sizes="(min-width: 1024px) 33vw, 90vw"
                      />
                    </div>
                    <div className="flex flex-1 flex-col p-6">
                      <Badge className="w-fit">{post.category}</Badge>
                      <h2 className="mt-4 font-display text-lg font-semibold leading-snug text-ink-900 dark:text-white">
                        {post.title}
                      </h2>
                      <p className="mt-2.5 flex-1 text-sm leading-relaxed text-ink-400 dark:text-ink-100/70">
                        {post.excerpt}
                      </p>
                      <div className="mt-5 flex items-center gap-4 text-xs text-ink-400 dark:text-ink-100/50">
                        <span className="flex items-center gap-1.5">
                          <Calendar className="h-3.5 w-3.5" />
                          {formatDate(post.date, locale === "fr" ? "fr-FR" : "en-US")}
                        </span>
                        <span className="flex items-center gap-1.5">
                          <Clock className="h-3.5 w-3.5" />
                          {post.readingTime}
                        </span>
                      </div>
                    </div>
                  </article>
                </Link>
              </Reveal>
            ))}
          </div>
        </Container>
      </section>
    </>
  );
}
