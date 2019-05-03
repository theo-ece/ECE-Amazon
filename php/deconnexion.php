<?php
session_start();
$_SESSION["connect"]=false;
$_SESSION["type"]="none";
$_SESSION["Pseudo"]="";
$_SESSION['panier'] = '';
header('Location: ../index.html');
?>