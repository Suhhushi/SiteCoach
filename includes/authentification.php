<?php
	session_start();	
	$_SESSION['connected'] = false;
	$_SESSION['admin'] = false;

	function connecter(){
		include("../includes/connexion.php");

		$email = $_POST['email'];
		$mdpSaisi = md5($_POST['mdp']);
		$connected = false;

		$sql = "SELECT * FROM utilisateur WHERE email = '$email'";
		$result = $connexion->query($sql);

		while($ligne = $result->fetch()){
			if ($ligne['mdp'] == $mdpSaisi){
				if ($ligne['type'] == 1){
					$_SESSION['admin'] = true;
				}
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