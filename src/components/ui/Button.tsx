import type { AnchorHTMLAttributes, ButtonHTMLAttributes, ReactNode } from "react";
import Link from "next/link";
import { cn } from "@/lib/utils";

const base =
  "inline-flex items-center justify-center gap-2 rounded-full font-semibold transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 focus-visible:ring-offset-white dark:focus-visible:ring-offset-ink-900 disabled:opacity-50 disabled:pointer-events-none";

const variants = {
  primary:
    "bg-primary text-white hover:bg-primary-600 shadow-soft hover:shadow-none hover:-translate-y-0.5",
  secondary:
    "bg-ink-900 text-white hover:bg-ink-700 dark:bg-white dark:text-ink-900 dark:hover:bg-ink-100",
  outline:
    "border border-ink-900/15 text-ink-900 hover:border-primary hover:text-primary dark:border-white/20 dark:text-white dark:hover:border-primary-300 dark:hover:text-primary-300",
  ghost:
    "text-ink-900 hover:bg-ink-900/5 dark:text-white dark:hover:bg-white/10",
};

const sizes = {
  sm: "px-4 py-2 text-sm",
  md: "px-6 py-3 text-base",
  lg: "px-8 py-4 text-base",
};

interface CommonProps {
  variant?: keyof typeof variants;
  size?: keyof typeof sizes;
  className?: string;
  children: ReactNode;
}

type ButtonAsButton = CommonProps &
  ButtonHTMLAttributes<HTMLButtonElement> & { href?: undefined };

type ButtonAsLink = CommonProps &
  AnchorHTMLAttributes<HTMLAnchorElement> & { href: string };

export function Button(props: ButtonAsButton | ButtonAsLink) {
  const { variant = "primary", size = "md", className, children, ...rest } =
    props;
  const classes = cn(base, variants[variant], sizes[size], className);

  if ("href" in props && props.href) {
    const { href, ...anchorRest } = rest as AnchorHTMLAttributes<HTMLAnchorElement>;
    const isExternal = props.href.startsWith("http");
    if (isExternal) {
      return (
        <a
          href={props.href}
          className={classes}
          target="_blank"
          rel="noopener noreferrer"
          {...anchorRest}
        >
          {children}
        </a>
      );
    }
    return (
      <Link href={props.href} className={classes} {...anchorRest}>
        {children}
      </Link>
    );
  }

  return (
    <button className={classes} {...(rest as ButtonHTMLAttributes<HTMLButtonElement>)}>
      {children}
    </button>
  );
}
