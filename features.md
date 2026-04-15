# Starfrost — Features

A living inventory of what the theme ships with today and what is on the horizon.

> Live preview / docs: https://NORS3AI.github.io/Water-Company/

---

## Shipped — v1.0.0

### Foundation

- **Modular file structure.** Every concern (setup, enqueue, template tags, customizer, WooCommerce, Elementor) is its own file under `inc/`. Add or remove a feature by touching one file.
- **WordPress standards.** Theme metadata in `style.css`, `functions.php` bootstrap, full template hierarchy (`index.php`, `page.php`, `single.php`, `archive.php`, `search.php`, `404.php`, `searchform.php`, `comments.php`).
- **WordPress feature support.** Title tag, automatic feed links, post thumbnails, custom logo, HTML5 markup, responsive embeds, wide alignment, editor styles, custom image sizes (`starfrost-product`, `starfrost-hero`, `starfrost-card`), translation-ready (`starfrost` text domain), four navigation menu locations (primary, footer, utility, mobile), three footer widget areas.
- **Customizable brand.** Theme Customizer panels for Brand (accent color, glow color), Header (top-bar message + visibility), Footer (tagline, legal disclaimer). Changes apply via CSS variables instantly.

### Design system

- **Design tokens.** All color, type, spacing, radius, shadow, motion live as CSS custom properties in `assets/css/tokens.css`. Single source of truth.
- **Void aesthetic.** Pure `#000` background with a soft radial wash, ghost-white text, ice-cyan accent, glacier glow.
- **Type system.** Space Grotesk for display, Inter for body. Fluid type scale via `clamp()`.
- **Reusable components.** Buttons (primary, ghost, minimal, icon), badges, surface cards, hero, section heads, search form, breadcrumbs, post cards, comments, 404 glyph.
- **Layout primitives.** Containers (default / narrow / wide / full), responsive header with frosted-glass backdrop, responsive footer with column widgets, post grid, pagination.
- **Reduced-motion respect.** Animations collapse to instant when `prefers-reduced-motion` is set.
- **Block editor styles.** Editor preview mirrors the front-end aesthetic via `assets/css/editor.css`.
- **Custom scrollbar.** Quiet but visible against the void.

### Header & navigation

- **Optional top announcement bar.** Customizer-controlled. Pulses an accent dot.
- **Sticky frosted-glass header.** Saturates and blurs the void underneath. Stuck-class on scroll for added shadow if needed.
- **Primary nav with submenu support.** Hover + keyboard accessible, soft fade-in submenu.
- **Header utility cluster.** Account icon link + cart icon button (Woo only) + mobile burger.
- **Off-canvas mobile drawer.** Slides in from the right with overlay, body scroll lock, ESC to close, focus management.

### WooCommerce

- **Full theme support declared.** Including product gallery zoom, lightbox, slider.
- **Reskinned shop archive.** Grid layout (auto-fit minmax), brand sale badges, custom product card markup with link wrapper.
- **Reskinned single product.** Two-column layout, frosted-glass add-to-cart panel, brand price typography, custom tabs, related/upsell sections.
- **Reskinned cart, checkout, account.** Two-column cart with totals card, sticky order summary on checkout, sidebar account navigation.
- **Off-canvas mini-cart.** Header cart icon opens a slide-in cart drawer instead of jumping to the cart page.
- **Cart count fragment.** Cart badge auto-refreshes after AJAX add-to-cart.
- **Brand-styled WooCommerce notices.** Border accents in success / info / error states.
- **Brand-styled breadcrumbs.** Custom delimiter, brand wrapper.

### Elementor

- **Auto-detected on `elementor/loaded`.** Compatibility layer only loads when Elementor is active.
- **Theme builder locations registered.** Header, footer, single, archive locations exposed for Elementor Pro.
- **Tokens injected into editor + preview iframes.** Dragged widgets adopt brand colors and typography out of the box.
- **Compatibility CSS layer.** Reskins default Elementor button, heading, form, divider, and image-box widgets.
- **`.sf-tile` helper class.** Apply to an Elementor Image Box to get the Starfrost surface card treatment.

### JavaScript

- **`Starfrost.openDrawer / closeDrawer`** generic API for any future drawer.
- **Mobile nav drawer toggle.**
- **Cart drawer toggle.** Intercepts header cart link when WooCommerce is active.
- **Sticky header scroll handler.** Adds an `is-stuck` class on scroll.
- **Submenu accessibility wiring.** `aria-haspopup` / `aria-expanded`.
- **Zero dependencies, defer-loaded, namespaced.**

### Documentation

- **`README.md`** — public-facing project intro and dev guide.
- **`CLAUDE.md`** — guidance for Claude / Claude Code working in this repo.
- **`features.md`** — this file.
- **`docs/index.html`** — GitHub Pages landing page hosted at https://NORS3AI.github.io/Water-Company/.

---

## Roadmap (not yet shipped)

These are intentional next steps, not a contract.

### Storefront

- [ ] **Product quick-view modal.** Open a lightweight overlay with image + add-to-cart from the shop grid without a page navigation.
- [ ] **Shop filters reskin.** Brand-styled price filter, attribute filter, and category sidebar.
- [ ] **Subscription / refill cadence UI** for repeat customers (requires WC Subscriptions or similar).
- [ ] **Quantity stepper component** with `+ / −` buttons replacing the default number input on cart and single product.
- [ ] **Free-shipping progress meter** in the mini-cart.

### Brand surfaces

- [ ] **Lab-grade certificate / COA download** widget for product pages.
- [ ] **Trust band** (USA-sourced, sterile filtered, lab tested, etc.) as a reusable Elementor section preset.
- [ ] **"Not for human use" disclaimer banner** as an optional, dismissible global component.

### Performance & DX

- [ ] **Optional CSS bundle** that concatenates the seven CSS modules into one file for production.
- [ ] **Critical CSS extraction** for above-the-fold (header + hero) on first paint.
- [ ] **`screenshot.png`** for the WordPress theme picker.
- [ ] **Theme.json** for Gutenberg settings / global styles parity.
- [ ] **Playwright smoke tests** for the cart drawer + add-to-cart flow.

### Elementor

- [ ] **Custom Elementor widgets** — Starfrost Hero, Starfrost Product Carousel, Starfrost Trust Band, Starfrost FAQ.
- [ ] **Pre-built Elementor templates** — homepage, product page, about, contact, FAQ.

### Internationalization

- [ ] **`languages/starfrost.pot`** template for translators.
- [ ] **RTL stylesheet variants.**

---

## Out of scope (won't ship in this theme)

These are deliberate non-features so we don't lose focus.

- **Astrology, SpaceX, rocket, planet, shuttle, alien imagery** — Starfrost is void-themed, not space-opera-themed.
- **Peptide product templates** — Starfrost sources Bacteriostatic Water exclusively.
- **Heavy front-end frameworks** (React, Vue, Svelte) inside the theme. Elementor + a small vanilla JS file is enough.
- **A bundled page builder.** Composition is delegated to Elementor; the theme stays a theme.

---

## Versioning

Semantic versioning. Current: **`1.0.0`**.

- **Major**: breaking change to template structure, hooks, or class names.
- **Minor**: new feature, new template, new hook.
- **Patch**: bug fixes, copy tweaks, dependency-free style adjustments.
