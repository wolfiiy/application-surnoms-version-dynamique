<?php
/**
 * ETML
 * Author: STE
 * Date: December 10th, 2024
 * Description: Logic used to process user votes.
 */

/*require('views/partials/head.php');
require('views/partials/nav.php');*/

require('models/Database.php');
$db = new Database();

// Proceed if a teacher has been selected
if (isset($_GET['id'])) {
    $teacher = $db -> getOneTeacher($_GET['id']);
    $db -> vote($teacher['idTeacher']);
    header("Location: index.php");
} elseif (isset($_POST['idTeacher'])) {
    $teachers = $_POST['idTeacher'];

    foreach ($teachers as $t => $id) {
        $db -> vote($id);
    }

    header("Location: index.php");
} else {
    header("Location: index.php?error=no_teacher_selected");
}
?>