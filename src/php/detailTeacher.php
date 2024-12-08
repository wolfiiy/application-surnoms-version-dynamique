<?php
/**
 * Authors: GCR, STE
 * Date: October 1st, 2024
 * Description: Display detailed information about a specific teacher, including 
 *              their section, gender, and relevant actions. Fetches details 
 *              from the database, then renders them in a view.
 */

require('views/partials/head.php');
require('views/partials/nav.php');

require('models/Constants.php');
require('models/Database.php');
$db = new Database();

// Get the requested teacher
if (isset($_GET['id'])) {
    $teacher = $db -> getOneTeacher($_GET['id']);
    $section = $db -> getSectionById($teacher['fkSection']);

    // Map gender to the correct image
    $genderImagePath = array(
        'M' => 'male.png',
        'F' => 'femelle.png',
        'A' => 'autre.png'
    );

    $genderImage = $genderImagePath[$teacher['teaGender']];
    $modifyUrl = "add.php?id={$teacher['idTeacher']}";
    $deleteUrl = "javascript:confirmDelete({$teacher['idTeacher']})";
}

require('views/detailsView.php');
require('views/partials/footer.php');
?>