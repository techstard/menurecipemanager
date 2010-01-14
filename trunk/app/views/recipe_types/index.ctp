<h3>Recipe Types</h3>

<table>
	<thead>
		<tr>
			<th>Recipe Type ID</th>
			<th>Recipe Type</th>
			<th>View</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($recipe_types as $recipe_type): ?>
		<tr>
			<td><?php echo $recipe_type['RecipeType']['id']; ?></td>
			<td><?php echo $recipe_type['RecipeType']['recipe_type']; ?></td>
			<td><?php echo $html->link('View', array('action' => 'view', 'id' => $recipe_type['RecipeType']['id']));?>	</td>
			<td><?php echo $html->link('Edit', array('action' => 'edit', 'id' => $recipe_type['RecipeType']['id']));?>	</td>
			<td><?php echo $html->link('Delete', array('action' => 'delete', 'id' => $recipe_type['RecipeType']['id']), null, 'Are you sure?' )?></td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>
