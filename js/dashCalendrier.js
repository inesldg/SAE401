const moisAnnee = document.getElementById("mois-annee");
const joursContainer = document.getElementById("jours");
const dateSelectionnee = document.getElementById("inputDate").value;

let date = new Date();

function genererCalendrier() {

    const annee = date.getFullYear();
    const mois = date.getMonth();

    const premierJour = new Date(annee, mois, 1).getDay();
    const dernierJour = new Date(annee, mois + 1, 0).getDate();

    const moisNoms = [
        "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
        "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
    ];

    moisAnnee.textContent = moisNoms[mois] + " " + annee;

    joursContainer.innerHTML = "";

    let startDay = premierJour === 0 ? 6 : premierJour - 1;

    for (let i = 0; i < startDay; i++) {
        const vide = document.createElement("div");
        vide.classList.add("jour-cal", "vide");
        joursContainer.appendChild(vide);
    }

    for (let i = 1; i <= dernierJour; i++) {

        const jour = document.createElement("div");
        jour.classList.add("jour-cal");
        jour.textContent = i;

        const aujourdHui = new Date();

        if (
            i === aujourdHui.getDate() &&
            mois === aujourdHui.getMonth() &&
            annee === aujourdHui.getFullYear()
        ) {
            jour.classList.add("jour-aujourdhui");
        }

        // 🔹 vérifier si c'est la date sélectionnée
        const jourSelect = String(i).padStart(2, '0');
        const moisSelect = String(mois + 1).padStart(2, '0');
        const dateComplete = annee + "-" + moisSelect + "-" + jourSelect;

        if (dateComplete === dateSelectionnee) {
            jour.classList.add("selectionne");
        }

        jour.addEventListener("click", () => {

            document.getElementById("inputDate").value = dateComplete;
            document.querySelector("form").submit();

        });

        joursContainer.appendChild(jour);
    }
}

document.getElementById("prev").onclick = () => {
    date.setMonth(date.getMonth() - 1);
    genererCalendrier();
}

document.getElementById("next").onclick = () => {
    date.setMonth(date.getMonth() + 1);
    genererCalendrier();
}

genererCalendrier();