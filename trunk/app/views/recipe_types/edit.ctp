<h1>Edit Recipe Type</h1>
<?php
	echo $form->create('RecipeType', array('action' => 'edit'));
	echo $form->input('recipe_type');
	echo $form->input('id', array('type'=>'hidden')); 
	echo $form->end('Update Recipe Type');
?>
