/**
 * TP Paiement - Interface carte bancaire
 * - Détection du type de carte (keyup) et changement de l'image
 * - Espaces automatiques par groupe de 4 (change)
 * - Restriction keypress : chiffres uniquement
 * - Vérifications : date d'expiration, algorithme de Luhn
 * - Envoi des données via fetch POST vers l'API paiement
 */

(function () {
    "use strict";

    const URL_PAIEMENT = "https://www.mmi.uha.fr/exercices/paiement.php";

    // Images (data URI) pour les types de carte - à remplacer par vos fichiers si besoin
    const CARD_IMAGES = {
        default: "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='40' viewBox='0 0 60 40'%3E%3Crect width='60' height='40' fill='%23f0f0f0' rx='4'/%3E%3Ctext x='30' y='26' font-family='Arial' font-size='11' fill='%23999' text-anchor='middle'%3ECarte%3C/text%3E%3C/svg%3E",
        visa: "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='40' viewBox='0 0 60 40'%3E%3Crect width='60' height='40' fill='%231a1f71' rx='4'/%3E%3Ctext x='30' y='26' font-family='Arial' font-size='14' font-weight='bold' fill='%23fff' text-anchor='middle'%3EVISA%3C/text%3E%3C/svg%3E",
        mastercard: "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='40' viewBox='0 0 60 40'%3E%3Crect width='60' height='40' fill='%23eb001b' rx='4'/%3E%3Ctext x='30' y='26' font-family='Arial' font-size='10' font-weight='bold' fill='%23fff' text-anchor='middle'%3EMastercard%3C/text%3E%3C/svg%3E",
        amex: "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='40' viewBox='0 0 60 40'%3E%3Crect width='60' height='40' fill='%23006fcf' rx='4'/%3E%3Ctext x='30' y='26' font-family='Arial' font-size='10' font-weight='bold' fill='%23fff' text-anchor='middle'%3EAmex%3C/text%3E%3C/svg%3E"
    };

    /**
     * Détermine le type de carte à partir des premiers chiffres.
     * 4 => VISA ; 51-55 => Mastercard ; 34, 37 => Amex ; etc.
     */
    function getCardType(num) {
        const n = num.replace(/\s/g, "");
        if (n.length === 0) return "default";
        if (n.charAt(0) === "4") return "visa";
        const two = n.length >= 2 ? parseInt(n.substring(0, 2), 10) : 0;
        if (two >= 51 && two <= 55) return "mastercard";
        if (two === 34 || two === 37) return "amex";
        if (two >= 40 && two <= 49) return "visa"; // 40-49 parfois VISA
        return "default";
    }

    /**
     * Met à jour l'image de la marque de la carte (keyup).
     */
    function updateCardBrandImage(num) {
        const logo = document.getElementById("card-brand-logo");
        if (!logo) return;
        const type = getCardType(num);
        logo.src = CARD_IMAGES[type] || CARD_IMAGES.default;
        logo.alt = type === "default" ? "" : type;
    }

    /**
     * Formate le numéro avec des espaces tous les 4 chiffres.
     * On nettoie d'abord les espaces puis on applique str.replace(/(.{4})/g,"$1 ")
     */
    function formatCardNumber(value) {
        const cleaned = String(value).replace(/\s/g, "");
        return cleaned.replace(/(.{4})/g, "$1 ").trim();
    }

    /**
     * Algorithme de Luhn : valide le numéro de carte.
     * - Lire de droite à gauche, chiffres de rang pair x2, si >9 on soustrait 9, somme des chiffres.
     * - Si somme % 10 === 0 alors valide.
     */
    function isLuhnValid(num) {
        const n = String(num).replace(/\s/g, "").replace(/\D/g, "");
        if (n.length < 13 || n.length > 19) return false;
        let sum = 0;
        let isEven = false;
        for (let i = n.length - 1; i >= 0; i--) {
            let digit = parseInt(n.charAt(i), 10);
            if (isEven) {
                digit *= 2;
                if (digit > 9) digit -= 9;
            }
            sum += digit;
            isEven = !isEven;
        }
        return sum % 10 === 0;
    }

    /**
     * Vérifie que la date d'expiration (MM/AA) est ultérieure à la date actuelle.
     */
    function isExpirationValid(mois, annee) {
        const m = parseInt(mois, 10);
        const a = parseInt(annee, 10);
        if (isNaN(m) || isNaN(a) || m < 1 || m > 12) return false;
        const now = new Date();
        const currentYear = now.getFullYear() % 100;
        const currentMonth = now.getMonth() + 1;
        if (a < currentYear) return false;
        if (a === currentYear && m < currentMonth) return false;
        return true;
    }

    function init() {
        const form = document.querySelector("form[action*='confirmation']");
        const inputNumCarte = document.getElementById("inputNumCarte");
        const inputMois = document.getElementById("inputMoisExpiration");
        const inputAnnee = document.getElementById("inputAnneeExpiration");
        const inputCvv = document.getElementById("inputNumCarteDos");
        const btnValider = document.getElementById("boutonValiderPaiement");
        const msgAttente = document.getElementById("paiement-attente");

        if (!form || !inputNumCarte) return;

        // --- keyup : détection du type de carte et mise à jour de l'image ---
        inputNumCarte.addEventListener("keyup", function () {
            updateCardBrandImage(this.value);
        });

        // --- keypress : n'autoriser que les chiffres (et pas les espaces en saisie manuelle) ---
        inputNumCarte.addEventListener("keypress", function (e) {
            const key = e.key;
            if (key === " " || key === "e" || key === "E" || key === "+" || key === "-") {
                e.preventDefault();
                return;
            }
            if (!/^\d$/.test(key)) {
                e.preventDefault();
            }
        });

        // --- change : formater le numéro avec espaces tous les 4 chiffres ---
        inputNumCarte.addEventListener("change", function () {
            const cleaned = this.value.replace(/\s/g, "");
            this.value = formatCardNumber(cleaned);
            updateCardBrandImage(this.value);
        });

        // Restriction chiffres uniquement pour mois, année, CVV
        [inputMois, inputAnnee, inputCvv].forEach(function (input) {
            if (!input) return;
            input.addEventListener("keypress", function (e) {
                if (!/^\d$/.test(e.key)) e.preventDefault();
            });
        });

        // --- Soumission du formulaire : validation puis fetch ---
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            const num = inputNumCarte.value.replace(/\s/g, "");
            const mois = (inputMois && inputMois.value) || "";
            const annee = (inputAnnee && inputAnnee.value) || "";
            const cvv = (inputCvv && inputCvv.value) || "";

            // Vérifications avant envoi
            if (!isExpirationValid(mois, annee)) {
                alert("La date d'expiration doit être ultérieure à la date actuelle (MM/AA).");
                if (inputMois) inputMois.focus();
                return;
            }
            if (!isLuhnValid(num)) {
                alert("Le numéro de carte n'est pas valide (vérification de Luhn).");
                inputNumCarte.focus();
                return;
            }

            const montant = document.getElementById("montantPanier");
            const nom = form.querySelector('input[name="nom"]');
            const prenom = form.querySelector('input[name="prenom"]');
            const nomCarte = (nom && prenom) ? (nom.value + " " + prenom.value).trim() : (nom ? nom.value : "");

            const data = {
                montant: montant ? montant.value : "141",
                numero: num,
                date: mois + annee,
                nom: nomCarte,
                cle: cvv
            };

            // Afficher le message d'attente
            if (btnValider) btnValider.disabled = true;
            if (msgAttente) {
                msgAttente.hidden = false;
                msgAttente.textContent = "Veuillez patienter, validation de la transaction en cours par la banque…";
            }

            fetch(URL_PAIEMENT, {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: new URLSearchParams(data).toString()
            })
                .then(function (response) {
                    return response.text().then(function (text) {
                        if (response.ok) return { ok: true, text: text };
                        return { ok: false, text: text };
                    });
                })
                .then(function (result) {
                    if (btnValider) btnValider.disabled = false;
                    if (msgAttente) msgAttente.hidden = true;

                    if (result.ok) {
                        // Succès : on envoie le formulaire vers la page de confirmation
                        form.submit();
                    } else {
                        alert("La banque a refusé la transaction ou une erreur est survenue. Veuillez réessayer.");
                    }
                })
                .catch(function (err) {
                    if (btnValider) btnValider.disabled = false;
                    if (msgAttente) msgAttente.hidden = true;
                    alert("Erreur de communication avec le serveur de paiement. Vous pouvez réessayer ou contacter le site.");
                    console.error(err);
                });
        });
    }

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", init);
    } else {
        init();
    }
})();
