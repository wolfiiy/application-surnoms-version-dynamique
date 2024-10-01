<?php
/**
 * Authors: GCR, STE
 * Date: October 1st, 2024
 * Description: Index of the nickname application. Displays a table with all
 * registered nicknames and allows for edition of said nicknames.
 */

require('database.php');

$db = new Database();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/style.css" rel="stylesheet">
    <title>Surnoms</title>
</head>

<body>
    <?php include('header.php') ?>

    <div class="container">
        <h3>Liste des enseignants</h3>
        <form action="#" method="post">
            <?php echo $db -> getAllTeachers();?>
        </form>
        <script src="js/script.js"></script>
    </div>

    <footer>
        <p>Copyright GCR - bulle web-db - 2022</p>
    </footer>

</body>

</html>