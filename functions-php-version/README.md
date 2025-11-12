# Amarire Dev Smart Footer

A fully dynamic, multilingual, and adaptive WordPress footer designed to integrate seamlessly with any website. It intelligently detects page content, language, headings, and background colors to ensure perfect visibility and styling.  

---

## Features

1. **Dynamic Language Detection**
   - Automatically detects the dominant language on the page.
   - Supports multiple languages: English (en), French (fr), Arabic (ar), Spanish (es), German (de), Italian (it), Portuguese (pt), Russian (ru), Chinese (zh), Japanese (ja), Korean (ko), Hindi (hi).
   - Translates footer texts accordingly:
     - Rights reserved message (`All rights reserved`).
     - Built by text (`Built by`).

2. **Adaptive Colors**
   - Automatically matches the footer text color with the main page headings (`H1-H6`).
   - Ensures contrast against the background for visibility.
   - Automatically adjusts link colors with slightly bold font.
   - Footer top border color adapts to background for subtle separation.

3. **Responsive & Centered**
   - Footer is always centered, regardless of text direction (LTR or RTL).
   - Supports all screen sizes and ensures proper alignment.

4. **Delayed Display for Animations**
   - Waits 3 seconds after reaching the bottom of the page before showing the footer.
   - Ensures all dynamic content or animations are fully loaded.
   - Works with short pages, keeping footer at the bottom.

5. **Persistent Scroll Restoration**
   - Stores user's scroll position before page unload.
   - Restores scroll position on reload to ensure proper footer evaluation.

6. **Dynamic Page Observation**
   - Monitors DOM changes dynamically (AJAX content, animations, delayed loading).
   - Re-evaluates language, colors, and visibility automatically.

7. **Cross-browser Compatible**
   - Tested with modern browsers.
   - Smooth transition animations for fade-in and slide effects.

---

## Installation

1. Add the following PHP function to your WordPress theme's `functions.php`:

## Paste the complete amariredev_smart_footer function (from the provided code) into functions.php.

The footer will automatically appear on all pages.

Usage

Automatic Setup: No need to modify any HTML. Footer detects page headings, background colors, and dominant language.

Customization: You can adjust transition duration, delay time, or add custom styles in the <style> block inside the function.

Dynamic Content Ready: Works seamlessly with pages that load content dynamically or use animations.

Supported Languages
Code	Language
en	English
fr	French
ar	Arabic
es	Spanish
de	German
it	Italian
pt	Portuguese
ru	Russian
zh	Chinese
ja	Japanese
ko	Korean
hi	Hindi
Notes

Ensures contrast between text and background for readability.

Footer top border always matches text color with low opacity for subtlety.

Works with LTR and RTL layouts.

Designed to integrate with any theme without overriding existing styles.

Maintains SEO integrity as content is dynamically generated but still visible in DOM.

License

This code is provided by Amarire Dev. You can freely use it on personal or commercial projects, but credit is appreciated.

Author

Amarire Dev
https://amarire.dev
