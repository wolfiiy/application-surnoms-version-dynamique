<?php
/**
 * Author: STE
 * Date: October 8th, 2024
 * Description: Verifies the information obtained through a form.
 */

require('models/Constants.php');
require('models/Database.php');
require_once('models/TeacherModel.php');

$teacherModel = new TeacherModel();

// Check for filled forms
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();
    $gender = $_POST['genre'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $nickname = $_POST['nickname'];
    $origin = $_POST['origin'];
    $section = $_POST['section'];

    // Check for missing information
    if (!isset($_POST['genre'])) {
        $errors['gender'] = Constants::ERROR_MISSING_GENDER;
    }

    if (empty($_POST['firstname'])) {
        $errors['firstname'] = Constants::ERROR_MISSING_FIRST_NAME;
    }

    if (empty($_POST['lastname'])) {
        $errors['lastname'] = Constants::ERROR_MISSING_LAST_NAME;
    }

    if (empty($_POST['nickname'])) {
        $errors['nickname'] = Constants::ERROR_MISSING_NICK_NAME;
    }

    if (empty($_POST['origin'])) {
        $errors['origin'] = Constants::ERROR_MISSING_ORIGIN;
    }

    if (empty($_POST['section'])) {
        $errors['section'] = Constants::ERROR_MISSING_SECTION;
    }

    $data = array(
        "firstname" => $firstname,
        "lastname" => $lastname,
        "gender" => $gender,
        "nickname" => $nickname,
        "origin" => $origin,
        "section" => $section
    );

    // Stop if errors occured
    if (count($errors) == 0) {
        if (isset($_GET['id'])) {
            // If the id is set, update an existing teacher
            $data["id"] = $_GET['id'];
            $teacherModel -> editTeacher($data);
            header("Location: index.php");
        } else {
            // If the get is empty, default to adding the teacher
            $teacherModel -> insertTeacher($data);
            header("Location: index.php");
        }
    } else {
        echo <<< HTML
            <h1>Erreur</h1>
            <p>
                Une ou plusieures erreurs est / sont survenues. Cause(s):
            </p>
        HTML;
        Writer::writeAsList($errors, "orange");
    }
}

?>