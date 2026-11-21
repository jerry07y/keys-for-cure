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

    public static function get_concept_2_harmonies_of_hope(): string {
        return <<<HTML
<!-- CONCEPT 2: HARMONIES OF HOPE (Playing For Change & El Sistema Archetype) -->
<div class="kfc-theme-youth" style="background:#F8FAFC; color:#1E293B; font-family:'Inter', -apple-system, sans-serif;">

  <!-- ASYMMETRIC SPLIT HERO -->
  <div style="background:linear-gradient(135deg, #0052CC 0%, #022443 100%); color:#FFFFFF; padding:80px 24px 70px;">
    <div style="max-width:1140px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:40px; align-items:center;">
      <div>
        <span style="display:inline-block; background:#F59E0B; color:#090D16; padding:4px 14px; border-radius:999px; font-size:11px; font-weight:800; letter-spacing:1px; text-transform:uppercase; margin-bottom:18px;">
          Youth Classical Movement &bull; Charity CC63798
        </span>
        <h1 style="font-size:clamp(32px, 4.5vw, 50px); font-weight:900; line-height:1.15; margin:0 0 18px; letter-spacing:-0.5px;">
          Music as a Force for Good &mdash; Played by Youth, for Children in Need
        </h1>
        <p style="font-size:16.5px; line-height:1.65; color:#E2E8F0; margin:0 0 28px; max-width:540px;">
          Founded by Nick Wang, Keys for Cure empowers young classical virtuosi across New Zealand to channel their passion into life-changing pediatric healthcare and youth mental wellbeing support.
        </p>
        <div style="display:flex; gap:14px; flex-wrap:wrap;">
          <a href="#events" style="background:#F59E0B; color:#090D16; font-weight:800; padding:14px 28px; border-radius:10px; text-decoration:none; font-size:14px; box-shadow:0 10px 20px rgba(245,158,11,0.25);">
            Reserve Concert Pass &rarr;
          </a>
          <a href="#initiative" style="background:rgba(255,255,255,0.15); color:#FFFFFF; font-weight:700; padding:14px 24px; border-radius:10px; text-decoration:none; font-size:14px; backdrop-filter:blur(4px);">
            Our 2026 Initiative
          </a>
        </div>
      </div>

      <div style="position:relative;">
        <div style="background:#FFFFFF; border-radius:20px; overflow:hidden; box-shadow:0 25px 50px -12px rgba(0,0,0,0.35); padding:12px; border:2px solid rgba(255,255,255,0.2);">
          <img src="http://localhost:8080/wp-content/uploads/2026/11/kfc-hero-grand-piano.jpg" alt="Keys for Cure Young Pianist" style="width:100%; border-radius:14px; display:block; height:320px; object-fit:cover;">
          <div style="padding:16px 14px 6px; color:#1E293B;">
            <div style="display:flex; justify-content:space-between; align-items:center;">
              <span style="font-weight:800; font-size:14px; color:#0052CC;">Annual Flagship Benefit Season</span>
              <span style="background:#ECFDF5; color:#059669; font-size:11px; font-weight:700; padding:2px 8px; border-radius:6px;">Starship Beneficiary</span>
            </div>
            <div style="font-size:12.5px; color:#64748B; margin-top:4px;">Featuring the Young Musicians Collective performing Beethoven, Chopin &amp; Brahms.</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- 3-COLUMN IMPACT COUNTERS -->
  <div style="background:#FFFFFF; border-bottom:1px solid #E2E8F0; padding:40px 24px;">
    <div style="max-width:1140px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:24px; text-align:center;">
      <div style="padding:18px; border-radius:12px; background:#F8FAFC; border:1px solid #E2E8F0;">
        <div style="font-size:36px; font-weight:900; color:#0052CC; line-height:1;">k+</div>
        <div style="font-size:14px; font-weight:700; color:#1E293B; margin-top:6px;">Raised for Pediatric Care</div>
        <div style="font-size:12px; color:#64748B; margin-top:2px;">100% net concert proceeds donated directly</div>
      </div>
      <div style="padding:18px; border-radius:12px; background:#F8FAFC; border:1px solid #E2E8F0;">
        <div style="font-size:36px; font-weight:900; color:#F59E0B; line-height:1;">350+</div>
        <div style="font-size:14px; font-weight:700; color:#1E293B; margin-top:6px;">Young Musicians on Stage</div>
        <div style="font-size:12px; color:#64748B; margin-top:2px;">Pianists, cellists, and chamber strings</div>
      </div>
      <div style="padding:18px; border-radius:12px; background:#F8FAFC; border:1px solid #E2E8F0;">
        <div style="font-size:36px; font-weight:900; color:#10B981; line-height:1;">4 Causes</div>
        <div style="font-size:14px; font-weight:700; color:#1E293B; margin-top:6px;">Healthcare Beneficiaries</div>
        <div style="font-size:12px; color:#64748B; margin-top:2px;">Starship Hospital, Cancer Society, Breast Cancer &amp; Hospice</div>
      </div>
    </div>
  </div>

  <!-- 2026/27 MAJOR INITIATIVE: CHILDREN'S MENTAL WELLBEING SUPPORT SALON -->
  <div id="initiative" style="background:#F1F5F9; padding:70px 24px; border-bottom:1px solid #E2E8F0;">
    <div style="max-width:1140px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:36px; align-items:center;">
      <div>
        <span style="font-size:11px; text-transform:uppercase; letter-spacing:1.5px; color:#0052CC; font-weight:800;">2026/27 Flagship Program</span>
        <h2 style="font-size:32px; font-weight:900; color:#0F172A; margin:8px 0 16px; line-height:1.2;">
          The Children’s Mental Wellbeing Support Salon
        </h2>
        <p style="font-size:15px; color:#475569; line-height:1.7; margin:0 0 16px;">
          Music is more than entertainment; it is an active bridge to emotional resilience. In 2026, Keys for Cure expands its philanthropic scope through the Children’s Mental Wellbeing Support Salon &mdash; bringing young musicians directly to pediatric recovery wards and community wellbeing spaces.
        </p>
        <div style="background:#FFFFFF; border-left:4px solid #F59E0B; padding:14px 18px; border-radius:0 8px 8px 0; font-size:13.5px; color:#334155; box-shadow:0 2px 4px rgba(0,0,0,0.03);">
          &ldquo;Nick Wang and the entire Keys for Cure team &mdash; thank you for your vision, your energy and your commitment to using music as a force for good.&rdquo;
          <div style="font-weight:700; margin-top:6px; color:#0052CC;">&mdash; Rt Hon Christopher Luxon, Prime Minister of New Zealand</div>
        </div>
      </div>

      <div style="display:grid; grid-template-columns:1fr; gap:16px;">
        <div style="background:#FFFFFF; border:1px solid #CBD5E1; border-radius:12px; padding:20px;">
          <h4 style="margin:0 0 6px; font-size:16px; color:#0052CC; font-weight:800;">🌟 Empowering Youth Agency</h4>
          <p style="margin:0; font-size:13px; color:#64748B; line-height:1.6;">Encouraging adolescent performers to use their artistic discipline to solve real social challenges.</p>
        </div>
        <div style="background:#FFFFFF; border:1px solid #CBD5E1; border-radius:12px; padding:20px;">
          <h4 style="margin:0 0 6px; font-size:16px; color:#0052CC; font-weight:800;">🏥 Pediatric Health Support</h4>
          <p style="margin:0; font-size:13px; color:#64748B; line-height:1.6;">Targeted donations providing musical therapy and clinical aid at Starship Children's Hospital.</p>
        </div>
        <div style="background:#FFFFFF; border:1px solid #CBD5E1; border-radius:12px; padding:20px;">
          <h4 style="margin:0 0 6px; font-size:16px; color:#0052CC; font-weight:800;">🤝 Ministerial Governance Endorsement</h4>
          <p style="margin:0; font-size:13px; color:#64748B; line-height:1.6;">Praised by Hon Paul Goldsmith, Minister for Arts, Culture and Heritage, for dedication to charitable transparency.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- NATIVE ELFSIGHT EVENT CALENDAR -->
  <div id="events" style="background:#FFFFFF; padding:70px 24px;">
    <div style="max-width:1140px; margin:0 auto;">
      <div style="text-align:center; margin-bottom:32px;">
        <span style="font-size:11px; text-transform:uppercase; letter-spacing:1.5px; color:#0052CC; font-weight:800;">Community Concerts &amp; Recitals</span>
        <h2 style="font-size:32px; font-weight:900; color:#0F172A; margin-top:6px;">Upcoming Benefit Concerts</h2>
        <p style="font-size:14px; color:#64748B; max-width:560px; margin:8px auto 0;">
          Select any concert to view the performance program and secure your pass with our 1-step instant RSVP.
        </p>
      </div>

      [kfc_event_calendar title="Upcoming Community Concerts &amp; Benefit Recitals"]
    </div>
  </div>

  <!-- COMMUNITY FOOTER -->
  <div style="background:#0F172A; color:#FFFFFF; padding:50px 24px; font-size:13px;">
    <div style="max-width:1140px; margin:0 auto; display:flex; justify-content:space-between; flex-wrap:wrap; gap:24px;">
      <div>
        <div style="font-weight:900; font-size:16px; color:#FFFFFF; margin-bottom:4px;">Keys for Cure Charitable Trust</div>
        <div style="color:#94A3B8;">Charities Services Registration No: CC63798</div>
        <div style="color:#94A3B8; margin-top:4px;">20 Northcroft Street, Takapuna, Auckland, New Zealand</div>
      </div>
      <div style="text-align:right;">
        <div style="font-weight:700; color:#F59E0B; margin-bottom:4px;">Get in Touch</div>
        <div><a href="mailto:info@keysforcure.org.nz" style="color:#FFFFFF; text-decoration:none;">info@keysforcure.org.nz</a></div>
        <div style="color:#94A3B8; margin-top:4px;">&copy; 2026 Keys for Cure. All rights reserved.</div>
      </div>
    </div>
  </div>

</div>
HTML;
    }

    public static function get_concept_3_nordic_minimalist(): string {
        return <<<HTML
<!-- CONCEPT 3: NORDIC MINIMALIST & CLINICAL HUMANISM (Nordoff & Robbins Archetype) -->
<div class="kfc-theme-nordic" style="background:#FFFFFF; color:#18181B; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; line-height:1.6;">

  <!-- ARCHITECTURAL HERO -->
  <div style="background:#F4F4F5; border-bottom:1px solid #E4E4E7; padding:90px 24px 80px;">
    <div style="max-width:1040px; margin:0 auto;">
      <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px;">
        <span style="display:inline-block; width:8px; height:8px; border-radius:50%; background:#0D9488;"></span>
        <span style="font-size:11px; font-weight:700; letter-spacing:2px; text-transform:uppercase; color:#0D9488;">
          Clinical Music Therapy &bull; Pediatric Wellbeing &bull; CC63798
        </span>
      </div>
      <h1 style="font-size:clamp(34px, 4.8vw, 56px); font-weight:800; line-height:1.12; color:#18181B; margin:0 0 24px; letter-spacing:-1px;">
        The Therapeutic Science of Youth Music in Pediatric Healthcare
      </h1>
      <p style="font-size:clamp(17px, 2vw, 20px); line-height:1.65; color:#52525B; max-width:760px; margin:0 0 36px; font-weight:400;">
        Keys for Cure bridges clinical healthcare at Starship Children's Hospital and youth acoustic discipline &mdash; funding bedside music therapy programs and children's mental wellbeing support across Aotearoa.
      </p>
      <div style="display:flex; gap:16px; flex-wrap:wrap;">
        <a href="#schedule" style="background:#18181B; color:#FFFFFF; font-weight:600; padding:13px 28px; border-radius:6px; text-decoration:none; font-size:14px;">
          View Concert Schedule &amp; RSVP &rarr;
        </a>
        <a href="#thesis" style="background:transparent; border:1px solid #D4D4D8; color:#18181B; font-weight:600; padding:13px 24px; border-radius:6px; text-decoration:none; font-size:14px;">
          Clinical Thesis &amp; Hospital Allocations
        </a>
      </div>
    </div>
  </div>

  <!-- TWO-COLUMN CLINICAL THESIS & ALLOCATION -->
  <div id="thesis" style="background:#FFFFFF; padding:80px 24px; border-bottom:1px solid #E4E4E7;">
    <div style="max-width:1040px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:48px; align-items:start;">
      <div>
        <span style="font-size:11px; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; color:#0D9488;">Clinical Evidence</span>
        <h2 style="font-size:30px; font-weight:800; color:#18181B; margin:8px 0 18px; letter-spacing:-0.5px;">
          The Science of Acoustic Engagement in Chronic Recovery
        </h2>
        <p style="font-size:15px; color:#52525B; line-height:1.75; margin:0 0 16px;">
          Clinical research demonstrated at leading pediatric institutes shows that live acoustic chamber music significantly reduces cortisol levels, alleviates post-operative trauma, and accelerates motor neuron recovery in hospitalized children.
        </p>
        <p style="font-size:15px; color:#52525B; line-height:1.75; margin:0;">
          Founded by Nick Wang and governed by an independent Board of Trustees, Keys for Cure converts 100% of concert ticket admissions and donor pledges into direct clinical grants and wellbeing salons for pediatric patients.
        </p>
      </div>

      <div style="background:#FAFAFA; border:1px solid #E4E4E7; border-radius:10px; padding:28px;">
        <h3 style="font-size:16px; font-weight:700; color:#18181B; margin:0 0 18px; padding-bottom:12px; border-bottom:1px solid #E4E4E7;">
          Direct Hospital Allocation Roster
        </h3>
        <div style="display:flex; flex-direction:column; gap:16px; font-size:13.5px;">
          <div style="display:flex; justify-content:space-between; align-items:flex-start;">
            <div>
              <strong style="color:#18181B;">Starship Children's Hospital</strong>
              <div style="color:#71717A; font-size:12px;">Pediatric neurological rehabilitation &amp; wellbeing salons</div>
            </div>
            <span style="background:#ECFDF5; color:#0D9488; font-weight:700; font-size:11px; padding:3px 8px; border-radius:4px;">Primary</span>
          </div>
          <div style="display:flex; justify-content:space-between; align-items:flex-start;">
            <div>
              <strong style="color:#18181B;">Cancer Society of New Zealand</strong>
              <div style="color:#71717A; font-size:12px;">Youth patient lodging &amp; family transport assistance</div>
            </div>
            <span style="color:#71717A; font-size:12px; font-weight:600;">Active Partner</span>
          </div>
          <div style="display:flex; justify-content:space-between; align-items:flex-start;">
            <div>
              <strong style="color:#18181B;">Mercy Hospice</strong>
              <div style="color:#71717A; font-size:12px;">End-of-life musical dignity &amp; comforting acoustic visits</div>
            </div>
            <span style="color:#71717A; font-size:12px; font-weight:600;">Active Partner</span>
          </div>
          <div style="display:flex; justify-content:space-between; align-items:flex-start;">
            <div>
              <strong style="color:#18181B;">Breast Cancer Foundation NZ</strong>
              <div style="color:#71717A; font-size:12px;">Diagnostic research &amp; patient clinical wellness grants</div>
            </div>
            <span style="color:#71717A; font-size:12px; font-weight:600;">Active Partner</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- MINISTERIAL ENDORSEMENT SECTION -->
  <div style="background:#F4F4F5; padding:70px 24px; border-bottom:1px solid #E4E4E7;">
    <div style="max-width:1040px; margin:0 auto;">
      <div style="border-left:3px solid #0D9488; padding-left:24px;">
        <p style="font-size:17px; line-height:1.75; color:#27272A; font-style:italic; margin:0 0 16px;">
          &ldquo;Over the years the Keys for Cure Charitable Trust has raised funds for many important causes including the Cancer Society of New Zealand, Breast Cancer Foundation, Mercy Hospice and Starship Children's Hospital. My warm thanks to Nick Wang and the Young Musicians for using the power of music to share love and kindness through their dedication to charity.&rdquo;
        </p>
        <div>
          <div style="font-weight:700; font-size:15px; color:#18181B;">Hon Paul Goldsmith</div>
          <div style="font-size:13px; color:#71717A;">Minister for Arts, Culture and Heritage &bull; New Zealand Government</div>
        </div>
      </div>
    </div>
  </div>

  <!-- NATIVE ELFSIGHT EVENT CALENDAR -->
  <div id="schedule" style="background:#FFFFFF; padding:80px 24px;">
    <div style="max-width:1040px; margin:0 auto;">
      <div style="margin-bottom:32px;">
        <span style="font-size:11px; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; color:#0D9488;">Program Schedule</span>
        <h2 style="font-size:30px; font-weight:800; color:#18181B; margin-top:6px; letter-spacing:-0.5px;">
          2026/27 Chronological Concert Schedule
        </h2>
      </div>

      [kfc_event_calendar title="Chronological Concert Schedule &amp; Pass Reservation"]
    </div>
  </div>

  <!-- INSTITUTIONAL GOVERNANCE FOOTER -->
  <div style="background:#18181B; color:#A1A1AA; padding:50px 24px; font-size:13px; border-top:1px solid #27272A;">
    <div style="max-width:1040px; margin:0 auto; display:flex; justify-content:space-between; flex-wrap:wrap; gap:28px;">
      <div>
        <div style="font-weight:700; color:#FFFFFF; font-size:15px; margin-bottom:4px;">Keys for Cure Charitable Trust</div>
        <div>Charities Services Registration: CC63798 &bull; Charitable Trusts Act 1957</div>
        <div style="margin-top:4px;">Headquarters: 20 Northcroft Street, Takapuna, Auckland, New Zealand</div>
      </div>
      <div>
        <div style="font-weight:700; color:#FFFFFF; margin-bottom:4px;">Governance &amp; Disclosures</div>
        <div>Inquiries: <a href="mailto:info@keysforcure.org.nz" style="color:#0D9488; text-decoration:none;">info@keysforcure.org.nz</a></div>
        <div style="margin-top:4px;">100% of Net Concert Proceeds Distributed to Pediatric Health Beneficiaries</div>
      </div>
    </div>
  </div>

</div>
HTML;
    }
}
