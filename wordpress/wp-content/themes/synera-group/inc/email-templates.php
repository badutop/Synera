<?php
/**
 * Branded HTML shell for outbound auto-reply emails (contact form, newsletter).
 * Table-based layout with inline styles: email clients don't reliably support
 * external stylesheets or modern CSS, so this intentionally doesn't reuse the
 * site's Tailwind classes.
 */

function synera_email_shell(string $preheader, string $title, string $body_html, string $cta_label = '', string $cta_url = ''): string {
	$site_url = home_url('/');

	$cta_html = '';
	if ($cta_label && $cta_url) {
		$cta_html = '<tr><td style="padding-top:8px;">
			<a href="' . esc_url($cta_url) . '" style="display:inline-block;background-color:#7030A0;color:#ffffff;text-decoration:none;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:600;padding:12px 28px;border-radius:9999px;">' . esc_html($cta_label) . '</a>
		</td></tr>';
	}

	return '<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>' . esc_html($title) . '</title>
</head>
<body style="margin:0;padding:0;background-color:#F7F5FA;font-family:Arial,Helvetica,sans-serif;">
<div style="display:none;max-height:0;overflow:hidden;opacity:0;">' . esc_html($preheader) . '</div>
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#F7F5FA;padding:32px 16px;">
<tr><td align="center">
<table role="presentation" width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;background-color:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 2px 20px rgba(28,21,36,0.08);">
	<tr>
		<td style="padding:32px 40px 24px 40px;border-bottom:1px solid #EDE9F2;">
			<img src="cid:synera-logo" alt="SYNERA Groupe" width="206" height="44" style="display:block;width:206px;height:44px;border:0;">
		</td>
	</tr>
	<tr>
		<td style="padding:40px;">
			<table role="presentation" cellpadding="0" cellspacing="0" width="100%">
				' . $body_html . $cta_html . '
			</table>
		</td>
	</tr>
	<tr>
		<td style="background-color:#F7F5FA;padding:24px 40px;">
			<p style="margin:0;font-size:12px;line-height:20px;color:#6B6475;font-family:Arial,Helvetica,sans-serif;">
				SYNERA Groupe &middot; 6, Cité COMICO, VDN, Dakar, Sénégal<br>
				<a href="' . esc_url($site_url) . '" style="color:#7030A0;text-decoration:none;">synera-groupe.com</a> &middot; <a href="mailto:synera@synera-groupe.com" style="color:#7030A0;text-decoration:none;">synera@synera-groupe.com</a>
			</p>
		</td>
	</tr>
</table>
</td></tr>
</table>
</body>
</html>';
}

function synera_email_paragraph(string $text, bool $last = false): string {
	$padding = $last ? '0' : '16px';
	return '<tr><td style="font-size:15px;line-height:24px;color:#2A2233;padding-bottom:' . $padding . ';font-family:Arial,Helvetica,sans-serif;">' . $text . '</td></tr>';
}

function synera_contact_autoreply_html(string $name, string $subject): string {
	$first_name = esc_html(trim(explode(' ', $name)[0]));
	$body  = synera_email_paragraph('Bonjour ' . $first_name . ',');
	$body .= synera_email_paragraph('Nous avons bien reçu votre message au sujet de « ' . esc_html($subject) . ' ». Notre équipe vous répond sous 48h.');
	$body .= synera_email_paragraph('À bientôt,<br>L\'équipe SYNERA Groupe', true);

	return synera_email_shell(
		'Votre message a bien été reçu, réponse sous 48h.',
		'Message reçu',
		$body,
		'Voir nos solutions',
		home_url('/solutions/')
	);
}

function synera_newsletter_autoreply_html(): string {
	$body  = synera_email_paragraph('Bonjour,');
	$body .= synera_email_paragraph('Votre inscription à la newsletter SYNERA Groupe est confirmée. Vous recevrez nos analyses de marché et actualités, une fois par mois maximum.');
	$body .= synera_email_paragraph('À bientôt,<br>L\'équipe SYNERA Groupe', true);

	return synera_email_shell(
		'Votre inscription à la newsletter est confirmée.',
		'Inscription confirmée',
		$body,
		'Lire nos actualités',
		home_url('/actualites/')
	);
}
