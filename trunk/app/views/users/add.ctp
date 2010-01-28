<h1>Add User</h1>
<?php
echo $form->create('User');
echo $form->input('uname');
echo $form->input('pword');
echo $form->end('Save User');
?>