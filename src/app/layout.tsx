import type { Metadata } from "next";
import { Space_Grotesk, Inter } from "next/font/google";
import { ThemeProvider } from "@/components/providers/ThemeProvider";
import { LanguageProvider } from "@/components/providers/LanguageProvider";
import { Header } from "@/components/layout/Header";
import { Footer } from "@/components/layout/Footer";
import "./globals.css";

const spaceGrotesk = Space_Grotesk({
  subsets: ["latin"],
  variable: "--font-display",
  weight: ["500", "600", "700"],
});

const inter = Inter({
  subsets: ["latin"],
  variable: "--font-sans",
});

export const metadata: Metadata = {
  metadataBase: new URL("https://www.synera-group.com"),
  title: {
    default: "SYNERA Group | Intermédiation, études et accompagnement de projets",
    template: "%s | SYNERA Group",
  },
  description:
    "SYNERA Group connecte entreprises, investisseurs et institutions aux bons interlocuteurs, sécurise vos décisions par l'étude et pilote vos projets jusqu'au résultat.",
  openGraph: {
    type: "website",
    locale: "fr_FR",
    siteName: "SYNERA Group",
    title: "SYNERA Group | Intermédiation, études et accompagnement de projets",
    description:
      "Le trait d'union entre vos ambitions et de nouveaux marchés : intermédiation d'affaires, études, accompagnement de projets et développement des compétences.",
  },
  twitter: {
    card: "summary_large_image",
    title: "SYNERA Group",
    description:
      "Intermédiation, études et accompagnement de projets pour vos ambitions internationales.",
  },
  icons: {
    icon: "/icon",
  },
};

export default function RootLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <html lang="fr" suppressHydrationWarning className={`${spaceGrotesk.variable} ${inter.variable}`}>
      <body className="flex min-h-screen flex-col font-sans">
        <ThemeProvider>
          <LanguageProvider>
            <script
              type="application/ld+json"
              // eslint-disable-next-line react/no-danger
              dangerouslySetInnerHTML={{
                __html: JSON.stringify({
                  "@context": "https://schema.org",
                  "@type": "Organization",
                  name: "SYNERA Group",
                  description:
                    "Société d'intermédiation, d'études et d'accompagnement de projets.",
                  url: "https://www.synera-group.com",
                  logo: "https://www.synera-group.com/logo/synera-mark.svg",
                  sameAs: [],
                }),
              }}
            />
            <Header />
            <main className="flex-1">{children}</main>
            <Footer />
          </LanguageProvider>
        </ThemeProvider>
      </body>
    </html>
  );
}
