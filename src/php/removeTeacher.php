<?php
/**
 * Author: STE
 * Date: October 29th, 2024
 * Description: Removes a teacher from the database.
 */

require('database.php');

if (isset($_GET['id'])) {
    removeTeacher($_GET['id']);
}

function removeTeacher(int $id) {
    $db = new Database();
    $db -> removeTeacher($id);
    header("Location: index.php");
}
?>