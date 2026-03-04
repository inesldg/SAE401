// On récupère les éléments HTML nécessaires
const moisAnneeElt = document.getElementById('moisAnnee'); // zone où s'affiche "Mois Année"
const grilleElt = document.getElementById('calendrier-grille'); // grille du calendrier (jours)
const prevBtn = document.getElementById('prevMois'); // bouton mois précédent
const nextBtn = document.getElementById('nextMois'); // bouton mois suivant

// Date actuelle utilisée pour afficher le calendrier
let dateActuelle = new Date();

let jourDemande = null;
let horaireDemande = null;
let nbrPersonnes = null;

// Fonction principale qui génère le calendrier
function genererCalendrier() {

    // On vide la grille à chaque génération pour éviter les doublons
    grilleElt.innerHTML = '';

    // On récupère le mois et l'année actuels
    const mois = dateActuelle.getMonth(); // 0 = janvier, 1 = février...
    const annee = dateActuelle.getFullYear();

    // On récupère la date du jour
    const aujourdhui = new Date();

    // On met l'heure à 00:00:00 pour comparer uniquement les dates (sans heures)
    aujourdhui.setHours(0, 0, 0, 0);

    // Tableau avec les noms des mois pour affichage
    const nomsMois = [
        "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
        "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
    ];

    // Affiche le mois et l'année en haut du calendrier
    moisAnneeElt.innerText = `${nomsMois[mois]} ${annee}`;

    // Trouver le premier jour du mois (0 = dimanche, 1 = lundi...)
    let premierJour = new Date(annee, mois, 1).getDay();

    // On adapte pour que lundi = 0 et dimanche = 6 (format calendrier FR)
    premierJour = premierJour === 0 ? 6 : premierJour - 1;

    // Nombre de jours dans le mois
    const joursDansMois = new Date(annee, mois + 1, 0).getDate();

    // =============================
    // Ajouter les cases vides au début
    // =============================
    for (let i = 0; i < premierJour; i++) {
        const div = document.createElement('div'); // création d'une case vide
        div.classList.add('jour-cal', 'vide'); // classe vide pour style CSS
        grilleElt.appendChild(div); // ajout dans la grille
    }

    // =============================
    // Ajouter les vrais jours du mois
    // =============================
    for (let jour = 1; jour <= joursDansMois; jour++) {

        const div = document.createElement('div'); // création d'une case jour
        div.classList.add('jour-cal'); // classe principale pour le style
        div.innerText = jour; // affiche le numéro du jour

        //-----------------------------------------------
        div.dataset.jour = jour; // ajoute le numéro du jour dans un dataset pour pouvoir le récupérer
        // console.log(div.dataset.jour);
        //-----------------------------------------------

        // Date précise du jour dans la boucle
        const dateDuJourBoucle = new Date(annee, mois, jour);

        // =============================
        // 1. Mettre en évidence aujourd'hui
        // =============================
        if (
            jour === aujourdhui.getDate() &&
            mois === aujourdhui.getMonth() &&
            annee === aujourdhui.getFullYear()
        ) {
            // Ajoute une classe spéciale pour le style CSS
            div.classList.add('jour-aujourdhui');
        }

        // =============================
        // 2. Bloquer les jours passés
        // =============================
        if (dateDuJourBoucle < aujourdhui) {
            // Si la date est passée → on grise et bloque le clic
            div.style.opacity = "0.2";
            div.style.cursor = "not-allowed";
        } else {
            // =============================
            // 3. Sélection d'un jour (clic)
            // =============================
            div.onclick = () => {

                // On enlève la sélection sur tous les jours
                document.querySelectorAll('.jour-cal').forEach(el =>
                    el.classList.remove('selectionne')
                );

                // On ajoute la sélection sur le jour cliqué
                div.classList.add('selectionne');
                
                //-----------------------------------------------
                jourDemande = div.dataset.jour; // ajoute la valeur du jour cliqué dans la variable
                // console.log(jourDemande);
                //-----------------------------------------------
            };
        }

        // On ajoute le jour dans la grille
        grilleElt.appendChild(div);
    }
}

// =============================
// Bouton mois précédent
// =============================
prevBtn.onclick = () => {
    // On enlève 1 mois à la date actuelle
    dateActuelle.setMonth(dateActuelle.getMonth() - 1);

    // On régénère le calendrier
    genererCalendrier();
};

// =============================
// Bouton mois suivant
// =============================
nextBtn.onclick = () => {
    // On ajoute 1 mois
    dateActuelle.setMonth(dateActuelle.getMonth() + 1);

    // On régénère
    genererCalendrier();
};

// =============================
// Génération initiale au chargement
// =============================
genererCalendrier();
