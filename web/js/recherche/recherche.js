

$(document).ready(function () {

	$("#icon_prefix").keyup(function(){

		var recherche = $(this).val();

		var data = 'motclef='+recherche;

		if(recherche.length>0){

			$('#contenue_cours').empty();
			$('#contenue_exercice').empty();
			$.ajax({
				type:"POST",
				url:"js/recherche/result.php",
				data: data,
				success:  function(server_response){
					$("#sous_contenue").html(server_response).show();
				}

			});
			
		}
	});

	

});