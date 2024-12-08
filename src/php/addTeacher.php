<?php
/**
 * Authors: GCR, STE
 * Date: October 1st, 2024
 * Description: Allows for the addition of teachers to the nick names database.
 */

require('views/partials/head.php');
require('views/partials/nav.php');

require('models/Constants.php');
require('models/Database.php');
$db = new Database();
?>

<div class="container">
    <div class="user-body">
        <form action="checkForm.php?action=insert" method="post" id="form">
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
        <a href="index.php">Retour à la page d'accueil</a>
    </div>
</div>

<?php include('views/partials/footer.php');?>