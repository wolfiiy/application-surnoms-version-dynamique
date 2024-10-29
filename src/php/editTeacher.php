<?php
/**
 * Author: STE
 * Date: October 29th, 2024
 * Description: Lets the user edit a teacher's information.
 */

require('database.php');
$db = new Database();

// Get the requested teacher
if (isset($_GET['id'])) {
    $teacher = $db -> getOneTeacher($_GET['id']);
    $section = $db -> getSectionById($teacher['fkSection']);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/style.css" rel="stylesheet">
    <title>Modifier <?=$teacher['teaNickname']?></title>
</head>
<body>
    <?php include('header.php');?>

    <div class="container">
        <div class="user-body">
            <form action="checkForm.php?id=<?=$teacher['idTeacher']?>" method="post" id="form">
                <h3>Modification de <?=$teacher['teaNickname']?></h3>
                <p>
                    <input type="radio" id="genre1" name="genre" value="M" 
                        <?php 
                            if ($teacher['teaGender'] == 'M') echo "checked";
                        ?>
                    >
                    <label for="genre1">Homme</label>
                    <input type="radio" id="genre2" name="genre" value="F"
                        <?php 
                            if ($teacher['teaGender'] == 'F') echo "checked";
                        ?>
                    >
                    <label for="genre2">Femme</label>
                    <input type="radio" id="genre3" name="genre" value="A"
                        <?php 
                            if ($teacher['teaGender'] == 'A') echo "checked";
                        ?>
                    >
                    <label for="genre3">Autre</label>
                </p>
                <p>
                    <label for="lastname">Nom :</label>
                    <input type="text" name="lastname" id="lastname" value="<?=$teacher['teaName']?>">
                </p>
                <p>
                    <label for="firstname">Prénom :</label>
                    <input type="text" name="firstname" id="firstname" value="<?=$teacher['teaFirstname']?>">
                </p>
                <p>
                    <label for="nickname">Surnom :</label>
                    <input type="text" name="nickname" id="nickname" value="<?=$teacher['teaNickname']?>">
                </p>
                <p>
                    <label for="origin">Origine :</label>
                    <textarea name="origin" id="origin"><?=$teacher['teaOrigine']?></textarea>
                </p>
                <p>
                    <label for="section">Section :</label>
                    <select name="section" id="section">
                        <?php
                        // Dynamically create options
                        $sections = $db -> getSectionList();
                        foreach ($sections as $s) {
                            // Set the teacher's section to selected
                            if ($section['idSection'] == $s['idSection'])
                                $selected = 'selected';
                            else
                                $selected = null;

                            $opt = '<option value="' . $s['idSection'] . '" ' . $selected . '>';
                            $opt .= ucfirst($s['secName']);
                            $opt .= '</option>';

                            echo $opt;
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

    <?php include('footer.php');?>
</body>
</html>