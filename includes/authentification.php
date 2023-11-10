<?php
	// Démarrage de la session PHP
	session_start();
	
	// Initialisation des variables de session 'connected' et 'admin' à false
	$_SESSION['connected'] = false;

	// Définition de la fonction 'connecter'
	function connecter(){
		// Inclusion du fichier de connexion à la base de données
		include("../includes/connexion.php");

		// Récupération de l'email et hachage du mot de passe saisi
		$email = $_POST['email'];
		$mdpSaisi = md5($_POST['mdp']); // Le mot de passe est haché avec MD5 (non recommandé pour la sécurité)

		$connected = false;

		// Requête SQL pour récupérer un utilisateur avec l'email saisi
		$sql = "SELECT * FROM utilisateur WHERE email = '$email'";
		$result = $connexion->query($sql);

		// Parcours des résultats de la requête
		while($ligne = $result->fetch()){
			// Vérification du mot de passe saisi avec le mot de passe de l'utilisateur dans la base de données
			if ($ligne['mdp'] == $mdpSaisi){
				// Si les mots de passe correspondent, définir 'connected' à true dans la session
				$_SESSION['connected'] = true;
				$connected = true;
			}
		}
		// Fermeture de la connexion à la base de données
		$connexion = NULL;

		// Retourne l'état de connexion (true si l'authentification a réussi, sinon false)
		return $connected;
	}

	// Appel de la fonction 'connecter' pour tenter l'authentification
	if (connecter()){
				// Redirection vers une autre page (index.php)
				header("Location: ../index.php");
	}
	else{
		// Affiche un message d'erreur en utilisant JavaScript pour un pop-up
		echo '<script>alert("L\'authentification a échoué. Veuillez vérifier vos identifiants.");</script>';

		// Redirection vers une autre page (connexionUtilisateur.php)
		header("refresh: 0.1; url=../connexionUtilisateur.php");
	}

?>
