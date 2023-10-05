<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/connexionUtilisateur.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <title>Formulaire de Connexion</title>

</head>
<body>
    <?php include ("../includes/navBar.php");?>
    
    <div class="container">
        <h2>Connexion</h2>
        <form action="votre_script_de_connexion.php" method="POST">
            <div class="form-group">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Se Connecter">
            </div>
        </form>
    </div>
</body>
</html>
