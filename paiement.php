
<?php

//recuperer les données venant de la page HTML
//le parametre de $_POST = "name" de <input> de votre page HTML
$Adresse = isset($_POST["Adresse"])? $_POST["Adresse"] : "";
$Ville = isset($_POST["Ville"])? $_POST["Ville"] : "";
$CP = isset($_POST["CP"])? $_POST["CP"] : "";
$Pays = isset($_POST["Pays"])? $_POST["Pays"] : "";
$Numero = isset($_POST["Numero"])? $_POST["Numero"] : "";
$Typecarte = isset($_POST["Typecarte"])? $_POST["Typecarte"] : "";
$Nomcarte = isset($_POST["Nomcarte"])? $_POST["Nomcarte"] : "";
$Numcarte = isset($_POST["Numcarte"])? $_POST["Numcarte"] : "";
$Codecarte = isset($_POST["Codecarte"])? $_POST["Codecarte"] : "";
$Datecarte = isset($_POST["Datecarte"])? $_POST["Datecarte"] : "";
$Pseudo = $_SESSION["Pseudo"];

//identifier votre BDD
$database = "piscine";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($_POST["vendre"]) {
	if ($db_found) 
	{
		$sql = "SELECT * FROM utilisateur";
		if ($Numcarte != "") {
//on cherche le livre avec les paramètres titre et auteur
			$sql .= " WHERE Numcarte LIKE '%$Numcarte%'";
			if ($Codecarte != "") {
				$sql .= " AND Codecarte LIKE '%$Codecarte%'";
			}
		}
		$result = mysqli_query($db_handle, $sql);
//regarder s'il y a de résultat
		if (mysqli_num_rows($result) != 0) {
//le livre est déjà dans la BDD
//augmenter la quantité de livres

			//$Quantite= $Quantite + Quantite;
			$sql = "UPDATE musique SET Quantite =Quantite-'$Quantite' WHERE Pseudo LIKE '%$Pseudo%' ";
			$result = mysqli_query($db_handle, $sql);
			header('Location: php/check.php');
  			exit();

		 } else {
		 	$sql = "UPDATE utilisateur SET Adresse ='$Adresse', Ville='$Ville', CP='$CP', Pays='$Pays', Numero='$Numero',Typecarte='$Typecarte',Numcarte='$Numcarte', Nomcarte='$Nomcarte', Datecarte='$Datecarte', Codecarte='$Codecarte' WHERE Pseudo LIKE '%$Pseudo%' ";
			//$sql = "INSERT INTO utilisateur(Adresse, Ville, CP, Pays, Numero, Typecarte, Numcarte, Nomcarte, Datecarte, Codecarte,) VALUES('$Adresse', '$Ville', '$CP', '$Pays', '$Numero', '$Typecarte', '$Numcarte', '$Nomcarte', '$Datecarte' ,'$Codecarte' )";
			$result = mysqli_query($db_handle, $sql);
			header('Location: index.php');
  			exit();

  		}

	}else {
echo "Database not found";
}
}
//fermer la connexion
mysqli_close($db_handle);


?>