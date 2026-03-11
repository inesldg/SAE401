/**
 * Panier - Validation du formulaire de paiement (démo)
 * - Numéro de carte : uniquement des chiffres, format 13 à 19 chiffres
 * - Mois (01-12), Année (2 chiffres), CVV (3 chiffres)
 * - Si tout est bon, envoi vers la page confirmation
 */

document.addEventListener("DOMContentLoaded", function () {

    var formulaire = document.querySelector("form[action*='paiement']");
    var inputNumCarte = document.getElementById("inputNumCarte");
    var inputMois = document.getElementById("inputMoisExpiration");
    var inputAnnee = document.getElementById("inputAnneeExpiration");
    var inputCvv = document.getElementById("inputNumCarteDos");

    if (!formulaire || !inputNumCarte) {
        return;
    }

    // --- Numéro de carte : n'autoriser que les chiffres à la saisie ---
    inputNumCarte.addEventListener("keypress", function (e) {
        var caractere = e.key;
        if (caractere < "0" || caractere > "9") {
            e.preventDefault();
        }
    });

    // --- Numéro de carte : mettre un espace tous les 4 chiffres à chaque saisie ---
    inputNumCarte.addEventListener("input", function () {
        var valeur = this.value;
        var sansEspaces = valeur.split(" ").join("");
        var avecEspaces = "";
        var i;
        for (i = 0; i < sansEspaces.length; i++) {
            if (i > 0 && i % 4 === 0) {
                avecEspaces = avecEspaces + " ";
            }
            avecEspaces = avecEspaces + sansEspaces[i];
        }
        this.value = avecEspaces;
    });

    // --- Type de carte : afficher Visa / Mastercard dans le carré en bas à droite ---
    var cardBrandZone = document.getElementById("card-brand-zone");
    var cardBrandLabel = document.getElementById("card-brand-label");

    function mettreAJourTypeCarte() {
        if (!cardBrandZone || !cardBrandLabel) return;
        var valeur = inputNumCarte.value.split(" ").join("");
        cardBrandZone.removeAttribute("class");
        cardBrandZone.className = "card-brand-zone";
        if (valeur.charAt(0) === "4") {
            cardBrandLabel.textContent = "Visa";
            cardBrandZone.classList.add("card-brand--visa");
        } else if (valeur.length >= 2) {
            var deux = valeur.substring(0, 2);
            if (deux >= "51" && deux <= "55") {
                cardBrandLabel.textContent = "Mastercard";
                cardBrandZone.classList.add("card-brand--mastercard");
            } else {
                cardBrandLabel.textContent = "Carte";
            }
        } else {
            cardBrandLabel.textContent = "Carte";
        }
    }

    inputNumCarte.addEventListener("input", mettreAJourTypeCarte);
    mettreAJourTypeCarte();

    // --- Mois : uniquement des chiffres ---
    inputMois.addEventListener("keypress", function (e) {
        var caractere = e.key;
        if (caractere < "0" || caractere > "9") {
            e.preventDefault();
        }
    });

    // --- Année : uniquement des chiffres ---
    inputAnnee.addEventListener("keypress", function (e) {
        var caractere = e.key;
        if (caractere < "0" || caractere > "9") {
            e.preventDefault();
        }
    });

    // --- CVV : uniquement des chiffres ---
    inputCvv.addEventListener("keypress", function (e) {
        var caractere = e.key;
        if (caractere < "0" || caractere > "9") {
            e.preventDefault();
        }
    });

    // --- Envoi du formulaire : vérifier le format puis envoyer ---
    formulaire.addEventListener("submit", function (e) {
        e.preventDefault();

        var numCarte = inputNumCarte.value.split(" ").join("");
        var mois = inputMois.value;
        var annee = inputAnnee.value;
        var cvv = inputCvv.value;

        // Vérifier le numéro de carte (13 à 19 chiffres)
        if (numCarte.length < 13 || numCarte.length > 19) {
            alert("Le numéro de carte doit contenir entre 13 et 19 chiffres.");
            inputNumCarte.focus();
            return;
        }

        // Vérifier le mois (01 à 12)
        var moisNum = parseInt(mois, 10);
        if (isNaN(moisNum) || moisNum < 1 || moisNum > 12) {
            alert("Le mois doit être entre 01 et 12.");
            inputMois.focus();
            return;
        }

        // Vérifier l'année (2 chiffres)
        if (annee.length !== 2) {
            alert("L'année doit être sur 2 chiffres (ex : 25 pour 2025).");
            inputAnnee.focus();
            return;
        }

        // Vérifier le CVV (3 chiffres)
        if (cvv.length !== 3) {
            alert("Le code CVV doit contenir 3 chiffres.");
            inputCvv.focus();
            return;
        }

        // Tout est bon : envoyer le formulaire
        formulaire.submit();
    });
});
