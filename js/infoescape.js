
const moisAnneeElt = document.getElementById('moisAnnee');
const grilleElt = document.getElementById('calendrier-grille');
const prevBtn = document.getElementById('prevMois');
const nextBtn = document.getElementById('nextMois');

let dateActuelle = new Date();

function genererCalendrier() {
    grilleElt.innerHTML = '';

    const mois = dateActuelle.getMonth();
    const annee = dateActuelle.getFullYear();
    const aujourdhui = new Date();
    aujourdhui.setHours(0, 0, 0, 0); // On réinitialise l'heure pour comparer uniquement les dates

    // Affichage titre (ex: Février 2026)
    const nomsMois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
    moisAnneeElt.innerText = `${nomsMois[mois]} ${annee}`;

    // Premier jour du mois (0 = Dimanche, 1 = Lundi...)
    let premierJour = new Date(annee, mois, 1).getDay();
    premierJour = premierJour === 0 ? 6 : premierJour - 1;

    const joursDansMois = new Date(annee, mois + 1, 0).getDate();

    // Ajouter les cases vides du début
    for (let i = 0; i < premierJour; i++) {
        const div = document.createElement('div');
        div.classList.add('jour-cal', 'vide');
        grilleElt.appendChild(div);
    }

    // Ajouter les vrais jours
    for (let jour = 1; jour <= joursDansMois; jour++) {
        const div = document.createElement('div');
        div.classList.add('jour-cal');
        div.innerText = jour;

        const dateDuJourBoucle = new Date(annee, mois, jour);

        // 1. Marquer le jour actuel (coloration du chiffre)
        if (jour === aujourdhui.getDate() && mois === aujourdhui.getMonth() && annee === aujourdhui.getFullYear()) {
            div.classList.add('jour-aujourdhui');
        }

        // 2. Bloquer les jours passés
        if (dateDuJourBoucle < aujourdhui) {
            div.style.opacity = "0.2";
            div.style.cursor = "not-allowed";
        } else {
            // Gérer le clic pour sélectionner (uniquement si ce n'est pas passé)
            div.onclick = () => {
                document.querySelectorAll('.jour-cal').forEach(el => el.classList.remove('selectionne'));
                div.classList.add('selectionne');
            };
        }

        grilleElt.appendChild(div);
    }
}

prevBtn.onclick = () => { dateActuelle.setMonth(dateActuelle.getMonth() - 1); genererCalendrier(); };
nextBtn.onclick = () => { dateActuelle.setMonth(dateActuelle.getMonth() + 1); genererCalendrier(); };

genererCalendrier();
