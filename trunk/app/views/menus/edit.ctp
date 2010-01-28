<h1>Edit Menu</h1>
<?php
	echo $form->create('Menu', array('action' => 'edit'));
	echo $form->input('menu');
	echo $form->input('description');
	echo $form->input('id', array('type'=>'hidden')); 
	echo $form->end('Update Menu');
?>
