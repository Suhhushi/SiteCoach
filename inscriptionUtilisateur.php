<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/body.css">
    <link rel="stylesheet" href="./css/inscriptionUtilisateur.css">

    <title></title>
</head>

<header>
    <?php include("./includes/navBar.php"); ?>
</header>

<body>
    <div>
        <h1 class="titre_inscription">Inscription</h1>
    </div>
    <main>
        <form action="./includes/inscription.php" method="POST" onsubmit="return validateForm()">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" required>

            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" required>

            <label for="email">Mail :</label>
            <input type="email" name="email" id="email" required>

            <label for="motdepasse">Mot de passe :</label>
            <input type="password" name="motdepasse" id="motdepasse" required>

            <label for="confirmemotdepasse">Confirmez le mot de passe :</label>
            <input type="password" name="confirmemotdepasse" id="confirmemotdepasse" required>

            <input type="submit" value="S'inscrire">
        </form>
    </main>
</body>

<script>
    function validateForm() {
        // Validation pour le champ "Nom"
        var nomInput = document.getElementById("nom");
        var nomValue = nomInput.value;
        var nomPattern = /^[A-Za-z\s]+$/; // Autorise seulement les lettres et les espaces

        if (!nomPattern.test(nomValue)) {
            alert("Le champ Nom ne doit contenir que des lettres et des espaces.");
            return false;
        }

        // Validation pour le champ "Prénom"
        var prenomInput = document.getElementById("prenom");
        var prenomValue = prenomInput.value;
        var prenomPattern = /^[A-Za-z\s]+$/; // Autorise seulement les lettres et les espaces

        if (!prenomPattern.test(prenomValue)) {
            alert("Le champ Prénom ne doit contenir que des lettres et des espaces.");
            return false;
        }

        // Validation pour le champ "Email"
        var emailInput = document.getElementById("email");
        var emailValue = emailInput.value;
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; // Format d'e-mail simple

        if (!emailPattern.test(emailValue)) {
            alert("L'adresse e-mail n'est pas au bon format.");
            return false;
        }

        // Validation pour le champ "Mot de passe"
        var motdepasseInput = document.getElementById("motdepasse");
        var motdepasseValue = motdepasseInput.value;
        //minimum 8 caractères, au moins une lettre majuscule, une lettre minuscule et un chiffre
        var motdepassePattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d\W]{8,}$/;

        if (!motdepassePattern.test(motdepasseValue)) {
            alert("Le mot de passe doit contenir au moins 8 caractères, au moins une lettre majuscule, une lettre minuscule et un chiffre.");
            return false;
        }

        // Validation pour le champ "Confirmez le mot de passe"
        var confirmemotdepasseInput = document.getElementById("confirmemotdepasse");
        var confirmemotdepasseValue = confirmemotdepasseInput.value;

        if (motdepasseValue != confirmemotdepasseValue) {
            alert("Les mots de passe ne correspondent pas.");
            return false;
        }
    }
</script>

</html>