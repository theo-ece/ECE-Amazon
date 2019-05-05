<?php
		$database = "piscine";

		//connecter l'utilisateur dans BDD
		//votre serveur = localhost et votre login = root et le mdp = ""
		$db_handle = mysqli_connect('localhost','root','');
		$db_found = mysqli_select_db($db_handle, $database);

		//si la BDD existe, aire le traitement
		if($db_found)
		{
			$nb = "SELECT COUNT(*) FROM panier";
			for ($i=0; $i < $nb; $i++) { 
				# code...
			}
			
		}
		mysqli_close($db_handle);
?>