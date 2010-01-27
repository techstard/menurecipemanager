<h1>Add Recipe</h1>

<?php $form->create('Recipe'); ?>

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
		<tr>
			<td><?php $form->input('IngredientList0.whole_amount', array('label' => false)); ?></td>
			<td><?php $form->input('IngredientList0.fraction_id', array('label' => false, 'empty' => ' ')); ?></td>
			<td><?php $form->input('IngredientList0.measurement_id', array('label' => false)); ?></td>
			<td><?php $form->input('IngredientList0.ingredient_id', array('label' => false, 'empty' => ' ')); ?></td>
			<td><?php $form->input('IngredientList0.instruction', array('label' => false)); ?></td>
			<td><input type="button" value="Add Another" /></td>
		</tr>
		<tr style="display:none;">
			<td><?php $form->input('IngredientList1.whole_amount', array('label' => false)); ?></td>
			<td><?php $form->input('IngredientList1.fraction_id', array('label' => false, 'empty' => ' ')); ?></td>
			<td><?php $form->input('IngredientList1.measurement_id', array('label' => false)); ?></td>
			<td><?php $form->input('IngredientList1.ingredient_id', array('label' => false, 'empty' => ' ')); ?></td>
			<td><?php $form->input('IngredientList1.instruction', array('label' => false)); ?></td>
			<td><input type="button" value="Add Another" /></td>
		</tr>
	</tbody>
</table>	
<?php $form->end('Save Recipe'); ?>

<?php
	// Dump the view object to check for parameters
	//var_dump($this);
?>