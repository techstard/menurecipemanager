<h1>Menu</h1>

<h3>Menu ID</h4>
<div><?php echo $menu['Menu']['id']; ?></div>
<h4>Menu</h4>
<div><?php echo $menu['Menu']['menu']; ?></div>
<h4>Recipes</h4>
<?php foreach($menu['Recipe'] as $recipe): ?>
	<div><?php echo $recipe['recipe'] ?></div>
<?php endforeach; ?>

