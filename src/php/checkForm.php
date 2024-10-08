<?php
/**
 * Author: STE
 * Date: October 8th, 2024
 * Description: Verifies the information obtained through a form.
 */

require('constants.php');
require('database.php');

$db = new Database();

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

    // Stop if errors occured
    if (count($errors) == 0) {
        $db -> insertTeacher($firstname, $lastname, $gender, $nickname, $origin, 
                             $section);
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