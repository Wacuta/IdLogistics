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
					('00', 'Word', 'Cours 1', 'cours1.php', 'detail de ouf'), 
					('01', 'Word', 'Cours 2', 'cours2.php', 'detail de ouf'),
					('02', 'Word', 'Cours 3', 'cours3.php', 'detail de ouf'),
					('03', 'Word', 'Cours 4', 'cours4.php', 'detail de ouf'),
					('04', 'Excel', 'Cours 1', 'cours1.php', 'detail de ouf'), 
					('05', 'Excel', 'Cours 2', 'cours2.php', 'detail de ouf'),
					('06', 'Excel', 'Cours 3', 'cours3.php', 'detail de ouf'),
					('07', 'Excel', 'Cours 4', 'cours4.php', 'detail de ouf'),
					('08', 'PP', 'Cours 1', 'cours1.php', 'detail de ouf'), 
					('09', 'PP', 'Cours 2', 'cours2.php', 'detail de ouf'),
					('10', 'PP', 'Cours 3', 'cours3.php', 'detail de ouf'),
					('11', 'PP', 'Cours 4', 'cours4.php', 'detail de ouf'),
					('12', 'Oracle', 'Cours 1', 'cours1.php', 'detail de ouf'), 
					('13', 'Oracle', 'Cours 2', 'cours2.php', 'detail de ouf'),
					('14', 'Oracle', 'Cours 3', 'cours3.php', 'detail de ouf'),
					('15', 'Oracle', 'Cours 4', 'cours4.php', 'detail de ouf')";
		echo $sql;
		$connexion->exec($sql);

		$sql = "INSERT INTO Exercice (idE, idC, nomE, typeE, contenueE, detailE)
				VALUES
					('00', '0', 'Exercice 1', 'Word', 'exercice1.php', 'detail de ouf'),
					('01', '0', 'Exercice 2', 'Word', 'exercice2.php', 'detail de ouf'),
					('02', '2', 'Exercice 3', 'Word', 'exercice3.php', 'detail de ouf'),
					('03', '3', 'Exercice 4', 'Word', 'exercice4.php', 'detail de ouf'),
					('04', '0', 'Exercice 1', 'Excel', 'exercice1.php', 'detail de ouf'),
					('05', '0', 'Exercice 2', 'Excel', 'exercice2.php', 'detail de ouf'),
					('06', '2', 'Exercice 3', 'Excel', 'exercice3.php', 'detail de ouf'),
					('07', '3', 'Exercice 4', 'Excel', 'exercice4.php', 'detail de ouf'),
					('08', '0', 'Exercice 1', 'PP', 'exercice1.php', 'detail de ouf'),
					('09', '0', 'Exercice 2', 'PP', 'exercice2.php', 'detail de ouf'),
					('10', '2', 'Exercice 3', 'PP', 'exercice3.php', 'detail de ouf'),
					('11', '3', 'Exercice 4', 'PP', 'exercice4.php', 'detail de ouf'),
					('12', '0', 'Exercice 1', 'Oracle', 'exercice1.php', 'detail de ouf'),
					('13', '0', 'Exercice 2', 'Oracle', 'exercice2.php', 'detail de ouf'),
					('14', '2', 'Exercice 3', 'Oracle', 'exercice3.php', 'detail de ouf'),
					('15', '3', 'Exercice 4', 'Oracle', 'exercice4.php', 'detail de ouf')";
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