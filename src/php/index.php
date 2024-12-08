<?php
/**
 * Authors: GCR, STE
 * Date: October 1st, 2024
 * Description: Index of the nickname application. Displays a table with all
 * registered nicknames and allows for edition of said nicknames.
 */

require('views/partials/head.php');
require('views/partials/nav.php');

require('database.php');
$db = new Database();
?>

<div class="container">
    <h3>Liste des enseignants</h3>
    <form action="#" method="post">
        <?php Writer::writeAllTeacher();?>
    </form>
    <script src="../js/script.js"></script>
</div>

<?php include('views/partials/footer.php');?>