<?php
/**
 * ETML
 * Author: STE
 * Date: December 10th, 2024
 * Description:
 */

/*require('views/partials/head.php');
require('views/partials/nav.php');*/

require('models/Database.php');
$db = new Database();

// Proceed if a teacher has been selected
if (isset($_GET['id'])) {
    $teacher = $db -> getOneTeacher($_GET['id']);
    $db -> vote($teacher['idTeacher']);
} else {
    header("Location: index.php?error=no_teacher_selected");
}
?>