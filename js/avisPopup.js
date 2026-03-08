// selection des elemetns
document.addEventListener('DOMContentLoaded', () => {
    const addAvisButton = document.querySelector('.avis-pill-add');
    const filtresNotes = document.querySelectorAll('.avis-pill-filtre');
    const avisCartes = document.querySelectorAll('.avis[data-note]');
    const avisFiltreMessage = document.getElementById('avisFiltreMessage');
    const popupOverlay = document.getElementById('avisPopupOverlay');
    const popupClose = document.getElementById('avisPopupClose');
    const avisNoteInput = document.getElementById('avisNote');
    const etoilesFenetre = document.querySelectorAll('.avis-fenetre-etoile');
    let noteSelectionnee = 2;
    let filtreNoteActive = null;

    // verification des elts essentiels
    if (!addAvisButton || !popupOverlay || !popupClose) {
        return;
    }

    // =========================================================
    // FONCTION : METTRE À JOUR L'AFFICHAGE DES ÉTOILES
    // =========================================================
    const mettreAJourEtoiles = (note) => {
        etoilesFenetre.forEach((etoile, index) => {
            if (index < note) {
                etoile.classList.add('dore');
                // etoile dorée pour note selectionné
                etoile.classList.remove('grise');
            } else {
                etoile.classList.add('grise');
                // etoile grise sinon
                etoile.classList.remove('dore');
            }
        });
    };

    // =========================================================
    // FONCTIONS OUVRIR / FERMER LA POPUP
    // =========================================================
    const ouvrirFenetreAvis = () => {
        popupOverlay.classList.add('ouvert');
        popupOverlay.setAttribute('aria-hidden', 'false');
    };

    // =========================================================
    // ÉVÉNEMENTS POPUP
    // =========================================================
    const fermerFenetreAvis = () => {
        popupOverlay.classList.remove('ouvert');
        popupOverlay.setAttribute('aria-hidden', 'true');
    };

    addAvisButton.addEventListener('click', ouvrirFenetreAvis);
    popupClose.addEventListener('click', fermerFenetreAvis);

    etoilesFenetre.forEach((etoile) => {
        etoile.addEventListener('click', () => {
            const note = Number(etoile.dataset.note);
            if (!Number.isNaN(note)) {
                noteSelectionnee = note;
                mettreAJourEtoiles(noteSelectionnee);
                if (avisNoteInput) {
                    avisNoteInput.value = String(noteSelectionnee);
                    // met à jour l'input hidden
                }
            }
        });
    });

    // initialisation des etoiles et input au chargement
    mettreAJourEtoiles(noteSelectionnee);
    if (avisNoteInput) {
        avisNoteInput.value = String(noteSelectionnee);
    }

    // fermer le popup au clic
    popupOverlay.addEventListener('click', (event) => {
        if (event.target === popupOverlay) {
            fermerFenetreAvis();
        }
    });

    // =========================================================
    // ÉVÉNEMENTS POPUP
    // =========================================================
    const appliquerFiltreNotes = () => {
        let nbAffiches = 0;
        avisCartes.forEach((carte) => {
            const noteCarte = Number(carte.dataset.note);
            // affiche la carte si aucun filtre ou si note correspond
            const doitAfficher = filtreNoteActive === null || noteCarte === filtreNoteActive;
            carte.style.display = doitAfficher ? 'flex' : 'none';
            if (doitAfficher) {
                nbAffiches += 1;
            }
        });

        if (!avisFiltreMessage) {
            return;
        }

        // message si aucun avis ne correspond au filtre
        if (filtreNoteActive !== null && nbAffiches === 0) {
            const suffixe = filtreNoteActive > 1 ? 'étoiles' : 'étoile';
            avisFiltreMessage.textContent = `Il n'y a pas d'avis ${filtreNoteActive} ${suffixe} pour ce jeu !`;
            avisFiltreMessage.style.display = 'block';
        } else {
            avisFiltreMessage.textContent = '';
            avisFiltreMessage.style.display = 'none';
        }
    };

    // =========================================================
    // ÉVÉNEMENTS POUR LES BOUTONS DE FILTRAGE
    // =========================================================
    filtresNotes.forEach((filtre) => {
        filtre.addEventListener('click', () => {
            const noteFiltre = Number(filtre.dataset.filterNote);
            if (Number.isNaN(noteFiltre)) {
                return;
            }

            // Toggle du filtre actif : clic sur le même bouton désactive le filtre
            if (filtreNoteActive === noteFiltre) {
                filtreNoteActive = null;
            } else {
                filtreNoteActive = noteFiltre;
            }

            // maj des classes pour les boutons de filtre
            filtresNotes.forEach((bouton) => {
                const noteBouton = Number(bouton.dataset.filterNote);
                if (noteBouton === filtreNoteActive) {
                    bouton.classList.add('actif');
                } else {
                    bouton.classList.remove('actif');
                }
            });

            // applique le filtre aux cartes
            appliquerFiltreNotes();
        });
    });
});