<?php
session_start();
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$mail = isset($_POST["email"])? $_POST["email"] : "";

if($pseudo!="" && $mail!="" && $mdp!="" && $nom!="" && $prenom!=""){
	$database = "piscine";
	$db_handle = mysqli_connect('localhost','root','');
	$db_found = mysqli_select_db($db_handle, $database);
	if($db_found){
        $sql = "SELECT * FROM utilisateur WHERE Pseudo LIKE '$pseudo';";
        $result = mysqli_query($db_handle, $sql);
        if(!mysqli_num_rows($result))                    
        {
         	$type = "client";
	        $sql2 = "INSERT INTO utilisateur(Nom, Prenom, Pseudo, Mail, Mdp, Cat) VALUES ('$nom', '$prenom', '$pseudo', '$mail', '$mdp', '$type');";
	        if (mysqli_query($db_handle, $sql2)) {
	           	$_SESSION["panier"]="";
	           	$_SESSION["Pseudo"]=$pseudo;
	          	$_SESSION["type"]=$type;
	           	$_SESSION["connect"]=true;
			    echo"réussis";
					    /*
						header('Location: check.php');
						exit();
						*/
			} else {
			    echo"fail";
					    /*
						header('Location: check.php');
						exit();
						*/
			}
        } 

    } else {
    	echo "BBD pas trouvée";
    }
	mysqli_close($db_handle);
} else {
	/*
	echo"<script language=\"javascript\">";
	echo"alert('Champ vide')";
	echo 'window.location.href = "check.php";';
	echo"</script>";
	*/
	echo "$nom<br>";
	echo "fail : nom :$nom prenom: $prenom pseudo : $pseudo mail : $mail mdp : $mdp";
}
?>