# Mike Collins Comedy - WordPress Theme

## React to WordPress Mapping

| React Component | WordPress Template | Content Source |
|----------------|-------------------|----------------|
| `Navigation.tsx` | `header.php` | Theme Customizer + Nav Menus |
| `Hero.tsx` | `template-parts/section-hero.php` | Theme Customizer |
| `About.tsx` | `template-parts/section-about.php` | Theme Customizer |
| `Shows.tsx` | `template-parts/section-shows.php` | Custom Post Type: `show` |
| `Videos.tsx` | `template-parts/section-videos.php` | Custom Post Type: `video` |
| `Contact.tsx` | `template-parts/section-contact.php` | Theme Customizer |
| `Footer.tsx` | `footer.php` | Theme Customizer |

## Installation

1. Download the `wordpress-theme` folder
2. Rename it to `mikecollins-comedy`
3. Upload to `wp-content/themes/`
4. Activate in WordPress Admin → Appearance → Themes

## Customization

- **Appearance → Customize**: Edit comedian name, hero text, about section, contact info, social links
- **Shows**: Add/manage show dates from admin sidebar
- **Videos**: Add/manage video clips with YouTube/Vimeo URLs
- **Menus**: Create navigation menus under Appearance → Menus

## File Structure

```
wordpress-theme/
├── style.css              # Theme info + all styles
├── functions.php          # Theme setup, CPTs, customizer
├── header.php             # Site header + navigation
├── footer.php             # Site footer
├── front-page.php         # Homepage template
├── index.php              # Fallback template
├── template-parts/
│   ├── section-hero.php
│   ├── section-about.php
│   ├── section-shows.php
│   ├── section-videos.php
│   └── section-contact.php
└── assets/
    ├── js/main.js
    └── images/hero-comedian.jpg  # Add your hero image
```
