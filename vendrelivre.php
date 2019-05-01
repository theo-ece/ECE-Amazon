<?php
//recuperer les données venant de la page HTML
//le parametre de $_POST = "name" de <input> de votre page HTML
$Titre = isset($_POST["Titre"])? $_POST["Titre"] : "";
$Auteur = isset($_POST["Auteur"])? $_POST["Auteur"] : "";
$Prix = isset($_POST["Prix"])? $_POST["Prix"] : "";
$Editeur = isset($_POST["Editeur"])? $_POST["Editeur"] : "";
$Resume = isset($_POST["Résumé"])? $_POST["Résumé"] : "";
$Catégorie = isset($_POST["Catégorie"])? $_POST["Catégorie"] : "";
$Quantite = isset($_POST["Quantité"])? $_POST["Quantité"] : "";
$Image = isset($_POST["image"])? $_POST["image"] : "";
$Video = isset($_POST["video"])? $_POST["video"] : "";


//identifier votre BDD
$database = "piscine";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($_POST["vendrelivre"]) {
	if ($db_found) {
		$sql = "SELECT * FROM livre";
		if ($Titre != "") {
//on cherche le livre avec les paramètres titre et auteur
			$sql .= " WHERE Titre LIKE '%$Titre%'";
			if ($Auteur != "") {
				$sql .= " AND Auteur LIKE '%$Auteur%'";
			}
		}
		$result = mysqli_query($db_handle, $sql);
//regarder s'il y a de résultat
		if (mysqli_num_rows($result) != 0) {
//le livre est déjà dans la BDD
//augmenter la quantité de livres


			echo "Book already exists. Duplicate of book of same title and author not allowed.";




		 } else {
			$sql = "INSERT INTO livre(Titre, Auteur, Prix, Editeur, Résumé, Cat, Quantité, Image, Vidéo, Nb_vendu)
			 VALUES('$Titre', '$Auteur', '$Prix', '$Editeur', '$Editeur', '$Resume', '$Catégorie', '$Quantite', '$Image', '$Video', '0')";
			$result = mysqli_query($db_handle, $sql);
			/*header('Location: http://localhost/ECE-Amazon-master/vendre.html');
  			exit();*/
			//echo "vente réussie." . "<br>";
 //on affiche le livre ajouté
			$sql = "SELECT * FROM livres";
			if ($Titre != "") {
//on cherche le livre avec les paramètres titre et auteur
			$sql .= " WHERE Titre LIKE '%$Titre%'";
				if ($Auteur != "") {
				$sql .= " AND Auteur LIKE '%$Auteur%'";
				}
			}
			$result = mysqli_query($db_handle, $sql);
			while ($data = mysqli_fetch_assoc($result)) {
				echo "Informations sur le livre ajouté:" . "<br>";
				echo "ID: " . $data['ID'] . "<br>";
				echo "Titre: " . $data['Titre'] . "<br>";
				echo "Auteur: " . $data['Auteur'] . "<br>";
				echo "Résumé: " . $data['Résumé'] . "<br>";
				echo "Editeur: " . $data['Editeur'] . "<br>";
				echo "<br>";
			}
		}
	}else {
echo "Database not found";
}
}
//fermer la connexion
mysqli_close($db_handle);
?>