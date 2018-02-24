<?php

if (isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['passControl']) && $_POST['pass'] === $_POST['passControl'] ) {

	$email = htmlspecialchars($_POST['email']);
	$pass = htmlspecialchars($_POST['pass']);

	if (preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $email)) {
		
		if (strlen($pass) >= 5 ) {
			// Inscription dans la DB
			require_once('../model/DBConnection.php');

			// On insère le nouvel utilisateur dans la DB
			$isExist = 'SELECT email, pass FROM user WHERE email="'.$email.'" AND pass="'.$pass.'"';
			$exist = mysqli_query($connexion, $isExist);
			$row = mysqli_num_rows($exist);

			if ($row > 0) {
				echo "cet utilisateur existe déjà";
			} else {
			 	$addUser = mysqli_query($connexion,'INSERT INTO user(email, pass) VALUES ("'.$email.'", "'.$pass.'")');
			}
		} else {
			echo "le mot de passe doit contenir plus de 5 carractères";
		}

	} else {
		echo "L'email est incorrect";
	}

}