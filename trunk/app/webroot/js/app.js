jQuery(document).ready( function() {
	
	$.row_clone = function(row, table)
	{
		console.log(row);
		$(table).append($(row).clone());
	}
	
	$('input[value="Add Another"]').live('click', function(){
		$.row_clone($('#ingredient_row'), $(this).parent('td').parent('tr').parent('tbody').parent('table'));
		$(this).remove();
	});
	/*
	 * When the application loads the view is hidden. This shows the application
	 * once everything has loaded and has been setup
	 */
	//jQuery('#container').show();

});