<?php 
class Recipe extends AppModel
{
	public $displayField = 'recipe';
	
	public $belongsTo = array('RecipeType');
	
	public $hasMany = array( 
						'IngredientList' => array('dependent'=> true) // dependent causes the IngredientList rows to be deleted with the recipe is deleted.
						);
						
	public $hasAndBelongsToMany = array(
        'User' =>
            array(
                'className'              => 'User',
                'joinTable'              => 'recipes_users',
                'foreignKey'             => 'recipe_id',
                'associationForeignKey'  => 'user_id',
                'unique'                 => true,
                'conditions'             => '',
                'fields'                 => '',
                'order'                  => '',
                'limit'                  => '',
                'offset'                 => '',
                'finderQuery'            => '',
                'deleteQuery'            => '',
                'insertQuery'            => ''
            ),			
        'Menu' =>
            array(
                'className'              => 'Menu',
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
