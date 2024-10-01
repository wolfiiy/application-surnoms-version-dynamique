<!--
Authors: GCR, STE
Date: October 1st, 2024
Dexription: Header to be used throughout the nickname application. Displays the
application's name and a navigation menu.
-->

<header>
    <div class="container-header">
        <div class="titre-header">
            <h1>Surnom des enseignants</h1>
        </div>
        <div class="login-container">
            <form action="#" method="post">
                <label for="user"> </label>
                <input type="text" name="user" id="user" placeholder="Login">
                <label for="password"> </label>
                <input type="password" name="password" id="password" placeholder="Mot de passe">
                <button type="submit" class="btn btn-login">Se connecter</button>
            </form>
        </div>
    </div>
    <nav>
        <h2>Zone pour le menu</h2>
        <a href="index.php">Accueil</a>
        <a href="addTeacher.php">Ajouter un enseignant</a>
    </nav>
</header>