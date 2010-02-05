<?php
class MenusController extends AppController
{
	public function index() 
	{
		$this->set('menus', $this->Menu->find('all'));
	}
	
	public function view($id = null)
	{
	    $this->Menu->id = $id;
	    if ( empty($this->data))
	    {
	        $menu = $this->Menu->read();
	        $this->set('menu', $menu);
	    }		
	}
	
	public function add()
	{
		if (!empty($this->data)) 
		{
			if ($this->Menu->saveAll($this->data)) 
			{
				$this->Session->setFlash('Your menu has been saved.');
				$this->redirect(array('action' => 'index'));
			}
		}
		$this->set('recipes', $this->Menu->Recipe->find('list'));
	}
	
    public function edit($id = null)
	{
	    $this->Menu->id = $id;
	    if ( empty($this->data))
	    {
	        $this->data = $this->Menu->read();
	    }
	    else
	    {
			if ($this->Menu->saveAll($this->data))
	        {
				$this->Session->setFlash('Your menu has been updated.');
		           $this->redirect(array('action'=>'index'));
	        }
	    }
	}
	
    public function delete($id)
	{
		$this->Menu->delete($id, $cascade = true);
	    $this->Session->setFlash('The menu with id: '.$id.' has been deleted.');
	    $this->redirect(array('action'=>'index'));
	}
	
	public function add_recipe()
	{
		$this->Menu->addRecipe($this->data);
		$this->Session->setFlash('The recipe has been added to the menu');
	    $this->redirect(array('controller'=>'recipes', 'action'=>'index'));		
	}
}
?>