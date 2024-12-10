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
require('models/SectionModel.php');
$db = new Database();
$sectionModel = new SectionModel();
$teacherModel = new TeacherModel();

// Get the requested teacher
if (isset($_GET['id'])) {
    $teacher = $teacherModel -> getOneTeacher($_GET['id']);
    $section = $sectionModel -> getSectionById($teacher['fkSection']);

    // Map gender to the correct image
    $genderImagePath = array(
        'M' => 'male.png',
        'F' => 'femelle.png',
        'A' => 'autre.png'
    );

    $genderImage = $genderImagePath[$teacher['teaGender']];
    $nbVotes = $teacher['teaVotes'];
    $labelVotes = "Nombre de votes: ";

    if ($nbVotes > 0) {
        $labelVotes .= $nbVotes;
    } else {
        $labelVotes = "Aucun votes";
    }

    $modifyUrl = "add.php?id={$teacher['idTeacher']}";
    $deleteUrl = "javascript:confirmDelete({$teacher['idTeacher']})";
    $voteUrl = "vote.php?id={$teacher['idTeacher']}";
}

require('views/detailsView.php');
require('views/partials/footer.php');
?>