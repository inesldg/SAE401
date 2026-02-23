
const btnAjouter = document.getElementById("btnAjouter");
const overlay = document.getElementById("overlay");
const popup = document.getElementById("popup");
const closePopup = document.getElementById("closePopup");

btnAjouter.addEventListener("click", function(e) {
    e.preventDefault();
    overlay.style.display = "block";
    popup.style.display = "block";
    setTimeout(() => {
        popup.classList.add("active");
    }, 10);
});

function fermerPopup() {
    overlay.style.display = "none";
    popup.style.display = "none";
    popup.classList.remove("active");
}

closePopup.addEventListener("click", fermerPopup);
overlay.addEventListener("click", fermerPopup);


// const fileInputs = document.querySelectorAll('.image-label input[type="file"]');

// fileInputs.forEach(input => {
//     input.addEventListener('change', e => {
//         const fileName = e.target.files[0]?.name || 'Choisir un fichier...';
//         e.target.nextElementSibling.textContent = fileName;
//     });
// });