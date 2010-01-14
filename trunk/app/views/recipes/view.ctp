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
