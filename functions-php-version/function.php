function amariredev_smart_footer() {
    $site_name = get_bloginfo('name');

    if (!$site_name) {
        $host = parse_url(home_url(), PHP_URL_HOST);
        $parts = explode('.', $host);
        $site_name = $parts[0];
    }

    $site_url  = home_url('/');
    $year = date('Y');
    ?>
    <div id="amariredev-footer" class="amariredev-footer">
        <p>
            &copy; <?php echo esc_html($year); ?> 
            <a href="<?php echo esc_url($site_url); ?>" class="footer-site-name" target="_blank" rel="noopener">
                <?php echo esc_html($site_name); ?>
            </a>.
            <span data-i18n="rights">All rights reserved</span> |
            <span data-i18n="builtby">Built by</span> 
            <a href="https://amarire.dev" target="_blank" rel="noopener">Amarire Dev</a>
        </p>
    </div>

    <style>
    .amariredev-footer {
        text-align: center;
        padding: 14px 20px;
        font-size: 14px;
        font-weight: 500;
        font-family: "Arial", sans-serif;
        transition: all 0.5s ease-in-out;
        border-top: 1px solid rgba(0,0,0,0.1);
    }
    .amariredev-footer a {
        text-decoration: none;
        font-weight: 700;
        transition: color 0.3s ease-in-out;
    }
    .amariredev-footer a:hover {
        text-decoration: underline;
        filter: brightness(1.2);
    }
    </style>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const footer = document.getElementById("amariredev-footer");
        if (!footer) return;

        const translations = {
            en: { rights: "All rights reserved", builtby: "Built by" },
            fr: { rights: "Tous droits réservés", builtby: "Créé par" },
            ar: { rights: "جميع الحقوق محفوظة", builtby: "تم الإنشاء بواسطة" },
            es: { rights: "Todos los derechos reservados", builtby: "Creado por" },
            de: { rights: "Alle Rechte vorbehalten", builtby: "Erstellt von" },
            it: { rights: "Tutti i diritti riservati", builtby: "Creato da" },
            pt: { rights: "Todos os direitos reservados", builtby: "Construído por" }
        };

        function detectPageLanguage() {
            const langAttr = document.documentElement.lang?.toLowerCase().trim();
            if (langAttr && translations[langAttr]) return langAttr;

            const text = document.body.innerText.toLowerCase();
            const detectors = {
                ar: /[\u0600-\u06FF]/,
                fr: /\b(le|la|et|des|une|pour|avec|sur)\b/,
                es: /\b(el|la|los|una|para|con|del)\b/,
                de: /\b(das|der|und|die|ein|ist)\b/,
                it: /\b(il|la|gli|con|per|una)\b/,
                pt: /\b(o|a|os|as|com|para)\b/
            };

            for (const [lang, regex] of Object.entries(detectors)) {
                if (regex.test(text)) return lang;
            }
            return "en";
        }

        const detectedLang = detectPageLanguage();
        footer.querySelectorAll("[data-i18n]").forEach(el => {
            const key = el.getAttribute("data-i18n");
            const value = translations[detectedLang]?.[key] || translations.en[key];
            el.textContent = value;
        });

        if (detectedLang === "ar") {
            footer.style.direction = "rtl";
            footer.style.textAlign = "right";
        } else {
            footer.style.direction = "ltr";
            footer.style.textAlign = "center";
        }

        function getAverageColor(element) {
            const styles = window.getComputedStyle(element);
            return {
                bg: styles.backgroundColor,
                color: styles.color
            };
        }

        let mainElement = document.querySelector("main") || document.body;
        let { bg, color } = getAverageColor(mainElement);

        if (!bg || bg === "rgba(0, 0, 0, 0)" || bg === "transparent") {
            const header = document.querySelector("header");
            if (header) bg = window.getComputedStyle(header).backgroundColor;
        }

        footer.style.backgroundColor = bg || "#f5f5f5";
        footer.style.color = color || "#222";

        const brightness = (clr) => {
            const rgb = clr.match(/\d+/g);
            if (!rgb) return 255;
            return (parseInt(rgb[0])*299 + parseInt(rgb[1])*587 + parseInt(rgb[2])*114) / 1000;
        };

        const linkColor = brightness(bg) < 128 ? "#4da3ff" : "#0073e6";
        footer.querySelectorAll("a").forEach(a => a.style.color = linkColor);
    });
    </script>
    <?php
}
add_action('wp_footer', 'amariredev_smart_footer', 9999);
