function amariredev_smart_footer() {
    $site_name = get_bloginfo('name');
    if (!$site_name) {
        $host = parse_url(home_url(), PHP_URL_HOST);
        $parts = explode('.', $host);
        $site_name = ucfirst($parts[0]);
    }
    $site_url = home_url('/');
    $year = date('Y');
    ?>
    <div id="amariredev-footer" class="amariredev-footer">
        <p>
            <span data-i18n="rights">All rights reserved</span> © <?php echo esc_html($year); ?> 
            <a href="<?php echo esc_url($site_url); ?>" class="footer-site-name" target="_blank" rel="noopener">
                <?php echo esc_html($site_name); ?>
            </a> |
            <span data-i18n="builtby">Built by</span>
            <a href="https://amarire.dev" target="_blank" rel="noopener">Amarire Dev</a>
        </p>
    </div>

    <style>
    .amariredev-footer {
        display: block;
        margin: 0 auto;
        text-align: center;
        padding: 14px 20px 0px 20px;
        font-size: 14px;
        font-weight: 500;
        font-family: "Arial", sans-serif;
        border-top: 1px solid rgba(0,0,0,0.08);
        transition: all 0.6s ease-in-out;
        max-width: 100%;
        box-sizing: border-box;
        opacity: 0;
        transform: translateY(30px);
    }
    .amariredev-footer.visible {
        opacity: 1;
        transform: translateY(0);
    }
    .amariredev-footer a {
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease-in-out, filter 0.3s ease-in-out;
    }
    .amariredev-footer a:hover {
        text-decoration: underline;
        filter: brightness(1.2);
    }
    </style>

    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const footer = document.getElementById("amariredev-footer");
        if (!footer) return;

        const translations = {
            en:{rights:"All rights reserved",builtby:"Built by"},
            fr:{rights:"Tous droits réservés",builtby:"Créé par"},
            ar:{rights:"جميع الحقوق محفوظة",builtby:"تم الإنشاء بواسطة"},
            es:{rights:"Todos los derechos reservados",builtby:"Creado por"},
            de:{rights:"Alle Rechte vorbehalten",builtby:"Erstellt von"},
            it:{rights:"Tutti i diritti riservati",builtby:"Creato da"},
            pt:{rights:"Todos os direitos reservados",builtby:"Construído por"},
            ru:{rights:"Все права защищены",builtby:"Создано"},
            zh:{rights:"版权所有",builtby:"创建者"},
            ja:{rights:"全著作権所有",builtby:"作成者"},
            ko:{rights:"모든 권리 보유",builtby:"제작자"},
            hi:{rights:"सर्वाधिकार सुरक्षित",builtby:"द्वारा निर्मित"}
        };

        const detectDominantLanguage = () => {
            const text = document.body.innerText.toLowerCase();
            const counts = {en:0,fr:0,ar:0,es:0,de:0,it:0,pt:0,ru:0,zh:0,ja:0,ko:0,hi:0};
            const patterns = {
                ar:/[\u0600-\u06FF]/g, ru:/[\u0400-\u04FF]/g, zh:/[\u4e00-\u9fff]/g,
                ja:/[\u3040-\u30ff\u31f0-\u31ff]/g, ko:/[\uac00-\ud7af]/g, hi:/[\u0900-\u097F]/g,
                en:/\b(the|and|of|to|in|for|with|on|is)\b/g,
                fr:/\b(le|la|et|des|une|pour|avec|sur|que|qui)\b/g,
                es:/\b(el|la|los|una|para|con|del|que|y)\b/g,
                de:/\b(das|der|und|die|ein|ist|nicht|mit)\b/g,
                it:/\b(il|la|gli|con|per|una|che)\b/g,
                pt:/\b(o|a|os|as|com|para|que)\b/g
            };
            for (const [lang, regex] of Object.entries(patterns)) {
                const match = text.match(regex);
                counts[lang] = match ? match.length : 0;
            }
            return Object.entries(counts).reduce((a,b)=>b[1]>a[1]?b:a)[0];
        };

        const detectColors = () => {
            const main = document.querySelector("main") || document.body;
            const bg = getComputedStyle(main).backgroundColor || "#fff";
            let headingColor = null;
            for(let i=1;i<=6;i++){
                const h = main.querySelector("h"+i) || document.body.querySelector("h"+i);
                if(h){ headingColor = getComputedStyle(h).color; break; }
            }
            let textColor = headingColor || getComputedStyle(main).color || "#222";
            const brightness = clr=>{
                const rgb=clr.match(/\d+/g); if(!rgb) return 255;
                return (rgb[0]*299+rgb[1]*587+rgb[2]*114)/1000;
            };
            const bgBright=brightness(bg), txtBright=brightness(textColor);
            if(Math.abs(bgBright-txtBright)<50)
                textColor = bgBright>128?"#000":"#fff";
            const borderColor = bgBright>128?"rgba(0,0,0,0.2)":"rgba(255,255,255,0.2)";
            return {bg,color:textColor,border:borderColor};
        };

        const applyAll = ()=>{
            const lang = detectDominantLanguage();
            footer.querySelectorAll("[data-i18n]").forEach(el=>{
                const key = el.getAttribute("data-i18n");
                el.textContent = translations[lang]?.[key] || translations.en[key];
            });
            footer.style.direction = ["ar","he","fa"].includes(lang)?"rtl":"ltr";
            const {bg,color,border} = detectColors();
            footer.style.backgroundColor = bg;
            footer.style.color = color;
            footer.style.borderTop = `1px solid ${border}`;
            footer.querySelectorAll("a").forEach(a=>{
                a.style.color=color;
                a.style.fontWeight="600";
            });
            footer.classList.add("visible");
        };

        window.addEventListener("beforeunload", ()=> localStorage.setItem("scrollPos", window.scrollY));
        window.addEventListener("load", ()=>{
            const pos = localStorage.getItem("scrollPos");
            if(pos){ window.scrollTo(0, parseInt(pos)); localStorage.removeItem("scrollPos"); }
        });

        const observer = new IntersectionObserver(entries=>{
            if(entries[0].isIntersecting){ applyAll(); observer.disconnect(); }
        },{threshold:0.3});
        observer.observe(footer);

        window.addEventListener("scroll", ()=>{
            if((window.innerHeight + window.scrollY) >= document.body.offsetHeight-50){
                applyAll();
            }
        });
    });
    </script>
    <?php
}
add_action('wp_footer','amariredev_smart_footer',9999);
