<?php 
class IngredientList extends AppModel
{
	public $belongsTo = array('Recipe');
	public $hasMany = array('Measurement', 'Ingredient', 'Fraction');
}
?>
