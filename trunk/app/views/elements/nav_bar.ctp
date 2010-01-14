<div>
	<span>
		<?php echo $html->link('Recipes',array('controller' => 'recipes', 'action' => 'index'))?>
	</span>
	<span>
		<?php echo $html->link('Recipe Types',array('controller' => 'recipe_types', 'action' => 'index'))?>
	</span>
	<span>
		<?php echo $html->link('Ingredients',array('controller' => 'ingredients', 'action' => 'index'))?>
	</span>
	<span>
		<?php echo $html->link('Ingredient Types',array('controller' => 'ingredient_types', 'action' => 'index'))?>
	</span>
</div>
<div>
	<span>
		<?php echo $html->link('Add Recipe',array('controller' => 'recipes', 'action' => 'add'))?>
	</span>
	<span>
		<?php echo $html->link('Add Recipe Type',array('controller' => 'recipe_types', 'action' => 'add'))?>
	</span>
	<span>
		<?php echo $html->link('Add Ingredient',array('controller' => 'ingredients', 'action' => 'add'))?>
	</span>
	<span>		
		<?php echo $html->link('Add Ingredient Type',array('controller' => 'ingredient_types', 'action' => 'add'))?>
	</span>
</div>
