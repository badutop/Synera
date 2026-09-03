"use client";

import Image from "next/image";
import Link from "next/link";
import { notFound } from "next/navigation";
import { ArrowLeft, Calendar, Clock, User } from "lucide-react";
import { getPostBySlug } from "@/data/blog";
import { Container } from "@/components/ui/Container";
import { Badge } from "@/components/ui/Badge";
import { Reveal } from "@/components/ui/Reveal";
import { CtaBand } from "@/components/sections/CtaBand";
import { formatDate } from "@/lib/date";
import { useLanguage } from "@/components/providers/LanguageProvider";

export function ArticleContent({ slug }: { slug: string }) {
  const { locale, content } = useLanguage();
  const post = getPostBySlug(locale, slug);
  if (!post) notFound();

  return (
    <>
      <article className="py-16 sm:py-20">
        <Container className="max-w-3xl">
          <Link
            href="/actualites"
            className="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:underline"
          >
            <ArrowLeft className="h-3.5 w-3.5" />
            {content.common.backToBlog}
          </Link>

          <Reveal className="mt-6">
            <Badge>{post.category}</Badge>
            <h1 className="mt-4 font-display text-3xl font-bold leading-tight text-ink-900 text-balance dark:text-white sm:text-4xl">
              {post.title}
            </h1>
            <div className="mt-5 flex flex-wrap items-center gap-5 text-sm text-ink-400 dark:text-ink-100/60">
              <span className="flex items-center gap-1.5">
                <User className="h-4 w-4" />
                {post.author}
              </span>
              <span className="flex items-center gap-1.5">
                <Calendar className="h-4 w-4" />
                {formatDate(post.date, locale === "fr" ? "fr-FR" : "en-US")}
              </span>
              <span className="flex items-center gap-1.5">
                <Clock className="h-4 w-4" />
                {post.readingTime} {content.blog.readingTimeSuffix}
              </span>
            </div>
          </Reveal>

          <Reveal delay={0.1} className="relative mt-8 aspect-[16/9] w-full overflow-hidden rounded-2xl shadow-soft">
            <Image
              src={post.coverImage}
              alt={post.title}
              fill
              priority
              className="object-cover"
              sizes="(min-width: 1024px) 768px, 90vw"
            />
          </Reveal>

          <div className="prose prose-lg mt-10 max-w-none prose-headings:font-display prose-headings:font-semibold prose-headings:text-ink-900 prose-p:leading-relaxed prose-p:text-ink-400 dark:prose-invert dark:prose-headings:text-white dark:prose-p:text-ink-100/75">
            {post.content.map((section, i) => (
              <div key={i}>
                {section.heading && <h2>{section.heading}</h2>}
                {section.paragraphs.map((p, j) => (
                  <p key={j}>{p}</p>
                ))}
              </div>
            ))}
          </div>
        </Container>
      </article>

      <CtaBand />
    </>
  );
}
