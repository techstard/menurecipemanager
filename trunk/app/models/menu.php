<?php 
class Menu extends AppModel
{
	public $belongsTo = array('User');
	
	public $hasAndBelongsToMany = array(
        'Recipe' =>
            array(
                'className'              => 'Recipe',
                'joinTable'              => 'menus_recipes',
                'foreignKey'             => 'menu_id',
                'associationForeignKey'  => 'recipe_id',
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
