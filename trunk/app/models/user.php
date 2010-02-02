<?php 
class User extends AppModel
{
	public $hasAndBelongsToMany = array(
    	'Recipe' =>
        	array(
				'className'              => 'Recipe',
				'joinTable'              => 'recipes_users',
				'foreignKey'             => 'user_id',
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
