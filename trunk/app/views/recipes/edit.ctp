<h1>Edit Recipe</h1>
<?php
	echo $form->create('Recipe', array('action' => 'edit'));
	echo $form->input('recipe');
	echo $form->input('recipe_type');
	echo $form->input('description');
	echo $form->input('id', array('type'=>'hidden')); 
	echo $form->end('Update Recipe');
?>
