<!-- 
ETML
Authors: GCR, STE
Date: December 8th, 2024
Description: Holds the form used to modify a teacher from the database.

isEdit
-->

<div class="container">
    <div class="user-body">
        <form action="<?=$formAction;?>" method="post" id="form">
            <h3><?=$formTitle;?></h3>
            <p>
                <?=$genderInput;?>
            </p>
            <p>
                <label for="lastname">Nom :</label>
                <input type="text" 
                       name="lastname" 
                       id="lastname" 
                       value="<?=$lastName; ?>"
                >
            </p>
            <p>
                <label for="firstname">Prénom :</label>
                <input type="text" 
                       name="firstname" 
                       id="firstname" 
                       value="<?=$firstName; ?>"
                >
            </p>
            <p>
                <label for="nickname">Surnom :</label>
                <input type="text" 
                       name="nickname" 
                       id="nickname" 
                       value="<?=$nickname; ?>"
                >
            </p>
            <p>
                <label for="origin">Origine :</label>
                <textarea name="origin" 
                          id="origin"><?=$origin; ?></textarea>
            </p>
            <p>
                <label for="section">Section :</label>
                <select name="section" id="section">
                    <?=$sectionList; ?>
                </select>
            </p>
            <p>
                <input type="submit" value="<?=$submitLabel;?>">
                <button type="button" 
                        onclick="document.getElementById('form').reset();"
                >
                    Effacer
                </button>
            </p>
        </form>
    </div>
    <div class="user-footer">
        <a href="index.php">
            Retour à la page d'accueil
        </a>
    </div>
</div>