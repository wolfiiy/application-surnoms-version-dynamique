<?php
/**
 * Authors: GCR, STE
 * Date: October 1st, 2024
 * Description: Detailed view of a given teacher.
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
    <title>Version statique de l'application des surnoms</title>
</head>

<body>
    <?php include('header.php') ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        $teacherDetails = $db -> getOneTeacher($_GET['id']);
    }
    ?>

    <div class="container">
        <div class="user-head">
            <h3>Détail : <?php echo $teacherDetails[0]['teaFirstname'] . " " . $teacherDetails[0]['teaName'] ?>
                <img style="margin-left: 1vw;" height="20em" src="../img/male.png" alt="male symbole">
            </h3>
            <p>
                <?php
                    $secId =  $teacherDetails[0]['fkSection'];
                    $sec = $db -> getSectionById($secId)[0]['secName'];
                    echo ucwords($sec); 
                ?>
            </p>
            <div class="actions">
                <a href="#">
                    <img height="20em" src="../img/edit.png" alt="edit icon">
                </a>
                <a href="javascript:confirmDelete()">
                    <img height="20em" src="../img/delete.png" alt="delete icon"> 
                </a>
            </div>
        </div>

        <div class="user-body">
            <div class="left">
                <p>Surnom : <?=$teacherDetails[0]['teaNickname'];?></p>
                <p><?=$teacherDetails[0]['teaOrigine'];?></p>
            </div>
        </div>

        <div class="user-footer">
            <a href="index.html">Retour à la page d'accueil</a>
        </div>
    </div>

    <footer>
        <p>Copyright GCR - bulle web-db - 2022</p>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>