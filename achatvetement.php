<!DOCTYPE html>
<!--
Template Name: Interlingua
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html lang="">
<head>
<title>Interlingua</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">

<div class="wrapper row0" style="background-color: #232323">
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
        <li><a href="php/check.php">Connexion</a></li>
        <li><a href="panier.php">Panier</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1" style="background-image:url(images/paris.jpeg);>
  <header id="header" class="hoc clear">
    <div id="logo" class="sectiontitle">
      <h1><a href="index.php" style="font-size: x-large; color: #FFFFFF; font-weight: 800;"><br>ECE Amazon</a></h1>
    </div>
  <nav id="mainav" class="hoc clear"> 
    <ul class="clear">
      <li><a class="drop" href="achatlivre.php">Livre</a>
        <ul>
          <li><a href="achatlivre.php #Jeunesse">Jeunesse</a></li>
          <li><a href="achatlivre.php #Aventure">Aventure</a></li>
          <li><a href="achatlivre.php #Policier">Policier</a></li>
          <li><a href="achatlivre.php #ScienceF">Science Fiction</a></li>
          <li><a href="achatlivre.php #Classique">Les grands classiques</a></li>
        </ul>
      </li>
      <li><a class="drop" href="achatmusique.php">Musique</a>
        <ul>
          <li><a href="achatmusique.php #Jazz">Jazz</a></li>
          <li><a href="achatmusique.php #Classique">Classique</a></li>
          <li><a href="achatmusique.php #Pop">Pop</a></li>
          <li><a href="achatmusique.php #Rock">Rock</a></li>
          <li><a href="achatmusique.php #Reggae">Reggae</a></li>
        </ul>
      </li>
      <li><a class="drop" href="achatvetement.php">Vêtements</a>
        <ul>
          <li><a href="achatvetement.php #Haut">Haut</a></li>
          <li><a href="achatvetement.php #Bas">Bas</a></li>
          <li><a href="achatvetement.php #Chaussure">Chaussures</a></li>
        </ul>
      </li>
      <li><a class="drop" href="achatsport.php">Sport & Loisir</a>
        <ul>
          <li><a href="achatsport.php #Ballon">Ballon</a></li>
          <li><a href="achatsport.php #Raquette">Raquette</a></li>
          <li><a href="achatsport.php #Hiver">Sport d'Hiver</a></li>
          <li><a href="achatsport.php #Velo">Vélo</a></li>
        </ul>
      </li>
      <li><a href="#venteflash">Vente Flash</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </nav>
</div>
<!-- ################################################################################################ -->

<div class="wrapper row3">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <h6 class="heading">- VETEMENTS -</h6>
      <p>- HAUT - BAS - CHAUSSURES -</p>
    </div>

    <p id="Haut">Vêtement Haut : </p>
    <ul class="nospace group services">
      <li>
      	<article class="inverse"><a href="#"></a>
       <?php
         		$database = "piscine";
				//connectez-vous dans votre BDD
				//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
				$db_handle = mysqli_connect('localhost', 'root', '');
				$db_found = mysqli_select_db($db_handle, $database);

				if ($db_found) 
				{
					
					$sql= "SELECT Nom, Marque, Prix, Nbvendu,Image FROM vetement WHERE Cat LIKE 'Haut' Order by Prix";
					$result = mysqli_query($db_handle,$sql);
					$Nbdata = mysqli_num_rows($result);
					$Nbcol=4;
					$Nbligne =0;

					if (!$result) {
    					printf("Error: %s\n", mysqli_error($db_handle));
    					exit();
					}
		?>
				      
				    <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
				                       
					if ($Nbdata != 0) {
					$j = 1;
					echo '<table border="1">';
					while ($donnees = mysqli_fetch_array($result)) {
					   if ($j%$Nbcol == 1) {
					      $Nbligne++;
					      echo "<tr>";
					      $fintr = 0;
					   }
					   echo '<td>';
					    // ------------------------------------------
					    // AFFICHAGE des DONNEES de la fiche
					   ?>
					   <img class="inspace-10 borderedbox" src="<?php echo $donnees['Image']; ?>" height="567" width="47">
					   <?php
					   echo '<br>';
					   echo "Nom: ".$donnees['Nom'];
					   echo '<br>';
					   echo "Marque: ".$donnees['Marque'];
					   echo '<br>';
					   echo "Prix: ".$donnees['Prix'];


					    // ------------------------------------------
					   echo '</td>';
					   if ($j%$Nbcol == 0) {
					      echo "</tr>"; 
					      $fintr = 1;
					   }
					   $j++;
					}
					if ($fintr!=1) { echo '</tr>'; }
					echo '</table>';
					} else {
					echo 'pas de vetement haut à afficher';
					}
				 					
				}else {
					echo "Database not found";
				}
				//fermer la connexion
				mysqli_close($db_handle);
         	 ?>
         	</article>
         	</li>
    </ul><br><br>


    <p id="Bas">Vêtements bas : </p>
    <ul class="nospace group services">
      <li>
      	<article class="inverse"><a href="#"></a>
       <?php
         		$database = "piscine";
				//connectez-vous dans votre BDD
				//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
				$db_handle = mysqli_connect('localhost', 'root', '');
				$db_found = mysqli_select_db($db_handle, $database);

				if ($db_found) 
				{

					$sql= "SELECT Nom, Marque, Prix, Nbvendu,Image FROM vetement WHERE Cat LIKE 'Bas' Order by Prix";
					$result = mysqli_query($db_handle,$sql);
					$Nbdata = mysqli_num_rows($result);
					$Nbcol=4;
					$Nbligne =0;

					if (!$result) {
    					printf("Error: %s\n", mysqli_error($db_handle));
    					exit();
					}
		?>
				      
				    <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
				                       
					if ($Nbdata != 0) {
					$j = 1;
					echo '<table border="1">';
					while ($donnees = mysqli_fetch_array($result)) {
					   if ($j%$Nbcol == 1) {
					      $Nbligne++;
					      echo "<tr>";
					      $fintr = 0;
					   }
					   echo '<td>';
					    // ------------------------------------------
					    // AFFICHAGE des DONNEES de la fiche
					   ?>
					   <img class="inspace-10 borderedbox" src="<?php echo $donnees['Image']; ?>" alt="">
					   <?php
					  echo '<br>';
					   echo "Nom: ".$donnees['Nom'];
					   echo '<br>';
					   echo "Marque: ".$donnees['Marque'];
					   echo '<br>';
					   echo "Prix: ".$donnees['Prix'];


					    // ------------------------------------------
					   echo '</td>';
					   if ($j%$Nbcol == 0) {
					      echo "</tr>"; 
					      $fintr = 1;
					   }
					   $j++;
					}
					if ($fintr!=1) { echo '</tr>'; }
					echo '</table>';
					} else {
					echo 'pas de vetement bas en stock';
					}
				 					
				}else {
					echo "Database not found";
				}
				//fermer la connexion
				mysqli_close($db_handle);
         	 ?>
         	</article>
      </li>
    </ul><br><br>



    <p id="Chaussure">Chaussure : </p>
    <ul class="nospace group services">
      <li>
      	<article class="inverse">
        <?php
         		$database = "piscine";
				//connectez-vous dans votre BDD
				//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
				$db_handle = mysqli_connect('localhost', 'root', '');
				$db_found = mysqli_select_db($db_handle, $database);

				if ($db_found) 
				{

					$sql= "SELECT Nom, Marque, Nbvendu,Image, Prix FROM vetement WHERE Cat LIKE 'Chaussure' Order by Prix";
					$result = mysqli_query($db_handle,$sql);
					$Nbdata = mysqli_num_rows($result);
					$Nbcol=4;
					$Nbligne =0;

					if (!$result) {
    					printf("Error: %s\n", mysqli_error($db_handle));
    					exit();
					}
		?>
				      
				    <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
				                       
					if ($Nbdata != 0) {
					$j = 1;
					echo '<table border="1">';
					while ($donnees = mysqli_fetch_array($result)) {
					   if ($j%$Nbcol == 1) {
					      $Nbligne++;
					      echo "<tr>";
					      $fintr = 0;
					   }
					   echo '<td>';
					    // ------------------------------------------
					    // AFFICHAGE des DONNEES de la fiche
					   ?>
					   <img class="inspace-10 borderedbox" src="<?php echo $donnees['Image']; ?>" alt="">
					   <?php
					  echo '<br>';
					   echo "Nom: ".$donnees['Nom'];
					   echo '<br>';
					   echo "Marque: ".$donnees['Marque'];
					   echo '<br>';
					   echo "Prix: ".$donnees['Prix'];

					    // ------------------------------------------
					   echo '</td>';
					   if ($j%$Nbcol == 0) {
					      echo "</tr>"; 
					      $fintr = 1;
					   }
					   $j++;
					}
					if ($fintr!=1) { echo '</tr>'; }
					echo '</table>';
					} else {
					echo 'pas de chaussures en stock';
					}
				 					
				}else {
					echo "Database not found";
				}
				//fermer la connexion
				mysqli_close($db_handle);
         	 ?>
         	</article>
      </li>
    </ul><br><br>

    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<div class="wrapper row3" style="background-color:#ACA4A3;">
  <section class="hoc container clear"> 
    <div class="sectiontitle">
      <h6 class="heading" id="venteflash">Ventes Flash</h6>
      <p>- Objets les plus vendus dans la catégorie -</p>
    </div>
    <ul class="nospace group services">
      <li class="one_quarter first">
        <article class="inverse"><a href="#"></a>
        	<h6 class="heading font-x1"><a href="#">Livre</a></h6>
         	<?php
         		$database = "piscine";
				//connectez-vous dans votre BDD
				//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
				$db_handle = mysqli_connect('localhost', 'root', '');
				$db_found = mysqli_select_db($db_handle, $database);

					if ($db_found) 
					{

						$sql= "SELECT Titre, Auteur, Prix, Nbvendu,Image FROM livre WHERE Nbvendu=(SELECT max(Nbvendu) FROM livre)";
						$result = mysqli_query($db_handle,$sql);

						if (!$result) {
    							printf("Error: %s\n", mysqli_error($db_handle));
    							exit();
							}
			?>
				      
				            <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
				           
				            while($donnees = mysqli_fetch_array($result))
				            {
				            ?>
				              <table>
				                <tr>
				                    <td>Titre:</td>
				                    <td><?php echo $donnees['Titre']; ?></td>
				                </tr>
				                <tr>
				                    <td>Auteur:</td>
				                    <td><?php echo $donnees['Auteur']; ?></td>
				                </tr>
				                <tr></tr>
				                <tr>
				                    <td>Prix:</td>
				                    <td><?php echo $donnees['Prix']; ?></td>
				                </tr>
				                <tr>
				                    <td>Nb vendu:</td>
				                    <td><?php echo $donnees['Nbvendu']; ?></td>
				                </tr>
				                <tr>
				                	<img class="inspace-10 borderedbox" src="<?php echo $donnees['Image']; ?>" alt="">
				                </tr>
				            <?php
				            } //fin de la boucle, le tableau contient toute la BDD
				       
				            ?>
				        </table>
			<?php
							
				}else {
					echo "Database not found";
				}
				//fermer la connexion
				mysqli_close($db_handle);
         	 ?>
        </article>
      </li>

      <li class="one_quarter">
        <article class="inverse"><a href="#"></a>
          <h6 class="heading font-x1"><a href="#">Musique</a></h6>
          <?php
         		$database = "piscine";
				//connectez-vous dans votre BDD
				//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
				$db_handle = mysqli_connect('localhost', 'root', '');
				$db_found = mysqli_select_db($db_handle, $database);

					if ($db_found) 
					{

						$sql= "SELECT Titre, Artiste, Prix, Nbvendu, Image FROM musique WHERE Nbvendu=(SELECT max(Nbvendu) FROM musique)";
						$result = mysqli_query($db_handle,$sql);

						if (!$result) {
    							printf("Error: %s\n", mysqli_error($db_handle));
    							exit();
							}
			?>
				      
				            <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
				           
				            while($donnees = mysqli_fetch_array($result))
				            {
				            ?>
				              <table>
				                <tr>
				                    <td>Titre:</td>
				                    <td><?php echo $donnees['Titre']; ?></td>
				                </tr>
				                <tr>
				                    <td>Artiste:</td>
				                    <td><?php echo $donnees['Artiste']; ?></td>
				                </tr>
				                <tr></tr>
				                <tr>
				                    <td>Prix:</td>
				                    <td><?php echo $donnees['Prix']; ?></td>
				                </tr>
				                <tr>
				                    <td>Nb vendu:</td>
				                    <td><?php echo $donnees['Nbvendu']; ?></td>
				                </tr>
				                <tr>
				                	<img class="inspace-10 borderedbox" src="<?php echo $donnees['Image']; ?>" alt="">
				                </tr>
				            <?php
				            } //fin de la boucle, le tableau contient toute la BDD
				       
				            ?>
				        </table>
			<?php
							
				}else {
					echo "Database not found";
				}
				//fermer la connexion
				mysqli_close($db_handle);
         	 ?>
        </article>
      </li>
      <li class="one_quarter">
        <article class="inverse"><a href="#"></a>
          <h6 class="heading font-x1"><a href="#">Vêtement</a></h6>
         <?php
         		$database = "piscine";
				//connectez-vous dans votre BDD
				//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
				$db_handle = mysqli_connect('localhost', 'root', '');
				$db_found = mysqli_select_db($db_handle, $database);

					if ($db_found) 
					{

						$sql= "SELECT Nom, Marque, Prix, Nbvendu, Image FROM vetement WHERE Nbvendu=(SELECT max(Nbvendu) FROM vetement)";
						$result = mysqli_query($db_handle,$sql);

						if (!$result) {
    							printf("Error: %s\n", mysqli_error($db_handle));
    							exit();
							}
			?>
				      
				            <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
				           
				            while($donnees = mysqli_fetch_array($result))
				            {
				            ?>
				              <table>
				                <tr>
				                    <td>Nom:</td>
				                    <td><?php echo $donnees['Nom']; ?></td>
				                </tr>
				                <tr>
				                    <td>Marque:</td>
				                    <td><?php echo $donnees['Marque']; ?></td>
				                </tr>
				                <tr></tr>
				                <tr>
				                    <td>Prix:</td>
				                    <td><?php echo $donnees['Prix']; ?></td>
				                </tr>
				                <tr>
				                    <td>Nb vendu:</td>
				                    <td><?php echo $donnees['Nbvendu']; ?></td>
				                </tr>
				                <tr>
				                	<img class="inspace-10 borderedbox" src="<?php echo $donnees['Image']; ?>" alt="">
				                </tr>
				            <?php
				            } //fin de la boucle, le tableau contient toute la BDD
				       
				            ?>
				        </table>
			<?php
							
				}else {
					echo "Database not found";
				}
				//fermer la connexion
				mysqli_close($db_handle);
         	 ?>
        </article>
      </li>
      <li class="one_quarter">
        <article class="inverse"><a href="#"></a>
          <h6 class="heading font-x1"><a href="#">Sport & Loisir</a></h6>
                  <?php
         		$database = "piscine";
				//connectez-vous dans votre BDD
				//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
				$db_handle = mysqli_connect('localhost', 'root', '');
				$db_found = mysqli_select_db($db_handle, $database);

					if ($db_found) 
					{

						$sql= "SELECT Nom, Marque, Prix, Nbvendu, Image FROM vetement WHERE Nbvendu=(SELECT max(Nbvendu) FROM vetement)";
						$result = mysqli_query($db_handle,$sql);

						if (!$result) {
    							printf("Error: %s\n", mysqli_error($db_handle));
    							exit();
							}
			?>
				      
				            <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
				           
				            while($donnees = mysqli_fetch_array($result))
				            {
				            ?>
				              <table>
				                <tr>
				                    <td>Nom:</td>
				                    <td><?php echo $donnees['Nom']; ?></td>
				                </tr>
				                <tr>
				                    <td>Marque:</td>
				                    <td><?php echo $donnees['Marque']; ?></td>
				                </tr>
				                <tr></tr>
				                <tr>
				                    <td>Prix:</td>
				                    <td><?php echo $donnees['Prix']; ?></td>
				                </tr>
				                <tr>
				                    <td>Nb vendu:</td>
				                    <td><?php echo $donnees['Nbvendu']; ?></td>
				                </tr>
				                <tr>
				                	<img class="inspace-10 borderedbox" src="<?php echo $donnees['Image']; ?>" height="520" width="47">
				                </tr>
				            <?php
				            } //fin de la boucle, le tableau contient toute la BDD
				       
				            ?>
				        </table>
			<?php
							
				}else {
					echo "Database not found";
				}
				//fermer la connexion
				mysqli_close($db_handle);
         	 ?>
        </article>
      </li>
    </ul>
  </section>
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
