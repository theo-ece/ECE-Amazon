<?php

$target_dir = "images/Vetement/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["vendrevetement"])) 
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
$Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";
$Marque = isset($_POST["Marque"])? $_POST["Marque"] : "";
$Couleur = isset($_POST["Couleur"])? $_POST["Couleur"] : "";
$Prix = isset($_POST["Prix"])? $_POST["Prix"] : "";
$Categorie = isset($_POST["Categorie"])? $_POST["Categorie"] : "";
$Genre = isset($_POST["Genre"])? $_POST["Genre"] : "";
$Image = "images/Vetement/".basename( $_FILES["image"]["name"]);
$Quantite = isset($_POST["Quantite"])? $_POST["Quantite"] : "";
$Description = isset($_POST["Description"])? $_POST["Description"] : "";
$Taille = isset($_POST["Taille"])? $_POST["Taille"] : "";
$Video = isset($_POST["Video"])? $_POST["Video"] : "";


//identifier votre BDD
$database = "piscine";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
/*$p = $_SERVER['PHP_SELF'];
$page = basename ($p);*/

if ($_POST["vendrevetement"]) {
	if ($db_found) 
	{
        $sql = "SELECT * FROM vetement";
       if ($Nom != "") {
//on cherche le livre avec les paramètres titre et auteur
            $sql .= " WHERE Nom LIKE '%$Nom%'";
            if ($Marque != "") {
                $sql .= " AND Marque LIKE '%$Marque%'";
            }
        }
        $result = mysqli_query($db_handle, $sql);
//regarder s'il y a de résultat
        if (mysqli_num_rows($result) != 0) {
//le livre est déjà dans la BDD
//augmenter la quantité de livres
            $sql = "UPDATE vetement SET Quantite ='$Quantite'+Quantite WHERE Nom LIKE '%$Nom%' AND Marque LIKE'%$Marque%' ";
            $result = mysqli_query($db_handle, $sql);
            header('Location: php/check.php');
            exit();

         } else {
			$sql = "INSERT INTO vetement(Nom,Marque,Couleur,Prix,Cat,Genre,Image,Quantite,Description,Taille, Video) VALUES('$Nom','$Marque','$Couleur','$Prix','$Categorie','$Genre','$Image','$Quantite','$Description','$Taille', '$Video')";
			$result = mysqli_query($db_handle, $sql);
            echo "<script>alert(\"la vente s'est bien effectuée\")</script>";
            /*echo( "?><script>alert(\"la vente s'est bie effectuée\" )</script>; <?php " ); */
            /*if($page == "php/check.php")
            {
              echo "<script>alert(\"la vente s'est bien effectuée\")</script>";
            }
            $w1 = new EvTimer(0, 0, function ($w) {
            echo "<script>alert(\"la vente s'est bien effectuée\")</script>";
            Ev::iteration() == 5 and $w->stop();
            });*/
            header('Location: php/check.php');
            exit();
        }
        

			
	}else {
echo "Database not found";
}
}
//fermer la connexion
mysqli_close($db_handle);


?>


