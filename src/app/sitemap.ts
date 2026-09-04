import type { MetadataRoute } from "next";
import { blogPosts } from "@/data/blog";

const BASE_URL = "https://www.synera-group.com";

export default function sitemap(): MetadataRoute.Sitemap {
  const staticRoutes = [
    "",
    "/identite",
    "/solutions",
    "/approche",
    "/secteurs",
    "/actualites",
    "/contact",
  ].map((path) => ({
    url: `${BASE_URL}${path}`,
    lastModified: new Date(),
    changeFrequency: "weekly" as const,
    priority: path === "" ? 1 : 0.8,
  }));

  const articleRoutes = blogPosts.fr.map((post) => ({
    url: `${BASE_URL}/actualites/${post.slug}`,
    lastModified: new Date(post.date),
    changeFrequency: "monthly" as const,
    priority: 0.6,
  }));

  const legalRoutes = ["/mentions-legales", "/politique-confidentialite"].map(
    (path) => ({
      url: `${BASE_URL}${path}`,
      lastModified: new Date(),
      changeFrequency: "yearly" as const,
      priority: 0.3,
    })
  );

  return [...staticRoutes, ...articleRoutes, ...legalRoutes];
}
