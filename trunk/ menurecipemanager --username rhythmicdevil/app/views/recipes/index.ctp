<h3>Recipes</h3>

<table>
	<thead>
		<tr>
			<th>Recipe ID</th>
			<th>Recipe</th>
			<th>Recipe Type</th>
			<th>View</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($recipes as $recipe): ?>
		<tr>
			<td><?php echo $recipe['Recipe']['id']; ?></td>
			<td><?php echo $recipe['Recipe']['recipe']; ?></td>
			<td><?php echo $recipe['RecipeType']['recipe_type']; ?></td>
			<td><?php echo $html->link('View', array('action' => 'view', 'id' => $recipe['Recipe']['id']));?>	</td>
			<td><?php echo $html->link('Edit', array('action' => 'edit', 'id' => $recipe['Recipe']['id']));?>	</td>
			<td><?php echo $html->link('Delete', array('action' => 'delete', 'id' => $recipe['Recipe']['id']), null, 'Are you sure?' )?></td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>