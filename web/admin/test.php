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
					('00', 'Word', 'Cours Word 1', 'cours_word_1.twig', 'detail de ouf'), 
					('01', 'Word', 'Cours Word 2', 'cours_word_2.twig', 'detail de ouf'),
					('02', 'Word', 'Cours Word 3', 'cours_word_3.twig', 'detail de ouf'),
					('03', 'Word', 'Cours Word 4', 'cours_word_4.twig', 'detail de ouf'),
					('04', 'Excel', 'Les Opérations', 'cours_excel_1.twig', 'detail de ouf'), 
					('05', 'Excel', 'Cours Excel 2', 'cours_excel_2.twig', 'detail de ouf'),
					('06', 'Excel', 'Cours Excel 3', 'cours_excel_3.twig', 'detail de ouf'),
					('07', 'Excel', 'Cours Excel 4', 'cours_excel_4.twig', 'detail de ouf'),
					('08', 'PP', 'Cours Powerpoint 1', 'cours_powerpoint_1.twig', 'detail de ouf'), 
					('09', 'PP', 'Cours Powerpoint 2', 'cours_powerpoint_2.twig', 'detail de ouf'),
					('10', 'PP', 'Cours Powerpoint 3', 'cours_powerpoint_3.twig', 'detail de ouf'),
					('11', 'PP', 'Cours Powerpoint 4', 'cours_powerpoint_4.twig', 'detail de ouf'),
					('12', 'Oracle', 'Cours Oracle 1', 'cours_oracle_1.twig', 'detail de ouf'), 
					('13', 'Oracle', 'Cours Oracle 2', 'cours_oracle_2.twig', 'detail de ouf'),
					('14', 'Oracle', 'Cours Oracle 3', 'cours_oracle_3.twig', 'detail de ouf'),
					('15', 'Oracle', 'Cours Oracle 4', 'cours_oracle_4.twig', 'detail de ouf')";
		//echo $sql;
		$connexion->exec($sql);

		$sql = "INSERT INTO Exercice (idE, idC, nomE, typeE, contenueE, detailE)
				VALUES
					('00', '0', 'Exercice Word 1', 'Word', 'exercice1.php', 'detail de ouf'),
					('01', '0', 'Exercice Word 2', 'Word', 'exercice2.php', 'detail de ouf'),
					('02', '2', 'Exercice Word 3', 'Word', 'exercice3.php', 'detail de ouf'),
					('03', '3', 'Exercice Word 4', 'Word', 'exercice4.php', 'detail de ouf'),
					('04', '0', 'Exercice Excel 1', 'Excel', 'exercice1.php', 'detail de ouf'),
					('05', '0', 'Exercice Excel 2', 'Excel', 'exercice2.php', 'detail de ouf'),
					('06', '2', 'Exercice Excel 3', 'Excel', 'exercice3.php', 'detail de ouf'),
					('07', '3', 'Exercice Excel 4', 'Excel', 'exercice4.php', 'detail de ouf'),
					('08', '0', 'Exercice Powerpoint 1', 'PP', 'exercice1.php', 'detail de ouf'),
					('09', '0', 'Exercice Powerpoint 2', 'PP', 'exercice2.php', 'detail de ouf'),
					('10', '2', 'Exercice Powerpoint 3', 'PP', 'exercice3.php', 'detail de ouf'),
					('11', '3', 'Exercice Powerpoint 4', 'PP', 'exercice4.php', 'detail de ouf'),
					('12', '0', 'Exercice Oracle 1', 'Oracle', 'exercice1.php', 'detail de ouf'),
					('13', '0', 'Exercice Oracle 2', 'Oracle', 'exercice2.php', 'detail de ouf'),
					('14', '2', 'Exercice Oracle 3', 'Oracle', 'exercice3.php', 'detail de ouf'),
					('15', '3', 'Exercice Oracle 4', 'Oracle', 'exercice4.php', 'detail de ouf')";
		//echo "<br/>" . $sql;
		$connexion->exec($sql);
		
	} catch (Exception $e) {
		echo $sql . "<br>" . $e->getMessage();
	}


	include("connexionBd.php");

	global $connexion;
	$sth = $connexion->prepare("SELECT * from Exercice where typeE = 'Word'");
	$sth->execute();

	$result = $sth->fetchAll();
	//print_r(json_encode($result));


	$sth = $connexion->prepare("SELECT * from Cours where idC = 4");
	$sth->execute();

	$result = $sth->fetchAll();
	// print_r(json_encode($result));
	print_r($result[0]['contenueC']);

?>
</html>