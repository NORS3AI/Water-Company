# Starfrost

A WooCommerce theme for **Starfrost** — a Bacteriostatic Water company. Pure void canvas, frost-blue accents, modern and sleek.

> Live preview / docs: **https://NORS3AI.github.io/Water-Company/**

Starfrost is a WordPress theme built specifically for selling Bacteriostatic Water (Bac Water). It is designed to feel modern, clinical, and uncluttered — like staring into deep, quiet space — while staying friendly to merchants who build pages with **Elementor** on top of **WooCommerce**.

The project name **Starfrost** is the working company name (still pending). The product focus is exclusively Bacteriostatic Water — Starfrost is **not** a peptides company.

---

## Quick facts

| | |
|---|---|
| **Theme name** | Starfrost |
| **Theme location** | `wp-content/themes/starfrost/` |
| **Built for** | WordPress 6.2+, WooCommerce, Elementor (optional) |
| **PHP** | 7.4+ |
| **Aesthetic** | Void, frost, sleek, modern. Dark-first. |
| **Live demo / docs** | https://NORS3AI.github.io/Water-Company/ |
| **License** | GPL-2.0-or-later |

---

## Installation

1. Copy `wp-content/themes/starfrost/` into your WordPress install's `wp-content/themes/` directory (or symlink it during development).
2. In WordPress admin, go to **Appearance → Themes** and activate **Starfrost**.
3. Install and activate **WooCommerce**. Starfrost will pick it up automatically.
4. (Optional but recommended) install **Elementor** to compose pages with Starfrost-styled widgets.
5. Visit **Appearance → Customize → Starfrost: Brand / Header / Footer** to set brand color, top-bar message, and footer copy.

That's the full setup. The theme bootstraps everything else from `functions.php` and the `inc/` modules.

---

## Project layout

```
Water-Company/
├── wp-content/
│   └── themes/
│       └── starfrost/          ← the theme itself
│           ├── style.css       ← theme metadata (required by WordPress)
│           ├── functions.php   ← bootstrap; loads inc/*
│           ├── index.php       ← fallback template
│           ├── header.php      ← document head + opening shell
│           ├── footer.php      ← closing shell
│           ├── page.php        ← single page template
│           ├── single.php      ← single post template
│           ├── archive.php     ← archive fallback
│           ├── search.php      ← search results
│           ├── 404.php         ← "lost in the void" page
│           ├── searchform.php  ← reusable search form
│           ├── comments.php    ← comments template
│           ├── inc/            ← modular concerns
│           │   ├── setup.php
│           │   ├── enqueue.php
│           │   ├── template-tags.php
│           │   ├── template-functions.php
│           │   ├── customizer.php
│           │   ├── woocommerce.php
│           │   └── elementor.php
│           ├── template-parts/ ← composable html chunks
│           │   ├── header/
│           │   ├── footer/
│           │   └── content/
│           ├── woocommerce/    ← Woo template overrides
│           │   ├── archive-product.php
│           │   ├── content-product.php
│           │   ├── cart/mini-cart.php
│           │   └── global/wrapper-(start|end).php
│           └── assets/
│               ├── css/        ← tokens, base, layout, components, woocommerce, elementor, utilities, editor
│               ├── js/         ← app.js (nav, drawers, sticky header)
│               └── svg, fonts, images
├── docs/                       ← GitHub Pages source (served from branch:main /docs)
│   └── index.html              ← public landing page
├── CLAUDE.md                   ← guidance for Claude / Claude Code in this repo
├── features.md                 ← feature inventory + roadmap
└── README.md                   ← you are here
```

The theme is **modular by design**: each concern (setup, enqueue, customizer, WooCommerce, Elementor) lives in its own file under `inc/`, and the visual layer is split across small CSS modules under `assets/css/`. To turn off a feature or replace a layer, you edit a single file.

---

## Design language

Starfrost is built around a small, deliberate design language.

- **Void** — pure black `#000000` page background, with a near-invisible radial wash so the void never feels totally flat. No imagery is required to feel atmospheric.
- **Frost** — ice-cyan `#a5f3fc` accent for interactive elements, paired with a softer glacier-blue `#7dd3fc` glow.
- **Ghost white** `#f8f8ff` for primary text. Stardust `#8a8aa0` for muted text. Eclipse `#5a5a72` for low-emphasis.
- **Type** — *Space Grotesk* for display, *Inter* for body. Tight tracking, generous line-height.
- **Surfaces** — gently elevated panels with hairline borders (`#2a2a3a`). Frosted-glass headers and drawers.
- **Motion** — short, soft easing (`cubic-bezier(0.16, 1, 0.3, 1)`). Respect `prefers-reduced-motion`.

All of these values live as CSS custom properties in [`wp-content/themes/starfrost/assets/css/tokens.css`](wp-content/themes/starfrost/assets/css/tokens.css). Edit there and the entire theme follows.

---

## WooCommerce

Starfrost declares full WooCommerce theme support and re-skins the most user-facing surfaces:

- Shop archive (grid card layout, sale badges, ordering toolbar)
- Single product (image, summary, tabs, related)
- Cart page
- Checkout page (sticky order summary on desktop)
- My Account
- Mini-cart inside an off-canvas drawer that opens from the header cart link
- Cart count fragment auto-refreshes after AJAX add-to-cart

Theme overrides live in `wp-content/themes/starfrost/woocommerce/`. The `inc/woocommerce.php` module wires up filters and hooks; CSS lives in `assets/css/woocommerce.css`.

---

## Elementor

Starfrost is built so Elementor can drive page composition without fighting the theme.

- The theme registers Starfrost as Elementor-aware on `elementor/loaded`.
- Starfrost color tokens are injected into the Elementor editor and preview, so widgets pick up the brand palette automatically.
- Elementor Pro theme builder locations (header / footer / single / archive) are registered.
- An Elementor compatibility CSS layer reskins the default Elementor button, heading, and form widgets.

If Elementor is not installed, the theme renders normally via its own templates.

---

## Customizer options

Settings → Appearance → Customize:

- **Starfrost: Brand** — Frost accent color, glow color
- **Starfrost: Header** — Top bar visibility + announcement message
- **Starfrost: Footer** — Tagline, legal disclaimer

These map to CSS variables that update live without recompiling stylesheets.

---

## Development

Starfrost has no build step — everything in `assets/css/` and `assets/js/` is plain CSS and ES5+ JavaScript. The reasoning: a theme should be readable and editable by anyone who can open a file, and a Bac Water store does not need a webpack pipeline.

Common tasks:

- **Tweak design tokens** → edit `assets/css/tokens.css`
- **Adjust shop card markup** → edit `inc/woocommerce.php` and `assets/css/woocommerce.css`
- **Change header layout** → edit `template-parts/header/site-header.php`
- **Add a Customizer option** → edit `inc/customizer.php`
- **Add a new module** → drop a file in `inc/` and add it to the array in `functions.php`

---

## Hosting / GitHub Pages

This repository uses **GitHub Pages** to host a public landing/preview page from the `main` branch's `/docs` folder.

- **Source**: `main` branch, `/docs` folder
- **URL**: https://NORS3AI.github.io/Water-Company/

To enable: in the GitHub repo, go to **Settings → Pages**, select **Branch: main** and **Folder: /docs**, then save.

---

## License

GPL-2.0-or-later. See [LICENSE](LICENSE) if present.
