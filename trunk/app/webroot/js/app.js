jQuery(document).ready( function() {
	
	$.ingredient_row_clone = function(row)
	{
		new_row = $(row).clone(); 
		// Clear the inputs
		
		// Increment the ingredient row index		
		
		// Append the row back to the table
	}
	
	$('input[value="Add Another"]').live('click', function(){
		$.ingredient_row_clone($(this).parent('td').parent('tr'));
		//$(this).remove(); // remove the button so we only have a button on the new row.
	});
	/*
	 * When the application loads the view is hidden. This shows the application
	 * once everything has loaded and has been setup
	 */
	//jQuery('#container').show();

});