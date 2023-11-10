<?php
// Inclusion du fichier de connexion à la base de données
include("./connexion.php");

// Vérification si le formulaire a été soumis (méthode POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données postées depuis le formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $motdepasse = $_POST["motdepasse"];

    // Hachage du mot de passe (souvent préférable de stocker les mots de passe de manière sécurisée)
    $hashedPassword = MD5($motdepasse);

    // Définition de la requête SQL d'insertion
    $sql = "INSERT INTO utilisateur (nom, prenom, email, mdp) VALUES (:nom, :prenom, :email, :motdepasse)";

    // Préparation de la requête SQL
    $stmt = $connexion->prepare($sql);

    // Liaison des valeurs aux paramètres de la requête SQL
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':motdepasse', $hashedPassword);

    // Exécution de la requête SQL
    if ($stmt->execute()) {
        // Affichage d'un message en cas de succès de l'inscription
        echo "L'inscription a été réussie.";
    } else {
        // Affichage d'un message en cas d'échec de l'inscription
        echo "Erreur lors de l'inscription. Veuillez réessayer.";
    }
}
?>
