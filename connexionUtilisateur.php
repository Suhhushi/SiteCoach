<?php
    session_start();

    if(isset($_SESSION['connected'])){
        header("Location: ./index.php");
    }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/connexionUtilisateur.css">
    <link rel="stylesheet" href="./css/body.css">
    <title>Formulaire de Connexion</title>

</head>

<body>
    <header>
        <?php include("./includes/navBar.php"); ?>
    </header>
    <main>
        <div class="container">
            <h2>Connexion</h2>
            <form action="./includes/authentification.php" method="POST">
                <div class="form-group">
                    <label for="email">Nom d'utilisateur :</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="mdp">Mot de passe :</label>
                    <input type="password" id="mdp" name="mdp" required>
                </div>
                <div>
                    <p>Vous n'avez pas de compte ? <a href="./inscriptionUtilisateur.php">Inscrivez-vous ici</a></p>
                </div>
                <div class="form-group">
                    <input type="submit" value="Se Connecter">
                </div>
            </form>
        </div>
    </main>
</body>

</html>