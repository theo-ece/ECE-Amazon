<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$total=0;
?>
<!DOCTYPE html>
<html lang="">
<head>
  <title>Panier</title>
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
        <li><a href="php/check.php">Connexion</a></li>
        <li><a href="panier.php">Panier</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="wrapper row1" style="background-image:url(images/paris.jpeg);">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="sectiontitle">
      <h1><a href="index.html" style="font-size: x-large; color: #FFFFFF; font-weight: 800;"><br>ECE Amazon</a></h1>
    </div>
  </header>
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
        <h6 class="heading">Votre Panier</h6>
      </div>
      <div class="group" align="center">
        <?php
        if($_SESSION['panier']){
          $tab = $_SESSION['panier'];
          $taille = sizeof($tab);

          
          $database = "piscine";
          $db_handle = mysqli_connect('localhost','root','');
          $db_found = mysqli_select_db($db_handle, $database);
          //for ($i=0; $i < $taille ; $i++){echo "$tab[$i]<br>";}
          if($db_found){
            //Pour tous les éléments du panier
            for ($i=0; $i < $taille ; $i++) { 
              $type  = array("livre","musique","sport","vetement");
              $type2 = array("Titre","Titre","Nom","Nom");
              //On regarde à quel type l'élément appartient
              for ($j=0; $j < sizeof($type); $j++) {  
                $sql = "SELECT * FROM $type[$j] WHERE $type2[$j] LIKE '$tab[$i]';";
                $result = mysqli_query($db_handle, $sql);
                if(mysqli_num_rows($result))                    
                {
                  //On affiche l'élément et son prix
                  $resultat = $db_handle->query($sql);
                  $row = $resultat->fetch_assoc();
                  $prix = $row["Prix"];
                  echo "$tab[$i] - prix : $prix euros <br>";
                  $total=$total+$prix;
                }
              }
            }
          }
          echo"<br>Total à payer : $total euros<br>";
          mysqli_close($db_handle);
        } // fin du if $_SESSION
        ?> 
        <article><br><a href="payer.html">Passer la commande</a></article>
      </div>
      <div class="clear"></div>
    </main>
  </div>
  <div class="wrapper row4 bgded overlay" style="background-color:#403E3F">
  <footer id="footer" class="hoc clear"> 
    <div class="one_third first">
      <h6 class="heading" id="contact">Contact</h6>
      <ul class="nospace btmspace-30 linklist contact"><br>
        <li><i class="fa fa-map-marker"></i>
          <address>
          37 quai de Grenelle, 75015 PARIS 
          </address>
        </li>
        <li><i class="fa fa-phone"></i> 01 44 39 06 00</li>
        <li><i class="fa fa-fax"></i> +00 (123) 456 7890</li>
        <li><i class="fa fa-envelope-o"></i> ece@amazone.com</li>
      </ul>
    </div>
    <div class="one_third" align="Left">
      <h6 class="heading">localisation</h6>
      <figure><a href="https://goo.gl/maps/pW5Pad6zzyatfhz56"><iframe class="borderedbox inspace-10 btmspace-15" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.3229716087653!2d2.2839347156394534!3d48.85205137928678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701b4f58251b%3A0x167f5a60fb94aa76!2sECE+Paris.Lyon!5e0!3m2!1sfr!2sfr!4v1556543070591!5m2!1sfr!2sfr" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe></a>
      </figure>
    </div>
  </footer>
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