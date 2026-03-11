document.addEventListener("DOMContentLoaded", () => {
    let idReservation = null;

    const popup = document.getElementById("popup");
    const overlay = document.getElementById("overlay");

    // Ouvrir le popup
    document.querySelectorAll(".btnSupprimer").forEach(btn => {
        btn.addEventListener("click", function() {
            idReservation = this.dataset.id;

            // Affiche le popup et l'overlay
            popup.style.display = "block";
            overlay.style.display = "block";

            // Vide la zone de texte
            document.getElementById("motif").value = "";
        });
    });

    // Fermer le popup
    document.getElementById("closePopup").addEventListener("click", () => {
        popup.style.display = "none";
        overlay.style.display = "none";
    });

    // Valider la suppression
    document.getElementById("validerSuppression").addEventListener("click", () => {
        popup.style.display = "none";
        overlay.style.display = "none";

        // Redirection vers le contrôleur sans mail
        window.location.href = `index.php?action=dashCalendrier&supprimer=${idReservation}`;
    });
});



// Récupère les éléments du DOM pour afficher le mois/année et les jours
const moisAnnee = document.getElementById("mois-annee");
const joursContainer = document.getElementById("jours");
// Récupère la date sélectionnée initialement dans l'input
const dateSelectionnee = document.getElementById("inputDate").value;

// Initialise la date actuelle
let date = new Date();

// Fonction principale : Génère le calendrier du mois courant
function genererCalendrier() {

    const annee = date.getFullYear(); // année courante
    const mois = date.getMonth(); // mois courant (0 = janvier)

    // Détermine le jour de la semaine du 1er jour du mois (0 = dimanche)
    const premierJour = new Date(annee, mois, 1).getDay();
    // Dernier jour du mois
    const dernierJour = new Date(annee, mois + 1, 0).getDate();

    // Noms des mois pour affichage
    const moisNoms = [
        "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
        "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
    ];

     // Affiche le mois et l'année dans le header
    moisAnnee.textContent = moisNoms[mois] + " " + annee;

    // Vide le conteneur des jours avant de générer le nouveau calendrier
    joursContainer.innerHTML = "";

    // Ajustement pour que la semaine commence le lundi
    let startDay = premierJour === 0 ? 6 : premierJour - 1;

    // Création des cases vides avant le premier jour du mois
    for (let i = 0; i < startDay; i++) {
        const vide = document.createElement("div");
        vide.classList.add("jour-cal", "vide");
        joursContainer.appendChild(vide);
    }

    // Génération des jours du mois
    for (let i = 1; i <= dernierJour; i++) {

        const jour = document.createElement("div");
        jour.classList.add("jour-cal");
        jour.textContent = i;

        const aujourdHui = new Date();

        // Si c'est le jour actuel, on ajoute la classe spéciale
        if (
            i === aujourdHui.getDate() &&
            mois === aujourdHui.getMonth() &&
            annee === aujourdHui.getFullYear()
        ) {
            jour.classList.add("jour-aujourdhui");
        }

        // Vérifier si c'est la date sélectionnée
        const jourSelect = String(i).padStart(2, '0');
        const moisSelect = String(mois + 1).padStart(2, '0');
        const dateComplete = annee + "-" + moisSelect + "-" + jourSelect;

        if (dateComplete === dateSelectionnee) {
            jour.classList.add("selectionne"); // met en surbrillance le jour sélectionné
        }

        // Ajoute un événement click sur chaque jour
        jour.addEventListener("click", () => {
            // Met à jour l'input caché avec la date sélectionnée
            document.getElementById("inputDate").value = dateComplete;
            // Soumet le formulaire pour filtrer/récupérer les données du calendrier
            document.querySelector("form").submit();

        });

        // Ajoute le jour au conteneur
        joursContainer.appendChild(jour);
    }
}

// Navigation mois précédent / suivant
document.getElementById("prev").onclick = () => {
    date.setMonth(date.getMonth() - 1); // recule d'un mois
    genererCalendrier(); // régénère le calendrier
}

document.getElementById("next").onclick = () => {
    date.setMonth(date.getMonth() + 1); // avance d'un mois
    genererCalendrier(); // régénère le calendrier
}

// Génération initiale du calendrier
genererCalendrier();