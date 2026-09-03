import { NextResponse } from "next/server";
import { z } from "zod";

const schema = z.object({
  name: z.string().min(2),
  email: z.string().email(),
  company: z.string().optional(),
  subject: z.string().min(1),
  message: z.string().min(20),
});

const CONTACT_RECIPIENT = process.env.CONTACT_RECIPIENT_EMAIL ?? "contact@synera-group.com";

export async function POST(request: Request) {
  const body = await request.json();
  const parsed = schema.safeParse(body);

  if (!parsed.success) {
    return NextResponse.json(
      { error: "Invalid payload", issues: parsed.error.flatten() },
      { status: 400 }
    );
  }

  const { name, email, company, subject, message } = parsed.data;

  // --- Branchement vers un service d'envoi d'email réel ---
  // Cette route valide et (en dev) journalise la soumission. Pour l'envoi effectif,
  // définis RESEND_API_KEY dans .env.local et décommente l'appel ci-dessous.
  // Voir le README ("Brancher le formulaire de contact") pour les alternatives
  // (Formspree, SMTP via Nodemailer, etc.).
  if (process.env.RESEND_API_KEY) {
    const res = await fetch("https://api.resend.com/emails", {
      method: "POST",
      headers: {
        Authorization: `Bearer ${process.env.RESEND_API_KEY}`,
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        from: "SYNERA Group <contact@synera-group.com>",
        to: [CONTACT_RECIPIENT],
        reply_to: email,
        subject: `[Site web] ${subject} — ${name}`,
        text: `Nom: ${name}\nEmail: ${email}\nSociété: ${company || "—"}\nSujet: ${subject}\n\nMessage:\n${message}`,
      }),
    });

    if (!res.ok) {
      return NextResponse.json({ error: "Email provider error" }, { status: 502 });
    }
  } else if (process.env.NODE_ENV !== "production") {
    // eslint-disable-next-line no-console
    console.log("[contact] Nouvelle soumission (RESEND_API_KEY non configurée):", parsed.data);
  }

  return NextResponse.json({ ok: true });
}
