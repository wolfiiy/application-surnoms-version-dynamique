/**
 * Displays a popup to confirm the deletion of a teacher. If yes is selected,
 * the teacher is removed from the database and the user is redirected to the
 * index.
 * 
 * @param {*} id The unique ID of the teacher to be deleted.
 */
function confirmDelete(id) {
    if (confirm("Êtes-vous sûr de vouloir supprimer l'enseignant?") === true) {
        window.location.href = "removeTeacher.php?id=" + id;
    }
}
