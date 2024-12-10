<?php
/**
 * ETML
 * Author: STE
 * Date: December 8th
 * Description: Form that can be used to add or modify and existing teacher to
 *              the database.
 */

require_once('models/Constants.php');
require_once('models/SectionModel.php');
require_once('models/TeacherModel.php');

$sectionModel = new SectionModel();
$teacherModel = new TeacherModel();

// Placeholder values
$firstName = "";
$lastName = "";
$nickname = "";
$origin = "";

// If an ID is found in the URL, then the form should be used for edition
if (isset($_GET['id'])) {
    $isEdit = true;
    
    $teacher = $teacherModel -> getOneTeacher($_GET['id']);
    $section = $sectionModel -> getSectionById($teacher['fkSection']);
    
    $pageTitle = "Modification";
    $formTitle = "Modification de {$teacher['teaNickname']}";
    $formAction = "checkForm.php?id={$teacher['idTeacher']}";
    $submitLabel = "Modifier";

    // The form shall hold existing values when modifying an entry
    $genderInput = "";
    $genderInput .= '<input type="radio" id="genre1" name="genre" value="M"';
    if ($teacher['teaGender'] == 'M') 
        $genderInput .= 'checked';
    $genderInput .= ">";
    $genderInput .= '<label for="genre1">Homme</label>';

    $genderInput .= '<input type="radio" id="genre2" name="genre" value="F"';
    if ($teacher['teaGender'] == 'F')
        $genderInput .= 'checked';
    $genderInput .= '>';
    $genderInput .= '<label for="genre2">Femme</label>';

    $genderInput .= '<input type="radio" id="genre3" name="genre" value="A"';
    if ($teacher['teaGender'] == 'A')
        $genderInput .= 'checked';
    $genderInput .= '>';
    $genderInput .= '<label for="genre3">Autre</label>';

    $firstName = $teacher['teaFirstname'];
    $lastName = $teacher['teaName'];
    $nickname = $teacher['teaNickname'];
    $origin = $teacher['teaOrigine'];
} else {
    $isEdit = false;

    $pageTitle = "Ajout";
    $formTitle = "Ajout d'un enseignant";
    $formAction = "checkForm.php?action=insert";
    $submitLabel = "Ajouter";

    // The form is empty when adding a new teacher
    $genderInput = <<< html
        <input type="radio" id="genre1" name="genre" value="M">
        <label for="genre1">Homme</label>
        <input type="radio" id="genre2" name="genre" value="F">
        <label for="genre2">Femme</label>
        <input type="radio" id="genre3" name="genre" value="A">
        <label for="genre3">Autre</label>
    html;
}

// The section dropdown has to be filled in both cases
$sections = $sectionModel -> getSectionList();
$sectionList = "";

// Add a placeholder if adding a teacher
if (!$isEdit) {
    $sectionList .= '<option value="-1" selected>Section</option>';
}

foreach ($sections as $s) {
    // Default to the teacher's section
    if (isset($section) && $section['idSection'] == $s['idSection'])
        $selected = 'selected';
    else
        $selected = null;

    $sectionList .= '<option value="' . $s['idSection'] . '" ' . $selected . '>';
    $sectionList .= ucfirst($s['secName']);
    $sectionList .= '</option>';
}

require('views/partials/head.php');
require('views/partials/nav.php');
require('views/addView.php');
require('views/partials/footer.php');
?>