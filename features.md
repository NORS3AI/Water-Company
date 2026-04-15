# Starfrost — Storefront inventory

A short list of what the Starfrost website supports today. This is not a marketing page — it's a checklist for whoever has to keep the site running.

> Live site: https://nors3ai.github.io/Water-Company/

---

## Product line

- **3 mL** — the smaller pour
- **10 mL** — the everyday size

That's the line for launch. Two SKUs.

---

## Storefront capabilities (today)

### Catalog

- Product archive grid (auto-fit, responsive)
- Single product page (image, summary, price, add-to-cart, tabs, related)
- Cart page with totals card
- Checkout with sticky order summary on desktop
- My Account area
- Off-canvas mini-cart that opens from the header cart icon
- Cart count badge auto-refreshes after AJAX add-to-cart

### Pages and content

- Standard WordPress page + post templates
- Search results page
- 404 page
- Comments template

### Header / nav

- Optional top announcement bar (Customizer-controlled)
- Sticky frosted-glass site header
- Primary nav with hover + keyboard-accessible submenus
- Account icon + cart icon in the header
- Off-canvas mobile drawer with overlay, body scroll lock, and ESC to close

### Footer

- Three widget areas
- Footer nav menu
- Brand tagline + legal disclaimer (Customizer-controlled)

### Brand controls (Customizer)

- Frost accent color
- Glow color
- Top-bar message + visibility
- Footer tagline
- Legal disclaimer

### Editor / page-builder integration

- Block editor styles (Gutenberg) match the front-end aesthetic
- Elementor compatibility layer: theme builder locations registered, brand tokens injected into the editor + preview iframes
- WooCommerce: full theme support declared, including product gallery zoom, lightbox, and slider

---

## Things to add (when needed)

These are not promises — just notes for when there's time:

- Quick-view modal on the product grid
- Free-shipping progress meter in the mini-cart
- Quantity stepper (`+ / −`) on cart and single product
- COA / certificate download widget on product pages
- Pre-built Elementor templates for homepage, about, contact, and product pages
- Translation `.pot` file under `languages/`

---

## Versioning

Semantic versioning. Current: **`1.0.0`**.

- **Major**: breaking change to template structure, hooks, or class names.
- **Minor**: new feature, new template, new hook.
- **Patch**: bug fixes, copy tweaks, dependency-free style adjustments.
