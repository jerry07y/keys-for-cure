# SPEC 0002: Three Benchmark Theme Concepts Redesign with Real Exemplar Content

## Problem Statement

Keys for Cure (Registered Charity CC63798) needs high-impact, professional web presentations tailored to distinct donor audiences (patron benefactors, student musician families, and clinical hospital grant-makers). The previous theme prototypes were generic and lacked the visual pedigree of established international charities, and used generic placeholder text rather than the charity's true history, founder details, and high-profile government endorsements.

## Solution

Redesign the 3 theme concepts inside `wp-content/plugins/keys-for-cure-ai/concept-layouts.php` to mirror the distinct design DNA of three globally recognized musical charities, while incorporating authentic exemplar data from `keysforcure.org.nz` (Nick Wang & Young Musicians, Prime Minister Christopher Luxon's quote, Minister Paul Goldsmith's testimonial, Starship Children's Hospital partnership, and the Children's Mental Wellbeing Support Salon). All interactive functions (DeepSeek AI Chatbot, native Elfsight-style event calendar with 1-step RSVP, and `/checkin/` mobile door scanner) remain 100% operational and embedded across all three designs, switchable with 1-click in the WordPress admin panel.

## User Stories

1. As a site visitor, I want to experience Concept 1 (London Music Fund / Sphinx archetype) with an editorial midnight-navy and champagne-gold gala layout, so that I feel the prestige of a world-class classical concert hall.
2. As a site visitor, I want to experience Concept 2 (Playing For Change Foundation archetype) with an energetic electric-cobalt and sunburst-amber layout, so that I feel the grassroots energy of youth musician empowerment.
3. As a site visitor, I want to experience Concept 3 (Nordoff and Robbins archetype) with a calm, Scandinavian minimalist layout, so that I appreciate the clinical therapeutic and healthcare impact of the charity.
4. As a potential donor, I want to read the authentic endorsement quote from New Zealand Prime Minister Christopher Luxon on the homepage, so that I have immediate trust in the charity's standing and credibility.
5. As a classical music patron, I want to read the testimonial from Arts Minister Hon Paul Goldsmith, so that I understand the historical contribution of Nick Wang and the Young Musicians.
6. As an attendee, I want to interact with the native Elfsight-style event calendar on all three themes, so that I can view upcoming concerts and reserve passes with 1-step RSVP on any design.
7. As a concert guest, I want to generate my digital Concert Pass with offline SVG QR code regardless of which theme concept is active, so that my ticket scanning is never disrupted by aesthetic changes.
8. As a site visitor, I want to ask questions to the floating DeepSeek AI Chatbot on all three theme concepts, so that I receive immediate answers about concerts, parking, and donations.
9. As a venue volunteer, I want to navigate to `/checkin/` and scan passes using my phone camera on any theme, so that door operations remain identical regardless of website styling.
10. As a charity manager, I want to switch between Concept 1, Concept 2, and Concept 3 with 1-click in the Keys for Cure Operations Hub, so that I can audition styles in real time before major gala launches.
11. As a mobile visitor, I want all three themes to be fully responsive with fluid typography and tap-friendly buttons, so that browsing on iOS and Android devices is flawless.
12. As an accessibility-reliant visitor, I want high color contrast and semantic HTML headings on all three layouts, so that screen readers and keyboard navigation operate smoothly.

## Implementation Decisions

- **Architecture & Modularity**: The layout renderers remain encapsulated in `wp-content/plugins/keys-for-cure-ai/concept-layouts.php` through `KFC_Concept_Layouts::render_active_concept()`. The module reads the active concept setting from `kfc_active_theme_concept` and routes to `render_concept_1_symphonic_prestige`, `render_concept_2_harmonies_of_hope`, or `render_concept_3_nordic_minimalist`.
- **Benchmark 1 Design Tokens**:
  - Palette: Midnight Obsidian (`#090D16`), Champagne Gold (`#C5A059`), Crisp Alabaster (`#F8FAFC`).
  - Typography: Classical editorial serif (Playfair Display / Georgia) headers paired with uppercase letterspaced metadata.
  - Structure: Full-bleed hero with gold concert badge, Luxon quote marquee, Starship partner banner, dark gala calendar cards, soloist spotlight, and formal board transparency section.
- **Benchmark 2 Design Tokens**:
  - Palette: Electric Cobalt Blue (`#0052CC`), Sunburst Amber (`#F59E0B`), Energetic Ruby (`#EF4444`), Pure White (`#FFFFFF`).
  - Typography: Bold Neo-Grotesque sans-serif (Inter / Montserrat) with dynamic impact badges.
  - Structure: Split-screen hero with pianist action imagery and instant RSVP CTA, 3-column impact stat counters, Children's Mental Wellbeing Support Salon feature, high-contrast calendar grid, and community donation buttons.
- **Benchmark 3 Design Tokens**:
  - Palette: Slate Charcoal (`#18181B`), Nordic Healing Pine/Teal (`#0D9488`), Paper Cream (`#F4F4F5`), Crisp White (`#FFFFFF`).
  - Typography: Swiss Modernist Grotesque with expansive line-height and calm spacing.
  - Structure: Architectural header with documentary music therapy imagery, two-column clinical thesis, chronological timeline table with venue pins and modal RSVP, hospital allocation breakdown, and minimalist audit card.
- **Exemplar Content Integration**: Hardcoded placeholder strings are completely replaced with real content from `keysforcure.org.nz`: Nick Wang & Young Musicians history, quotes from Christopher Luxon & Hon Paul Goldsmith, Starship Children's Hospital, Cancer Society NZ, Breast Cancer Foundation, Mercy Hospice, Takapuna address, and Charity Registration No. CC63798.
- **Functional Embedding**: Every layout renders `do_shortcode('[kfc_event_calendar]')` and includes styling adapters so calendar cards naturally inherit the theme's color palette and fonts.

## Testing Decisions

- **Testing Philosophy**: Verify behavior through public seams: layout rendering output, theme switcher state transition, and embedded functional availability.
- **Seams to Test**:
  1. **Concept 1 Seam**: Verify `render_concept_1_*` produces valid HTML containing the London Music Fund / Sphinx gold styling, Luxon quote, and `kfc-calendar-wrap`.
  2. **Concept 2 Seam**: Verify `render_concept_2_*` produces valid HTML containing the Playing For Change cobalt/amber styling, impact counters, and `kfc-calendar-wrap`.
  3. **Concept 3 Seam**: Verify `render_concept_3_*` produces valid HTML containing the Nordoff and Robbins Scandinavian pine/teal styling, clinical thesis, and `kfc-calendar-wrap`.
  4. **Switcher Seam**: Verify changing `kfc_active_theme_concept` via `update_option` dynamically swaps front-end output.
- **Test Harness**: Executed inside Docker container `my-full-stack` against live WordPress database and theme templates.

## Out of Scope

- Modifying WordPress core block theme templates (`templates/index.html`); layouts are delivered dynamically via plugin filters so they work across any block or classic theme.
- Changing event data structure or registration database schema; all existing event posts and registrations remain untouched.

## Further Notes

- Maintains $0 ongoing software cost.
- Preserves 100% compatibility with automated GitHub Actions staging deployment.
