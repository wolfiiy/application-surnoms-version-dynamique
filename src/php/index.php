<?php
/**
 * Authors: GCR, STE
 * Date: October 1st, 2024
 * Description: Index of the nickname application. Displays a table with all
 *              registered nicknames and allows for edition of said nicknames.
 */

require('models/Database.php');
$db = new Database();

require('views/partials/head.php');
require('views/partials/nav.php');
require('views/indexView.php');
require('views/partials/footer.php');
?>