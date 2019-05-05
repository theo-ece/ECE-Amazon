<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

$_SESSION['Pseudo'] = '';
$_SESSION['type']='';
$_SESSION['connect'] = '';
$_SESSION['panier'] = '';

If (isset($_POST["nom"]) &&  isset($_POST["mdp"])) {

    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $mdp = isset($_POST["mdp"])? $_POST["mdp"] : ""; //if-then-else


    
    $database = "piscine";
    $db_handle = mysqli_connect('localhost','root','');
    $db_found = mysqli_select_db($db_handle, $database);
    if($db_found)
    {
            /*
            $sql_pass = "SELECT Mdp from utilisateur WHERE Pseudo = $nom";
            $resultat = mysqli_query($db_handle, $sql_pass);
            $pass = mysqli_fetch_assoc($resultat); 
            echo "$pass";
            
            $pass ="mdp";
            */

            $sql = "SELECT * FROM utilisateur WHERE Pseudo LIKE '$nom' AND Mdp LIKE '$mdp'; ";
            $result = mysqli_query($db_handle, $sql);
            if(mysqli_num_rows($result))
            {



                $sql2 = "SELECT * FROM utilisateur WHERE Pseudo like '$nom'; ";
                $resultat = $db_handle->query($sql2);
                $row = $resultat->fetch_assoc();
                $type = $row["Cat"];


                $tab_pannier = array("Vélo", "mocassin", "Ski homme", "Hypérion", "Ubik");


                $_SESSION["Pseudo"]=$nom;
                $_SESSION["type"]=$type;
                $_SESSION["connect"]=true;
                $_SESSION["panier"]=$tab_pannier;
                header('Location: check.php');
                exit();
            }
            else {
                header('Location: ../login.html');
                exit();
            }
                //$type = mysqli_fetch_assoc($result);

                /*
                setcookie('connect', true, time() + 3600, null, null, false, true); // On écrit un cookie
                setcookie('adress', $_POST["nom"], time() + 3600, null, null, false, true); // On écrit un cookie
                */
    } else {
        header('Location: ../index.html');
    }
    mysqli_close($db_handle);
}
header('Location: ../login.html');
?>