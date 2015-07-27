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
					('00', 'Word', 'Présentation du logiciel', 'cours_word_2.twig', 'Présentation du logiciel Word.'),
					('01', 'Word', 'Mise en forme du texte', 'cours_word_1.twig', 'Police, Taille, Gras, italic, souligner, sur-ligner, couleur...'), 
					('02', 'Word', 'Table des matières', 'cours_word_3.twig', 'Table des matières, Plan, Sommaire'),
					('03', 'Word', 'Cours Word 4', 'cours_word_4.twig', 'détail'),
					('04', 'Excel', 'Présentation du logiciel', 'cours_excel_2.twig', 'Présentation du logiciel Excel'),
					('05', 'Excel', 'Les Opérations', 'cours_excel_1.twig', 'Les opérations basiques de Excel: Addition, Soustraction, Multiplication, Division'), 
					('06', 'Excel', 'Les références absolues', 'cours_excel_3.twig', 'Faire référence à une cellule ou une plage avec le sympole $'),
					('07', 'Excel', 'Les messages d\'erreurs', 'cours_excel_4.twig', '\#DIV/0!, \#NUL!, \#VALEUR!, \#REF!, \#NOM?, \#NOMBRE!, \#N/A, \#\#\#\#\#\#\#\#\#\#\#'),
					('08', 'Excel', 'Les fonctions logiques', 'cours_excel_5.twig', 'Les opérateurs (\<, \>, \=, \<\=, \>\=, \<\>), le ET, le OU, le NON, le SI'),
					('09', 'Excel', 'Les arrondis', 'cours_excel_6.twig', 'Arrondire les valeurs au supérieur, à l\'inférieur ou les tronqueées'),
					('10', 'Excel', 'Compter les cellules', 'cours_excel_7.twig', 'Compter les cellules en fonction de différents critère (vide, valeur, ensemble, condition...)'),
					('11', 'PP', 'Présentation du logiciel', 'cours_powerpoint_1.twig', 'Présentation du logiciel PowerPoint'), 
					('12', 'PP', 'Cours Powerpoint 2', 'cours_powerpoint_2.twig', 'détail'),
					('13', 'PP', 'Cours Powerpoint 3', 'cours_powerpoint_3.twig', 'détail'),
					('14', 'PP', 'Cours Powerpoint 4', 'cours_powerpoint_4.twig', 'détail'),
					('15', 'Oracle', 'Présentation', 'cours_oracle_1.twig', 'Présentation de Oracle'), 
					('16', 'Oracle', 'La sélection', 'cours_oracle_2.twig', 'Sélectionner avec SELECT, FROM et WHERE pour les critères'),
					('17', 'Oracle', 'L\'insértion', 'cours_oracle_3.twig', 'Insérer avec INSERT, des valeurs dans les tables'),
					('18', 'Oracle', 'La suppression', 'cours_oracle_4.twig', 'détail')";
		//echo $sql;
		$connexion->exec($sql);

		$sql = "INSERT INTO Exercice (idE, coursE, nomE, typeE, contenueE, detailE)
				VALUES
					('00', '0', 'Exercice Word 1', 'Word', 'exercice_word_1.twig', 'détail'),
					('01', '0', 'Exercice Word 2', 'Word', 'exercice_word_2.twig', 'détail'),
					('02', '2', 'Exercice Word 3', 'Word', 'exercice_word_3.twig', 'détail'),
					('03', '3', 'Exercice Word 4', 'Word', 'exercice_word_4.twig', 'détail'),
					('04', '0', 'Les Opérations', 'Excel', 'exercice_excel_1.twig', 'Exercice sur les Opérations possibles sur Excel.'),
					('05', '05', 'Exercice Excel 2', 'Excel', 'exercice_excel_2.twig', 'détail'),
					('06', '2', 'Exercice Excel 3', 'Excel', 'exercice_excel_3.twig', 'détail'),
					('07', '3', 'Exercice Excel 4', 'Excel', 'exercice_excel_4.twig', 'détail'),
					('08', '0', 'Exercice Powerpoint 1', 'PP', 'exercice_powerpoint_1.twig', 'détail'),
					('09', '0', 'Exercice Powerpoint 2', 'PP', 'exercice_powerpoint_2.twig', 'détail'),
					('10', '2', 'Exercice Powerpoint 3', 'PP', 'exercice_powerpoint_3.twig', 'détail'),
					('11', '3', 'Exercice Powerpoint 4', 'PP', 'exercice_powerpoint_4.twig', 'détail'),
					('12', '0', 'Pratique libre', 'Oracle', 'exercice_oracle_1.twig', 'Pratiquer toutes les opérations que vous voulez, librement, sur la base de données local'),
					('13', '0', 'Exercice Oracle 2', 'Oracle', 'exercice_oracle_2.twig', 'détail'),
					('14', '2', 'Exercice Oracle 3', 'Oracle', 'exercice_oracle_3.twig', 'détail'),
					('15', '3', 'Exercice Oracle 4', 'Oracle', 'exercice_oracle_4.twig', 'détail')";
		//echo "<br/>" . $sql;
		$connexion->exec($sql);
		
	} catch (Exception $e) {
		echo $sql . "<br>" . $e->getMessage();
	}

	echo "Base de données mise à jours";
/*
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
*/
?>
</html>