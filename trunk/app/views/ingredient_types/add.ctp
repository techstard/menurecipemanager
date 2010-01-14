<h1>Add Ingredient Type</h1>
<?php
echo $form->create('IngredientType');
echo $form->input('ingredient_type');
echo $form->input('description');
echo $form->end('Save Ingredient Type');
?>