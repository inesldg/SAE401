// =========================================================
// ANIMATION DU HEADER – effet de "vibe coding"
// =========================================================
const header = document.querySelector('header');

if (header) {
  const HEADER_MAX_HEIGHT = 100; 
  // hauteur max du header
  const HEADER_MIN_HEIGHT = 60;
  // hauteur min du header


  // Hauteur = 60 quand scrollY >= (100 - 60) * 7 = 280 (formule continue, le header diminue progressivement, pas de saut)
  // calcule la hauteur du header en fct du scroll
  function headerHeightFromScroll(scrollY) {
    const h = HEADER_MAX_HEIGHT - scrollY / 7;
    return Math.max(HEADER_MIN_HEIGHT, Math.min(HEADER_MAX_HEIGHT, h));
  }

  let ticking = false;
  let lastHeight = -1; 
  // pour ne pas appliquer inutilement la meme hauteur

  function updateHeaderHeight() {
    const raw = headerHeightFromScroll(window.scrollY);
    const newHeight = Math.round(raw);
    // arrondi
    if (newHeight !== lastHeight) {
      lastHeight = newHeight;
      header.style.height = `${newHeight}px`;
    }
    ticking = false;
    // reset pour permettre le prochain refresh
  }

  // optimisation (ecoute du scroll)
  window.addEventListener('scroll', function () {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(updateHeaderHeight);
  }, { passive: true });

  // Éviter un saut au chargement : appliquer la hauteur une première fois
  updateHeaderHeight();
}



// Fonction pour retourner tout en hauuuuuut

const backToTopBtn = document.querySelector('.back-to-top');

if (backToTopBtn) {
  // Afficher/masquer le bouton selon le scroll (passive = meilleure fluidité)
  window.addEventListener('scroll', function () {
    if (window.scrollY > 300) {
      backToTopBtn.classList.add('show');
    } else {
      backToTopBtn.classList.remove('show');
    }
  }, { passive: true });

  // Smooth scroll vers le haut au clic
  backToTopBtn.addEventListener('click', function (e) {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
}