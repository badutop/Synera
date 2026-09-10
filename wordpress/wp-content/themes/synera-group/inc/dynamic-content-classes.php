<?php
/**
 * NOT loaded anywhere on purpose — this file has zero runtime effect.
 *
 * Page content now lives in the database as Gutenberg blocks, generated
 * once from inc/patterns.php's helpers and injected via wp_update_post().
 * Some of the Tailwind classes used in that generated markup only ever
 * existed as literal strings inside the (now-deleted) one-off migration
 * script, so Tailwind's content scanner (`./**\/*.php` in tailwind.config.js)
 * never saw them and won't compile the corresponding CSS on a future
 * `npm run build` — even though the classes are very much in use in the
 * live page content.
 *
 * Keeping this list here (as plain scannable text, never executed) is
 * what keeps those rules in assets/css/style.css. If you change how a
 * page's content is generated, update this list to match.
 */

if (false) :
	?>
	<div class="mt-10 grid grid-cols-2 gap-4 sm:gap-6 lg:grid-cols-4"></div>
	<div class="reveal group relative block aspect-[3/4] overflow-hidden rounded-2xl shadow-card"></div>
	<div class="absolute inset-0 bg-gradient-to-t from-ink-900/90 via-ink-900/20 to-transparent"></div>
	<span class="absolute left-4 top-4 inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/15 text-white backdrop-blur"></span>
	<div class="absolute inset-x-0 bottom-0 p-4"></div>
	<span class="mt-1 inline-block text-xs font-medium text-white/80 group-hover:underline"></span>
	<div class="flex flex-wrap items-end justify-between gap-6"></div>
	<div class="mt-10 grid gap-8 sm:grid-cols-2"></div>
	<div class="mt-10 grid gap-6 sm:grid-cols-2"></div>
	<div class="mt-10 grid gap-8 sm:grid-cols-2 lg:grid-cols-4"></div>
	<div class="mt-10 grid gap-6 sm:grid-cols-3"></div>
	<div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3"></div>
	<div class="grid gap-6 sm:grid-cols-2"></div>
	<div class="bg-ink-50 dark:bg-ink-800/20"></div>
	<div class="mt-8 grid grid-cols-2 gap-4 sm:grid-cols-3 xl:grid-cols-5"></div>
	<div class="flex h-20 items-center justify-center rounded-xl bg-white shadow-card dark:bg-white/[0.03]"></div>
	<img class="h-11 max-w-[80%] object-contain" />
	<p class="text-center text-sm font-semibold uppercase tracking-wide text-ink-400"></p>
	<div class="mx-auto max-w-2xl text-center"></div>
	<a class="mt-8 text-center text-sm font-semibold text-primary hover:underline"></a>
	<div class="mx-auto mt-10 max-w-xl rounded-2xl border border-dashed border-ink-100 p-8 text-center dark:border-white/10"></div>
	<div class="mx-auto -mt-[68px] max-w-xl rounded-2xl p-8 pt-16 text-center"></div>
	<div class="relative space-y-10 border-l border-ink-100 pl-8 dark:border-white/10 sm:pl-10"></div>
	<div class="reveal rounded-2xl border border-ink-100 bg-white p-8 shadow-card dark:border-white/10 dark:bg-white/[0.03]"></div>
	<div class="reveal mt-8 flex max-w-md items-start gap-3 rounded-2xl border border-ink-100 bg-white p-6 shadow-card dark:border-white/10 dark:bg-white/[0.03]"></div>
	<p class="font-display text-sm font-semibold text-ink-900 dark:text-white"></p>
	<p class="mt-1 text-sm text-ink-400"></p>
	<div class="flex items-start gap-3"></div>
	<nav class="hidden lg:block"></nav>
	<div class="sticky top-28"></div>
	<ul class="mt-4 space-y-2 text-sm"></ul>
	<a class="text-ink-400 hover:text-primary"></a>
	<h1 class="mt-2 font-display text-4xl font-bold text-ink-900 dark:text-white"></h1>
	<p class="mt-4 text-sm text-ink-400"></p>
	<?php
endif;
