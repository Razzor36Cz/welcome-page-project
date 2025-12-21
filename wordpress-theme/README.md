# Jaganos AI WordPress Theme

A luxury black and brushed aluminum one-page portfolio theme with multi-language support.

## Theme Features

- **One-Page Design**: Beautiful single-page layout with smooth scroll navigation
- **Custom Post Types**: Videos and Music post types for portfolio content
- **Customizer Integration**: Extensive theme options via WordPress Customizer
- **Multi-Language Ready**: Built-in support for WPML, Polylang, or custom translations
- **Responsive Design**: Fully mobile-optimized layout
- **Custom Widgets**: Footer widget areas for flexible content
- **SEO Optimized**: Semantic HTML5 structure with proper heading hierarchy

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher

## Installation

1. Download the `wordpress-theme` folder
2. Rename it to `jaganos-ai`
3. Upload to `/wp-content/themes/` directory
4. Activate the theme in WordPress Admin → Appearance → Themes
5. Navigate to Appearance → Customize to configure theme options

## Theme Structure

```
jaganos-ai/
├── assets/
│   ├── css/
│   │   └── editor-style.css (create for Gutenberg editor styles)
│   └── js/
│       └── main.js
├── inc/
│   └── customizer.php
├── template-parts/
│   ├── content.php
│   ├── content-music.php
│   ├── content-none.php
│   └── content-video.php
├── 404.php
├── archive.php
├── comments.php
├── footer.php
├── functions.php
├── header.php
├── index.php
├── page.php
├── screenshot.png
├── search.php
├── searchform.php
├── sidebar.php
├── single.php
├── single-jaganos_music.php
├── single-jaganos_video.php
└── style.css
```

## Customizer Options

Navigate to **Appearance → Customize** to access:

### Hero Section
- Hero Video URL (MP4)
- Hero Background Image
- Hero Title
- Hero Subtitle
- CTA Button Text & URL

### Theme Colors
- Primary Color
- Background Color
- Accent Color

### Social Links
- Twitter/X URL
- Instagram URL
- YouTube URL
- Contact Email

### Footer Settings
- Footer Description
- Show/Hide Theme Credits

## Custom Post Types

### Videos (`jaganos_video`)
Add portfolio videos with:
- Featured Image (thumbnail)
- Content (description)
- Custom field: `jaganos_video_url` for video embeds

### Music (`jaganos_music`)
Add music tracks with:
- Featured Image (album cover)
- Content (description)
- Custom field: `jaganos_audio_url` for audio files
- Custom field: `jaganos_music_embed` for Spotify/SoundCloud embeds

## Menus

Register menus at **Appearance → Menus**:
- **Primary Menu**: Main navigation in header
- **Footer Menu**: Links in footer area

## Widget Areas

Configure widgets at **Appearance → Widgets**:
- Footer Widget 1
- Footer Widget 2
- Footer Widget 3
- Sidebar (for blog pages)

## Multi-Language Setup

### With Polylang or WPML
The theme automatically detects and displays the language switcher.

### Manual Setup
Languages supported by default: EN, FR, DE, CZ, PL

Create translation files in `/languages/` folder:
- `jaganos-ai-fr_FR.po`
- `jaganos-ai-de_DE.po`
- etc.

## Creating Content

### Homepage Sections
The one-page homepage pulls content from:
1. **About Section**: Create a page with slug `about`
2. **Videos Section**: Add posts to "Videos" post type
3. **Music Section**: Add posts to "Music" post type
4. **Prompt Section**: Create a page with slug `prompt`

### Setting Up Navigation
For anchor links to work on the homepage:
1. Go to Appearance → Menus
2. Add custom links with URLs: `#hero`, `#about`, `#videos`, `#music`, `#prompt`

## Development

### CSS Variables
The theme uses CSS custom properties for theming:

```css
:root {
    --color-background: hsl(0, 0%, 5%);
    --color-foreground: hsl(0, 0%, 95%);
    --color-primary: hsl(0, 0%, 75%);
    --aluminum: hsl(0, 0%, 78%);
    /* ... more variables in style.css */
}
```

### JavaScript
Main JavaScript file located at `/assets/js/main.js` handles:
- Smooth scrolling for anchor links
- Mobile menu toggle
- Scroll animations (fade-in effects)

## Changelog

### Version 1.0.0
- Initial release
- One-page portfolio layout
- Videos and Music custom post types
- Full Customizer integration
- Multi-language support
- Responsive design

## License

GNU General Public License v2 or later
http://www.gnu.org/licenses/gpl-2.0.html

## Credits

- Fonts: [Google Fonts](https://fonts.google.com) - Inter, Playfair Display
- Icons: SVG icons included

---

**Theme Author**: Jaganos AI
**Theme URI**: https://jaganos.ai
