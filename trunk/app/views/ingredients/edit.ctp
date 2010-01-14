<h1>Edit Ingredient Type</h1>
<?php
	echo $form->create('Ingredient', array('action' => 'edit'));
	echo $form->input('ingredient');
	echo $form->input('ingredient_type');
	echo $form->input('description');
	echo $form->input('id', array('type'=>'hidden')); 
	echo $form->end('Update Ingredient');
?>
