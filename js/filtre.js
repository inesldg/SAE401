
document.addEventListener('DOMContentLoaded', function () {
    const btn = document.getElementById('btn-toggle-filtres');
    const filters = document.querySelector('.filtres-tri');

    if (btn && filters) {
        btn.onclick = function () {
            filters.classList.toggle('active');
            // Change le texte selon l'état
            btn.innerHTML = filters.classList.contains('active') ? "Fermer" : "Afficher les Filtres";
        };
    }
});
