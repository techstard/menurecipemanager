<?php
class IngredientTypesController extends AppController
{
	public function index() 
	{
		$this->set('ingredient_types', $this->IngredientType->find('all'));
	}
	
	public function view($id = null)
	{
	    $this->IngredientType->id = $id;
	    if ( empty($this->data))
	    {
	        $this->set('ingredient_type', $this->IngredientType->read());
	    }		
	}
	
	public function add()
	{
		if (!empty($this->data)) 
		{
			if ($this->IngredientType->save($this->data)) 
			{
				$this->Session->setFlash('Your ingredient type has been saved.');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	
    function edit($id = null)
	{
	    $this->IngredientType->id = $id;
	    if ( empty($this->data))
	    {
	        $this->data = $this->IngredientType->read();
	    }
	    else
	    {
	        if ($this->IngredientType->save($this->data))
	        {
	            $this->Session->setFlash('Your ingredient type has been updated.');
	            $this->redirect(array('action'=>'index'));
	        }
	    }
	}
	
    function delete($id)
	{
	    $this->IngredientType->delete($id);
	    $this->Session->setFlash('The ingredient type with id: '.$id.' has been deleted.');
	    $this->redirect(array('action'=>'index'));
	}



}
?>