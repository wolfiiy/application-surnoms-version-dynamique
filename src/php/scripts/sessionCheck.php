<?php
/**
 * ETML
 * Author: STE
 * Date: December 8th, 2024
 * Description: Checks whether the session is active and the user logged in.
 */

session_start();
$isLoggedIn = isset($_SESSION['user']);
?>