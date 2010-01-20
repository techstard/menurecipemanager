<?php 
class Measurement extends AppModel
{
	public $displayField = 'abbreviation';
	public $hasMany = array('IngredientList');
}
?>
