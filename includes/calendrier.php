<?php

include("../includes/connexion.php");

$sqlSeance = "SELECT * FROM seance, sport, salle WHERE seance.ID_SALLE = salle.ID_SALLE AND seance.ID_SPORT = sport.ID_sport ORDER BY JOUR, HEUR_DEBUT";
try{
    $resultatSeance = $connexion->query($sqlSeance);

}
catch(PDOException $e){
    die("\n Erreur de la requete SQL: ".$e->getMessage());
}

while ($ligneSeance = $resultatSeance->fetch()) {
    $jour_seance = $ligneSeance["JOUR"];
    // Ajoutez la séance au jour approprié dans le tableau associatif
    $seances_par_jour[$jour_seance][] = $ligneSeance;
}

// Étape 2 : Affichez les données dans un tableau HTML avec des colonnes pour chaque jour
echo '<table border="1">';
echo '<tr>';
foreach ($seances_par_jour as $jour => $seances) {
    switch ($jour) {
        case "1":
            echo '<th> Lundi </th>';
            break;
        case "2":
            echo '<th> Mardi </th>';
            break;
        case "3":
            echo '<th> Mercredi </th>';
            break;
        case "4":
            echo '<th> Jeudi </th>';
            break;
        case "5":
            echo '<th> Vendredi </th>';
            break;
        case "6":
            echo '<th> Vendredi </th>';
            break;
    }
}
echo '</tr>';

$max_seances = max(array_map('count', $seances_par_jour));

for ($i = 0; $i < $max_seances; $i++) {
    echo '<tr>';
    foreach ($seances_par_jour as $jour => $seances) {
        if (isset($seances[$i])) {
            $seance = $seances[$i];
            echo '<td>';
            echo '<p>' . $seance["NOM"] ." ". $seance["RUE"] . '</p>';
            echo '<p>' . $seance["VILLE"] . '</p>';
            echo '<p>' . $seance["HEUR_DEBUT"] . '-' . $seance["HEUR_FIN"] . '</p>';
            echo '<p>' . $seance["LIBELLE"] . '</p>';
            echo '<b> Niveau : ' . $seance["NIVEAU"] . '</b>';
            echo '</td>';
        } else {
            echo '<td></td>';
        }
    }
    echo '</tr>';
}

echo '</table>';
