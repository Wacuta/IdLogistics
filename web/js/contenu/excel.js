


$(document).ready(function() {
    $('select').material_select();
  });



$(document).ready(function () {
	$("#ss").wijspread({ sheetCount: 1 }); 
	var spread = $("#ss").wijspread("spread"); 
	spread.useWijmoTheme = false;
	var cell = null;
	var row = null;
	var col = null;
	var form = null;

	$("#ss").wijspread("spread").getActiveSheet().bind(
		$.wijmo.wijspread.Events.CellClick, function (e, info) {
	    	if(info.sheetArea === $.wijmo.wijspread.SheetArea.viewport){
		        console.log("Clicked cell index (" + info.row + "," + info.col + ")");

		        cell = spread.getActiveSheet();
		        row = info.row;
		        col = info.col;
		        var value = cell.getValue(row, col);
		        document.getElementById('fonction').value = value;
		        document.getElementById('cell_select').innerHTML = String.fromCharCode(col+65)+""+(row+1);
	    }
	});

	
	$("#fonction").keyup(function(){

		form = $(this).val();

		if(form.length>0){
			$.ajax({
				type:"POST",
				url:"../contenu/layout_excel.twig",
				data: form,
				success:  function(){
					cell.setValue(row, col, form);
				}

			});
		}

	});

	$('#formid').on("keyup keypress", function(e) {
	  var code = e.keyCode || e.which; 
	  if (code  == 13) {               
		e.preventDefault();
	    if(form.charAt(0) == "=")
				cell.setFormula(row,col, form);
		else
			cell.setValue(row,col,form);
		return false;
	  }
	});

});

