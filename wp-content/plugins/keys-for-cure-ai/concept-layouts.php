<?php
/**
 * Keys for Cure - 3 World-Class Benchmark Presentation Layouts
 * Faithfully mirroring:
 * 1. London Music Fund (https://www.londonmusicfund.org/)
 * 2. Playing For Change Foundation (https://playingforchange.org/)
 * 3. Nordoff and Robbins (https://www.nordoff-robbins.org.uk/)
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

    public static function get_concept_1_symphonic_prestige(): string {
        return <<<'HTML'

<!-- CONCEPT 1: LONDON MUSIC FUND ARCHETYPE (https://www.londonmusicfund.org/) -->
<div class="kfc-fullbleed kfc-lmf-theme" style="background:#0C192E; color:#FFFFFF; font-family:'Playfair Display', Georgia, serif; line-height:1.6; margin:0; padding:0;">

  <!-- TOP HEADER / NAV BAR -->
  <header style="background:#071120; border-bottom:1px solid rgba(197,160,89,0.3); padding:18px 32px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">
    <div style="max-width:1300px; margin:0 auto; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
      <div style="display:flex; align-items:center; gap:12px;">
        <span style="font-size:20px; color:#C5A059; font-weight:800; letter-spacing:1px; text-transform:uppercase;">Keys for Cure</span>
        <span style="height:18px; width:1px; background:rgba(255,255,255,0.2);"></span>
        <span style="font-size:11px; letter-spacing:1.5px; text-transform:uppercase; color:#94A3B8; font-weight:600;">Charity CC63798 &bull; Auckland</span>
      </div>
      <nav style="display:flex; align-items:center; gap:24px; font-size:13.5px; font-weight:600;">
        <a href="#about" style="color:#E2E8F0; text-decoration:none;">About Fund</a>
        <a href="#impact" style="color:#E2E8F0; text-decoration:none;">Our Impact</a>
        <a href="#events" style="color:#E2E8F0; text-decoration:none;">Concert Season</a>
        <a href="#patrons" style="color:#E2E8F0; text-decoration:none;">Patrons &amp; Governance</a>
        <a href="#events" style="background:#C5A059; color:#0C192E; padding:8px 20px; border-radius:999px; text-decoration:none; font-weight:700; font-size:13px; transition:all 0.2s;">Reserve Pass &rarr;</a>
      </nav>
    </div>
  </header>

  <!-- FULL-WIDTH GALA HERO -->
  <section style="position:relative; min-height:80vh; display:flex; align-items:center; justify-content:center; background-image:linear-gradient(rgba(12,25,46,0.75), rgba(7,17,32,0.92)), url('http://localhost:8080/wp-content/uploads/2026/11/kfc-hero-grand-piano.jpg'); background-size:cover; background-position:center; text-align:center; padding:100px 24px;">
    <div style="max-width:980px; margin:0 auto;">
      <span style="display:inline-block; border:1px solid #C5A059; color:#C5A059; padding:6px 20px; border-radius:999px; font-size:11.5px; font-weight:700; letter-spacing:2px; text-transform:uppercase; margin-bottom:28px; font-family:-apple-system, sans-serif;">
        Music Has the Power to Change Lives
      </span>
      <h1 style="font-size:clamp(38px, 5.5vw, 68px); font-weight:700; line-height:1.12; color:#FFFFFF; margin:0 0 24px; letter-spacing:-0.5px;">
        Investing in New Zealand’s Next Generation of Musicians &bull; Healing Children Through Art
      </h1>
      <p style="font-size:clamp(16px, 2vw, 20px); line-height:1.65; color:#E2E8F0; max-width:780px; margin:0 auto 40px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-weight:300;">
        Under the artistic leadership of Nick Wang, Keys for Cure removes barriers for talented young classical performers across Auckland while channeling 100% of concert proceeds into pediatric healthcare at Starship Children's Hospital.
      </p>
      <div style="display:flex; justify-content:center; gap:16px; flex-wrap:wrap; font-family:-apple-system, sans-serif;">
        <a href="#events" style="background:#C5A059; color:#0C192E; font-weight:700; padding:16px 36px; border-radius:8px; text-decoration:none; font-size:15px; letter-spacing:0.5px; box-shadow:0 10px 25px rgba(197,160,89,0.3);">
          Explore 2026/27 Concerts &amp; Passes &rarr;
        </a>
        <a href="#patrons" style="background:transparent; border:1px solid rgba(255,255,255,0.4); color:#FFFFFF; font-weight:600; padding:16px 32px; border-radius:8px; text-decoration:none; font-size:15px;">
          Patron Statements &amp; Mission
        </a>
      </div>
    </div>
  </section>

  <!-- LONDON MUSIC FUND SIGNATURE GOLD STATS RIBBON -->
  <section id="impact" style="background:#071120; border-top:1px solid rgba(197,160,89,0.3); border-bottom:1px solid rgba(197,160,89,0.3); padding:40px 24px; font-family:-apple-system, sans-serif;">
    <div style="max-width:1300px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:32px; text-align:center;">
      <div style="border-right:1px solid rgba(255,255,255,0.1); padding-right:16px;">
        <div style="font-size:42px; font-weight:800; color:#C5A059; font-family:'Playfair Display', Georgia, serif;">$100k+</div>
        <div style="font-size:14px; font-weight:700; color:#FFFFFF; margin-top:6px;">Invested in Pediatric Health</div>
        <div style="font-size:12px; color:#94A3B8; margin-top:3px;">Starship &amp; Mercy Hospice Grants</div>
      </div>
      <div style="border-right:1px solid rgba(255,255,255,0.1); padding-right:16px;">
        <div style="font-size:42px; font-weight:800; color:#C5A059; font-family:'Playfair Display', Georgia, serif;">350+</div>
        <div style="font-size:14px; font-weight:700; color:#FFFFFF; margin-top:6px;">Young Musicians on Stage</div>
        <div style="font-size:12px; color:#94A3B8; margin-top:3px;">Auckland &amp; New Zealand Recitals</div>
      </div>
      <div style="border-right:1px solid rgba(255,255,255,0.1); padding-right:16px;">
        <div style="font-size:42px; font-weight:800; color:#C5A059; font-family:'Playfair Display', Georgia, serif;">4 Major</div>
        <div style="font-size:14px; font-weight:700; color:#FFFFFF; margin-top:6px;">Charity Beneficiaries</div>
        <div style="font-size:12px; color:#94A3B8; margin-top:3px;">Cancer Society, Starship &amp; Hospice</div>
      </div>
      <div>
        <div style="font-size:42px; font-weight:800; color:#C5A059; font-family:'Playfair Display', Georgia, serif;">100%</div>
        <div style="font-size:14px; font-weight:700; color:#FFFFFF; margin-top:6px;">Net Ticket Proceeds Donated</div>
        <div style="font-size:12px; color:#94A3B8; margin-top:3px;">Zero Administrative Waste</div>
      </div>
    </div>
  </section>

  <!-- 3-COLUMN EDITORIAL CARDS (LMF Style) -->
  <section id="about" style="background:#0C192E; padding:90px 24px;">
    <div style="max-width:1300px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:50px;">
        <span style="font-size:11.5px; text-transform:uppercase; letter-spacing:2px; color:#C5A059; font-weight:700; font-family:-apple-system, sans-serif;">What We Do</span>
        <h2 style="font-size:38px; color:#FFFFFF; margin:10px 0 0;">Transforming Musical Talent into Public Impact</h2>
      </div>

      <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(340px, 1fr)); gap:32px;">
        <!-- Card 1 -->
        <div style="background:#13233D; border:1px solid rgba(197,160,89,0.25); border-radius:14px; overflow:hidden; display:flex; flex-direction:column;">
          <img src="http://localhost:8080/wp-content/uploads/2026/11/kfc-piano-hands.jpg" alt="Junior Classical Scholarships" style="width:100%; height:230px; object-fit:cover;">
          <div style="padding:28px; flex:1; display:flex; flex-direction:column; justify-content:space-between; font-family:-apple-system, sans-serif;">
            <div>
              <span style="color:#C5A059; font-weight:700; font-size:11.5px; text-transform:uppercase; letter-spacing:1px;">Scholarship &bull; Repertoire</span>
              <h3 style="color:#FFFFFF; font-size:21px; margin:8px 0 12px; font-family:'Playfair Display', serif;">Young Performers Collective</h3>
              <p style="color:#94A3B8; font-size:14px; line-height:1.7;">Providing gifted adolescent pianists, string players, and wind soloists masterclass training and high-profile concert hall stages across Auckland.</p>
            </div>
            <a href="#events" style="color:#C5A059; font-weight:700; text-decoration:none; font-size:13.5px; margin-top:20px; display:inline-block;">View Soloist Recitals &rarr;</a>
          </div>
        </div>

        <!-- Card 2 -->
        <div style="background:#13233D; border:1px solid rgba(197,160,89,0.25); border-radius:14px; overflow:hidden; display:flex; flex-direction:column;">
          <img src="http://localhost:8080/wp-content/uploads/2026/11/kfc-chamber-concert.jpg" alt="Starship Pediatric Partnership" style="width:100%; height:230px; object-fit:cover;">
          <div style="padding:28px; flex:1; display:flex; flex-direction:column; justify-content:space-between; font-family:-apple-system, sans-serif;">
            <div>
              <span style="color:#C5A059; font-weight:700; font-size:11.5px; text-transform:uppercase; letter-spacing:1px;">Healthcare &bull; Therapy</span>
              <h3 style="color:#FFFFFF; font-size:21px; margin:8px 0 12px; font-family:'Playfair Display', serif;">Children’s Mental Wellbeing Salon</h3>
              <p style="color:#94A3B8; font-size:14px; line-height:1.7;">Our 2026/27 flagship initiative combining live acoustic chamber music with emotional resilience therapy for pediatric patients recovering from chronic illnesses.</p>
            </div>
            <a href="#events" style="color:#C5A059; font-weight:700; text-decoration:none; font-size:13.5px; margin-top:20px; display:inline-block;">Learn About the Initiative &rarr;</a>
          </div>
        </div>

        <!-- Card 3 -->
        <div style="background:#13233D; border:1px solid rgba(197,160,89,0.25); border-radius:14px; overflow:hidden; display:flex; flex-direction:column;">
          <img src="http://localhost:8080/wp-content/uploads/2026/11/kfc-holiday-gala.jpg" alt="Annual Gala Performances" style="width:100%; height:230px; object-fit:cover;">
          <div style="padding:28px; flex:1; display:flex; flex-direction:column; justify-content:space-between; font-family:-apple-system, sans-serif;">
            <div>
              <span style="color:#C5A059; font-weight:700; font-size:11.5px; text-transform:uppercase; letter-spacing:1px;">Gala &bull; Community</span>
              <h3 style="color:#FFFFFF; font-size:21px; margin:8px 0 12px; font-family:'Playfair Display', serif;">Annual Flagship Concerts</h3>
              <p style="color:#94A3B8; font-size:14px; line-height:1.7;">Held at premier Auckland venues including Takapuna Community Hall and Bruce Mason Centre, uniting families, civic leaders, and classical music lovers.</p>
            </div>
            <a href="#events" style="color:#C5A059; font-weight:700; text-decoration:none; font-size:13.5px; margin-top:20px; display:inline-block;">Reserve Season Passes &rarr;</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- NATIVE EVENT CALENDAR (ELFSIGHT MIRROR) -->
  <section id="events" style="background:#071120; padding:90px 24px; border-top:1px solid rgba(197,160,89,0.2); border-bottom:1px solid rgba(197,160,89,0.2);">
    <div style="max-width:1300px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:44px;">
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
  <section id="patrons" style="background:#0C192E; padding:90px 24px;">
    <div style="max-width:1300px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:48px;">
        <span style="font-size:11.5px; text-transform:uppercase; letter-spacing:2px; color:#C5A059; font-weight:700; font-family:-apple-system, sans-serif;">Patron Endorsements</span>
        <h2 style="font-size:38px; color:#FFFFFF; margin-top:8px;">Endorsed by New Zealand Government Leaders</h2>
      </div>

      <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(360px, 1fr)); gap:32px;">
        <!-- Christopher Luxon Quote -->
        <div style="background:#13233D; border:1px solid rgba(197,160,89,0.3); border-radius:14px; padding:36px; display:flex; flex-direction:column; justify-content:space-between;">
          <p style="font-size:16px; line-height:1.75; color:#E2E8F0; font-style:italic; margin:0 0 24px;">
            &ldquo;Nick Wang and the entire Keys for Cure team &mdash; thank you for your vision, your energy and your commitment to using music as a force for good. This year's focus, supporting the incredible work at Starship Children's Hospital, is a cause that touches all of us. Enjoy an absolutely wonderful evening. All the very best.&rdquo;
          </p>
          <div style="font-family:-apple-system, sans-serif;">
            <div style="font-weight:800; font-size:16px; color:#C5A059;">Rt Hon Christopher Luxon</div>
            <div style="font-size:12.5px; color:#94A3B8;">Prime Minister of New Zealand</div>
          </div>
        </div>

        <!-- Hon Paul Goldsmith Quote -->
        <div style="background:#13233D; border:1px solid rgba(197,160,89,0.3); border-radius:14px; padding:36px; display:flex; flex-direction:column; justify-content:space-between;">
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
  <footer style="background:#050C17; border-top:1px solid rgba(255,255,255,0.08); padding:60px 24px; font-family:-apple-system, sans-serif; font-size:13px; color:#94A3B8;">
    <div style="max-width:1300px; margin:0 auto; display:flex; justify-content:space-between; flex-wrap:wrap; gap:32px;">
      <div>
        <div style="font-size:17px; font-weight:800; color:#FFFFFF; margin-bottom:6px;">Keys for Cure Charitable Trust</div>
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

    public static function get_concept_2_harmonies_of_hope(): string {
        return <<<'HTML'

<!-- CONCEPT 2: PLAYING FOR CHANGE FOUNDATION ARCHETYPE (https://playingforchange.org/) -->
<div class="kfc-fullbleed kfc-pfc-theme" style="background:#F8FAFC; color:#0F172A; font-family:'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; line-height:1.6; margin:0; padding:0;">

  <!-- TOP HEADER / NAV BAR -->
  <header style="background:#FFFFFF; border-bottom:1px solid #E2E8F0; padding:16px 32px;">
    <div style="max-width:1300px; margin:0 auto; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
      <div style="display:flex; align-items:center; gap:12px;">
        <span style="font-size:22px; font-weight:900; color:#0052CC; letter-spacing:-0.5px;">KEYS FOR CURE</span>
        <span style="background:#FFC700; color:#0F172A; font-size:10.5px; font-weight:800; padding:2px 8px; border-radius:4px; text-transform:uppercase;">Youth Movement</span>
      </div>
      <nav style="display:flex; align-items:center; gap:24px; font-size:14px; font-weight:700;">
        <a href="#movement" style="color:#334155; text-decoration:none;">Our Movement</a>
        <a href="#salon" style="color:#334155; text-decoration:none;">2026 Initiative</a>
        <a href="#events" style="color:#334155; text-decoration:none;">Concert Schedule</a>
        <a href="#stories" style="color:#334155; text-decoration:none;">Patrons</a>
        <a href="#events" style="background:#0052CC; color:#FFFFFF; padding:10px 22px; border-radius:8px; text-decoration:none; font-weight:800; font-size:13.5px; box-shadow:0 4px 12px rgba(0,82,204,0.25);">Get Concert Pass &rarr;</a>
      </nav>
    </div>
  </header>

  <!-- ASYMMETRICAL SPLIT-SCREEN HERO -->
  <section id="movement" style="background:linear-gradient(135deg, #0052CC 0%, #022443 100%); color:#FFFFFF; padding:90px 32px 80px;">
    <div style="max-width:1300px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(360px, 1fr)); gap:48px; align-items:center;">
      <div>
        <span style="display:inline-block; background:#FFC700; color:#0F172A; padding:5px 14px; border-radius:999px; font-size:11.5px; font-weight:800; letter-spacing:1px; text-transform:uppercase; margin-bottom:20px;">
          The Heartbeat of Youth Music &bull; Charity CC63798
        </span>
        <h1 style="font-size:clamp(36px, 4.8vw, 62px); font-weight:900; line-height:1.1; margin:0 0 20px; letter-spacing:-1px;">
          Using the Power of Music to Heal Children &amp; Unite Communities
        </h1>
        <p style="font-size:17.5px; line-height:1.65; color:#E2E8F0; margin:0 0 32px; max-width:560px;">
          Founded by Nick Wang, Keys for Cure is New Zealand’s fastest-growing youth classical collective &mdash; empowering adolescent musicians to use their talent to raise essential funds for Starship Children's Hospital.
        </p>
        <div style="display:flex; gap:16px; flex-wrap:wrap;">
          <a href="#events" style="background:#FFC700; color:#0F172A; font-weight:800; padding:16px 32px; border-radius:10px; text-decoration:none; font-size:15px; box-shadow:0 10px 20px rgba(255,199,0,0.3);">
            Reserve Concert Pass &rarr;
          </a>
          <a href="#salon" style="background:rgba(255,255,255,0.15); color:#FFFFFF; font-weight:700; padding:16px 28px; border-radius:10px; text-decoration:none; font-size:15px; backdrop-filter:blur(6px);">
            Children’s Wellbeing Salon
          </a>
        </div>
      </div>

      <div style="position:relative;">
        <div style="background:#FFFFFF; border-radius:24px; overflow:hidden; box-shadow:0 25px 50px -12px rgba(0,0,0,0.4); padding:14px; border:2px solid rgba(255,255,255,0.2);">
          <img src="http://localhost:8080/wp-content/uploads/2026/11/kfc-chamber-concert.jpg" alt="Keys for Cure Youth Performers" style="width:100%; border-radius:16px; display:block; height:360px; object-fit:cover;">
          <div style="padding:18px 16px 8px; color:#0F172A;">
            <div style="display:flex; justify-content:space-between; align-items:center;">
              <span style="font-weight:900; font-size:15px; color:#0052CC;">Youth Chamber Strings &amp; Solo Recitals</span>
              <span style="background:#ECFDF5; color:#059669; font-size:11.5px; font-weight:800; padding:3px 10px; border-radius:6px;">Starship Beneficiary</span>
            </div>
            <div style="font-size:13px; color:#64748B; margin-top:6px;">Performing Beethoven, Brahms and classical masterworks across Auckland.</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- PFC 4-COLUMN PROGRAM TILES -->
  <section style="background:#FFFFFF; padding:80px 32px; border-bottom:1px solid #E2E8F0;">
    <div style="max-width:1300px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:48px;">
        <span style="font-size:11.5px; text-transform:uppercase; letter-spacing:1.5px; color:#0052CC; font-weight:800;">Our Core Programs</span>
        <h2 style="font-size:36px; font-weight:900; color:#0F172A; margin-top:8px;">How Music Drives Real Social Change in New Zealand</h2>
      </div>

      <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:24px;">
        <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:14px; padding:28px;">
          <div style="font-size:24px; margin-bottom:12px;">🧠</div>
          <h3 style="font-size:18px; font-weight:800; color:#0F172A; margin:0 0 8px;">01. Wellbeing Salon</h3>
          <p style="font-size:13.5px; color:#64748B; line-height:1.6; margin:0;">Children’s Mental Wellbeing Support Salon bringing therapeutic acoustic sessions to youth recovering from illness.</p>
        </div>
        <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:14px; padding:28px;">
          <div style="font-size:24px; margin-bottom:12px;">🎻</div>
          <h3 style="font-size:18px; font-weight:800; color:#0F172A; margin:0 0 8px;">02. Young Musicians</h3>
          <p style="font-size:13.5px; color:#64748B; line-height:1.6; margin:0;">Over 350 adolescent performers taking the stage at Bruce Mason Centre and Takapuna Community Hall.</p>
        </div>
        <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:14px; padding:28px;">
          <div style="font-size:24px; margin-bottom:12px;">🏥</div>
          <h3 style="font-size:18px; font-weight:800; color:#0F172A; margin:0 0 8px;">03. Hospital Partners</h3>
          <p style="font-size:13.5px; color:#64748B; line-height:1.6; margin:0;">Direct grants funding pediatric care at Starship Children's Hospital and support lodging with Cancer Society NZ.</p>
        </div>
        <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:14px; padding:28px;">
          <div style="font-size:24px; margin-bottom:12px;">🎟️</div>
          <h3 style="font-size:18px; font-weight:800; color:#0F172A; margin:0 0 8px;">04. $0 Pass Access</h3>
          <p style="font-size:13.5px; color:#64748B; line-height:1.6; margin:0;">Frictionless digital Concert Passes with instant QR door verification ensuring full accessibility for all families.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- NATIVE ELFSIGHT EVENT CALENDAR -->
  <section id="events" style="background:#F1F5F9; padding:80px 32px;">
    <div style="max-width:1300px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:44px;">
        <span style="font-size:11.5px; text-transform:uppercase; letter-spacing:1.5px; color:#0052CC; font-weight:800;">Concerts &amp; Live Recitals</span>
        <h2 style="font-size:36px; font-weight:900; color:#0F172A; margin-top:8px;">Upcoming Community Concerts</h2>
        <p style="font-size:15px; color:#64748B; max-width:600px; margin:10px auto 0;">
          Reserve your digital Concert Pass below with instant QR code generation for smooth entrance at the door.
        </p>
      </div>

      [kfc_event_calendar title="Upcoming Community Concerts &amp; Benefit Recitals"]
    </div>
  </section>

  <!-- STORIES & ENDORSEMENTS -->
  <section id="stories" style="background:#FFFFFF; padding:80px 32px; border-top:1px solid #E2E8F0;">
    <div style="max-width:1300px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(360px, 1fr)); gap:36px;">
      <div style="background:#0052CC; color:#FFFFFF; border-radius:18px; padding:36px; box-shadow:0 15px 30px rgba(0,82,204,0.2);">
        <span style="background:#FFC700; color:#0F172A; font-size:11px; font-weight:800; padding:3px 10px; border-radius:999px; text-transform:uppercase;">Prime Minister Endorsement</span>
        <p style="font-size:16px; line-height:1.75; font-style:italic; margin:18px 0 20px;">
          &ldquo;Nick Wang and the entire Keys for Cure team &mdash; thank you for your vision, your energy and your commitment to using music as a force for good. This year's focus, supporting the incredible work at Starship Children's Hospital, is a cause that touches all of us.&rdquo;
        </p>
        <div style="font-weight:900; font-size:16px;">Rt Hon Christopher Luxon</div>
        <div style="font-size:13px; opacity:0.85;">Prime Minister of New Zealand</div>
      </div>

      <div style="background:#022443; color:#FFFFFF; border-radius:18px; padding:36px; box-shadow:0 15px 30px rgba(2,36,67,0.2);">
        <span style="background:#059669; color:#FFFFFF; font-size:11px; font-weight:800; padding:3px 10px; border-radius:999px; text-transform:uppercase;">Arts &amp; Culture Ministry</span>
        <p style="font-size:16px; line-height:1.75; font-style:italic; margin:18px 0 20px;">
          &ldquo;My warm thanks to Nick Wang and the Young Musicians for using the power of music to share love and kindness through their dedication to charity. Over the years Keys for Cure has raised funds for Starship, Cancer Society, and Mercy Hospice.&rdquo;
        </p>
        <div style="font-weight:900; font-size:16px;">Hon Paul Goldsmith</div>
        <div style="font-size:13px; opacity:0.85;">Minister for Arts, Culture and Heritage</div>
      </div>
    </div>
  </section>

  <!-- COMMUNITY FOOTER -->
  <footer style="background:#0F172A; color:#FFFFFF; padding:60px 32px; font-size:13px;">
    <div style="max-width:1300px; margin:0 auto; display:flex; justify-content:space-between; flex-wrap:wrap; gap:32px;">
      <div>
        <div style="font-weight:900; font-size:18px; color:#FFFFFF; margin-bottom:6px;">Keys for Cure Charitable Trust</div>
        <div style="color:#94A3B8;">Charities Services Registration No: CC63798</div>
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

    public static function get_concept_3_nordic_minimalist(): string {
        return <<<'HTML'

<!-- CONCEPT 3: NORDOFF AND ROBBINS ARCHETYPE (https://www.nordoff-robbins.org.uk/) -->
<div class="kfc-fullbleed kfc-nordoff-theme" style="background:#FFFFFF; color:#18181B; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; line-height:1.6; margin:0; padding:0;">

  <!-- TOP HEADER / NAV BAR (Nordoff and Robbins Style) -->
  <header style="background:#FFFFFF; border-bottom:1px solid #E4E4E7; padding:18px 36px; position:sticky; top:0; z-index:100; box-shadow:0 1px 3px rgba(0,0,0,0.04);">
    <div style="max-width:1340px; margin:0 auto; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
      <div style="display:flex; align-items:center; gap:12px;">
        <span style="font-size:22px; font-weight:800; color:#18181B; letter-spacing:-0.5px;">Keys for Cure</span>
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

  <!-- NORDOFF & ROBBINS HERO BANNER -->
  <section style="background:#FAFAFA; border-bottom:1px solid #E4E4E7; padding:100px 36px 90px;">
    <div style="max-width:1340px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(380px, 1fr)); gap:56px; align-items:center;">
      <div>
        <div style="display:flex; align-items:center; gap:10px; margin-bottom:18px;">
          <span style="display:inline-block; width:10px; height:10px; border-radius:50%; background:#C8102E;"></span>
          <span style="font-size:12px; font-weight:800; letter-spacing:1.5px; text-transform:uppercase; color:#C8102E;">
            Pediatric Music Therapy &bull; New Zealand Charity CC63798
          </span>
        </div>
        <h1 style="font-size:clamp(38px, 5.2vw, 64px); font-weight:900; line-height:1.1; color:#18181B; margin:0 0 24px; letter-spacing:-1.5px;">
          Music therapy can be life-changing.
        </h1>
        <p style="font-size:clamp(17px, 2vw, 21px); line-height:1.65; color:#52525B; max-width:580px; margin:0 0 36px;">
          We’ve been transforming children's lives through live classical music and acoustic engagement &mdash; funding specialized pediatric therapy at Starship Children's Hospital and youth wellbeing support across New Zealand.
        </p>
        <div style="display:flex; gap:16px; flex-wrap:wrap;">
          <a href="#schedule" style="background:#18181B; color:#FFFFFF; font-weight:700; padding:16px 34px; border-radius:999px; text-decoration:none; font-size:15px; box-shadow:0 8px 16px rgba(0,0,0,0.1);">
            Explore Benefit Concerts &amp; Passes &rarr;
          </a>
          <a href="#services" style="background:#FFFFFF; border:1px solid #D4D4D8; color:#18181B; font-weight:700; padding:16px 30px; border-radius:999px; text-decoration:none; font-size:15px;">
            The 2026 Wellbeing Salon
          </a>
        </div>
      </div>

      <div style="position:relative;">
        <img src="http://localhost:8080/wp-content/uploads/2026/11/kfc-hero-grand-piano.jpg" alt="Music Therapy Performance" style="width:100%; border-radius:24px; box-shadow:0 25px 50px -12px rgba(0,0,0,0.15); display:block; height:420px; object-fit:cover;">
      </div>
    </div>
  </section>

  <!-- 3 ICONIC NORDOFF AND ROBBINS ACTION CARDS -->
  <section id="services" style="background:#FFFFFF; padding:90px 36px; border-bottom:1px solid #E4E4E7;">
    <div style="max-width:1340px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:52px;">
        <span style="font-size:12px; font-weight:800; letter-spacing:1.5px; text-transform:uppercase; color:#C8102E;">Connect With Us</span>
        <h2 style="font-size:38px; font-weight:900; color:#18181B; margin-top:8px; letter-spacing:-1px;">Bringing the Healing Discipline of Music to Those in Need</h2>
      </div>

      <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(340px, 1fr)); gap:32px;">
        <!-- Action Card 1 -->
        <div style="background:#FAFAFA; border:1px solid #E4E4E7; border-radius:18px; padding:36px; display:flex; flex-direction:column; justify-content:space-between;">
          <div>
            <div style="font-size:12px; font-weight:800; text-transform:uppercase; color:#C8102E; letter-spacing:1px; margin-bottom:10px;">For Hospital Partners</div>
            <h3 style="font-size:24px; font-weight:800; color:#18181B; margin:0 0 14px; line-height:1.25;">Pediatric Hospital Grants</h3>
            <p style="font-size:15px; color:#52525B; line-height:1.7; margin:0;">Bring acoustic music therapy and bedside comfort to children's recovery wards, hospice facilities, and specialized care homes.</p>
          </div>
          <a href="#schedule" style="margin-top:28px; color:#C8102E; font-weight:700; text-decoration:none; font-size:14px; display:inline-block;">Learn about hospital funding &rarr;</a>
        </div>

        <!-- Action Card 2 -->
        <div style="background:#FAFAFA; border:1px solid #E4E4E7; border-radius:18px; padding:36px; display:flex; flex-direction:column; justify-content:space-between;">
          <div>
            <div style="font-size:12px; font-weight:800; text-transform:uppercase; color:#C8102E; letter-spacing:1px; margin-bottom:10px;">For Families &amp; Patients</div>
            <h3 style="font-size:24px; font-weight:800; color:#18181B; margin:0 0 14px; line-height:1.25;">Children’s Wellbeing Salon</h3>
            <p style="font-size:15px; color:#52525B; line-height:1.7; margin:0;">Our 2026/27 community salon connects recovering children with acoustic masterworks and expressive music therapy sessions.</p>
          </div>
          <a href="#schedule" style="margin-top:28px; color:#C8102E; font-weight:700; text-decoration:none; font-size:14px; display:inline-block;">Discover our salon sessions &rarr;</a>
        </div>

        <!-- Action Card 3 -->
        <div style="background:#FAFAFA; border:1px solid #E4E4E7; border-radius:18px; padding:36px; display:flex; flex-direction:column; justify-content:space-between;">
          <div>
            <div style="font-size:12px; font-weight:800; text-transform:uppercase; color:#C8102E; letter-spacing:1px; margin-bottom:10px;">For Young Musicians</div>
            <h3 style="font-size:24px; font-weight:800; color:#18181B; margin:0 0 14px; line-height:1.25;">Young Musicians Collective</h3>
            <p style="font-size:15px; color:#52525B; line-height:1.7; margin:0;">Join Nick Wang and hundreds of adolescent concert virtuosi using their hard-earned musical gifts for tangible social impact.</p>
          </div>
          <a href="#schedule" style="margin-top:28px; color:#C8102E; font-weight:700; text-decoration:none; font-size:14px; display:inline-block;">Join the performers roster &rarr;</a>
        </div>
      </div>
    </div>
  </section>

  <!-- NORDOFF & ROBBINS STATS RIBBON -->
  <section id="impact" style="background:#F4F4F5; padding:50px 36px; border-bottom:1px solid #E4E4E7;">
    <div style="max-width:1340px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:32px; text-align:center;">
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
    </div>
  </section>

  <!-- CASE STORY SECTION (Jamal's Story Style) -->
  <section id="about" style="background:#FFFFFF; padding:100px 36px; border-bottom:1px solid #E4E4E7;">
    <div style="max-width:1340px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(380px, 1fr)); gap:56px; align-items:center;">
      <div>
        <img src="http://localhost:8080/wp-content/uploads/2026/11/kfc-chamber-concert.jpg" alt="Keys for Cure Concert Recital" style="width:100%; border-radius:24px; box-shadow:0 20px 40px rgba(0,0,0,0.08); display:block; height:380px; object-fit:cover;">
      </div>
      <div>
        <span style="font-size:12px; font-weight:800; letter-spacing:1.5px; text-transform:uppercase; color:#C8102E;">Real Human Impact</span>
        <h2 style="font-size:36px; font-weight:900; color:#18181B; margin:10px 0 20px; line-height:1.2; letter-spacing:-0.5px;">
          Music is a safe space where children can heal and express themselves.
        </h2>
        <p style="font-size:16px; color:#52525B; line-height:1.75; margin:0 0 24px;">
          Founded in Auckland by Nick Wang, Keys for Cure connects the therapeutic power of acoustic piano and strings directly with children undergoing difficult medical treatments at Starship Children's Hospital.
        </p>
        <div style="background:#FAFAFA; border-left:4px solid #C8102E; padding:18px 24px; border-radius:0 12px 12px 0;">
          <p style="font-size:14.5px; line-height:1.7; color:#27272A; font-style:italic; margin:0 0 10px;">
            &ldquo;My warm thanks to Nick Wang and the Young Musicians for using the power of music to share love and kindness through their dedication to charity. Over the years Keys for Cure has raised funds for Starship, Cancer Society, and Mercy Hospice.&rdquo;
          </p>
          <div style="font-weight:800; font-size:14px; color:#18181B;">Hon Paul Goldsmith</div>
          <div style="font-size:12px; color:#71717A;">Minister for Arts, Culture and Heritage &bull; New Zealand Government</div>
        </div>
      </div>
    </div>
  </section>

  <!-- NATIVE ELFSIGHT EVENT CALENDAR -->
  <section id="schedule" style="background:#FAFAFA; padding:90px 36px; border-bottom:1px solid #E4E4E7;">
    <div style="max-width:1340px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:44px;">
        <span style="font-size:12px; font-weight:800; letter-spacing:1.5px; text-transform:uppercase; color:#C8102E;">Concert Schedule</span>
        <h2 style="font-size:38px; font-weight:900; color:#18181B; margin-top:8px; letter-spacing:-1px;">2026/27 Chronological Benefit Concerts</h2>
        <p style="font-size:15px; color:#52525B; max-width:600px; margin:10px auto 0;">
          Reserve your passes with instant QR door confirmation. All admissions support pediatric patient care.
        </p>
      </div>

      [kfc_event_calendar title="Chronological Concert Schedule &amp; Pass Reservation"]
    </div>
  </section>

  <!-- NORDOFF STYLE FOOTER -->
  <footer style="background:#18181B; color:#A1A1AA; padding:60px 36px; font-size:13.5px;">
    <div style="max-width:1340px; margin:0 auto; display:flex; justify-content:space-between; flex-wrap:wrap; gap:32px;">
      <div>
        <div style="font-weight:800; color:#FFFFFF; font-size:18px; margin-bottom:6px;">Keys for Cure Charitable Trust</div>
        <div>Charities Services Registration: CC63798 &bull; Charitable Trusts Act 1957</div>
        <div style="margin-top:4px;">Headquarters: 20 Northcroft Street, Takapuna, Auckland, New Zealand</div>
      </div>
      <div>
        <div style="font-weight:800; color:#FFFFFF; margin-bottom:6px;">Governance &amp; Contact</div>
        <div>Email: <a href="mailto:info@keysforcure.org.nz" style="color:#FFFFFF; text-decoration:underline;">info@keysforcure.org.nz</a></div>
        <div style="margin-top:4px;">100% of Net Concert Proceeds Distributed to Pediatric Health Beneficiaries</div>
      </div>
    </div>
  </footer>

</div>

HTML;
    }
}
