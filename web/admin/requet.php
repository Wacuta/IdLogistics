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
		$rqt = $connexion->prepare("SELECT * from Cours where typeC = 'Word'");
		$rqt->execute();
		$result = $rqt->fetchAll();
		return json_encode($result);
	}

	function coursExcel(){
		global $connexion;
		$rqt = $connexion->prepare("SELECT * from Cours where typeC = 'Excel'");
		$rqt->execute();
		$result = $rqt->fetchAll();
		return json_encode($result);
	}

	function coursPowerpoint(){
		global $connexion;
		$rqt = $connexion->prepare("SELECT * from Cours where typeC = 'PP'");
		$rqt->execute();
		$result = $rqt->fetchAll();
		return json_encode($result);
	}

	function coursOracle(){
		global $connexion;
		$rqt = $connexion->prepare("SELECT * from Cours where typeC = 'Oracle'");
		$rqt->execute();
		$result = $rqt->fetchAll();
		return json_encode($result);
	}

	/* lister les exercice d'un module */
	function exerciceWord(){
		global $connexion;
		$rqt = $connexion->prepare("SELECT * from Exercice where typeE = 'Word'");
		$rqt->execute();
		$result = $rqt->fetchAll();
    	return json_encode($result);
	}

	function exerciceExcel(){
		global $connexion;
		$rqt = $connexion->prepare("SELECT * from Exercice where typeE = 'Excel'");
		$rqt->execute();
		$result = $rqt->fetchAll();
    	return json_encode($result);
	}

	function exercicePowerpoint(){
		global $connexion;
		$rqt = $connexion->prepare("SELECT * from Exercice where typeE = 'PP'");
		$rqt->execute();
		$result = $rqt->fetchAll();
    	return json_encode($result);
	}

	function exerciceOracle(){
		global $connexion;
		$rqt = $connexion->prepare("SELECT * from Exercice where typeE = 'Oracle'");
		$rqt->execute();
		$result = $rqt->fetchAll();
    	return json_encode($result);
	}
  
?>