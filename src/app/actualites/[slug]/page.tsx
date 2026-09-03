import type { Metadata } from "next";
import { blogPosts, getPostBySlug } from "@/data/blog";
import { ArticleContent } from "./ArticleContent";

interface PageProps {
  params: Promise<{ slug: string }>;
}

export function generateStaticParams() {
  return blogPosts.fr.map((post) => ({ slug: post.slug }));
}

export async function generateMetadata({ params }: PageProps): Promise<Metadata> {
  const { slug } = await params;
  const post = getPostBySlug("fr", slug);
  if (!post) return {};
  return {
    title: post.title,
    description: post.excerpt,
    openGraph: {
      title: post.title,
      description: post.excerpt,
      images: [post.coverImage],
      type: "article",
      publishedTime: post.date,
    },
  };
}

export default async function ArticlePage({ params }: PageProps) {
  const { slug } = await params;
  return <ArticleContent slug={slug} />;
}
