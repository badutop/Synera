<?php
/**
 * Structured content still needed at runtime (outside of page content):
 * the footer's "Nos Solutions" column and the contact form's subject list.
 * Everything else (descriptions, methodology, benefits...) now lives as
 * page content, editable in the block editor.
 */

function synera_poles(): array {
	return [
		['slug' => 'intermediation', 'title' => "Intermédiation d'Affaires"],
		['slug' => 'etudes-conseil', 'title' => 'Études & Conseil'],
		['slug' => 'accompagnement-projets', 'title' => 'Accompagnement de Projets'],
		['slug' => 'competences-rh', 'title' => 'Développement des Compétences & RH'],
	];
}

function synera_nav_links(): array {
	return [
		['label' => 'Notre Identité', 'href' => '/identite/'],
		['label' => 'Nos Solutions', 'href' => '/solutions/'],
		['label' => 'Notre Approche', 'href' => '/approche/'],
		['label' => 'Secteurs & Références', 'href' => '/secteurs/'],
		['label' => 'Actualités', 'href' => '/actualites/'],
		['label' => 'Contact', 'href' => '/contact/'],
	];
}
