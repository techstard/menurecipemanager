<h1>Recipe</h1>
<div>
	<label>Recipe</label>
	<?php 
		echo $recipe['Recipe']['recipe'];
		$form->create('Menu', array('url'=>'/menus/add_recipe')); 
		echo $form->input('Recipe.recipe_id', array('value'=>$recipe['Recipe']['id'], 'label'=>false, 'type'=>'hidden')); 
		echo $form->input('Menu.menu_id');
		$form->end('Add to Menu');
	?>
</div>	
<div>
	<label>Type</label>
	<?php echo $recipe['RecipeType']['recipe_type']; ?>
</div>	
<div>
	<label>Description</label>
	<?php echo $recipe['Recipe']['description']; ?>
</div>
<div>
	<label>Instructions</label>
	<?php echo $recipe['Recipe']['instructions']; ?>
</div>

<h3>Ingredient List</h3>

<table>
	<thead>
		<tr>
			<th>Whole Amount</th>
			<th>Fractional Amount</th>
			<th>Measurement</th>
			<th>Ingredient</th>
			<th>Instruction</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($recipe['IngredientList'] as $ingredient): ?>
		<tr>
			<td><?php echo $ingredient['whole_amount']; ?></td>
			<td><?php echo $ingredient['Fraction']['fraction']; ?></td>
			<td><?php echo $ingredient['Measurement']['imperial']; ?></td>
			<td><?php echo $ingredient['Ingredient']['ingredient']; ?></td>
			<td><?php echo $ingredient['instruction']; ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?php //var_dump($recipe['IngredientList']); ?>
