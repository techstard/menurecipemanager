<?php 
class UsersController extends AppController
{
    public function beforeFilter()
    {
        $this->Auth->allow('login', 'logout', 'register');
    }
    
    /**
     *  The AuthComponent provides the needed functionality
     *  for login, so you can leave this function blank.
     */
    public function login()
    {
    }
    
	public function index()
	{
		$this->set('users', $this->User->find('all'));
	}
	
    public function logout()
    {
        $this->redirect($this->Auth->logout());
    }
    
    public function register()
    {
        if (! empty($this->data))
        {
            $this->data['User']['password'] = $this->Auth->hashPasswords($this->data['User']['password']);
            $this->User->create();
            if ($this->User->save($this->data))
            {
                $this->Session->write('User', $this->User->findByUsername($this->data['User']['username']));
                $this->Session->setFlash('Thank you for registering.');
                $this->redirect('/');
            }
            else
            {
                $this->Session->setFlash('The User could not be saved. Please, try again.');
            }
        }
    }
}
?>
