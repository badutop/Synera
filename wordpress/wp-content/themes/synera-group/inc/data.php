<?php
/**
 * Structured bilingual content (mirrors the original src/data/*.ts files).
 */

function synera_poles(): array {
	return [
		[
			'slug'        => 'intermediation',
			'icon'        => 'handshake',
			'title_fr'    => "Intermédiation d'Affaires",
			'title_en'    => 'Business Intermediation',
			'summary_fr'  => "Nous connectons investisseurs, entreprises et acteurs locaux pour accélérer votre implantation et votre développement commercial.",
			'summary_en'  => 'We connect investors, companies and local players to accelerate your market entry and commercial growth.',
			'desc_fr'     => "SYNERA Group met à votre service un réseau de contacts qualifiés — autorités publiques, dirigeants du secteur privé, partenaires locaux — pour transformer une intention d'expansion en relations d'affaires concrètes. Nous facilitons l'implantation, structurons les premiers échanges et représentons vos intérêts avec la crédibilité d'un acteur ancré localement.",
			'desc_en'     => 'SYNERA Group puts a network of qualified contacts at your service — public authorities, private-sector leaders, local partners — to turn an expansion intent into concrete business relationships. We facilitate market entry, structure the first exchanges, and represent your interests with the credibility of a locally rooted player.',
			'steps'       => [
				['fr' => ['Cartographie des acteurs', "Identification des interlocuteurs clés — publics et privés — pertinents pour votre projet et votre secteur."], 'en' => ['Mapping the players', 'Identifying the key public and private contacts relevant to your project and sector.']],
				['fr' => ['Prise de contact qualifiée', "Mise en relation directe avec les bons décideurs, dans le respect des usages et des sensibilités locales."], 'en' => ['Qualified outreach', 'Direct introductions to the right decision-makers, respecting local practices and sensitivities.']],
				['fr' => ['Structuration de la relation', "Cadrage des échanges, préparation des rencontres et sécurisation des premiers engagements."], 'en' => ['Structuring the relationship', 'Framing the discussions, preparing meetings and securing the first commitments.']],
				['fr' => ["Suivi de la relation d'affaires", "Accompagnement dans la durée pour consolider le partenariat et anticiper les points de friction."], 'en' => ['Following up the relationship', 'Ongoing support to consolidate the partnership and anticipate friction points.']],
			],
			'benefits_fr' => [
				'Accès direct aux bons interlocuteurs, sans intermédiaires superflus',
				'Gain de temps significatif sur les phases de prospection',
				'Réduction du risque relationnel et culturel',
				'Ancrage local crédible dès les premiers échanges',
			],
			'benefits_en' => [
				'Direct access to the right contacts, without unnecessary go-betweens',
				'Significant time saved on prospecting phases',
				'Reduced relational and cultural risk',
				'Credible local footing from the very first exchanges',
			],
			'cta_fr'      => "Intermédiation d'Affaires",
			'cta_en'      => 'Business Intermediation',
		],
		[
			'slug'        => 'etudes-conseil',
			'icon'        => 'chart-line',
			'title_fr'    => 'Études & Conseil',
			'title_en'    => 'Studies & Advisory',
			'summary_fr'  => "Des études rigoureuses pour sécuriser vos décisions d'investissement et de développement avant d'engager vos ressources.",
			'summary_en'  => 'Rigorous studies to de-risk your investment and growth decisions before you commit resources.',
			'desc_fr'     => "Avant d'investir un marché, il faut le comprendre. Nos équipes conduisent des études de marché, des études de faisabilité et des diagnostics stratégiques ou sectoriels qui transforment l'incertitude en décisions argumentées. Chaque recommandation s'appuie sur des données vérifiées et une lecture fine du contexte local.",
			'desc_en'     => 'Before investing in a market, you need to understand it. Our teams conduct market studies, feasibility studies, and strategic or sector diagnostics that turn uncertainty into well-argued decisions. Every recommendation is backed by verified data and a fine-grained reading of the local context.',
			'steps'       => [
				['fr' => ['Cadrage des objectifs', 'Clarification des questions à trancher et des critères de décision avec votre équipe.'], 'en' => ['Scoping the objectives', 'Clarifying the questions to answer and the decision criteria with your team.']],
				['fr' => ['Collecte & analyse des données', "Recherche terrain, entretiens d'experts, données sectorielles et réglementaires."], 'en' => ['Data collection & analysis', 'Field research, expert interviews, sector and regulatory data.']],
				['fr' => ['Recommandations stratégiques', 'Synthèse des options possibles, avec risques, opportunités et scénarios chiffrés.'], 'en' => ['Strategic recommendations', 'Summary of possible options, with risks, opportunities and costed scenarios.']],
				['fr' => ['Restitution & aide à la décision', 'Présentation claire des résultats, disponible pour challenger et affiner avec vos équipes dirigeantes.'], 'en' => ['Findings & decision support', 'Clear presentation of results, open to challenge and refinement with your leadership team.']],
			],
			'benefits_fr' => [
				'Décisions fondées sur des données fiables, pas sur des suppositions',
				"Réduction mesurable du risque d'investissement",
				'Vision claire des opportunités et contraintes du marché cible',
				"Un livrable actionnable, pas un rapport qui prend la poussière",
			],
			'benefits_en' => [
				'Decisions grounded in reliable data, not assumptions',
				'Measurable reduction in investment risk',
				"A clear view of the target market's opportunities and constraints",
				'An actionable deliverable, not a report gathering dust',
			],
			'cta_fr'      => 'Études & Conseil',
			'cta_en'      => 'Studies & Advisory',
		],
		[
			'slug'        => 'accompagnement-projets',
			'icon'        => 'workflow',
			'title_fr'    => 'Accompagnement de Projets',
			'title_en'    => 'Project Support',
			'summary_fr'  => "Un pilotage de bout en bout — du cadrage à l'évaluation — pour transformer une stratégie en résultats concrets.",
			'summary_en'  => 'End-to-end management — from scoping to evaluation — to turn a strategy into concrete results.',
			'desc_fr'     => "Une bonne étude ne suffit pas si l'exécution échoue. SYNERA Group pilote vos projets sur toute leur durée : cadrage initial, structuration des partenariats, mise en œuvre opérationnelle et évaluation des résultats. Vous gardez un interlocuteur unique, responsable de la cohérence d'ensemble.",
			'desc_en'     => "A good study isn't enough if execution fails. SYNERA Group manages your projects throughout their full lifecycle: initial scoping, partnership structuring, operational implementation and results evaluation. You keep a single point of contact, responsible for overall consistency.",
			'steps'       => [
				['fr' => ['Cadrage du projet', 'Définition des objectifs, du périmètre, des jalons et des indicateurs de succès.'], 'en' => ['Project scoping', 'Defining objectives, scope, milestones and success indicators.']],
				['fr' => ['Structuration & partenariats', 'Mise en place des accords, répartition des rôles et sécurisation juridique et financière des opérations.'], 'en' => ['Structuring & partnerships', 'Setting up agreements, allocating roles, and legally and financially securing operations.']],
				['fr' => ['Mise en œuvre & pilotage', 'Coordination des parties prenantes, suivi d’avancement et arbitrages en temps réel.'], 'en' => ['Implementation & steering', 'Coordinating stakeholders, tracking progress and making real-time trade-offs.']],
				['fr' => ['Évaluation & capitalisation', 'Bilan des résultats, enseignements tirés et recommandations pour les prochaines phases.'], 'en' => ['Evaluation & capitalization', 'Assessing results, capturing lessons learned and recommendations for the next phases.']],
			],
			'benefits_fr' => [
				'Un interlocuteur unique responsable de bout en bout',
				'Exécution maîtrisée, avec des jalons et un reporting clairs',
				'Partenariats structurés et sécurisés dès le départ',
				'Résultats mesurés, pas seulement livrés',
			],
			'benefits_en' => [
				'A single point of contact, responsible end to end',
				'Controlled execution, with clear milestones and reporting',
				'Partnerships structured and secured from the outset',
				'Results that are measured, not just delivered',
			],
			'cta_fr'      => 'Accompagnement de Projets',
			'cta_en'      => 'Project Support',
		],
		[
			'slug'        => 'competences-rh',
			'icon'        => 'graduation-cap',
			'title_fr'    => 'Développement des Compétences & RH',
			'title_en'    => 'Skills Development & HR',
			'summary_fr'  => 'Formations, mobilité internationale et accès à des experts sectoriels pour donner à vos équipes les moyens de réussir.',
			'summary_en'  => 'Training, international mobility and access to sector experts to give your teams the means to succeed.',
			'desc_fr'     => "Un projet international réussit grâce aux compétences des personnes qui le portent. Nous concevons des formations professionnelles et techniques sur mesure, accompagnons vos talents dans leur mobilité ou expatriation, et vous mettons en relation avec des experts sectoriels pointus quand une compétence spécifique vous manque.",
			'desc_en'     => 'An international project succeeds through the skills of the people driving it. We design tailor-made professional and technical training, support your talent through mobility or expatriation, and connect you with sharp sector experts whenever a specific skill is missing.',
			'steps'       => [
				['fr' => ['Diagnostic des besoins', 'Identification des compétences à renforcer et des profils concernés par la mobilité.'], 'en' => ['Needs diagnosis', 'Identifying the skills to strengthen and the profiles involved in mobility.']],
				['fr' => ['Programme sur mesure', 'Conception d’un parcours de formation ou d’un plan de mobilité adapté à vos contraintes.'], 'en' => ['Tailor-made program', 'Designing a training path or mobility plan adapted to your constraints.']],
				['fr' => ['Déploiement', 'Mise en œuvre des formations et accompagnement logistique et administratif de la mobilité.'], 'en' => ['Deployment', 'Rolling out training and providing logistical and administrative support for mobility.']],
				['fr' => ['Suivi & montée en compétences', 'Évaluation des acquis et ajustement du programme dans la durée.'], 'en' => ['Follow-up & upskilling', 'Assessing progress and adjusting the program over time.']],
			],
			'benefits_fr' => [
				'Des équipes opérationnelles plus rapidement sur le terrain',
				'Transitions internationales sécurisées, sur le plan humain et administratif',
				'Accès à une expertise sectorielle pointue en cas de besoin ponctuel',
				'Programmes construits sur-mesure, jamais sur étagère',
			],
			'benefits_en' => [
				'Teams operational in the field faster',
				'International transitions secured, both humanly and administratively',
				'Access to sharp sector expertise for one-off needs',
				'Programs built tailor-made, never off the shelf',
			],
			'cta_fr'      => 'Développement des Compétences & RH',
			'cta_en'      => 'Skills Development & HR',
		],
	];
}

function synera_sectors(): array {
	return [
		['icon' => 'chart-line', 'title_fr' => 'Finance', 'title_en' => 'Finance', 'desc_fr' => "Structuration d'opérations, mise en relation avec des institutions financières et accompagnement des levées de fonds.", 'desc_en' => 'Structuring operations, introductions to financial institutions, and support for fundraising.'],
		['icon' => 'cpu', 'title_fr' => 'IT & Technologies', 'title_en' => 'IT & Technology', 'desc_fr' => "Études de marché et intermédiation pour les acteurs technologiques en phase d'expansion internationale.", 'desc_en' => 'Market studies and intermediation for technology players expanding internationally.'],
		['icon' => 'sun', 'title_fr' => 'Énergie Solaire', 'title_en' => 'Solar Energy', 'desc_fr' => 'Mise en relation avec des développeurs et investisseurs de projets solaires, étude des cadres réglementaires locaux.', 'desc_en' => 'Introductions to solar project developers and investors, and analysis of local regulatory frameworks.'],
		['icon' => 'rocket', 'title_fr' => 'Entrepreneuriat', 'title_en' => 'Entrepreneurship', 'desc_fr' => 'Accompagnement des porteurs de projets dans leur structuration, leur financement et leur mise en réseau.', 'desc_en' => 'Supporting project leaders in structuring, financing and building their network.'],
		['icon' => 'graduation-cap', 'title_fr' => 'Formation', 'title_en' => 'Training', 'desc_fr' => 'Programmes de développement des compétences et accompagnement de la mobilité professionnelle.', 'desc_en' => 'Skills development programs and support for professional mobility.'],
		['icon' => 'pickaxe', 'title_fr' => 'Mines & Géologie', 'title_en' => 'Mining & Geology', 'desc_fr' => "Intermédiation auprès d'acteurs miniers et institutionnels, appui aux études de faisabilité de projets d'exploration.", 'desc_en' => 'Intermediation with mining and institutional players, and support for exploration project feasibility studies.'],
	];
}

function synera_case_studies(): array {
	return [
		['sector_fr' => 'Finance', 'sector_en' => 'Finance', 'title_fr' => "Structuration d'un partenariat financier transfrontalier", 'title_en' => 'Structuring a cross-border financial partnership', 'result_fr' => 'Mise en relation avec 3 institutions partenaires en moins de 90 jours.', 'result_en' => 'Introductions to 3 partner institutions in under 90 days.'],
		['sector_fr' => 'Entrepreneuriat', 'sector_en' => 'Entrepreneurship', 'title_fr' => 'Étude de faisabilité pour une expansion commerciale', 'title_en' => 'Feasibility study for a commercial expansion', 'result_fr' => 'Diagnostic livré en 6 semaines, décision d’investissement sécurisée.', 'result_en' => 'Diagnosis delivered in 6 weeks, investment decision de-risked.'],
		['sector_fr' => 'Formation', 'sector_en' => 'Training', 'title_fr' => 'Programme de mobilité pour une équipe technique', 'title_en' => 'Mobility program for a technical team', 'result_fr' => '12 collaborateurs accompagnés dans leur transition internationale.', 'result_en' => '12 employees supported through their international transition.'],
	];
}

function synera_team(): array {
	return [
		['name_fr' => 'Prénom Nom', 'name_en' => 'First Last', 'role_fr' => 'Fondateur & Directeur Général', 'role_en' => 'Founder & CEO', 'bio_fr' => 'Pilote la vision du groupe et les relations institutionnelles de haut niveau.', 'bio_en' => "Drives the group's vision and senior institutional relationships.", 'initials' => 'PN'],
		['name_fr' => 'Prénom Nom', 'name_en' => 'First Last', 'role_fr' => 'Directrice des Opérations', 'role_en' => 'Chief Operating Officer', 'bio_fr' => "Supervise l'exécution des projets et la qualité de l'accompagnement client.", 'bio_en' => 'Oversees project execution and the quality of client support.', 'initials' => 'PN'],
		['name_fr' => 'Prénom Nom', 'name_en' => 'First Last', 'role_fr' => 'Directeur Études & Conseil', 'role_en' => 'Director of Studies & Advisory', 'bio_fr' => 'Conduit les études de marché et les diagnostics stratégiques du groupe.', 'bio_en' => "Leads the group's market studies and strategic diagnostics.", 'initials' => 'PN'],
		['name_fr' => 'Prénom Nom', 'name_en' => 'First Last', 'role_fr' => "Responsable Intermédiation d'Affaires", 'role_en' => 'Head of Business Intermediation', 'bio_fr' => 'Anime le réseau de contacts institutionnels et privés de SYNERA Group.', 'bio_en' => "Runs SYNERA Group's network of institutional and private contacts.", 'initials' => 'PN'],
	];
}

function synera_approach_steps(): array {
	return [
		['icon' => 'ear', 'number' => '01', 'title_fr' => 'Écoute', 'title_en' => 'Listen', 'desc_fr' => 'Tout commence par une compréhension fine de votre contexte, de vos ambitions et de vos contraintes. Nous prenons le temps de cadrer vos objectifs avant de proposer quoi que ce soit.', 'desc_en' => 'It all starts with a fine-grained understanding of your context, your ambitions and your constraints. We take the time to scope your objectives before proposing anything.'],
		['icon' => 'search', 'number' => '02', 'title_fr' => 'Étude', 'title_en' => 'Study', 'desc_fr' => 'Nos équipes analysent le marché, le contexte réglementaire et les acteurs pertinents pour objectiver les opportunités et les risques réels de votre projet.', 'desc_en' => 'Our teams analyze the market, the regulatory context and the relevant players to objectively assess the real opportunities and risks of your project.'],
		['icon' => 'compass', 'number' => '03', 'title_fr' => 'Stratégie', 'title_en' => 'Strategy', 'desc_fr' => 'Nous formulons des recommandations claires et priorisées, avec des scénarios chiffrés qui vous permettent de décider en toute connaissance de cause.', 'desc_en' => 'We formulate clear, prioritized recommendations, with costed scenarios that let you decide with full visibility.'],
		['icon' => 'cog', 'number' => '04', 'title_fr' => 'Mise en œuvre', 'title_en' => 'Implementation', 'desc_fr' => 'Nous pilotons l’exécution aux côtés de vos équipes : mise en relation, structuration des partenariats, coordination des parties prenantes.', 'desc_en' => 'We steer execution alongside your teams: introductions, partnership structuring, stakeholder coordination.'],
		['icon' => 'chart-line', 'number' => '05', 'title_fr' => 'Suivi & Évaluation', 'title_en' => 'Follow-up & Evaluation', 'desc_fr' => 'Nous mesurons les résultats obtenus, documentons les enseignements et ajustons l’accompagnement pour les phases suivantes de votre développement.', 'desc_en' => 'We measure the results achieved, document lessons learned, and adjust support for the next phases of your growth.'],
	];
}

function synera_values(): array {
	return [
		['icon' => 'shield-check', 'title_fr' => 'Intégrité', 'title_en' => 'Integrity', 'desc_fr' => 'Nous disons ce que nous faisons et faisons ce que nous disons. La confiance se construit dans la durée, jamais au détriment de la transparence.', 'desc_en' => 'We say what we do and do what we say. Trust is built over time, never at the expense of transparency.'],
		['icon' => 'heart-handshake', 'title_fr' => 'Co-prospérité', 'title_en' => 'Co-prosperity', 'desc_fr' => 'Votre succès est notre succès. Nous ne recommandons que ce qui sert réellement vos intérêts, même quand la solution la plus simple pour nous serait différente.', 'desc_en' => 'Your success is our success. We only recommend what genuinely serves your interests, even when the easier path for us would be different.'],
		['icon' => 'microscope', 'title_fr' => 'Rigueur', 'title_en' => 'Rigor', 'desc_fr' => "Chaque recommandation s'appuie sur des données et des études, jamais sur l'intuition seule. La décision vient après l'analyse, pas avant.", 'desc_en' => 'Every recommendation is grounded in data and studies, never intuition alone. Decisions come after analysis, not before.'],
		['icon' => 'sparkles', 'title_fr' => 'Les différences comme leviers de richesse', 'title_en' => 'Differences as a source of richness', 'desc_fr' => 'La diversité des marchés, des expertises et des cultures que nous connectons est notre matière première — pas un obstacle à gérer.', 'desc_en' => 'The diversity of markets, expertise and cultures we connect is our raw material — not an obstacle to manage.'],
	];
}

function synera_nav_links(): array {
	return [
		['fr' => 'Notre Identité', 'en' => 'Our Identity', 'href' => '/identite/'],
		['fr' => 'Nos Solutions', 'en' => 'Our Solutions', 'href' => '/solutions/'],
		['fr' => 'Notre Approche', 'en' => 'Our Approach', 'href' => '/approche/'],
		['fr' => 'Secteurs & Références', 'en' => 'Sectors & References', 'href' => '/secteurs/'],
		['fr' => 'Actualités', 'en' => 'Insights', 'href' => '/actualites/'],
		['fr' => 'Contact', 'en' => 'Contact', 'href' => '/contact/'],
	];
}
