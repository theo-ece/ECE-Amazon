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
        <li><a href="index.html"><i class="fa fa-lg fa-home"></i></a></li>
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
      <h1><a href="index.html" style="font-size: x-large; color: #FFFFFF; font-weight: 800;"><br>ECE Amazon</a></h1>
    </div>
  <nav id="mainav" class="hoc clear"> 
    <ul class="clear">
      <li><a class="drop" href="categories/gallery.html">Livre</a>
        <ul>
          <li><a href="categories/full-width.html">Jeunesse</a></li>
          <li><a href="catégories/sidebar-left.html">Aventure</a></li>
          <li><a href="categories/sidebar-right.html">Policier</a></li>
          <li><a href="categories/full-width.html">Science Fiction</a></li>
          <li><a href="catégories/sidebar-left.html">Les grands classiques</a></li>
        </ul>
      </li>
      <li><a class="drop" href="categories/full-width.html">Musique</a>
        <ul>
          <li><a href="musique/full-width.html">Jazz</a></li>
          <li><a href="musique/sidebar-left.html">Classique</a></li>
          <li><a href="musique/sidebar-right.html">Pop</a></li>
          <li><a href="musique/full-width.html">Rock</a></li>
          <li><a href="musique/sidebar-left.html">Reggae</a></li>
        </ul>
      </li>
      <li><a class="drop" href="catégories/sidebar-left.html">Vêtements</a>
        <ul>
          <li><a href="vetements/full-width.html">Haut</a></li>
          <li><a href="vetements/sidebar-left.html">Bas</a></li>
          <li><a href="vetements/sidebar-right.html">Chaussures</a></li>
        </ul>
      </li>
      <li><a class="drop" href="categories/sidebar-right.html">Sport & Loisir</a>
        <ul>
          <li><a href="s&l/full-width.html">Ballon</a></li>
          <li><a href="s&l/sidebar-left.html">Raquette</a></li>
          <li><a href="s&l/sidebar-right.html">Sport d'Hiver</a></li>
          <li><a href="s&l/full-width.html">Vélo</a></li>
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
