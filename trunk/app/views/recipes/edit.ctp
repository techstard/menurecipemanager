<h1>Edit Recipe</h1>
<?php 
	echo $form->create('Recipe', array('action' => 'edit')); 
	echo $form->input('id', array('type'=>'hidden')); 
?>

<div>
	<?php $form->input('Recipe.recipe'); ?>
</div>
<div>
	<?php $form->input('Recipe.recipe_type_id'); ?>
</div>
<div>
	<?php $form->input('Recipe.description'); ?>
</div>
<div>
	<?php $form->input('Recipe.instructions'); ?>
</div>

<table class="ingredient_list">
	<thead>
		<tr>
			<th>Whole Amount</th>
			<th>Fractional Amount</th>
			<th>Measurement</th>
			<th>Ingredient</th>
			<th>Instruction</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>

<?php
	
	echo $form->end('Update Recipe');
?>


