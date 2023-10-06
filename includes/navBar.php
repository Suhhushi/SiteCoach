<?php
    session_start();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar.css"> 

</head>
<body>

<nav class="navbar">
        <div class="logo">
            <img src="../assets/image/logoCoach.png" alt="Logo">
        </div>
        <ul class="nav_links">
            <li><a href="./index.php">Accueil</a></li>
            <?php
            if ($_SESSION['connected'] == true){
                echo '<li><a href="./Seance.php">Seance</a></li>';
                echo '<li><a href="deconnexion.php">Deconnexion</a></li>';
            }
            else
                echo '<li><a href="./connexionUtilisateur.php">Connexion</a></li>';
            ?>
        </ul>
</nav>
    
</body>
</html>
