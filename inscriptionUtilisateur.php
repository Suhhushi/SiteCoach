<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <h2>Inscription</h2>
    <form action="traitement.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" required>

        <label for="email">E-mail :</label>
        <input type="email" name="email" required>

        <label for="motdepasse">Mot de passe :</label>
        <input type="password" name="motdepasse" required>

        <label for="confirmemotdepasse">Confirmez le mot de passe :</label>
        <input type="password" name="confirmemotdepasse" required>

        <input type="submit" value="S'inscrire">
    </form>
</body>

</html>