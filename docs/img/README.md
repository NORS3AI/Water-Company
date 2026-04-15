# Glacix — Logo drop-in folder

Drop your logo file here and the public landing page at
**https://nors3ai.github.io/Water-Company/** will pick it up
automatically. No code changes needed.

## How it works

The landing page (`docs/index.html`) tries to load a logo from this
folder, in this order:

1. `img/logo.svg`
2. `img/logo.png`
3. `img/logo.jpg`
4. `img/logo.jpeg`

The first one that exists wins. If none are present, the page falls
back to the default Glacix wordmark.

## How to drop one in

You can do this entirely from the GitHub web UI — no clone, no terminal:

1. Open **https://github.com/NORS3AI/Water-Company/tree/main/docs/img**
2. Click **Add file → Upload files**
3. Drag your logo. **Name it `logo.svg`** (or `.png` / `.jpg` / `.jpeg`).
4. Commit straight to `main`.
5. Wait ~1 minute for GitHub Pages to redeploy.
6. Refresh the live site — your logo is up.

## Notes

- **SVG is preferred** — it scales perfectly at any size and stays
  crisp on retina screens. PNG with a transparent background is a
  fine second choice.
- The logo will be displayed at roughly 32&nbsp;px tall in the
  header. SVG handles this on its own; for raster files, supply
  something around 200 × 64 (or larger, with the same aspect
  ratio).
- Keep the file small (&lt; 50 KB ideally). SVGs from Figma /
  Illustrator are usually well under that already.
- The file must be named exactly `logo.svg`, `logo.png`,
  `logo.jpg`, or `logo.jpeg` — anything else won't be picked up.
