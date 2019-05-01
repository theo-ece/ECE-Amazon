<?php
	$nom = isset($_POST["name"])? $_POST["name"] : "";
	$mdp = isset($_POST["mdp"])? $_POST["mdp"] : ""; //if-then-else
	$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
	$email = isset($_POST["email"])? $_POST["email"] : ""; //if-then-else

	$error ="";
	if($nom =="" && $mdp!="" && $pseudo!="" && $email!="") {

	} else {echo "Erreur: $error"; }
	if($error !="") { 
		$database = "piscine";

		//connecter l'utilisateur dans BDD
		//votre serveur = localhost et votre login = root et le mdp = ""
		$db_handle = mysqli_connect('localhost','root','');
		$db_found = mysqli_select_db($db_handle, $database);

		//si la BDD existe, aire le traitement
		if($db_found)
		{
			
			$requete = "SELECT count(*) as nb FROM utilisateurs WHERE pseudo = '".$pseudo."'";






			$sql = "INSERT INTO employes(ID, Prenom, Nom, DateEmbauche, ID_Travail, Salaire, ID_Patron, ID_Dept) VALUES (110, "Ben", "Senouci", "2018-03-15", "IT_PROG",2650, 101, 90)";
		}
		mysqli_close($db_handle);
	} else { 
		
	}
?>