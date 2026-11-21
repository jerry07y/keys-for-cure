# 1. Native Event Calendar with RSVP & Door Check-In QR System

Date: 2026-11-21

## Status

Accepted

## Context

Keys for Cure New Zealand (Charity CC63798) organizes classical acoustic concerts to raise funds for pediatric illness and adolescent mental wellbeing. 
The organization previously evaluated third-party SaaS event calendar widgets (such as Elfsight). However, third-party widgets impose monthly subscription costs ($6–$40/mo), strict traffic rate limits (e.g. 200 views/month limit), and third-party tracking scripts. Furthermore, venue admissions require an offline-capable, volunteer-friendly door sign-in solution that prevents ticket reuse at the venue.

## Decision

We will implement a native, $0-cost Event Calendar, RSVP Registration, and QR Code Check-In system embedded directly in the `keys-for-cure-ai` WordPress plugin and theme ecosystem:

1. **Elfsight-Style Event Calendar UI**:
   - Modern responsive card layout featuring concert date badges, acoustic venues, beneficiary badges, and ticket tier indicators.
   - Interactive modal popups displaying full musical programs and instant RSVP actions without page reloads.

2. **1-Step RSVP & Cryptographic Concert Pass**:
   - Frictionless registration capturing Attendee Name, Contact Email, Guest Quantity, and optional Donation Pledge.
   - Enforces venue capacity limits per concert event with automatic "Sold Out" state.
   - Generates a client-rendered cryptographic QR code pass with unique reference (e.g., `KFC-TKT-XXXX`), instant download as an image/pass card, and automated confirmation email backup.

3. **Organizer Door Portal (`/checkin/`)**:
   - Mobile-optimized camera scanner web page protected by a configurable 4-digit PIN for volunteer ushers.
   - Live HTML5 camera QR scanner providing instant audio/visual verification ("Checked In", green) and duplicate-entry rejection ("Already Checked In at HH:MM", red).
   - Instant search lookup fallback by attendee name or email for dead battery / forgotten ticket scenarios.

4. **Trustee Administration & Export**:
   - WordPress Admin dashboard overview with real-time check-in stats and 1-click CSV guest list exports for trustees.

## Consequences

- **Positive**:
  - $0 ongoing software cost; zero SaaS subscription dependencies or view limits.
  - No external tracking scripts; full privacy compliance for patron contact details.
  - Volunteer door ushers require no WordPress accounts—only the 4-digit event PIN.
  - Immediate real-time duplicate check-in prevention at the venue.
- **Negative / Constraints**:
  - Venue door check-in requires mobile browser camera permission.
  - Physical hosting server must handle local email dispatch via `wp_mail` or SMTP.
