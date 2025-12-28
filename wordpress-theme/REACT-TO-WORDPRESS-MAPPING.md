# React to WordPress Theme Conversion Guide

## Overview

This document maps the React components to their WordPress template equivalents and identifies static vs dynamic content areas for easy conversion.

---

## Component Mapping

| React Component | WordPress Template | Purpose |
|-----------------|-------------------|---------|
| `Navbar.tsx` | `header.php` | Site header with navigation |
| `HeroSection.tsx` | `template-parts/section-hero.php` | Homepage hero banner |
| `AboutSection.tsx` | `template-parts/section-about.php` | Biography section |
| `ProjectsSection.tsx` | `template-parts/section-projects.php` | Featured work/projects |
| `WatchSection.tsx` | `template-parts/section-watch.php` | Video gallery |
| `TourSection.tsx` | `template-parts/section-tour.php` | Tour dates listing |
| `ArchiveSection.tsx` | `template-parts/section-archive.php` | Career eras/timeline |
| `ContactSection.tsx` | `template-parts/section-contact.php` | Contact form & info |
| `Footer.tsx` | `footer.php` | Site footer |
| `Index.tsx` | `front-page.php` | Homepage template |

---

## Static vs Dynamic Content Analysis

### 🔒 STATIC (Layout/Styling) - Keep in Templates

These elements are structural and don't need WordPress management:

| Component | Static Elements |
|-----------|-----------------|
| **Navbar** | Navigation structure, logo placement, mobile menu toggle |
| **Hero** | Gradient overlays, decorative elements, scroll indicator |
| **About** | Grid layout, decorative frame, stats layout |
| **Projects** | Card grid structure, hover effects, image overlays |
| **Watch** | Video grid layout, play button overlays |
| **Tour** | List layout, status badges styling |
| **Archive** | Era cards grid, overlay gradients |
| **Contact** | Form layout, social icons structure |
| **Footer** | Layout structure, copyright format |

### 📝 DYNAMIC (Content) - WordPress Managed

These elements should be editable via WordPress:

| Component | Dynamic Content | WordPress Source |
|-----------|-----------------|------------------|
| **Navbar** | Logo text, navigation links | `Site Title`, `wp_nav_menu()` |
| **Hero** | Title, subtitle, tagline, CTAs, background image | `Theme Customizer` |
| **About** | Heading, bio paragraphs, stats (years/shows/fans), portrait | `Theme Customizer` |
| **Projects** | Project cards (title, year, type, description, image) | `Custom Post Type: project` |
| **Watch** | Featured video, video grid (title, thumbnail, duration, views) | `Custom Post Type: video` |
| **Tour** | Tour dates (date, city, venue, status, ticket URL) | `Custom Post Type: show` |
| **Archive** | Era cards (title, year, description, image) | `Custom Post Type: era` |
| **Contact** | Email, social links, form settings | `Theme Customizer` |
| **Footer** | Copyright text, footer links | `Site Title`, `wp_nav_menu()` |

---

## Custom Post Types Required

### 1. `project` - Projects/Specials

```php
Fields:
- title (post_title)
- description (post_content)
- image (featured_image)
- type (meta: _project_type) - "Special", "Podcast", "TV"
- year (meta: _project_year)
- link_url (meta: _project_url)
```

### 2. `video` - Video Clips

```php
Fields:
- title (post_title)
- thumbnail (featured_image)
- video_url (meta: _video_url)
- duration (meta: _video_duration)
- views (meta: _video_views)
- is_featured (meta: _video_featured)
```

### 3. `show` - Tour Dates

```php
Fields:
- city (meta: _show_city)
- venue (meta: _show_venue)
- date (meta: _show_date)
- status (meta: _show_status) - "On Sale", "Few Left", "Sold Out"
- ticket_url (meta: _show_ticket_url)
```

### 4. `era` - Archive Eras

```php
Fields:
- title (post_title)
- description (post_excerpt)
- year (meta: _era_year)
- image (featured_image)
- slug (post_name)
```

---

## Theme Customizer Sections

### Hero Section
- `hero_subtitle` - "Stand-Up Comedian"
- `hero_title` - "CATHERINE GELLER"
- `hero_tagline` - Main tagline text
- `hero_image` - Background image
- `hero_cta_primary_text` - "See Tour Dates"
- `hero_cta_secondary_text` - "Watch Clips"

### About Section
- `about_heading` - Section title
- `about_bio` - Biography text (WYSIWYG)
- `about_image` - Portrait photo
- `about_stat_1_value` / `about_stat_1_label` - First stat
- `about_stat_2_value` / `about_stat_2_label` - Second stat
- `about_stat_3_value` / `about_stat_3_label` - Third stat

### Contact Section
- `contact_email` - Booking email
- `contact_intro` - Introduction text
- `social_instagram` - Instagram URL
- `social_twitter` - Twitter/X URL
- `social_youtube` - YouTube URL

---

## File Structure

```
wordpress-theme/
├── style.css              # Theme info & all CSS
├── functions.php          # Theme setup, CPT, Customizer
├── header.php             # <head> & navigation
├── footer.php             # Footer & closing tags
├── front-page.php         # Homepage template
├── index.php              # Fallback template
├── single-era.php         # Single era page
├── 404.php                # Not found page
├── template-parts/
│   ├── section-hero.php
│   ├── section-about.php
│   ├── section-projects.php
│   ├── section-watch.php
│   ├── section-tour.php
│   ├── section-archive.php
│   └── section-contact.php
├── assets/
│   ├── css/
│   │   └── custom.css     # Additional styles
│   ├── js/
│   │   └── main.js        # Interactivity
│   └── images/
│       └── .gitkeep
├── inc/
│   ├── customizer.php     # Customizer settings
│   └── custom-post-types.php
└── screenshot.png         # Theme preview (1200x900)
```

---

## CSS Variables Reference

All design tokens from React `index.css` are preserved:

```css
:root {
  /* Color Palette */
  --background: 30 25% 97%;
  --foreground: 350 20% 15%;
  --primary: 340 45% 30%;        /* Deep burgundy */
  --secondary: 38 50% 85%;       /* Champagne */
  --accent: 38 60% 65%;          /* Gold */
  --muted: 350 20% 90%;          /* Rose */
  
  /* Custom Colors */
  --burgundy: 340 45% 30%;
  --champagne: 38 50% 85%;
  --gold: 38 60% 55%;
  --cream: 30 25% 97%;
  --rose: 350 40% 75%;
  
  /* Typography */
  --font-display: 'Cormorant Garamond', serif;
  --font-body: 'Montserrat', sans-serif;
}
```

---

## Installation Instructions

1. Upload the `wordpress-theme` folder to `/wp-content/themes/`
2. Rename folder to `catherine-geller` (or your preferred name)
3. Activate theme in WordPress Admin → Appearance → Themes
4. Configure content in Appearance → Customize
5. Add tour dates, videos, projects via their respective menu items

---

## Notes for Developers

- All Tailwind classes have been converted to standard CSS
- Animations use CSS keyframes (no JS dependencies)
- Mobile menu uses vanilla JavaScript
- Forms can be connected to Contact Form 7 or WPForms
- SEO meta tags can be managed via Yoast or RankMath
