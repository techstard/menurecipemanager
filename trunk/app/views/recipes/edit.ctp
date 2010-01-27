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

<h3>Ingredient List</h3>
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
		<?php foreach($this->data['IngredientList'] as $index => $ingredient): ?>
		<tr>
			<td><?php $form->input('IngredientList.'.$index.'.whole_amount', array('label' => false)); ?></td>
			<td><?php $form->input('IngredientList.'.$index.'.fraction_id', array('label' => false, 'empty' => ' ')); ?></td>
			<td><?php $form->input('IngredientList.'.$index.'.measurement_id', array('label' => false)); ?></td>
			<td><?php $form->input('IngredientList.'.$index.'.ingredient_id', array('label' => false, 'empty' => ' ')); ?></td>
			<td><?php $form->input('IngredientList.'.$index.'.instruction', array('label' => false)); ?></td>
			<td>
			<?php if( ($index + 1) == count($this->data['IngredientList'])): ?>	
				<input type="button" value="Add Another" /></td>
			<?php endif; ?>
		</tr>
		
		<?php $final_row_index = count($this->data['IngredientList']); ?>
		
		<?php endforeach; ?>
		<tr style="display:none;">
			<td><?php $form->input('IngredientList.'.$final_row_index.'.whole_amount', array('label' => false)); ?></td>
			<td><?php $form->input('IngredientList.'.$final_row_index.'.fraction_id', array('label' => false, 'empty' => ' ')); ?></td>
			<td><?php $form->input('IngredientList.'.$final_row_index.'.measurement_id', array('label' => false)); ?></td>
			<td><?php $form->input('IngredientList.'.$final_row_index.'.ingredient_id', array('label' => false, 'empty' => ' ')); ?></td>
			<td><?php $form->input('IngredientList.'.$final_row_index.'.instruction', array('label' => false)); ?></td>
			<td><input type="button" value="Add Another" /></td>
		</tr>		
	</tbody>
</table>

<?php
	echo $form->end('Update Recipe');
	//var_dump($this);
?>


