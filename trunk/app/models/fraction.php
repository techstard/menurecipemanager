<?php 
class Fraction extends AppModel
{
	public $displayField = 'fraction';
	public $hasMany = array('IngredientList');
}
?>
