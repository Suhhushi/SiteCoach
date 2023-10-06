<?php
    session_start();

    if(!isset($_SESSION['connected']) || $_SESSION['connected'] == false){
        header("Location: ./index.php");
    }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/calendrier.css">

</head>

<body>
    <header>
        <?php include("./includes/navBar.php"); ?>
    </header>

    <?php include("./includes/calendrier.php"); ?>

</body>

</html>