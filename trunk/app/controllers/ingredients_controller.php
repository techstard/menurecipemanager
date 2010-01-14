<?php
class IngredientsController extends AppController
{
	public function index() 
	{
		$this->set('ingredients', $this->Ingredient->find('all'));
	}
	
	public function view($id = null)
	{
	    $this->Ingredient->id = $id;
	    if ( empty($this->data))
	    {
	        $this->set('ingredient', $this->Ingredient->read());
	    }		
	}
	
	public function add()
	{
		if (!empty($this->data)) 
		{
			if ($this->Ingredient->save($this->data)) 
			{
				$this->Session->setFlash('Your ingredient has been saved.');
				$this->redirect(array('action' => 'index'));
			}
		}
		
		$this->set('ingredientTypes', $this->Ingredient->IngredientType->find('list'));
	}
	
    function edit($id = null)
	{
	    $this->Ingredient->id = $id;
	    if ( empty($this->data))
	    {
	        $this->data = $this->Ingredient->read();
	    }
	    else
	    {
	        if ($this->Ingredient->save($this->data))
	        {
	            $this->Session->setFlash('Your ingredient has been updated.');
	            $this->redirect(array('action'=>'index'));
	        }
	    }
	}
	
    function delete($id)
	{
	    $this->Ingredient->delete($id);
	    $this->Session->setFlash('The ingredient with id: '.$id.' has been deleted.');
	    $this->redirect(array('action'=>'index'));
	}



}
?>