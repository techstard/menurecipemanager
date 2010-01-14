<?php 
class IngredientType extends AppModel
{
    public $validate = array(
		'ingredient_type' => array('rule'=>'notEmpty'), 
		'description' => array('rule'=>'notEmpty')
		);
	
	public $displayField = 'ingredient_type';
	public $hasMany = 'Ingredients';
}
?>
