/**
 * Script principal des traductions.
 * Utilise l'objet window.trad construit par les scripts js/traduction/trad*.js
 */
function appliquerTraduction() {
    const trad = window.trad || {};
    const langueActuelle = localStorage.getItem("langue") || "fr";

    const htmlEl = document.querySelector("html");
    if (htmlEl) htmlEl.lang = langueActuelle;

    // --- TRADUCTION DES BULLES D'ERREUR ---
    Object.keys(trad).forEach(cleError => {
        if (cleError.endsWith("_error")) {
            const idInput = cleError.replace("_error", "");
            const inputElement = document.querySelector(idInput);

            if (inputElement) {
                const message = trad[cleError][langueActuelle];

                inputElement.addEventListener("invalid", function (e) {
                    e.target.setCustomValidity("");
                    if (!e.target.validity.valid) {
                        e.target.setCustomValidity(message);
                    }
                }, false);

                inputElement.addEventListener("input", function (e) {
                    e.target.setCustomValidity("");
                }, false);
            }
        }
    });

    Object.entries(trad).forEach(([selecteur, donnee]) => {
        const elements = document.querySelectorAll(selecteur);

        if (elements.length > 0) {
            elements.forEach(element => {
                const texte = donnee[langueActuelle];

                if (element.placeholder !== undefined) {
                    element.placeholder = texte;
                }
                if (element.tagName !== 'INPUT' && element.tagName !== 'TEXTAREA') {
                    element.innerHTML = texte;
                }
            });
        }
        // Pas de warning : chaque page ne contient qu'un sous-ensemble des sélecteurs
    });
}

document.addEventListener("DOMContentLoaded", () => {
    const btnFr = document.querySelector('.lang-switcher button[data-langue="fr"]');
    const btnEn = document.querySelector('.lang-switcher button[data-langue="en"]');
    const btnDe = document.querySelector('.lang-switcher button[data-langue="de"]');

    function toggleVisual(langue) {
        if (btnFr && btnEn && btnDe) {
            btnFr.classList.remove('active');
            btnEn.classList.remove('active');
            btnDe.classList.remove('active');
            const btn = langue === 'en' ? btnEn : (langue === 'de' ? btnDe : btnFr);
            if (btn) btn.classList.add('active');
        }
    }

    const currentLang = localStorage.getItem("langue") || "fr";
    toggleVisual(currentLang);
    appliquerTraduction();

    if (btnFr && btnEn) {
        btnFr.addEventListener("click", () => {
            localStorage.setItem("langue", "fr");
            toggleVisual("fr");
            appliquerTraduction();
        });

        btnEn.addEventListener("click", () => {
            localStorage.setItem("langue", "en");
            toggleVisual("en");
            appliquerTraduction();
        });

        btnDe.addEventListener("click", () => {
            localStorage.setItem("langue", "de");
            toggleVisual("de");
            appliquerTraduction();
        });
    }
});

// animation scroll
window.addEventListener('load', () => {
    const observerOptions = { threshold: 0.15 };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('reveal-visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const items = document.querySelectorAll('.reveal');
    items.forEach(item => observer.observe(item));
});

// bouton burger menu
document.addEventListener('DOMContentLoaded', () => {
    const burgerBtn = document.getElementById('burgerBtn');
    const navMenu = document.getElementById('navMenu');

    if (burgerBtn && navMenu) {
        burgerBtn.addEventListener('click', () => {
            burgerBtn.classList.toggle('active');
            navMenu.classList.toggle('active');
        });

        const navLinks = document.querySelectorAll('.nav-menu a');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                burgerBtn.classList.remove('active');
                navMenu.classList.remove('active');
            });
        });
    }
});
