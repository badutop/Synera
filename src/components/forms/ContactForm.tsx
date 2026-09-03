"use client";

import { useMemo, useState } from "react";
import { useForm } from "react-hook-form";
import { zodResolver } from "@hookform/resolvers/zod";
import { z } from "zod";
import { Loader2, CircleCheck, CircleAlert } from "lucide-react";
import { poles } from "@/data/solutions";
import { useLanguage } from "@/components/providers/LanguageProvider";
import type { SiteContent } from "@/components/providers/LanguageProvider";
import { cn } from "@/lib/utils";

function buildSchema(common: SiteContent["common"]) {
  return z.object({
    name: z.string().min(2, common.nameTooShort),
    email: z.string().email(common.invalidEmail),
    company: z.string().optional(),
    subject: z.string().min(1, common.subjectRequired),
    message: z.string().min(20, common.messageTooShort),
  });
}

type FormData = z.infer<ReturnType<typeof buildSchema>>;

export function ContactForm({ defaultSubject }: { defaultSubject?: string }) {
  const { content, locale } = useLanguage();
  const t = content.contact.form;
  const [status, setStatus] = useState<"idle" | "loading" | "success" | "error">(
    "idle"
  );

  const schema = useMemo(() => buildSchema(content.common), [content.common]);
  const subjectOptions = useMemo(
    () => [...poles[locale].map((pole) => pole.ctaSubject), t.subjectOther],
    [locale, t.subjectOther]
  );

  const {
    register,
    handleSubmit,
    reset,
    formState: { errors },
  } = useForm<FormData>({
    resolver: zodResolver(schema),
    defaultValues: {
      subject:
        defaultSubject && subjectOptions.includes(defaultSubject)
          ? defaultSubject
          : "",
    },
  });

  const onSubmit = async (data: FormData) => {
    setStatus("loading");
    try {
      const res = await fetch("/api/contact", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data),
      });
      if (!res.ok) throw new Error("Request failed");
      setStatus("success");
      reset();
    } catch {
      setStatus("error");
    }
  };

  const inputClasses =
    "w-full rounded-xl border border-ink-900/15 bg-white px-4 py-3 text-sm text-ink-900 outline-none transition-colors placeholder:text-ink-400/60 focus:border-primary dark:border-white/15 dark:bg-white/[0.03] dark:text-white";

  return (
    <form onSubmit={handleSubmit(onSubmit)} className="space-y-5" noValidate>
      <div className="grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div>
          <label htmlFor="name" className="mb-1.5 block text-sm font-medium text-ink-900 dark:text-white">
            {t.nameLabel}
          </label>
          <input id="name" className={inputClasses} placeholder={t.namePlaceholder} {...register("name")} />
          {errors.name && <p className="mt-1.5 text-xs text-red-600">{errors.name.message}</p>}
        </div>
        <div>
          <label htmlFor="email" className="mb-1.5 block text-sm font-medium text-ink-900 dark:text-white">
            {t.emailLabel}
          </label>
          <input id="email" type="email" className={inputClasses} placeholder={t.emailPlaceholder} {...register("email")} />
          {errors.email && <p className="mt-1.5 text-xs text-red-600">{errors.email.message}</p>}
        </div>
      </div>

      <div className="grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div>
          <label htmlFor="company" className="mb-1.5 block text-sm font-medium text-ink-900 dark:text-white">
            {t.companyLabel} <span className="font-normal text-ink-400">{t.companyOptional}</span>
          </label>
          <input id="company" className={inputClasses} placeholder={t.companyPlaceholder} {...register("company")} />
        </div>
        <div>
          <label htmlFor="subject" className="mb-1.5 block text-sm font-medium text-ink-900 dark:text-white">
            {t.subjectLabel}
          </label>
          <select id="subject" className={inputClasses} {...register("subject")}>
            <option value="" disabled>
              {t.subjectPlaceholder}
            </option>
            {subjectOptions.map((option) => (
              <option key={option} value={option}>
                {option}
              </option>
            ))}
          </select>
          {errors.subject && <p className="mt-1.5 text-xs text-red-600">{errors.subject.message}</p>}
        </div>
      </div>

      <div>
        <label htmlFor="message" className="mb-1.5 block text-sm font-medium text-ink-900 dark:text-white">
          {t.messageLabel}
        </label>
        <textarea
          id="message"
          rows={5}
          className={inputClasses}
          placeholder={t.messagePlaceholder}
          {...register("message")}
        />
        {errors.message && <p className="mt-1.5 text-xs text-red-600">{errors.message.message}</p>}
      </div>

      <button
        type="submit"
        disabled={status === "loading"}
        className={cn(
          "inline-flex w-full items-center justify-center gap-2 rounded-full bg-primary px-6 py-3.5 text-sm font-semibold text-white transition-all hover:bg-primary-600 disabled:opacity-60 sm:w-auto"
        )}
      >
        {status === "loading" && <Loader2 className="h-4 w-4 animate-spin" />}
        {status === "loading" ? content.common.sending : content.common.sendMessage}
      </button>

      {status === "success" && (
        <p className="flex items-center gap-2 text-sm font-medium text-green-700 dark:text-green-400">
          <CircleCheck className="h-4 w-4" />
          {content.common.success}
        </p>
      )}
      {status === "error" && (
        <p className="flex items-center gap-2 text-sm font-medium text-red-600">
          <CircleAlert className="h-4 w-4" />
          {content.common.error}
        </p>
      )}
    </form>
  );
}
