<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//Information client
$mail="";
$adresse="";
$ville="";
$cp="";
$pseudo = $_SESSION['Pseudo'];
$pays="";
$typecarte="";
$numcarte="";
$nomcarte="";
$dateexpi="";
$nom="";
$prenom="";
$numero="";
$codecarte="";


//Information Panier
$total=0;



$database = "piscine";
$db_handle = mysqli_connect('localhost','root','');
$db_found = mysqli_select_db($db_handle, $database);
if($db_found){
	$sql = "SELECT * FROM utilisateur WHERE Pseudo LIKE '$pseudo' ;";
	$result = mysqli_query($db_handle, $sql);
    if(mysqli_num_rows($result))                    
	{
	    $resultat = $db_handle->query($sql);
	    $row = $resultat->fetch_assoc();
		$mail=$row["Mail"];
		$adresse=$row["Adresse"];
		$ville=$row["Ville"];
		$cp=$row["CP"];
		$pays=$row["Pays"];
		$typecarte=$row["Typecarte"];
		$numcarte=$row["Numcarte"];
		$nomcarte=$row["Nomcarte"];
		$dateexpi=$row["Datecarte"];
		$nom=$row["Nom"];
		$prenom=$row["Prenom"];
		$numero=$row["Numero"];
		$codecarte=$row["Codecarte"];
	}

	// Calcul du total du panier
	if($_SESSION['panier']){
        $tab = $_SESSION['panier'];
        $taille = sizeof($tab);
        for ($i=0; $i < $taille ; $i++) { 
            $type  = array("livre","musique","sport","vetement");
            $type2 = array("Titre","Titre","Nom","Nom");
            //On regarde à quel type l'élément appartient
            for ($j=0; $j < sizeof($type); $j++) {  
	            $sql = "SELECT * FROM $type[$j] WHERE $type2[$j] LIKE '$tab[$i]';";
	            $result = mysqli_query($db_handle, $sql);
	            if(mysqli_num_rows($result))                    
	            {
	                //On obtient l'élément et son prix
	                $resultat = $db_handle->query($sql);
	             	$row = $resultat->fetch_assoc();
	                $prix = $row["Prix"];
	                $total=$total+$prix;
	            }
        	}
        }
    }
}
mysqli_close($db_handle);
?>


<!DOCTYPE html>
<html lang="">
	<head>
		<title>Interlingua</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
	</head>
	<body id="top">
		<div class="wrapper row0">
		  <div id="topbar" class="hoc clear">
		    <div class="fl_left">
		      <ul>
		        <li><i class="fa fa-phone"></i> +33 4 78 29 77 54</li>
		        <li><i class="fa fa-envelope-o"></i> contact@ece.fr</li>
		      </ul>
		    </div>
		    <div class="fl_right">
		      <ul>
		        <li><a href="index.php"><i class="fa fa-lg fa-home"></i></a></li>
		        <li><a href="php/check.php">Votre compte</a></li>
		        <li><a href="php/deconnexion.php">Deconnexion</a></li>
		        <li><a href="panier.php">Panier</a></li>
		      </ul>
		    </div>
		  </div>
		</div>
		<div class="wrapper row1" style="background-image:url(images/paris.jpeg);>
		  <header id="header" class="hoc clear">
		    <div id="logo" class="sectiontitle">
		      <h1><a href="index.php" style="font-size: x-large; color: #FFFFFF; font-weight: 800;"><br>ECE Amazon</a></h1>
		    </div>
		    <nav id="mainav" class="hoc clear"> <br></nav>
		  </header>
		</div>
		<div class="wrapper row3">
		  <main class="hoc container clear"> 
		    <!-- main body -->
		    
		    <div class="sectiontitle">
		      <h6>Paiement</h6><br><br>  
		      <p> Somme à payer : <?php echo"$total";?> euros - <a href="panier.php"> détails ici</a></p>
		      <p>- Rentrer les paramètres pour effectuer votre paiement -</p>    
		    </div>
		    <div align="center">
		      <form action="php/payement.php"  method="post" >
		        <div style="float: left ; margin-left: 290px;">
			        <input type="text" value='<?php echo"$adresse";?>' name="Adresse" placeholder="adresse"><br>
			        <input type="text" value='<?php echo"$ville";?>' name="Ville" placeholder="ville"><br>
			        <input type="number" value='<?php echo"$cp";?>' name="CP" placeholder="code postal" required minlength="5" maxlength="5" size="5"><br>
			        <input type="name" value='<?php echo"$pays";?>' name="Pays" placeholder="pays"><br>
			        <input type="number" value='<?php echo"$numero";?>' name="Numero" placeholder="téléphone" size="20"><br>
		        </div>
		        <div style="float: left; margin-left: 60px;">
		           <select name = "Typecarte" id="type">
		                    <option>Master Card</option>
		                    <option>Paypal</option>
		                    <option>Visa</option selected="selected">
		                    <option>American Express</option>
			        </select><br>
			        <input type="name" value='<?php echo"$nomcarte";?>' name="Nomcarte" placeholder="nom sur la carte"><br>
			        <input type="Number" value='<?php echo"$numcarte";?>' name="Numcarte" placeholder="numéro carte" required minlength="16" maxlength="16" size="20"><br>
			        <input type="Number" value='<?php echo"$codecarte";?>' name="Codecarte" placeholder="code sécurité" required minlength="3" maxlength="4" size="20"><br>
			        <input type="date" value='<?php echo"$dateexpi";?>' name="Datecarte" placeholder="date d'expiration" id="dateExpiration"><br>
			        <input type="submit" name="vendre" value="valider">
		        </div>
		      </form>
		    </div>
		  </main>
		</div>
		<div class="wrapper row5">
		  <div id="copyright" class="hoc clear">
		    <p class="fl_left">Copyright &copy; 2016 - All Rights Reserved - <a href="#">Domain Name</a></p>
		    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
		  </div>
		</div>
		<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
		<!-- JAVASCRIPTS -->
		<script src="layout/scripts/jquery.min.js"></script>
		<script src="layout/scripts/jquery.backtotop.js"></script>
		<script src="layout/scripts/jquery.mobilemenu.js"></script>
	</body>
</html>