<?php
$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$mail = isset($_POST["mail"])? $_POST["mail"] : "";
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";

if($pseudo!="" && $mail!="" && $mdp!=""){
	$database = "piscine";
	$db_handle = mysqli_connect('localhost','root','');
	$db_found = mysqli_select_db($db_handle, $database);
	if($db_found){
                $sql = "SELECT * FROM utilisateur WHERE Pseudo LIKE '$pseudo';";
                $result = mysqli_query($db_handle, $sql);
                if(!mysqli_num_rows($result))                    
                {
                	$type = "vendeur";
	                $sql2 = "INSERT INTO utilisateur(Pseudo, Mail, Mdp, Cat) VALUES ('$pseudo', '$mail', '$mdp', '$type');";
	                if (mysqli_query($db_handle, $sql2)) {
					    echo"<script language=\"javascript\">";
						echo"alert('Ajout réussis.')";
						echo"</script>";
						header('Location: check.php');
						exit();
					} else {
					    echo"<script language=\"javascript\">";
						echo"alert('Ajout raté.')";
						echo"</script>";
						header('Location: check.php');
						exit();
					}
                } 

          }
	mysqli_close($db_handle);
} else {
	echo"<script language=\"javascript\">";
	echo"alert('Champ vide')";
	echo 'window.location.href = "check.php";';
	echo"</script>";
}
?>