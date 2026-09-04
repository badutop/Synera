"use client";

import Image from "next/image";
import { Section } from "@/components/ui/Section";
import { useLanguage } from "@/components/providers/LanguageProvider";

const partners = [
  { name: "COMSEC", logo: "/images/partners/comsec.png", width: 1214, height: 322 },
  { name: "SpinTech", logo: "/images/partners/spintech.png", width: 250, height: 86 },
  { name: "SmarTek", logo: "/images/partners/smartek.png", width: 1191, height: 360 },
  {
    name: "Sierra Logistics",
    logo: "/images/partners/sierra-logistics.png",
    width: 184,
    height: 89,
  },
  { name: "Water Ô", logo: "/images/partners/watero.png", width: 502, height: 130 },
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
            <Image
              src={partner.logo}
              alt={partner.name}
              width={partner.width}
              height={partner.height}
              className="h-11 w-auto object-contain"
            />
          </div>
        ))}
      </div>
    </Section>
  );
}
