<?php
session_start();

if (!isset($_SESSION['connected']) || $_SESSION['connected'] == false) {
    header("Location: ./index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/calendrier.css">
    <link rel="stylesheet" href="./css/body.css">
    <link rel="stylesheet" href="./css/Seance.css">

</head>

<body>

    <header>
        <?php include("./includes/navBar.php"); ?>
    </header>
    <div class="div_filtre">
        <form method="GET">
            <label for="sport">Sport:</label>
            <select name="sport" id="sport">
                <option value="">Tous les sports</option>
                <option value="1">CrossFit</option>
                <option value="2">Football</option>
                <option value="3">Escalade</option>
            </select>

            <label for="niveau">Niveau:</label>
            <select name="niveau" id="niveau">
                <option value="">Tous les niveaux</option>
                <option value="1">Débutant</option>
                <option value="2">Intermédiaire</option>
                <option value="3">Expert</option>
            </select>


            <input type="submit" value="Filtrer">
        </form>
    </div>

    <?php include("./includes/calendrier.php"); ?>

</body>

</html>