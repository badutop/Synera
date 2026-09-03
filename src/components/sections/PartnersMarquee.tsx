"use client";

import Image from "next/image";
import { Section } from "@/components/ui/Section";
import { useLanguage } from "@/components/providers/LanguageProvider";

const partners = [
  { name: "COMSEC", logo: "/images/partners/comsec.png" },
  { name: "SpinTech", logo: "/images/partners/spintech.png" },
  { name: "SmarTek", logo: "/images/partners/smartek.png" },
  { name: "Sierra Logistics", logo: "/images/partners/sierra-logistics.png" },
  { name: "Water Ô", logo: "/images/partners/watero.png" },
];

export function PartnersMarquee() {
  const { content } = useLanguage();

  return (
    <Section className="py-14 sm:py-16">
      <p className="text-center text-sm font-semibold uppercase tracking-widest text-ink-400 dark:text-ink-100/50">
        {content.home.partners.title}
      </p>
      <div className="mt-8 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-5">
        {partners.map((partner) => (
          <div
            key={partner.name}
            className="flex h-20 items-center justify-center rounded-xl bg-white p-4 shadow-card"
          >
            <div className="relative h-full w-full">
              <Image
                src={partner.logo}
                alt={partner.name}
                fill
                className="object-contain"
                sizes="160px"
              />
            </div>
          </div>
        ))}
      </div>
    </Section>
  );
}
