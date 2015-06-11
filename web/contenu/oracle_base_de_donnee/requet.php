<?php
	include("connexionBd.php");
	
	//echo "string";

	if(isset($_POST['motclef'])){


		$motclef = $_POST['motclef'];	
		
		$q = array('motclef' => '%'.$motclef.'%');
		
		$sql = $motclef;
		
		$req = $connexion->prepare($sql);
		



		/* pour une SELECTION */
		if(strcasecmp(explode(" ", $motclef)[0], "select") == 0){

			$req -> execute($q);
			$count = $req->rowCount($sql);

			echo "<b>Requête: </b>".$sql."<br>";
			echo "<b>Résultats: </b>".$count;

			/* === Pour recuperer les nom des colonnes de la requete === */
			$total_column = $req->columnCount();

			for ($counter = 0; $counter < $total_column; $counter ++) {
			    $meta = $req->getColumnMeta($counter);
			    $column[] = $meta['name'];
			}
			/* ====== */

			if($count > 0){


				$result = $req->fetchAll();

				echo "<table>
				        <thead>
				          <tr>";
				    foreach ($column as $value) {
				    	echo "<th data-field='$value'>$value</th>";
				    }
				echo "</tr>
				     </thead>
			      	<tbody>";

			    foreach ($result as $value) {
			    	echo "<tr>";
			    	for ($i=0; $i < sizeof($value)/2 ; $i++) { 
			    		echo "<td>".$value[$i]."</td>";
			    	}
			    	echo "</tr>";
			    }
			          
			        
			    echo "</tbody>
			    	</table>";

			}
			else{
	            echo '<p class="text-center"> aucun résultat pour "'.$motclef.'"</p>';

			}

		}


		/* Pour une SUPPRESSION */
		if(strcasecmp(explode(" ", $motclef)[0], "delete") == 0){
			if ($connexion->query($sql) == TRUE) {
			    echo "Suppression réussi";
			} else {
			    echo "Erreur, suppression impossible";
			}
		}


		/* Pour un AJOUT */
		if(strcasecmp(explode(" ", $motclef)[0], "insert") == 0){
			if ($connexion->query($sql) == TRUE) {
			    echo "Insertion réussi";
			} else {
			    echo "Erreur, insertion impossible";
			}
		}







	}

  
?>