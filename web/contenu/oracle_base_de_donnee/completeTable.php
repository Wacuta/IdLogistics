<?php
		
	include("requet.php");
	
	try {
		// vider pour remplir apres
		$connexion->exec("DELETE FROM Produit");
		$connexion->exec("DELETE FROM Commande");
		$connexion->exec("DELETE FROM BaseLivraison");
		$connexion->exec("DELETE FROM PointDeVente");


		$sql = "INSERT INTO PointDeVente ( idPdV, nomPdV, AdressePdV)
				VALUES 
					(01, 'Intermarché', '4 Boulevard de Strasbourg'),
					(02, 'Leclerc', 'Allée Des Champs Pinsons'),
					(03, 'Hyper U', '121 Route de Bessières'),
					(04, 'Auchan', 'Chemin de Gabardie'),
					(05, 'Fnac', '16 Allées du Président ')";
		$connexion->exec($sql);



		$sql = "INSERT INTO BaseLivraison (idBase, idPdV, nomBase)
				VALUES
					(01, 01, 'Toto'),
					(02, 01, 'Coco'),
					(03, 03, 'Tango'),
					(04, 05, 'Charlie'),
					(05, 04, 'Delta')";
		$connexion->exec($sql);

		
		$sql = "INSERT INTO Commande (numCom, idPdV, quantiteCom)
				VALUES
					(01, 01, 25),
					(02, 01, 12),
					(03, 02, 2),
					(04, 02, 9),
					(05, 03, 7)";
		$connexion->exec($sql);


		$sql = "INSERT INTO Produit (idProd, numCom, nomProd, quantite)
				VALUES
					(01, 1, 'Xperia Z3', 3),
					(02, 3, 'Pomme', 16),
					(03, 2, 'Chaise', 4),
					(04, 2, 'Télé', 2),
					(05, 2, 'Table', 1)";
		$connexion->exec($sql);

	} 
	catch (Exception $e) {
		echo $sql . "<br>" . $e->getMessage();
	}


?>