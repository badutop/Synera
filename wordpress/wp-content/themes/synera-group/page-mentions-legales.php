<?php get_header();

$sections = [
	[
		'heading_fr' => 'Éditeur du site',
		'heading_en' => 'Site publisher',
		'paragraphs_fr' => [
			"Le présent site est édité par SYNERA Group, société d'intermédiation, d'études et d'accompagnement de projets, dont le siège social est situé au 6, Cité COMICO - VDN, Dakar, Sénégal.",
			"Forme juridique, capital social et numéro d'immatriculation (RCCM / NINEA) : à compléter par SYNERA Group.",
			"Téléphone : +221 77 777 00 00 — Email : contact@synera-group.com",
		],
		'paragraphs_en' => [
			'This site is published by SYNERA Group, a business intermediation, research and project support firm, headquartered at 6, Cité COMICO - VDN, Dakar, Senegal.',
			'Legal form, share capital and registration number (RCCM / NINEA): to be completed by SYNERA Group.',
			'Phone: +221 77 777 00 00 — Email: contact@synera-group.com',
		],
	],
	[
		'heading_fr' => 'Directeur de la publication',
		'heading_en' => 'Publication director',
		'paragraphs_fr' => ["Le directeur de la publication est le représentant légal de SYNERA Group. Nom et qualité du directeur de la publication : à compléter par SYNERA Group."],
		'paragraphs_en' => ["The publication director is SYNERA Group's legal representative. Name and title of the publication director: to be completed by SYNERA Group."],
	],
	[
		'heading_fr' => 'Hébergement',
		'heading_en' => 'Hosting',
		'paragraphs_fr' => ['Ce site est hébergé par Vercel Inc., 340 S Lemon Ave #4133, Walnut, CA 91789, États-Unis — vercel.com.'],
		'paragraphs_en' => ['This site is hosted by Vercel Inc., 340 S Lemon Ave #4133, Walnut, CA 91789, USA — vercel.com.'],
	],
	[
		'heading_fr' => 'Propriété intellectuelle',
		'heading_en' => 'Intellectual property',
		'paragraphs_fr' => [
			"L'ensemble des contenus présents sur ce site (textes, logos, illustrations, photographies, structure et mise en page) est protégé par le droit de la propriété intellectuelle et demeure la propriété exclusive de SYNERA Group, sauf mention contraire.",
			"Toute reproduction, représentation, modification, publication ou adaptation de tout ou partie des éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite sans l'autorisation écrite préalable de SYNERA Group.",
		],
		'paragraphs_en' => [
			'All content on this site (text, logos, illustrations, photographs, structure and layout) is protected by intellectual property law and remains the exclusive property of SYNERA Group, unless otherwise stated.',
			"Any reproduction, representation, modification, publication or adaptation of all or part of the site's elements, by any means or process, is prohibited without SYNERA Group's prior written consent.",
		],
	],
	[
		'heading_fr' => 'Liens hypertextes',
		'heading_en' => 'Hyperlinks',
		'paragraphs_fr' => [
			"Ce site peut contenir des liens vers des sites tiers. SYNERA Group n'exerce aucun contrôle sur ces sites et décline toute responsabilité quant à leur contenu ou à leur politique de confidentialité.",
			'La mise en place d’un lien hypertexte vers ce site est soumise à l’accord préalable de SYNERA Group.',
		],
		'paragraphs_en' => [
			'This site may contain links to third-party sites. SYNERA Group has no control over these sites and disclaims any responsibility for their content or privacy practices.',
			"Setting up a hyperlink to this site requires SYNERA Group's prior consent.",
		],
	],
	[
		'heading_fr' => 'Limitation de responsabilité',
		'heading_en' => 'Limitation of liability',
		'paragraphs_fr' => ["SYNERA Group s'efforce d'assurer l'exactitude et la mise à jour des informations diffusées sur ce site, sans garantie d'exhaustivité. SYNERA Group ne saurait être tenue responsable des erreurs, omissions ou de l'indisponibilité temporaire du site."],
		'paragraphs_en' => ['SYNERA Group strives to keep the information on this site accurate and up to date, without guaranteeing completeness. SYNERA Group cannot be held liable for errors, omissions, or temporary unavailability of the site.'],
	],
	[
		'heading_fr' => 'Droit applicable',
		'heading_en' => 'Governing law',
		'paragraphs_fr' => ['Les présentes mentions légales sont soumises au droit sénégalais. Tout litige relatif à l’utilisation de ce site relève de la compétence exclusive des juridictions de Dakar, Sénégal.'],
		'paragraphs_en' => ['This legal notice is governed by Senegalese law. Any dispute relating to the use of this site falls under the exclusive jurisdiction of the courts of Dakar, Senegal.'],
	],
	[
		'heading_fr' => 'Contact',
		'heading_en' => 'Contact',
		'paragraphs_fr' => ['Pour toute question relative aux présentes mentions légales, contactez-nous à contact@synera-group.com ou via notre page de contact.'],
		'paragraphs_en' => ['For any question regarding this legal notice, contact us at contact@synera-group.com or via our contact page.'],
	],
];

get_template_part('template-parts/legal-document', null, [
	'eyebrow_fr' => 'Informations légales',
	'eyebrow_en' => 'Legal information',
	'title_fr'   => 'Mentions légales',
	'title_en'   => 'Legal Notice',
	'updated_fr' => '4 septembre 2026',
	'updated_en' => 'September 4, 2026',
	'sections'   => $sections,
]);

get_footer();
