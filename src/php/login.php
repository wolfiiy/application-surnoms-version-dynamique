<?php
/**
 * Authors: STE
 * Date: November 11th, 2024
 * Description: Lets the user log into the application.
 */

require_once('models/Database.php');
$db = new Database();

session_start();

// Attempt to login if the form has been filled
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Check if username and password are valid
    if (empty($username) || empty($password)) {
        error_log("Login failed: username or password is empty.");
        header("Location: index.php?error=invalid_input");
        exit();
    } else {
        $db -> loginUser($username, $password);
    }
}
?>