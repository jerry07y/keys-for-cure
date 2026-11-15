<?php
/**
 * Keys for Cure - 3 Presentation Layout Paradigms
 * Inspired by established, successful music charities (Sphinx Organization, London Music Fund,
 * Playing For Change Foundation, El Sistema USA, Live Music Now UK).
 */

class KFC_Concept_Layouts {

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
    private static function get_concept_1_symphonic_prestige(): string {
        return <<<HTML
<!-- wp:cover {"url":"http://localhost:8080/wp-content/uploads/2026/11/kfc-hero-grand-piano.jpg","dimRatio":60,"overlayColor":"contrast","minHeight":580,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}}} -->
<div class="wp-block-cover alignfull" style="min-height:580px;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--40)"><span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Keys for Cure Concert Grand Piano" src="http://localhost:8080/wp-content/uploads/2026/11/kfc-hero-grand-piano.jpg" data-object-fit="cover" /><div class="wp-block-cover__inner-container">
  
  <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px","textTransform":"uppercase","fontWeight":"700"}},"fontSize":"small"} -->
  <p class="has-small-font-size" style="font-weight:700;letter-spacing:2px;text-transform:uppercase">Official Registered New Zealand Charity &bull; CC63798</p>
  <!-- /wp:paragraph -->

  <!-- wp:heading {"level":1,"style":{"typography":{"lineHeight":"1.15","fontWeight":"700"}},"fontSize":"xx-large"} -->
  <h1 class="wp-block-heading has-xx-large-font-size" style="line-height:1.15;font-weight:700">Transforming the Power of Art into Real Action</h1>
  <!-- /wp:heading -->

  <!-- wp:paragraph {"fontSize":"medium","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|40"}}}} -->
  <p class="has-medium-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--40);max-width:760px">Keys for Cure unites young musicians and community performers across Auckland and New Zealand to fund vital children’s health initiatives, youth mental wellbeing, and patient care through charity benefit concerts.</p>
  <!-- /wp:paragraph -->

  <!-- wp:buttons -->
  <div class="wp-block-buttons">
    <!-- wp:button -->
    <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#events">Explore 2026/27 Concerts</a></div>
    <!-- /wp:button -->
    <!-- wp:button {"className":"is-style-outline"} -->
    <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#donate">Support &amp; Donate</a></div>
    <!-- /wp:button -->
  </div>
  <!-- /wp:buttons -->

</div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"color":{"background":"var:preset|color|accent-5"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-accent-5-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
  <!-- wp:columns {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
  <div class="wp-block-columns">
    <!-- wp:column {"style":{"spacing":{"padding":"var:preset|spacing|30"}}} -->
    <div class="wp-block-column" style="padding:var(--wp--preset--spacing--30)">
      <!-- wp:heading {"level":2,"style":{"typography":{"lineHeight":"1","fontWeight":"800"}},"fontSize":"xx-large"} -->
      <h2 class="wp-block-heading has-xx-large-font-size" style="font-weight:800;line-height:1">100+</h2>
      <!-- /wp:heading -->
      <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"fontSize":"medium"} -->
      <p class="has-medium-font-size" style="font-weight:600">Youth Musicians &amp; Soloists</p>
      <!-- /wp:paragraph -->
      <!-- wp:paragraph {"fontSize":"small"} -->
      <p class="has-small-font-size">Young classical performers and ensembles sharing their artistic gifts across Auckland halls.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"style":{"spacing":{"padding":"var:preset|spacing|30"}}} -->
    <div class="wp-block-column" style="padding:var(--wp--preset--spacing--30)">
      <!-- wp:heading {"level":2,"style":{"typography":{"lineHeight":"1","fontWeight":"800"}},"fontSize":"xx-large"} -->
      <h2 class="wp-block-heading has-xx-large-font-size" style="font-weight:800;line-height:1">100%</h2>
      <!-- /wp:heading -->
      <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"fontSize":"medium"} -->
      <p class="has-medium-font-size" style="font-weight:600">Proceeds to Youth Health</p>
      <!-- /wp:paragraph -->
      <!-- wp:paragraph {"fontSize":"small"} -->
      <p class="has-small-font-size">Every dollar of net concert proceeds directly funds pediatric wellbeing and healthcare partners.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"style":{"spacing":{"padding":"var:preset|spacing|30"}}} -->
    <div class="wp-block-column" style="padding:var(--wp--preset--spacing--30)">
      <!-- wp:heading {"level":2,"style":{"typography":{"lineHeight":"1","fontWeight":"800"}},"fontSize":"xx-large"} -->
      <h2 class="wp-block-heading has-xx-large-font-size" style="font-weight:800;line-height:1">CC63798</h2>
      <!-- /wp:heading -->
      <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"fontSize":"medium"} -->
      <p class="has-medium-font-size" style="font-weight:600">Registered NZ Charity</p>
      <!-- /wp:paragraph -->
      <!-- wp:paragraph {"fontSize":"small"} -->
      <p class="has-small-font-size">Officially registered under the Charities Act 2005 with full fiscal transparency.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"},"anchor":"events"} -->
<div id="events" class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
  
  <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px","textTransform":"uppercase","fontWeight":"700"}},"fontSize":"small"} -->
  <p class="has-small-font-size" style="font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--wp--preset--color--accent-4)">2026/2027 Season &bull; Editorial Spotlight</p>
  <!-- /wp:paragraph -->

  <!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"700"}},"fontSize":"x-large"} -->
  <h2 class="wp-block-heading has-x-large-font-size" style="font-weight:700">Featured Benefit Concerts</h2>
  <!-- /wp:heading -->

  <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|40"}}}} -->
  <hr class="wp-block-separator has-alpha-channel-opacity" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--40)"/>
  <!-- /wp:separator -->

  <!-- Asymmetric Editorial Split: Large Gala Spotlight on Left (58%), 2-Concert Stack on Right (42%) -->
  <!-- wp:columns {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
  <div class="wp-block-columns">
    <!-- LEFT: Large Featured Gala Spotlight Card -->
    <!-- wp:column {"width":"58%","style":{"spacing":{"padding":"var:preset|spacing|40"},"border":{"width":"1px","color":"var:preset|color|accent-5","radius":"12px"}},"backgroundColor":"base"} -->
    <div class="wp-block-column has-base-background-color has-background" style="flex-basis:58%;border-color:var(--wp--preset--color--accent-5);border-width:1px;border-style:solid;border-radius:12px;padding:var(--wp--preset--spacing--40)">
      <!-- wp:image {"aspectRatio":"16/9","scale":"cover","style":{"border":{"radius":"8px"}}} -->
      <figure class="wp-block-image"><img src="http://localhost:8080/wp-content/uploads/2026/11/kfc-holiday-gala.jpg" alt="Keys for Cure Annual Holiday Gala" style="border-radius:8px;aspect-ratio:16/9;object-fit:cover;width:100%" /></figure>
      <!-- /wp:image -->

      <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1.5px","textTransform":"uppercase","fontWeight":"700"}},"fontSize":"small"} -->
      <p class="has-small-font-size" style="font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:var(--wp--preset--color--accent-4);margin-top:16px">Flagship Charity Gala</p>
      <!-- /wp:paragraph -->

      <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"700"}},"fontSize":"large"} -->
      <h3 class="wp-block-heading has-large-font-size" style="font-weight:700;margin-top:4px;margin-bottom:8px">Keys for Cure Annual Holiday Gala</h3>
      <!-- /wp:heading -->

      <!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}},"fontSize":"small"} -->
      <p class="has-small-font-size" style="font-weight:700">Saturday, 19 Dec 2026 &bull; 7:30 PM &nbsp;|&nbsp; Auckland Town Hall, Great Hall</p>
      <!-- /wp:paragraph -->

      <!-- wp:paragraph {"fontSize":"small"} -->
      <p class="has-small-font-size">Our premier annual fundraising evening featuring youth orchestra, vocal soloists, and historic Town Hall pipe organ. 100% of proceeds fund pediatric cancer care and family accommodations.</p>
      <!-- /wp:paragraph -->

      <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
      <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
        <!-- wp:button -->
        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="http://localhost:8080/event/keys-for-cure-annual-holiday-gala/">Reserve Gala Tickets &bull; $45 NZD</a></div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->
    </div>
    <!-- /wp:column -->

    <!-- RIGHT: 2-Concert Stack -->
    <!-- wp:column {"width":"42%"} -->
    <div class="wp-block-column" style="flex-basis:42%">
      <!-- Stack Card 1: Auckland Youth Chamber Concert -->
      <!-- wp:group {"style":{"spacing":{"padding":"var:preset|spacing|30","margin":{"bottom":"var:preset|spacing|30"}},"border":{"width":"1px","color":"var:preset|color|accent-5","radius":"10px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
      <div class="wp-block-group has-base-background-color has-background" style="border-color:var(--wp--preset--color--accent-5);border-width:1px;border-style:solid;border-radius:10px;padding:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)">
        <!-- wp:image {"aspectRatio":"16/9","scale":"cover","style":{"border":{"radius":"6px"}}} -->
        <figure class="wp-block-image"><img src="http://localhost:8080/wp-content/uploads/2026/11/kfc-chamber-concert.jpg" alt="Auckland Youth Chamber Concert" style="border-radius:6px;aspect-ratio:16/9;object-fit:cover;width:100%" /></figure>
        <!-- /wp:image -->
        <!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"700"}},"fontSize":"medium"} -->
        <h4 class="wp-block-heading has-medium-font-size" style="font-weight:700;margin-top:10px;margin-bottom:4px">Auckland Youth Chamber Concert</h4>
        <!-- /wp:heading -->
        <!-- wp:paragraph {"fontSize":"small"} -->
        <p class="has-small-font-size" style="margin-bottom:8px">Saturday, 28 Nov 2026 &bull; 7:00 PM &bull; Bruce Mason Centre<br>Admission: <strong>$25 NZD</strong></p>
        <!-- /wp:paragraph -->
        <!-- wp:buttons -->
        <div class="wp-block-buttons">
          <!-- wp:button {"className":"is-style-outline"} -->
          <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="http://localhost:8080/event/auckland-youth-chamber-concert/">View Details &amp; Tickets &rarr;</a></div>
          <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
      </div>
      <!-- /wp:group -->

      <!-- Stack Card 2: Autumn Youth Cello Recital -->
      <!-- wp:group {"style":{"spacing":{"padding":"var:preset|spacing|30"},"border":{"width":"1px","color":"var:preset|color|accent-5","radius":"10px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
      <div class="wp-block-group has-base-background-color has-background" style="border-color:var(--wp--preset--color--accent-5);border-width:1px;border-style:solid;border-radius:10px;padding:var(--wp--preset--spacing--30)">
        <!-- wp:image {"aspectRatio":"16/9","scale":"cover","style":{"border":{"radius":"6px"}}} -->
        <figure class="wp-block-image"><img src="http://localhost:8080/wp-content/uploads/2026/11/kfc-piano-hands.jpg" alt="Autumn Youth Cello Recital" style="border-radius:6px;aspect-ratio:16/9;object-fit:cover;width:100%" /></figure>
        <!-- /wp:image -->
        <!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"700"}},"fontSize":"medium"} -->
        <h4 class="wp-block-heading has-medium-font-size" style="font-weight:700;margin-top:10px;margin-bottom:4px">Autumn Youth Cello Recital</h4>
        <!-- /wp:heading -->
        <!-- wp:paragraph {"fontSize":"small"} -->
        <p class="has-small-font-size" style="margin-bottom:8px">Saturday, 20 March 2027 &bull; 7:00 PM &bull; Takapuna Community Hall<br>Admission: <strong>$20 NZD</strong></p>
        <!-- /wp:paragraph -->
        <!-- wp:buttons -->
        <div class="wp-block-buttons">
          <!-- wp:button {"className":"is-style-outline"} -->
          <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="http://localhost:8080/event/autumn-youth-cello-recital/">View Details &amp; Tickets &rarr;</a></div>
          <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->

  <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}},"typography":{"textAlign":"center"}}} -->
  <p style="margin-top:var(--wp--preset--spacing--40);text-align:center"><a href="http://localhost:8080/news/"><strong>Browse All Concert Summaries, Facts &amp; News on our dedicated News Page &rarr;</strong></a></p>
  <!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"color":{"background":"var:preset|color|accent-5"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-accent-5-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--40)">
  <!-- wp:columns {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}}} -->
  <div class="wp-block-columns">
    <!-- wp:column {"width":"45%"} -->
    <div class="wp-block-column" style="flex-basis:45%">
      <!-- wp:image {"aspectRatio":"4/3","scale":"cover","style":{"border":{"radius":"8px"}}} -->
      <figure class="wp-block-image"><img src="http://localhost:8080/wp-content/uploads/2026/11/kfc-piano-hands.jpg" alt="Student hands performing Chopin piano recital" style="border-radius:8px;aspect-ratio:4/3;object-fit:cover" /></figure>
      <!-- /wp:image -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"width":"55%"} -->
    <div class="wp-block-column" style="flex-basis:55%">
      <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px","textTransform":"uppercase","fontWeight":"700"}},"fontSize":"small"} -->
      <p class="has-small-font-size" style="font-weight:700;letter-spacing:2px;text-transform:uppercase;color:var(--wp--preset--color--accent-4)">Music with a Mission</p>
      <!-- /wp:paragraph -->

      <!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"700"}},"fontSize":"x-large"} -->
      <h2 class="wp-block-heading has-x-large-font-size" style="font-weight:700">Artistry Serving Children in Need</h2>
      <!-- /wp:heading -->

      <!-- wp:paragraph {"fontSize":"medium"} -->
      <p class="has-medium-font-size">Founded by devoted music educators and youth concert organizers, Keys for Cure channels the dedication of classical music students into measurable community impact.</p>
      <!-- /wp:paragraph -->

      <!-- wp:paragraph -->
      <p>Through partnerships with Bruce Mason Centre and Auckland Town Hall, we eliminate commercial overhead so that 100% of net ticket admissions directly fund pediatric patient care and youth mental wellbeing initiatives.</p>
      <!-- /wp:paragraph -->

      <!-- wp:quote {"style":{"typography":{"fontStyle":"italic"}}} -->
      <blockquote class="wp-block-quote"><p>Every note played on stage is an investment in a child’s health, healing, and future.</p></blockquote>
      <!-- /wp:quote -->
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"},"anchor":"donate"} -->
<div id="donate" class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
  <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px","textTransform":"uppercase","fontWeight":"700","textAlign":"center"}},"fontSize":"small"} -->
  <p class="has-small-font-size" style="font-weight:700;letter-spacing:2px;text-transform:uppercase;text-align:center;color:var(--wp--preset--color--accent-4)">Philanthropic Support</p>
  <!-- /wp:paragraph -->

  <!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"700","textAlign":"center"}},"fontSize":"x-large"} -->
  <h2 class="wp-block-heading has-x-large-font-size" style="font-weight:700;text-align:center">Support Children’s Wellbeing</h2>
  <!-- /wp:heading -->

  <!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"fontSize":"medium"} -->
  <p class="has-medium-font-size" style="text-align:center;max-width:640px;margin:12px auto 36px">As an officially registered New Zealand Charity (CC63798), your donations and ticket reservations are fully receipted for tax credit purposes.</p>
  <!-- /wp:paragraph -->

  <!-- wp:columns {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
  <div class="wp-block-columns">
    <!-- wp:column {"style":{"spacing":{"padding":"var:preset|spacing|40"},"border":{"width":"1px","color":"var:preset|color|accent-5","radius":"12px"}},"backgroundColor":"base"} -->
    <div class="wp-block-column has-base-background-color has-background" style="border-color:var(--wp--preset--color--accent-5);border-width:1px;border-style:solid;border-radius:12px;padding:var(--wp--preset--spacing--40)">
      <!-- wp:heading {"level":3,"fontSize":"large","style":{"typography":{"fontWeight":"700"}}} -->
      <h3 class="wp-block-heading has-large-font-size" style="font-weight:700">Concert Seat</h3>
      <!-- /wp:heading -->
      <!-- wp:heading {"level":4,"fontSize":"x-large","style":{"typography":{"fontWeight":"800"}}} -->
      <h4 class="wp-block-heading has-x-large-font-size" style="font-weight:800">$25 NZD</h4>
      <!-- /wp:heading -->
      <!-- wp:paragraph {"fontSize":"small"} -->
      <p class="has-small-font-size">General admission to any seasonal youth chamber performance in Takapuna or central Auckland.</p>
      <!-- /wp:paragraph -->
      <!-- wp:buttons -->
      <div class="wp-block-buttons">
        <!-- wp:button -->
        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="http://localhost:8080/events/">Reserve Tickets</a></div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"style":{"spacing":{"padding":"var:preset|spacing|40"},"border":{"width":"2px","color":"var:preset|color|accent-4","radius":"12px"}},"backgroundColor":"accent-5"} -->
    <div class="wp-block-column has-accent-5-background-color has-background" style="border-color:var(--wp--preset--color--accent-4);border-width:2px;border-style:solid;border-radius:12px;padding:var(--wp--preset--spacing--40)">
      <!-- wp:heading {"level":3,"fontSize":"large","style":{"typography":{"fontWeight":"700"}}} -->
      <h3 class="wp-block-heading has-large-font-size" style="font-weight:700">Patron Supporter</h3>
      <!-- /wp:heading -->
      <!-- wp:heading {"level":4,"fontSize":"x-large","style":{"typography":{"fontWeight":"800"}}} -->
      <h4 class="wp-block-heading has-x-large-font-size" style="font-weight:800">$100 NZD</h4>
      <!-- /wp:heading -->
      <!-- wp:paragraph {"fontSize":"small"} -->
      <p class="has-small-font-size">Funds music therapy equipment and provides priority seating for 2 guests at our Town Hall Gala.</p>
      <!-- /wp:paragraph -->
      <!-- wp:buttons -->
      <div class="wp-block-buttons">
        <!-- wp:button -->
        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="mailto:info@keysforcure.org.nz?subject=Patron%20Supporter%20Inquiry">Become a Patron</a></div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"style":{"spacing":{"padding":"var:preset|spacing|40"},"border":{"width":"1px","color":"var:preset|color|accent-5","radius":"12px"}},"backgroundColor":"base"} -->
    <div class="wp-block-column has-base-background-color has-background" style="border-color:var(--wp--preset--color--accent-5);border-width:1px;border-style:solid;border-radius:12px;padding:var(--wp--preset--spacing--40)">
      <!-- wp:heading {"level":3,"fontSize":"large","style":{"typography":{"fontWeight":"700"}}} -->
      <h3 class="wp-block-heading has-large-font-size" style="font-weight:700">Healthcare Benefactor</h3>
      <!-- /wp:heading -->
      <!-- wp:heading {"level":4,"fontSize":"x-large","style":{"typography":{"fontWeight":"800"}}} -->
      <h4 class="wp-block-heading has-x-large-font-size" style="font-weight:800">$250 NZD</h4>
      <!-- /wp:heading -->
      <!-- wp:paragraph {"fontSize":"small"} -->
      <p class="has-small-font-size">Directly underwrites youth performer hall rehearsal costs and medical wellbeing subsidies.</p>
      <!-- /wp:paragraph -->
      <!-- wp:buttons -->
      <div class="wp-block-buttons">
        <!-- wp:button {"className":"is-style-outline"} -->
        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="mailto:info@keysforcure.org.nz?subject=Healthcare%20Benefactor%20Inquiry">Partner with Us</a></div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"color":{"background":"var:preset|color|contrast","text":"var:preset|color|base"}},"layout":{"type":"constrained"},"anchor":"contact"} -->
<div id="contact" class="wp-block-group alignfull has-base-color has-contrast-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
  <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px","textTransform":"uppercase","fontWeight":"700"}},"fontSize":"small"} -->
  <p class="has-small-font-size" style="font-weight:700;letter-spacing:2px;text-transform:uppercase;opacity:0.85">Charity Accountability &bull; DIA Reg CC63798</p>
  <!-- /wp:paragraph -->
  <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"700"}},"fontSize":"large"} -->
  <h3 class="wp-block-heading has-large-font-size" style="font-weight:700;margin-top:8px">Keys for Cure New Zealand</h3>
  <!-- /wp:heading -->
  <!-- wp:paragraph {"fontSize":"small"} -->
  <p class="has-small-font-size">20 Northcroft Street, Takapuna, Auckland, New Zealand &nbsp;|&nbsp; <a href="mailto:info@keysforcure.org.nz" style="color:inherit">info@keysforcure.org.nz</a> &nbsp;|&nbsp; Official Charities Services Register: CC63798</p>
  <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
HTML;
    }

    /**
     * Concept 2: Harmonies of Hope (Split Hero & 3-Column Campaign Grid)
     * Inspired by Playing For Change Foundation & El Sistema USA
     */
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
