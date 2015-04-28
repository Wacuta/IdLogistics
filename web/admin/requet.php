<?php
	include("connexionBd.php");

	/* lister tout les cours */
	function listerCours(){
		global $connexion;
		$result = $connexion->prepare("SELECT * from Cours");
		$result->execute();
    	return $result;
	}

	/* lister tout les exercices */
	function listerExercice(){
		global $connexion;
		$result = $connexion->prepare("SELECT * from Exercice");
		$result->execute();
    	return $result;
	}

	/* lister les exercicex en fonction du cours associe */
	function exerciceDuCours($x){
		global $connexion;
		$result = $connexion->prepare("SELECT contenueE from Exercice where idC=".$x);
		$result->execute();
    	return $result;
	}

	/* lister les cours  d'un module */
	function coursWord(){
		global $connexion;
		$result = $connexion->prepare("SELECT * from Cours where typeC = 'Word'");
		$result->execute();
    	return $result;
	}

	function coursExcel(){
		global $connexion;
		$result = $connexion->prepare("SELECT * from Cours where typeC = 'Excel'");
		$result->execute();
    	return $result;
	}

	function coursPowerpoint(){
		global $connexion;
		$result = $connexion->prepare("SELECT * from Cours where typeC = 'PP'");
		$result->execute();
    	return $result;
	}

	function coursOracle(){
		global $connexion;
		$result = $connexion->prepare("SELECT * from Cours where typeC = 'Oracle'");
		$result->execute();
    	return $result;
	}

	/* lister les exercice d'un module */
	function exerciceWord(){
		global $connexion;
		$result = $connexion->prepare("SELECT * from Exercice where typeE = 'Word'");
		$result->execute();
    	return $result;
	}

	function exerciceExcel(){
		global $connexion;
		$result = $connexion->prepare("SELECT * from Exercice where typeE = 'Excel'");
		$result->execute();
    	return $result;
	}

	function exercicePowerpoint(){
		global $connexion;
		$result = $connexion->prepare("SELECT * from Exercice where typeE = 'PP'");
		$result->execute();
    	return $result;
	}

	function exerciceOracle(){
		global $connexion;
		$result = $connexion->prepare("SELECT * from Exercice where typeE = 'Oracle'");
		$result->execute();
    	return $result;
	}
  
?>