<?php
	// $nom= isset($_POST["nom"])  ==> si la variable nom vaut $_Post[nom]
	// ?$_POST["nom"]		     	==> alors nom prend la valeur
	// :""							==> sinnon prend la valeur 'vide'
	

	$Catégorie= isset($_POST["Catégorie"])? $_POST["Catégorie"] :"";
	$Livre= isset($_POST["Livre"])? $_POST["Livre"] :"";
	$Musique= isset($_POST["Musique"])? $_POST["Musique"] :"";
	$Vetement= isset($_POST["Vetement"])? $_POST["Vetement"] :"";
	$nom= isset($_POST["nom"])? $_POST["nom"] :"";
	$error ="";

	if($Catégorie == "Livre")
	{
		header('location: vendrelivre.html');
  		exit();
	}
	if($Catégorie == "Musique")
	{
		header('location: vendremusique.html');
  		exit();
	}
	if($Catégorie == "Sport")
	{
		header('location: vendresport.html');
  		exit();
	}
	if($Catégorie == "Vetement")
	{
		header('location: vendrevetement.html');
  		exit();
	}
	

?>