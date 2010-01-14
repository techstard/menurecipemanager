<?php 
class RecipeType extends AppModel
{
	public $displayField = 'recipe_type';
	public $hasMany = 'Recipes';
}
?>
