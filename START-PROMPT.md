# Start prompt for Claude Code

1. Open a terminal in this folder (`myemmel-wordpress`) and run `claude`.
   Alternatively: Claude desktop app → Code → choose this folder.
2. Paste the prompt below.

---

Read CLAUDE.md completely. Then build the WordPress block theme for myemmel.com exactly as described there, using design/index.html as the visual and text reference and content/copy.md for the copy.

Work in this order and stop after each step for my review:
1. Ask me for the hosting provider and webspace access, then plan the repository structure, staging setup and README.md. Show me the plan before writing theme code.
2. Initialise git, create the private GitHub repository "myemmel" with the gh CLI, push the scaffold on a branch and open a pull request.
3. Build theme.json with the design tokens and self-hosted fonts.
4. Build header, footer and the six front-page patterns. Deploy to the staging copy on my webspace and compare with design/index.html at 1280 px and 390 px.
5. Create the Imprint and Privacy pages with TODO placeholders.
6. Add the GitHub Action that deploys the theme to my webspace on push to main.

Do not change any copy. Do not load anything from external domains.
