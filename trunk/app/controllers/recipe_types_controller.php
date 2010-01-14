<?php
class RecipeTypesController extends AppController
{
	public function index() 
	{
		$this->set('recipe_types', $this->RecipeType->find('all'));
	}
	
	public function view($id = null)
	{
	    $this->RecipeType->id = $id;
	    if ( empty($this->data))
	    {
	        $this->set('recipe_type', $this->RecipeType->read());
	    }		
	}
	
	public function add()
	{
		if (!empty($this->data)) 
		{
			if ($this->RecipeType->save($this->data)) 
			{
				$this->Session->setFlash('Your recipe type has been saved.');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	
    function edit($id = null)
	{
	    $this->RecipeType->id = $id;
	    if ( empty($this->data))
	    {
	        $this->data = $this->RecipeType->read();
	    }
	    else
	    {
	        if ($this->RecipeType->save($this->data))
	        {
	            $this->Session->setFlash('Your recipe type has been updated.');
	            $this->redirect(array('action'=>'index'));
	        }
	    }
	}
	
    function delete($id)
	{
	    $this->RecipeType->delete($id);
	    $this->Session->setFlash('The recipe type with id: '.$id.' has been deleted.');
	    $this->redirect(array('action'=>'index'));
	}



}
?>