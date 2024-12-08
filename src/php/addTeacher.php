<?php
/**
 * Authors: GCR, STE
 * Date: October 1st, 2024
 * Description: Allows for the addition of teachers to the nick names database.
 */
require('models/Constants.php');
require('models/Database.php');
require('views/partials/head.php');
require('views/partials/nav.php');

$db = new Database();

$sections = $db -> getSectionList();
$sectionList = "";

foreach ($sections as $s) {
    $sectionList .= '<option value="' . $s['idSection'] . '">';
    $sectionList .= ucfirst($s['secName']);
    $sectionList .= '</option>';
}

require('views/addView.php');
require('views/partials/footer.php');
?>