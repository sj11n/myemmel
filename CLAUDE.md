# CLAUDE.md — myemmel.com

Brief for Claude Code. Claude Code loads this file automatically at the start of every session in this folder. Read this file completely before writing code.

## Goal

Turn the approved one-page design in `design/index.html` into a production WordPress site for **myemmel.com**, versioned on GitHub, with a repeatable local setup and deployment.

The design and the copy are **final and approved**. Do not rewrite text, change wording, add sections, or "improve" the design. Reproduce it faithfully. If something cannot be reproduced 1:1 in WordPress, stop and ask.

## What the site is

Personal page of Björn Emmerling. Audience: decision-makers who are evaluating him for a leadership role (transformation, strategy, operations). It is not a sales or consulting page. Tone: restrained, factual, no marketing language.

## Source of truth

| File | Meaning |
|---|---|
| `design/index.html` | Approved design and copy. Pixel and text reference. |
| `assets/bjoern-portrait.jpg` | Original portrait (hero image). |
| `content/copy.md` | The same copy as plain text, for building blocks/patterns. |
| `legal/impressum.md` | Draft Impressum (German) for `/imprint`. Publish only the part above "Hinweise zum Entwurf". |
| `legal/datenschutz.md` | Draft privacy policy (German) for `/privacy`. Publish only the part above "Hinweise zum Entwurf". Resolve the TODOs with Björn. |

## Technical decisions (already made)

1. **Block theme**, custom, minimal: `wp-content/themes/myemmel/`.
   - `theme.json` holds all design tokens (colors, font families, font sizes, spacing). No page builder (no Elementor, Divi etc.).
   - Front page built from **block patterns** (one per section: hero, facts, story, how-i-work, path, contact) so Björn can edit text in the block editor later.
   - Custom CSS only where `theme.json` cannot express it (the two "11" bars, the lime underline, KPI top rules). Keep it in `assets/css/theme.css`, small and commented.
2. **Fonts self-hosted.** Montserrat (500–800) and Manrope (400–600) as WOFF2 inside the theme, registered via `theme.json` `fontFace`. **No requests to fonts.googleapis.com** (German GDPR case law, LG München 2022).
3. **No cookies, no external requests, no third-party tracking.** No cookie banner needed if this holds. Check with the browser network tab.
   - **Visitor counting:** install the plugin **Koko Analytics** (self-hosted, stores stats in the WordPress DB, no personal data). In its settings **turn off** "Use cookie to determine unique visitors" and exclude logged-in admins. The privacy policy (`legal/datenschutz.md`, section 5) relies on exactly this setup. This is the only plugin in v1.
4. **Portrait**: upload to the media library, let WordPress generate sizes, use `srcset`. Alt text: "Björn Emmerling".
5. **Legal pages (required in Germany before going live):** create `/imprint` and `/privacy` as normal pages from `legal/impressum.md` and `legal/datenschutz.md`. Link them in the footer. Ask Björn to confirm the open TODOs (phone number, STRATO log retention, go-live date) before launch. Disable WordPress comments and pingbacks site-wide.
6. **Contact**: e-mail `bjoern@myemmel.com` as a normal, readable, clickable `mailto:` link (no "(at)" spelling). Output it through WordPress `antispambot()` so the address is HTML-entity encoded in the source (basic harvester protection without hurting usability). LinkedIn button. No contact form in v1.
7. **SEO basics** without plugin: page title "Björn Emmerling · MYEMMEL", meta description from the hero intro, Open Graph image = portrait, `lang="en"`.
8. **Accessibility**: keep heading order (one h1), visible focus states, decorative "11" bars `aria-hidden`.
9. **Performance target**: Lighthouse ≥ 95 on mobile for Performance, Accessibility, Best Practices, SEO.

## Hosting: STRATO (www.myemmel.com)

- Access: STRATO customer login → "Datenbanken und Webspace" → "SFTP & SSH" → create access, type **SFTP** (or SFTP + SSH if terminal access is needed). Available from package "Hosting Starter" upwards.
- Connection: hostname as shown in the STRATO login (pattern `…ssh.w….strato.hosting`), **port 22**, auto-generated username starting with `su…`.
- GitHub secrets to create: `STRATO_SFTP_HOST`, `STRATO_SFTP_USER`, `STRATO_SFTP_PASSWORD` (or an SSH key if the package allows it), `STRATO_THEME_PATH` (absolute path to `wp-content/themes/myemmel` on the webspace).
- STRATO has no built-in Git deploy: deploy with a GitHub Action via SFTP (e.g. rsync over SSH if SSH is available, otherwise an SFTP upload action). Upload only the theme folder.
- First check with Björn whether WordPress is already installed on the webspace and in which directory. If not: install via STRATO's WordPress app installer in the customer login, PHP ≥ 8.1, then continue.
- Never ask Björn to paste passwords into the chat or into files. He enters them himself in GitHub → Settings → Secrets.

## Repository layout (target)

```
myemmel/
├─ CLAUDE.md
├─ README.md                 # setup, local dev, deploy — written for Björn
├─ .github/workflows/
│  └─ deploy.yml            # upload theme to the webspace on push to main
├─ design/index.html        # reference, never deployed
├─ assets/bjoern-portrait.jpg
├─ content/copy.md
└─ wp-content/themes/myemmel/
   ├─ style.css             # theme header only
   ├─ theme.json
   ├─ functions.php         # enqueue theme.css, register patterns, nothing else
   ├─ templates/front-page.html, page.html, index.html
   ├─ parts/header.html, footer.html
   ├─ patterns/*.php        # hero, facts, story, how-i-work, path, contact
   └─ assets/{css,fonts}/
```

## Workflow

1. Create the GitHub repository `myemmel` (private) and push the scaffold on a branch, open a PR. Do not push directly to `main`.
2. **No local environment** (no Docker, no Node). The site runs on Björn's existing webspace at www.myemmel.com. Test on a staging copy on the same webspace (e.g. `staging.myemmel.com` or a subfolder), or on the live site behind a "coming soon" page until approved. The front page must match `design/index.html` at 1280 px and 390 px width.
3. Put a side-by-side screenshot comparison (design vs. WordPress, desktop + mobile) in the PR description.
4. Deployment: GitHub Action that uploads `wp-content/themes/myemmel/` to the webspace via SFTP/FTPS on push to `main` (or the hoster's own Git deploy if available). **Ask Björn for the hosting provider and access data first.** Store credentials only as GitHub Actions secrets, never in the repo. Check that WordPress is installed on the webspace (PHP ≥ 8.1); if not, guide Björn through the hoster's one-click install.
5. Only the theme folder is deployed.
6. Use plan mode for step 1 and show the plan before writing code. Commit in small, reviewable steps. WordPress core, plugins and the database stay on the host.

## Design tokens (from design/index.html)

| Token | Value | Use |
|---|---|---|
| bg | `#F7F8F6` | page background |
| ink | `#101D32` | headlines, rules, contact block |
| text | `#2B3749` | body text |
| muted | `#667B91` | labels, secondary text |
| rule | `#DFE4E8` | thin dividers |
| lime | `#D6F342` | underline in hero, quote bar, LinkedIn button, footer mark — nowhere else |
| headings | Montserrat 600–800 | |
| body | Manrope 400–600, 18px / 1.7 | |

Brand mark: two vertical bars = jersey number 11. Appears in the logo, before each section label, beside the portrait, and in the footer (lime). Do not add it anywhere else.

## Do not

- change copy, add words like "passionate", "expert", "results-driven"
- add sliders, animations, icons, stock images, testimonials
- install plugins without asking (exception: Koko Analytics, see above)
- load anything from third-party domains
