<?php
/**
 * Author: STE
 * Date: November 11th, 2024
 * Description: Logs the user off and destroy all session data.
 */

// Retrieve existing data
session_start();

// Get rid of log in information
session_unset();
session_destroy();

// Redirect the user to the home page
header("Location: ../index.php");
exit();
?>