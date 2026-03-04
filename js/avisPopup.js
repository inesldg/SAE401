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

    if (!addAvisButton || !popupOverlay || !popupClose) {
        return;
    }

    const mettreAJourEtoiles = (note) => {
        etoilesFenetre.forEach((etoile, index) => {
            if (index < note) {
                etoile.classList.add('dore');
                etoile.classList.remove('grise');
            } else {
                etoile.classList.add('grise');
                etoile.classList.remove('dore');
            }
        });
    };

    const ouvrirFenetreAvis = () => {
        popupOverlay.classList.add('ouvert');
        popupOverlay.setAttribute('aria-hidden', 'false');
    };

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
                }
            }
        });
    });

    mettreAJourEtoiles(noteSelectionnee);
    if (avisNoteInput) {
        avisNoteInput.value = String(noteSelectionnee);
    }

    popupOverlay.addEventListener('click', (event) => {
        if (event.target === popupOverlay) {
            fermerFenetreAvis();
        }
    });

    const appliquerFiltreNotes = () => {
        let nbAffiches = 0;
        avisCartes.forEach((carte) => {
            const noteCarte = Number(carte.dataset.note);
            const doitAfficher = filtreNoteActive === null || noteCarte === filtreNoteActive;
            carte.style.display = doitAfficher ? 'flex' : 'none';
            if (doitAfficher) {
                nbAffiches += 1;
            }
        });

        if (!avisFiltreMessage) {
            return;
        }

        if (filtreNoteActive !== null && nbAffiches === 0) {
            const suffixe = filtreNoteActive > 1 ? 'étoiles' : 'étoile';
            avisFiltreMessage.textContent = `Il n'y a pas d'avis ${filtreNoteActive} ${suffixe} pour ce jeu !`;
            avisFiltreMessage.style.display = 'block';
        } else {
            avisFiltreMessage.textContent = '';
            avisFiltreMessage.style.display = 'none';
        }
    };

    filtresNotes.forEach((filtre) => {
        filtre.addEventListener('click', () => {
            const noteFiltre = Number(filtre.dataset.filterNote);
            if (Number.isNaN(noteFiltre)) {
                return;
            }

            if (filtreNoteActive === noteFiltre) {
                filtreNoteActive = null;
            } else {
                filtreNoteActive = noteFiltre;
            }

            filtresNotes.forEach((bouton) => {
                const noteBouton = Number(bouton.dataset.filterNote);
                if (noteBouton === filtreNoteActive) {
                    bouton.classList.add('actif');
                } else {
                    bouton.classList.remove('actif');
                }
            });

            appliquerFiltreNotes();
        });
    });
});