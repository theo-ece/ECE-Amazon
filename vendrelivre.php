<?php

$target_dir = "images/Livre/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["vendrelivre"])) 
{
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}



//recuperer les données venant de la page HTML
//le parametre de $_POST = "name" de <input> de votre page HTML
$Titre = isset($_POST["Titre"])? $_POST["Titre"] : "";
$Auteur = isset($_POST["Auteur"])? $_POST["Auteur"] : "";
$Prix = isset($_POST["Prix"])? $_POST["Prix"] : "";
$Editeur = isset($_POST["Editeur"])? $_POST["Editeur"] : "";
$Resume = isset($_POST["Resume"])? $_POST["Resume"] : "";
$Categorie = isset($_POST["Categorie"])? $_POST["Categorie"] : "";
$Quantite = isset($_POST["Quantite"])? $_POST["Quantite"] : "";
$Image = "images/Livre/".basename( $_FILES["image"]["name"]);
$Video = isset($_POST["video"])? $_POST["video"] : "";


//identifier votre BDD
$database = "piscine";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($_POST["vendrelivre"]) {
	if ($db_found) 
	{
			$sql = "INSERT INTO livre(Titre,Auteur,Prix,Editeur,Resume,Cat,Quantite,Image) VALUES('$Titre','$Auteur', '$Prix', '$Editeur', '$Resume','$Categorie' ,'$Quantite','$Image')";
			$result = mysqli_query($db_handle, $sql);
			header('Location: http://localhost/ECE-Amazon-master/vendre.html');
  			exit();
			
	}else {
echo "Database not found";
}
}
//fermer la connexion
mysqli_close($db_handle);


?>


