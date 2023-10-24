// On récupère le bouton qui ouvre la fenêtre modale
const openModalBtn = document.getElementById("open-delete-modal");

// On récupère la fenêtre modale et le bouton pour la fermer
const modal = document.getElementById("modal-container");
const closeBtn = document.getElementsByClassName("close-btn")[0];

// On ajoute un écouteur d'événement sur le clic du bouton pour ouvrir la fenêtre modale
openModalBtn.addEventListener("click", function () {
    modal.style.display = "block";
});

// On ajoute un écouteur d'événement sur le clic du bouton pour fermer la fenêtre modale
closeBtn.addEventListener("click", function () {
    modal.style.display = "none";
});

// On ajoute un écouteur d'événement pour fermer la fenêtre modale si l'utilisateur clique en dehors de la fenêtre
document.getElementById('cancel').addEventListener("click", function (event) {
        modal.style.display = "none";
}); 