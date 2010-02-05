<?php 
class Menu extends AppModel
{
	public $displayField = 'menu';
	
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

	public function addRecipe($data)
	{
		return $this->query(sprintf('INSERT INTO menus_recipes(menu_id, recipe_id) VALUES(%d, %d)', $data['Menu']['menu_id'], $data['Recipe']['recipe_id']));
	}
}
?>
