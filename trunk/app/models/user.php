<?php 
class User extends AppModel
{
	public $hasMany = array('Recipe', 'Menu');	
}
?>
