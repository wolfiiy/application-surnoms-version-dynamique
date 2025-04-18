<?php
/**
 * ETML
 * Author: STE
 * Date: December 10th, 2024
 * Description: Logic used to process user votes.
 */

require_once('models/TeacherModel.php');

$teacherModel = new TeacherModel();

if (isset($_GET['id'])) {
    // If the ID is set, then the "J'élis" link has been clicked.
    // Proceed for one teacher.
    $teacher = $teacherModel -> getOneTeacher($_GET['id']);
    $teacherModel -> vote($teacher['idTeacher']);

    header("Location: index.php");
} elseif (isset($_POST['idTeacher'])) {
    // If the "idTeacher" array exists, then the user has clicked at least one
    // of the checkboxes.    
    $teachers = $_POST['idTeacher'];

    foreach ($teachers as $t => $id) {
        $teacherModel -> vote($id);
    }

    header("Location: index.php");
} else {
    // Throw a silent error if no teacher has been selected.
    header("Location: index.php?error=no_teacher_selected");
}
?>