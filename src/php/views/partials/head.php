<!--
ETML
Author: GCE, STE
Date: December 8th, 2024
Description: Head HTML element template. Opens the body and dynamically sets the
             title of the page.
-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/style.css" rel="stylesheet">
    <title>
        <?php 
            echo isset($pageTitle) ? $pageTitle : "Surnoms des enseignants"; 
        ?>
    </title>
</head>
<body>