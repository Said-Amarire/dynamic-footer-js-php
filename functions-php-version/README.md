# Amarire Dev Smart Footer

A fully dynamic, multilingual, and adaptive WordPress footer designed to integrate seamlessly with any website. It intelligently detects page content, dominant language, headings, and background colors to ensure perfect visibility and styling.  

---

## Features

1. **Dynamic Language Detection**
   - Automatically detects the dominant language on the page.
   - Supports multiple languages: English, French, Arabic, Spanish, German, Italian, Portuguese, Russian, Chinese, Japanese, Korean, Hindi.
   - Translates footer texts accordingly:
     - Rights reserved message.
     - Built by text.
   - Works even if multiple languages exist on the same page by detecting the most frequently used one.

2. **Adaptive Colors**
   - Matches the footer text color with the first available heading (H1-H6).
   - Ensures readability against the background by dynamically adjusting text color if it is too similar to the background.
   - Links are slightly bolder than normal text for distinction, but inherit the text color for consistency.
   - Footer top border color adapts automatically to maintain subtle separation from content.

3. **Responsive & Centered**
   - Footer is always horizontally centered, regardless of page direction (LTR or RTL).
   - Works with short pages by sticking to the bottom if the page height is smaller than the viewport.
   - Fully responsive on all devices and screen sizes.

4. **Delayed Display for Dynamic Content**
   - Waits 3–4 seconds after full page load or reaching the bottom before showing the footer.
   - Ensures animations, lazy-loaded content, or AJAX-loaded sections are fully rendered.
   - Smooth fade-in and slide-up animation.

5. **Persistent Scroll Restoration**
   - Saves the user's scroll position before page reload.
   - Restores the scroll position after reload to ensure footer is evaluated correctly.
   - Works even with dynamically loaded content.

6. **Dynamic Page Observation**
   - Observes DOM changes for dynamic content updates.
   - Re-evaluates colors, language, and visibility automatically.
   - Ensures correct footer display in pages with delayed content or animations.

7. **Cross-browser Compatible**
   - Tested with modern browsers.
   - Smooth CSS transitions for opacity and position changes.

---

## Limitations / Known Issues

- **SEO Considerations:** Footer content is dynamically generated via JavaScript; it may not be fully indexed by some search engines unless they render JavaScript.
- **Performance on Very Large Pages:** Pages with very heavy DOM or numerous animations might slightly delay the footer rendering, but a fallback ensures it appears at the bottom eventually.
- **Short Page Handling:** On extremely short pages, footer sticks to bottom; this may affect users expecting the footer immediately visible on top of content.
- **Color Detection Accuracy:** While it intelligently picks heading colors and contrasts with background, unusual CSS (e.g., gradients, transparent backgrounds, or dynamically changing themes) may cause suboptimal color detection.
- **Third-party Animation Plugins:** Heavy animation libraries that manipulate the DOM after page load may slightly delay footer detection and rendering.
- **JavaScript Disabled:** Users with JavaScript disabled will not see the dynamic language detection or adaptive color features.

---

## Installation

1. Integrate the footer function into your WordPress theme (typically `functions.php`).
2. The footer will automatically appear on all pages without modifying HTML.
3. No additional setup is required for multiple languages or color adaptation.

---

## Usage Notes

- Fully automatic; no manual configuration needed.
- Works with pages containing animations, AJAX content, or dynamically loaded sections.
- Maintains footer centered regardless of text direction.
- Text and link colors adapt intelligently to page headings and background.
- Fade-in animation ensures smooth appearance after delay, guaranteeing all content is loaded.

---

## Supported Languages

| Language   |
|-----------|
| English   |
| French    |
| Arabic    |
| Spanish   |
| German    |
| Italian   |
| Portuguese|
| Russian   |
| Chinese   |
| Japanese  |
| Korean    |
| Hindi     |

---

## Author

**Amarire Dev**  
[https://amarire.dev](https://amarire.dev)

---

## License

Provided by **Amarire Dev**. Free for personal or commercial use. Credit is appreciated.
