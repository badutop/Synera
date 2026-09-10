(function () {
	'use strict';

	var html = document.documentElement;

	function getLocale() {
		return html.getAttribute('data-locale') === 'en' ? 'en' : 'fr';
	}

	function applyI18nAttrs() {
		var locale = getLocale();
		document.querySelectorAll('[data-i18n-attr]').forEach(function (el) {
			var map;
			try {
				map = JSON.parse(el.getAttribute('data-i18n-attr'));
			} catch (e) {
				return;
			}
			Object.keys(map).forEach(function (attr) {
				var pair = map[attr];
				el.setAttribute(attr, pair[locale] || pair.fr);
			});
		});

		// <option> text can't be toggled with CSS (child elements aren't rendered),
		// so select options carry data-fr/data-en and get their text swapped directly.
		document.querySelectorAll('select[data-i18n-select] option').forEach(function (opt) {
			opt.textContent = opt.getAttribute('data-' + locale) || opt.getAttribute('data-fr') || opt.textContent;
		});
	}

	function setLocale(locale) {
		if (locale === 'en') {
			html.setAttribute('data-locale', 'en');
		} else {
			html.removeAttribute('data-locale');
		}
		try {
			localStorage.setItem('synera-locale', locale);
		} catch (e) {}
		applyI18nAttrs();
		updateLangToggleUI();
	}

	function updateLangToggleUI() {
		var locale = getLocale();
		document.querySelectorAll('[data-set-lang]').forEach(function (btn) {
			var active = btn.getAttribute('data-set-lang') === locale;
			btn.classList.toggle('bg-primary', active);
			btn.classList.toggle('text-white', active);
			btn.classList.toggle('text-ink-700', !active);
			btn.classList.toggle('dark:text-white', !active);
		});
	}

	document.addEventListener('click', function (e) {
		var btn = e.target.closest('[data-set-lang]');
		if (btn) setLocale(btn.getAttribute('data-set-lang'));
	});

	applyI18nAttrs();
	updateLangToggleUI();

	// Theme toggle
	function setTheme(theme) {
		html.classList.toggle('dark', theme === 'dark');
		try {
			localStorage.setItem('synera-theme', theme);
		} catch (e) {}
		document.querySelectorAll('#theme-toggle').forEach(function (btn) {
			btn.querySelector('.theme-icon-sun').classList.toggle('hidden', theme === 'dark');
			btn.querySelector('.theme-icon-moon').classList.toggle('hidden', theme !== 'dark');
		});
	}
	setTheme(html.classList.contains('dark') ? 'dark' : 'light');

	document.addEventListener('click', function (e) {
		if (e.target.closest('#theme-toggle')) {
			setTheme(html.classList.contains('dark') ? 'light' : 'dark');
		}
	});

	// Mobile menu
	var backdrop = document.getElementById('mobile-menu-backdrop');
	var drawer = document.getElementById('mobile-menu-drawer');

	function openMenu() {
		if (backdrop) backdrop.classList.add('is-open');
		if (drawer) drawer.classList.add('is-open');
		document.body.style.overflow = 'hidden';
	}
	function closeMenu() {
		if (backdrop) backdrop.classList.remove('is-open');
		if (drawer) drawer.classList.remove('is-open');
		document.body.style.overflow = '';
	}
	document.addEventListener('click', function (e) {
		if (e.target.closest('#mobile-menu-open')) openMenu();
		if (e.target.closest('#mobile-menu-close') || e.target === backdrop) closeMenu();
		if (e.target.closest('#mobile-menu-drawer a')) closeMenu();
	});

	// Header scroll shadow
	var header = document.querySelector('[data-header]');
	function onScroll() {
		if (!header) return;
		var scrolled = window.scrollY > 12;
		header.classList.toggle('border-ink-100', scrolled);
		header.classList.toggle('dark:border-white/10', scrolled);
		header.classList.toggle('shadow-card', scrolled);
	}
	window.addEventListener('scroll', onScroll, { passive: true });
	onScroll();

	// Reveal on scroll
	var revealEls = document.querySelectorAll('.reveal');
	if ('IntersectionObserver' in window && revealEls.length) {
		var io = new IntersectionObserver(
			function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						entry.target.classList.add('is-visible');
						io.unobserve(entry.target);
					}
				});
			},
			{ rootMargin: '0px 0px -80px 0px', threshold: 0.05 }
		);
		revealEls.forEach(function (el) {
			io.observe(el);
		});
	} else {
		revealEls.forEach(function (el) {
			el.classList.add('is-visible');
		});
	}

	// Contact form
	var contactForm = document.getElementById('contact-form');
	if (contactForm) {
		contactForm.addEventListener('submit', function (e) {
			e.preventDefault();
			var status = contactForm.querySelector('[data-form-status]');
			var submitBtn = contactForm.querySelector('button[type="submit"]');
			var formData = new FormData(contactForm);
			formData.append('action', 'synera_contact');
			formData.append('nonce', contactForm.dataset.nonce);

			submitBtn.disabled = true;
			contactForm.classList.add('is-sending');

			fetch(contactForm.dataset.ajaxUrl, { method: 'POST', body: formData })
				.then(function (res) {
					return res.json();
				})
				.then(function (json) {
					contactForm.classList.remove('is-sending');
					submitBtn.disabled = false;
					status.hidden = false;
					if (json.success) {
						contactForm.reset();
						status.setAttribute('data-state', 'success');
					} else {
						status.setAttribute('data-state', 'error');
					}
				})
				.catch(function () {
					contactForm.classList.remove('is-sending');
					submitBtn.disabled = false;
					status.hidden = false;
					status.setAttribute('data-state', 'error');
				});
		});
	}

	// Newsletter (front-end only demo)
	var newsletterForm = document.getElementById('newsletter-form');
	if (newsletterForm) {
		newsletterForm.addEventListener('submit', function (e) {
			e.preventDefault();
			var input = newsletterForm.querySelector('input');
			input.value = '';
			input.placeholder = getLocale() === 'en' ? 'Thanks — you are subscribed!' : 'Merci, vous êtes inscrit·e !';
		});
	}
})();
