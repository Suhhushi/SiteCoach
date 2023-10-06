<?php
	function connecter(){
		include("connexion.php");

		$idSaisi = $_POST['idUtilisateur'];
		$mdpSaisi = $_POST['mdp'];
		$connected = false;

		$sql = "SELECT * FROM utilisateur WHERE login = '$idSaisi'";
		$result = $connexion->query($sql);

		while($ligne = $result->fetch()){
			if ($ligne['mdp'] == $mdpSaisi){
				$connected = true;
				header("Location: ../index.php");
			}
		}
		$connexion = NULL;

		return $connected;
	}

	connecter();
?>