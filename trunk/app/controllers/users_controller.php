<?php
class UsersController extends AppController
{

	public function index() 
	{
		$this->set('users', $this->User->find('all'));
	}

    function register() {
        if (!empty($this->data)) {
            $this->data['User']['password'] = md5($this->data['User']['password']);
            $this->User->create();
            if ($this->User->save($this->data)) {
                $this->Session->write('User', $this->User->findByUsername($this->data['User']['username']));
                $this->Session->setFlash('Thank you for registering.');
                $this->redirect('/');
            } else {
                $this->Session->setFlash('The User could not be saved. Please, try again.');
            }
        }
    }

    function login()
    {
        if(empty($this->data) == false)
        {
            if(($user = $this->User->validateLogin($this->data['User'])) == true)
            {
                $this->Session->write('User', $user);
                $this->Session->setFlash('You\'ve successfully logged in.');
                $this->redirect('index');
                exit();
            }
            else
            {
                $this->Session->setFlash('Sorry, the information you\'ve entered is incorrect.');
                exit();
            }
        }
    }
    
    function logout()
    {
        $this->Session->destroy('user');
        $this->Session->setFlash('You\'ve successfully logged out.');
        $this->redirect('login');
    }
        
	public function add()
	{
		if (!empty($this->data)) 
		{
			if ($this->User->save($this->data)) 
			{
				$this->Session->setFlash('Your user has been saved.');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	
    function edit($id = null)
	{
	    $this->User->id = $id;
	    if ( empty($this->data))
	    {
	        $this->data = $this->User->read();
	    }
	    else
	    {
	        if ($this->User->save($this->data))
	        {
	            $this->Session->setFlash('Your user has been updated.');
	            $this->redirect(array('action'=>'index'));
	        }
	    }
	}
	
    function delete($id)
	{
	    $this->User->delete($id);
	    $this->Session->setFlash('The user with id: '.$id.' has been deleted.');
	    $this->redirect(array('action'=>'index'));
	}



}
?>