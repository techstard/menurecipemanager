<h3>Ingredient Types</h3>

<table>
	<thead>
		<tr>
			<th>Ingredient Type ID</th>
			<th>Ingredient Type</th>
			<th>View</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($ingredient_types as $ingredient_type): ?>
		<tr>
			<td><?php echo $ingredient_type['IngredientType']['id']; ?></td>
			<td><?php echo $ingredient_type['IngredientType']['ingredient_type']; ?></td>
			<td><?php echo $html->link('View', array('action' => 'view', 'id' => $ingredient_type['IngredientType']['id']));?>	</td>
			<td><?php echo $html->link('Edit', array('action' => 'edit', 'id' => $ingredient_type['IngredientType']['id']));?>	</td>
			<td><?php echo $html->link('Delete', array('action' => 'delete', 'id' => $ingredient_type['IngredientType']['id']), null, 'Are you sure?' )?></td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>
