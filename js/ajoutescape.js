// =========================================================
// POPUP – Ajout / Fermeture
// =========================================================

// selection des elt pour le popup
const btnAjouter = document.getElementById("btnAjouter");
const overlay = document.getElementById("overlay");
const popup = document.getElementById("popup");
const closePopup = document.getElementById("closePopup");

// quand on clique sur le bouton "ajouter", ca ouvre le popup
btnAjouter.addEventListener("click", function(e) {
    e.preventDefault();

    // affiche le fond
    overlay.style.display = "block";
    // affiche le contenu
    popup.style.display = "block";

    // on ajoute la classe active legerement apres pour permettre l'animation CSS
    setTimeout(() => {
        popup.classList.add("active");
    }, 10);
});

// fonction pour fermer le popup
function fermerPopup() {
    overlay.style.display = "none";
    popup.style.display = "none";
    popup.classList.remove("active");
}

// quand on clique sur la croix du popup, ca ferme le popup
closePopup.addEventListener("click", fermerPopup);
overlay.addEventListener("click", fermerPopup);



document.addEventListener("DOMContentLoaded", function () {

    // Récupère l'input file (champ photo)
    const inputFile = document.querySelector('input[name="photoEscape"]');
    // Récupère la div qui affiche le texte "Choisir un fichier..."
    const texteChoix = document.getElementById("choixFichier");

    // Quand l'utilisateur sélectionne un fichier, l'événement "change" se déclenche
    inputFile.addEventListener("change", function () {
        // Vérifie qu'un fichier a bien été sélectionné
        if (this.files && this.files.length > 0) {
            // Remplace le texte par le nom du fichier sélectionné
            texteChoix.textContent = this.files[0].name;
        } else {
            // Si aucun fichier n'est sélectionné, on remet le texte par défaut
            texteChoix.textContent = "Choisir un fichier...";
        }
    });

});