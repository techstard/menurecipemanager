<?php 
class Recipe extends AppModel
{
	//public $hasOne = array('User');
	public $belongsTo = array('RecipeType', 'User');
}
?>
