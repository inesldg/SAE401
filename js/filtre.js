// =========================================================
// TOGGLE FILTRES – afficher / cacher les filtres
// =========================================================
document.addEventListener('DOMContentLoaded', function () {
    // pour afficher/fermer filtres
    const btn = document.getElementById('btn-toggle-filtres');
    // conteeneur des filtres
    const filters = document.querySelector('.filtres-tri');

    if (btn && filters) {
        btn.onclick = function () {
            // active/desactiver les filtres
            filters.classList.toggle('active');
            // Change le texte selon l'état
            btn.innerHTML = filters.classList.contains('active') ? "Fermer" : "Afficher les Filtres";
        };
    }
});
