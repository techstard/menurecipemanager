<?php 
class Menu extends AppModel
{
	public $belongsTo = array('User');
	public $hasMany = array( 
						'Recipe' => array('dependent'=> true)
						);
}
?>
