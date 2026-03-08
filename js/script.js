// const header = document.querySelector("header");

// window.addEventListener("scroll", () => {
//     header.classList.toggle("sticky", window.scrollY > 70);
// });

// Animation de header fait en vibe coding 
const header = document.querySelector('header');

if (header) {
  const HEADER_MAX_HEIGHT = 100;
  const HEADER_MIN_HEIGHT = 60;
  // Hauteur = 60 quand scrollY >= (100 - 60) * 7 = 280 (formule continue, pas de seuil magique)
  function headerHeightFromScroll(scrollY) {
    const h = HEADER_MAX_HEIGHT - scrollY / 7;
    return Math.max(HEADER_MIN_HEIGHT, Math.min(HEADER_MAX_HEIGHT, h));
  }

  let ticking = false;
  let lastHeight = -1;
  function updateHeaderHeight() {
    const raw = headerHeightFromScroll(window.scrollY);
    const newHeight = Math.round(raw);
    if (newHeight !== lastHeight) {
      lastHeight = newHeight;
      header.style.height = `${newHeight}px`;
    }
    ticking = false;
  }

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

// Menu burger -- A COMPLETER
// const burgerBtn = document.querySelector('.nav_burger');
// const navMenu = document.querySelector('.nav_menu');
// const navLinks = document.querySelectorAll('.nav_link');

// if (burgerBtn && navMenu) {
//   burgerBtn.addEventListener('click', function () {
//     burgerBtn.classList.toggle('active');
//     navMenu.classList.toggle('active');
//   });

//   // Fermer le menu quand on clique sur un lien
//   navLinks.forEach(link => {
//     link.addEventListener('click', function () {
//       burgerBtn.classList.remove('active');
//       navMenu.classList.remove('active');
//     });
//   });
// }