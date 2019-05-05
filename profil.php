<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$photo_profil="";
$desc_nom="";
$desc_prenom="";
$pseudo = $_SESSION['Pseudo'];
$mail="";
$adresse="";
$ville="";
$cp="";
$pays="";
$carte="";
$num="";


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
    $photo_profil = $row["Photo"];
    $desc_nom=$row["Nom"];
    $desc_prenom=$row["Prenom"];
    $mail=$row["Mail"];
    $adresse=$row["Adresse"];
    $ville=$row["Ville"];
    $cp=$row["CP"];
    $pays=$row["Pays"];
    $carte=$row["Typecarte"];
    $num=$row["Numero"];
  }
}
mysqli_close($db_handle);
?>
<!DOCTYPE html>
<html lang="">
<head>
<title>Profil</title>
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
        <li><a href="php/deconnexion.php">Déconnexion</a></li>
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

<div class="wrapper row3">
  <main class="hoc container clear"> 
    <div class="sectiontitle">
      <h6 class="heading"><?php echo "$desc_nom $desc_prenom"; ?></h6>
      <p>Profil client</p>
    </div>
    <div class="group">
      <div class="one_half first">
        <img class="inspace-10 borderedbox" src="<?php echo $photo_profil?>" alt="">
      </div>
        <div class="one_half">
          <ul class="nospace group">
            <h6 class="heading font-x1">Informations personnelles</h6>
            <li class="one_half first">
              <p>Nom : <?php echo "$desc_nom"; ?> Prénom : <?php echo "$desc_prenom"; ?> Pseudo : <?php echo "$pseudo"; ?></p>
            </li> 
            <li class="one_half first">
              <p>Adresse : <?php echo "$adresse $cp $ville $pays"; ?></p>
            </li>    
          </ul>
        </div>
        <div>
          <ul class="nospace group">
            <li class="one_half " id="delete">
                <h6 class="heading font-x1"><br><br>Modifier profil</h6>
                <form method="post" class="login-form" action="php/modif_clients.php" enctype="multipart/form-data">
                  <input class="btmspace-15" type="text" value='<?php echo "$desc_nom"; ?>' id="nom" name="nom" placeholder="Nom">
                  <input class="btmspace-15" type="text" value='<?php echo "$desc_prenom"; ?>' id="prenom" name="prenom" placeholder="Prénom">
                  <input class="btmspace-15" type="text" value='<?php echo "$mail"; ?>' id="mail" name="mail" placeholder="E-mail">
                  <input class="btmspace-15" type="text" value='<?php echo "$adresse"; ?>' id="adresse" name="adresse" placeholder="Adresse">
                  <input class="btmspace-15" type="number" value='<?php echo "$cp"; ?>' id="cp" name="cp" placeholder="Code Postal">
                  <input class="btmspace-15" type="text" value='<?php echo "$ville"; ?>' id="ville" name="ville" placeholder="Ville">
                  <input class="btmspace-15" type="text" value='<?php echo "$pays"; ?>' id="pays" name="pays" placeholder="Pays">
                  <input class="btmspace-15" type="number" value='<?php echo "$num"; ?>' id="numero" name="numero" placeholder="Numéro">
                  <label for="image_p">Modifier votre photo de profil</label><input type="file" name="image_p" id="image_p"><br><br>
                  <button type="submit" onclick="" value="submit">Modifier profil</button>
                  <p><span id="problem_sup_annonce"></span></p>
                </form>
            </li>    
          </ul>
        </div>
    </div>
    <div class="clear"></div>
  </main>
</div>
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <p class="fl_left">Copyright &copy; 2016 - All Rights Reserved</p>
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
