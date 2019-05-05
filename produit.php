<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$photo_profil="";
$nom="";
$origine="";
$pseudo = $_SESSION['Pseudo'];
$type_produit = $_SESSION['TProduit'];
$nom_produit = $_SESSION['Produit'];
$prix="";
$test="";
$ss_cat="";
$video="";
$image="";
$quantite="";
if($type_produit=="livre"){
  $test="Titre";
  $ss_cat="Auteur";
   $resume="Resume";
} elseif ($type_produit=="sport" || $type_produit=="vetement") {
  $test="Nom";
  $ss_cat="Marque";
  $resume="Description";
}elseif ($type_produit=="musique") {
  $test="Titre";
  $ss_cat="Artiste";
   $resume="Description";
}

$database = "piscine";
$db_handle = mysqli_connect('localhost','root','');
$db_found = mysqli_select_db($db_handle, $database);
if($db_found){
  $sql = "SELECT * FROM $type_produit WHERE $test LIKE '$nom_produit' ;";
  $result = mysqli_query($db_handle, $sql);
  if(mysqli_num_rows($result))                    
  {
    $resultat = $db_handle->query($sql);
    $row = $resultat->fetch_assoc();
    $nom=$row["$test"];
    $origine=$row["$ss_cat"];
    $prix=$row["Prix"];
    $video=$row["Video"];
    $image=$row["Image"];
    $quantite=$row["Quantite"];
    $Description=$row["$resume"];
  }
}
mysqli_close($db_handle);
?>
<!DOCTYPE html>
<html lang="">
<head>
<title>Produit</title>
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
        <li><a href="php/deconnexion.php">Connection</a></li>
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
      <h6 class="heading"><?php echo "$type_produit $origine $nom"?></h6>
    </div>
    <div class="group">
      <div class="one_half first">
        <img class="inspace-10 borderedbox" src="<?php echo $image?>" alt="">
      </div>
      <div class="one_half" align="center">
        <ul class="nospace group">
          <h6 class="heading font-x1">Informations sur le produit</h6>
          <li class="one_half first">
            <p>Détails : <?php echo "$test $nom"; ?> <br> Prix : <?php echo "$prix"; ?> <br> Description : <?php echo "$resume"; ?></p>
          </li> 
          <li class="one_half">
            <iframe width="400" height="400" src='https://www.youtube.com/embed/<?php echo "$video"; ?>' frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </li>    
          <li class="one_half" id="ajout">
            <article><i class="icon btmspace-30 fa fa-joomla"></i>
              <form method="post" class="login-form" action="php/ajouter_o_panier.php">
                <button type="submit" onclick="" value="submit">Ajouter au panier</button>
              </form>
            </article>
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