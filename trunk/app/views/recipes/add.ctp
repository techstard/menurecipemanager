<h1>Add Recipe</h1>

<?php $form->create('Recipe'); ?>

<table>
	<tbody>
		<tr>
			<td><?php $form->input('recipe'); ?></td>
			<td><?php $form->input('recipe_type_id'); ?></td>
		</tr>
		<tr>
			<td colspan="2"><?php $form->input('description'); ?></td>
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
						<option value="<?php echo $d; ?>"><?php echo $f; ?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>
				<select name="measurement">
					<?php foreach($measurements as $k => $v): ?>
						<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>				
				<select name="ingredient">
					<?php foreach($ingredients as $k => $v): ?>
						<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
					<?php endforeach ?>
				</select></td>
			<td><input type="text" name="instruction" value=""/></td>
			<td><input type="button" value="Add Another" /></td>
		</tr>
	</tbody>
</table>	
<?php $form->end('Save Recipe'); ?>
<?php $form->create('Recipe'); ?>
<table style="display:block">
		<tr id="ingredient_row">
			<td><input type="text" name="whole" value=""/></td>
			<td>
				<select name="fractions">
					<?php foreach($fractions as $d => $f): ?>
						<option value="<?php echo $d; ?>"><?php echo $f; ?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>
				<select name="measurement">
					<?php foreach($measurements as $k => $v): ?>
						<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>				
				<select name="ingredient">
					<?php foreach($ingredients as $k => $v): ?>
						<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
					<?php endforeach ?>
				</select></td>
			<td><input type="text" name="instruction" value=""/></td>
			<td><input type="button" value="Add Another" /></td>
		</tr>		
</table>
</form>

<?php
//var_export($fractions);
?>