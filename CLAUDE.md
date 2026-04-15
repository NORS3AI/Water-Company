# CLAUDE.md

Guidance for Claude (and Claude Code) when working inside this repository.

## What this repo is

This is the **Starfrost** WordPress + WooCommerce theme repository. Starfrost sells **Bacteriostatic Water** ("Bac Water") only — it is **not** a peptide company, **not** an astrology brand, and **not** affiliated with SpaceX. The "space" in the design language means **void, frost, dark, sleek, pure** — never planets, shuttles, aliens, or cosmic clutter.

Public preview / docs: https://nors3ai.github.io/Water-Company/

(GitHub Pages always serves the username/org portion in lowercase — `nors3ai` — but the repo name `Water-Company` is case-sensitive and keeps its caps.)

## Branch model

- Develop directly on **`main`**.
- The user does **not** like pull requests. Push commits straight to `main`.
- Never force-push, never reset, never delete branches without explicit permission.

## Where things live

```
wp-content/themes/starfrost/    ← the entire theme
├── style.css                   ← theme metadata only (required by WordPress)
├── functions.php               ← bootstrap; loads everything in inc/
├── index.php / page.php / single.php / archive.php / search.php / 404.php
├── header.php / footer.php / searchform.php / comments.php
├── inc/                        ← one module per concern
│   ├── setup.php               ← theme supports, menus, image sizes, palette
│   ├── enqueue.php             ← CSS + JS registration (modular order matters)
│   ├── template-tags.php       ← reusable template helpers (logo, cart link…)
│   ├── template-functions.php  ← filters, body classes, excerpt tweaks
│   ├── customizer.php          ← brand controls (color, top-bar, footer text)
│   ├── woocommerce.php         ← WC integration + loop reskin
│   └── elementor.php           ← Elementor compatibility layer
├── template-parts/             ← header, footer, content blocks
├── woocommerce/                ← WooCommerce template overrides
└── assets/
    ├── css/                    ← tokens → base → layout → components → woocommerce → elementor → utilities
    ├── js/app.js               ← drawers, sticky header, submenus
    ├── fonts/, images/, svg/

docs/                           ← GitHub Pages site (served from main/docs)
README.md                       ← human-facing intro
features.md                     ← feature inventory + roadmap
CLAUDE.md                       ← (this file)
```

## Design language (do not stray)

- **Void**: `#000000` background, soft radial wash, no decorative gradients beyond what `tokens.css` defines.
- **Frost**: `#a5f3fc` (primary accent) and `#7dd3fc` (glow). These are the only "color" colors.
- **Type**: *Space Grotesk* for display headings; *Inter* for body. Tight tracking on display.
- **Surfaces**: hairline borders (`--sf-border`), generous spacing, frosted-glass header/drawer.
- **Motion**: `cubic-bezier(0.16, 1, 0.3, 1)`, short and soft. Honor `prefers-reduced-motion`.
- **No clichés**: no rocket emojis, no planet illustrations, no astrology iconography, no "to the moon" language. Starfrost reads as a **clinical, modern lab brand** that happens to feel like deep space.

## Conventions

- **CSS class prefix**: `sf-` (e.g. `sf-btn`, `sf-product-card`). WooCommerce native classes are kept and styled alongside.
- **PHP function prefix**: `starfrost_` (e.g. `starfrost_setup`, `starfrost_cart_link`).
- **PHP constant prefix**: `STARFROST_` (e.g. `STARFROST_VERSION`, `STARFROST_DIR`).
- **JS namespace**: `window.Starfrost`. Localized data: `window.StarfrostData`.
- **Indentation**: tabs in PHP and CSS (matches WordPress core conventions); 2-space JS is fine.
- **Escaping**: always escape on output (`esc_html`, `esc_attr`, `esc_url`, `wp_kses_post`).
- **i18n**: every user-facing string goes through a `__()` / `_e()` / `esc_html__()` call with the `'starfrost'` text domain.

## When changing the theme

1. **Tokens are the source of truth.** Color, type, spacing, radius, motion all live in `assets/css/tokens.css`. Don't hardcode hex codes elsewhere — extend the token set if you need a new value.
2. **Keep modules small.** If a concern doesn't fit in an existing `inc/*.php` or `assets/css/*.css` file, make a new module and register it in `functions.php` (or in the enqueue order in `inc/enqueue.php`).
3. **Don't fight WooCommerce.** Prefer hooks (`add_action` / `add_filter`) and template overrides under `wp-content/themes/starfrost/woocommerce/`. Don't monkey-patch WC core.
4. **Don't fight Elementor.** When Elementor is active, `inc/elementor.php` injects tokens into both the editor and the preview iframe. Add Elementor-specific tweaks in `assets/css/elementor.css` rather than scattering them.
5. **Test with Woo + Elementor toggled both on and off.** The theme must render gracefully whether either plugin is installed.

## When changing docs

- The public landing page is `docs/index.html` (served from `main` branch, `/docs` folder, at https://nors3ai.github.io/Water-Company/).
- `README.md` is the developer-facing intro.
- `features.md` is the feature inventory and roadmap.
- `CLAUDE.md` (this file) is the guidance for Claude.

When Starfrost gains new capabilities, update `features.md` first.

## Do / don't

**Do**

- Push directly to `main`.
- Keep PHP, CSS, JS modular. One concern per file.
- Use `sf-` / `starfrost_` / `STARFROST_` prefixes.
- Re-use design tokens.
- Leave concise comments where logic isn't self-evident.

**Don't**

- Don't open pull requests. The user doesn't like them.
- Don't pull in heavy build tools (webpack, vite, sass) without an explicit ask.
- Don't introduce astrology / SpaceX / planet imagery.
- Don't suggest the brand sells peptides — it doesn't.
- Don't bypass WP escaping or sanitization.
- Don't rename the `starfrost` theme slug or `'starfrost'` text domain casually — many places reference it.
