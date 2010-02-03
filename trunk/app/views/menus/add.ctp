<h1>Add Menu</h1>
<?php
echo $form->create('Menu');
echo $form->input('Menu.user_id', array('type'=>'hidden', 'value'=>$session->read('Auth.User.id'), 'label' => false )); 
echo $form->input('menu');
echo $form->input('Recipe', array('multiple'=>'multiple'));
echo $form->input('description');
echo $form->end('Save Menu');
?>