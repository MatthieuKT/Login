<?php

if (isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['passControl']) && $_POST['pass'] === $_POST['passControl'] ) {
	echo "stage 1";

	$email = htmlspecialchars($_POST['email']);
	$pass = htmlspecialchars($_POST['pass']);
	echo strlen($pass);

	if (preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $email)) {
		
		if (strlen($pass) >= 5 ) {
			echo "pass correct";
		} else {
			echo "le mot de passe doit contenir plus de 5 carractères";
		}

	} else {
		echo "L'email est incorrect";
	}

}