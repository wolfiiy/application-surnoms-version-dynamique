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
                    <?=$sectionList;?>
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