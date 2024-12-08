<div class="container">
    <div class="user-head">
        <h3>Détail : <?=$teacher['teaFirstname'] . " " . $teacher['teaName'];?>
            <img style="margin-left: 1vw;" height="20em" src="../img/<?=$genderImage?>" alt="male symbole">
        </h3>
        <p>
            <?=ucwords($section['secName']);?>
        </p>
        <div class="actions">
            <a href="editTeacher.php?id=<?=$teacher['idTeacher']?>">
                <img height="20em" src="../img/edit.png" alt="edit icon">
            </a>
            <a href="javascript:confirmDelete()">
                <img height="20em" src="../img/delete.png" alt="delete icon"> 
            </a>
        </div>
    </div>

    <div class="user-body">
        <div class="left">
            <p>
                Surnom : <?=$teacher['teaNickname'];?>
            </p>
            <p>
                <?=$teacher['teaOrigine'];?>
            </p>
        </div>
    </div>

    <div class="user-footer">
        <a href="index.php">Retour à la page d'accueil</a>
    </div>
</div>