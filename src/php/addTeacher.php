<?php
/**
 * Authors: GCR, STE
 * Date: October 1st, 2024
 * Description: Allows for the addition of teachers to the nick names database.
 */

require('constants.php');
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

    <div class="container">
        <div class="user-body">
            <form action="checkForm.php" method="post" id="form">
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
                    <label for="lastname">Nom :</label>
                    <input type="text" name="lastname" id="lastname" value="">
                </p>
                <p>
                    <label for="firstname">Prénom :</label>
                    <input type="text" name="firstname" id="firstname" value="">
                </p>
                <p>
                    <label for="nickname">Surnom :</label>
                    <input type="text" name="nickname" id="nickname" value="">
                </p>
                <p>
                    <label for="origin">Origine :</label>
                    <textarea name="origin" id="origin"></textarea>
                </p>
                <p>
                    <label style="display: none" for="section"></label>
                    <select name="section" id="section">
                        <option value="">Section</option>
                        <?php
                        // Dynamically create options
                        $sections = $db -> getSectionList();
                        foreach ($sections as $s) {
                            $option = "";
                            $option .= '<option value="' . $s['idSection'] . '">';
                            $option .= ucfirst($s['secName']);
                            $option .= '</option>';
                            echo $option;
                        }
                        ?>
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