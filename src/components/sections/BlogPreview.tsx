"use client";

import Link from "next/link";
import Image from "next/image";
import { ArrowRight, Calendar } from "lucide-react";
import { blogPosts } from "@/data/blog";
import { Section, SectionHeading } from "@/components/ui/Section";
import { Badge } from "@/components/ui/Badge";
import { Reveal } from "@/components/ui/Reveal";
import { formatDate } from "@/lib/date";
import { useLanguage } from "@/components/providers/LanguageProvider";

export function BlogPreview() {
  const { locale, content } = useLanguage();
  const t = content.home.blogPreview;
  const posts = blogPosts[locale].slice(0, 3);

  return (
    <Section>
      <div className="flex flex-col items-start justify-between gap-6 sm:flex-row sm:items-end">
        <SectionHeading eyebrow={t.eyebrow} title={t.title} description={t.description} />
        <Link
          href="/actualites"
          className="inline-flex shrink-0 items-center gap-1.5 text-sm font-semibold text-primary hover:underline"
        >
          {t.viewAll}
          <ArrowRight className="h-3.5 w-3.5" />
        </Link>
      </div>

      <div className="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        {posts.map((post, i) => (
          <Reveal key={post.slug} delay={i * 0.1}>
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
                  <h3 className="mt-4 font-display text-lg font-semibold leading-snug text-ink-900 dark:text-white">
                    {post.title}
                  </h3>
                  <p className="mt-2.5 flex-1 text-sm leading-relaxed text-ink-400 dark:text-ink-100/70">
                    {post.excerpt}
                  </p>
                  <div className="mt-5 flex items-center gap-1.5 text-xs text-ink-400 dark:text-ink-100/50">
                    <Calendar className="h-3.5 w-3.5" />
                    {formatDate(post.date, locale === "fr" ? "fr-FR" : "en-US")}
                  </div>
                </div>
              </article>
            </Link>
          </Reveal>
        ))}
      </div>
    </Section>
  );
}
