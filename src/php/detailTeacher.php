<?php
require('database.php');
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

    <div class="container">
        <div class="user-head">
            <h3>Détail : Grégory Charmier
                <img style="margin-left: 1vw;" height="20em" src="./img/male.png" alt="male symbole">
            </h3>
            <p>
                Informatique
            </p>
            <div class="actions">

                <a href="#">
                    <img height="20em" src="./img/edit.png" alt="edit icon"></a>
                <a href="javascript:confirmDelete()">
                    <img height="20em" src="./img/delete.png" alt="delete icon"> </a>

            </div>
        </div>
        <div class="user-body">
            <div class="left">
                <p>Surnom : GregLeBarbar</p>
                <p>C'est son nom de guerrier échiquéen sur les différentes plateformes de jeu.</p>
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