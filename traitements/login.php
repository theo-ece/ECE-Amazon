<?php
	$nom = isset($_POST["name"])? $_POST["name"] : "";
	$mdp = isset($_POST["mdp"])? $_POST["mdp"] : ""; //if-then-else

	$error ="";
	if($nom =="" && $mdp!="") { $error =  "Nom est vide. <br>"; }
	else if($mdp =="" && $nom!="") { $error =  "Le mot de passe est vide. <br>"; }
	else if($nom=="" && $mdp=="") { $error = "Pas de donnée rentrée. <br>"; }
	if($error !="") { 
		echo "Erreur: $error"; 
	} else { 
		$database = "piscine";

		//connecter l'utilisateur dans BDD
		//votre serveur = localhost et votre login = root et le mdp = ""
		$db_handle = mysqli_connect('localhost','root','');
		$db_found = mysqli_select_db($db_handle, $database);

		//si la BDD existe, aire le traitement
		if($db_found)
		{
			$request = "SELECT Mdp from utilisateur WHERE Pseudo=$nom";
			if($mdp == $request){
				$id = "SELECT id from utilisateur WHERE Pseudo=$nom"
				echo '<script type="text/javascript" src="Projettest/interlingua/log/log.js">login($id)</script>'; 
				header('Location: profil.html';)
			} else { 
				header('Location: login.html';) }
		} else {header('Location: profil.html';)}
		mysqli_close($db_handle);
	}
?>