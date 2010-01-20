<?php 
class Recipe extends AppModel
{
	public $belongsTo = array('RecipeType');
	public $hasMany = array('IngredientList');
}
?>
