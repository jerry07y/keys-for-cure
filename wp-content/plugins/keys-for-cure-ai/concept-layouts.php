<?php
/**
 * Keys for Cure - 3 Presentation Layout Paradigms
 * Inspired by established, successful music charities (Sphinx Organization, London Music Fund,
 * Playing For Change Foundation, El Sistema USA, Live Music Now UK).
 */

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

    /**
     * Concept 1: Symphonic Prestige (Editorial Magazine & Gala Showcase)
     * Inspired by Sphinx Organization (Detroit) & London Music Fund (UK)
     */
    public static function get_concept_1_symphonic_prestige(): string {
        return <<<HTML
<!-- CONCEPT 1: SYMPHONIC PRESTIGE (London Music Fund & Sphinx Gala Archetype) -->
<div class="kfc-theme-gala" style="background:#090D16; color:#F8FAFC; font-family:'Georgia', serif;">

  <!-- GALA HERO -->
  <div style="position:relative; background:radial-gradient(ellipse at 50% 20%, #172554 0%, #090D16 70%); padding:90px 24px 80px; text-align:center; border-bottom:1px solid rgba(197,160,89,0.3);">
    <div style="max-width:960px; margin:0 auto;">
      <span style="display:inline-block; border:1px solid #C5A059; color:#C5A059; padding:6px 18px; border-radius:999px; font-size:11px; font-weight:700; letter-spacing:2px; text-transform:uppercase; margin-bottom:24px; font-family:-apple-system, sans-serif;">
        Official Registered Charity &bull; CC63798 &bull; Gala Season 2026/27
      </span>
      <h1 style="font-size:clamp(32px, 5vw, 54px); font-weight:700; line-height:1.15; color:#FFFFFF; margin:0 0 20px; letter-spacing:-0.5px;">
        Transforming the Power of Classical Music into Real Pediatric Action
      </h1>
      <p style="font-size:clamp(16px, 2vw, 19px); line-height:1.65; color:#cbd5e1; max-width:780px; margin:0 auto 36px; font-family:-apple-system, sans-serif; font-weight:300;">
        Keys for Cure unites young concert virtuosi and patron benefactors across Auckland to champion pediatric healthcare at Starship Children's Hospital and support youth mental wellbeing through charity gala recitals.
      </p>
      <div style="display:flex; justify-content:center; gap:16px; flex-wrap:wrap; font-family:-apple-system, sans-serif;">
        <a href="#events" style="background:#C5A059; color:#090D16; font-weight:700; padding:14px 32px; border-radius:8px; text-decoration:none; font-size:14px; letter-spacing:0.5px;">
          Reserve Gala Pass (RSVP) &rarr;
        </a>
        <a href="#patrons" style="background:transparent; border:1px solid #C5A059; color:#C5A059; font-weight:600; padding:14px 28px; border-radius:8px; text-decoration:none; font-size:14px;">
          Patrons &amp; Beneficiaries
        </a>
      </div>
    </div>
  </div>

  <!-- PRIME MINISTER & MINISTERIAL PATRON QUOTES -->
  <div id="patrons" style="background:#0F172A; border-bottom:1px solid #1E293B; padding:60px 24px;">
    <div style="max-width:1140px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:40px;">
        <span style="font-size:11px; text-transform:uppercase; letter-spacing:2px; color:#C5A059; font-weight:700; font-family:-apple-system, sans-serif;">Patron Endorsements</span>
        <h2 style="font-size:28px; color:#FFFFFF; margin-top:8px;">What Leaders Say About Keys for Cure</h2>
      </div>

      <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:24px;">
        <!-- Christopher Luxon Quote -->
        <div style="background:#131C31; border:1px solid rgba(197,160,89,0.3); border-radius:12px; padding:32px; display:flex; flex-direction:column; justify-content:space-between;">
          <p style="font-size:15px; line-height:1.75; color:#E2E8F0; font-style:italic; margin:0 0 20px;">
            &ldquo;Nick Wang and the entire Keys for Cure team &mdash; thank you for your vision, your energy and your commitment to using music as a force for good. This year's focus, supporting the incredible work at Starship Children's Hospital, is a cause that touches all of us. Enjoy an absolutely wonderful evening. All the very best.&rdquo;
          </p>
          <div>
            <div style="font-weight:700; font-size:15px; color:#C5A059; font-family:-apple-system, sans-serif;">Rt Hon Christopher Luxon</div>
            <div style="font-size:12px; color:#94A3B8; font-family:-apple-system, sans-serif;">Prime Minister of New Zealand</div>
          </div>
        </div>

        <!-- Hon Paul Goldsmith Quote -->
        <div style="background:#131C31; border:1px solid rgba(197,160,89,0.3); border-radius:12px; padding:32px; display:flex; flex-direction:column; justify-content:space-between;">
          <p style="font-size:15px; line-height:1.75; color:#E2E8F0; font-style:italic; margin:0 0 20px;">
            &ldquo;Over the years the Keys for Cure Charitable Trust has raised funds for many important causes including the Cancer Society of New Zealand, Breast Cancer Foundation, Mercy Hospice and Starship Children's Hospital. My warm thanks to Nick Wang and the Young Musicians for using the power of music to share love and kindness.&rdquo;
          </p>
          <div>
            <div style="font-weight:700; font-size:15px; color:#C5A059; font-family:-apple-system, sans-serif;">Hon Paul Goldsmith</div>
            <div style="font-size:12px; color:#94A3B8; font-family:-apple-system, sans-serif;">Minister for Arts, Culture and Heritage</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- PARTNERSHIP MARQUEE -->
  <div style="background:#090D16; padding:36px 24px; border-bottom:1px solid rgba(255,255,255,0.06); text-align:center;">
    <div style="max-width:1140px; margin:0 auto;">
      <div style="font-size:11px; text-transform:uppercase; letter-spacing:2px; color:#94A3B8; font-family:-apple-system, sans-serif; margin-bottom:16px;">Proudly Supporting New Zealand Healthcare Initiatives</div>
      <div style="display:flex; justify-content:center; align-items:center; gap:36px; flex-wrap:wrap; font-size:14px; font-weight:700; color:#E2E8F0; font-family:-apple-system, sans-serif;">
        <span>🏥 Starship Children's Hospital</span>
        <span>🎗️ Cancer Society of New Zealand</span>
        <span>🌸 Breast Cancer Foundation NZ</span>
        <span>🕊️ Mercy Hospice</span>
        <span>🧠 Children's Mental Wellbeing Support Salon</span>
      </div>
    </div>
  </div>

  <!-- CONCERT CALENDAR (EMBEDDED NATIVE ELFSIGHT WIDGET) -->
  <div id="events" style="background:#090D16; padding:70px 24px;">
    <div style="max-width:1140px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:32px;">
        <span style="font-size:11px; text-transform:uppercase; letter-spacing:2px; color:#C5A059; font-weight:700; font-family:-apple-system, sans-serif;">Official Concert Calendar</span>
        <h2 style="font-size:32px; color:#FFFFFF; margin-top:8px;">2026/27 Benefit Concert Season &amp; Gala Schedule</h2>
        <p style="font-size:14px; color:#94A3B8; font-family:-apple-system, sans-serif; max-width:600px; margin:8px auto 0;">
          All net admissions and patron pledges directly benefit Starship Children's Hospital and youth healthcare across Aotearoa.
        </p>
      </div>

      [kfc_event_calendar title="Upcoming Gala Concerts &amp; Recitals"]
    </div>
  </div>

  <!-- YOUNG MUSICIANS SHOWCASE -->
  <div style="background:#0F172A; padding:70px 24px; border-top:1px solid rgba(197,160,89,0.2);">
    <div style="max-width:1140px; margin:0 auto;">
      <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:36px; align-items:center;">
        <div>
          <span style="font-size:11px; text-transform:uppercase; letter-spacing:2px; color:#C5A059; font-weight:700; font-family:-apple-system, sans-serif;">Young Performers Collective</span>
          <h2 style="font-size:32px; color:#FFFFFF; margin:8px 0 16px;">Hundreds of Young Musicians Taking the Stage for Good</h2>
          <p style="font-size:15px; line-height:1.75; color:#cbd5e1; font-family:-apple-system, sans-serif;">
            Under the visionary leadership of Nick Wang, Keys for Cure has grown from a solo recital into Auckland's premier youth classical movement. From masterwork piano concertos and cello sonatas to full youth string orchestras, our young artists dedicate hundreds of rehearsal hours to heal children and comfort families in need.
          </p>
        </div>
        <div style="background:#131C31; border:1px solid #1E293B; border-radius:12px; padding:28px; font-family:-apple-system, sans-serif;">
          <h4 style="color:#C5A059; margin:0 0 12px; font-size:16px;">The 2026 Focus: Children's Mental Wellbeing</h4>
          <p style="font-size:13.5px; color:#94a3b8; line-height:1.6; margin:0 0 16px;">
            In 2026, Keys for Cure expands beyond the concert hall with the Children's Mental Wellbeing Support Salon &mdash; bridging musical expression and therapeutic support for pediatric patients facing chronic recovery.
          </p>
          <div style="display:flex; gap:16px; font-size:13px; font-weight:700; color:#FFFFFF;">
            <div>&bull; Takapuna Community Hall</div>
            <div>&bull; Bruce Mason Centre</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- CHARITY GOVERNANCE & AUDIT FOOTER -->
  <div style="background:#060910; border-top:1px solid rgba(255,255,255,0.08); padding:50px 24px; font-family:-apple-system, sans-serif; font-size:13px; color:#94A3B8;">
    <div style="max-width:1140px; margin:0 auto; display:flex; justify-content:space-between; flex-wrap:wrap; gap:24px;">
      <div>
        <div style="font-weight:800; color:#FFFFFF; font-size:15px; margin-bottom:4px;">Keys for Cure Charitable Trust</div>
        <div>Registered Non-Profit Charity CC63798 &bull; Charitable Trusts Act 1957</div>
        <div style="margin-top:6px;">20 Northcroft Street, Takapuna, Auckland, New Zealand</div>
      </div>
      <div>
        <div style="font-weight:700; color:#C5A059; margin-bottom:4px;">Direct Contact &amp; Board Governance</div>
        <div>Email: <a href="mailto:info@keysforcure.org.nz" style="color:#C5A059; text-decoration:none;">info@keysforcure.org.nz</a></div>
        <div style="margin-top:4px;">100% of Net Concert Proceeds Distributed to Pediatric Health Beneficiaries</div>
      </div>
    </div>
  </div>

</div>
HTML;
    }

    private static function get_concept_2_harmonies_of_hope(): string {
        return <<<HTML
<!-- SPLIT-SCREEN CAMPAIGN HERO (Playing For Change & El Sistema Inspired) -->
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"color":{"background":"var:preset|color|accent-5"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-accent-5-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--40)">
  <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":"var:preset|spacing|50"}}} -->
  <div class="wp-block-columns are-vertically-aligned-center">
    <!-- LEFT: Mission Headline & Action -->
    <!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
      <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px","textTransform":"uppercase","fontWeight":"700"}},"fontSize":"small"} -->
      <p class="has-small-font-size" style="font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--wp--preset--color--primary)">Youth Music Philanthropy &bull; 100% Non-Profit &bull; CC63798</p>
      <!-- /wp:paragraph -->

      <!-- wp:heading {"level":1,"style":{"typography":{"lineHeight":"1.15","fontWeight":"800"}},"fontSize":"xx-large"} -->
      <h1 class="wp-block-heading has-xx-large-font-size" style="line-height:1.15;font-weight:800;margin-top:8px">Empowering Young Musicians. Healing Young Lives.</h1>
      <!-- /wp:heading -->

      <!-- wp:paragraph {"fontSize":"medium","style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|40"}}}} -->
      <p class="has-medium-font-size" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--40);line-height:1.6">We believe music creates resilience. Keys for Cure connects gifted young New Zealand instrumentalists with high-profile concert stages, turning audience admissions into direct pediatric healthcare and youth wellbeing funding.</p>
      <!-- /wp:paragraph -->

      <!-- wp:buttons -->
      <div class="wp-block-buttons">
        <!-- wp:button {"style":{"border":{"radius":"9999px"}}} -->
        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#campaign-events" style="border-radius:9999px">Explore 2026/27 Concerts &rarr;</a></div>
        <!-- /wp:button -->
        <!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"9999px"}}} -->
        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#impact-tiers" style="border-radius:9999px">Support Pediatric Care &rarr;</a></div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->
    </div>
    <!-- /wp:column -->

    <!-- RIGHT: Dynamic Framed Concert Photography -->
    <!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
      <!-- wp:image {"aspectRatio":"4/3","scale":"cover","style":{"border":{"radius":"18px"}}} -->
      <figure class="wp-block-image"><img src="http://localhost:8080/wp-content/uploads/2026/11/kfc-chamber-concert.jpg" alt="Youth chamber orchestra performing benefit concert" style="border-radius:18px;aspect-ratio:4/3;object-fit:cover;box-shadow:0 12px 32px rgba(0,0,0,0.12)" /></figure>
      <!-- /wp:image -->
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- IMPACT RIBBON STRIP -->
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"color":{"background":"var:preset|color|contrast","text":"var:preset|color|base"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-color has-contrast-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--40)">
  <!-- wp:columns {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
  <div class="wp-block-columns">
    <!-- wp:column {"style":{"typography":{"textAlign":"center"}}} -->
    <div class="wp-block-column" style="text-align:center">
      <p style="margin:0;font-weight:700;font-size:15px">100+ Youth Performers</p>
      <p style="margin:2px 0 0;font-size:12px;opacity:0.85">Auckland string players &amp; soloists</p>
    </div>
    <!-- /wp:column -->
    <!-- wp:column {"style":{"typography":{"textAlign":"center"}}} -->
    <div class="wp-block-column" style="text-align:center">
      <p style="margin:0;font-weight:700;font-size:15px">5 Benefit Stages</p>
      <p style="margin:2px 0 0;font-size:12px;opacity:0.85">Town Hall to Bruce Mason Centre</p>
    </div>
    <!-- /wp:column -->
    <!-- wp:column {"style":{"typography":{"textAlign":"center"}}} -->
    <div class="wp-block-column" style="text-align:center">
      <p style="margin:0;font-weight:700;font-size:15px">100% Proceeds to Care</p>
      <p style="margin:2px 0 0;font-size:12px;opacity:0.85">Zero commercial shareholder cut</p>
    </div>
    <!-- /wp:column -->
    <!-- wp:column {"style":{"typography":{"textAlign":"center"}}} -->
    <div class="wp-block-column" style="text-align:center">
      <p style="margin:0;font-weight:700;font-size:15px">Charity Reg CC63798</p>
      <p style="margin:2px 0 0;font-size:12px;opacity:0.85">Department of Internal Affairs</p>
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- 3-COLUMN MODERN CAMPAIGN EVENT CARD GRID -->
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"},"anchor":"campaign-events"} -->
<div id="campaign-events" class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
  <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px","textTransform":"uppercase","fontWeight":"700","textAlign":"center"}},"fontSize":"small"} -->
  <p class="has-small-font-size" style="font-weight:700;letter-spacing:2px;text-transform:uppercase;text-align:center;color:var(--wp--preset--color--primary)">Season 2026/27 Benefit Concerts</p>
  <!-- /wp:paragraph -->

  <!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"800","textAlign":"center"}},"fontSize":"x-large"} -->
  <h2 class="wp-block-heading has-x-large-font-size" style="font-weight:800;text-align:center">Live Music That Makes a Difference</h2>
  <!-- /wp:heading -->

  <!-- wp:columns {"style":{"spacing":{"blockGap":"var:preset|spacing|40","margin":{"top":"var:preset|spacing|40"}}}} -->
  <div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--40)">
    <!-- CARD 1 -->
    <!-- wp:column {"style":{"spacing":{"padding":"var:preset|spacing|30"},"border":{"width":"1px","color":"var:preset|color|accent-5","radius":"14px"}},"backgroundColor":"base"} -->
    <div class="wp-block-column has-base-background-color has-background" style="border-color:var(--wp--preset--color--accent-5);border-width:1px;border-style:solid;border-radius:14px;padding:var(--wp--preset--spacing--30);box-shadow:0 4px 16px rgba(0,0,0,0.04)">
      <!-- wp:image {"aspectRatio":"16/9","scale":"cover","style":{"border":{"radius":"10px"}}} -->
      <figure class="wp-block-image"><img src="http://localhost:8080/wp-content/uploads/2026/11/kfc-chamber-concert.jpg" alt="Auckland Youth Chamber Concert" style="border-radius:10px;aspect-ratio:16/9;object-fit:cover;width:100%" /></figure>
      <!-- /wp:image -->
      <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px","textTransform":"uppercase","fontWeight":"700"}},"fontSize":"small"} -->
      <p class="has-small-font-size" style="font-weight:700;letter-spacing:1px;text-transform:uppercase;color:var(--wp--preset--color--primary);margin-top:12px;margin-bottom:4px">Chamber Series</p>
      <!-- /wp:paragraph -->
      <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"700"}},"fontSize":"medium"} -->
      <h3 class="wp-block-heading has-medium-font-size" style="font-weight:700;margin-bottom:8px">Auckland Youth Chamber Concert</h3>
      <!-- /wp:heading -->
      <!-- wp:paragraph {"fontSize":"small"} -->
      <p class="has-small-font-size">Saturday, 28 Nov 2026 &bull; 7:00 PM<br>Bruce Mason Centre &bull; Takapuna<br>Admission: <strong>$25 NZD</strong></p>
      <!-- /wp:paragraph -->
      <!-- wp:buttons -->
      <div class="wp-block-buttons">
        <!-- wp:button {"style":{"border":{"radius":"9999px"}}} -->
        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="http://localhost:8080/event/auckland-youth-chamber-concert/" style="border-radius:9999px">Reserve Tickets</a></div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->
    </div>
    <!-- /wp:column -->

    <!-- CARD 2 -->
    <!-- wp:column {"style":{"spacing":{"padding":"var:preset|spacing|30"},"border":{"width":"2px","color":"var:preset|color|primary","radius":"14px"}},"backgroundColor":"base"} -->
    <div class="wp-block-column has-base-background-color has-background" style="border-color:var(--wp--preset--color--primary);border-width:2px;border-style:solid;border-radius:14px;padding:var(--wp--preset--spacing--30);box-shadow:0 6px 20px rgba(0,82,204,0.1)">
      <!-- wp:image {"aspectRatio":"16/9","scale":"cover","style":{"border":{"radius":"10px"}}} -->
      <figure class="wp-block-image"><img src="http://localhost:8080/wp-content/uploads/2026/11/kfc-holiday-gala.jpg" alt="Keys for Cure Annual Holiday Gala" style="border-radius:10px;aspect-ratio:16/9;object-fit:cover;width:100%" /></figure>
      <!-- /wp:image -->
      <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px","textTransform":"uppercase","fontWeight":"700"}},"fontSize":"small"} -->
      <p class="has-small-font-size" style="font-weight:700;letter-spacing:1px;text-transform:uppercase;color:var(--wp--preset--color--primary);margin-top:12px;margin-bottom:4px">Annual Gala &bull; Spotlight</p>
      <!-- /wp:paragraph -->
      <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"700"}},"fontSize":"medium"} -->
      <h3 class="wp-block-heading has-medium-font-size" style="font-weight:700;margin-bottom:8px">Keys for Cure Annual Holiday Gala</h3>
      <!-- /wp:heading -->
      <!-- wp:paragraph {"fontSize":"small"} -->
      <p class="has-small-font-size">Saturday, 19 Dec 2026 &bull; 7:30 PM<br>Auckland Town Hall, Great Hall<br>Admission: <strong>$45 NZD</strong></p>
      <!-- /wp:paragraph -->
      <!-- wp:buttons -->
      <div class="wp-block-buttons">
        <!-- wp:button {"style":{"border":{"radius":"9999px"}}} -->
        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="http://localhost:8080/event/keys-for-cure-annual-holiday-gala/" style="border-radius:9999px">Reserve Gala Seat</a></div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->
    </div>
    <!-- /wp:column -->

    <!-- CARD 3 -->
    <!-- wp:column {"style":{"spacing":{"padding":"var:preset|spacing|30"},"border":{"width":"1px","color":"var:preset|color|accent-5","radius":"14px"}},"backgroundColor":"base"} -->
    <div class="wp-block-column has-base-background-color has-background" style="border-color:var(--wp--preset--color--accent-5);border-width:1px;border-style:solid;border-radius:14px;padding:var(--wp--preset--spacing--30);box-shadow:0 4px 16px rgba(0,0,0,0.04)">
      <!-- wp:image {"aspectRatio":"16/9","scale":"cover","style":{"border":{"radius":"10px"}}} -->
      <figure class="wp-block-image"><img src="http://localhost:8080/wp-content/uploads/2026/11/kfc-piano-hands.jpg" alt="Community Arts &amp; Youth Music Matinee" style="border-radius:10px;aspect-ratio:16/9;object-fit:cover;width:100%" /></figure>
      <!-- /wp:image -->
      <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1px","textTransform":"uppercase","fontWeight":"700"}},"fontSize":"small"} -->
      <p class="has-small-font-size" style="font-weight:700;letter-spacing:1px;text-transform:uppercase;color:var(--wp--preset--color--primary);margin-top:12px;margin-bottom:4px">Community Showcase</p>
      <!-- /wp:paragraph -->
      <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"700"}},"fontSize":"medium"} -->
      <h3 class="wp-block-heading has-medium-font-size" style="font-weight:700;margin-bottom:8px">Community Arts &amp; Music Matinee</h3>
      <!-- /wp:heading -->
      <!-- wp:paragraph {"fontSize":"small"} -->
      <p class="has-small-font-size">Saturday, 16 Jan 2027 &bull; 2:00 PM<br>Takapuna Community Hall<br>Admission: <strong>Free / Donation</strong></p>
      <!-- /wp:paragraph -->
      <!-- wp:buttons -->
      <div class="wp-block-buttons">
        <!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"9999px"}}} -->
        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="http://localhost:8080/event/community-arts-youth-music-matinee/" style="border-radius:9999px">Free Registration</a></div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->

  <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}},"typography":{"textAlign":"center"}}} -->
  <p style="margin-top:var(--wp--preset--spacing--40);text-align:center"><a href="http://localhost:8080/news/"><strong>Visit the News &amp; Updates Hub for Full Event Dossiers &rarr;</strong></a></p>
  <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- TANGIBLE GIVING & IMPACT CALCULATOR (Playing For Change Inspired) -->
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"color":{"background":"var:preset|color|accent-5"}},"layout":{"type":"constrained"},"anchor":"impact-tiers"} -->
<div id="impact-tiers" class="wp-block-group alignfull has-accent-5-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--40)">
  <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px","textTransform":"uppercase","fontWeight":"700","textAlign":"center"}},"fontSize":"small"} -->
  <p class="has-small-font-size" style="font-weight:700;letter-spacing:2px;text-transform:uppercase;text-align:center;color:var(--wp--preset--color--primary)">Where Your Gift Goes</p>
  <!-- /wp:paragraph -->

  <!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"800","textAlign":"center"}},"fontSize":"x-large"} -->
  <h2 class="wp-block-heading has-x-large-font-size" style="font-weight:800;text-align:center">Tangible Giving, Measurable Care</h2>
  <!-- /wp:heading -->

  <!-- wp:columns {"style":{"spacing":{"blockGap":"var:preset|spacing|40","margin":{"top":"var:preset|spacing|40"}}}} -->
  <div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--40)">
    <!-- TIER 1 -->
    <!-- wp:column {"style":{"spacing":{"padding":"var:preset|spacing|40"},"border":{"radius":"14px"}},"backgroundColor":"base"} -->
    <div class="wp-block-column has-base-background-color has-background" style="border-radius:14px;padding:var(--wp--preset--spacing--40);text-align:center">
      <h3 style="font-size:28px;font-weight:800;color:var(--wp--preset--color--primary);margin:0 0 8px">$25 NZD</h3>
      <p style="font-weight:700;font-size:15px;margin:0 0 8px">1 Student Performance Seat</p>
      <p style="font-size:13.5px;color:#475569;margin-bottom:20px">Covers concert hall admission for one student and masterclass sheet music materials.</p>
      <div class="wp-block-buttons" style="justify-content:center"><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="http://localhost:8080/events/" style="border-radius:9999px">Give $25</a></div></div>
    </div>
    <!-- /wp:column -->

    <!-- TIER 2 -->
    <!-- wp:column {"style":{"spacing":{"padding":"var:preset|spacing|40"},"border":{"radius":"14px","width":"2px","color":"var:preset|color--accent-4"}},"backgroundColor":"base"} -->
    <div class="wp-block-column has-base-background-color has-background" style="border-radius:14px;border:2px solid var(--wp--preset--color--primary);padding:var(--wp--preset--spacing--40);text-align:center">
      <h3 style="font-size:28px;font-weight:800;color:var(--wp--preset--color--primary);margin:0 0 8px">$75 NZD</h3>
      <p style="font-weight:700;font-size:15px;margin:0 0 8px">Pediatric Music Therapy Session</p>
      <p style="font-size:13.5px;color:#475569;margin-bottom:20px">Funds one bedside therapeutic musical experience for recovering hospital patients.</p>
      <div class="wp-block-buttons" style="justify-content:center"><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="mailto:info@keysforcure.org.nz?subject=Music%20Therapy%20Gift" style="border-radius:9999px">Give $75</a></div></div>
    </div>
    <!-- /wp:column -->

    <!-- TIER 3 -->
    <!-- wp:column {"style":{"spacing":{"padding":"var:preset|spacing|40"},"border":{"radius":"14px"}},"backgroundColor":"base"} -->
    <div class="wp-block-column has-base-background-color has-background" style="border-radius:14px;padding:var(--wp--preset--spacing--40);text-align:center">
      <h3 style="font-size:28px;font-weight:800;color:var(--wp--preset--color--primary);margin:0 0 8px">$150 NZD</h3>
      <p style="font-weight:700;font-size:15px;margin:0 0 8px">Youth Soloist Sponsorship</p>
      <p style="font-size:13.5px;color:#475569;margin-bottom:20px">Underwrites rehearsal facilities and contributes directly to pediatric wellness grants.</p>
      <div class="wp-block-buttons" style="justify-content:center"><div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="mailto:info@keysforcure.org.nz?subject=Youth%20Soloist%20Sponsorship" style="border-radius:9999px">Sponsor a Soloist</a></div></div>
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- CHARITY GOVERNANCE STRIP -->
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"color":{"background":"var:preset|color|contrast","text":"var:preset|color|base"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-color has-contrast-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);text-align:center">
  <p style="font-weight:700;font-size:14px;margin:0">Keys for Cure New Zealand &bull; Charities Registration CC63798</p>
  <p style="font-size:13px;opacity:0.85;margin:4px 0 0">Takapuna, Auckland &bull; Contact: <a href="mailto:info@keysforcure.org.nz" style="color:inherit">info@keysforcure.org.nz</a> &bull; 100% of concert proceeds fund youth health and wellbeing.</p>
</div>
<!-- /wp:group -->
HTML;
    }

    /**
     * Concept 3: Nordic Minimalist (Architectural Calendar & Gallery Index)
     * Inspired by Live Music Now UK & Nordoff and Robbins
     */
    private static function get_concept_3_nordic_minimalist(): string {
        return <<<HTML
<!-- ARCHITECTURAL MONOLITH HERO (Live Music Now & Nordoff Robbins Inspired) -->
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|70","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"color":{"background":"var:preset|color|contrast","text":"var:preset|color|base"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-color has-contrast-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--40)">
  
  <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"3px","textTransform":"uppercase","fontWeight":"600"}},"fontSize":"small"} -->
  <p class="has-small-font-size" style="font-weight:600;letter-spacing:3px;text-transform:uppercase;opacity:0.75">KEYS FOR CURE &bull; CC63798 &bull; AUCKLAND, NEW ZEALAND</p>
  <!-- /wp:paragraph -->

  <!-- wp:heading {"level":1,"style":{"typography":{"lineHeight":"1.05","fontWeight":"900","letterSpacing":"-1px"}},"fontSize":"xx-large"} -->
  <h1 class="wp-block-heading has-xx-large-font-size" style="line-height:1.05;font-weight:900;letter-spacing:-1px;margin-top:12px;font-size:56px">Benefit Concerts.<br>Season 2026/27.</h1>
  <!-- /wp:heading -->

  <!-- wp:paragraph {"fontSize":"medium","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|40"}}}} -->
  <p class="has-medium-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--40);max-width:680px;line-height:1.6;opacity:0.85">A structured classical performance series pairing Auckland's emerging youth soloists with pediatric healthcare initiatives. Zero commercial deduction. Pure philanthropic impact.</p>
  <!-- /wp:paragraph -->

  <!-- wp:buttons -->
  <div class="wp-block-buttons">
    <!-- wp:button {"style":{"border":{"radius":"0px"}}} -->
    <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#calendar-index" style="border-radius:0px">View Concert Index &darr;</a></div>
    <!-- /wp:button -->
    <!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"0px"}}} -->
    <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="http://localhost:8080/news/" style="border-radius:0px">News &amp; Program Notes &rarr;</a></div>
    <!-- /wp:button -->
  </div>
  <!-- /wp:buttons -->

</div>
<!-- /wp:group -->

<!-- CHRONOLOGICAL SEASON INDEX (Table / Row Architecture) -->
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"},"anchor":"calendar-index"} -->
<div id="calendar-index" class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
  
  <!-- wp:columns {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
  <div class="wp-block-columns">
    <!-- Left Column: Section Title -->
    <!-- wp:column {"width":"30%"} -->
    <div class="wp-block-column" style="flex-basis:30%">
      <p style="font-weight:700;letter-spacing:2px;text-transform:uppercase;font-size:12px;color:var(--wp--preset--color--primary)">CONCERT CHRONOLOGY</p>
      <h2 style="font-weight:800;font-size:26px;line-height:1.2;margin-top:6px">Published Schedule</h2>
      <p style="font-size:13.5px;color:#71717a;line-height:1.5;margin-top:12px">All concert net admissions are distributed to registered pediatric patient charities.</p>
    </div>
    <!-- /wp:column -->

    <!-- Right Column: Minimalist Concert Rows -->
    <!-- wp:column {"width":"70%"} -->
    <div class="wp-block-column" style="flex-basis:70%">
      
      <!-- ROW 1 -->
      <div style="border-top:1px solid #e4e4e7;border-bottom:1px solid #e4e4e7;padding:20px 0;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px">
        <div>
          <span style="font-size:12px;font-weight:700;letter-spacing:1px;color:var(--wp--preset--color--primary)">28 NOV 2026 &bull; 7:00 PM</span>
          <h3 style="margin:4px 0 2px;font-size:18px;font-weight:700">Auckland Youth Chamber Concert</h3>
          <span style="font-size:13px;color:#71717a">Bruce Mason Centre, Takapuna &bull; Admission: $25 NZD</span>
        </div>
        <div>
          <a class="wp-element-button wp-block-button__link" href="http://localhost:8080/event/auckland-youth-chamber-concert/" style="border-radius:0px;font-size:13px;padding:8px 16px">Reserve &rarr;</a>
        </div>
      </div>

      <!-- ROW 2 -->
      <div style="border-bottom:1px solid #e4e4e7;padding:20px 0;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px">
        <div>
          <span style="font-size:12px;font-weight:700;letter-spacing:1px;color:var(--wp--preset--color--primary)">19 DEC 2026 &bull; 7:30 PM</span>
          <h3 style="margin:4px 0 2px;font-size:18px;font-weight:700">Keys for Cure Annual Holiday Gala</h3>
          <span style="font-size:13px;color:#71717a">Auckland Town Hall, Great Hall &bull; Admission: $45 NZD</span>
        </div>
        <div>
          <a class="wp-element-button wp-block-button__link" href="http://localhost:8080/event/keys-for-cure-annual-holiday-gala/" style="border-radius:0px;font-size:13px;padding:8px 16px">Reserve &rarr;</a>
        </div>
      </div>

      <!-- ROW 3 -->
      <div style="border-bottom:1px solid #e4e4e7;padding:20px 0;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px">
        <div>
          <span style="font-size:12px;font-weight:700;letter-spacing:1px;color:var(--wp--preset--color--primary)">16 JAN 2027 &bull; 2:00 PM</span>
          <h3 style="margin:4px 0 2px;font-size:18px;font-weight:700">Community Arts &amp; Youth Music Matinee</h3>
          <span style="font-size:13px;color:#71717a">Takapuna Community Hall &bull; Free / Donation</span>
        </div>
        <div>
          <a class="wp-element-button wp-block-button__link" href="http://localhost:8080/event/community-arts-youth-music-matinee/" style="border-radius:0px;font-size:13px;padding:8px 16px">Reserve &rarr;</a>
        </div>
      </div>

      <!-- ROW 4 -->
      <div style="border-bottom:1px solid #e4e4e7;padding:20px 0;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px">
        <div>
          <span style="font-size:12px;font-weight:700;letter-spacing:1px;color:var(--wp--preset--color--primary)">20 MAR 2027 &bull; 7:00 PM</span>
          <h3 style="margin:4px 0 2px;font-size:18px;font-weight:700">Autumn Youth Cello Recital</h3>
          <span style="font-size:13px;color:#71717a">Takapuna Community Hall &bull; Admission: $20 NZD</span>
        </div>
        <div>
          <a class="wp-element-button wp-block-button__link" href="http://localhost:8080/event/autumn-youth-cello-recital/" style="border-radius:0px;font-size:13px;padding:8px 16px">Reserve &rarr;</a>
        </div>
      </div>

    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->

</div>
<!-- /wp:group -->

<!-- FULL-WIDTH MONOCHROME PHOTOGRAPHIC DIVIDER -->
<!-- wp:image {"align":"full","aspectRatio":"21/9","scale":"cover"} -->
<figure class="wp-block-image alignfull"><img src="http://localhost:8080/wp-content/uploads/2026/11/kfc-hero-grand-piano.jpg" alt="Concert Grand Piano Acoustic Hall" style="aspect-ratio:21/9;object-fit:cover;width:100%" /></figure>
<!-- /wp:image -->

<!-- MINIMALIST TRANSPARENCY & FINANCIAL ACCOUNTABILITY MATRIX -->
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
  <!-- wp:columns {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}}} -->
  <div class="wp-block-columns">
    <!-- Column 1: Financial Allocation -->
    <!-- wp:column {"width":"50%"} -->
    <div class="wp-block-column" style="flex-basis:50%">
      <p style="font-size:12px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--wp--preset--color--primary)">FISCAL ALLOCATION</p>
      <h3 style="font-weight:800;font-size:24px;margin-top:6px">100% Direct Giving Policy</h3>
      <p style="font-size:14px;color:#52525b;line-height:1.6;margin-top:12px">Keys for Cure maintains a strict non-profit standard. Administrative overhead is fully sponsored through volunteer trustees and local philanthropic patrons. Net admission proceeds directly support pediatric illness and adolescent mental wellbeing.</p>
    </div>
    <!-- /wp:column -->

    <!-- Column 2: Governance Verification -->
    <!-- wp:column {"width":"50%"} -->
    <div class="wp-block-column" style="flex-basis:50%">
      <p style="font-size:12px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--wp--preset--color--primary)">GOVERNANCE &amp; DISCLOSURE</p>
      <h3 style="font-weight:800;font-size:24px;margin-top:6px">Registered Charity CC63798</h3>
      <p style="font-size:14px;color:#52525b;line-height:1.6;margin-top:12px">Incorporated under the New Zealand Charities Act 2005. Official register entity CC63798. For formal financial statements, patron queries, or hospital partnership proposals, contact <strong>info@keysforcure.org.nz</strong>.</p>
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- MINIMALIST FOOTER -->
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"color":{"background":"var:preset|color|contrast","text":"var:preset|color|base"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-color has-contrast-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px">
  <span style="font-size:13px;opacity:0.85">Keys for Cure &bull; Charity Registration CC63798 &bull; Takapuna, Auckland</span>
  <span style="font-size:13px;opacity:0.85"><a href="http://localhost:8080/news/" style="color:inherit">News &amp; Programs &rarr;</a> &nbsp;|&nbsp; <a href="mailto:info@keysforcure.org.nz" style="color:inherit">info@keysforcure.org.nz</a></span>
</div>
<!-- /wp:group -->
HTML;
    }
}
