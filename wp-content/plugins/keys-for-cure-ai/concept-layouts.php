<?php
/**
 * Keys for Cure - 3 World-Class Benchmark Presentation Layouts
 * Faithfully mirroring:
 * 1. London Music Fund (https://www.londonmusicfund.org/) - Prestigious Gala Editorial (Midnight Obsidian & Champagne Gold)
 * 2. Playing For Change Foundation (https://playingforchange.org/) - Vibrant Youth Grassroots Movement (Electric Cobalt & Sunflower Amber)
 * 3. Nordoff and Robbins (https://www.nordoff-robbins.org.uk/) - Scandinavian Clinical Wellbeing (Clean Charcoal & Vibrant Coral)
 */

if (!defined('ABSPATH')) exit;

class KFC_Concept_Layouts {

    public static function render_concept_1_symphonic_prestige(): string {
        return self::get_concept_1_symphonic_prestige();
    }

    public static function render_concept_2_harmonies_of_hope(): string {
        return self::get_concept_2_harmonies_of_hope();
    }

    public static function render_concept_3_nordic_minimalist(): string {
        return self::get_concept_3_nordic_minimalist();
    }

    public static function get_layout(int $concept_id): string {
        switch ($concept_id) {
            case 2:
                return self::get_concept_2_harmonies_of_hope();
            case 3:
                return self::get_concept_3_nordic_minimalist();
            case 1:
            default:
                return self::get_concept_1_symphonic_prestige();
        }
    }

    /* =========================================================================
     * CONCEPT 1: LONDON MUSIC FUND (https://www.londonmusicfund.org/)
     * Architectural Language: Prestigious Gala Editorial
     * Palette: Midnight Obsidian (#080C14), Deep Navy (#0E1626), Champagne Gold (#C5A059), Pure White (#FFFFFF)
     * ========================================================================= */
    public static function get_concept_1_symphonic_prestige(): string {
        return <<<'HTML'
<!-- CONCEPT 1: LONDON MUSIC FUND ARCHETYPE (https://www.londonmusicfund.org/) -->
<div class="kfc-fullbleed kfc-lmf-theme" style="background:#080C14; color:#FFFFFF; font-family:'Playfair Display', Georgia, serif; line-height:1.6; margin:0; padding:0; width:100%;">

  <!-- TOP HEADER / NAV BAR -->
  <header class="kfc-concept-header" style="background:#080C14; border-bottom:1px solid rgba(197,160,89,0.25); padding:20px 36px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; position:sticky; top:0; z-index:100;">
    <div style="max-width:1320px; margin:0 auto; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
      <div style="display:flex; align-items:center; gap:14px;">
        <span style="font-family:'Playfair Display', Georgia, serif; font-size:22px; color:#C5A059; font-weight:700; letter-spacing:1.5px; text-transform:uppercase;">Keys for Cure</span>
        <span style="height:18px; width:1px; background:rgba(255,255,255,0.2);"></span>
        <span style="font-size:11px; letter-spacing:1.5px; text-transform:uppercase; color:#94A3B8; font-weight:600;">Charity CC63798 &bull; Auckland</span>
      </div>
      <nav style="display:flex; align-items:center; gap:26px; font-size:14px; font-weight:600;">
        <a href="#about" style="color:#E2E8F0; text-decoration:none;">About Fund</a>
        <a href="#impact" style="color:#E2E8F0; text-decoration:none;">Our Impact</a>
        <a href="#events" style="color:#E2E8F0; text-decoration:none;">Concert Season</a>
        <a href="#patrons" style="color:#E2E8F0; text-decoration:none;">Patrons &amp; Governance</a>
        <a href="#events" style="background:#C5A059; color:#080C14; padding:10px 22px; border-radius:4px; text-decoration:none; font-weight:700; font-size:13.5px; transition:all 0.2s;">Reserve Passes &rarr;</a>
      </nav>
    </div>
  </header>

  <!-- FULL-WIDTH PANORAMIC GALA HERO -->
  <section style="position:relative; min-height:80vh; display:flex; align-items:center; justify-content:center; background:linear-gradient(180deg, rgba(8,12,20,0.8) 0%, rgba(8,12,20,0.92) 100%), url('/wp-content/uploads/2026/11/kfc-hero-grand-piano.jpg') center/cover no-repeat; text-align:center; padding:110px 24px;">
    <div style="max-width:1050px; margin:0 auto; width:100%;">
      <span style="display:inline-block; border:1px solid #C5A059; color:#C5A059; padding:6px 22px; border-radius:999px; font-size:11.5px; font-weight:700; letter-spacing:2px; text-transform:uppercase; margin-bottom:28px; font-family:-apple-system, sans-serif;">
        Music Has the Power to Change Lives
      </span>
      <h1 style="font-size:clamp(38px, 5.5vw, 66px); font-weight:700; line-height:1.14; color:#FFFFFF; margin:0 0 24px; letter-spacing:-0.5px;">
        Investing in New Zealand’s Next Generation of Musicians &bull; Healing Children Through Art
      </h1>
      <p style="font-size:clamp(16px, 2vw, 20px); line-height:1.7; color:#CBD5E1; max-width:800px; margin:0 auto 40px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-weight:300;">
        Under the artistic direction of Nick Wang, Keys for Cure removes financial barriers for exceptional young classical artists across Auckland while channeling 100% of concert proceeds into pediatric healthcare at Starship Children's Hospital and Mercy Hospice.
      </p>
      <div style="display:flex; justify-content:center; gap:16px; flex-wrap:wrap; font-family:-apple-system, sans-serif;">
        <a href="#events" style="background:#C5A059; color:#080C14; font-weight:700; padding:16px 36px; border-radius:6px; text-decoration:none; font-size:15px; letter-spacing:0.5px; box-shadow:0 10px 25px rgba(197,160,89,0.3);">
          Explore 2026/27 Concerts &amp; Passes &rarr;
        </a>
        <a href="#patrons" style="background:transparent; border:1px solid rgba(255,255,255,0.4); color:#FFFFFF; font-weight:600; padding:16px 32px; border-radius:6px; text-decoration:none; font-size:15px;">
          Patron Statements &amp; Mission
        </a>
      </div>
    </div>
  </section>

  <!-- LONDON MUSIC FUND SIGNATURE GOLD STATS RIBBON -->
  <section id="impact" style="background:#0E1626; border-top:1px solid rgba(197,160,89,0.25); border-bottom:1px solid rgba(197,160,89,0.25); padding:48px 24px; font-family:-apple-system, sans-serif;">
    <div style="max-width:1320px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:32px; text-align:center;">
      <div style="border-right:1px solid rgba(255,255,255,0.1); padding-right:16px;">
        <div style="font-size:44px; font-weight:800; color:#C5A059; font-family:'Playfair Display', Georgia, serif;">$100k+</div>
        <div style="font-size:14px; font-weight:700; color:#FFFFFF; margin-top:6px;">Invested in Pediatric Health</div>
        <div style="font-size:12px; color:#94A3B8; margin-top:3px;">Starship &amp; Mercy Hospice Grants</div>
      </div>
      <div style="border-right:1px solid rgba(255,255,255,0.1); padding-right:16px;">
        <div style="font-size:44px; font-weight:800; color:#C5A059; font-family:'Playfair Display', Georgia, serif;">350+</div>
        <div style="font-size:14px; font-weight:700; color:#FFFFFF; margin-top:6px;">Young Musicians on Stage</div>
        <div style="font-size:12px; color:#94A3B8; margin-top:3px;">Auckland &amp; New Zealand Recitals</div>
      </div>
      <div style="border-right:1px solid rgba(255,255,255,0.1); padding-right:16px;">
        <div style="font-size:44px; font-weight:800; color:#C5A059; font-family:'Playfair Display', Georgia, serif;">4 Major</div>
        <div style="font-size:14px; font-weight:700; color:#FFFFFF; margin-top:6px;">Charity Beneficiaries</div>
        <div style="font-size:12px; color:#94A3B8; margin-top:3px;">Cancer Society, Starship &amp; Hospice</div>
      </div>
      <div>
        <div style="font-size:44px; font-weight:800; color:#C5A059; font-family:'Playfair Display', Georgia, serif;">100%</div>
        <div style="font-size:14px; font-weight:700; color:#FFFFFF; margin-top:6px;">Net Ticket Proceeds Donated</div>
        <div style="font-size:12px; color:#94A3B8; margin-top:3px;">Zero Administrative Waste</div>
      </div>
    </div>
  </section>

  <!-- 3-COLUMN EDITORIAL CARDS (LMF Style) -->
  <section id="about" style="background:#080C14; padding:96px 24px;">
    <div style="max-width:1320px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:56px;">
        <span style="font-size:11.5px; text-transform:uppercase; letter-spacing:2px; color:#C5A059; font-weight:700; font-family:-apple-system, sans-serif;">What We Do</span>
        <h2 style="font-size:38px; color:#FFFFFF; margin:10px 0 0;">Transforming Musical Talent into Public Impact</h2>
      </div>

      <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(340px, 1fr)); gap:32px;">
        <!-- Card 1 -->
        <div style="background:#0E1626; border:1px solid rgba(197,160,89,0.2); border-radius:10px; overflow:hidden; display:flex; flex-direction:column;">
          <img src="/wp-content/uploads/2026/11/kfc-piano-hands.jpg" alt="Junior Classical Scholarships" style="width:100%; height:240px; object-fit:cover; display:block;">
          <div style="padding:32px 28px; flex:1; display:flex; flex-direction:column; justify-content:space-between; font-family:-apple-system, sans-serif;">
            <div>
              <span style="color:#C5A059; font-weight:700; font-size:11.5px; text-transform:uppercase; letter-spacing:1px;">Scholarship &bull; Repertoire</span>
              <h3 style="color:#FFFFFF; font-size:22px; margin:8px 0 12px; font-family:'Playfair Display', serif;">Young Performers Collective</h3>
              <p style="color:#94A3B8; font-size:14.5px; line-height:1.7;">Providing gifted adolescent pianists, string players, and wind soloists masterclass training and high-profile concert hall stages across Auckland.</p>
            </div>
            <a href="#events" style="color:#C5A059; font-weight:700; text-decoration:none; font-size:14px; margin-top:24px; display:inline-block;">View Soloist Recitals &rarr;</a>
          </div>
        </div>

        <!-- Card 2 -->
        <div style="background:#0E1626; border:1px solid rgba(197,160,89,0.2); border-radius:10px; overflow:hidden; display:flex; flex-direction:column;">
          <img src="/wp-content/uploads/2026/11/kfc-chamber-concert.jpg" alt="Starship Pediatric Partnership" style="width:100%; height:240px; object-fit:cover; display:block;">
          <div style="padding:32px 28px; flex:1; display:flex; flex-direction:column; justify-content:space-between; font-family:-apple-system, sans-serif;">
            <div>
              <span style="color:#C5A059; font-weight:700; font-size:11.5px; text-transform:uppercase; letter-spacing:1px;">Healthcare &bull; Therapy</span>
              <h3 style="color:#FFFFFF; font-size:22px; margin:8px 0 12px; font-family:'Playfair Display', serif;">Children’s Mental Wellbeing Salon</h3>
              <p style="color:#94A3B8; font-size:14.5px; line-height:1.7;">Our flagship initiative combining live acoustic chamber music with emotional resilience therapy for pediatric patients recovering from chronic illnesses.</p>
            </div>
            <a href="#events" style="color:#C5A059; font-weight:700; text-decoration:none; font-size:14px; margin-top:24px; display:inline-block;">Learn About the Initiative &rarr;</a>
          </div>
        </div>

        <!-- Card 3 -->
        <div style="background:#0E1626; border:1px solid rgba(197,160,89,0.2); border-radius:10px; overflow:hidden; display:flex; flex-direction:column;">
          <img src="/wp-content/uploads/2026/11/kfc-holiday-gala.jpg" alt="Annual Gala Performances" style="width:100%; height:240px; object-fit:cover; display:block;">
          <div style="padding:32px 28px; flex:1; display:flex; flex-direction:column; justify-content:space-between; font-family:-apple-system, sans-serif;">
            <div>
              <span style="color:#C5A059; font-weight:700; font-size:11.5px; text-transform:uppercase; letter-spacing:1px;">Gala &bull; Community</span>
              <h3 style="color:#FFFFFF; font-size:22px; margin:8px 0 12px; font-family:'Playfair Display', serif;">Annual Flagship Concerts</h3>
              <p style="color:#94A3B8; font-size:14.5px; line-height:1.7;">Held at premier Auckland venues including Takapuna Community Hall and Bruce Mason Centre, uniting families, civic leaders, and classical music lovers.</p>
            </div>
            <a href="#events" style="color:#C5A059; font-weight:700; text-decoration:none; font-size:14px; margin-top:24px; display:inline-block;">Reserve Season Passes &rarr;</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- NATIVE EVENT CALENDAR (ELFSIGHT MIRROR) -->
  <section id="events" style="background:#0E1626; padding:96px 24px; border-top:1px solid rgba(197,160,89,0.2); border-bottom:1px solid rgba(197,160,89,0.2);">
    <div style="max-width:1320px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:48px;">
        <span style="font-size:11.5px; text-transform:uppercase; letter-spacing:2px; color:#C5A059; font-weight:700; font-family:-apple-system, sans-serif;">Upcoming Concerts &bull; Instant Pass RSVP</span>
        <h2 style="font-size:38px; color:#FFFFFF; margin:8px 0 0;">2026/27 Benefit Concert Season Schedule</h2>
        <p style="font-size:15px; color:#94A3B8; max-width:640px; margin:10px auto 0; font-family:-apple-system, sans-serif;">
          Select any concert below to view complete repertoire notes and reserve admission passes with digital QR check-in credentials.
        </p>
      </div>

      [kfc_event_calendar title="Benefit Concerts &amp; Recitals"]
    </div>
  </section>

  <!-- PATRON ENDORSEMENTS (Prime Minister & Minister for Arts) -->
  <section id="patrons" style="background:#080C14; padding:96px 24px;">
    <div style="max-width:1320px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:52px;">
        <span style="font-size:11.5px; text-transform:uppercase; letter-spacing:2px; color:#C5A059; font-weight:700; font-family:-apple-system, sans-serif;">Patron Endorsements</span>
        <h2 style="font-size:38px; color:#FFFFFF; margin-top:8px;">Endorsed by New Zealand Government Leaders</h2>
      </div>

      <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(360px, 1fr)); gap:32px;">
        <!-- Christopher Luxon Quote -->
        <div style="background:#0E1626; border:1px solid rgba(197,160,89,0.25); border-radius:10px; padding:38px; display:flex; flex-direction:column; justify-content:space-between;">
          <p style="font-size:16px; line-height:1.75; color:#E2E8F0; font-style:italic; margin:0 0 24px;">
            &ldquo;Nick Wang and the entire Keys for Cure team &mdash; thank you for your vision, your energy and your commitment to using music as a force for good. This year's focus, supporting the incredible work at Starship Children's Hospital, is a cause that touches all of us. Enjoy an absolutely wonderful evening. All the very best.&rdquo;
          </p>
          <div style="font-family:-apple-system, sans-serif;">
            <div style="font-weight:800; font-size:16px; color:#C5A059;">Rt Hon Christopher Luxon</div>
            <div style="font-size:12.5px; color:#94A3B8;">Prime Minister of New Zealand</div>
          </div>
        </div>

        <!-- Hon Paul Goldsmith Quote -->
        <div style="background:#0E1626; border:1px solid rgba(197,160,89,0.25); border-radius:10px; padding:38px; display:flex; flex-direction:column; justify-content:space-between;">
          <p style="font-size:16px; line-height:1.75; color:#E2E8F0; font-style:italic; margin:0 0 24px;">
            &ldquo;Over the years the Keys for Cure Charitable Trust has raised funds for many important causes including the Cancer Society of New Zealand, Breast Cancer Foundation, Mercy Hospice and Starship Children's Hospital. My warm thanks to Nick Wang and the Young Musicians for using the power of music to share love and kindness through their dedication to charity.&rdquo;
          </p>
          <div style="font-family:-apple-system, sans-serif;">
            <div style="font-weight:800; font-size:16px; color:#C5A059;">Hon Paul Goldsmith</div>
            <div style="font-size:12.5px; color:#94A3B8;">Minister for Arts, Culture and Heritage &bull; Minister of Justice</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer style="background:#04070B; border-top:1px solid rgba(255,255,255,0.08); padding:64px 36px; font-family:-apple-system, sans-serif; font-size:13px; color:#94A3B8;">
    <div style="max-width:1320px; margin:0 auto; display:flex; justify-content:space-between; flex-wrap:wrap; gap:32px;">
      <div>
        <div style="font-size:18px; font-weight:800; color:#FFFFFF; margin-bottom:6px;">Keys for Cure Charitable Trust</div>
        <div>Registered Charity CC63798 under the Charitable Trusts Act 1957</div>
        <div style="margin-top:6px;">20 Northcroft Street, Takapuna, Auckland, New Zealand</div>
      </div>
      <div>
        <div style="font-weight:700; color:#C5A059; margin-bottom:6px;">Governance &amp; Contact</div>
        <div>Email: <a href="mailto:info@keysforcure.org.nz" style="color:#C5A059; text-decoration:none;">info@keysforcure.org.nz</a></div>
        <div style="margin-top:6px;">100% of Net Concert Proceeds Distributed to Pediatric Health Beneficiaries</div>
      </div>
    </div>
  </footer>

</div>
HTML;
    }

    /* =========================================================================
     * CONCEPT 2: PLAYING FOR CHANGE FOUNDATION (https://playingforchange.org/)
     * Architectural Language: Vibrant Grassroots Movement
     * Palette: Electric Cobalt (#0052CC), Sunflower Amber (#FFC700), Charcoal (#0F172A), Pure White (#FFFFFF)
     * ========================================================================= */
    public static function get_concept_2_harmonies_of_hope(): string {
        return <<<'HTML'
<!-- CONCEPT 2: PLAYING FOR CHANGE FOUNDATION ARCHETYPE (https://playingforchange.org/) -->
<div class="kfc-fullbleed kfc-pfc-theme" style="background:#F8FAFC; color:#0F172A; font-family:'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; line-height:1.6; margin:0; padding:0; width:100%;">

  <!-- TOP HEADER / NAV BAR -->
  <header class="kfc-concept-header" style="background:#FFFFFF; border-bottom:1px solid #E2E8F0; padding:18px 36px; position:sticky; top:0; z-index:100;">
    <div style="max-width:1320px; margin:0 auto; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
      <div style="display:flex; align-items:center; gap:12px;">
        <span style="font-size:22px; font-weight:900; color:#0052CC; letter-spacing:-0.5px;">KEYS FOR CURE</span>
        <span style="background:#FFC700; color:#0F172A; font-size:10.5px; font-weight:900; padding:3px 10px; border-radius:4px; text-transform:uppercase;">Youth Movement</span>
      </div>
      <nav style="display:flex; align-items:center; gap:26px; font-size:14px; font-weight:800;">
        <a href="#movement" style="color:#334155; text-decoration:none;">Our Movement</a>
        <a href="#programs" style="color:#334155; text-decoration:none;">Programs</a>
        <a href="#events" style="color:#334155; text-decoration:none;">Concert Schedule</a>
        <a href="#stories" style="color:#334155; text-decoration:none;">Patrons</a>
        <a href="#events" style="background:#0052CC; color:#FFFFFF; padding:10px 22px; border-radius:6px; text-decoration:none; font-weight:800; font-size:13.5px; box-shadow:0 4px 12px rgba(0,82,204,0.25);">Get Concert Pass &rarr;</a>
      </nav>
    </div>
  </header>

  <!-- FULL-WIDTH HIGH-ENERGY HERO BANNER -->
  <section id="movement" style="position:relative; min-height:76vh; display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg, rgba(0,82,204,0.92) 0%, rgba(15,23,42,0.92) 100%), url('/wp-content/uploads/2026/11/kfc-chamber-concert.jpg') center/cover no-repeat; text-align:center; padding:110px 24px; color:#FFFFFF;">
    <div style="max-width:1050px; margin:0 auto; width:100%;">
      <span style="display:inline-block; background:#FFC700; color:#0F172A; padding:6px 18px; border-radius:999px; font-size:11.5px; font-weight:900; letter-spacing:1px; text-transform:uppercase; margin-bottom:24px;">
        ★ MUSIC FOR SOCIAL CHANGE ★ CHARITY CC63798
      </span>
      <h1 style="font-size:clamp(36px, 5.2vw, 64px); font-weight:900; line-height:1.1; margin:0 0 24px; letter-spacing:-1px; text-transform:uppercase;">
        Using the Power of Music to Heal Children &amp; Unite Communities
      </h1>
      <p style="font-size:clamp(16px, 2vw, 20px); line-height:1.65; color:#E2E8F0; margin:0 auto 40px; max-width:800px; font-weight:400;">
        Founded by Nick Wang, Keys for Cure is New Zealand’s fastest-growing youth classical collective &mdash; empowering adolescent concert virtuosi to use their talent to raise essential funds for Starship Children's Hospital and Mercy Hospice.
      </p>
      <div style="display:flex; justify-content:center; gap:16px; flex-wrap:wrap;">
        <a href="#events" style="background:#FFC700; color:#0F172A; font-weight:900; padding:16px 36px; border-radius:8px; text-decoration:none; font-size:15px; box-shadow:0 10px 20px rgba(255,199,0,0.3);">
          Reserve Concert Pass &rarr;
        </a>
        <a href="#programs" style="background:rgba(255,255,255,0.15); color:#FFFFFF; font-weight:700; padding:16px 32px; border-radius:8px; text-decoration:none; font-size:15px; backdrop-filter:blur(6px); border:1px solid rgba(255,255,255,0.3);">
          Children’s Wellbeing Salon
        </a>
      </div>
    </div>
  </section>

  <!-- PFC 4-COLUMN PROGRAM TILES -->
  <section id="programs" style="background:#FFFFFF; padding:88px 32px; border-bottom:1px solid #E2E8F0;">
    <div style="max-width:1320px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:52px;">
        <span style="font-size:12px; text-transform:uppercase; letter-spacing:1.5px; color:#0052CC; font-weight:900;">Areas of Impact</span>
        <h2 style="font-size:36px; font-weight:900; color:#0F172A; margin-top:8px;">How Music Drives Real Social Change in New Zealand</h2>
      </div>

      <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:24px;">
        <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px; padding:32px 24px;">
          <div style="font-size:26px; margin-bottom:14px;">🧠</div>
          <h3 style="font-size:18px; font-weight:800; color:#0F172A; margin:0 0 10px;">01. Wellbeing Salon</h3>
          <p style="font-size:14px; color:#64748B; line-height:1.6; margin:0;">Children’s Mental Wellbeing Support Salon bringing therapeutic acoustic sessions to youth recovering from illness.</p>
        </div>
        <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px; padding:32px 24px;">
          <div style="font-size:26px; margin-bottom:14px;">🎻</div>
          <h3 style="font-size:18px; font-weight:800; color:#0F172A; margin:0 0 10px;">02. Young Musicians</h3>
          <p style="font-size:14px; color:#64748B; line-height:1.6; margin:0;">Over 350 adolescent performers taking the stage at Bruce Mason Centre and Takapuna Community Hall.</p>
        </div>
        <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px; padding:32px 24px;">
          <div style="font-size:26px; margin-bottom:14px;">🏥</div>
          <h3 style="font-size:18px; font-weight:800; color:#0F172A; margin:0 0 10px;">03. Hospital Partners</h3>
          <p style="font-size:14px; color:#64748B; line-height:1.6; margin:0;">Direct grants funding pediatric care at Starship Children's Hospital and support lodging with Cancer Society NZ.</p>
        </div>
        <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:8px; padding:32px 24px;">
          <div style="font-size:26px; margin-bottom:14px;">🎟️</div>
          <h3 style="font-size:18px; font-weight:800; color:#0F172A; margin:0 0 10px;">04. $0 Pass Access</h3>
          <p style="font-size:14px; color:#64748B; line-height:1.6; margin:0;">Frictionless digital Concert Passes with instant QR door verification ensuring full accessibility for all families.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- SUNFLOWER YELLOW IMPACT RIBBON -->
  <section style="background:#FFC700; color:#0F172A; padding:44px 32px; font-weight:900;">
    <div style="max-width:1320px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:24px; text-align:center;">
      <div>
        <div style="font-size:40px; font-weight:900; line-height:1;">$100K+</div>
        <div style="font-size:14px; margin-top:6px; letter-spacing:0.5px;">DISTRIBUTED TO CHARITY</div>
      </div>
      <div>
        <div style="font-size:40px; font-weight:900; line-height:1;">350+</div>
        <div style="font-size:14px; margin-top:6px; letter-spacing:0.5px;">YOUTH ON STAGE</div>
      </div>
      <div>
        <div style="font-size:40px; font-weight:900; line-height:1;">100%</div>
        <div style="font-size:14px; margin-top:6px; letter-spacing:0.5px;">PROCEEDS TO PATIENT CARE</div>
      </div>
      <div>
        <div style="font-size:40px; font-weight:900; line-height:1;">CC63798</div>
        <div style="font-size:14px; margin-top:6px; letter-spacing:0.5px;">REGISTERED NZ CHARITY</div>
      </div>
    </div>
  </section>

  <!-- NATIVE ELFSIGHT EVENT CALENDAR -->
  <section id="events" style="background:#F1F5F9; padding:88px 32px;">
    <div style="max-width:1320px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:48px;">
        <span style="font-size:12px; text-transform:uppercase; letter-spacing:1.5px; color:#0052CC; font-weight:800;">Concerts &amp; Live Recitals</span>
        <h2 style="font-size:36px; font-weight:900; color:#0F172A; margin-top:8px;">Upcoming Community Concerts</h2>
        <p style="font-size:15px; color:#64748B; max-width:600px; margin:10px auto 0;">
          Reserve your digital Concert Pass below with instant QR code generation for smooth entrance at the door.
        </p>
      </div>

      [kfc_event_calendar title="Upcoming Community Concerts &amp; Benefit Recitals"]
    </div>
  </section>

  <!-- STORIES & ENDORSEMENTS -->
  <section id="stories" style="background:#FFFFFF; padding:88px 32px; border-top:1px solid #E2E8F0;">
    <div style="max-width:1320px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(360px, 1fr)); gap:36px;">
      <div style="background:#0052CC; color:#FFFFFF; border-radius:12px; padding:38px; box-shadow:0 15px 30px rgba(0,82,204,0.2);">
        <span style="background:#FFC700; color:#0F172A; font-size:11px; font-weight:900; padding:3px 10px; border-radius:999px; text-transform:uppercase;">Prime Minister Endorsement</span>
        <p style="font-size:16px; line-height:1.75; font-style:italic; margin:18px 0 20px;">
          &ldquo;Nick Wang and the entire Keys for Cure team &mdash; thank you for your vision, your energy and your commitment to using music as a force for good. This year's focus, supporting the incredible work at Starship Children's Hospital, is a cause that touches all of us.&rdquo;
        </p>
        <div style="font-weight:900; font-size:16px;">Rt Hon Christopher Luxon</div>
        <div style="font-size:13px; opacity:0.85;">Prime Minister of New Zealand</div>
      </div>

      <div style="background:#0F172A; color:#FFFFFF; border-radius:12px; padding:38px; box-shadow:0 15px 30px rgba(15,23,42,0.2);">
        <span style="background:#38BDF8; color:#0F172A; font-size:11px; font-weight:900; padding:3px 10px; border-radius:999px; text-transform:uppercase;">Ministerial Patronage</span>
        <p style="font-size:16px; line-height:1.75; font-style:italic; margin:18px 0 20px;">
          &ldquo;Over the years Keys for Cure has raised funds for Cancer Society NZ, Breast Cancer Foundation, Mercy Hospice and Starship Children's Hospital. My warm thanks to Nick Wang and the Young Musicians for using the power of music to share love and kindness.&rdquo;
        </p>
        <div style="font-weight:900; font-size:16px;">Hon Paul Goldsmith</div>
        <div style="font-size:13px; opacity:0.85;">Minister for Arts, Culture and Heritage</div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer style="background:#0F172A; color:#FFFFFF; padding:64px 36px; font-size:13.5px;">
    <div style="max-width:1320px; margin:0 auto; display:flex; justify-content:space-between; flex-wrap:wrap; gap:32px;">
      <div>
        <div style="font-size:18px; font-weight:900; margin-bottom:6px;">KEYS FOR CURE CHARITABLE TRUST</div>
        <div style="color:#94A3B8;">Charity CC63798 &bull; 100% Volunteer Driven &bull; Zero Overhead Waste</div>
        <div style="color:#94A3B8; margin-top:4px;">20 Northcroft Street, Takapuna, Auckland, New Zealand</div>
      </div>
      <div style="text-align:right;">
        <div style="font-weight:800; color:#FFC700; margin-bottom:4px;">Contact Community Team</div>
        <div><a href="mailto:info@keysforcure.org.nz" style="color:#FFFFFF; text-decoration:none;">info@keysforcure.org.nz</a></div>
        <div style="color:#94A3B8; margin-top:4px;">&copy; 2026 Keys for Cure. All rights reserved.</div>
      </div>
    </div>
  </footer>

</div>
HTML;
    }

    /* =========================================================================
     * CONCEPT 3: NORDOFF AND ROBBINS (https://www.nordoff-robbins.org.uk/)
     * Architectural Language: Scandinavian Clinical Wellbeing / Music Therapy
     * Palette: Clean Charcoal (#18181B), Soft Off-White (#F4F4F6 / #FFFFFF), Nordoff Coral/Red (#C8102E)
     * ========================================================================= */
    public static function get_concept_3_nordic_minimalist(): string {
        return <<<'HTML'
<!-- CONCEPT 3: NORDOFF AND ROBBINS ARCHETYPE (https://www.nordoff-robbins.org.uk/) -->
<div class="kfc-fullbleed kfc-nordoff-theme" style="background:#FFFFFF; color:#18181B; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; line-height:1.6; margin:0; padding:0; width:100%;">

  <!-- TOP HEADER / NAV BAR (Nordoff and Robbins Style) -->
  <header class="kfc-concept-header" style="background:#FFFFFF; border-bottom:1px solid #E4E4E7; padding:18px 40px; position:sticky; top:0; z-index:100; box-shadow:0 1px 3px rgba(0,0,0,0.04);">
    <div style="max-width:1320px; margin:0 auto; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
      <div style="display:flex; align-items:center; gap:12px;">
        <span style="font-size:24px; font-weight:800; color:#18181B; letter-spacing:-0.5px;">Keys for Cure</span>
        <span style="background:#F4F4F5; color:#52525B; font-size:11px; font-weight:700; padding:3px 10px; border-radius:999px;">Music Therapy &bull; CC63798</span>
      </div>
      <nav style="display:flex; align-items:center; gap:26px; font-size:14px; font-weight:600;">
        <a href="#about" style="color:#27272A; text-decoration:none;">About Us</a>
        <a href="#services" style="color:#27272A; text-decoration:none;">Music Therapy &amp; Salons</a>
        <a href="#schedule" style="color:#27272A; text-decoration:none;">Concert Schedule</a>
        <a href="#impact" style="color:#27272A; text-decoration:none;">Our Impact</a>
        <a href="#schedule" style="background:#C8102E; color:#FFFFFF; padding:10px 24px; border-radius:999px; text-decoration:none; font-weight:700; font-size:13.5px; box-shadow:0 4px 12px rgba(200,16,46,0.25);">Reserve Passes &rarr;</a>
      </nav>
    </div>
  </header>

  <!-- AUTHENTIC FULL-WIDTH NORDOFF & ROBBINS CINEMATIC HERO BANNER -->
  <section style="position:relative; min-height:560px; display:flex; align-items:center; background:linear-gradient(90deg, rgba(24,24,27,0.9) 0%, rgba(24,24,27,0.78) 55%, rgba(24,24,27,0.4) 100%), url('/wp-content/uploads/2026/11/kfc-hero-grand-piano.jpg') center/cover no-repeat; padding:100px 40px; color:#FFFFFF;">
    <div style="max-width:1320px; margin:0 auto; width:100%;">
      <div style="max-width:820px;">
        <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px;">
          <span style="display:inline-block; width:9px; height:9px; border-radius:50%; background:#FF4D6D;"></span>
          <span style="font-size:12px; font-weight:800; letter-spacing:1.5px; text-transform:uppercase; color:#FF6B81;">
            Pediatric Music Therapy &bull; New Zealand Charity CC63798
          </span>
        </div>
        <h1 style="font-size:clamp(38px, 5.5vw, 64px); font-weight:900; line-height:1.1; color:#FFFFFF; margin:0 0 24px; letter-spacing:-1.5px;">
          Music therapy can be life-changing.
        </h1>
        <p style="font-size:clamp(17px, 2vw, 21px); line-height:1.65; color:#E4E4E7; margin:0 0 36px; max-width:700px;">
          We’ve been transforming children's lives through live classical music and clinical acoustic engagement &mdash; funding specialized pediatric therapy at Starship Children's Hospital and youth wellbeing support across New Zealand.
        </p>
        <div style="display:flex; gap:16px; flex-wrap:wrap;">
          <a href="#schedule" style="background:#C8102E; color:#FFFFFF; font-weight:700; padding:16px 36px; border-radius:999px; text-decoration:none; font-size:15px; box-shadow:0 8px 20px rgba(200,16,46,0.35);">
            Explore Benefit Concerts &amp; Passes &rarr;
          </a>
          <a href="#services" style="background:transparent; border:2px solid #FFFFFF; color:#FFFFFF; font-weight:700; padding:16px 32px; border-radius:999px; text-decoration:none; font-size:15px;">
            The 2026 Wellbeing Salon
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- 3 ICONIC NORDOFF AND ROBBINS ACTION CARDS (Clean Full-Width Editorial Columns) -->
  <section id="services" style="background:#FFFFFF; padding:96px 40px; border-bottom:1px solid #E4E4E7;">
    <div style="max-width:1320px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:56px;">
        <span style="font-size:12px; font-weight:800; letter-spacing:1.5px; text-transform:uppercase; color:#C8102E;">Connect With Us</span>
        <h2 style="font-size:38px; font-weight:900; color:#18181B; margin-top:8px; letter-spacing:-1px;">Bringing the Healing Discipline of Music to Those in Need</h2>
      </div>

      <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(340px, 1fr)); gap:32px;">
        <!-- Action Card 1 -->
        <div style="background:#FAFAFA; border:1px solid #E4E4E7; border-radius:12px; overflow:hidden; display:flex; flex-direction:column; justify-content:space-between;">
          <img src="/wp-content/uploads/2026/11/kfc-chamber-concert.jpg" alt="Pediatric Hospital Grants" style="width:100%; height:220px; object-fit:cover; display:block;">
          <div style="padding:32px; flex:1; display:flex; flex-direction:column; justify-content:space-between;">
            <div>
              <div style="font-size:12px; font-weight:800; text-transform:uppercase; color:#C8102E; letter-spacing:1px; margin-bottom:8px;">For Hospital Partners</div>
              <h3 style="font-size:22px; font-weight:800; color:#18181B; margin:0 0 12px; line-height:1.25;">Pediatric Hospital Grants</h3>
              <p style="font-size:15px; color:#52525B; line-height:1.7; margin:0;">Bring acoustic music therapy and bedside comfort to children's recovery wards, hospice facilities, and specialized care homes.</p>
            </div>
            <a href="#schedule" style="margin-top:24px; color:#C8102E; font-weight:700; text-decoration:none; font-size:14px; display:inline-block;">Learn about hospital funding &rarr;</a>
          </div>
        </div>

        <!-- Action Card 2 -->
        <div style="background:#FAFAFA; border:1px solid #E4E4E7; border-radius:12px; overflow:hidden; display:flex; flex-direction:column; justify-content:space-between;">
          <img src="/wp-content/uploads/2026/11/kfc-piano-hands.jpg" alt="Children's Wellbeing Salon" style="width:100%; height:220px; object-fit:cover; display:block;">
          <div style="padding:32px; flex:1; display:flex; flex-direction:column; justify-content:space-between;">
            <div>
              <div style="font-size:12px; font-weight:800; text-transform:uppercase; color:#C8102E; letter-spacing:1px; margin-bottom:8px;">For Families &amp; Patients</div>
              <h3 style="font-size:22px; font-weight:800; color:#18181B; margin:0 0 12px; line-height:1.25;">Children’s Wellbeing Salon</h3>
              <p style="font-size:15px; color:#52525B; line-height:1.7; margin:0;">Our 2026/27 community salon connects recovering children with acoustic masterworks and expressive music therapy sessions.</p>
            </div>
            <a href="#schedule" style="margin-top:24px; color:#C8102E; font-weight:700; text-decoration:none; font-size:14px; display:inline-block;">Discover our salon sessions &rarr;</a>
          </div>
        </div>

        <!-- Action Card 3 -->
        <div style="background:#FAFAFA; border:1px solid #E4E4E7; border-radius:12px; overflow:hidden; display:flex; flex-direction:column; justify-content:space-between;">
          <img src="/wp-content/uploads/2026/11/kfc-holiday-gala.jpg" alt="Young Musicians Collective" style="width:100%; height:220px; object-fit:cover; display:block;">
          <div style="padding:32px; flex:1; display:flex; flex-direction:column; justify-content:space-between;">
            <div>
              <div style="font-size:12px; font-weight:800; text-transform:uppercase; color:#C8102E; letter-spacing:1px; margin-bottom:8px;">For Young Musicians</div>
              <h3 style="font-size:22px; font-weight:800; color:#18181B; margin:0 0 12px; line-height:1.25;">Young Musicians Collective</h3>
              <p style="font-size:15px; color:#52525B; line-height:1.7; margin:0;">Join Nick Wang and hundreds of adolescent concert virtuosi using their hard-earned musical gifts for tangible social impact.</p>
            </div>
            <a href="#schedule" style="margin-top:24px; color:#C8102E; font-weight:700; text-decoration:none; font-size:14px; display:inline-block;">Join the performers roster &rarr;</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- NORDOFF & ROBBINS STATS RIBBON -->
  <section id="impact" style="background:#F4F4F6; padding:52px 40px; border-bottom:1px solid #E4E4E7;">
    <div style="max-width:1320px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:32px; text-align:center;">
      <div>
        <div style="font-size:48px; font-weight:900; color:#18181B; line-height:1;">4+</div>
        <div style="font-size:15px; font-weight:700; color:#27272A; margin-top:8px;">Healthcare Beneficiaries</div>
        <div style="font-size:13px; color:#71717A;">Starship, Cancer Society &amp; Hospice</div>
      </div>
      <div>
        <div style="font-size:48px; font-weight:900; color:#C8102E; line-height:1;">350+</div>
        <div style="font-size:15px; font-weight:700; color:#27272A; margin-top:8px;">Young Musicians Performing</div>
        <div style="font-size:13px; color:#71717A;">Across Auckland Concert Stages</div>
      </div>
      <div>
        <div style="font-size:48px; font-weight:900; color:#18181B; line-height:1;">100%</div>
        <div style="font-size:15px; font-weight:700; color:#27272A; margin-top:8px;">Proceeds to Patient Care</div>
        <div style="font-size:13px; color:#71717A;">Governed by Board of Trustees</div>
      </div>
      <div>
        <div style="font-size:48px; font-weight:900; color:#18181B; line-height:1;">$0</div>
        <div style="font-size:15px; font-weight:700; color:#27272A; margin-top:8px;">Administrative Waste</div>
        <div style="font-size:13px; color:#71717A;">100% Volunteer Directed</div>
      </div>
    </div>
  </section>

  <!-- CASE STORY & MINISTERIAL ENDORSEMENTS -->
  <section id="about" style="background:#FFFFFF; padding:96px 40px; border-bottom:1px solid #E4E4E7;">
    <div style="max-width:1320px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(360px, 1fr)); gap:48px;">
      <div style="background:#FAFAFA; border:1px solid #E4E4E7; border-radius:12px; padding:40px;">
        <span style="font-size:11px; font-weight:800; letter-spacing:1px; text-transform:uppercase; color:#C8102E;">Pediatric Healing Story</span>
        <h3 style="font-size:24px; font-weight:900; color:#18181B; margin:12px 0 16px;">The Healing Power of Strings at Starship Hospital</h3>
        <p style="font-size:15px; color:#52525B; line-height:1.75; margin:0 0 16px;">
          When young patients in Auckland are undergoing extensive cancer treatments or prolonged pediatric recovery, live acoustic music provides emotional anchoring that modern clinical medicine alone cannot achieve.
        </p>
        <p style="font-size:15px; color:#52525B; line-height:1.75; margin:0;">
          Through our annual benefit concerts, Keys for Cure funds certified pediatric therapy equipment, acoustic relaxation devices, and bedside performances by our award-winning youth virtuosi.
        </p>
      </div>

      <div style="background:#18181B; color:#FFFFFF; border-radius:12px; padding:40px; display:flex; flex-direction:column; justify-content:space-between;">
        <div>
          <span style="background:#C8102E; color:#FFFFFF; font-size:11px; font-weight:800; padding:3px 10px; border-radius:999px; text-transform:uppercase;">Official Endorsement</span>
          <p style="font-size:16.5px; line-height:1.75; font-style:italic; margin:20px 0 24px; color:#E4E4E7;">
            &ldquo;Nick Wang and the entire Keys for Cure team &mdash; thank you for your vision, your energy and your commitment to using music as a force for good. This year's focus, supporting the incredible work at Starship Children's Hospital, is a cause that touches all of us.&rdquo;
          </p>
        </div>
        <div>
          <div style="font-weight:900; font-size:16px; color:#FFFFFF;">Rt Hon Christopher Luxon</div>
          <div style="font-size:13px; color:#A1A1AA;">Prime Minister of New Zealand</div>
        </div>
      </div>
    </div>
  </section>

  <!-- NATIVE CONCERT SCHEDULE (ELFSIGHT CALENDAR MIRROR) -->
  <section id="schedule" style="background:#FAFAFA; padding:96px 40px; border-bottom:1px solid #E4E4E7;">
    <div style="max-width:1320px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:48px;">
        <span style="font-size:12px; font-weight:800; letter-spacing:1.5px; text-transform:uppercase; color:#C8102E;">Upcoming Concerts</span>
        <h2 style="font-size:38px; font-weight:900; color:#18181B; margin-top:8px; letter-spacing:-1px;">Benefit Concert Schedule &amp; Pass RSVP</h2>
        <p style="font-size:15px; color:#52525B; max-width:640px; margin:10px auto 0;">
          Select any concert to view repertoire notes and reserve your admission pass with instant digital QR door check-in.
        </p>
      </div>

      [kfc_event_calendar title="Benefit Concert Schedule &amp; Pass RSVP"]
    </div>
  </section>

  <!-- FOOTER -->
  <footer style="background:#18181B; color:#A1A1AA; padding:64px 40px; font-size:13.5px;">
    <div style="max-width:1320px; margin:0 auto; display:flex; justify-content:space-between; flex-wrap:wrap; gap:32px;">
      <div>
        <div style="font-size:18px; font-weight:800; color:#FFFFFF; margin-bottom:6px;">Keys for Cure Charitable Trust</div>
        <div>Registered Charity CC63798 under the Charitable Trusts Act 1957</div>
        <div style="margin-top:4px;">20 Northcroft Street, Takapuna, Auckland, New Zealand</div>
      </div>
      <div>
        <div style="font-weight:700; color:#FFFFFF; margin-bottom:6px;">Governance &amp; Contact</div>
        <div>Email: <a href="mailto:info@keysforcure.org.nz" style="color:#FFFFFF; text-decoration:none;">info@keysforcure.org.nz</a></div>
        <div style="margin-top:4px;">100% of Net Concert Proceeds Distributed to Pediatric Health Beneficiaries</div>
      </div>
    </div>
  </footer>

</div>
HTML;
    }
}
