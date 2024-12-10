<!-- 
ETML
Authors: GCR, STE
Date: December 8th, 2024
Description: Home page of the application. Displays a list of all teachers.
-->

<div class="container">
    <h3>Liste des enseignants</h3>
    <form action="vote.php" method="post">
        <button type="submit">
            Elire plusieurs
        </button>
        <?php Writer::writeAllTeacher();?>
    </form>
    <script src="../../js/script.js"></script>
</div>