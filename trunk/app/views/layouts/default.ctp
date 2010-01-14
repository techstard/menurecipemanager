<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title><?php echo $title_for_layout?></title>
<?php 
	echo $html->css('default');
	echo $javascript->link('jquery-1.3.2.min.js');
	echo $javascript->link('jquery-ui-1.7.2.custom.min.js');
	echo $javascript->link('jquery.json-1.3.min.js'); 
	echo $javascript->link('app.js');
?>
</head>
<body>
	<div class="main container_16">
		
		<div class="grid_16">
			<?php echo $this->element('nav_bar'); ?>
		</div>
		
		<div class="clear"></div>
		
		<div class="grid_16">
			<?php echo $content_for_layout?>
		</div>
		
 	</div>
</body>
</html>