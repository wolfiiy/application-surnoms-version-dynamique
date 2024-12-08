/**
 * ETML
 * Author: STE
 * Date: December 8th, 2024
 * Description: Opens a pop-pu prompting the user for confirmation upon deletion
 *              of a teacher.
 */

/**
 * The message to display to the user when they attempt to delete a teacher.
 */
const CONFIRMATION_MESSAGE = "Êtes-vous sûr de vouloir supprimer l'enseignant?";

/**
 * Displays a popup to confirm the deletion of a teacher. If yes is selected,
 * the teacher is removed from the database and the user is redirected to the
 * index.
 * 
 * @param {*} id The unique ID of the teacher to be deleted.
 */
function confirmDelete(id) {
    if (confirm(CONFIRMATION_MESSAGE) === true) {
        window.location.href = "removeTeacher.php?id=" + id;
    }
}
