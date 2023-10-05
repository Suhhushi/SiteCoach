<?php
	include("verifyConnexion.php");
	
    $idSaisi = $_SESSION['idUtilisateur'];
    $mdpSaisi = $_SESSION['mdp'];

    $sql = "SELECT * FROM utilisateur WHERE login = '$idSaisi'";
	$result = $connexion->query($sql);
	$ligne = $result->fetch();

	if  (!$ligne)
	{
		echo "<script>alert('Votre login ou mot de passe est incorrect');</script>"; 

		include("idmdp.php");

		exit; 
	}
	else{
		$motPasseBdd = $ligne['mdp'];
	}

	if  ($mdpSaisi != $motPasseBdd )
	{
		echo "<script>alert('Votre login ou mot de passe est incorrect');</script>"; 
		include("idmdp.php");

		exit; 
	}
	else
	{
		
		$_SESSION['connecte'] = true;
		
        if ($ligne['poste'] == "comptable"){
            header('Location: ../pageComptable/comptable.php');

        }
        else{
            if($ligne['poste'] == "medicale"){
                header('Location: ../pageVisiteur/visiteur.php');
            }
        }

		ob_end_flush();

		exit;
	}

	$connexion = NULL;
?>