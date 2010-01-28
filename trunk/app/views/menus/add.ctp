<h1>Add Menu</h1>
<?php
echo $form->create('Menu');
echo $form->input('Menu.user_id', array('type' => 'hidden', 'label' => false));
echo $form->input('menu');
echo $form->input('description');
echo $form->end('Save Menu');
?>