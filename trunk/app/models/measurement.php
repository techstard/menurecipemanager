<?php 
class Measurement extends AppModel
{
	public $displayField = 'imperial';
	public $hasMany = array('IngredientList');
}
?>
