<h1>Add Ingredient</h1>
<?php
echo $form->create('Ingredient');
echo $form->input('ingredient');
echo $form->input('ingredient_type_id');
echo $form->input('description');
echo $form->end('Save Ingredient');
?>