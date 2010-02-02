<h3>Users</h3>

<table>
	<thead>
		<tr>
			<th>User ID</th>
			<th>Uname</th>
			<th>Active</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $user): ?>
		<tr>
			<td><?php echo $user['User']['id']; ?></td>
			<td><?php echo $user['User']['username']; ?></td>
			<td><?php echo $user['User']['active']; ?></td>
			<td><?php echo $html->link('Edit', array('action' => 'edit', 'id' => $user['User']['id']));?>	</td>
			<td><?php echo $html->link('Delete', array('action' => 'delete', 'id' => $user['User']['id']), null, 'Are you sure?' )?></td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php //var_dump($this); ?>
