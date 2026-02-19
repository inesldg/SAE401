
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

