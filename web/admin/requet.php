<?php
	include("connexionBd.php");

	function listerCours(){
		global $connexion;
		$result = $connexion->prepare("SELECT * from Cours");
		$result->execute();
    	return $result;
	}

	function listerExercice(){
		global $connexion;
		$result = $connexion->prepare("SELECT * from Exercice");
		$result->execute();
    	return $result;
	}

	function exerciceDuCours($x){
		global $connexion;
		$result = $connexion->prepare("SELECT contenueE from Exercice where idC=".$x);
		$result->execute();
    	return $result;
	}

  
?>