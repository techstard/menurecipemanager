<h1>Edit User</h1>
<?php
	echo $form->create('User', array('action' => 'edit'));
	echo $form->input('username');
	echo $form->input('password');
	echo $form->input('active');
	echo $form->input('id', array('type'=>'hidden', 'label' => false)); 
	echo $form->end('Update User');
?>
