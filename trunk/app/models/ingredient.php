<?php 
class Ingredient extends AppModel
{
	public $belongsTo = 'IngredientType'; 
	public $displayField = 'ingredient';
}
?>
