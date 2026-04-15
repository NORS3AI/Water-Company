# CLAUDE.md

Guidance for Claude (and Claude Code) when working inside this repository.

## What this repo is

This is the **Glacix** company website. Glacix sells **Bacteriostatic Water** in two sizes — **3&nbsp;mL** and **10&nbsp;mL**. The brand voice is three words: **Pure. Clean. Quality.** We are not selling the theme; we are selling Glacix. Keep that framing in everything you write.

The "space" in the design language means **void, frost, dark, sleek, pure** — never planets, shuttles, aliens, or cosmic clutter.

Public landing page: https://nors3ai.github.io/Water-Company/

(GitHub Pages always serves the username/org portion in lowercase — `nors3ai` — but the repo name `Water-Company` is case-sensitive and keeps its caps.)

## Repository

```
docs/                           ← public landing (GitHub Pages, main branch /docs)
├── index.html
├── assets/landing.css
└── README.md

wp-content/themes/glacix/    ← the storefront theme
├── style.css                   ← theme metadata only (required by WordPress)
├── functions.php               ← bootstrap; loads everything in inc/
├── index.php / page.php / single.php / archive.php / search.php / 404.php
├── header.php / footer.php / searchform.php / comments.php
├── inc/                        ← one module per concern
│   ├── setup.php               ← theme supports, menus, image sizes, palette
│   ├── enqueue.php             ← CSS + JS registration (modular order matters)
│   ├── template-tags.php       ← reusable template helpers
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

README.md                       ← human-facing intro
features.md                     ← short inventory of what the storefront supports
CLAUDE.md                       ← (this file)
```

## Branch model

- Develop directly on **`main`**.
- The user does **not** like pull requests. Push commits straight to `main`.
- Never force-push, never reset, never delete branches without explicit permission.

## Voice (do not stray)

The site is for **a company**, not a theme. When you write copy, default text, or commit messages, write like Glacix is the product. Don't brag about the theme. Don't list theme features in user-facing copy.

- **Lead with what we sell.** Bacteriostatic Water, in two sizes — 3 mL and 10 mL. That's the line.
- **The brand voice is three words.** *Pure. Clean. Quality.* Use it as the descriptor pattern. Don't soften it.
- **Be tight.** Short sentences. No marketing fluff. No exclamation points. No "quietly", no "made carefully", no humble-brag voice.
- **No clichés.** No rocket emojis, no planet illustrations, no astrology iconography, no "to the moon" language. Glacix reads as a clinical, modern operation that happens to feel like deep space.
- **No theme talk in the public landing.** `docs/index.html` is the company website — it should read like a company website, not a theme demo.

## Design language (do not stray)

- **Void**: `#000000` background, soft radial wash, no decorative gradients beyond what `tokens.css` defines.
- **Frost**: `#a5f3fc` (primary accent) and `#7dd3fc` (glow). These are the only "color" colors.
- **Type**: *Space Grotesk* for display headings; *Inter* for body. Tight tracking on display.
- **Surfaces**: hairline borders (`--gx-border`), generous spacing, frosted-glass header/drawer.
- **Motion**: `cubic-bezier(0.16, 1, 0.3, 1)`, short and soft. Honor `prefers-reduced-motion`.

## Conventions

- **CSS class prefix**: `gx-` (e.g. `gx-btn`, `gx-product-card`). WooCommerce native classes are kept and styled alongside.
- **PHP function prefix**: `glacix_` (e.g. `glacix_setup`, `glacix_cart_link`).
- **PHP constant prefix**: `GLACIX_` (e.g. `GLACIX_VERSION`, `GLACIX_DIR`).
- **JS namespace**: `window.Glacix`. Localized data: `window.GlacixData`.
- **Indentation**: tabs in PHP and CSS (matches WordPress core conventions); 2-space JS is fine.
- **Escaping**: always escape on output (`esc_html`, `esc_attr`, `esc_url`, `wp_kses_post`).
- **i18n**: every user-facing string goes through a `__()` / `_e()` / `esc_html__()` call with the `'glacix'` text domain.

## When changing the theme

1. **Tokens are the source of truth.** Color, type, spacing, radius, motion all live in `assets/css/tokens.css`. Don't hardcode hex codes elsewhere — extend the token set if you need a new value.
2. **Keep modules small.** If a concern doesn't fit in an existing `inc/*.php` or `assets/css/*.css` file, make a new module and register it in `functions.php` (or in the enqueue order in `inc/enqueue.php`).
3. **Don't fight WooCommerce.** Prefer hooks (`add_action` / `add_filter`) and template overrides under `wp-content/themes/glacix/woocommerce/`. Don't monkey-patch WC core.
4. **Don't fight Elementor.** When Elementor is active, `inc/elementor.php` injects tokens into both the editor and the preview iframe. Add Elementor-specific tweaks in `assets/css/elementor.css` rather than scattering them.
5. **Test with Woo + Elementor toggled both on and off.** The theme must render gracefully whether either plugin is installed.

## When changing docs

- The public landing page is `docs/index.html` (served from `main` branch, `/docs` folder, at https://nors3ai.github.io/Water-Company/). It is the company landing — keep it about Glacix and the products, not about the theme.
- `README.md` is the developer-facing intro for someone landing in this repo.
- `features.md` is a short inventory of what the storefront supports.

## Do / don't

**Do**

- Push directly to `main`.
- Keep PHP, CSS, JS modular. One concern per file.
- Use `gx-` / `glacix_` / `GLACIX_` prefixes.
- Re-use design tokens.
- Write copy that sounds like a clinical, modern company that sells one thing well.

**Don't**

- Don't open pull requests. The user doesn't like them.
- Don't pull in heavy build tools (webpack, vite, sass) without an explicit ask.
- Don't introduce astrology / SpaceX / planet imagery.
- Don't sell the theme on the public landing — sell Glacix.
- Don't bypass WP escaping or sanitization.
- Don't rename the `glacix` theme slug or `'glacix'` text domain casually — many places reference it.
