<?php
/**
 * Authors: GCR, STE
 * Date: October 1st, 2024
 * Description: Allows for the addition of teachers to the nick names database.
 */

require('database.php');

// Check for filled forms
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();

    $gender = $_POST['genre'];
    $firstName = $_POST['firstName'];
    $name = $_POST['name'];
    $nickname = $_POST['nickName'];
    $origin = $_POST['origin'];
    $section = $_POST['section'];

    // Check for missing information
    if (!isset($_POST['genre'])) {
        $errors['genre'] = "Veuillez sélectionner un genre.";
    }

    if (empty($_POST['firstName'])) {
        $errors['firstname'] = "Veuillez entrer un nom de famille.";
    }

    if (empty($_POST['name'])) {
        $errors['name'] = "Veuillez entrer un prénom.";
    }

    if (empty($_POST['nickName'])) {
        $errors['nickname'] = "Veuillez entrer un surnom.";
    }

    if (empty($_POST['origin'])) {
        $errors['origin'] = "Veuillez renseigner l'origine du surnom.";
    }

    if (empty($_POST['section'])) {
        $errors['section'] = "Veuillez sélectionner une section .";
    }

    // Stop if errors occured
    if (count($errors) == 0) {
        // TODO section
        $sql = "insert into t_teacher values 
                null, $firstName $name $gender $nickname $origin";
        $req = $connector -> query($sql);

        //$req -> bindValue('', $_POST[''], PDO::PARAM_);
        // $sql = "insert into t_teacher values (?, ?, ?, ?, ?, ?)";
        // $stmt = $connection -> prepare($sql);
    } else {
        var_dump($errors);
    }
}
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
        <div class="user-body">
            <form action="#" method="post" id="form">
                <h3>Ajout d'un enseignant</h3>
                <p>
                    <input type="radio" id="genre1" name="genre" value="M" checked>
                    <label for="genre1">Homme</label>
                    <input type="radio" id="genre2" name="genre" value="F">
                    <label for="genre2">Femme</label>
                    <input type="radio" id="genre3" name="genre" value="A">
                    <label for="genre3">Autre</label>
                </p>
                <p>
                    <label for="firstName">Nom :</label>
                    <input type="text" name="firstName" id="firstName" value="">
                </p>
                <p>
                    <label for="name">Prénom :</label>
                    <input type="text" name="name" id="name" value="">
                </p>
                <p>
                    <label for="nickName">Surnom :</label>
                    <input type="text" name="nickName" id="nickName" value="">
                </p>
                <p>
                    <label for="origin">Origine :</label>
                    <textarea name="origin" id="origin"></textarea>
                </p>
                <p>
                    <label style="display: none" for="section"></label>
                    <select name="section" id="section">
                        <option value="">Section</option>
                        <option value="info">Informatique</option>
                        <option value="bois">Bois</option>
                    </select>
                </p>
                <p>
                    <input type="submit" value="Ajouter">
                    <button type="button" onclick="document.getElementById('form').reset();">Effacer</button>
                </p>
            </form>
        </div>
        <div class="user-footer">
            <a href="index.html">Retour à la page d'accueil</a>
        </div>
    </div>

    <footer>
        <p>Copyright GCR - bulle web-db - 2022</p>
    </footer>
</body>
</html>