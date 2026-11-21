<?php
/**
 * Keys for Cure - Benchmark Presentation Layouts
 * Mirroring established charity standards:
 * 1. London Music Fund (https://www.londonmusicfund.org/) - Classical Editorial
 * 2. Playing For Change Foundation (https://playingforchange.org/) - Grassroots Movement
 * 3. Nordoff and Robbins (https://www.nordoff-robbins.org.uk/) - Clinical Music Therapy
 *
 * Grounded in authentic Keys for Cure (CC63798) exemplar data from https://www.keysforcure.org.nz/
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
     * CONCEPT 1: LONDON MUSIC FUND ARCHETYPE (https://www.londonmusicfund.org/)
     * Style: Restrained Classical Editorial & Patronage
     * Palette: Obsidian (#0B0F17), Dark Navy (#111827), Champagne Gold (#C5A059), Slate (#94A3B8)
     * ========================================================================= */
    public static function get_concept_1_symphonic_prestige(): string {
        return <<<'HTML'
<div class="kfc-fullbleed kfc-lmf-theme" style="background:#0B0F17; color:#FFFFFF; font-family:Georgia, 'Times New Roman', serif; line-height:1.6; margin:0; padding:0; width:100%;">

  <!-- NAV BAR -->
  <header class="kfc-concept-header" style="background:#080C14; border-bottom:1px solid #1E293B; padding:18px 36px; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; position:sticky; top:0; z-index:100;">
    <div style="max-width:1200px; margin:0 auto; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
      <div style="display:flex; align-items:center; gap:12px;">
        <span style="font-family:Georgia, serif; font-size:20px; color:#C5A059; font-weight:700; letter-spacing:1px; text-transform:uppercase;">Keys for Cure</span>
        <span style="height:14px; width:1px; background:#334155;"></span>
        <span style="font-size:11px; letter-spacing:1px; text-transform:uppercase; color:#94A3B8; font-weight:600;">Charity CC63798</span>
      </div>
      <nav style="display:flex; align-items:center; gap:24px; font-size:13.5px; font-weight:500;">
        <a href="#about" style="color:#CBD5E1; text-decoration:none;">About</a>
        <a href="#impact" style="color:#CBD5E1; text-decoration:none;">Impact</a>
        <a href="#events" style="color:#CBD5E1; text-decoration:none;">Concert Schedule</a>
        <a href="#patrons" style="color:#CBD5E1; text-decoration:none;">Patrons</a>
        <a href="#events" style="background:#C5A059; color:#0B0F17; padding:8px 18px; border-radius:3px; text-decoration:none; font-weight:700; font-size:13px;">Reserve Passes &rarr;</a>
      </nav>
    </div>
  </header>

  <!-- EDITORIAL HERO BANNER -->
  <section style="background:#0B0F17; border-bottom:1px solid #1E293B; padding:80px 24px;">
    <div style="max-width:1100px; margin:0 auto; text-align:center;">
      <p style="color:#C5A059; font-size:12px; font-weight:700; letter-spacing:2px; text-transform:uppercase; margin-bottom:18px; font-family:-apple-system, sans-serif;">
        Music Has the Power to Change Lives &bull; Auckland, New Zealand
      </p>
      <h1 style="font-size:clamp(34px, 4.5vw, 54px); font-weight:normal; line-height:1.2; color:#FFFFFF; margin:0 0 22px;">
        Transforming Musical Artistry into Action for Children’s Wellbeing
      </h1>
      <p style="font-size:17px; line-height:1.7; color:#94A3B8; max-width:760px; margin:0 auto 32px; font-family:-apple-system, sans-serif;">
        Founded in Auckland by Nick Wang, Keys for Cure Charitable Trust (CC63798) empowers young classical performers to give back to the community &mdash; directing 100% of concert proceeds to Starship Children's Hospital and youth mental wellbeing support.
      </p>
      <div style="display:flex; justify-content:center; gap:14px; flex-wrap:wrap; font-family:-apple-system, sans-serif; margin-bottom:48px;">
        <a href="#events" style="background:#C5A059; color:#0B0F17; font-weight:700; padding:12px 28px; border-radius:3px; text-decoration:none; font-size:14px;">
          View 2026/27 Concerts &rarr;
        </a>
        <a href="#about" style="background:transparent; border:1px solid #334155; color:#E2E8F0; padding:12px 24px; border-radius:3px; text-decoration:none; font-size:14px;">
          About Our Mission
        </a>
      </div>

      <!-- PLACEHOLDER HERO IMAGE -->
      <div style="max-width:1000px; margin:0 auto; border:1px solid #1E293B; border-radius:6px; overflow:hidden;">
        <img src="/wp-content/uploads/2026/11/placeholder-hero.png" alt="Auckland War Memorial Museum &amp; Concert Stage Placeholder" style="width:100%; height:auto; display:block;">
      </div>
    </div>
  </section>

  <!-- STATS RIBBON -->
  <section id="impact" style="background:#080C14; border-bottom:1px solid #1E293B; padding:40px 24px; font-family:-apple-system, sans-serif;">
    <div style="max-width:1100px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:24px; text-align:center;">
      <div>
        <div style="font-size:36px; font-weight:700; color:#C5A059; font-family:Georgia, serif;">$100,000+</div>
        <div style="font-size:13px; color:#E2E8F0; margin-top:4px;">Raised for Pediatric Care</div>
        <div style="font-size:11.5px; color:#64748B;">Starship &amp; Mercy Hospice</div>
      </div>
      <div>
        <div style="font-size:36px; font-weight:700; color:#C5A059; font-family:Georgia, serif;">350+</div>
        <div style="font-size:13px; color:#E2E8F0; margin-top:4px;">Young Musicians on Stage</div>
        <div style="font-size:11.5px; color:#64748B;">Auckland Recitals &amp; Salons</div>
      </div>
      <div>
        <div style="font-size:36px; font-weight:700; color:#C5A059; font-family:Georgia, serif;">$380,000</div>
        <div style="font-size:13px; color:#E2E8F0; margin-top:4px;">Fazioli Concert Grand</div>
        <div style="font-size:11.5px; color:#64748B;">Under the Dome Flagship</div>
      </div>
      <div>
        <div style="font-size:36px; font-weight:700; color:#C5A059; font-family:Georgia, serif;">100%</div>
        <div style="font-size:13px; color:#E2E8F0; margin-top:4px;">Proceeds to Charitable Care</div>
        <div style="font-size:11.5px; color:#64748B;">Registered Charity CC63798</div>
      </div>
    </div>
  </section>

  <!-- 3 CORE PILLARS (EDITORIAL CARDS WITH PLACEHOLDER PNGS) -->
  <section id="about" style="background:#0B0F17; padding:72px 24px; border-bottom:1px solid #1E293B;">
    <div style="max-width:1100px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:44px;">
        <span style="font-size:11px; text-transform:uppercase; letter-spacing:1.5px; color:#C5A059; font-weight:700; font-family:-apple-system, sans-serif;">Key Programmes</span>
        <h2 style="font-size:32px; font-weight:normal; color:#FFFFFF; margin:8px 0 0;">Transforming Artistry into Community Wellbeing</h2>
      </div>

      <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(310px, 1fr)); gap:24px;">
        <!-- Card 1 -->
        <div style="background:#0F172A; border:1px solid #1E293B; border-radius:6px; overflow:hidden; display:flex; flex-direction:column;">
          <img src="/wp-content/uploads/2026/11/placeholder-piano.png" alt="Fazioli Piano Masterclass Placeholder" style="width:100%; height:200px; object-fit:cover; display:block;">
          <div style="padding:24px; flex:1; display:flex; flex-direction:column; justify-content:space-between; font-family:-apple-system, sans-serif;">
            <div>
              <span style="color:#C5A059; font-weight:700; font-size:11px; text-transform:uppercase;">Education &bull; Soloists</span>
              <h3 style="color:#FFFFFF; font-size:19px; margin:6px 0 10px; font-family:Georgia, serif;">Young Performers Collective</h3>
              <p style="color:#94A3B8; font-size:13.5px; line-height:1.6; margin:0;">Providing gifted young musicians masterclass mentorship on the Fazioli concert grand piano and high-profile concert hall stages across Auckland.</p>
            </div>
            <a href="#events" style="color:#C5A059; font-weight:600; text-decoration:none; font-size:13px; margin-top:20px; display:inline-block;">View Soloist Recitals &rarr;</a>
          </div>
        </div>

        <!-- Card 2 -->
        <div style="background:#0F172A; border:1px solid #1E293B; border-radius:6px; overflow:hidden; display:flex; flex-direction:column;">
          <img src="/wp-content/uploads/2026/11/placeholder-chamber.png" alt="Children's Wellbeing Support Salon Placeholder" style="width:100%; height:200px; object-fit:cover; display:block;">
          <div style="padding:24px; flex:1; display:flex; flex-direction:column; justify-content:space-between; font-family:-apple-system, sans-serif;">
            <div>
              <span style="color:#C5A059; font-weight:700; font-size:11px; text-transform:uppercase;">Healthcare &bull; Support</span>
              <h3 style="color:#FFFFFF; font-size:19px; margin:6px 0 10px; font-family:Georgia, serif;">Children’s Mental Wellbeing Salon</h3>
              <p style="color:#94A3B8; font-size:13.5px; line-height:1.6; margin:0;">Our flagship initiative offering children safe spaces to be heard and valued, providing families practical emotional wellbeing tools and acoustic therapy.</p>
            </div>
            <a href="#events" style="color:#C5A059; font-weight:600; text-decoration:none; font-size:13px; margin-top:20px; display:inline-block;">Learn About the Initiative &rarr;</a>
          </div>
        </div>

        <!-- Card 3 -->
        <div style="background:#0F172A; border:1px solid #1E293B; border-radius:6px; overflow:hidden; display:flex; flex-direction:column;">
          <img src="/wp-content/uploads/2026/11/placeholder-gala.png" alt="Annual Gala Performances Placeholder" style="width:100%; height:200px; object-fit:cover; display:block;">
          <div style="padding:24px; flex:1; display:flex; flex-direction:column; justify-content:space-between; font-family:-apple-system, sans-serif;">
            <div>
              <span style="color:#C5A059; font-weight:700; font-size:11px; text-transform:uppercase;">Community &bull; Gala</span>
              <h3 style="color:#FFFFFF; font-size:19px; margin:6px 0 10px; font-family:Georgia, serif;">Under the Dome Flagship Concert</h3>
              <p style="color:#94A3B8; font-size:13.5px; line-height:1.6; margin:0;">Presented at the iconic Under the Dome venue at Auckland War Memorial Museum, uniting civic leaders, educators, and music lovers for patient care.</p>
            </div>
            <a href="#events" style="color:#C5A059; font-weight:600; text-decoration:none; font-size:13px; margin-top:20px; display:inline-block;">Reserve Season Passes &rarr;</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CONCERT CALENDAR -->
  <section id="events" style="background:#080C14; padding:72px 24px; border-bottom:1px solid #1E293B;">
    <div style="max-width:1100px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:36px;">
        <span style="font-size:11px; text-transform:uppercase; letter-spacing:1.5px; color:#C5A059; font-weight:700; font-family:-apple-system, sans-serif;">Upcoming Concerts</span>
        <h2 style="font-size:30px; font-weight:normal; color:#FFFFFF; margin:6px 0 0;">2026/27 Benefit Concert Season Schedule</h2>
        <p style="font-size:14px; color:#94A3B8; max-width:600px; margin:8px auto 0; font-family:-apple-system, sans-serif;">
          Select any concert below to view event details and reserve admission passes with digital QR verification.
        </p>
      </div>

      [kfc_event_calendar title="Benefit Concerts &amp; Recitals"]
    </div>
  </section>

  <!-- PATRON STATEMENTS -->
  <section id="patrons" style="background:#0B0F17; padding:72px 24px; border-bottom:1px solid #1E293B;">
    <div style="max-width:1100px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:44px;">
        <span style="font-size:11px; text-transform:uppercase; letter-spacing:1.5px; color:#C5A059; font-weight:700; font-family:-apple-system, sans-serif;">Endorsements</span>
        <h2 style="font-size:30px; font-weight:normal; color:#FFFFFF; margin-top:6px;">Official New Zealand Endorsements</h2>
      </div>

      <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:24px;">
        <div style="background:#0F172A; border:1px solid #1E293B; border-radius:6px; padding:28px;">
          <p style="font-size:14.5px; line-height:1.7; color:#E2E8F0; font-style:italic; margin:0 0 20px;">
            &ldquo;Nick Wang and the entire Keys for Cure team &mdash; thank you for your vision, your energy and your commitment to using music as a force for good. This year's focus, supporting the incredible work at Starship Children's Hospital, is a cause that touches all of us. Enjoy an absolutely wonderful evening. All the very best.&rdquo;
          </p>
          <div style="font-family:-apple-system, sans-serif;">
            <div style="font-weight:700; font-size:14.5px; color:#C5A059;">Rt Hon Christopher Luxon</div>
            <div style="font-size:12px; color:#94A3B8;">Prime Minister of New Zealand</div>
          </div>
        </div>

        <div style="background:#0F172A; border:1px solid #1E293B; border-radius:6px; padding:28px;">
          <p style="font-size:14.5px; line-height:1.7; color:#E2E8F0; font-style:italic; margin:0 0 20px;">
            &ldquo;Over the years the Keys for Cure Charitable Trust has raised funds for many important causes including the Cancer Society of New Zealand, Breast Cancer Foundation, Mercy Hospice and Starship Children's Hospital. My warm thanks to Nick Wang and the Young Musicians for using the power of music to share love and kindness through their dedication to charity.&rdquo;
          </p>
          <div style="font-family:-apple-system, sans-serif;">
            <div style="font-weight:700; font-size:14.5px; color:#C5A059;">Hon Paul Goldsmith</div>
            <div style="font-size:12px; color:#94A3B8;">Minister for Arts, Culture and Heritage &bull; Minister of Justice</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer style="background:#06080E; padding:48px 24px; font-family:-apple-system, sans-serif; font-size:13px; color:#64748B;">
    <div style="max-width:1100px; margin:0 auto; display:flex; justify-content:space-between; flex-wrap:wrap; gap:24px;">
      <div>
        <div style="font-size:15px; font-weight:700; color:#FFFFFF; margin-bottom:4px;">Keys for Cure Charitable Trust</div>
        <div>Registered Charity CC63798 under the Charitable Trusts Act 1957</div>
        <div style="margin-top:4px;">20 Northcroft Street, Takapuna, Auckland, New Zealand</div>
      </div>
      <div>
        <div style="color:#C5A059; font-weight:600; margin-bottom:4px;">Governance &amp; Contact</div>
        <div>Email: <a href="mailto:info@keysforcure.org" style="color:#C5A059; text-decoration:none;">info@keysforcure.org</a></div>
        <div style="margin-top:4px;">100% of Net Concert Proceeds Directed to Charitable Projects</div>
      </div>
    </div>
  </footer>

</div>
HTML;
    }

    /* =========================================================================
     * CONCEPT 2: PLAYING FOR CHANGE FOUNDATION (https://playingforchange.org/)
     * Style: Clean Grassroots Movement
     * Palette: Electric Cobalt (#0052CC), Sunflower Yellow (#FFC700), Charcoal (#0F172A), Off-White (#F8FAFC)
     * ========================================================================= */
    public static function get_concept_2_harmonies_of_hope(): string {
        return <<<'HTML'
<div class="kfc-fullbleed kfc-pfc-theme" style="background:#FFFFFF; color:#0F172A; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; line-height:1.6; margin:0; padding:0; width:100%;">

  <!-- NAV BAR -->
  <header class="kfc-concept-header" style="background:#FFFFFF; border-bottom:1px solid #E2E8F0; padding:16px 36px; position:sticky; top:0; z-index:100;">
    <div style="max-width:1200px; margin:0 auto; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
      <div style="display:flex; align-items:center; gap:10px;">
        <span style="font-size:20px; font-weight:800; color:#0052CC; letter-spacing:-0.5px;">KEYS FOR CURE</span>
        <span style="background:#FFC700; color:#0F172A; font-size:10px; font-weight:700; padding:2px 8px; border-radius:3px; text-transform:uppercase;">CC63798</span>
      </div>
      <nav style="display:flex; align-items:center; gap:24px; font-size:13.5px; font-weight:600;">
        <a href="#movement" style="color:#334155; text-decoration:none;">Movement</a>
        <a href="#programs" style="color:#334155; text-decoration:none;">Programs</a>
        <a href="#events" style="color:#334155; text-decoration:none;">Concerts</a>
        <a href="#stories" style="color:#334155; text-decoration:none;">Patrons</a>
        <a href="#events" style="background:#0052CC; color:#FFFFFF; padding:8px 18px; border-radius:4px; text-decoration:none; font-weight:700; font-size:13px;">Get Passes &rarr;</a>
      </nav>
    </div>
  </header>

  <!-- CLEAN MOVEMENT HERO -->
  <section id="movement" style="background:#F8FAFC; border-bottom:1px solid #E2E8F0; padding:72px 24px;">
    <div style="max-width:1100px; margin:0 auto; text-align:center;">
      <span style="display:inline-block; background:#0052CC; color:#FFFFFF; padding:4px 14px; border-radius:3px; font-size:11px; font-weight:700; letter-spacing:1px; text-transform:uppercase; margin-bottom:20px;">
        Music for Social Change &bull; New Zealand Charity CC63798
      </span>
      <h1 style="font-size:clamp(32px, 4.5vw, 52px); font-weight:800; line-height:1.15; color:#0F172A; margin:0 0 20px; letter-spacing:-0.5px; text-transform:uppercase;">
        Using the Power of Music to Support Children’s Wellbeing
      </h1>
      <p style="font-size:17px; line-height:1.65; color:#475569; margin:0 auto 32px; max-width:760px;">
        Founded by Nick Wang, Keys for Cure is an Auckland-based youth classical collective connecting music, charity, and education. We transform concerts into tangible support for Starship Children's Hospital and youth mental health.
      </p>
      <div style="display:flex; justify-content:center; gap:14px; flex-wrap:wrap; margin-bottom:44px;">
        <a href="#events" style="background:#FFC700; color:#0F172A; font-weight:700; padding:12px 28px; border-radius:4px; text-decoration:none; font-size:14px;">
          Reserve Concert Pass &rarr;
        </a>
        <a href="#programs" style="background:#FFFFFF; border:1px solid #CBD5E1; color:#0F172A; font-weight:600; padding:12px 24px; border-radius:4px; text-decoration:none; font-size:14px;">
          Children’s Wellbeing Salon
        </a>
      </div>

      <!-- PLACEHOLDER HERO IMAGE -->
      <div style="max-width:1000px; margin:0 auto; border:1px solid #E2E8F0; border-radius:6px; overflow:hidden;">
        <img src="/wp-content/uploads/2026/11/placeholder-hero.png" alt="Keys for Cure Concert Stage Placeholder" style="width:100%; height:auto; display:block;">
      </div>
    </div>
  </section>

  <!-- 4 AREAS OF IMPACT -->
  <section id="programs" style="background:#FFFFFF; padding:72px 24px; border-bottom:1px solid #E2E8F0;">
    <div style="max-width:1100px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:44px;">
        <span style="font-size:11px; text-transform:uppercase; letter-spacing:1.5px; color:#0052CC; font-weight:700;">Areas of Impact</span>
        <h2 style="font-size:30px; font-weight:800; color:#0F172A; margin-top:6px;">How Music Drives Tangible Support</h2>
      </div>

      <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:20px;">
        <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:6px; padding:24px;">
          <div style="font-weight:700; color:#0052CC; font-size:13px; margin-bottom:6px;">01. Wellbeing Salon</div>
          <h3 style="font-size:17px; font-weight:700; color:#0F172A; margin:0 0 8px;">Children’s Mental Health</h3>
          <p style="font-size:13px; color:#64748B; line-height:1.6; margin:0;">Providing children a safe space to be heard and valued, with practical family emotional wellbeing tools.</p>
        </div>
        <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:6px; padding:24px;">
          <div style="font-weight:700; color:#0052CC; font-size:13px; margin-bottom:6px;">02. Young Musicians</div>
          <h3 style="font-size:17px; font-weight:700; color:#0F172A; margin:0 0 8px;">Youth Performance</h3>
          <p style="font-size:13px; color:#64748B; line-height:1.6; margin:0;">Over 350 adolescent performers taking the stage at Bruce Mason Centre and Auckland War Memorial Museum.</p>
        </div>
        <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:6px; padding:24px;">
          <div style="font-weight:700; color:#0052CC; font-size:13px; margin-bottom:6px;">03. Hospital Partners</div>
          <h3 style="font-size:17px; font-weight:700; color:#0F172A; margin:0 0 8px;">Starship &amp; Hospice</h3>
          <p style="font-size:13px; color:#64748B; line-height:1.6; margin:0;">Direct grants funding pediatric care at Starship Children's Hospital and support lodging with Cancer Society NZ.</p>
        </div>
        <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:6px; padding:24px;">
          <div style="font-weight:700; color:#0052CC; font-size:13px; margin-bottom:6px;">04. $0 Entry Barriers</div>
          <h3 style="font-size:17px; font-weight:700; color:#0F172A; margin:0 0 8px;">Accessible Passes</h3>
          <p style="font-size:13px; color:#64748B; line-height:1.6; margin:0;">Digital Concert Passes with instant QR verification ensuring accessible arts for all families.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CLEAN IMPACT STATS -->
  <section style="background:#FFC700; color:#0F172A; padding:36px 24px; font-weight:700;">
    <div style="max-width:1100px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:20px; text-align:center;">
      <div>
        <div style="font-size:32px; font-weight:800; line-height:1;">$100,000+</div>
        <div style="font-size:12.5px; margin-top:4px;">Distributed to Health Beneficiaries</div>
      </div>
      <div>
        <div style="font-size:32px; font-weight:800; line-height:1;">350+</div>
        <div style="font-size:12.5px; margin-top:4px;">Young Performers on Stage</div>
      </div>
      <div>
        <div style="font-size:32px; font-weight:800; line-height:1;">100%</div>
        <div style="font-size:12.5px; margin-top:4px;">Proceeds to Charitable Projects</div>
      </div>
      <div>
        <div style="font-size:32px; font-weight:800; line-height:1;">CC63798</div>
        <div style="font-size:12.5px; margin-top:4px;">Registered New Zealand Charity</div>
      </div>
    </div>
  </section>

  <!-- CONCERT CALENDAR -->
  <section id="events" style="background:#F8FAFC; padding:72px 24px; border-bottom:1px solid #E2E8F0;">
    <div style="max-width:1100px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:36px;">
        <span style="font-size:11px; text-transform:uppercase; letter-spacing:1.5px; color:#0052CC; font-weight:700;">Concerts &amp; Recitals</span>
        <h2 style="font-size:30px; font-weight:800; color:#0F172A; margin-top:6px;">Upcoming Benefit Concerts</h2>
        <p style="font-size:14px; color:#64748B; max-width:600px; margin:8px auto 0;">
          Reserve your digital Concert Pass below with instant QR code door check-in.
        </p>
      </div>

      [kfc_event_calendar title="Upcoming Community Concerts &amp; Benefit Recitals"]
    </div>
  </section>

  <!-- TESTIMONIALS -->
  <section id="stories" style="background:#FFFFFF; padding:72px 24px; border-bottom:1px solid #E2E8F0;">
    <div style="max-width:1100px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:24px;">
      <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:6px; padding:28px;">
        <span style="color:#0052CC; font-size:11px; font-weight:700; text-transform:uppercase;">Prime Minister Endorsement</span>
        <p style="font-size:14.5px; line-height:1.7; font-style:italic; margin:14px 0 16px; color:#334155;">
          &ldquo;Nick Wang and the entire Keys for Cure team &mdash; thank you for your vision, your energy and your commitment to using music as a force for good. This year's focus, supporting the incredible work at Starship Children's Hospital, is a cause that touches all of us.&rdquo;
        </p>
        <div style="font-weight:700; font-size:14px; color:#0F172A;">Rt Hon Christopher Luxon</div>
        <div style="font-size:12px; color:#64748B;">Prime Minister of New Zealand</div>
      </div>

      <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:6px; padding:28px;">
        <span style="color:#0052CC; font-size:11px; font-weight:700; text-transform:uppercase;">Ministerial Patronage</span>
        <p style="font-size:14.5px; line-height:1.7; font-style:italic; margin:14px 0 16px; color:#334155;">
          &ldquo;Over the years Keys for Cure has raised funds for Cancer Society NZ, Breast Cancer Foundation, Mercy Hospice and Starship Children's Hospital. My warm thanks to Nick Wang and the Young Musicians for using the power of music to share love and kindness.&rdquo;
        </p>
        <div style="font-weight:700; font-size:14px; color:#0F172A;">Hon Paul Goldsmith</div>
        <div style="font-size:12px; color:#64748B;">Minister for Arts, Culture and Heritage</div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer style="background:#0F172A; color:#FFFFFF; padding:48px 24px; font-size:13px;">
    <div style="max-width:1100px; margin:0 auto; display:flex; justify-content:space-between; flex-wrap:wrap; gap:24px;">
      <div>
        <div style="font-size:15px; font-weight:700; margin-bottom:4px;">Keys for Cure Charitable Trust</div>
        <div style="color:#94A3B8;">Charity CC63798 &bull; 100% Proceeds to Charitable Projects</div>
        <div style="color:#94A3B8; margin-top:4px;">20 Northcroft Street, Takapuna, Auckland, New Zealand</div>
      </div>
      <div>
        <div style="font-weight:700; color:#FFC700; margin-bottom:4px;">Contact Community Team</div>
        <div><a href="mailto:info@keysforcure.org" style="color:#FFFFFF; text-decoration:none;">info@keysforcure.org</a></div>
        <div style="color:#94A3B8; margin-top:4px;">&copy; 2026 Keys for Cure. All rights reserved.</div>
      </div>
    </div>
  </footer>

</div>
HTML;
    }

    /* =========================================================================
     * CONCEPT 3: NORDOFF AND ROBBINS ARCHETYPE (https://www.nordoff-robbins.org.uk/)
     * Style: Clean Scandinavian Music Therapy & Clinical Humanism
     * Palette: Clean Charcoal (#18181B), Pure White (#FFFFFF), Nordoff Coral/Red (#C8102E), Light Gray (#F4F4F6)
     * ========================================================================= */
    public static function get_concept_3_nordic_minimalist(): string {
        return <<<'HTML'
<div class="kfc-fullbleed kfc-nordoff-theme" style="background:#FFFFFF; color:#18181B; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; line-height:1.6; margin:0; padding:0; width:100%;">

  <!-- TOP HEADER (Nordoff and Robbins Style) -->
  <header class="kfc-concept-header" style="background:#FFFFFF; border-bottom:1px solid #E4E4E7; padding:18px 36px; position:sticky; top:0; z-index:100;">
    <div style="max-width:1140px; margin:0 auto; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
      <div style="display:flex; align-items:center; gap:12px;">
        <span style="font-size:22px; font-weight:800; color:#18181B; letter-spacing:-0.5px;">Keys for Cure</span>
        <span style="background:#F4F4F5; color:#52525B; font-size:11px; font-weight:600; padding:2px 8px; border-radius:4px;">Music Therapy &bull; CC63798</span>
      </div>
      <nav style="display:flex; align-items:center; gap:24px; font-size:13.5px; font-weight:600;">
        <a href="#about" style="color:#27272A; text-decoration:none;">About</a>
        <a href="#services" style="color:#27272A; text-decoration:none;">Therapy &amp; Salons</a>
        <a href="#schedule" style="color:#27272A; text-decoration:none;">Concert Schedule</a>
        <a href="#impact" style="color:#27272A; text-decoration:none;">Impact</a>
        <a href="#schedule" style="background:#C8102E; color:#FFFFFF; padding:8px 20px; border-radius:999px; text-decoration:none; font-weight:700; font-size:13px;">Reserve Passes &rarr;</a>
      </nav>
    </div>
  </header>

  <!-- NORDOFF & ROBBINS HERO BANNER -->
  <section style="background:#FAFAFA; border-bottom:1px solid #E4E4E7; padding:72px 24px;">
    <div style="max-width:1100px; margin:0 auto;">
      <div style="max-width:760px; margin-bottom:36px;">
        <div style="display:flex; align-items:center; gap:8px; margin-bottom:16px;">
          <span style="display:inline-block; width:8px; height:8px; border-radius:50%; background:#C8102E;"></span>
          <span style="font-size:11.5px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:#C8102E;">
            Pediatric Music Therapy &bull; New Zealand Charity CC63798
          </span>
        </div>
        <h1 style="font-size:clamp(34px, 4.8vw, 54px); font-weight:900; line-height:1.15; color:#18181B; margin:0 0 20px; letter-spacing:-1px;">
          Music therapy can be life-changing.
        </h1>
        <p style="font-size:17.5px; line-height:1.65; color:#52525B; margin:0 0 28px;">
          We believe music is a way of giving back to the community. Through annual charity concerts and our Children's Mental Wellbeing Support Salon, we transform the celebration of art into tangible actions supporting children's health, education, and pediatric recovery at Starship Hospital.
        </p>
        <div style="display:flex; gap:12px; flex-wrap:wrap;">
          <a href="#schedule" style="background:#C8102E; color:#FFFFFF; font-weight:700; padding:12px 28px; border-radius:999px; text-decoration:none; font-size:14px;">
            View Benefit Concerts &rarr;
          </a>
          <a href="#services" style="background:#FFFFFF; border:1px solid #D4D4D8; color:#18181B; font-weight:600; padding:12px 24px; border-radius:999px; text-decoration:none; font-size:14px;">
            The Wellbeing Salon
          </a>
        </div>
      </div>

      <!-- CLEAN PLACEHOLDER HERO IMAGE -->
      <div style="border:1px solid #E4E4E7; border-radius:8px; overflow:hidden;">
        <img src="/wp-content/uploads/2026/11/placeholder-hero.png" alt="Auckland War Memorial Museum &amp; Concert Stage Placeholder" style="width:100%; height:auto; display:block;">
      </div>
    </div>
  </section>

  <!-- 3 ICONIC NORDOFF & ROBBINS ACTION COLUMNS -->
  <section id="services" style="background:#FFFFFF; padding:72px 24px; border-bottom:1px solid #E4E4E7;">
    <div style="max-width:1100px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:44px;">
        <span style="font-size:11px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:#C8102E;">Connect With Us</span>
        <h2 style="font-size:30px; font-weight:800; color:#18181B; margin-top:6px; letter-spacing:-0.5px;">Bringing Music to Those in Need</h2>
      </div>

      <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(310px, 1fr)); gap:24px;">
        <!-- Card 1 -->
        <div style="background:#FAFAFA; border:1px solid #E4E4E7; border-radius:8px; overflow:hidden; display:flex; flex-direction:column; justify-content:space-between;">
          <img src="/wp-content/uploads/2026/11/placeholder-chamber.png" alt="Pediatric Hospital Grants Placeholder" style="width:100%; height:190px; object-fit:cover; display:block;">
          <div style="padding:24px; flex:1; display:flex; flex-direction:column; justify-content:space-between;">
            <div>
              <div style="font-size:11px; font-weight:700; text-transform:uppercase; color:#C8102E; margin-bottom:6px;">For Hospital Partners</div>
              <h3 style="font-size:19px; font-weight:700; color:#18181B; margin:0 0 10px;">Pediatric Hospital Grants</h3>
              <p style="font-size:13.5px; color:#52525B; line-height:1.65; margin:0;">Bringing acoustic music therapy and comfort to children's recovery wards at Starship Hospital and hospice facilities.</p>
            </div>
            <a href="#schedule" style="margin-top:20px; color:#C8102E; font-weight:600; text-decoration:none; font-size:13px; display:inline-block;">Learn about hospital funding &rarr;</a>
          </div>
        </div>

        <!-- Card 2 -->
        <div style="background:#FAFAFA; border:1px solid #E4E4E7; border-radius:8px; overflow:hidden; display:flex; flex-direction:column; justify-content:space-between;">
          <img src="/wp-content/uploads/2026/11/placeholder-piano.png" alt="Children's Wellbeing Salon Placeholder" style="width:100%; height:190px; object-fit:cover; display:block;">
          <div style="padding:24px; flex:1; display:flex; flex-direction:column; justify-content:space-between;">
            <div>
              <div style="font-size:11px; font-weight:700; text-transform:uppercase; color:#C8102E; margin-bottom:6px;">For Families &amp; Patients</div>
              <h3 style="font-size:19px; font-weight:700; color:#18181B; margin:0 0 10px;">Children’s Wellbeing Salon</h3>
              <p style="font-size:13.5px; color:#52525B; line-height:1.65; margin:0;">Providing children a supportive space to be heard and valued, offering practical emotional wellbeing tools within the family environment.</p>
            </div>
            <a href="#schedule" style="margin-top:20px; color:#C8102E; font-weight:600; text-decoration:none; font-size:13px; display:inline-block;">Discover our salon sessions &rarr;</a>
          </div>
        </div>

        <!-- Card 3 -->
        <div style="background:#FAFAFA; border:1px solid #E4E4E7; border-radius:8px; overflow:hidden; display:flex; flex-direction:column; justify-content:space-between;">
          <img src="/wp-content/uploads/2026/11/placeholder-gala.png" alt="Young Musicians Collective Placeholder" style="width:100%; height:190px; object-fit:cover; display:block;">
          <div style="padding:24px; flex:1; display:flex; flex-direction:column; justify-content:space-between;">
            <div>
              <div style="font-size:11px; font-weight:700; text-transform:uppercase; color:#C8102E; margin-bottom:6px;">For Young Performers</div>
              <h3 style="font-size:19px; font-weight:700; color:#18181B; margin:0 0 10px;">Young Musicians Collective</h3>
              <p style="font-size:13.5px; color:#52525B; line-height:1.65; margin:0;">Mentoring adolescent virtuosi performing on the Fazioli concert grand piano at the Auckland War Memorial Museum and Bruce Mason Centre.</p>
            </div>
            <a href="#schedule" style="margin-top:20px; color:#C8102E; font-weight:600; text-decoration:none; font-size:13px; display:inline-block;">Join the performers roster &rarr;</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- NORDOFF & ROBBINS STATS RIBBON -->
  <section id="impact" style="background:#F4F4F6; padding:44px 24px; border-bottom:1px solid #E4E4E7;">
    <div style="max-width:1100px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:24px; text-align:center;">
      <div>
        <div style="font-size:36px; font-weight:800; color:#18181B; line-height:1;">4+</div>
        <div style="font-size:13.5px; font-weight:600; color:#27272A; margin-top:6px;">Healthcare Beneficiaries</div>
        <div style="font-size:12px; color:#71717A;">Starship, Cancer Society &amp; Hospice</div>
      </div>
      <div>
        <div style="font-size:36px; font-weight:800; color:#C8102E; line-height:1;">350+</div>
        <div style="font-size:13.5px; font-weight:600; color:#27272A; margin-top:6px;">Young Performers on Stage</div>
        <div style="font-size:12px; color:#71717A;">Auckland Concert Venues</div>
      </div>
      <div>
        <div style="font-size:36px; font-weight:800; color:#18181B; line-height:1;">100%</div>
        <div style="font-size:13.5px; font-weight:600; color:#27272A; margin-top:6px;">Proceeds to Patient Care</div>
        <div style="font-size:12px; color:#71717A;">Governed by Board of Trustees</div>
      </div>
      <div>
        <div style="font-size:36px; font-weight:800; color:#18181B; line-height:1;">CC63798</div>
        <div style="font-size:13.5px; font-weight:600; color:#27272A; margin-top:6px;">Charitable Trusts Act 1957</div>
        <div style="font-size:12px; color:#71717A;">Charities Services DIA Registered</div>
      </div>
    </div>
  </section>

  <!-- CASE STORY & MINISTERIAL ENDORSEMENTS -->
  <section id="about" style="background:#FFFFFF; padding:72px 24px; border-bottom:1px solid #E4E4E7;">
    <div style="max-width:1100px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:32px;">
      <div style="background:#FAFAFA; border:1px solid #E4E4E7; border-radius:8px; padding:28px;">
        <span style="font-size:11px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:#C8102E;">Our Mission in Auckland</span>
        <h3 style="font-size:20px; font-weight:800; color:#18181B; margin:8px 0 12px;">Transforms the celebration of art into tangible actions</h3>
        <p style="font-size:14px; color:#52525B; line-height:1.7; margin:0 0 12px;">
          Headquartered in Auckland, Keys for Cure Charitable Trust was founded by a group of leaders from the fields of education, music, and community service.
        </p>
        <p style="font-size:14px; color:#52525B; line-height:1.7; margin:0;">
          Our funding comes primarily from public donations and arts-based fundraising events, with 100% of proceeds directed to charitable projects supporting Starship Children’s Hospital, Cancer Society, and Mercy Hospice.
        </p>
      </div>

      <div style="background:#18181B; color:#FFFFFF; border-radius:8px; padding:28px; display:flex; flex-direction:column; justify-content:space-between;">
        <div>
          <span style="background:#C8102E; color:#FFFFFF; font-size:10.5px; font-weight:700; padding:2px 8px; border-radius:3px; text-transform:uppercase;">Prime Minister Endorsement</span>
          <p style="font-size:14.5px; line-height:1.7; font-style:italic; margin:16px 0 18px; color:#E4E4E7;">
            &ldquo;Nick Wang and the entire Keys for Cure team &mdash; thank you for your vision, your energy and your commitment to using music as a force for good. This year's focus, supporting the incredible work at Starship Children's Hospital, is a cause that touches all of us.&rdquo;
          </p>
        </div>
        <div>
          <div style="font-weight:700; font-size:14.5px; color:#FFFFFF;">Rt Hon Christopher Luxon</div>
          <div style="font-size:12px; color:#A1A1AA;">Prime Minister of New Zealand</div>
        </div>
      </div>
    </div>
  </section>

  <!-- NATIVE CONCERT SCHEDULE -->
  <section id="schedule" style="background:#FAFAFA; padding:72px 24px; border-bottom:1px solid #E4E4E7;">
    <div style="max-width:1100px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:36px;">
        <span style="font-size:11px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:#C8102E;">Benefit Concerts</span>
        <h2 style="font-size:30px; font-weight:800; color:#18181B; margin-top:6px; letter-spacing:-0.5px;">Benefit Concert Schedule &amp; Pass RSVP</h2>
        <p style="font-size:14px; color:#52525B; max-width:600px; margin:8px auto 0;">
          Select any concert to view repertoire notes and reserve your admission pass with instant digital QR door check-in.
        </p>
      </div>

      [kfc_event_calendar title="Benefit Concert Schedule &amp; Pass RSVP"]
    </div>
  </section>

  <!-- FOOTER -->
  <footer style="background:#18181B; color:#A1A1AA; padding:48px 24px; font-size:13px;">
    <div style="max-width:1100px; margin:0 auto; display:flex; justify-content:space-between; flex-wrap:wrap; gap:24px;">
      <div>
        <div style="font-size:15px; font-weight:700; color:#FFFFFF; margin-bottom:4px;">Keys for Cure Charitable Trust</div>
        <div>Registered Charity CC63798 under the Charitable Trusts Act 1957</div>
        <div style="margin-top:4px;">20 Northcroft Street, Takapuna, Auckland, New Zealand</div>
      </div>
      <div>
        <div style="font-weight:700; color:#FFFFFF; margin-bottom:4px;">Governance &amp; Contact</div>
        <div>Email: <a href="mailto:info@keysforcure.org" style="color:#FFFFFF; text-decoration:none;">info@keysforcure.org</a></div>
        <div style="margin-top:4px;">100% of Net Concert Proceeds Directed to Charitable Projects</div>
      </div>
    </div>
  </footer>

</div>
HTML;
    }
}
