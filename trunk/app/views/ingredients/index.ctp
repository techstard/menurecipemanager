<h3>Ingredients</h3>

<table>
	<thead>
		<tr>
			<th>Ingredient ID</th>
			<th>Ingredient</th>
			<th>Ingredient Type</th>
			<th>View</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($ingredients as $ingredient): ?>
		<tr>
			<td><?php echo $ingredient['Ingredient']['id']; ?></td>
			<td><?php echo $ingredient['Ingredient']['ingredient']; ?></td>
			<td><?php echo $ingredient['IngredientType']['ingredient_type']; ?></td>
			<td><?php echo $html->link('View', array('action' => 'view', 'id' => $ingredient['Ingredient']['id']));?>	</td>
			<td><?php echo $html->link('Edit', array('action' => 'edit', 'id' => $ingredient['Ingredient']['id']));?>	</td>
			<td><?php echo $html->link('Delete', array('action' => 'delete', 'id' => $ingredient['Ingredient']['id']), null, 'Are you sure?' )?></td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>