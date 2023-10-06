<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/connexionUtilisateur.css">
    <link rel="stylesheet" href="./css/navbar.css">
    <title>Formulaire de Connexion</title>

</head>

<body>
    <header>
        <?php include("./includes/navBar.php"); ?>
    </header>

    <div class="container">
        <h2>Connexion</h2>
        <form action="./includes/authentification.php" method="POST">
            <div class="form-group">
                <label for="idUtilisateur">Nom d'utilisateur :</label>
                <input type="text" id="idUtilisateur" name="idUtilisateur" required>
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe :</label>
                <input type="password" id="mdp" name="mdp" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Se Connecter">
            </div>
        </form>
    </div>
</body>

</html>