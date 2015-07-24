
<?php

	/* inclure la base de donnée */
	include("connexionBd.php");
	try {

		$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		$connexion->exec("DELETE FROM Cours");
		$connexion->exec("DELETE FROM Exercice");
		
		// create table Cours
		$sql = "CREATE TABLE Cours (
			idC INT(6), 
			typeC VARCHAR(250) NOT NULL,
			nomC VARCHAR(250) NOT NULL,
			contenueC VARCHAR(250) NOT NULL,
			detailC VARCHAR(250) NOT NULL,
			PRIMARY KEY (idC)
		)";
		$connexion->exec($sql);
    	echo "Table Cours created successfully<br>";
		


		// create table Exercice
		$sql = "CREATE TABLE Exercice (
			idE INT(6), 
			coursE INT(6) NOT NULL,
			nomE VARCHAR(250) NOT NULL,
			typeE VARCHAR(250) NOT NULL,
			contenueE VARCHAR(250) NOT NULL,
			detailE VARCHAR(250) NOT NULL,
			PRIMARY KEY (idE),
			foreign  key (coursE) references Cours(idC)
		)";
		$connexion->exec($sql);
    	echo "Table Exercice created successfully <br>";



	} catch (Exception $e) {
		echo $sql . "<br>" . $e->getMessage();
	}

	echo "Base de données mise à jours";

?>