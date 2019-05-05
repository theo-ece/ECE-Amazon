<?php
$ID = isset($_POST["ID"])? $_POST["ID"] : "";
$type = isset($_POST["type"])? $_POST["type"] : "";

if($ID!="" && $type!=""){
	$database = "piscine";
	//connecter l'utilisateur dans BDD
	//votre serveur = localhost et votre login = root et le mdp = ""
	$db_handle = mysqli_connect('localhost','root','');
	$db_found = mysqli_select_db($db_handle, $database);
	if($db_found){
                $sql = "SELECT * FROM $type WHERE id LIKE '$ID';";
                $result = mysqli_query($db_handle, $sql);
                if(mysqli_num_rows($result))                    
                {
	                $sql2 = "DELETE FROM $type WHERE id=$ID;";
	                if (mysqli_query($db_handle, $sql2)) {
					    echo"<script language=\"javascript\">";
						echo"alert('Element supprimé avec succès')";
						echo"</script>";
						header('Location: check.html');
						exit();
					} else {
					    echo"<script language=\"javascript\">";
						echo"alert('Suppression ratée')";
						echo"</script>";
						header('Location: check.html');
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