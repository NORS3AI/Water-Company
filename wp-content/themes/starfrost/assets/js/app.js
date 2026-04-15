/*!
 * Starfrost — Front-end behavior
 * ----------------------------------------
 * Small, dependency-free, lazy-initialized.
 * - Mobile drawer toggle
 * - Cart drawer toggle (works with WooCommerce mini-cart fragments)
 * - Sticky header shadow on scroll
 * - Submenu accessibility (keyboard open/close)
 *
 * Everything is namespaced behind window.Starfrost.
 */
(function () {
	'use strict';

	const SF = (window.Starfrost = window.Starfrost || {});
	const data = window.StarfrostData || {};

	const qs  = (sel, ctx) => (ctx || document).querySelector(sel);
	const qsa = (sel, ctx) => Array.from((ctx || document).querySelectorAll(sel));

	/* -------------------------------------------------
	 * Drawer (generic open/close mechanism)
	 * ------------------------------------------------- */
	function openDrawer(drawer, overlay) {
		if (!drawer) return;
		drawer.setAttribute('data-open', 'true');
		drawer.setAttribute('aria-hidden', 'false');
		if (overlay) overlay.setAttribute('data-open', 'true');
		document.body.classList.add('sf-no-scroll');
		// Focus the close button for accessibility.
		const close = qs('[data-sf-drawer-close]', drawer);
		if (close) close.focus();
	}

	function closeDrawer(drawer, overlay) {
		if (!drawer) return;
		drawer.setAttribute('data-open', 'false');
		drawer.setAttribute('aria-hidden', 'true');
		if (overlay) overlay.setAttribute('data-open', 'false');
		document.body.classList.remove('sf-no-scroll');
	}

	SF.openDrawer = openDrawer;
	SF.closeDrawer = closeDrawer;

	/* -------------------------------------------------
	 * Mobile nav drawer
	 * ------------------------------------------------- */
	function initMobileNav() {
		const burger  = qs('[data-sf-burger]');
		const drawer  = qs('[data-sf-drawer="mobile"]');
		const overlay = qs('[data-sf-drawer-overlay]');

		if (!burger || !drawer) return;

		burger.addEventListener('click', function () {
			openDrawer(drawer, overlay);
		});

		qsa('[data-sf-drawer-close]', drawer).forEach(function (btn) {
			btn.addEventListener('click', function () {
				closeDrawer(drawer, overlay);
			});
		});

		if (overlay) {
			overlay.addEventListener('click', function () {
				closeDrawer(drawer, overlay);
			});
		}

		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape') closeDrawer(drawer, overlay);
		});
	}

	/* -------------------------------------------------
	 * Cart drawer (off-canvas mini cart)
	 * ------------------------------------------------- */
	function initCartDrawer() {
		const toggles = qsa('[data-sf-cart-toggle]');
		const drawer  = qs('[data-sf-drawer="cart"]');
		const overlay = qs('[data-sf-drawer-overlay="cart"]');

		if (!toggles.length || !drawer) return;

		toggles.forEach(function (toggle) {
			toggle.addEventListener('click', function (e) {
				// Only intercept if Woo is active (we have the mini-cart drawer).
				if (data.isWoo) {
					e.preventDefault();
					openDrawer(drawer, overlay);
				}
			});
		});

		qsa('[data-sf-cart-close]', drawer).forEach(function (btn) {
			btn.addEventListener('click', function () {
				closeDrawer(drawer, overlay);
			});
		});

		if (overlay) {
			overlay.addEventListener('click', function () {
				closeDrawer(drawer, overlay);
			});
		}
	}

	/* -------------------------------------------------
	 * Sticky header — apply a class on scroll
	 * ------------------------------------------------- */
	function initStickyHeader() {
		const header = qs('.sf-header');
		if (!header) return;

		let last = 0;
		const onScroll = function () {
			const y = window.scrollY || window.pageYOffset;
			if (y > 4 && last <= 4) {
				header.classList.add('is-stuck');
			} else if (y <= 4 && last > 4) {
				header.classList.remove('is-stuck');
			}
			last = y;
		};

		window.addEventListener('scroll', onScroll, { passive: true });
		onScroll();
	}

	/* -------------------------------------------------
	 * Keyboard-accessible submenus
	 * Adds aria-expanded toggles on parent menu items so
	 * submenus open with Enter/Space and close with Escape.
	 * ------------------------------------------------- */
	function initSubmenus() {
		qsa('.sf-nav .menu-item-has-children > a').forEach(function (a) {
			const li = a.parentElement;
			a.setAttribute('aria-haspopup', 'true');
			a.setAttribute('aria-expanded', 'false');

			a.addEventListener('focus', function () {
				a.setAttribute('aria-expanded', 'true');
			});
			li.addEventListener('mouseleave', function () {
				a.setAttribute('aria-expanded', 'false');
			});
		});
	}

	/* -------------------------------------------------
	 * Boot
	 * ------------------------------------------------- */
	function ready(fn) {
		if (document.readyState !== 'loading') return fn();
		document.addEventListener('DOMContentLoaded', fn);
	}

	ready(function () {
		initMobileNav();
		initCartDrawer();
		initStickyHeader();
		initSubmenus();
	});
})();
