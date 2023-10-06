<?php
	session_start();	
	$_SESSION['connected'] = false;

	function connecter(){
		include("../includes/connexion.php");

		$idSaisi = $_POST['idUtilisateur'];
		$mdpSaisi = $_POST['mdp'];
		$connected = false;

		$sql = "SELECT * FROM utilisateur WHERE idUtilisateur = '$idSaisi'";
		$result = $connexion->query($sql);

		while($ligne = $result->fetch()){
			if ($ligne['mdp'] == $mdpSaisi){
				$_SESSION['connected'] = true;
				$connected = true;
				header("Location: ../index.php");
			}
		}
		$connexion = NULL;

		return $connected;
	}

	connecter();
?>