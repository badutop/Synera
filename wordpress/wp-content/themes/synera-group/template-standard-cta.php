<?php
/**
 * Template Name: Page standard (avec bandeau CTA)
 *
 * Used by: Accueil, Nos Solutions, Secteurs & Références, Notre Approche,
 * Notre Identité. Content is fully editable in the block editor; only the
 * closing CTA band (and, on the homepage, the "latest articles" block,
 * which pulls live posts) stay as fixed template parts.
 */
get_header();
while (have_posts()) :
	the_post();
	the_content();
endwhile;

if (is_front_page()) {
	get_template_part('template-parts/blog-preview');
}

get_template_part('template-parts/cta-band');
get_footer();
