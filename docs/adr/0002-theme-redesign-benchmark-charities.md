# ADR 0002: Redesigning Three Theme Concepts to Mirror Established Musical Charities

## Status
Accepted

## Context
Keys for Cure (Registered Charity CC63798) needs 3 distinct front-end visual themes switchable via a 1-click administrative control. Previously, the themes used generic concepts. To elevate the charity's presentation to world-class standards, each concept is being redesigned to mirror the design archetype of a globally renowned musical charity:
1. **London Music Fund (LMF)** / **Sphinx Organization** — Prestigious Gala Editorial.
2. **Playing For Change Foundation (PFCF)** / **El Sistema** — Vibrant Youth Grassroots Movement.
3. **Nordoff and Robbins** — Scandinavian Clinical Wellbeing & Healthcare Humanism.

Furthermore, authentic exemplar content from `keysforcure.org.nz`—including leadership notes on Nick Wang & Young Musicians, Prime Minister Christopher Luxon's endorsement, Arts Minister Paul Goldsmith's testimonial, and partnership disclosures with Starship Children's Hospital and the Cancer Society—must be woven across all three concepts.

Crucially, all underlying functional engines (the DeepSeek AI Chatbot, the native Elfsight-style calendar with 1-step RSVP, client-side SVG QR Concert Passes, and the mobile `/checkin/` camera scanner) must remain 100% operational across all layouts without code bifurcation.

## Decision
1. **Layout Encapsulation in `concept-layouts.php`**:
   The three layout renderers (`render_concept_1_symphonic_prestige`, `render_concept_2_harmonies_of_hope`, `render_concept_3_nordic_minimalist`) will be completely overhauled with bespoke HTML/CSS structures faithfully mirroring the visual DNA of the three benchmark charities.
2. **Design System & Palette Separation**:
   - **Concept 1 (London Music Fund / Gala)**: Midnight Obsidian (`#090D16`), Warm Champagne Gold (`#C5A059`), Crisp Alabaster (`#F8FAFC`), classical serif editorial typography (Playfair / Georgia).
   - **Concept 2 (Playing For Change / Youth)**: Electric Cobalt Blue (`#0052CC`), Sunburst Amber (`#F59E0B`), Energetic Ruby (`#EF4444`), bold Neo-Grotesque sans-serif (Inter / Montserrat).
   - **Concept 3 (Nordoff and Robbins / Humanist)**: Slate Charcoal (`#18181B`), Nordic Healing Pine/Teal (`#0D9488`), Paper Cream (`#F4F4F5`), Swiss Modernist Grotesque.
3. **Content Unification with Real Exemplar Data**:
   All three concepts will present authentic Keys for Cure facts:
   - Leadership: Nick Wang and the Young Musicians.
   - Government Endorsements: Full quotes from Christopher Luxon (PM) and Hon Paul Goldsmith.
   - Beneficiaries: Starship Children's Hospital, Cancer Society NZ, Breast Cancer Foundation, Mercy Hospice.
   - New Initiative: Children's Mental Wellbeing Support Salon.
   - Governance: CC63798 registration details and Takapuna, Auckland headquarters.
4. **Functional Integration**:
   Every concept will dynamically embed:
   - The native `[kfc_event_calendar]` shortcode matching the theme's aesthetic.
   - The floating AI chatbot widget.
   - Links to the mobile door scanner at `/checkin/`.
5. **Persistence**:
   The active theme concept remains stored in `kfc_active_theme_concept` (`1`, `2`, or `3`) in `wp_options`, toggled instantly from the Operations Hub in WordPress Admin.

## Consequences
- Keys for Cure presents 3 world-class, donor-tested visual identities tailored for different fundraising contexts (High-Net-Worth Patrons, Community Youth Families, Healthcare/Grant Institutions).
- Zero functional regression: the calendar, door scanner, and chatbot work identically across all 3 themes.
- $0 ongoing software cost maintained.
