
<?php

	/* inclure la base de donnée */
	include("connexionBd.php");
	try {

		$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		// create table BaseLivraison
		$sql = "CREATE TABLE BaseLivraison (
		idBase INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		idPdV INT(6) NOT NULL,
		nomBase VARCHAR(250) NOT NULL
		)";
		$connexion->exec($sql);
    	echo "Table BaseLivraison created successfully <br>";


    	// create table Commande
		$sql = "CREATE TABLE Commande (
		numCom INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		idC INT(6) NOT NULL,
		quantiteCom INT(6) NOT NULL
		)";
		$connexion->exec($sql);
    	echo "Table Commande created successfully<br>";


		// create table PointDeVente
		$sql = "CREATE TABLE PointDeVente (
		idPdV INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		nomPdV VARCHAR(250) NOT NULL,
		AdressePdV VARCHAR(250) NOT NULL
		)";
		$connexion->exec($sql);
    	echo "Table PointDeVente created successfully<br>";


		// create table Produit
		$sql = "CREATE TABLE Produit (
		idProd INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		numCom INT(6) NOT NULL,
		nomProd VARCHAR(250) NOT NULL
		)";
		$connexion->exec($sql);
    	echo "Table Produit created successfully<br>";


	} catch (Exception $e) {
		echo $sql . "<br>" . $e->getMessage();
	}

	echo "Base de données mise à jours";

?>