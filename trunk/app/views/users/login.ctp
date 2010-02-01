<?php
    $session->flash('auth');
    echo $form->create('User', array('action' => 'login'));
    echo $form->input('username');
    echo $form->input('password');
    echo $form->end('Login');
	echo $html->link('Register',array('controller' => 'users', 'action' => 'register'));
?>
