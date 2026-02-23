
const btnAjouter = document.getElementById("btnAjouter");
const overlay = document.getElementById("overlay");
const popup = document.getElementById("popup");
const closePopup = document.getElementById("closePopup");

btnAjouter.addEventListener("click", function(e) {
    e.preventDefault();
    overlay.style.display = "block";
    popup.style.display = "block";
    setTimeout(() => {
        popup.classList.add("active");
    }, 10);
});

function fermerPopup() {
    overlay.style.display = "none";
    popup.style.display = "none";
    popup.classList.remove("active");
}

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