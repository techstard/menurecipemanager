<h1>Add Menu</h1>
<?php
echo $form->create('Menu');
echo $form->input('Menu.user_id', array('type'=>'hidden', 'value'=>$session->read('Auth.User.id'), 'label' => false )); 
echo $form->input('menu');
echo $form->input('Recipe.id', array('value'=>'0000000030')); FIX THIS TO BE DYNAMIC
echo $form->input('description');
echo $form->end('Save Menu');
?>