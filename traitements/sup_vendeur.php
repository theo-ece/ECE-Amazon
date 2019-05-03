<?php
$ID = isset($_POST["ID_vendeur"])? $_POST["ID_vendeur"] : "";

if($ID!=""){
	$database = "piscine";
	//connecter l'utilisateur dans BDD
	//votre serveur = localhost et votre login = root et le mdp = ""
	$db_handle = mysqli_connect('localhost','root','');
	$db_found = mysqli_select_db($db_handle, $database);

	//si la BDD existe, aire le traitement
	if($db_found){
		$q="SELECT COUNT(1) FROM utilisateur WHERE id=$ID";
		$r=mysql_query($q);
		$row=mysql_fetch_row($r);
		//Now to check, we use an if() statement
		if($row[0] >= 1) {
			$sql = "DELETE from utilisateur WHERE id=$ID";
		} else {
			echo"<script language=\"javascript\">";
			echo"alert('Vendeur innexistant')";
			echo"</script>";
			echo"<script language=\"javascript\">";
			echo 'window.location.href = "../profil_admin.html";';
			echo"</script>";
		}
	}
	mysqli_close($db_handle);
} else {
	echo"<script language=\"javascript\">";
	echo"alert('Champ vide')";
	echo"</script>";

	echo"<script language=\"javascript\">";
	echo 'window.location.href = "../profil_admin.html";';
	echo"</script>";
}
?>