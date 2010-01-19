<h1>Add Recipe</h1>

<?php $form->create('Recipe'); ?>
<table>
	<tbody>
		<tr>
			<td><?php $form->input('Recipe.recipe'); ?></td>
			<td><?php $form->input('Recipe.recipe_type_id'); ?></td>
		</tr>
		<tr>
			<td colspan="2"><?php $form->input('Recipe.description'); ?></td>
		</tr>
	</tbody>
</table>

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
			<td><input type="text" name="whole" value=""/></td>
			<td>
				<select name="fractions">
					<?php foreach($fractions as $d => $f): ?>
						<option value="IngredientList.<?php echo $d; ?>"><?php echo $f; ?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>
				<select name="measurement">
					<?php foreach($measurements as $k => $v): ?>
						<option value="IngredientList.<?php echo $k; ?>"><?php echo $v; ?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>				
				<select name="ingredient">
					<?php foreach($ingredient_list as $k => $v): ?>
						<option value="IngredientList.<?php echo $k; ?>"><?php echo $v; ?></option>
					<?php endforeach ?>
				</select></td>
			<td><input type="text" name="IngredientList.instruction" value=""/></td>
			<td><input type="button" value="Add Another" /></td>
		</tr>
	</tbody>
</table>	
<?php $form->end('Save Recipe'); ?>
<?php $form->create('Recipe'); ?>
</form>