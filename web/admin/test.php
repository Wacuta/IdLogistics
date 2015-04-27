<html>
<?php

	/* inclure la base de donnée */
	include("requet.php");
	try {
		// vider pour remplir apres
		$connexion->exec("DELETE FROM Cours");
		$connexion->exec("DELETE FROM Exercice");
		$sql = "INSERT INTO Cours ( idC, nomC, contenueC) 
				VALUES 
					('0', 'Cours 1', 'cours1.php'), 
					('1', 'Cours 2', 'cours2.php' ),
					('2', 'Cours 3', 'cours3.php' ),
					('3', 'Cours 4', 'cours4.php')";
		echo $sql;
		$connexion->exec($sql);

		$sql = "INSERT INTO Exercice (idE, idC, contenueE)
				VALUES
					('0', '0', 'exercice1.php'),
					('1', '0', 'exercice2.php'),
					('2', '2', 'exercice3.php'),
					('3', '3', 'exercice4.php')";
		echo "<br/>" . $sql;
		$connexion->exec($sql);
		
	} catch (Exception $e) {
		echo $sql . "<br>" . $e->getMessage();
	}


	$reponse = listerCours(); //$connexion->query("SELECT * FROM Cours");

	while($d = $reponse->fetch()){
		echo "<p>" . $d['nomC'] . "</p>";
	}

	$reponse = exerciceDuCours(0);

	while($d = $reponse->fetch()){
		echo "<p>" . $d['contenueE'] . "</p>";
	}
?>
</html>