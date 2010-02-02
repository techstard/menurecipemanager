<?php 
class Menu extends AppModel
{
	public $belongsTo = array('User');
	
	public $hasAndBelongsToMany = array(
        'Recipe' =>
            array(
                'className'              => 'Recipe',
                'joinTable'              => 'menus_recipes',
                'foreignKey'             => 'recipe_id',
                'associationForeignKey'  => 'menu_id',
                'unique'                 => true,
                'conditions'             => '',
                'fields'                 => '',
                'order'                  => '',
                'limit'                  => '',
                'offset'                 => '',
                'finderQuery'            => '',
                'deleteQuery'            => '',
                'insertQuery'            => ''
            )			
    );	
}
?>
