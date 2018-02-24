<?php

if (isset($_POST['email']) && isset($_POST['pass'])) {

	$email = $_POST['email'];
	$pass = $_POST['pass'];

	if (preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $email) && strlen($pass) >= 5) {

		// Connection à la DB
		require_once('../model/DBConnection.php'); 
		$requete = "SELECT pass FROM user WHERE email ='".$email."'";
		$pwd = mysqli_query($connexion, $requete);

		while($donnees = mysqli_fetch_assoc($pwd))
		{
			// Si il y a bien un mot de passe correspondant, on redirige vers le point d'entrée
			if (password_verify($pass, $donnees['pass'])) {
				header("Location:../entree.php");
			}
			else {
				echo "indiquer un message d'erreur";
			}
		}
	}
}










