# SPEC 0001: Native Event Calendar Widget & QR Door Check-In System

## Problem Statement

Keys for Cure (Registered Charity CC63798) hosts benefit classical music concerts across Auckland to fund pediatric healthcare initiatives. Currently, the charity faces two critical obstacles:
1. Third-party event calendar solutions (such as Elfsight's Event Calendar widget) require ongoing SaaS monthly subscription fees ($12 to $60/month) and impose strict monthly view limits (typically capped at 200 views on free tiers), which directly cuts into funds meant for pediatric charity work.
2. At concert venues, volunteer door staff lack a contactless, rapid check-in mechanism. Attendees often present unverified confirmation emails, paper printouts, or arrive without tickets, leading to entrance bottlenecks, untracked guest numbers, and vulnerability to duplicate admissions. Relying on commercial ticketing services (such as Eventbrite or Humanitix) adds per-ticket commissions and requires patrons to navigate external third-party platforms.

## Solution

Build a 100% self-contained, native WordPress calendar and door operations subsystem with zero ongoing SaaS costs, embedded directly in the `keys-for-cure-ai` plugin.
1. An Elfsight-style responsive card grid shortcode displays upcoming Concert Events with visual dates, venue details, charity beneficiaries, and transparent ticket pricing.
2. A frictionless 1-step RSVP Registration modal allows patrons to reserve seats and submit optional charitable pledges in seconds without creating a WordPress account.
3. Upon RSVP submission, the patron receives an on-screen digital Concert Pass featuring an offline-generated cryptographic QR code and unique booking reference, along with immediate download options.
4. Venue volunteers access a standalone, mobile-friendly Organizer Door Portal (`/checkin/`) protected by a 4-digit PIN. Using any smartphone browser camera, volunteers perform instant Door Check-In with audio and visual feedback, automatic duplicate-scan rejection, and a live attendee search fallback.
5. Charity trustees can export the complete guest and donation pledge roster as a 1-click CSV report for official financial and attendance auditing.

## User Stories

1. As a concert patron, I want to view upcoming benefit concerts in an elegant, modern card grid layout, so that I can easily discover upcoming dates, musical programs, and venues.
2. As a concert patron, I want to click an event card to open a popup modal with comprehensive concert details, so that I can read the program repertoire and beneficiary notes without losing my place on the page.
3. As a concert patron, I want to complete a simple 1-step RSVP Registration with only my name, email address, and guest count, so that I can reserve attendance quickly without navigating complex checkout forms.
4. As a generous donor, I want to enter an optional charitable pledge during RSVP Registration, so that I can contribute additional funding to the designated pediatric health cause.
5. As a registered attendee, I want to immediately view my digital Concert Pass on-screen with an scannable QR code and booking reference, so that I have proof of admission on my mobile phone.
6. As a registered attendee, I want to save or download my Concert Pass locally, so that I can present it at the door even if the venue has poor cellular reception.
7. As a registered attendee, I want an automated email confirmation sent to my inbox containing my booking reference and concert details, so that I have a persistent backup record of my registration.
8. As a concert patron, I want to see an automated "Sold Out" badge when a concert event reaches maximum capacity, so that I know the event is at full venue capacity and cannot over-register.
9. As a student volunteer, I want to open the Organizer Door Portal at `/checkin/` and log in using a 4-digit PIN, so that I can operate the door scanner without needing full WordPress administrator credentials.
10. As a student volunteer, I want to scan attendee QR codes directly using my smartphone camera in the browser, so that check-in takes less than two seconds per guest without installing native app store apps.
11. As a student volunteer, I want to hear an audible confirmation chime and see a green admission banner upon a successful scan, so that I can admit patrons swiftly in noisy venue lobbies.
12. As an event organizer, I want the scanner to immediately reject duplicate QR code scans with an audible buzz and alert, so that no Concert Pass can be reused by multiple parties.
13. As an event organizer, I want the scanner to reject invalid or tampered QR codes, so that counterfeit passes cannot gain unauthorized entry.
14. As a student volunteer, I want a manual attendee search bar in the Organizer Door Portal, so that I can quickly look up and admit patrons whose phone batteries have died.
15. As a charity trustee, I want to export the complete attendee and pledge list to a CSV spreadsheet from the WordPress admin dashboard, so that we have complete records for board governance and Charities Act 2005 compliance.
16. As a charity manager, I want to view live dashboard metrics showing total registered attendees, checked-in guests, and total pledges, so that I can monitor concert attendance in real time.
17. As an event manager, I want to configure the venue capacity limit per concert event within WordPress, so that seat reservations automatically respect venue fire and safety regulations.
18. As a site visitor with accessibility needs, I want all calendar cards, modals, and door scan interfaces to have high-contrast text and keyboard-accessible navigation, so that I can easily interact with the site.

## Implementation Decisions

- **Architecture & Modularity**: The feature will be encapsulated as a deep module (`KFC_Events_Calendar`) integrated into the primary charity operations plugin. The module presents a minimal interface to WordPress hooks and AJAX controllers while encapsulating the entire lifecycle of event queries, registration persistence, cryptographic token generation, and door verification.
- **Data Persistence**: A dedicated database table `wp_kfc_registrations` manages all ticket records independently of third-party e-commerce tables. Fields include `event_id`, `booking_ref` (format `KFC-TKT-XXXXXX`), `attendee_name`, `attendee_email`, `guest_count`, `donation_pledge`, `qr_token`, `status` (`confirmed`, `checked_in`, `cancelled`), `checked_in_at`, and `created_at`.
- **Event Data Integration**: Concert details are sourced from WordPress `tribe_events` post type and associated post meta (`_EventStartDate`, `_EventEndDate`, `_EventCost`, `_EventVenueID`) with transparent fallbacks to custom meta for independent operation.
- **Cryptographic Token Verification**: The QR token is generated using a secure SHA-256 HMAC hash of the unique booking reference combined with the WordPress installation secret key. At Door Check-In, the scanner verifies the signature before updating the attendance status, preventing forged passes.
- **Zero-Dependency QR Generation**: The digital Concert Pass generates QR codes client-side using pure JavaScript/SVG (embedded into the DOM), ensuring that passes can be generated and displayed without making external requests to third-party image generation APIs.
- **Door Check-In Interface**: The `/checkin/` route serves a standalone, lightweight, dark-mode web application utilizing `html5-qrcode` for multi-platform camera streaming. Audio feedback is synthesized via the browser's Web Audio API (`AudioContext`), requiring zero external audio asset downloads.
- **Security & Authorization**: The Organizer Door Portal access is protected by a configurable door PIN (`kfc_door_pin`, defaulting to `2027`), stored securely in `wp_options`. WordPress administrator capabilities (`edit_posts`) remain required for changing settings or exporting financial CSV data.

## Testing Decisions

- **Testing Philosophy**: Only external behaviors at the primary module seams will be tested. Internal implementation details (such as specific query constructions or styling classes) will remain private to prevent brittle tests.
- **Primary Seams to Test**:
  1. **RSVP Registration Seam**: Exercise submission with valid parameters, verify successful registration persistence, unique booking reference generation, and capacity exhaustion behavior.
  2. **Door Verification Seam**: Exercise token validation, verify successful transition to `checked_in` with timestamp, verify immediate rejection of duplicate scans, and verify rejection of tampered tokens.
  3. **Attendee Search Seam**: Exercise manual query lookup by name and booking reference substring.
  4. **CSV Export Seam**: Exercise data export formatting and ensure all attendee, pledge, and status fields match persisted records.
- **Test Harness**: Tests will execute against a live WordPress test environment inside the local Docker test container (`my-full-stack`), verifying real database transactions and WordPress API compatibility.

## Out of Scope

- Online payment gateway processing (e.g., Stripe, Windcave) for ticket purchases. RSVPs and donation pledges are recorded; direct charity financial contributions continue to route via standard charity bank transfer and Givealittle.
- Dynamic interactive seat-map selection (e.g., picking specific seat letters/numbers in an auditorium). Capacity is managed as general admission by head count.
- Multi-venue sub-room access permissions (e.g., VIP lounge scanners vs general entry scanners). All venue volunteers share the event door check-in PIN.

## Further Notes

- All code and assets are 100% open and self-hosted, ensuring $0 ongoing SaaS software overhead in perpetuity.
- All attendee records and donation pledges remain strictly on the charity's self-hosted server, ensuring full data privacy compliance and governance under the New Zealand Charities Act 2005.
