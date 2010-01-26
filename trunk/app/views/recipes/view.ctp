<h1>Recipe</h1>
<table>
	<thead>
		<tr>
			<th>Recipe ID</th>
			<th>Recipe</th>
			<th>Recipe Type</th>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo $recipe['Recipe']['id']; ?></td>
			<td><?php echo $recipe['Recipe']['recipe']; ?></td>
			<td><?php echo $recipe['RecipeType']['recipe_type']; ?></td>
			<td><?php echo $recipe['Recipe']['description']; ?></td>
		</tr>
	</tbody>
</table>

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
			<td><?php echo $ingredient['Measurement']['measurement']; ?></td>
			<td><?php echo $ingredient['Ingredient']['ingredient']; ?></td>
			<td><?php echo $ingredient['instruction']; ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?php //var_dump($recipe); ?>
