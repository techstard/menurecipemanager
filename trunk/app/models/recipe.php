<?php 
class Recipe extends AppModel
{
	public $belongsTo = array('RecipeType');
	public $hasMany = array( 
						'IngredientList' => array('dependent'=> true) // dependent causes the IngredientList rows to be deleted with the recipe is deleted.
						);

}
?>
