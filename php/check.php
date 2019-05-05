<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();


if ($_SESSION["connect"]==true && $_SESSION["type"]=="vendeur") {
    header('Location: ../profil_vendeur.html');
    exit();
} elseif ($_SESSION["connect"]==true && $_SESSION["type"]=="admin") {
    header('Location: ../profil_admin.html');
    exit();
} elseif ($_SESSION["connect"]==true && $_SESSION["type"]=="client") {
    header('Location: ../profil.html');
    exit();
} else {
    header('Location: ../login.html');
    exit();
}
?>