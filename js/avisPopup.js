document.addEventListener('DOMContentLoaded', () => {
    const addAvisButton = document.querySelector('.avis-pill-add');
    const popupOverlay = document.getElementById('avisPopupOverlay');
    const popupClose = document.getElementById('avisPopupClose');
    const popupValider = document.getElementById('avisPopupValider');
    const etoilesFenetre = document.querySelectorAll('.avis-fenetre-etoile');
    let noteSelectionnee = 2;

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
    if (popupValider) {
        popupValider.addEventListener('click', fermerFenetreAvis);
    }

    etoilesFenetre.forEach((etoile) => {
        etoile.addEventListener('click', () => {
            const note = Number(etoile.dataset.note);
            if (!Number.isNaN(note)) {
                noteSelectionnee = note;
                mettreAJourEtoiles(noteSelectionnee);
            }
        });
    });

    mettreAJourEtoiles(noteSelectionnee);

    popupOverlay.addEventListener('click', (event) => {
        if (event.target === popupOverlay) {
            fermerFenetreAvis();
        }
    });
});