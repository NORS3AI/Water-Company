# Starfrost

The website for **Starfrost** — a small company shipping 3&nbsp;mL and 10&nbsp;mL products under the Starfrost name.

> Live site / preview: **https://nors3ai.github.io/Water-Company/**

This repository holds two things:

1. **`docs/`** — the public-facing landing page for Starfrost, hosted on GitHub Pages.
2. **`wp-content/themes/starfrost/`** — the WordPress + WooCommerce theme that powers the production storefront.

The codebase exists to run the company website. We aren't selling the theme — we're selling Starfrost.

---

## What's in here

```
Water-Company/
├── docs/                          ← public landing (GitHub Pages source)
│   ├── index.html
│   ├── assets/landing.css
│   └── README.md
├── wp-content/themes/starfrost/   ← the storefront theme
│   ├── style.css                  ← theme metadata
│   ├── functions.php              ← bootstrap; loads inc/*
│   ├── header.php / footer.php / page.php / single.php / index.php
│   ├── archive.php / search.php / 404.php / searchform.php / comments.php
│   ├── inc/                       ← one module per concern
│   │   ├── setup.php
│   │   ├── enqueue.php
│   │   ├── template-tags.php
│   │   ├── template-functions.php
│   │   ├── customizer.php
│   │   ├── woocommerce.php
│   │   └── elementor.php
│   ├── template-parts/            ← header, footer, content blocks
│   ├── woocommerce/               ← WooCommerce template overrides
│   └── assets/
│       ├── css/                   ← tokens → base → layout → components → woocommerce → elementor → utilities
│       └── js/app.js
├── CLAUDE.md                      ← guidance for Claude / Claude Code
├── features.md                    ← short inventory of what the storefront supports
└── README.md                      ← you are here
```

---

## The product line

Starfrost ships in two sizes to start:

- **3 mL** — the smaller pour
- **10 mL** — the everyday size

That's the line. We'd rather get two SKUs right than ship a catalog.

---

## Running the storefront

The production site is a WordPress install with WooCommerce and (optionally) Elementor.

1. Drop `wp-content/themes/starfrost/` into a WordPress install's `wp-content/themes/` directory.
2. In **Appearance → Themes**, activate **Starfrost**.
3. Install and activate **WooCommerce**. The theme picks it up automatically.
4. (Optional) install **Elementor** to compose pages with Starfrost-styled widgets.
5. Set up the two products in **Products → Add New** (3 mL and 10 mL).
6. Visit **Appearance → Customize → Starfrost** to set the brand color, top-bar message, and footer copy.

That's the setup. The theme bootstraps everything else from `functions.php` and the `inc/` modules.

---

## Look and feel

Starfrost is dark-first and quiet.

- **Background**: pure black `#000000` with a faint radial wash so it doesn't feel flat.
- **Accent**: ice-cyan `#a5f3fc` and a softer glacier glow `#7dd3fc`. Two colors do the work.
- **Type**: *Space Grotesk* for display, *Inter* for body. Tight tracking on display.
- **Surfaces**: hairline borders, generous spacing, frosted-glass header.
- **Motion**: short, soft easing. Honors `prefers-reduced-motion`.

All of this lives as CSS variables in [`wp-content/themes/starfrost/assets/css/tokens.css`](wp-content/themes/starfrost/assets/css/tokens.css). Edit there and the whole site follows.

---

## Editing the site

There's no build step. Plain CSS, plain ES5+ JavaScript. Anyone who can open a file can edit it.

Common edits:

- **Tweak brand colors / spacing / type** → `assets/css/tokens.css`
- **Change the header layout** → `template-parts/header/site-header.php`
- **Change the shop card markup** → `inc/woocommerce.php` + `assets/css/woocommerce.css`
- **Add a Customizer option** → `inc/customizer.php`
- **Add a new module** → drop a file in `inc/` and add it to the array in `functions.php`

---

## Hosting / GitHub Pages

The public landing page is hosted on **GitHub Pages** from the `main` branch's `/docs` folder.

- **Source**: `main` branch, `/docs` folder
- **URL**: https://nors3ai.github.io/Water-Company/

To enable: in the GitHub repo, go to **Settings → Pages**, choose **Deploy from a branch**, set **Branch: `main`** and **Folder: `/docs`**, then **Save**. First publish takes ~1–2 minutes.

The username portion of a GitHub Pages URL (`nors3ai`) is served lowercase regardless of how the org is cased on GitHub. The repo name (`Water-Company`) is case-sensitive.

---

## Disclaimer

Starfrost products are intended for laboratory and research use. Nothing in this repository or on the storefront is medical advice.
