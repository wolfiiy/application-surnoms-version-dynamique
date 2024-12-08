<?php
/**
 * Author: STE
 * Date: October 29th, 2024
 * Description: Removes a teacher from the database.
 */

require('models/Database.php');

// If the 'id' variable has been set, remove the corresponding teacher.
if (isset($_GET['id'])) {
    removeTeacher($_GET['id']);
}

/**
 * Removes a teacher from the database by calling the appropriate method in the
 * database class. Once removed, redirects the user to the index.
 */
function removeTeacher(int $id) {
    $db = new Database();
    $db -> removeTeacher($id);
    header("Location: index.php");
}
?>