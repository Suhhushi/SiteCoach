<?php
include("./includes/connexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Le formulaire a été soumis

    // Boucle à travers les données postées
    for ($i = 0; $i < count($_POST['nom']); $i++) {
        $idSeance = $_POST['id_seance'][$i];
        $nom = $_POST['nom'][$i];
        $rue = $_POST['rue'][$i];
        $ville = $_POST['ville'][$i];
        $heureDebut = $_POST['heure_debut'][$i];
        $heureFin = $_POST['heure_fin'][$i];
        $libelle = $_POST['libelle'][$i];
        $niveau = $_POST['niveau'][$i];

        // Construire et exécuter la requête SQL UPDATE
        $sqlUpdate = "UPDATE seance, sport, salle SET NOM_SEANCE = :nom, RUE = :rue, VILLE = :ville, HEUR_DEBUT = :heure_debut, HEUR_FIN = :heure_fin, LIBELLE = :libelle, NIVEAU = :niveau WHERE ID_SEANCE = :id_seance";

        $stmt = $connexion->prepare($sqlUpdate);
        $stmt->bindParam(':id_seance', $idSeance);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':rue', $rue);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':heure_debut', $heureDebut);
        $stmt->bindParam(':heure_fin', $heureFin);
        $stmt->bindParam(':libelle', $libelle);
        $stmt->bindParam(':niveau', $niveau);

        if ($stmt->execute()) {
            echo "Mise à jour réussie pour l'ID de séance : " . $idSeance . "<br>";
        } else {
            echo "Erreur lors de la mise à jour pour l'ID de séance : " . $idSeance . "<br>";
        }
    }
}

// Récupérez les données actuelles de la base de données
$sqlSeance = "SELECT * FROM seance, sport, salle WHERE seance.ID_SALLE = salle.ID_SALLE AND seance.ID_SPORT = sport.ID_sport ORDER BY JOUR, HEUR_DEBUT";

try {
    $resultatSeance = $connexion->query($sqlSeance);
} catch (PDOException $e) {
    die("\n Erreur de la requête SQL: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page d'administration</title>
</head>
<body>
    <h2>Modifier les données du calendrier</h2>
    <form method="post">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Rue</th>
                <th>Ville</th>
                <th>Heure de début</th>
                <th>Heure de fin</th>
                <th>Libellé</th>
                <th>Niveau</th>
                <th>Actions</th>
            </tr>
            <?php
            while ($ligneSeance = $resultatSeance->fetch()) {
                echo '<tr>';
                echo '<td>' . $ligneSeance["ID_SEANCE"] . '</td>';
                echo '<td><input type="text" name="nom[]" value="' . $ligneSeance["NOM_SEANCE"] . '"></td>';
                echo '<td><input type="text" name="rue[]" value="' . $ligneSeance["RUE"] . '"></td>';
                echo '<td><input type="text" name="ville[]" value="' . $ligneSeance["VILLE"] . '"></td>';
                echo '<td><input type="text" name="heure_debut[]" value="' . $ligneSeance["HEUR_DEBUT"] . '"></td>';
                echo '<td><input type="text" name="heure_fin[]" value="' . $ligneSeance["HEUR_FIN"] . '"></td>';
                echo '<td><input type="text" name="libelle[]" value="' . $ligneSeance["LIBELLE"] . '"></td>';
                echo '<td>
                        <select name="niveau[]">
                            <option value="1" ' . ($ligneSeance["NIVEAU"] == 1 ? "selected" : "") . '>Débutant</option>
                            <option value="2" ' . ($ligneSeance["NIVEAU"] == 2 ? "selected" : "") . '>Intermédiaire</option>
                            <option value="3" ' . ($ligneSeance["NIVEAU"] == 3 ? "selected" : "") . '>Expert</option>
                        </select>
                    </td>';
                echo '<input type="hidden" name="id_seance[]" value="' . $ligneSeance["ID_SEANCE"] . '">';
                echo '</tr>';
            }
            ?>
        </table>
        <input type="submit" value="Mettre à jour">
    </form>
</body>
</html>
