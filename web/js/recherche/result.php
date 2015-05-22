<?php

	include_once '../../admin/connexionBd.php';

	if(isset($_POST['motclef'])){
		$motclef = $_POST['motclef'];
		
		$q = array('motclef' => '%'.$motclef.'%');
		
		
		$sqlC = "SELECT * from Cours where nomC like :motclef or detailC like :motclef";
		$sqlE = "SELECT * from Exercice where nomE like :motclef or detailE like :motclef";
		
		$reqC = $connexion->prepare($sqlC);
		$reqE = $connexion->prepare($sqlE);
		
		$reqC -> execute($q);
		$reqE -> execute($q);

		$countC = $reqC->rowCount($sqlC);
		$countE = $reqE->rowCount($sqlE);

		// partie cours apres recherche
		if($countC > 0){

			echo '<div class="part" id="cours">';
            echo '<h1 class="part-heading text-center"> Cours</h1>';

            echo '<ul id="liste-magique">';
			while ($result = $reqC->fetch(PDO::FETCH_OBJ)){
				echo '<li style="opacity:0;">';
	            echo  '<div class="card '.$result->typeC.' waves-effect waves-light cliquable" onclick="nouvelleFenetre(\'cours-'.$result->idC.'\')">';
	            echo  '<div class="card-content">';
	            echo  '<span class="card-title">'.$result->nomC.'</span>';
	            echo  '<p class="grey-text text-lighten-2">'.$result->detailC.'</p>';
	            echo  '</div></div>';
	            echo '</li>';
			}
			echo '</ul>';
			echo '<script>Materialize.showStaggeredList("#liste-magique"); </script>';
            echo '</div>';


		}else{
			echo '<div class="part" id="cours">';
            echo '<h1 class="part-heading text-center"> Cours</h1>';
            echo '<p class="text-center"> aucun résultat pour "'.$motclef.'"</p>';
			echo '</div>';

		}

        echo '<div class="separator"></div>';

		// partie exercice apres recherche
		if ($countE > 0) {
			
            echo '<div class="part" id="exercices">';
            echo '  <h1 class="part-heading text-center">Exercices</h1>';
            echo '<ul id="liste-magique2">';
			while($result = $reqE->fetch(PDO::FETCH_OBJ)){
				echo '<li style="opacity:0;">';
	            echo  '<div class="card '.$result->typeE.' waves-effect waves-light cliquable" onclick="nouvelleFenetre(\'exercices-'.$result->idE.'\')">';
	            echo  '<div class="card-content">';
	            echo  '<span class="card-title">'.$result->nomE.'</span>';
	            echo  '<p class="grey-text text-lighten-2">'.$result->detailE.'</p>';
	            echo  '</div></div>';
	            echo '</li>';
			}
            echo '</ul>';
			echo '<script>Materialize.showStaggeredList("#liste-magique2"); </script>';
            echo '</div>';

		}else{
			echo '<div class="part" id="exercices">';
            echo '<h1 class="part-heading text-center"> Exercices</h1>';
            echo '<p class="text-center"> aucun résultat pour "'.$motclef.'"</p>';
			echo '</div>';

		}
		

		
	}

?>