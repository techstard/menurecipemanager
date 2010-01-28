<h3>Menus</h3>

<table>
	<thead>
		<tr>
			<th>Menu ID</th>
			<th>Menu</th>
			<th>View</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($menus as $menu): ?>
		<tr>
			<td><?php echo $menu['Menu']['id']; ?></td>
			<td><?php echo $menu['Menu']['menu']; ?></td>
			<td><?php echo $html->link('View', array('action' => 'view', 'id' => $menu['Menu']['id']));?>	</td>
			<td><?php echo $html->link('Edit', array('action' => 'edit', 'id' => $menu['Menu']['id']));?>	</td>
			<td><?php echo $html->link('Delete', array('action' => 'delete', 'id' => $menu['Menu']['id']), null, 'Are you sure?' )?></td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>
