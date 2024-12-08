<!--
ETML
Authors: GCR, STE
Date: October 1st, 2024
Description: Header to be used throughout the nickname application. Displays the
             application's name and a navigation menu.
-->

<?php
// Path is relative to the server (i.e. src)
require_once('scripts/sessionCheck.php');
?>

<header>
    <div class="container-header">
        <div class="titre-header">
            <h1>Surnom des enseignants</h1>
        </div>
        <div class="login-container">
            <form action="<?php echo $isLoggedIn ? 'logout.php' : 'login.php'; ?>"
                  method="post">
                <?php
                    if ($isLoggedIn){
                        $role = "";
                        switch ($_SESSION['user']['privileges']) {
                            case 0:
                                $role = "guest";
                                break;
                            case 1:
                                $role = "user";
                                break;
                            case 2:
                                $role = "admin";
                            default:
                                $role = "unknown";
                                break;
                        }

                        echo "<p>" 
                            . $_SESSION['user']['login'] 
                            . " ("
                            . $role
                            . ")</p>";
                    } else {
                        $form = <<< HTML
                            <label for="username"></label>
                            <input type="text" 
                                   name="username" 
                                   id="username" 
                                   placeholder="Login">

                            <label for="password"></label>
                            <input type="password" 
                                   name="password" 
                                   id="password" 
                                   placeholder="Mot de passe">
                        HTML;

                        echo $form;
                    }
                ?>
                
                <button type="submit" class="btn <?php echo $isLoggedIn ? "btn-logout" : "btn-login" ?>">
                    <?php echo $isLoggedIn ? 'Se déconnecter' : 'Se connecter'; ?>
                </button>
            </form>
        </div>
    </div>
    <nav>
        <h2>Zone pour le menu</h2>
        <a href="index.php">Accueil</a>
        <a href="addTeacher.php">Ajouter un enseignant</a>
    </nav>
</header>