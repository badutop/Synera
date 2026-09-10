<?php
/**
 * Shared layout for the legal notice & privacy policy pages.
 * $args = ['eyebrow_fr','eyebrow_en','title_fr','title_en','updated_fr','updated_en','sections' => [...]]
 */
$a = $args;
?>
<section class="bg-ink-50 py-14 dark:bg-ink-800/20 sm:py-20">
	<div class="mx-auto max-w-content px-5 sm:px-8">
		<p class="text-sm font-semibold uppercase tracking-wide text-primary"><?php t($a['eyebrow_fr'], $a['eyebrow_en']); ?></p>
		<h1 class="mt-2 font-display text-4xl font-bold text-ink-900 dark:text-white"><?php t($a['title_fr'], $a['title_en']); ?></h1>
		<p class="mt-4 text-sm text-ink-400"><?php t('Dernière mise à jour :', 'Last updated:'); ?> <?php t($a['updated_fr'], $a['updated_en']); ?></p>
	</div>
</section>

<section class="mx-auto max-w-content px-5 py-14 sm:px-8">
	<div class="grid gap-12 lg:grid-cols-[280px_1fr]">
		<nav class="hidden lg:block">
			<div class="sticky top-28">
				<p class="text-sm font-semibold uppercase tracking-wide text-ink-400"><?php t('Sommaire', 'Contents'); ?></p>
				<ul class="mt-4 space-y-2 text-sm">
					<?php foreach ($a['sections'] as $section) :
						$slug = synera_slugify($section['heading_fr']);
						?>
						<li><a href="#<?php echo esc_attr($slug); ?>" class="text-ink-400 hover:text-primary"><?php t($section['heading_fr'], $section['heading_en']); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</nav>

		<div class="space-y-10">
			<?php foreach ($a['sections'] as $section) :
				$slug = synera_slugify($section['heading_fr']);
				?>
				<div id="<?php echo esc_attr($slug); ?>" class="reveal scroll-mt-28">
					<h2 class="font-display text-xl font-semibold text-ink-900 dark:text-white"><?php t($section['heading_fr'], $section['heading_en']); ?></h2>
					<?php foreach ($section['paragraphs_fr'] as $pi => $pfr) : ?>
						<p class="mt-3 text-sm text-ink-400"><?php t($pfr, $section['paragraphs_en'][$pi]); ?></p>
					<?php endforeach; ?>
					<?php if (!empty($section['items_fr'])) : ?>
						<ul class="mt-3 list-disc space-y-1.5 pl-5 text-sm text-ink-400">
							<?php foreach ($section['items_fr'] as $ii => $ifr) : ?>
								<li><?php t($ifr, $section['items_en'][$ii]); ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<?php if (!empty($section['paragraphs_after_fr'])) : ?>
						<?php foreach ($section['paragraphs_after_fr'] as $pi => $pfr) : ?>
							<p class="mt-3 text-sm text-ink-400"><?php t($pfr, $section['paragraphs_after_en'][$pi]); ?></p>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
