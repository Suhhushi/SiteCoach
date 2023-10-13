<?php
include("./connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input from the form
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $motdepasse = $_POST["motdepasse"];

    // You should perform additional validation and sanitation of user input here

    // Hash the password for security (you should use a stronger hash function)
    $hashedPassword = MD5($motdepasse);

    // Prepare and execute the SQL query to insert the user into the database
    $sql = "INSERT INTO utilisateur (nom, prenom, mail, mdp) VALUES (:nom, :prenom, :email, :motdepasse)";
    $stmt = $connexion->prepare($sql);

    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':motdepasse', $hashedPassword);


    if ($stmt->execute()) {
        echo "L'inscription a été réussie.";
    } else {
        echo "Erreur lors de l'inscription. Veuillez réessayer.";
    }
}
?>
