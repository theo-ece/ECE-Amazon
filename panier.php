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
  </header>
  <nav id="mainav" class="hoc clear"> <br></nav>
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
        <article><br><a href="payer.php">Passer la commande</a></article>
        <br><br><br><br><br><br><br><br><br><br><br><br>
      </div>
      <div class="clear"></div>
    </main>
  </div>
  <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
  <!-- JAVASCRIPTS -->
  <script src="layout/scripts/jquery.min.js"></script>
  <script src="layout/scripts/jquery.backtotop.js"></script>
  <script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>
