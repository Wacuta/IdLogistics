<html>
<?php

	/* inclure la base de donnée */
	include("requet.php");
	try {
		// vider pour remplir apres
		$connexion->exec("DELETE FROM Cours");
		$connexion->exec("DELETE FROM Exercice");
		$sql = "INSERT INTO Cours ( idC, typeC, nomC, contenueC, detailC) 
				VALUES 
					('0', 'Word', 'Cours 1', 'cours1.php', 'detail de ouf'), 
					('1', 'Excel', 'Cours 2', 'cours2.php', 'detail de ouf'),
					('2', 'Word', 'Cours 3', 'cours3.php', 'detail de ouf'),
					('3', 'PP', 'Cours 4', 'cours4.php', 'detail de ouf')";
		echo $sql;
		$connexion->exec($sql);

		$sql = "INSERT INTO Exercice (idE, idC, nomE, typeE, contenueE, detailE)
				VALUES
					('0', '0', 'Exercice 1', 'Word', 'exercice1.php', 'detail de ouf'),
					('1', '0', 'Exercice 2', 'Excel', 'exercice2.php', 'detail de ouf'),
					('2', '2', 'Exercice 3', 'Oracle', 'exercice3.php', 'detail de ouf'),
					('3', '3', 'Exercice 4', 'Oracle', 'exercice4.php', 'detail de ouf')";
		echo "<br/>" . $sql;
		$connexion->exec($sql);
		
	} catch (Exception $e) {
		echo $sql . "<br>" . $e->getMessage();
	}


	$reponse = coursWord(); //$connexion->query("SELECT * FROM Cours");

	while($d = $reponse->fetch()){
		echo "<p>" . $d['nomC'] . "</p>";
	}

	$reponse = exerciceExcel();

	while($d = $reponse->fetch()){
		echo "<p>" . $d['contenueE'] . "</p>";
	}
?>
</html>