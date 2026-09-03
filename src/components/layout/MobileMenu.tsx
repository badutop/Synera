"use client";

import { useEffect } from "react";
import Link from "next/link";
import { usePathname } from "next/navigation";
import { AnimatePresence, motion } from "framer-motion";
import { X } from "lucide-react";
import { useLanguage } from "@/components/providers/LanguageProvider";
import { Button } from "@/components/ui/Button";
import { ThemeToggle } from "./ThemeToggle";
import { LanguageToggle } from "./LanguageToggle";

export function MobileMenu({
  open,
  onClose,
}: {
  open: boolean;
  onClose: () => void;
}) {
  const { content } = useLanguage();
  const pathname = usePathname();

  useEffect(() => {
    onClose();
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [pathname]);

  useEffect(() => {
    document.body.style.overflow = open ? "hidden" : "";
    return () => {
      document.body.style.overflow = "";
    };
  }, [open]);

  return (
    <AnimatePresence>
      {open && (
        <motion.div
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          exit={{ opacity: 0 }}
          className="fixed inset-0 z-50 bg-ink-900/40 backdrop-blur-sm md:hidden"
          onClick={onClose}
        >
          <motion.div
            initial={{ x: "100%" }}
            animate={{ x: 0 }}
            exit={{ x: "100%" }}
            transition={{ type: "tween", duration: 0.3, ease: [0.22, 1, 0.36, 1] }}
            className="ml-auto flex h-full w-[85%] max-w-sm flex-col bg-white px-6 py-6 dark:bg-ink-900"
            onClick={(e) => e.stopPropagation()}
          >
            <div className="flex items-center justify-between">
              <LanguageToggle />
              <div className="flex items-center gap-1">
                <ThemeToggle />
                <button
                  type="button"
                  onClick={onClose}
                  aria-label="Fermer le menu"
                  className="flex h-9 w-9 items-center justify-center rounded-full hover:bg-ink-900/5 dark:hover:bg-white/10"
                >
                  <X className="h-5 w-5 text-ink-900 dark:text-white" />
                </button>
              </div>
            </div>

            <nav className="mt-10 flex flex-col gap-1" aria-label="Navigation principale">
              {content.nav.links.map((link) => (
                <Link
                  key={link.href}
                  href={link.href}
                  className="rounded-lg px-3 py-3 font-display text-xl font-semibold text-ink-900 transition-colors hover:bg-primary-50 hover:text-primary dark:text-white dark:hover:bg-white/5"
                >
                  {link.label}
                </Link>
              ))}
            </nav>

            <div className="mt-auto pt-8">
              <Button href="/contact" className="w-full">
                {content.nav.cta}
              </Button>
            </div>
          </motion.div>
        </motion.div>
      )}
    </AnimatePresence>
  );
}
