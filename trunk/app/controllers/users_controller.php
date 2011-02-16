<?php

class UsersController extends AppController
{

    public function  __construct()
    {
        parent::__construct();
        $this->layout = 'user';
    }
    function beforeFilter()
    {
        parent::beforeFilter();
    }

    function login()
    {
    }

    function logout()
    {
        $this->redirect($this->Auth->logout());
    }

}

?>
