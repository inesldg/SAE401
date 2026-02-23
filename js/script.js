// const header = document.querySelector("header");

// window.addEventListener("scroll", () => {
//     header.classList.toggle("sticky", window.scrollY > 70);
// });

const header = document.querySelector('header');

window.addEventListener('scroll', function (e) {

  let scroll = this.scrollY;
  if (scroll > 254 && header.clientHeight > 60) {
    header.style.height = `60px`;
    return;
  }
  if (scroll > 254) return;

  const defaultHeight = 100;

  let newHeight = defaultHeight - scroll / 7;
  if (newHeight < 60) newHeight = 60;
  header.style.height = `${newHeight}px`;

});



// Fonction pour retourner tout en hauuuuuut

const backToTopBtn = document.querySelector('.back-to-top');

if (backToTopBtn) {
  // Afficher/masquer le bouton selon le scroll
  window.addEventListener('scroll', function () {
    if (window.scrollY > 300) {
      backToTopBtn.classList.add('show');
    } else {
      backToTopBtn.classList.remove('show');
    }
  });

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