<?php
/**
 * Author: STE
 * Date: October 29th, 2024
 * Description: Lets the user edit a teacher's information.
 */

require('models/Constants.php');
require('models/Database.php');

require('views/partials/head.php');
require('views/partials/nav.php');

$db = new Database();

// Get the requested teacher
if (isset($_GET['id'])) {
    $teacher = $db -> getOneTeacher($_GET['id']);
    $section = $db -> getSectionById($teacher['fkSection']);
}

$sections = $db -> getSectionList();
$sectionList = "";

foreach ($sections as $s) {
    // Default to the teacher's section
    if ($section['idSection'] == $s['idSection'])
        $selected = 'selected';
    else
        $selected = null;

    $sectionList .= '<option value="' . $s['idSection'] . '" ' . $selected . '>';
    $sectionList .= ucfirst($s['secName']);
    $sectionList .= '</option>';
}

require('views/editView.php');
require('views/partials/footer.php');
?>