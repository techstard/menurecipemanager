jQuery(document).ready( function() {
	
	/**
	 * @method ingredient_row_clone
	 * @param {Object} button
	 * @description The ingredient list table has a hidden row to use as a template
	 * 				for creating new rows. This method clones that row creating a new template
	 * 				row and then unhides the row that was used as a template. It then increments
	 * 				the ID and name attributes.
	 */
	$.ingredient_row_clone = function(button)
	{
		id_key = 'IngredientList';
		name_key = 'data[IngredientList'
		
		// Remove this button
		$(button).remove(); // remove the button so we only have a button on the new row.
		// Get the hidden row template
		row_template = $('table.ingredient_list tbody tr:last'); 
		
		// Append the new row
		$(row_template).clone().appendTo('table.ingredient_list tbody');
		
		// Increment the ingredient row index	
		$('table.ingredient_list tbody tr:last td').each(function(){
			input_id = $(this).children(':first').attr('id');
			id_prefix = input_id.substr(0, id_key.length);
			id_index = input_id.substr(id_key.length, 1);
			id_suffix = input_id.substr(id_key.length + 1);
			if (id_prefix === id_key) 
			{
				new_id = id_prefix + (parseInt(id_index) + 1) + id_suffix;
				$(this).children(':first').attr('id',  new_id);
			}
			
			input_name = $(this).children(':first').attr('name');
			name_prefix = input_name.substr(0, name_key.length);
			name_index = input_name.substr(name_key.length, 1);
			name_suffix = input_name.substr(name_key.length + 1);
			if (name_prefix === name_key) 
			{
				new_name = name_prefix + (parseInt(name_index) + 1) + name_suffix;
				$(this).children(':first').attr('name',  new_name);
			}
		});
		
		// Display the original hidden row
		$(row_template).css('display', 'table-row');
	}
	
	$('input[value="Add Another"]').live('click', function(){
		$.ingredient_row_clone(this);
	});
	/*
	 * When the application loads the view is hidden. This shows the application
	 * once everything has loaded and has been setup
	 */
	//jQuery('#container').show();

});