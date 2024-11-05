// Affiche un popup pour confirmer la suppression d'un enseignant
function confirmDelete(id) {
    if (confirm("Êtes-vous sûr de vouloir supprimer l'enseignant?") === true) {
        window.location.href = "removeTeacher.php?id=" + id;
    }
}
