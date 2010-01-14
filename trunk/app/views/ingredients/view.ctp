<h1>Ingredient</h1>
<table>
	<thead>
		<tr>
			<th>Ingredient ID</th>
			<th>Ingredient</th>
			<th>Ingredient Type</th>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo $ingredient['Ingredient']['id']; ?></td>
			<td><?php echo $ingredient['Ingredient']['ingredient']; ?></td>
			<td><?php echo $ingredient['IngredientType']['ingredient_type']; ?></td>
			<td><?php echo $ingredient['Ingredient']['description']; ?></td>
		</tr>
	</tbody>
</table>
