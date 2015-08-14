<html>
<?php

	/* inclure la base de donnée */
	include("requet.php");
	try {
		// vider pour remplir apres
		include("creatTable.php"); // il faut recrée les table maintenant !!!!! avant de remplir
		$connexion->exec("DELETE FROM Cours");
		$connexion->exec("DELETE FROM Exercice");
		$sql = "INSERT INTO Cours ( idC, typeC, nomC, contenueC, detailC) 
				VALUES 
					('00', 'Word', 'Présentation du logiciel', 'cours_word_2.twig', 'Présentation du logiciel Word.'),
					('01', 'Word', 'Mise en forme du texte', 'cours_word_1.twig', 'Police, Taille, Gras, italic, souligner, sur-ligner, couleur...'), 
					('02', 'Word', 'Table des matières', 'cours_word_3.twig', 'Table des matières, Plan, Sommaire'),
					('03', 'Word', 'Les lettres à caractères spéciaux', 'cours_word_4.twig', 'les lettres à caractères spéciaux avec les alt codes'),
					('04', 'Word', 'Les raccourcis clavier', 'cours_word_5.twig', 'Les raccourcis clavier qui nous permettent de faire rapidement un copier-coller, une selection...'),
					('05', 'Excel', 'Présentation du logiciel', 'cours_excel_2.twig', 'Présentation du logiciel Excel'),
					('06', 'Excel', 'Les Opérations', 'cours_excel_1.twig', 'Les opérations basiques de Excel: Addition, Soustraction, Multiplication, Division'), 
					('07', 'Excel', 'Les références absolues', 'cours_excel_3.twig', 'Faire référence à une cellule ou une plage avec le sympole $'),
					('08', 'Excel', 'Les messages d\'erreurs', 'cours_excel_4.twig', '\#DIV/0!, \#NUL!, \#VALEUR!, \#REF!, \#NOM?, \#NOMBRE!, \#N/A, \#\#\#\#\#\#\#\#\#\#\#'),
					('09', 'Excel', 'Activer les contenus', 'cours_excel_8.twig', 'Activer les Macros et les fonctions'),
					('10', 'Excel', 'Les fonctions logiques', 'cours_excel_5.twig', 'Les opérateurs (\<, \>, \=, \<\=, \>\=, \<\>), le ET, le OU, le NON, le SI'),
					('11', 'Excel', 'Les arrondis', 'cours_excel_6.twig', 'Arrondire les valeurs au supérieur, à l\'inférieur ou les tronqueées'),
					('12', 'Excel', 'Compter les cellules', 'cours_excel_7.twig', 'Compter les cellules en fonction de différents critère (vide, valeur, ensemble, condition...)'),
					('13', 'Excel', 'Créer une date', 'cours_excel_9.twig', 'Créer une date avec les fonctions Excel'),
					('14', 'Excel', 'Les informations sur une date', 'cours_excel_10.twig', 'Récuperer les informations sur une date (secondes, minutes, heures, jours, mois, années)'),
					('15', 'Excel', 'Les opérateurs sur une date', 'cours_excel_11.twig', 'Effectuer des opérations entre les dates'),
					('16', 'PP', 'Présentation du logiciel', 'cours_powerpoint_1.twig', 'Présentation du logiciel PowerPoint'), 
					('17', 'PP', 'Faire un diaporama 1', 'cours_powerpoint_2.twig', 'Les diapositives, la première diapo, les thèmes'),
					('18', 'PP', 'Faire un diaporama 2', 'cours_powerpoint_3.twig', 'En-tête et Pied de page'),
					('19', 'PP', 'Faire un diaporama 3', 'cours_powerpoint_4.twig', 'Le contenu, la présentation'),
					('20', 'PP', 'Les Transitions', 'cours_powerpoint_5.twig', 'Les effets de transitions entre les diapositives'),
					('21', 'PP', 'Les Animations', 'cours_powerpoint_6.twig', 'Les effets d\'animation pour les éléments'),
					('22', 'Oracle', 'Présentation', 'cours_oracle_1.twig', 'Présentation de Oracle'), 
					('23', 'Oracle', 'La sélection', 'cours_oracle_2.twig', 'Sélectionner avec SELECT, FROM et WHERE pour les critères'),
					('24', 'Oracle', 'L\'insertion', 'cours_oracle_3.twig', 'Insérer avec INSERT, des valeurs dans les tables'),
					('25', 'Oracle', 'La suppression', 'cours_oracle_4.twig', 'Supprimer avec DELETE, des valeurs dans les tables')";
		//echo $sql;
		$connexion->exec($sql);

		$sql = "INSERT INTO Exercice (idE, coursE, nomE, typeE, contenueE, detailE)
				VALUES
					('01', '0', 'Les Opérations', 'Excel', 'exercice_excel_1.twig', 'Exercice sur les Opérations possibles sur Excel.'),
					('02', '0', 'Pratique libre', 'Oracle', 'exercice_oracle_1.twig', 'Pratiquer toutes les opérations que vous voulez, librement, sur la base de données local')";
		//echo "<br/>" . $sql;
		$connexion->exec($sql);
		
		echo "Base de données mise à jours";
	} catch (Exception $e) {
		echo $sql . "<br>" . $e->getMessage();
	}

	include("connexionBd.php");

	global $connexion;
	$sth = $connexion->prepare("SELECT idC from Cours where typeC= 'Excel'");
	$sth->execute();
/*

	$result = $sth->fetchAll();
	//print_r(json_encode($result));


	$sth = $connexion->prepare("SELECT * from Cours where idC = 4");
	$sth->execute();

*/
	$result = $sth->fetchAll();
	 print_r(json_encode($result));
	//print_r($result[0]['contenueC']);
?>
</html>