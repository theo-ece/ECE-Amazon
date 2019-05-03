<?php
session_start(); // On démarre la session AVANT toute chose
$_SESSION['panier']="";
?>
 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre de ma page</title>
    </head>
    <body>
    <p>Re-bonjour !</p>
    <p>
        Pseudo :  <?php echo $_SESSION['Pseudo'];?><br>
        Type : <?php echo $_SESSION['type']; ?><br>
        Connexion : <?php echo $_SESSION['connect']; ?><br>
        Panier :
        <?php
        $tab=array("Item 1", "Item 2", "Item 3");
        //$tab=array();
        $_SESSION['panier']=$tab;
        
        if(!$_SESSION['panier']){
            echo "pannier vide";
            $siz = sizeof($_SESSION['panier']);
            echo "$siz";
        } else
        {
            echo "pannier remplis";
            echo '<pre>'.print_r($_SESSION['panier'],TRUE).'</pre>';
            $siz = sizeof($_SESSION['panier']);
            echo "$tab[1]";
        }
        ?>
    </p>
    </body>
</html>