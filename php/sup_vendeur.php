<?php
$ID = isset($_POST["ID_vendeur"])? $_POST["ID_vendeur"] : "";

if($ID!=""){
	$database = "piscine";
	$db_handle = mysqli_connect('localhost','root','');
	$db_found = mysqli_select_db($db_handle, $database);
	if($db_found){
                $sql = "SELECT * FROM utilisateur WHERE id LIKE '$ID';";
                $result = mysqli_query($db_handle, $sql);
                if(mysqli_num_rows($result))                    
                {
	                $sql2 = "DELETE FROM utilisateur WHERE id LIKE '$ID' AND Cat LIKE 'vendeur';";
	                if (mysqli_query($db_handle, $sql2)) {
					    echo"<script language=\"javascript\">";
						echo"alert('Vendeur dégagé.')";
						echo"</script>";
						header('Location: check.html');
						exit();
					} else {
					    echo"<script language=\"javascript\">";
						echo"alert('Suppression ratée.')";
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